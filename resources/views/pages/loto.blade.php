@extends('layout')
@section('content')
    <form class="container mb-5 mt-5" action="{{route("loto.buy")}}" method="post">
        {{csrf_field()}}
        <div class="d-flex text-center">
            @for($i = 0; $i < 7;$i++)
                <input style="width: 50px;" class="form-label pl-2" type="number" name="numbers[]" value="{{rand(0,100)}}"> 
            @endfor
        </div>
        <button class="btn btn-outline-primary mt-2">Buy loto ticket</button>
    </form>
@endsection