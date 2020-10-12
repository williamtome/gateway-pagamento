@extends('layouts.welcome')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Pagamento</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Crédito</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active mt-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{route('cliente.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="brand" id="bandeira">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_number">Número do Cartão</label>
                                            <input type="text" name="card_number" maxlength="16" class="form-control" required>
                                            @error('card_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_name">Nome impresso no cartão</label>
                                            <input type="text" name="card_name" class="form-control" required>
                                            @error('card_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_validate">Validade</label>
                                            <input type="text" name="card_validate" class="form-control" required>
                                            @error('card_validate')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_cvv">Código de segurança</label>
                                            <input type="text" name="card_cvv" class="form-control" required>
                                            @error('card_cvv')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="installments">Parcelamento</label>
                                    <select name="installments" class="form-control" required></select>
                                    @error('installments')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Bandeiras aceitas</label>
                                    <div id="brands"></div>
                                </div>
                                <h5>informações de fatura</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input type="text" name="cep" class="form-control @error('cep') is-invalid @enderror" required>
                                            @error('cep')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="address">Endereço *</label>
                                            <input type="text" id="address" name="address" class="form-control address @error('address') is-invalid @enderror" required readonly>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Número*</label>
                                            <input type="text" name="numero" maxlength="20" class="form-control numero @error('numero') is-invalid @enderror" required>
                                            @error('numero')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="complemento">Complemento *</label>
                                            <input type="text" id="complemento" name="complemento" class="form-control complemento @error('complemento') is-invalid @enderror" required>
                                            @error('complemento')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="bairro">Bairro *</label>
                                            <input type="text" id="bairro" name="bairro" class="form-control bairro @error('bairro') is-invalid @enderror" required readonly>
                                            @error('bairro')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cidade">Cidade *</label>
                                            <input type="text" id="cidade" name="cidade" class="form-control cidade @error('cidade') is-invalid @enderror" required readonly>
                                            @error('cidade')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="uf">UF *</label>
                                            <input type="text" id="uf" name="uf" class="form-control uf @error('uf') is-invalid @enderror" required readonly>
                                            @error('uf')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="pais">País *</label>
                                            <select name="pais" class="form-control @error('pais') is-invalid @enderror">
                                                <option value="BRA" checked>Brasil</option>
                                            </select>
                                            @error('pais')
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
                                <button type="submit" id="btn-form-credit" class="btn btn-success btn-block">Pagar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ config('app.pagseguro.url_js') }}"></script>
    <script>
        // Obter sessão do PagSeguro:
        fetch("{{ route('pagamento.pagseguro.credenciais') }}")
            .then(response => {
                response.text().then(hash => {
                    PagSeguroDirectPayment.setSessionId(hash);
                })
            })
            .catch(error => console.log(error));
    </script>

@endsection
