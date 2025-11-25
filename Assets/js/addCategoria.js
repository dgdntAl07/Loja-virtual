const btn = document.querySelector('#add_categoria');
const btn2 = document.querySelector('#noViewInput');
const inputCategoria = document.querySelector('#inputCategoria');
const selectCategorias = document.querySelector('#categoria');

let alternFunction = true ;

function gerenciarClick(){
    if (alternFunction == true){
        viewInput()
    } else {
        noViewInput();
    }
    alternFunction = !alternFunction;
}

function viewInput() {
    inputCategoria.style.display = 'block';
    selectCategorias.style.display = 'none';
}

function noViewInput(){
    inputCategoria.style.display = 'none';
    selectCategorias.style.display = 'block';
}

btn.addEventListener("click", gerenciarClick);
