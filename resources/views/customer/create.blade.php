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
                            <input type="text" name="cpf" maxlength="14" class="cpf form-control" value="{{ old('cpf') }}" required>
                            @error('cpf')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" class="form-control" placeholder="exemplo@domínio.com" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone (Comercial ou celular)</label>
                            <input type="text" name="phone" class="phone form-control" placeholder="(XX) XXXXX XXXX" value="{{ old('phone') }}" required>
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

    <script src="{{ asset('js/cleave.min.js') }}"></script>
    <script src="{{ asset('js/cleave-phone.br.js') }}"></script>

    <script>
        const inputPhone = document.querySelector('.phone');
        const cleavePhone = new Cleave(inputPhone, {
            phone: true,
            phoneRegionCode: 'BR'
        });
        const cpf = new Cleave('.cpf', {
            delimiters: ['.', '.', '-'],
            blocks: [3, 3, 3, 2],
            uppercase: true
        });
    </script>

@endsection
