@extends('layout')
@section('content')

    <div class="container mt-3">
        <button class="btn btn-danger" onclick="getRandomNumbers()">Generate random combination</button>
    </div>

    <form id="rndNumbers" class="container mb-5 mt-3" action="{{route("loto.buy")}}" method="post"> 
        {{csrf_field()}}        
        <div class="d-flex text-center">
            @for($i = 0; $i < 7;$i++)
                <input style="width: 50px;" class="form-label pl-2" type="number" name="numbers[]" value="{{rand(0,100)}}"> 
            @endfor
        </div>
        <button class="btn btn-outline-primary mt-2">Buy loto ticket</button>
    </form>
    <script>
        function getRandomNumbers(){
            const AMOUNT = 8;
            const BOTTOMRANGE = 1;
            const TOPRANGE = 100;
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