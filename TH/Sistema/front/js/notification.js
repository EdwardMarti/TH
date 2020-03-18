
function notify($mensaje){
    $msg=$mensaje;
    //verificar que el navegador soporte notificaciones
    if(!("Notification" in window)){
         alert("Tu Navegador No Soporta Notificaciones");
    }else if(Notification.permission=="granted"){
        //lanzar notificacion si ya esta autorizado el servicio
        var notification = new Notification($msg);
    }else if(Notification.permission !== "denied"){
       Notification.requestPermission(function (permission){
           if(Notification.permission == "granted"){
               var notification = new Notification("Los Permisos han sido Habilitados");
           }
       });
         
       
    }
               
            
   
}

