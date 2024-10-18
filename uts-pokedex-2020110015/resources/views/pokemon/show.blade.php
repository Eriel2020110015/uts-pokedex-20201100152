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
        <h1 class="text-center mb-4">{{ $pokemon->name }}</h1>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
            <div class="container">
                <div class="card">
                    <div class="card-body text-center">
                        @if ($pokemon->photo)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $pokemon->photo)) }}"
                                alt="Photo" style="max-width: 200px; max-height: 200px;">
                        @endif
                        <br>

                        <table class="text-start">
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>#{{ Str::padLeft($pokemon->id, 4, '0') }}</td>
                            </tr>

                            <tr>
                                <td>Species</td>
                                <td>:</td>
                                <td>{{ $pokemon->species }}</td>
                            </tr>

                            <tr>
                                <td>Primary Type</td>
                                <td>:</td>
                                <td>{{ $pokemon->primary_type }}</td>
                            </tr>

                            <tr>
                                <td>Weight</td>
                                <td>:</td>
                                <td>{{ $pokemon->weight }}</td>
                            </tr>

                            <tr>
                                <td>Height</td>
                                <td>:</td>
                                <td>{{ $pokemon->height }}</td>
                            </tr>

                            <tr>
                                <td>HP</td>
                                <td>:</td>
                                <td>{{ $pokemon->hp }}</td>
                            </tr>

                            <tr>
                                <td>Attack</td>
                                <td>:</td>
                                <td>{{ $pokemon->attack }}</td>
                            </tr>

                            <tr>
                                <td>Defense</td>
                                <td>:</td>
                                <td>{{ $pokemon->defense }}</td>
                            </tr>

                            <tr>
                                <td>Legendary</td>
                                <td>:</td>
                                <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
                            </tr>

                        </table>

                    </div>
                    <a href="/" class="btn btn-primary">Back</a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
