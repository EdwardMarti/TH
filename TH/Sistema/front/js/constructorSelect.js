 function cargarSelects() {
        //----
        construirSelectSexo("Inputsexo");
        construirSelectSangre("Inputgrupo_sanguineo");
        construirSelectEstadoCivil("Inputestado_civil");
        construirSelectNivelVigilancia("Inputnivel_vigilancia_id");
        construirSelectNivelVigilancia_p("Inputnivel_vigilancia_id_p");
        construirSelectTipoVigilancia("Inputtipo_vigilancia_id");
        //------
        construirSelectNivelVigilancia("Inputnivel_vigilancia");
        construirSelectNivelAcademico("Inputnivel_academico");
        //------  
        construirSelectSalud("Inputsalud");
        construirSelectPension("Inputpension");
        //------ 
        //------ 
        construirSelectBanco("Inputbanco_nombre");
        //-----
        construirSelectSupervigilancia("Inputcarnet_supervigilancia_idcarne");
      }

      function construirSelectSexo(idSexo){
        $.get('../../../generales/back/controller/sexo/SexoList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idsexo,depa[i].sexo_descripcion));
            }  
          
        });
      }

       function construirSelectSangre(idSexo){
        $.get('../../../generales/back/controller/grupo_sanguineo/Grupo_sanguineoList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idgrupo_sanguineo,depa[i].grupo_sanguineo_nombre));
            }  
          
        });
      }

      function construirSelectEstadoCivil(idSexo){
        $.get('../../../generales/back/controller/estado_civil/Estado_civilList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idestado_civil,depa[i].estado_civil_descripcion));
            }  
          
        });
      }

       function construirSelectNivelVigilancia(idSexo){
        $.get('../back/controller/nivel_vigilancia/Nivel_vigilanciaList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].id,depa[i].nombre));
            }  
          
        });
      }
       function construirSelectNivelVigilancia_p(idSexo){
        $.get('../back/controller/nivel_vigilancia/Nivel_vigilanciaList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].id,depa[i].nombre));
            }  
          
        });
      }

      function construirSelectTipoVigilancia(idSexo){
        $.get('../back/controller/tipo_vigilancia/Tipo_vigilanciaList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].id,depa[i].tipo_vigilancia));
            }  
          
        });
      }

      function construirSelectNivelAcademico(idSexo){
        $.get('../../../generales/back/controller/nivel_estudios/Nivel_estudiosList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idnivel_estudios,depa[i].nivel_estudios_nombre));
            }  
          
        });
      }

      function construirSelectSalud(idSexo){
        $.get('../../../generales/back/controller/eps/EpsList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].ideps,depa[i].eps_nombre));
            }  
          
        });
      }

      function construirSelectPension(idSexo){
        $.get('../../../generales/back/controller/pension/PensionList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idpension,depa[i].pension_nombre));
            }  
          
        });
      }
      
      function construirSelectBanco(idSexo){
        $.get('../../../generales/back/controller/banco/BancoList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idbanco,depa[i].banco_descripcion));
            }  
          
        });
      }

      function construirSelectSupervigilancia(idSexo){
        $.get('../back/controller/carnet_supervigilancia/Carnet_supervigilanciaList.php',function(depa){
          var mySelect=document.getElementById(idSexo);
          removeAllChildren(mySelect);
           mySelect.appendChild(createOPTION(-1,'SELECCIONE'));
          depa = JSON.parse(depa);
         for (var i = 1 ; i < depa.length; i++) {
              mySelect.appendChild(createOPTION(depa[i].idcarne,depa[i].carnet_nombre));
            }  
          
        });
      }

 


