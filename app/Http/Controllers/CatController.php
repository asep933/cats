<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

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

    public function destroy(Cat $id) {
        $id->delete();

        return view('home')->with(['message' => 'data successfuly added']);
    }

    public function gallery(): View
    {
        $cats = Cat::latest()->paginate(10);

        return view('gallery', compact('cats'));
    }

    public function search (Request $request): View
    {
        $term = $request['search'];
        $cats = Cat::where('name', 'like', "%$term%")->get();

        return view('search', compact('cats'))->with('message', "success search!");
    }
}
