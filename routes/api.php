<?php

use App\Http\Controllers\OutletController;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Request;

Route::get('outlet', [OutletController::class, 'index'])->name('outlet.index'); //ambil data
Route::post('addOutlet', [OutletController::class, 'store'])->name('outlet.store'); //input data
Route::patch('updateOutlet/{id}', [OutletController::class, 'update'])->name('outlet.update'); //update data
Route::delete('delOutlet/{id}', [OutletController::class, 'destroy'])->name('outlet.destroy'); //delete data

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
