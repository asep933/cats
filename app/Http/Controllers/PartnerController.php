<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
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
}
