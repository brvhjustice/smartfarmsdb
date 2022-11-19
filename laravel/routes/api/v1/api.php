<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//getting products
Route::group(['namespace' => 'Api\V1'], function () {
    Route::group(['prefix' => 'products'], function () {
        Route::get('adbanner', 'ProductsController@get_adbanners');
        Route::get('recommended', 'ProductsController@get_recommended_products');
    });

    //registration and login
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){
        Route::post('register', 'CustomerAuthController@register');
        Route::post('login', 'CustomerAuthController@login');
        Route::get('users', 'CustomerAuthController@login');
    });
});

