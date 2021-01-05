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
                        <input value="{{ old('brand') }}" type="hidden" name="brand" id="brand">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_number">Número do Cartão</label>
                                            <input value="{{ old('card_number') }}" type="text" name="card_number" maxlength="16" class="form-control" required>
                                            @error('card_number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_name">Nome impresso no cartão</label>
                                            <input value="{{ old('card_name') }}" type="text" name="card_name" class="card_name form-control" required>
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
                                            <input value="{{ old('card_validate') }}" type="text" name="card_validate" class="card_validate form-control" placeholder="MM/AAAA" required>
                                            @error('card_validate')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="card_cvv">Código de segurança</label>
                                            <input value="{{ old('card_cvv') }}" type="text" name="card_cvv" class="form-control card_cvv" placeholder="Ex: 123" maxlength="3" required>
                                            @error('card_cvv')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="installments">Parcelamento</label>
                                            <select name="installments" value="{{ old('installments') }}" class="form-control" required></select>
                                            @error('installments')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="birth_date">Data de Nascimento</label>
                                            <input type="text" name="birth_date" placeholder="dd/mm/aaaa" class="form-control birth_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Bandeiras aceitas</label>
                                    <div id="brands"></div>
                                </div>

                                <div class="row mt-3 mb-3">
                                    <div class="col-12">
                                        <div class="form-group text-center">
                                            <label class="checkbox-inline">
                                                <strong>O seu endereço de entrega é o mesmo que o endereço da fatura?</strong>
                                            </label>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input endereco-entrega-igual-endereco-fatura"
                                                    type="radio" name="endereco_entrega_igual_endereco_fatura"
                                                    value="S" required>
                                                <label class="form-check-label">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input endereco-entrega-igual-endereco-fatura"
                                                    type="radio" name="endereco_entrega_igual_endereco_fatura"
                                                    value="N">
                                                <label class="form-check-label">Não</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5>informações de fatura</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cep">CEP</label>
                                            <input value="{{ old('cep') }}" type="text" name="cep" placeholder="00000-000" class="cep form-control @error('cep') is-invalid @enderror" required>
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
                                            <input value="{{ old('address') }}" type="text" name="address" class="form-control address @error('address') is-invalid @enderror" required readonly>
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
                                            <input value="{{ old('number') }}" type="text" name="number" maxlength="20" class="form-control number @error('number') is-invalid @enderror" required>
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
                                            <input value="{{ old('complement') }}" type="text" id="complement" name="complement" class="form-control complement @error('complement') is-invalid @enderror" required>
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
                                            <input value="{{ old('district') }}" type="text" name="district" class="form-control district @error('district') is-invalid @enderror" required readonly>
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
                                            <input value="{{ old('city') }}" type="text" name="city" class="form-control city @error('city') is-invalid @enderror" required readonly>
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
                                            <input value="{{ old('state') }}" type="text" name="state" class="form-control state @error('state') is-invalid @enderror" required readonly>
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
    <script src="{{ asset('js/cleave.min.js') }}"></script>
    <script src="{{ asset('js/cleave-phone.br.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script>
        const validate = document.querySelector('.card_validate')
        const cleaveValidate = new Cleave(validate, {
            date: true,
            delimiter: '/',
            datePattern: ['m', 'Y']
        })
        const birthDate = document.querySelector('.birth_date')
        const cleaveBirthDate = new Cleave(birthDate, {
            date: true,
            delimiter: '/',
            datePattern: ['d', 'm', 'Y']
        })
        const cvv = document.querySelector('.card_cvv')
        const cleaveCVV = new Cleave(cvv, {
            numeral: true
        })
        const cep = new Cleave('.cep', {
            delimiter: '-',
            blocks: [5, 3]
        })
        const urlBrandsPS = 'https://stc.pagseguro.uol.com.br'
        let apiCep = ``
        document.querySelector('.cep').addEventListener('keyup', (ev) => {
            const cepSemFormatacao = cep.getRawValue()
            apiCep = `https://viacep.com.br/ws/${cepSemFormatacao}/json/`
        })
        const uppercaseCardName = document.querySelector('.card_name').addEventListener('keyup', function(event){
            this.value = event.target.value.toUpperCase()
        })
        const divBrands = document.querySelector('#brands')
        const brand = document.querySelector('#brand')
        const installmentsField = document.querySelector('[name="installments"]')
        const cardNumberField = document.querySelector('[name="card_number"]')
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
            .catch(error => {
                alert('Houve uma instabilidade nos serviços do PagSeguro. Tente novamente, mais tarde.')
                console.log('ERRO: ',error)
            });

        const obterMeiosDePagamento = () => {
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
                    if (resopnse.error) {
                        alert('Desculpe, houve um erro ao tentar obter as opções de pagamento.');
                    }
                }
            });
        }

        cardNumberField.addEventListener('change', () => {
            if (cardNumberField.value < 6) {
                alert('Número do cartão está inválido.')
                return;
            }

            PagSeguroDirectPayment.getBrand({
                cardBin: cardNumberField.value.substring(0, 6),
                success: response => {

                    brand.value = response.brand.name
                    const formatInstallmentAmount = (amount) => {
                        return amount.toLocaleString('pt-BR', {
                            minimumFractionDigits: 2,
                            style: "currency",
                            currency: "BRL"
                        })
                    }

                    PagSeguroDirectPayment.getInstallments({
                        amount: {{ $product->price }},
                        maxInstallmentNoInterest: {{ config('app.pagseguro.max_installment_no_interest') }},
                        brand: brand.value,
                        success: response => {
                            let installments = response.installments[brand.value]
                            const result = Object.entries(installments)
                            for (let i = 0; result.length > i; i++) {
                                let option = document.createElement('option')
                                if (parseInt({{ config('app.pagseguro.max_installment') }}) > i) {
                                    option.value = result[i][1].quantity + ',' + result[i][1].installmentAmount
                                    option.text = result[i][1].quantity + ' X de ' + formatInstallmentAmount(result[i][1].installmentAmount) + ' sem juros'
                                    installmentsField.add(option)
                                }
                            }
                        },
                        error: response => {
                            console.log('erro', response);
                        }
                    })
                },
                error: response => {
                    response.error === true
                        alert('Erro ao obter a bandeira do cartão.')
                }
            })

        })

        document.querySelector('.cep').addEventListener('focusout', () => {
            const endereco = fetch(apiCep)
                .then(response => response.text())
                .catch(error => console.log('erro'))

            endereco.then(result => {
                const resultado = JSON.parse(result)
                if (resultado.erro) {
                    alert('CEP inválido. Por favor, informe o CEP correto.')
                    console.log(this);
                    return
                }
                document.querySelector('.address').value = resultado.logradouro
                document.querySelector('.district').value = resultado.bairro
                document.querySelector('.city').value = resultado.localidade
                document.querySelector('.state').value = resultado.uf
            })
        })

        document.querySelector('.card_cvv').addEventListener('focusout', () => {
            PagSeguroDirectPayment.createCardToken({
                cardNumber: cardNumberField.value,
                brand: brand.value,
                cvv: cvv.value,
                expirationMonth: validate.value.substr(0, 2),
                expirationYear: validate.value.substr(3, 6),
                success: function (response) {
                    const token = response.card.token
                    const hash = PagSeguroDirectPayment.getSenderHash()
                    axios.post("{{ route('salvar-token-hash') }}", { token: token, hash: hash })
                        .then(res => {
                            if (res.data.success == false)
                                alert('Há problemas nos dados informados referentes ao seu cartão.')
                        })
                        .catch(err => console.error(err))
                },
                error: function (error) {
                    console.log('ERRO', error);
                }
            })

        })

    </script>

@endsection
