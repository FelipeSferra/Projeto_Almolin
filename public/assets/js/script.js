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
