@extends('layout')

@section('content')
    <form class="container mt-5 mb-5" method="POST" action="{{route("profile.save")}}">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <h1>Moj nalog</h1>
        <div>
            <label for="email" class="form-label">Email</label>
            <input class="form-control" name="email" type="text" id="email" value="{{Auth::user()->email}}">
        </div>
        <div class="mt-3">
            <label for="name" class="form-label">Name</label>
            <input class="form-control" name="name" type="text" id="name" value="{{Auth::user()->name}}">
        </div>
        <div class="mt-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" name="password" type="password" autocomplete="false" id="password" placeholder="Enter your new password">
        </div>
        <button class="btn btn-outline-primary mt-3">Enter</button>
    </form>

    <form class="container mt-5 mb-5" method="POST" action="{{route("cards.save")}}">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <h1>Moje kartice</h1>
        @foreach (Auth::user()->cards as $credit_card)
            <p>{{$credit_card->card_number}} - {{$credit_card->cvv}} - {{$credit_card->expiry}}</p>
        @endforeach
        <div>
            <label for="card_number" class="form-label">Card number</label>
            <input class="form-control" name="card_number" type="number" id="card_number" value="{{old("card_number")}}">
        </div>
        <div class="mt-3">
            <label for="cvv" class="form-label">CVV</label>
            <input class="form-control" name="cvv" type="text" id="cvv" value="{{old("cvv")}}">
        </div>
        <div class="mt-3">
            <label for="expiry" class="form-label">Expiry month</label>
            <select class=" form-select" name="expiry_month" id="">
                @for($i = 1;$i <= 12; $i++){
                      <option>{{$i}}</option>  
                }
                @endfor
            </select>
        </div>
        <div class="mt-3">
            <label for="expiry" class="form-label">Expiry year</label>
            <select class="form-select" name="expiry_year" id="">
                @for($i = 0;$i <= 5; $i++){
                    <option>{{date('Y')+$i}}</option>  
              }
              @endfor
            </select>
        </div>
            

        </div>
        <button class="btn btn-outline-primary mt-3">Enter</button>
    </form>
@endsection