window.addEventListener("load", function () {
    document.getElementById("viewAlerta").addEventListener("click", function () {
        if (
            document.getElementById("input-nombre").value !== "" &&
            document.getElementById("input-rif").value !== "" &&
            document.getElementById("input-licencia").value !== "" &&
            document.getElementById("input-estado").value !== "" &&
            document.getElementById("input-municipio").value !== "" &&
            document.getElementById("input-parroquia").value !== ""
        ) {
            alert("Registro exitoso!");
        } else {
            alert("Completar los campos correspondiente!");
        }
    });
});