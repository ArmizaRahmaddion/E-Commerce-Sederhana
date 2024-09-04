<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Barangcontroller;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\Detailcontroller;
use App\Http\Controllers\Pesanancontroller;
use App\Http\Controllers\Shopcontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\PemasokControllercon;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\RestokController;
use App\Http\Controllers\UserMutasiController;
use App\Models\User;

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

Route::get('/', function () {
    return view('layoutuser.index');
});




Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('layoutuser/index', [Dashboardcontroller::class, 'index'])->name('index');
Route::get('admindashboard', [Dashboardcontroller::class, 'admin'])->name('admin');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register-process', [AuthController::class, 'registerProcess']);
Route::get('logout', [AuthController::class, 'logout']);

// Route::resource('admindashboard', 'App\Http\Controllers\Dashboardcontroller');
Route::resource('index', IndexController::class);

Route::resource('detail', DetailController::class);


Route::get('/shop', [ShopController::class, 'index']);
Route::get('/shop/kategori/{kategori}', [ShopController::class, 'kategori_produk'])->name('shop.kategori');

// Route::resource('shop', Shopcontroller::class);
// Route::get('/kategori/{id}', [Shopcontroller::class, 'kategori_produk'])->name('kategori.produk');

Route::middleware([CheckRole::class . ':admin'])->group(function () {
    // Rute-rute yang hanya boleh diakses oleh  "admin" di sini
    Route::get('/admin', function () {
        return view('admindashboard');
    });
    // Route::get('/icondashboard', [Dashboardcontroller::class, 'MenampilkanDiIcon'])->name('icon.dashboard');
    Route::resource('barang', 'App\Http\Controllers\Barangcontroller');
    Route::get('/pesanan', [Pesanancontroller::class, 'LihatPesanan']);
    Route::get('/user', [Usercontroller::class, 'LihatUser']);
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::post('/admin/orders/{kode}/approve', [AdminController::class, 'approveOrder'])->name('admin.orders.approve');
    Route::post('/admin/orders/{kode}/return', [AdminController::class, 'returnOrder'])->name('admin.orders.return');
    Route::post('/admin/orders/cancel/{kode}', [AdminController::class, 'cancelOrder'])->name('admin.orders.cancel');
    Route::get('/admin/mutasi', [AdminController::class, 'mutasi'])->name('admin.mutasi');
    Route::get('/approved-orders', [AdminController::class, 'showApprovedOrders'])->name('approved.orders');
    Route::get('/canceled-orders', [AdminController::class, 'showCanceledOrders'])->name('canceled.orders');


    Route::get('/pemasok', [PemasokController::class, 'LihatPemasok'])->name('pemasok.list');
    Route::get('/pemasok/create', [PemasokController::class, 'create'])->name('pemasok.create');
    Route::post('/pemasok/store', [PemasokController::class, 'store'])->name('pemasok.store');

    Route::get('/restok/create', [RestokController::class, 'create'])->name('restok.create');
    Route::post('/restok/store', [RestokController::class, 'store'])->name('restok.store');
    Route::get('/restok', [RestokController::class, 'index'])->name('restok.index');
});

Route::group(['middleware' => ['auth.cart']], function () {
    Route::put('/cart/updatequantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
    Route::resource('cart', 'App\Http\Controllers\Cartcontroller');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    // Route::get('/order/status', [UserMutasiController::class, 'status'])->name('order.status');
    // Route::get('/user/mutasi', [UserMutasiController::class, 'index'])->name('user.mutasi.index');





    Route::resource('/checkout', 'App\Http\Controllers\Checkoutcontroller');
    Route::post('/checkout', [Checkoutcontroller::class, 'checkout'])->name('checkout');



    Route::post('/return', [CheckoutController::class, 'return']);
});