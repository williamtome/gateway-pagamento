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
                    <form action="{{route('pagamento.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="brand" id="brand">
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
                                            <label for="number">Número*</label>
                                            <input type="text" name="number" maxlength="20" class="form-control number @error('number') is-invalid @enderror" required>
                                            @error('number')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="complement">Complemento *</label>
                                            <input type="text" id="complement" name="complement" class="form-control complement @error('complement') is-invalid @enderror" required>
                                            @error('complement')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="district">Bairro *</label>
                                            <input type="text" id="district" name="district" class="form-control district @error('district') is-invalid @enderror" required readonly>
                                            @error('district')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="city">Cidade *</label>
                                            <input type="text" id="city" name="city" class="form-control city @error('city') is-invalid @enderror" required readonly>
                                            @error('city')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="state">UF *</label>
                                            <input type="text" id="state" name="state" class="form-control state @error('state') is-invalid @enderror" required readonly>
                                            @error('state')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="country">País *</label>
                                            <select name="country" class="form-control @error('country') is-invalid @enderror">
                                                <option value="BRA" checked>Brasil</option>
                                            </select>
                                            @error('country')
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
        const urlBrandsPS = 'https://stc.pagseguro.uol.com.br'
        const divBrands = document.querySelector('#brands')
        const createImgTag = (url, text) => {
            const img = document.createElement('img')
            img.src = url
            img.alt = text
            return img
        }

        fetch("{{ route('pagamento.pagseguro.credenciais') }}")
            .then(response => response.text())
            .then(hash => {
                PagSeguroDirectPayment.setSessionId(hash);
                obterMeiosDePagamento();
            })
            .catch(error => console.log(error));

        function obterMeiosDePagamento() {
            PagSeguroDirectPayment.getPaymentMethods({
                amount: {{ $product->price }},
                success: function(response) {
                    const options = response.paymentMethods.CREDIT_CARD.options;
                    const results = Object.entries(options);
                    for (let i = 0; results.length > i; i++) {
                        let nameBrand = results[i][0]
                        if(nameBrand == 'ELO' || nameBrand == 'MASTERCARD' || nameBrand == 'VISA' || nameBrand == 'HIPERCARD'){
                            const brandImage = createImgTag(urlBrandsPS + results[i][1].images.MEDIUM.path, nameBrand)
                            divBrands.appendChild(brandImage);
                        }
                    };
                },
                error: function(resopnse) {
                    if (resopnse.error === true) {
                        alert('Desculpe, houve um erro ao tentar obter as opções de pagamento.');
                    }
                }
            });
        }
    </script>

@endsection
