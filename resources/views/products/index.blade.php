@extends('layouts.welcome')

@section('content')
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-4">
                <div class="card">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        <p class="card-text">{{$product->brand}}</p>
                        <h5>R$ {{$product->price}}</h5><small>ou</small><h5>10X R$ {{ str_replace('.', ',', $product->price / 10) }}</h5>
                        <a href="{{ route('produto.show', $product->id) }}" class="btn btn-primary btn-sm">Comprar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
