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
        showCancelButton: true,
        preConfirm: () => {
            window.location.href = url;
        }
    });
}
function EditConfirm(){
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Os dados foram salvos com sucesso!',
        showConfirmButton: false,
        timer: 1500
    })
}

function logout(){

}
