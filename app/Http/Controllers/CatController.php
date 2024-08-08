<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CatController extends Controller
{
    public function index(): View
    {
        $cats = Cat::latest()->paginate(10);
        $partners = Partner::latest()->paginate(10);

        return view('home', compact('cats', 'partners'));
    }

    public function admin(): View
    {
        $cats = Cat::latest()->paginate(10);

        return view('admin.home', compact('cats'));
    }

    public function store(Request $request): RedirectResponse 
    {
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image'=> 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/cats', $image->hashName());

        Cat::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('admin.home')->with('message', 'data successfully added');
    }

    public function edit(Cat $cat): View
    {
        return view('admin.edit', compact('cat'));
    }

    public function update(Request $request, Cat $cat): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()) {
            return back()
                ->withErros($validator->fails());
        }

        if($request->hasFile('image')) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2048'
            ]);
            Storage::delete('public/cats/'.$cat->image);

            $image = $request->image;
            $image->storeAs('public/cats', $image->hashName());

            $cat->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image->hashName()
            ]);

            return redirect()->route("admin.home");
        } else {
            $cat->update([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect()->route("admin.home");
        }
    }

    public function destroy(Cat $cat) {
        Storage::delete('public/cats/'.$cat->image);
        $cat->delete();

        return back()->with('message', 'data successfuly deleted');
    }

    public function gallery(): View
    {
        $cats = Cat::latest()->paginate(10);

        return view('gallery', compact('cats'));
    }

    public function search (Request $request): View
        {
            $term = $request['search'];

            $cats = DB::table('cats')
                ->where('name', 'like', "%$term%")
                ->orWhere('description', 'like', "%$term%")
                ->get();

            return view('search', compact('cats'))->with('message', "success search!");
        }
    public function searchTable (Request $request): View
        {
            $term = $request->search_table;

            $catsTable = DB::table('cats')
                ->where('name', 'like', "%$term%")
                ->orWhere('description', 'like', "%$term%")
                ->get();

            return view('admin.home', compact('catsTable'));
        }
    }
