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

const cepCustomer = new Cleave('.cep_customer', {
    delimiter: '-',
    blocks: [5, 3]
})

let apiCep = ``

document.querySelector('.cep_customer').addEventListener('keyup', () => {
    const cepSemFormatacao = cepCustomer.getRawValue()
    apiCep = `https://viacep.com.br/ws/${cepSemFormatacao}/json/`
})

document.querySelector('.cep_customer').addEventListener('focusout', () => {
    const endereco = fetch(apiCep)
        .then(response => response.text())
        .catch(error => console.log('erro'))

    endereco.then(result => {
        const resultado = JSON.parse(result)
        if (resultado.erro) {
            alert('CEP inválido. Por favor, informe o CEP correto.')
            document.querySelector('.cep_customer').focus()
            return
        }
        document.querySelector('.street_customer').value = resultado.logradouro
        document.querySelector('.district_customer').value = resultado.bairro
        document.querySelector('.city_customer').value = resultado.localidade
        document.querySelector('.state_customer').value = resultado.uf
    })
})
