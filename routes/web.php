<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\product;
use App\Models\transactions;
use App\Models\transaction;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboarddController;
use App\Http\Controllers\DashboarduController;
// use App\Http\Controllers\DashboardOrderController;
// use App\Http\Controllers\TransacController;
// use App\Http\Controllers\TransactionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/kantin', [ProductController::class, 'kantins']);
Route::get('/about', function () {
    return view ('about', [
        'transactions' => transaction::where ('customer_id', auth()->user()->id)->orderBy('user_id')->get(),
    ]);
});
Route::get('/contact', function () {
    return view ('contact', [
        'transactions' => transaction::where ('customer_id', auth()->user()->id)->orderBy('user_id')->get(),
    ]);
});

Route::get('/dashboard/user', [DashboarddController::class, 'dashboardUser'])->middleware('auth');

Route::get('kantin/{category_kantin:slug}', [ProductController::class, 'show_kantin']);

Route::get('/product/{post:slug}', [ProductController::class, 'show_product']);
// Route::get('/kantin/{category:slug}', function(Category $category) {
//     return view ('kantin', [
//         'title' => $category->nama,
//         'menus' => $category->products,
//         'category' => $category->nama
//     ]);
// });
// Route::get('/carts', [TransactionsController::class, 'show_cart']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::get ('/checkout', [DashboarddController::class, 'checkout'])->middleware('auth');

Route::get('/dashboard', function () {
    return view ('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/produk', function (Request $request) {
    // return view ('index', [
    //     'transactions' => transaction::where ('customer_id', auth()->user()->id)->get()
    if ($request->ajax()) {
            $transactions = transaction::where ('customer_id', auth()->user()->id)->get();
            return response()->json ([
                'success' => true,
                'transactions' => $transactions
            ]);
        }

        return view ('index');
    // ]);
})->middleware('auth');
Route::get('/dashboard/products/checkslug', [DashboardController::class, 'checkslug'])->middleware('auth');

Route::post('/product/add-to-cart', [DashboarddController::class, 'addToCart'])->middleware('auth');
Route::post('/product/{transaction:id}', [DashboarddController::class, 'removeFromCart']);
Route::get('/remove/{id}', 'DashboarddController@removeFromCart')->name('remove');

// Route POST
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);
// Route::post ('/transactions/produksi', TransactionsController::class, 'delete');
// Route resource
Route::resource ('/dashboard/products', DashboardController::class)->middleware('auth');
Route::resource ('/dashboard/product', DashboarddController::class)->middleware('auth');
// Route::post('/dashboard/product/{id}/update',[DashboarddController::class,'update'])->name('product.update');
// Route::resource ('/dashboard/produk', DashboarduController::class)->middleware('auth');

// Route::resource ('/dashboard/orders', DashboardOrderController::class)->middleware('auth');

// Route::resource ('/transactions/produks', TransacController::class);
Route::get ('/author/{author:username}', function (User $author) {
    return view ('kantin', [
        'title' => 'User Post',
        'posts' => $author->posts->load('category', 'author')
        // 'category' => $user->nama
    ]);
});

Route::get('/profile', [PostController::class, 'index']);

// halaman single post profile
Route::get('profile/{post:slug}', [PostController::class, 'show']);

Route::get('categories', function () {
    return view ('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});
Route::get('/categories/{category:slug}', function(Category $category) {
    return view ('category', [
        'title' => $category->nama,
        'posts' => $category->posts,
        'category' => $category->nama
    ]);
});



// Route::get('/about', function () {
//     return view ('about', [
//         "title" => "ABOUT",
//         "name"  => "Luthfi Arzaki",
//         "email" => "luthfizaki43@gmail.com",
//         "image" => "kaos.jpg"
//     ]);
// });
