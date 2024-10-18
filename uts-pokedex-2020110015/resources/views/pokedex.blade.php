<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Pokedex</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($pokemons as $pokemon)
                <div class="col">
                    <div class="card ">
                        <a href="{{ route('pokemon.show', $pokemon->id) }}">
                            <img src="{{ !$pokemon->photo ? 'https://placehold.co/200' : asset('storage/' . str_replace('public/', '', $pokemon->photo)) }}"
                                class="card-img-top" alt="{{ $pokemon->name }}">
                        </a>
                        <div class="card-body">
                            <p class="text-start m-0 p-0">#{{ Str::padLeft($pokemon->id, 4, '0') }}</p>
                            <a href="{{ route('pokemon.show', $pokemon->id) }}">
                                <p class="text-start fw-bold fs-3 m-0 p-0">{{ $pokemon->name }}</p>
                            </a>
                            <p class="text-start m-0">
                                <span class="badge bg-success m-0">{{ $pokemon->primary_type }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $pokemons->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
