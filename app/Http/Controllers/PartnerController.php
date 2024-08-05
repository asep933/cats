<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->simplePaginate(10);

        return view('partner.index', compact('partners'));
    }
    public function add()
    {
        return view('partner.add-partner');
    }
    public function store(Request $request): RedirectResponse 
    {
        $request->validate([
            'title'=> 'required',
            'image'=> 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/partners', $image->hashName());

        Partner::create([
            'title' => $request->title,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('admin.home')->with('message', 'data successfully added');
    }

    public function searchTable (Request $request): View
    {
        $term = $request->search_table;

        $partnersTable = DB::table('partners')
            ->where('title', 'like', "%$term%")
            ->get();

        return view('partner.index', compact('partnersTable'))->with('message', "success search!");
    }
}
