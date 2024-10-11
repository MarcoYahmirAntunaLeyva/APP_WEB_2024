function operacion() {
    let n1 = document.getElementById("n1").value;
    let n2 = document.getElementById("n2").value;
    let tipoope = document.getElementById("tipo").value;
    
    // Check if the inputs are valid numbers
    if (!isnumber(n1) || !isnumber(n2)) {
        alert("Por favor, ingrese solo números.");
        return; // Exit the function if invalid input
    }

    // Convert inputs to integers
    n1 = parseInt(n1);
    n2 = parseInt(n2);
    
    let ope;
    let operacionTexto;
    
    switch(tipoope) {
        case "suma":
            ope = n1 + n2;
            operacionTexto = `${n1} + ${n2}`;
            break;
        case "resta":
            ope = n1 - n2;
            operacionTexto = `${n1} - ${n2}`;
            break;
        case "multiplicacion":
            ope = n1 * n2;
            operacionTexto = `${n1} * ${n2}`;
            break;
        case "division":
            ope = n1 / n2;
            operacionTexto = `${n1} / ${n2}`;
            break;
        default:
            ope = "Operación no válida";
            operacionTexto = "";
    }

    let resultado = document.getElementById("resultado");
    if (ope !== "Operación no válida") {
        resultado.innerHTML = `<h2>${operacionTexto} = ${ope}</h2>`;
    } else {
        resultado.innerHTML = `<h2>${ope}</h2>`;
    }
}

function isnumber(n) {
    return !isNaN(parseInt(n)) && isFinite(n);
}
