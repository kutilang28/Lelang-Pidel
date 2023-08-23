<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Items as ModelsItems;
use Illuminate\Http\Request;

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
        if (Carbon::now() > $items->end_time) {
            return redirect()->back()->withErrors(['error' => 'The auction has ended.']);
        }
        
        $request->validate([
            'amount' => 'required', // Ensure a positive amount
        ]);

        // Get the current highest bid for the product
        $highestBid = $items->bids()->orderByDesc('amount')->first();

        // Check if this bid is higher than the current highest bid
        if ($highestBid && $highestBid->amount >= $request->amount) {
            return redirect()->back()->withErrors(['error' => 'Your bid must be higher than the current highest bid.']);
        }

        // Store the new bid
        $bid = new Bid;
        $bid->user_id = auth()->id(); // Assign the currently logged-in user
        $bid->product_id = $items->id;
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
