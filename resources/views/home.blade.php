<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
                
                <span>{{ $cancelled ? 'This train was cancelled' :
                    ($train->in_time == 1 ?
                    'In time' :
                    'Late') }}
                </span>

                <h3 class="d-block" >{{ $train->company }}</h3>
                <h5 class="d-block" >{{ $train->train_code }} </h5>

                <span class="d-block" >Departure in: {{ $train->departure_date }}</span>
                <span class="d-block" >From: {{ $train->departure_station}}</span>
                <span class="d-block" >At: {{ $train->departure_time }}</span>

                <span class="d-block" >Arrive to: {{ $train->arrival_station}}</span>
                <span class="d-block" >At: {{ $train->arrival_time }}</span>

            </li>
        @endforeach

    </ul>

</body>
</html>