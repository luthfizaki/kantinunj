<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\transactions;

class TransactionsController extends Controller
{
    public function show_cart (Request $request) {
        return view ('carts', [
            'title' => 'Carts',
            // 'categories' => Category::all(),
            // 'products' => product::all(),
            'transactions' => transactions::where([
                ['user_id', 2],
                ['status', 'on cart'],
            ])
            ->get()
        ]);
    }

    public function delete (Request $request) {
        dd($request);
    }

}
