<?php

use Illuminate\Http\Request;

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

//Add Money to User's Wallet
Route::put('wallets/{user_id}/add-money/{amount}', 'WalletController@addMoney');
//Get User' Wallet Balance
Route::get('wallets/{user_id}/balance', 'WalletController@balance');
