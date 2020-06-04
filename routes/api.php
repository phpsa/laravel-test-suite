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

Route::group([
    //https://laravel.com/docs/5.7/routing#rate-limiting
    'middleware' => [],
    'as'         => 'api.',
    'namespace'  => 'Api',
], function () {
    Route::apiresource('user', 'UserController')->only(['index','store','destroy','show','update']);
});
