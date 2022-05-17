function validarForm() {

    const MSG_ERRO = document.getElementById('msg-erro')
    const ALL_INPUTS = document.querySelectorAll('input')

    ALL_INPUTS.forEach((ALL_INPUTS, i) => {
        if (ALL_INPUTS.value === '') {
            event.preventDefault()
            MSG_ERRO.style.display = 'block'
            ALL_INPUTS.classList.add('is-invalid')
            window.scrollTo(0, 0)
            setTimeout(function () {
                MSG_ERRO.style.display = 'none'
            }, 5000);

        } else {
            ALL_INPUTS.classList.add('is-valid')
        }
    })
}