<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

class TransacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view ('carts', [
            'title' => 'Carts',
            'categories' => Category::all(),
            'products' => product::all(),
            'transactions' => transaction::where('user_id', auth()->user()->id)->get()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaction  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(transaction $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy( transaction $transaction)
    {
        // $del = transactions::findOrFail($transactions->id);
        // $cart->roles()->detach();
        dump($transaction);
        return ($transaction->id);
        transaction::destroy($cart->id);

        return redirect ('/transactions/products')->with('success', 'Produk Berhasil di Hapus!!');
    }
}
