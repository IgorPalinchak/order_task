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
//Route::get('/', function () {
//    function($data){
//        $response = [
//            'success' => false,
//            'message' => 'Not Valid Route For Api',
//        ];
//        return response()->json($response, 400);
//    };
//});
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::post('register', 'API\RegisterController@register');
//Route::middleware('auth:api')->group( function () {
//    Route::resource('orders', 'API\OrderController');
//});

Route::resource('orders', 'API\OrderController');
