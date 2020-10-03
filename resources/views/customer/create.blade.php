@extends('layouts.welcome')

@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{route('cliente.store')}}" method="post">
                @csrf
                <h1>Cadastro</h1>
                <small>Por favor, insira os seus dados antes de efetuar o pagamento.</small>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" maxlength="11" class="form-control" required>
                            @error('cpf')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" name="name" class="form-control" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone (Comercial ou celular)</label>
                            <input type="text" name="phone" class="form-control" required>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <strong>Produto</strong>
                        <p>{{$product->name}}</p>
                        <strong>Marca</strong>
                        <p>{{$product->brand}}</p>
                        <strong>Valor</strong>
                        <p>R$ {{$product->price}}</p>
                        <button type="submit" class="btn btn-block btn-success">Próximo</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
