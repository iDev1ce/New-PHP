const validarLetrasNumeros = (caracter, block_numbers, block_letters) => {

    let asc = "";

    if (window.event)
        asc = caracter.charCode;
    else
        asc = caracter.which;

    console.log(asc);

    //Validação de caracteres de acordo com a tabela ASCII
    if (block_numbers) {
        if (asc >= 48 && asc <= 57)
            return false;
    }

    if (block_letters) {
        if (!(asc >= 48 && asc <= 57))
            return false;
    }

    return true;
}