@extends('layouts.welcome')

@section('content')

    <div class="row">
        <h3>Meu Carrinho</h3>
        <div class="col-12">
            <div class="col-6 m-0 m-auto">
                @foreach($itens as $item)
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{$item->image}}" alt="image" width="100">
                            </div>
                            <div class="col-9">
                                <strong>{{$item->name}}</strong>
                                <p>{{$item->brand}}</p>
                                <p>R$ {{$item->price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
