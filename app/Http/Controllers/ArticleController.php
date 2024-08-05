<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('article.index', compact('articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'content' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->fails());
        }

        $request->all();

        if($request->hasFile('image')) {
            $imageName = $request['image']->hashName();

            $request['image']->storeAs('public/articles', $imageName);

            Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'author' => auth()->user()->id,
                'image' => $imageName,
            ]);

            return redirect()->route('list.article')->with('message', 'successfully post article');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => auth()->user()->id
        ]);

        return redirect()->intended('/article')->with('message', 'successfully post article');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'content' => 'required',
        ]);

        if($validator->fails()) {
            return back()
            ->withErrors($validator->fails());
        }

        $request->all();

        if($request->hasFile('image')) {
            $imageName = $request['image']->hashName().$request['image']->getClientOriginalExtension();
            $request['image']->storeAs('public/articles', $imageName);
            
            $request['author'] = auth()->user()->id;
            $request['image'] = Storage::url('public/articles/'.$imageName);

            $article->update($request->all());

            return redirect()
            ->intended('/article')
            ->with('message', 'successfully updated article');
        }

        $request['author'] = auth()->user()->id;

        $article->update($request->all());

        return redirect()
        ->intended('/article')
        ->with('message', 'successfully updated article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
        ->intended('/article')
        ->with('message', 'successfully deleted article');
    }

    public function searchTable (Request $request): View
    {
        $term = $request->search_table;

        $articlesTable = DB::table('articles')
            ->where('title', 'like', "%$term%")
            ->orWhere('content', 'like', "%$term%")
            ->get();

        return view('article.list-article', compact('articlesTable'))->with('message', "success search!");
    }
}
