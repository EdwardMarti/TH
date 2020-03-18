//metodo carga una imagen cargando
function loading(rta) {
    $(rta).html("<span class='fa fa-refresh fa-refresh-animate fa-2x'></span> Validando...");
}

//metodo para creacion de objecto ajax
function ajax(url, datos, rta) {
    var ajax = $.get(url, datos, function(respuesta) {
        $(rta).html(respuesta);
    });
    return ajax;
}
 
 
function empleado_archivos(idp) {
    //console.log(idp);
    var url = "empleado_registrar_archivos.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
  

}

 
function ValidarNit(nit) {
    var url = "./php/validarnit.php?nit=" + nit;
    var datos = {};
    var rta = "#validanit";
    ajax(url, datos, rta);
}
 
function empleado_Registrar2() {
    var url = "empleado_registrar_1.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
 
} 

function empleado_update(idp) {
    console.log(idp);
    var url = "empleado_registrar_update.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}



function empleado_Registrar_rapido2() {
    var url = "PersonaInsert_1.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}
function persona_cambiarPass() {
    var url = "cambiar_passw.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}
function empleado_Registrar_rapido() {
    var url = "empelado_registrar_r.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}

//<editor-fold defaultstate="collapsed" desc="Varios">

function Registrar_nivel_vigilanci() {
    var url = "Nivel_vigilanciaList.html";
//    var url = "Nivel_vigilanciaInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}
function Listar_nivel_vigilanci() {
    var url = "Nivel_vigilanciaList.html";
//    var url = "Nivel_vigilanciaInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
    
    enviar("",'../back/controller/nivel_vigilancia/Nivel_vigilanciaList.php',postNivel_vigilanciaList); 

}
function Listar_tipo_vigilanci() {
    var url = "Tipo_vigilanciaList.html";
//    var url = "Nivel_vigilanciaInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
    
enviar("",'../back/controller/tipo_vigilancia/Tipo_vigilanciaList.php',postTipo_vigilanciaList); 

}

//</editor-fold>



//<editor-fold defaultstate="collapsed" desc="Persona">


function empleado_Listar2(empresa) {
  //var  empresa="0";
    var url = "Persona_list_Empresa.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

 enviar("",'../back/controller/persona/PersonaList_Todo.php?empresa='+empresa,postPersonaList); 

}

function act_Cargo() {
    var url = "CargoList.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

// enviar("",'../back/controller/cargo/CargoInsert.php',postCargoInsert); 

}

//</editor-fold>



//<editor-fold defaultstate="collapsed" desc="Empresa">


function empresa_Registrar_P() {
    var url = "Empresa_principal_Insert.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}
function empresa_Listar() {
    var url = "EmpresaList.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

    enviar("",'../back/controller/empresa/EmpresaList.php',postEmpresaList); 

}
function empresa_Listar_P() {
    var url = "Empresa_principal_List_tabla.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

    enviar("",'../back/controller/empresa_p/Empresa_pList.php',postEmpresa_pList); 

}
/*******************SUCURSAL ***////////////////////

function Sucursal_Registrar() {
    var url = "SucursalInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);

}

function sucursal_emp_Listar() {
    var url = "Sucursal_List.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
//enviar("",'../back/controller/area_empresa/Area_empresaList.php',postArea_empresaList); 
}

function sucursal_emp_Listar_2(empresa) {
    var url = "Sucursal_tabla.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);
    
    enviar("",'../back/controller/empresa/EmpresaList_sucursal.php?empresa='+ empresa,postEmpresaList);     
//enviar("",'../back/controller/area_empresa/Area_empresaList_1.php?empresa=' + empresa,postArea_empresaList); 
}

function area_Registrar() {
    var url = "Area_empresaInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);

}
function area_Listar() {
    var url = "Area_empresa_List.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
//enviar("",'../back/controller/area_empresa/Area_empresaList.php',postArea_empresaList); 
}

function area_Listar_2(empresa) {
    var url = "Area_empresaList_Tabla.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);
    
enviar("",'../back/controller/area_empresa/Area_empresaList_1.php?empresa=' + empresa,postArea_empresaList); 
}
function area_Listar_principal() {
    var empresa='1';
    var url = "Area_empresaList_principal.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
    
enviar("",'../back/controller/area_empresa/Area_empresaList_1.php?empresa=' + empresa,postArea_empresaList); 
}

function cargo_Registrar() {
    var url = "Cargo_empresoInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);

}

function cargo_Registrar() {
    var url = "Cargo_empresoInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);

}
function cargo_Listar() {
    var url = "Cargo_empresa_List.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
//enviar("",'../back/controller/cargo/CargoList.php',postCargoList); 
}

function cargo_Listar_2(empresa2) {
    var url = "Cargo_empresoList_Tabla.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);
enviar("",'../back/controller/cargo_empreso/Cargo_empresoList_1.php?empresa=' + empresa2,postCargo_empresoList); 
}

function cargo_RegistrarTodo() {
    var url = "CargoInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);

}
function puesto_Listar() {
    var url = "Puesto_List.html";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
//enviar("",'../back/controller/puesto/PuestoList.php?empresa=' + empresa,postPuestoList); 
}
function puesto_Listar_Tabla(empresa) {
    var url = "PuestoList_Tabla.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);
enviar("",'../back/controller/puesto/PuestoList_tabla.php?empresa=' + empresa,postPuestoList); 
}

function puesto_Registrar() {
    var url = "PuestoInsert.html";
    var datos = {};
    var rta = "#mostrarcontenido2";
    ajax(url, datos, rta);

}

//</editor-fold>






//---------------otros-----------//


function habilitarMail()
{
    $("#email").attr('disabled', false);
    $("#enviar").attr('disabled', false);
}

function mostrar()
{
    var file = $("#file").val();
    console.log(file);
}

//funciones de prueba
/**
 * Metodo para Ocultar o mostrar Divs
 * @param {type} tipo
 * @returns {undefined}
 */function mostrarDivs(tipo) {
    if (tipo === 1) {
        document.getElementById("instalacion").value = "1";
        document.getElementById("residencial").style.display = "block";
        document.getElementById("adicional").style.display = "block";
        document.getElementById("comercial").style.display = "none";
        document.getElementById("industrial").style.display = "none";
        document.getElementById("dis").style.display = "none";

        document.getElementById("trans").style.display = "none";
        document.getElementById("espe").style.display = "none";
    } else if (tipo === 2) {
        document.getElementById("instalacion").value = "2";
        document.getElementById("residencial").style.display = "none";
        document.getElementById("comercial").style.display = "block";
        document.getElementById("adicional").style.display = "block";
        document.getElementById("industrial").style.display = "none";
        document.getElementById("dis").style.display = "none";

        document.getElementById("trans").style.display = "none";
        document.getElementById("espe").style.display = "none";
    } else if (tipo === 3) {
        document.getElementById("instalacion").value = "3";
        document.getElementById("residencial").style.display = "none";
        document.getElementById("comercial").style.display = "none";
        document.getElementById("industrial").style.display = "block";
        document.getElementById("adicional").style.display = "block";
        document.getElementById("dis").style.display = "none";

        document.getElementById("trans").style.display = "none";
        document.getElementById("espe").style.display = "none";
    } else if (tipo === 4) {
        document.getElementById("instalacion").value = "4";
        document.getElementById("residencial").style.display = "none";
        document.getElementById("comercial").style.display = "none";
        document.getElementById("adicional").style.display = "none";
        document.getElementById("industrial").style.display = "none";
        document.getElementById("dis").style.display = "block";

        document.getElementById("trans").style.display = "none";
        document.getElementById("espe").style.display = "none";
    } else if (tipo === 5) {
        document.getElementById("instalacion").value = "5";
        document.getElementById("residencial").style.display = "none";
        document.getElementById("comercial").style.display = "none";
        document.getElementById("adicional").style.display = "none";
        document.getElementById("industrial").style.display = "none";
        document.getElementById("dis").style.display = "none";

        document.getElementById("trans").style.display = "block";
        document.getElementById("espe").style.display = "none";
    } else if (tipo === 6) {
        document.getElementById("instalacion").value = "6";
        document.getElementById("residencial").style.display = "none";
        document.getElementById("comercial").style.display = "none";
        document.getElementById("industrial").style.display = "none";
        document.getElementById("adicional").style.display = "none";
        document.getElementById("dis").style.display = "none";

        document.getElementById("trans").style.display = "none";
        document.getElementById("espe").style.display = "block";
    }
}

function validarCheck(id) {
    if (document.getElementById(id).checked) {
        document.getElementById(id).value = "1";
    } else {
        document.getElementById(id).value = "0";
    }
}

function validarOption(id) {
    var selectOrigen = document.getElementById(id);

    // Obtengo la opcion que el usuario selecciono
    var opcionSeleccionada = selectOrigen.options[selectOrigen.selectedIndex].value;

    // Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
    if (opcionSeleccionada === "0")
    {
        document.getElementById(id).style.borderColor = "#f56954";
        alert("Opción no valida, por favor elija nuevamente");

    } else {
        document.getElementById(id).style.borderColor = "#00a65a";
    }
}



function validartipo() {
    var tipo = $("#instalacion").val();
    if (tipo === 0 || tipo === null) {
        alert("NO HA SELECCIONADO TIPO DE INSTALACIÓN");
    }
}

function registrarCotRetie() {
    document.getElementById("cotizacion").submit(function(e) {
        var data = new FormData(this); //Creamos los datos a enviar con el formulario
        $.ajax({
            url: './php/validarRegistroCotizacion.php', //URL destino
            data: data,
            processData: false, //Evitamos que JQuery procese los datos, daría error
            contentType: false, //No especificamos ningún tipo de dato
            type: 'POST',
            success: function(data) {
                alert(data);
            }
        });

        e.preventDefault();
        document.getElementById("cotizacion").each(function() {
            this.reset();
        });//Evitamos que se mande del formulario de forma convencional
    });
}

// metodo solo permite numero
function validarNumeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla === 8)
        return true; // backspace
    if (tecla === 109)
        return true; // menos
    if (tecla === 110)
        return true; // punto
    if (tecla === 189)
        return true; // guion
    if (e.ctrlKey && tecla === 86) {
        return true
    }
    ; //Ctrl v
    if (e.ctrlKey && tecla === 67) {
        return true
    }
    ; //Ctrl c
    if (e.ctrlKey && tecla === 88) {
        return true
    }
    ; //Ctrl x
    if (tecla >= 96 && tecla <= 105) {
        return true
    } //numpad

    patron = /[0-9]/; // patron

    te = String.fromCharCode(tecla);
    return patron.test(te); // prueba
}

function validarCheckAdc(id, in1, in2, num, id2, in3, in4) {

    if (document.getElementById(id).checked && document.getElementById(id2).checked) {
        document.getElementById("instalacion_adc").value = "11";
        document.getElementById(in1).disabled = false;
        document.getElementById(in2).disabled = false;
        document.getElementById(in3).disabled = false;
        document.getElementById(in4).disabled = false;
    } else if (document.getElementById(id).checked) {
        document.getElementById("instalacion_adc").value = num;
        document.getElementById(in1).disabled = false;
        document.getElementById(in2).disabled = false;
        document.getElementById(in3).disabled = true;
        document.getElementById(in4).disabled = true;
    } else if (!document.getElementById(id).checked && document.getElementById(id2).checked) {
        if (id2 === "dis_adc") {
            document.getElementById("instalacion_adc").value = "9";
        } else {
            document.getElementById("instalacion_adc").value = "10";
        }
        document.getElementById(in1).disabled = true;
        document.getElementById(in2).disabled = true;
        document.getElementById(in3).disabled = false;
        document.getElementById(in4).disabled = false;
    } else {
        document.getElementById("instalacion_adc").value = "0";
        document.getElementById(in1).disabled = true;
        document.getElementById(in2).disabled = true;
        document.getElementById(in3).disabled = true;
        document.getElementById(in4).disabled = true;
    }

}

function validarMime() {
    var input = document.getElementById('plano').value.lastIndexOf(".pdf")
    if (input == -1)
    {
        alert('Solo se admite archivos .pdf ');
        return false;
    }
}

function validarCliente(id) {
    var cedula = document.getElementById(id).value;
    loading("#validar");
    var url = "./validar/validarCedula.php?cc=" + cedula;
    var datos = {};
    var rta = "#validar";
    ajax(url, datos, rta);
}

function reiniciarBoton() {
    document.getElementById("Continuar").disabled = true;
    $("#validar").html("<button onclick=\"validarCliente('num_documento')\" class=\"btn btn-sm btn-info\"> Validar</button>");
}

function buscarDictamen() {
    var url = "./php/";
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
}


function masInfoCoti(id) {
    var url = "./validar/infoCotizacion.php?id=" + id;
    var datos = {};
    var rta = "#mostrarcontenido";
    ajax(url, datos, rta);
    loading(rta);
}