// Validar el primer formulario
function validarPrimerFormulario() {
    var numeroSecuencial = document.getElementById("numeroSecuencial").value;
    var producto = document.getElementById("producto").value;
    var cantidadGruesas = document.getElementById("cantidadGruesas").value;
    var precioGruesas = document.getElementById("precioGruesas").value;
    var cantidadLuces = document.getElementById("cantidadLuces").value;
    var fechaVencimiento = document.getElementById("fechaVencimiento").value;

    if (numeroSecuencial === '' || producto === '' || cantidadGruesas === '' || precioGruesas === '' || cantidadLuces === '' || fechaVencimiento === '') {
        alert("Por favor, complete todos los campos obligatorios en el primer formulario.");
        return false;
    }
    alert("Enviado correctamente");
    return true;
}
