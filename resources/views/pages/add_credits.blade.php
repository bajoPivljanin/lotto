@extends('layout')

@section('content')
    <form class="container mt-5 mb-4 col-12 col-lg-4" action="{{route("credits.add")}}" method="post">
        {{csrf_field()}}

        <div>
            <label class="mb-2" for="">Select card</label>
            <select name="credit_card" id="" class="form-select mb-2">
                <option value="" disabled selected >Select your card</option>
                @foreach (auth()->user()->cards as $card)
                    <option value="{{$card->id}}">{{$card->card_number}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label class="mb-2" for="credits">Amount of credits</label>
            <select name="credits" id="credits" class="form-select">
                @for($i = 1; $i <= 10; $i++)
                    @php
                        $credits_amount = $i * env('CREDITS_QUANTIFIER');
                    @endphp
                    <option value="{{$credits_amount}}">{{$credits_amount}} credits (price:{{($credits_amount)*env('CREDITS_VALUE_RSD')}}rsd)</option>
                @endfor
            </select>
        </div>
        <button class="btn btn-primary mt-2">Add credits</button>
    </form>
@endsection
