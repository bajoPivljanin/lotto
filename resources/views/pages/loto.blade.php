@extends('layout')
@section('content')

    <div class="container mt-5 text-center">
        <button class="btn btn-outline-secondary" onclick="getRandomNumbers()">Generate random combination</button>
    </div>

    @include('partials.errors')
    <form class="container mb-5 mt-3" action="{{route("loto.buy")}}" method="post">
        {{ csrf_field() }}
        <p class="text-primary">{{\Illuminate\Support\Facades\Session::get('message')}}</p>

        <div class="d-flex justify-content-center gap-5 my-5 py-5" id="rndNumbers">
            @for($i = 0; $i < 7;$i++)
                <input style="width: 6rem;" class="fs-1 form-control" type="number" name="numbers[]" value="{{rand(1,99)}}" max="99" min="1">
            @endfor
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-outline-primary mt-2">Buy loto ticket</button>
            <p class="lead mt-5">You have {{ auth()->user()->credits ?? 0 }} credits.</p>
            <p class="lead mt-2">A ticket will cost {{ env('TICKET_PRICE_CREDITS') }} credits.</p>
        </div>
    </form>
    <script>
        function getRandomNumbers(){
            const AMOUNT = 8;
            const BOTTOMRANGE = 1;
            const TOPRANGE = 99;
            let numbers = [];

            for(let i = 0;i < AMOUNT;i++){
                let rndNumber = Math.floor(Math.random()*TOPRANGE)+BOTTOMRANGE;
                numbers.push(rndNumber);
            }

            let div = document.getElementById('rndNumbers')
            let inputs = div.querySelectorAll('input')

            for(let i = 0;i < AMOUNT;i++){
                inputs[i].value = numbers[i]
            }
        }
    </script>
@endsection
