function enviarDatos() {
  alert ('Hola')
  var formulario = document.getElementById('formulario');
  var datosFormulario = new FormData(formulario);

  var registrosSeleccionados = [];
  var checkboxes = document.querySelectorAll('.registroSeleccionado:checked');
  checkboxes.forEach(function(checkbox) {
      var id = checkbox.getAttribute('data-id');
      registrosSeleccionados.push(id);
  });
console.log(registrosSeleccionados)
  // Agregar los IDs de los registros seleccionados al FormData
  datosFormulario.append('registros', JSON.stringify(registrosSeleccionados));

  fetch('../Transporte/PreListado.php', {
      method: 'POST',
      body: datosFormulario
  })
  .then(response => {
      if (!response.ok) {
          throw new Error('Ocurrió un error al enviar los datos.');
      }
      return response.text();
  })
  .then(data => {
      console.log(registrosSeleccionados);
      console.log(data);
  })
  .catch(error => {
      console.error('Error:', error);
    });
}