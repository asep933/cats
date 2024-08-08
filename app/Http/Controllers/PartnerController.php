<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        return redirect()->route('list.partner')->with('message', 'partner successfully added');
    }

    public function show(Partner $partner): View
    {
        return view('partner.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if($validator->fails()) {
            return back()
                ->withErros($validator->fails());
        }

        if($request->hasFile('image')) {
            $request->validate([
                'title' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg,gif,svg|max:2048'
            ]);
            Storage::delete('public/partners/'.$partner->image);

            $image = $request->image;
            $image->storeAs('public/partners', $image->hashName());

            $partner->update([
                'title' => $request->title,
                'image' => $image->hashName()
            ]);

            return redirect()->route("list.partner")->with('message', 'succesfully updated partner');
        } else {
            $partner->update([
                'title' => $request->title
            ]);

            return redirect()->route("list.partner")->with('message', 'succesfully updated partner');
        }
    }

    public function destroy(Partner $partner) {
        Storage::delete('public/cats/'.$partner->image);
        $partner->delete();

        return back()->with('message', 'partner successfuly deleted');
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
