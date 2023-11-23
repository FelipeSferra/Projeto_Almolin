function show_btn(id) {
    let Ant = document.querySelectorAll('.enable');
    Ant.forEach(function (btnAnt) {
        btnAnt.classList.remove('enable');
        btnAnt.setAttribute('disabled', '');
    })

    let btn = document.getElementById(id);
    btn.classList.add('enable');
    btn.removeAttribute('disabled');
}

function Delete(url) {
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Não será possível reverter essa ação!",
        icon: 'warning',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        preConfirm: () => {
            window.location.href = url;
        }
    });
}
function EditConfirm() {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Os dados foram salvos com sucesso!',
        showConfirmButton: false,
        timer: 1500
    })
}

$(document).ready(function () {
    $('#id_func').change(function () {
        var idEmpValue = $(this).find(':selected').data('id-emp');
        $('#id_emp').val(idEmpValue);
        console.log($('#id_emp').val())
    });
});

document.getElementById('formTran').addEventListener('submit', function (e) {
    e.preventDefault();

    var idProd = parseInt(document.getElementById('id_itm').value);
    var qtdProd = parseInt(document.getElementById('qtd').value);
    var url = document.getElementById('urlData').getAttribute('data-estoque');

    axios.post(url, {
        id_itm: idProd,
        qtd: qtdProd
    }).then(
        function (response) {
            var disponivel = response.data.disponivel;

            if (disponivel) {
                document.getElementById('formTran').submit();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "A quantidade informada não é válida, tente novamente com outro valor.",
                })
            }
        }).catch(function (error) {
            console.log(error);
        });
});