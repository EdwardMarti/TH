/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\
/** Valida los campos requeridos en un formulario
 * Returns flag Devuelve true si el form cuenta con los datos mínimos requeridos
 */
function validarForm(idForm){
	var form=$('#'+idForm)[0];
	for (var i = 0; i < form.length; i++) {
		var input = form[i];
		if(input.required && input.value==""){
			return false;
		}
	}
	return true;
}

////////// AREA_EMPRESA \\\\\\\\\\
function preArea_empresaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/area_empresa/Area_empresaInsert.php',postArea_empresaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postArea_empresaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Area_empresa registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preArea_empresaList(container,empresa){
     //Solicite información del servidor
     cargaContenido(container,'Area_empresaList_1.html'); 
 	enviar("",'../back/controller/area_empresa/Area_empresaList_1.php?empresa=' + empresa,postArea_empresaList); 
}

 function postArea_empresaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
        // console.log(json);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Area_empresa = json[i];	
                //----------------- Para una tabla -----------------------
     
                Area_empresa.updateHrefB = 'mostrarActualizar("' + Area_empresa.idarea_emp + '","' + Area_empresa.nom_area + '");';
           
                document.getElementById("Area_empresaList").appendChild(createTR(Area_empresa));
               
 //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// BANCO \\\\\\\\\\
function preBancoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/banco/BancoInsert.php',postBancoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postBancoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Banco registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preBancoList(container){
     //Solicite información del servidor
     cargaContenido(container,'BancoList.html'); 
 	enviar("",'../back/controller/banco/BancoList.php',postBancoList); 
}

 function postBancoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Banco = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("BancoList").appendChild(createTR(Banco));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// CARGO \\\\\\\\\\
function preCargoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/cargo/CargoInsert.php',postCargoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postCargoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Cargo registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preCargoList(container){
     //Solicite información del servidor
     cargaContenido(container,'CargoList.html'); 
 	enviar("",'../back/controller/cargo/CargoList.php',postCargoList); 
}

 function postCargoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Cargo = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("CargoList").appendChild(createTR(Cargo));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// CARGO_EMPRESO \\\\\\\\\\
function preCargo_empresoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/cargo_empreso/Cargo_empresoInsert.php',postCargo_empresoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postCargo_empresoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Cargo_empreso registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preCargo_empresoList(container){
     //Solicite información del servidor
     cargaContenido(container,'Cargo_empresoList.html'); 
 	enviar("",'../back/controller/cargo_empreso/Cargo_empresoList.php',postCargo_empresoList); 
}

 function postCargo_empresoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
 
            for(var i=1; i < Object.keys(json).length; i++) {   
                var Cargo_empreso = json[i];
                //----------------- Para una tabla -----------------------
                  Cargo_empreso.updateHrefB = 'mostrarActualizar("' + Cargo_empreso.idcargo + '","' + Cargo_empreso.nom_cargo + '");';
                document.getElementById("Cargo_empresoList").appendChild(createTR(Cargo_empreso));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// CARNET_SUPERVIGILANCIA \\\\\\\\\\
function preCarnet_supervigilanciaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/carnet_supervigilancia/Carnet_supervigilanciaInsert.php',postCarnet_supervigilanciaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postCarnet_supervigilanciaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Carnet_supervigilancia registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preCarnet_supervigilanciaList(container){
     //Solicite información del servidor
     cargaContenido(container,'Carnet_supervigilanciaList.html'); 
 	enviar("",'../back/controller/carnet_supervigilancia/Carnet_supervigilanciaList.php',postCarnet_supervigilanciaList); 
}

 function postCarnet_supervigilanciaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Carnet_supervigilancia = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("Carnet_supervigilanciaList").appendChild(createTR(Carnet_supervigilancia));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// CELULAR \\\\\\\\\\
function preCelularInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/celular/CelularInsert.php',postCelularInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postCelularInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Celular registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preCelularList(container){
     //Solicite información del servidor
     cargaContenido(container,'CelularList.html'); 
 	enviar("",'../back/controller/celular/CelularList.php',postCelularList); 
}

 function postCelularList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Celular = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("CelularList").appendChild(createTR(Celular));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// COOPERATIVISMO \\\\\\\\\\
function preCooperativismoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/cooperativismo/CooperativismoInsert.php',postCooperativismoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postCooperativismoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Cooperativismo registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preCooperativismoList(container){
     //Solicite información del servidor
     cargaContenido(container,'CooperativismoList.html'); 
 	enviar("",'../back/controller/cooperativismo/CooperativismoList.php',postCooperativismoList); 
}

 function postCooperativismoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Cooperativismo = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("CooperativismoList").appendChild(createTR(Cooperativismo));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// DOMICILIO \\\\\\\\\\
function preDomicilioInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/domicilio/DomicilioInsert.php',postDomicilioInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postDomicilioInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Domicilio registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preDomicilioList(container){
     //Solicite información del servidor
     cargaContenido(container,'DomicilioList.html'); 
 	enviar("",'../back/controller/domicilio/DomicilioList.php',postDomicilioList); 
}

 function postDomicilioList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Domicilio = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("DomicilioList").appendChild(createTR(Domicilio));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// EMPRESA \\\\\\\\\\
function preEmpresaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/empresa/EmpresaInsert.php',postEmpresaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postEmpresaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Empresa registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preEmpresaList(container){
     //Solicite información del servidor
     cargaContenido(container,'EmpresaList.html'); 
 	enviar("",'../back/controller/empresa/EmpresaList.php',postEmpresaList); 
}

 function postEmpresaList(result,state){
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
            for(var i=1; i < json.length; i++) {   
                var Empresa = json[i];
                //----------------- Para una tabla -----------------------
                // Empresa.viewHrefB = 'mostrarTodo("' + Empresa.idempresa + '","' + Area_empresa.nom_area + '");';
                Empresa.updateHrefB = 'mostrarActualizar("' + Empresa.idempresa + '","' + Empresa.nombre_empresa + '"\n\
,"' + Empresa.nit_empresa + '","' + Empresa.direccion_empresa + '");';
            //    Empresa.deleteHrefB = 'mostrarEliminar("' + Empresa.idempresa + '");';
                document.getElementById("EmpresaList").appendChild(createTR(Empresa));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}


////////// EMPRESA P\\\\\\\\\\
function preEmpresa_pInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/empresa_p/Empresa_pInsert.php',postEmpresa_pInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postEmpresa_pInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			//alert("Empresa registrado con éxito");
                     //   empresa_Listar_P();
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preEmpresa_pList(container){
     //Solicite información del servidor
     cargaContenido(container,'EmpresaList.html'); 
 	enviar("",'../back/controller/empresa_p/Empresa_pList.php',postEmpresa_pList); 
}

 function postEmpresa_pList(result,state){
     
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){
        
            for(var i=1; i < json.length; i++) {   
                var Empresa_p = json[i];
               
                //----------------- Para una tabla -----------------------
//                   if(i==1){
//                       Empresa_p.hiddenHrefB = 'ocultar("' + Empresa_p.idempresa + '");';
//                }
                
                Empresa_p.updateHrefB = 'mostrarActualizar("' + Empresa_p.idEmpresa_p + '","' + Empresa_p.Empresa_p_nombre + '","' + Empresa_p.nit_empresa_p + '","' + Empresa_p.Empresa_p_direccion + '","' + Empresa_p.Empresa_p_tel + '");';
            //    Empresa.deleteHrefB = 'mostrarEliminar("' + Empresa.idempresa + '");';
                document.getElementById("Empresa_pList").appendChild(createTR(Empresa_p));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}




////////// ESTUDIO \\\\\\\\\\
function preEstudioInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/estudio/EstudioInsert.php',postEstudioInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postEstudioInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Estudio registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preEstudioList(container){
     //Solicite información del servidor
     cargaContenido(container,'EstudioList.html'); 
 	enviar("",'../back/controller/estudio/EstudioList.php',postEstudioList); 
}

 function postEstudioList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Estudio = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("EstudioList").appendChild(createTR(Estudio));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// FAMILIAR \\\\\\\\\\
function preFamiliarInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/familiar/FamiliarInsert.php',postFamiliarInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postFamiliarInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Familiar registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preFamiliarList(container){
     //Solicite información del servidor
     cargaContenido(container,'FamiliarList.html'); 
 	enviar("",'../back/controller/familiar/FamiliarList.php',postFamiliarList); 
}

 function postFamiliarList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Familiar = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("FamiliarList").appendChild(createTR(Familiar));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// FAMILIAR_HAS_CELULAR \\\\\\\\\\
function preFamiliar_has_celularInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/familiar_has_celular/Familiar_has_celularInsert.php',postFamiliar_has_celularInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postFamiliar_has_celularInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Familiar_has_celular registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preFamiliar_has_celularList(container){
     //Solicite información del servidor
     cargaContenido(container,'Familiar_has_celularList.html'); 
 	enviar("",'../back/controller/familiar_has_celular/Familiar_has_celularList.php',postFamiliar_has_celularList); 
}

 function postFamiliar_has_celularList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Familiar_has_celular = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("Familiar_has_celularList").appendChild(createTR(Familiar_has_celular));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// FECHAS_PARTICULARES \\\\\\\\\\
function preFechas_particularesInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/fechas_particulares/Fechas_particularesInsert.php',postFechas_particularesInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postFechas_particularesInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Fechas_particulares registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preFechas_particularesList(container){
     //Solicite información del servidor
     cargaContenido(container,'Fechas_particularesList.html'); 
 	enviar("",'../back/controller/fechas_particulares/Fechas_particularesList.php',postFechas_particularesList); 
}

 function postFechas_particularesList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Fechas_particulares = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("Fechas_particularesList").appendChild(createTR(Fechas_particulares));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// NIVEL_VIGILANCIA \\\\\\\\\\
function preNivel_vigilanciaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/nivel_vigilancia/Nivel_vigilanciaInsert.php',postNivel_vigilanciaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postNivel_vigilanciaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Nivel_vigilancia registrado con éxito");
                        window.location="../../../front/index.php";
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preNivel_vigilanciaList(container){
     //Solicite información del servidor
     cargaContenido(container,'Nivel_vigilanciaList.html'); 
 	enviar("",'../back/controller/nivel_vigilancia/Nivel_vigilanciaList.php',postNivel_vigilanciaList); 
}

 function postNivel_vigilanciaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Nivel_vigilancia = json[i];
                //----------------- Para una tabla -----------------------
               Nivel_vigilancia.updateHrefB = 'mostrarActualizarNV("' + Nivel_vigilancia.id + '","' + Nivel_vigilancia.nombre + '");';
                document.getElementById("Nivel_vigilanciaList").appendChild(createTR(Nivel_vigilancia));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}




////////// PERSONA \\\\\\\\\\
function prePersonaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/persona/PersonaInsert.php',postPersonaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postPersonaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Persona registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function prePersonaList(container){
     //Solicite información del servidor
     cargaContenido(container,'PersonaList.html'); 
 	enviar("",'../back/controller/persona/PersonaList.php',postPersonaList); 
}

 function postPersonaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Persona = json[i];
                //----------------- Para una tabla -----------------------
                Persona.viewHrefB = 'mostrarTodo("' + Persona.id +'");';
                Persona.updateHrefB = 'mostrarActualizar("' + Persona.id + '");';
               // Persona.deleteHrefB = 'mostrarEliminar("' + Persona.id + '");';
                Persona.cargoHrefB = 'mostrarCargo("' + Persona.id + '","' + Persona.cargo_id + '","' + Persona.nombres + '","' + Persona.apellidos + '");';
                Persona.fileHrefB = 'mostrarSubirFile("' + Persona.id + '","' + Persona.cedula + '");';
                
//                delete Persona.cargo_id;
                
                document.getElementById("PersonaList").appendChild(createTR(Persona));
                //-------- Para otras opciones ver htmlBuilder.js ---------.
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// PERSONA_HAS_CELULAR \\\\\\\\\\
function prePersona_has_celularInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/persona_has_celular/Persona_has_celularInsert.php',postPersona_has_celularInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postPersona_has_celularInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Persona_has_celular registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function prePersona_has_celularList(container){
     //Solicite información del servidor
     cargaContenido(container,'Persona_has_celularList.html'); 
 	enviar("",'../back/controller/persona_has_celular/Persona_has_celularList.php',postPersona_has_celularList); 
}

 function postPersona_has_celularList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Persona_has_celular = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("Persona_has_celularList").appendChild(createTR(Persona_has_celular));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// PUESTO \\\\\\\\\\
function prePuestoInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/puesto/PuestoInsert.php',postPuestoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postPuestoInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Puesto registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function prePuestoList(container){
     //Solicite información del servidor
     cargaContenido(container,'PuestoList.html'); 
 	enviar("",'../back/controller/puesto/PuestoList.php',postPuestoList); 
}

 function postPuestoList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=2; i < Object.keys(json).length; i++) {   
                var Puesto = json[i];
                //----------------- Para una tabla -----------------------
             
                Puesto.updateHrefB = 'mostrarActualizar("' + Puesto.idpuesto + '","' + Puesto.nombre + '");';
                Puesto.deleteHrefB = 'mostrarEliminar("' + Puesto.idpuesto + '");';
             
                document.getElementById("PuestoList").appendChild(createTR(Puesto));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// ROLL \\\\\\\\\\
function preRollInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/roll/RollInsert.php',postRollInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postRollInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Roll registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preRollList(container){
     //Solicite información del servidor
     cargaContenido(container,'RollList.html'); 
 	enviar("",'../back/controller/roll/RollList.php',postRollList); 
}

 function postRollList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Roll = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("RollList").appendChild(createTR(Roll));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// SALUD_PENSION \\\\\\\\\\
function preSalud_pensionInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/salud_pension/Salud_pensionInsert.php',postSalud_pensionInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postSalud_pensionInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Salud_pension registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preSalud_pensionList(container){
     //Solicite información del servidor
     cargaContenido(container,'Salud_pensionList.html'); 
 	enviar("",'../back/controller/salud_pension/Salud_pensionList.php',postSalud_pensionList); 
}

 function postSalud_pensionList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Salud_pension = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("Salud_pensionList").appendChild(createTR(Salud_pension));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// TIPO_VIGILANCIA \\\\\\\\\\
function preTipo_vigilanciaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/tipo_vigilancia/Tipo_vigilanciaInsert.php',postTipo_vigilanciaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postTipo_vigilanciaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Tipo_vigilancia registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preTipo_vigilanciaList(container){
     //Solicite información del servidor
     cargaContenido(container,'Tipo_vigilanciaList.html'); 
 	enviar("",'../back/controller/tipo_vigilancia/Tipo_vigilanciaList.php',postTipo_vigilanciaList); 
}

 function postTipo_vigilanciaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Tipo_vigilancia = json[i];
                 Tipo_vigilancia.updateHrefB = 'mostrarActualizarTV("' + Tipo_vigilancia.id + '","' + Tipo_vigilancia.tipo_vigilancia + '");';
                //----------------- Para una tabla -----------------------
                document.getElementById("Tipo_vigilanciaList").appendChild(createTR(Tipo_vigilancia));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// USUARIO \\\\\\\\\\
function preUsuarioInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/usuario/UsuarioInsert.php',postUsuarioInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postUsuarioInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Usuario registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preUsuarioList(container){
     //Solicite información del servidor
     cargaContenido(container,'UsuarioList.html'); 
 	enviar("",'../back/controller/usuario/UsuarioList.php',postUsuarioList); 
}

 function postUsuarioList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Usuario = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("UsuarioList").appendChild(createTR(Usuario));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// VARIOS_EMPRESA \\\\\\\\\\
function preVarios_empresaInsert(idForm){
     //Haga aquí las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
 	enviar(formData,'../back/controller/varios_empresa/Varios_empresaInsert.php',postVarios_empresaInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postVarios_empresaInsert(result,state){
     //Maneje aquí la respuesta del servidor.
     //Consideramos buena práctica no manejar código HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Varios_empresa registrado con éxito");
                     }else{
                        alert("Hubo un errror en la inserción ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preVarios_empresaList(container){
     //Solicite información del servidor
     cargaContenido(container,'Varios_empresaList.html'); 
 	enviar("",'../back/controller/varios_empresa/Varios_empresaList.php',postVarios_empresaList); 
}

 function postVarios_empresaList(result,state){
     //Maneje aquí la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Varios_empresa = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("Varios_empresaList").appendChild(createTR(Varios_empresa));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

//That´s all folks!