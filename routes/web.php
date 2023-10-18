<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;


Route::get('/', function (){
    return redirect()->route('index');
});

Route::get('index',[FormularioController::class,'index'])->name('index');
Route::post('store',[FormularioController::class,'store'])->name('store');
