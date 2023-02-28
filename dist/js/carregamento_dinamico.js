function abrirPag(a){
    let localPag = document.querySelector('.conteudo');
    let pag = new XMLHttpRequest()

    pag.onreadystatechange = () => {
        if(pag.readyState == 4 && pag.status == 200){
           localPag.innerHTML = pag.response
        }
    }

    pag.open('GET', `./${a}.php`)
    pag.send()

}
