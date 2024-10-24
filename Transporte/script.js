//Funcion para validar la hora de inicio y de fin del formulario de transporte del archivo prelistado 2.0
function validar() {
    var inicio = document.getElementById('fecha1').value;
    var finalq = document.getElementById('fecha2').value;
    var formularioTransporte = document.getElementById('formulario');
    var validacionFormulario = formularioTransporte.reportValidity(); //Validacion de los campos required

    if (validacionFormulario) {
        if (inicio > finalq)
            alert('La Fecha de Inicio No Puede Ser Mayor a la Fecha Fin :)');
        else {

            formularioTransporte.method = 'POST';
            formularioTransporte.action = '../registrar3.php';
            formularioTransporte.submit(); //envio del formulario
        }
       
    }
}

