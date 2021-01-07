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
                        <div class="mt-5">
                            <h5>Endereço</h5>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cep_customer">CEP</label>
                                    <input value="{{ old('cep_customer') }}"
                                           type="text"
                                           name="cep_customer"
                                           placeholder="00000-000"
                                           class="cep_customer form-control @error('cep_customer') is-invalid @enderror"
                                           required>
                                    @error('cep_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="street_customer">Rua *</label>
                                    <input value="{{ old('street_customer') }}"
                                           type="text"
                                           name="street_customer"
                                           class="form-control street_customer @error('street_customer') is-invalid @enderror"
                                           required
                                           readonly>
                                    @error('street_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="number_customer">Número*</label>
                                    <input value="{{ old('number_customer') }}"
                                           type="text"
                                           name="number_customer"
                                           maxlength="20"
                                           class="form-control number_customer @error('number_customer') is-invalid @enderror"
                                           required>
                                    @error('number_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="complement_customer">Complemento *</label>
                                    <input value="{{ old('complement_customer') }}"
                                           type="text"
                                           id="complement_customer"
                                           name="complement_customer"
                                           class="form-control complement_customer @error('complement_customer') is-invalid @enderror"
                                           required>
                                    @error('complement_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="district_customer">Bairro *</label>
                                    <input value="{{ old('district_customer') }}"
                                           type="text"
                                           name="district_customer"
                                           class="form-control district_customer @error('district_customer') is-invalid @enderror"
                                           required
                                           readonly>
                                    @error('district_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="city_customer">Cidade *</label>
                                    <input value="{{ old('city_customer') }}"
                                           type="text"
                                           name="city_customer"
                                           class="form-control city_customer @error('city_customer') is-invalid @enderror"
                                           required
                                           readonly>
                                    @error('city_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="state_customer">UF *</label>
                                    <input value="{{ old('state_customer') }}"
                                           type="text"
                                           name="state_customer"
                                           class="form-control state_customer @error('state_customer') is-invalid @enderror"
                                           required
                                           readonly>
                                    @error('state_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="country_customer">País *</label>
                                    <select name="country_customer"
                                            class="form-control @error('country_customer') is-invalid @enderror">
                                        <option value="BRA" checked>Brasil</option>
                                    </select>
                                    @error('country_customer')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
