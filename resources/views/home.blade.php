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
    <h1>List of trains</h1>

    <ul>

        @foreach ($trains as $train)
            {{ $cancelled = $train->cancelled == 1 ? true : false }}

            <li class="{{ $cancelled ? 'bg-danger' : '' }}">

                <span>{{ $cancelled
                    ? 'This train was cancelled'
                    : ($train->in_time == 1
                        ? 'In time'
                        : ($train->late_time .= ' minutes late')) }}
                </span>

                <h3 class="d-block">{{ $train->company }}</h3>
                <h5 class="d-block">{{ $train->train_code }} </h5>

                <span class="d-block">Departure on: {{ $train->departure_date }}</span>
                <span class="d-block">From: {{ $train->departure_station }}</span>
                <span class="d-block">At: {{ $train->departure_time }}</span>

                <span class="d-block">Arrival in: {{ $train->arrival_station }}</span>
                <span class="d-block">At: {{ $train->arrival_time }}</span>
                <span>{{ $train->price }}€</span>

            </li>
        @endforeach

    </ul>

</body>

</html>
