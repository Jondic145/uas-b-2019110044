<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id' => 'required|max:16',
            'nama' => 'required|max:100',
            'harga' => 'required|min:0',
            'stok' => 'required',

        ];

        $validated = $request->validate($rules);

        // ];



        Item::create($validated);

        $request->session()->flash('success', "Successfully adding {$validated['nama']}!");
        return redirect()->route('items.index');
        //

        // $newMovie = new Movie();
        // $newMovie->title = $validated['title'];
        // $newMovie->genre = $validated['genre'];
        // $newMovie->description = $validated['description'];
        // $newMovie->year = $validated['year'];
        // $newMovie->rating = $validated['rating'];
        // $newMovie->save();


        return "Item Baru sudah di tambahkan";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'id' => 'required|max:16',
            'nama' => 'required|max:100',
            'harga' => 'required|double|min:0',
            'stok' => 'required|min:1'
        ];

        $validated = $request->validate($rules);


        $item->update($validated);
        $request->session()->flash('success', "Berhasil memperbarui data item {$validated['nama']}.");
        return redirect()->route('items.index')->with('success', "Data Film {$item['nama']} Sudah Dihapus. ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item   ->delete();
        return redirect()->route('items.index')->with('success', "Data Item {$item['title']} Sudah Dihapus. ");
    }
}
