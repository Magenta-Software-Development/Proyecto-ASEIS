document.getElementById("btn-si").addEventListener("click", function() {
        document.getElementById("mensaje-exito").style.display = "block";
        setTimeout(function() {
            document.getElementById("mensaje-exito").style.display = "none";
        }, 5000);
});

