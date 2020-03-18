

function continuar(id) {

    alert(id);
    if (id === 'tab-2') {
        validarGeneral(id);


    }
    
    
    }
    


function validarGeneral(id) {

    validar = true;
a=document.getElementById('Inputcedula');
    alert(a);

    if (a.value === "") {
        alert("El campo del nombre es obligatorio");
        document.getElementById('Inputcedula').style.borderColor = "#f56954";
        document.getElementById('Inputcedula').focus();
        validar = false;
    }



  

    if (validar) {
        var boton = document.getElementById('btn_cont');
        boton.disabled = false;
        ocultar();
        document.getElementById(id).style.display = "block";


    }
}