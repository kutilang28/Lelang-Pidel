<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemPetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Items::all();

        return view('itempet.index', compact('data'))->with([
            'itempet' => Items::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itempet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $items = new Items;
        $items->name = $request->name;
        $items->description = $request->description;
        $items->starting_bid = $request->starting_bid;
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('img'), $imageName);
        }
        $items->foto = $imageName;
        $items->end_time = $request->end_time;
        $items->save();

        return redirect('itempet')->with('success', 'Penambahan Data Barang Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('itempet.edit')->with([
            'itempet' => Items::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'starting_bid' => 'required',
            'end_time' => 'required',
        ]);

        $items = Items::findOrFail($id);
        $items->name = $request->name;
        $items->description = $request->description;
        $items->starting_bid = $request->starting_bid;
        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('img'), $imageName);
        }
        $items->foto = $imageName;
        $items->end_time = $request->end_time;
        $items->save();

        return redirect('itempet')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Items::find($id);
        $items->delete();
        return back()->with('success', 'Data Berhasil Di Hapus !.');
    }
}
