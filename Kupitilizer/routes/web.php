<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestPenjemputanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


//For view only
Route::get('/statuspenjemputanuser', function () {
    return view('statuspenjemputanuser');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/requestjemput', function () {
        return view('requestPenjemputan');
    });

    Route::post('/requestjemput/create', [RequestPenjemputanController::class, 'create'])->name('penjemputan.create');
    
    Route::get('/statuspermintaan', function () {
        return view('statusPermintaanUser');
    });

    Route::get('/coupon', function () {
        return view('coupon');
    });

    Route::get('/market', function () {
        return view('market');
    });

    Route::get('/setting', [ProfileController::class, 'setting']);

    Route::middleware(['user-access:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'adminDashboard']);
        Route::get('/admin/requestjemput', [RequestPenjemputanController::class, 'index']);
        Route::get('/admin/pembelian', [PembelianController::class, 'index']);
        Route::get('/admin/product', [ProductController::class, 'index']);
        Route::get('/admin/coupon', [CouponController::class, 'index']);
        Route::get('/admin/manageuser', [UserController::class, 'manageUser']);
    });

    Route::middleware(['user-access:manager'])->group(function () {
        Route::get('/manager', [ManagerController::class, 'managerDashboard']);
        Route::get('/manager/requestjemput', [RequestPenjemputanController::class, 'index']);
        Route::get('/manager/pembelian', [PembelianController::class, 'index']);
        Route::get('/manager/product', [ProductController::class, 'index']);
        Route::get('/manager/coupon', [CouponController::class, 'index']);
        Route::get('/manager/manageadmin', [AdminController::class, 'manageAdmin']);
        Route::get('/manager/manageuser', [UserController::class, 'manageUser']);
    });

    Route::middleware(['user-access:user'])->group(function () {
        Route::get('/user', [UserController::class, 'userHome']);
    });
});

require __DIR__.'/auth.php';
