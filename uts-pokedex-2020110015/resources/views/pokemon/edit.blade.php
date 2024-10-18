<!-- resources/views/pokemons/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pokémon: {{ $pokemon->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pokemon.update', $pokemon) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $pokemon->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="species">Species</label>
                <input type="text" name="species" class="form-control" value="{{ old('species', $pokemon->species) }}">
                @error('species')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="primary_type">Primary Type</label>
                <select name="primary_type" class="form-control">
                    <option value="Grass" {{ old('primary_type', $pokemon->primary_type) == 'Grass' ? 'selected' : '' }}>
                        Grass</option>
                    <option value="Fire" {{ old('primary_type', $pokemon->primary_type) == 'Fire' ? 'selected' : '' }}>
                        Fire</option>
                    <option value="Water" {{ old('primary_type', $pokemon->primary_type) == 'Water' ? 'selected' : '' }}>
                        Water</option>
                    <option value="Bug" {{ old('primary_type', $pokemon->primary_type) == 'Bug' ? 'selected' : '' }}>Bug
                    </option>
                    <option value="Normal" {{ old('primary_type', $pokemon->primary_type) == 'Normal' ? 'selected' : '' }}>
                        Normal</option>
                    <option value="Poison" {{ old('primary_type', $pokemon->primary_type) == 'Poison' ? 'selected' : '' }}>
                        Poison</option>
                    <option value="Electric"
                        {{ old('primary_type', $pokemon->primary_type) == 'Electric' ? 'selected' : '' }}>Electric</option>
                    <option value="Ground" {{ old('primary_type', $pokemon->primary_type) == 'Ground' ? 'selected' : '' }}>
                        Ground</option>
                    <option value="Fairy" {{ old('primary_type', $pokemon->primary_type) == 'Fairy' ? 'selected' : '' }}>
                        Fairy</option>
                    <option value="Fighting"
                        {{ old('primary_type', $pokemon->primary_type) == 'Fighting' ? 'selected' : '' }}>Fighting</option>
                    <option value="Psychic"
                        {{ old('primary_type', $pokemon->primary_type) == 'Psychic' ? 'selected' : '' }}>Psychic</option>
                    <option value="Rock" {{ old('primary_type', $pokemon->primary_type) == 'Rock' ? 'selected' : '' }}>
                        Rock</option>
                    <option value="Ghost" {{ old('primary_type', $pokemon->primary_type) == 'Ghost' ? 'selected' : '' }}>
                        Ghost</option>
                    <option value="Ice" {{ old('primary_type', $pokemon->primary_type) == 'Ice' ? 'selected' : '' }}>Ice
                    </option>
                    <option value="Dragon" {{ old('primary_type', $pokemon->primary_type) == 'Dragon' ? 'selected' : '' }}>
                        Dragon</option>
                    <option value="Dark" {{ old('primary_type', $pokemon->primary_type) == 'Dark' ? 'selected' : '' }}>
                        Dark</option>
                    <option value="Steel" {{ old('primary_type', $pokemon->primary_type) == 'Steel' ? 'selected' : '' }}>
                        Steel</option>
                    <option value="Flying" {{ old('primary_type', $pokemon->primary_type) == 'Flying' ? 'selected' : '' }}>
                        Flying</option>
                </select>
                @error('primary_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="weight">Weight</label>
                <input type="number" name="weight" step="0.01" class="form-control"
                    value="{{ old('weight', $pokemon->weight) }}">
                @error('weight')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="height">Height</label>
                <input type="number" name="height" step="0.01" class="form-control"
                    value="{{ old('height', $pokemon->height) }}">
                @error('height')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="hp">HP</label>
                <input type="number" name="hp" class="form-control" value="{{ old('hp', $pokemon->hp) }}"
                    min="0" max="9999">
                @error('hp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="attack">Attack</label>
                <input type="number" name="attack" class="form-control" value="{{ old('attack', $pokemon->attack) }}"
                    min="0" max="9999">
                @error('attack')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="defense">Defense</label>
                <input type="number" name="defense" class="form-control" value="{{ old('defense', $pokemon->defense) }}"
                    min="0" max="9999">
                @error('defense')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="form-check my-3">
                    <input type="checkbox" name="is_legendary" class="form-check-input" value="1" id="is_legendary"
                        {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_legendary">
                        Is Legendary
                    </label>
                </div>
                @error('is_legendary')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="photo">Photo</label>
                <input type="file" name="photo" class="form-control" accept="image/*">
                @if ($pokemon->photo)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $pokemon->photo)) }}" alt="Current Photo"
                        style="max-width: 100px; max-height: 100px;">
                @endif
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn mt-3 btn-success">Update Pokémon</button>
        </form>
    </div>
@endsection
