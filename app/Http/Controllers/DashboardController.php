<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard.product.index', [
            'products' => product::where ('user_id', auth()->user()->id)->get()
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
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return view ('dashboard.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        // dd($product);
        $check = [
            'product_name' => 'required|max:255',
            'desc' => 'required',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ];

        if ($request->slug != $product->slug) {
            $check['slug'] = 'required|min:5|unique:products';
        }

        $validate = $request->validate($check);

        if($request->file('image')) {
            if($request->oldimage) {
                Storage::delete($request->oldimage);            }
            $validate['image'] = $request->file('image')->store('product_images');
        }

        $validate['user_id'] = auth()->user()->id;

        product::where ('id', $product->id)->update($validate);

        return redirect ('/dashboard/products')->with('success', 'Produk Berhasil di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        // ddd($product);
        if($product->image) {
            Storage::delete($product->image);
        }
        // return ($product->id);
        product::destroy($product->id);

        return redirect ('/dashboard/products')->with('success', 'Produk Berhasil di Hapus!!');
    }

    public function checkslug (Request $request) {
        $slug = SlugService::createSlug(product::class, 'slug', $request->name);

        return response()->json (['slug' => $slug]);
    }
}
