import '@/bootstrap';

const cpf = document.querySelector('#cpf')

cpf.addEventListener('keypress', () => {
    let cpflength = cpf.value.length

    if (cpflength === 3 || cpflength === 7) {
        cpf.value += '.'

    } else if (cpflength === 11){
        cpf.value += '-'

    }

})


const phone = document.querySelector('#phone')

phone.addEventListener('keypress', () => {
    let phonelength = phone.value.length

    if (phonelength === 0) {
        phone.value += '('

    } else if (phonelength === 3){
        phone.value += ') '

    }else if (phonelength === 10){
        phone.value += '-'

    }

})






