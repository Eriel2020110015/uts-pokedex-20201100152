<?php

use App\Http\Controllers\PokedexController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PokemonController;

Route::get('/', PokedexController::class);

Route::resource('pokemon', PokemonController::class)->only('show');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('pokemon', PokemonController::class)->except('show');
});
