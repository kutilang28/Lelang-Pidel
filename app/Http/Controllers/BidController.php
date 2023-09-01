<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Items as ModelsItems;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Items::all();

        return view('index', compact('data'))->with([
            'items' => Items::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Items $items)
    {
        if (Carbon::now() > $request->end_time) {
            return redirect()->back()->withErrors(['error' => 'The auction has ended.']);
        }
        
        $request->validate([
            'amount' => 'required', // Ensure a positive amount
            'items_id' => 'required',
        ]);

        // Get the current highest bid for the product
        $highestBid = DB::table('bids')
                ->where('items_id', $request->items_id)
                ->orderByDesc('amount')
                ->first();

        // Check if this bid is higher than the current highest bid
        if ($highestBid && $highestBid->amount >= $request->amount) {
            return redirect()->back()->withErrors(['error' => 'Tawaran anda harus lebih besar dari tawaran tertinggi sekarang.']);
        } elseif ($request->amount <= $request->starting_bid) {
            return redirect()->back()->withErrors(['error' => 'Tawaran anda harus lebih besar dari harga tawaran awal']);            
        }
        

        // Store the new bid
        $bid = new Bid;
        $bid->user_id = auth()->id(); // Assign the currently logged-in user
        $bid->items_id = $request->items_id;
        $bid->amount = $request->amount;
        $bid->save();

        return redirect()->back()->with('success', 'Your bid was placed successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Items::findOrFail($id);
        $highestBid = DB::table('bids')
                ->where('items_id', $item->id)
                ->orderByDesc('amount')
                ->first();

        return view('bid.create', compact('item', 'highestBid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
