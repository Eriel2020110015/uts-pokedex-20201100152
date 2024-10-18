<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }


    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|max:999999.99',
            'height' => 'numeric|max:999999.99',
            'hp' => 'integer|min:0|max:9999',
            'attack' => 'integer|min:0|max:9999',
            'defense' => 'integer|min:0|max:9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $pokemon = new Pokemon($request->all());

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $pokemon->photo = $path;
        }

        $pokemon->save();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully.');
    }

    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact('pokemon'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'numeric|max:999999.99',
            'height' => 'numeric|max:999999.99',
            'hp' => 'integer|min:0|max:9999',
            'attack' => 'integer|min:0|max:9999',
            'defense' => 'integer|min:0|max:9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $pokemon->fill($request->all());

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $pokemon->photo = $path;
        }

        $pokemon->save();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully.');
    }
}
