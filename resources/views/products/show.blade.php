@extends('layouts.welcome')

@section('content')

    <div class="row">
        <div class="col-6">
            <p>Nome do produto: <strong>{{$product->name}}</strong></p>
            <p>Marca: <strong>{{$product->brand}}</strong></p>
            <h4>Valor: R$ <strong>{{$product->price}}</strong></h4>
            <p>ou 10X R$ <strong>{{$product->price / 10}}</strong></p>
            <form method="POST" action="{{route('carrinho.store')}}">
                @csrf
                <input type="hidden" name="item" value="{{$product->id}}">
                <button class="btn btn-success btn-sm">Adicionar ao carrinho</button>
            </form>
        </div>
    </div>

@endsection
