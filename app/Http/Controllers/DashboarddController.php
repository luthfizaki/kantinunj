<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboarddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validate['user_id'] = auth()->user()->id;

        if (auth()->user()->status == 'user') {
            return view ('index', [
                'success' => true,
                'transactions' => transaction::where ('customer_id', auth()->user()->id)->orderBy('user_id')->get(),
                'total' => transaction::where([
                    ['customer_id', auth()->user()->id],
                    ['status', 'on cart'],
                ])->sum('price_total')
            ]);
                
        }

        return view ('dashboard.order.index', [
            'transactions' => transaction::where ('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.product.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validate = $request->validate ([
            'product_name' => 'required|max:255',
            'slug' => 'required|min:5|unique:products',
            'image' => 'image|file|max:1024',
            'desc' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);

        if($request->file('image')) {
            $validate['image'] = $request->file('image')->store('product_images');
        }
        $validate['user_id'] = auth()->user()->id;

        product::create($validate);

        return redirect ('/dashboard/products')->with('success', 'Produk Berhasil di Tambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view ('dashboard.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaction  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(transaction $product)
    {
        // dd($product->id);
        // $validate['user_id'] = auth()->user()->id;

        // if (auth()->user()->status == 'user') {
        //     $trans = transaction::findOrFail($product);
        //     // return response()->json([
        //         // 'success' => true,
        //         // 'transactions' => $trans
        //     // ]);
        //     return view ('edit')-> with ([
        //         'transactions' => $trans
        //     ]);
        // }
        return view ('dashboard.order.show', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaction  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaction $product)
    {
        // dd($product->id);
        // $check = [
        //     'product_name' => 'required|max:255',
        //     'desc' => 'required',
        //     'image' => 'image|file|max:1024',
        //     'category_id' => 'required',
        //     'price' => 'required|numeric',
        //     'stock' => 'required|numeric'
        // ];

        // if ($request->slug != $product->slug) {
        //     $check['slug'] = 'required|min:5|unique:products';
        // }

        // $validate = $request->validate($check);

        // if($request->file('image')) {
        //     if($request->oldimage) {
        //         Storage::delete($request->oldimage);            }
        //     $validate['image'] = $requestast->file('image')->store('product_images');
        // }

        // $validate['user_id'] = auth()->user()->id;

        // if (auth()->user()->status == 'user') {
            // $validate = validator::make($request->all(),[
            //     'amount' => 'required',
            //     'status' => 'required'
            // ]);

            // if($validate->fails()) {
            //     return response()->json($validate->errors(), 400);
            // }

            // $trans = transaction::where ('id', $product)->first();
            // $data = $request->all();
            // $trans->update($data);

            // return response()->json ([
            //     'success' => true,
            //     'message' => 'Berhasil di Update',
            // ]);
        //     $validate['status'] = $request->status;
        // if ($product->status == 'on order') {
        //     $validate['status'] = 'on process';
        // } else {
        //     $validate['status'] = 'success';
        // }
        

        // transaction::where ('id', $product->id)->update($validate);

        // return redirect ('/dashboard/product')->with('success', 'Produk Berhasil di Update!!');
        // dd($product->status);
        // $validate['amount'] = $request->amount;
        // $validate['amount'] = $product->amount;
        // dd($validate);
        // $validates = $request->validate( [
        //     'amount' => 'required',
        // ]);
        // $product->amount = $request->amount;
        // transaction::where ('id', $product->id)->update(['amount' => $request->a]);
        // return redirect ('/dashboard/produk');
        // } 
        
        $validate['status'] = $request->status;
        if ($product->status == 'on order') {
            $validate['status'] = 'on process';
        } else {
            $validate['status'] = 'success';
        }
        

        transaction::where ('id', $product->id)->update($validate);

        return redirect ('/dashboard/product')->with('success', 'Produk Berhasil di Update!!');
        dd($product->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaction  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaction $product)
    {
        $validate['user_id'] = auth()->user()->id;

        if (auth()->user()->status == 'user') {
            // dd($product->id);
            transaction::destroy($product->id);
            return redirect ('/dashboard/product')->with('success', 'Produk Berhasil di Hapus!!');
        }
        // dd($product->id);
        if($product->image) {
            Storage::delete($product->image);
        }
        // return ($product->id);
        transaction::destroy($product->id);

        // return redirect ('/dashboard/products')->with('success', 'Produk Berhasil di Hapus!!');
    }

    public function checkslug (Request $request) {
        $slug = SlugService::createSlug(product::class, 'slug', $request->name);

        return response()->json (['slug' => $slug]);
    }

        
    public function addToCart (Request $request) {
        $blog = transaction::create([
        'category_id'     => $request->category_id,
        'product_id'     => $request->id,
        'user_id'   => $request->user_id,
        'customer_id'   => auth()->user()->id,
        'amount' => $request->amount,
        'price_total'   => $request->amount* $request->price,
        'status'   => 'on cart',
    ]);
        return redirect ('/')->with('success', 'Produk Berhasil di Tambahkan!!');
    }

    public function removeFromCart (Request $trans) {
        dd($trans->id);
        transaction::destroy($trans->id);
        return redirect ('/dashboard/products')->with('success', 'Produk Berhasil di Hapus!!');

    }

    public function checkout () {
        transaction::where('status', 'on cart')->update(array('status' => 'on order'));
        return view ('checkout', [
            
            'transactions' => transaction::where ('customer_id', auth()->user()->id)->orderBy('user_id')->get(),
            'confirm' => transaction::selectRaw('transactions.user_id, users.name, users.no_telpon, sum(transactions.price_total) as total')
                        ->join('users', 'transactions.user_id', '=', 'users.id')
                        ->where([
                        ['transactions.customer_id', auth()->user()->id],
                        ['transactions.status', 'on order'],
                    ])->groupBy ('transactions.user_id', 'users.name', 'users.no_telpon')->get(),
        ]);
    }

    public function dashboardUser () {
        return view ('dashboardUser', [
            'confirm' => transaction::selectRaw('transactions.user_id, users.name, users.no_telpon, sum(transactions.price_total) as total')
                        ->join('users', 'transactions.user_id', '=', 'users.id')
                        ->where([
                        ['transactions.customer_id', auth()->user()->id],
                        ['transactions.status', 'on order'],
                    ])->groupBy ('transactions.user_id', 'users.name', 'users.no_telpon')->get(),
        
            'transactions' => transaction::where ('customer_id', auth()->user()->id)->orderBy('user_id')->get(),
        ]);
    }
}
