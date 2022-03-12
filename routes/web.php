<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\OutletController;

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

// Route::get('/', function () {
//     return view('/login/index_login');
// });

// Route::get('/register', function() {
//     return view('/register/index_register');
// });

Route::get('home', function() {
    return view('home');
});

Route::get('/', [UserController::class,'show_login']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class,'show_register']);
Route::post('/register_process', [UserController::class, 'register']);

Route::get('/member', [MemberController::class,'tampilall']); 
Route::get('/member/add_member', [MemberController::class,'show_add']);
Route::post('/member/add', [MemberController::class,'tambah']);
Route::delete('/member/{id}', [MemberController::class,'destroy']);
Route::get('/member/edit/{id}', [MemberController::class,'show_edit']);
Route::patch('/member/{id}', [MemberController::class,'update']);

Route::get('/paket', [PaketController::class,'tampilall']); 
Route::get('/paket/add_paket', [PaketController::class,'show_add']);
Route::post('/paket/add', [PaketController::class,'tambah']);
Route::delete('/paket/{id}', [PaketController::class,'destroy']);
Route::get('/paket/edit/{id}', [PaketController::class, 'show_edit']);
Route::patch('/paket/{id}', [PaketController::class, 'update']);

Route::get('/transaksi', [TransaksiController::class,'tampilall']);
Route::get('/transaksi/add_transaksi', [TransaksiController::class,'show_add']);
Route::post('/transaksi/add', [TransaksiController::class,'tambah']);
Route::delete('/transaksi/{id}', [TransaksiController::class,'destroy']);
Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'show_edit']);
Route::patch('/transaksi/{id}', [TransaksiController::class, 'update']);

Route::get('/outlet', [OutletController::class,'tampilall']);
Route::get('/outlet/add_outlet', [OutletController::class,'show_add']);
Route::post('/outlet/add', [OutletController::class, 'tambah']);
Route::delete('/outlet/{id}', [OutletController::class, 'destroy']);
Route::get('/outlet/edit/{id}', [OutletController::class, 'show_edit']);
Route::patch('/outlet/{id}', [OutletController::class, 'update']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
