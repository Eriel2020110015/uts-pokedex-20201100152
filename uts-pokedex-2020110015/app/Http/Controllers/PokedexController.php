<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class PokedexController extends Controller
{
    public function __invoke()
    {
        $pokemons = Pokemon::paginate(9);

        return view('pokedex', compact('pokemons'));
    }
}
