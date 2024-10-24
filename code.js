function checkItems(sel){
    // obtener los checkboxes
    var checks=document.querySelectorAll(".Tiempo");
    var checked=0;
    for(var i=0; i<checks.length; i++){
      // mantener chequeado si el valor del item es menor que el seleccionado
       if (checked>=sel.value){
          checks[i].checked=false;
          continue;
      }
      if (checks[i].checked){
        checked++;
      }
    }
   
  
  }
  
  function limitCheck(chk){
    // obtener los checkboxes
    var checks=document.querySelectorAll(".Tiempo");
    var checked=0;
    for(var i=0; i<checks.length; i++){
      // mantener chequeado si el valor del item es menor que el seleccionado
      if (checks[i].checked){
        checked++;
      }
    }
    var boletos=document.getElementById("boleto_2d").value;
  
    if (checked>boletos){
       chk.checked=false;
    }
  
  }

