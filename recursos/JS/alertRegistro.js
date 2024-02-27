window.addEventListener("load", function () {
    document.getElementById("viewAlerta").addEventListener("click", function () {
        if (
            document.getElementById("nombre_liquidador").value !== "" &&
            document.getElementById("apellido_liquidador").value !== "" &&
            document.getElementById("cedula_liquidador").value !== "" &&
            document.getElementById("clave_liquidador").value !== ""
        ) {
            alert("Registro exitoso!");
        } else {
            alert("Completar los campos correspondiente!");
        }
    });
});