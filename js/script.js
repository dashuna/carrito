function confirmarBorrar(event) {
    if (confirm('Estás seguro de que quieres borrar el producto seleccionado de la lista?')) {
    } else {
        event.preventDefault();
    }
}

function agregarListenerBorrar() {
    let botones = document.getElementsByClassName("btnBorrar")
    for(let i = 0; i<botones.length; i++){
        botones[i].addEventListener("click", function(event){
            confirmarBorrar(event);
        });
    }
}

function editarFila(idProducto) {
    //eliminamos la clase oculto para mostrar los inputs
    let inputs = document.getElementsByClassName("fila_" + idProducto);
    for(let i = 0; i<inputs.length; i++){
        inputs[i].classList.remove("oculto");
    }
    //agregar la clase oculto para ocultar los campos que no queremos mostrar
    let textos = document.getElementsByClassName("texto_" + idProducto);
    for(let i = 0; i<textos.length; i++){
        textos[i].classList.add("oculto");
    }
}

window.addEventListener("load", agregarListenerBorrar);