<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailsController;
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

Route::middleware('api')->prefix('v1')->group(function(){           // no authentication
//Route::middleware('auth:api')->prefix('v1')->group(function(){        // with token authentication
    
    Route::apiResource('/emails', EmailsController::class);

    Route::post('/emails', [EmailsController::class, 'store']);
    
});
