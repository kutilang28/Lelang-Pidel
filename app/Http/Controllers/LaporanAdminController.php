<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Items::all();
        $endedAuctions = DB::table('items')
            ->leftJoinSub(
                DB::table('bids')
                    ->select('items_id', DB::raw('MAX(amount) as max_bid'))
                    ->groupBy('items_id'),
                'max_bids',
                'items.id',
                '=',
                'max_bids.items_id'
            )
            ->leftJoin('bids', function($join) {
                $join->on('items.id', '=', 'bids.items_id');
                $join->on('max_bids.max_bid', '=', 'bids.amount');
            })
            ->leftJoin('users', 'bids.user_id', '=', 'users.id')
            ->select('items.id as product_id', 'items.name as item_name', 'users.name as winner_name', 'bids.user_id as winner_id', 'bids.amount as winning_amount', 'items.end_time as winning_date')
            ->where('items.end_time', '<', now())
            ->whereNotNull('bids.user_id')  // This line filters out items without a winner
            ->get();
        return view('laporan.index', compact('endedAuctions'));
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
    public function store(Request $request)
    {
        //
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
