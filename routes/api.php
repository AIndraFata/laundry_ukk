<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetilTransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::get('user', [UserController::class,'getAuthenticatedUser'])->middleware('jwt.verify');
Route::post('logout', [UserController::class,'logout']);

Route::group(['middleware'=>['jwt.verify:admin']], function(){

    Route::get('admin', [UserController::class,'getprofileadmin']);

    Route::post('member', [MemberController::class,'store']);
    Route::get('member', [MemberController::class,'tampilall']);
    Route::get('member/{id}',[MemberController::class,'tampil']);
    Route::put('member/{id}', [MemberController::class,'update']);
    Route::delete('member/{id}', [MemberController::class,'destroy']);
    
    Route::post('transaksi', [TransaksiController::class,'store']);
    Route::get('transaksi', [TransaksiController::class,'tampilall']);
    Route::get('transaksi/{id}', [TransaksiController::class,'tampil']);
    Route::put('transaksi/{id}', [TransaksiController::class,'update']);
    Route::delete('transaksi/{id}', [TransaksiController::class,'destroy']);
    
    Route::post('paket', [PaketController::class,'store']);
    Route::get('paket', [PaketController::class,'tampilall']);
    Route::get('paket/{id}', [PaketController::class,'tampil']);
    Route::put('paket/{id}', [PaketController::class,'update']);
    Route::delete('paket/{id}', [PaketController::class,'destroy']);
    
});

Route::group(['middleware'=>['jwt.verify:kasir']], function(){

    Route::get('kasir', [UserController::class,'getprofilekasir']);

    Route::post('member', [MemberController::class,'store']);
    Route::get('member', [MemberController::class,'tampilall']);
    Route::get('member/{id}', [MemberController::class,'tampil']);
    Route::put('member/{id}', [MemberController::class,'update']);
    Route::delete('member/{id}', [MemberController::class,'destroy']);

    Route::post('transaksi', 'TransaksiController@store');

});

Route::group(['middleware'=>['jwt.verify:owner']], function(){
    
    Route::get('owner', [UserController::class,'getprofileowner']);

});

Route::get('detil_transaksi',   'DetilTransaksiController@tampilall');

Route::get('book',              'LoginController@login');

Route::post('guru',             'GuruController@store');

Route::get('loginAuth',         'LoginController@loginAuth')->middleware('jwt.verify');
