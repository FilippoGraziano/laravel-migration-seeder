<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

    {{-- assets vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>Trains</title>
</head>

<body>

    <header class="bg-body-secondary border-bottom mb-4">

        <div class="container">

            <h1 class="text-center py-4">List of trains</h1>

        </div>

    </header>

    <main class="container">

        <ul>

            @foreach ($trains as $train)
                @php

                    $cancelled_train = $train->cancelled == 1 ? true : false;
                    $in_late_train = $train->in_time == 0 ? true : false;

                @endphp

                <li
                    class="{{ $cancelled_train ? 'bg-danger-subtle ' : ($in_late_train ? 'bg-warning-subtle ' : '') }}card text-center mb-4">

                    <div
                        class="card-header pt-3{{ $cancelled_train ? ' bg-danger' : ($in_late_train ? ' bg-warning' : '') }}">

                        <h5 class="card-title{{ $cancelled_train ? ' text-light' : '' }}">{{ $train->company }}</h5>
                        <h6
                            class="card-subtitle {{ $cancelled_train ? ' text-light ' : ' text-body-secondary ' }} mb-2">
                            {{ $train->train_code }} </h6>

                    </div>

                    <div class="card-body">

                        <span
                            class="position-absolute top-0 start-50 translate-middle badge rounded-pill border border-light {{ $in_late_train ? 'bg-danger' : 'bg-success' }}">{{ $cancelled_train ? 'Cancelled' : ($train->in_time == 1 ? 'In time' : ($train->late_time .= ' minutes late')) }}
                        </span>

                        <span class="d-block">Departure on: {{ $train->departure_date }}</span>
                        <span class="d-block">From: {{ $train->departure_station }}</span>
                        <span class="d-block">At: {{ $train->departure_time }}</span>

                        <span class="d-block">Arrival in: {{ $train->arrival_station }}</span>
                        <span class="d-block">At: {{ $train->arrival_time }}</span>
                        <span>{{ $train->price }}€</span>
                    </div>

                </li>
            @endforeach

        </ul>

    </main>

</body>

</html>
