const campo = document.getElementById("campo3");
const contadorPalabras = document.getElementById("limitePalabras");
const contadorCaracteres = document.getElementById("limiteCaracteres");

campo.addEventListener("input", function () {
    const texto = campo.value;
    const palabras = texto.split(/\s+/).filter(palabra => palabra.length > 0);
    const valorContadorPalabras = palabras.length;

    if (valorContadorPalabras > 30) {
        const palabrasRecortadas = palabras.slice(0, 30);
        campo.value = palabrasRecortadas.join(" ");
    }

    contadorPalabras.textContent = valorContadorPalabras + " / 30";

    const valorContadorCaracteres = texto.length;

    if (valorContadorCaracteres > 195) {
        campo.value = texto.slice(0, 195);
        valorContadorCaracteres = 195;
    }

    contadorCaracteres.textContent = valorContadorCaracteres + " / 195";
});


