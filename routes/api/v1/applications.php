<?php

use Illuminate\Support\Facades\Route;
/**
* Not implemented authentication - considering its not part of the requirement
*/
Route::name('emails.')
->namespace("\App\Http\Controllers")
->group(function () {
    Route::get('/emails', [\App\Http\Controllers\EmailsController::class, 'index'])->name('index'); 
    Route::post('/emails', [\App\Http\Controllers\EmailsController::class, 'store'])->name('store');

});
