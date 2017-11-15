

function cargarCarrera() 
{
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
               // data.append('opc',  "4");
                 //url: "procesos/mostrarCarrera.php", 
                 //url: "procesos/procesosCarrera.php",
                $.ajax({                   
                    url: "procesos/mostrarCarrera.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //var data = JSON.stringify(requestData);
                        //alert(data);
                        actualizartablaCarrera(data);
                    }
                 });

}

function eliminarCarrera(id) 
{
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
               // data.append('opc',  "3");
                data.append('codigo', id);
				//data.append('codigo', $id().val());

                $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/eliminarCarrera.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarCarrera();
                    }
                 });


}


function actualizartablaCarrera(data)
{

                $("#tablaDatosCarrera").html("");    
                $.each(data, function(i, item) {
                    $("#tablaDatosCarrera").append("<tr><td>"+ item.idcarrera +"\
                                </td><td>"+ item.Nombre +"</td>\
                                <td>"+ item.Direccion +"</td> \
                                <td>"+ item.Telefono +"</td>\
                                <td>"+ item.Correo +"</td>\
                                <td>"+ item.Titulacion +"</td> \
                                <td>"+ item.idtipo +"</td> \
                                <td><button type='button' class='btn btn-info' onClick='prepararActualizarCarrera("+item.idcarrera+")'><i class='fa fa-check'></i></button></td>\
                                <td><button type='button' class='btn btn-danger' onClick='eliminarCarrera("+item.idcarrera+")'><i class='fa fa-close'></i></button></td></tr>");
                    });
}


function ingresarCarrera()
{
    var data = new FormData();

    //data.append('idcarrera', idCodigo().val() );
    data.append('Nombre', $('#idNombre').val());
    data.append('Direccion', $("#idDireccion").val() );
    data.append('Telefono', $("#idTelefono").val() );
    data.append('Correo', $("#idCorreo").val() );
    data.append('Titulacion', $("#idTitulacion").val() );
    data.append('idtipo', $("#idtipoComboC").val() );

                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/ingresarCarrera.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarCarrera();
                    }
                 });

}


function modificarCarrera()
{
    var data = new FormData();

    data.append('idcarrera',$('#idCodigo').val() );
    data.append('Nombre', $('#idNombre').val());
    data.append('Direccion', $("#idDireccion").val() );
    data.append('Telefono', $("#idTelefono").val() );
    data.append('Correo', $("#idCorreo").val() );
    data.append('Titulacion', $("#idTitulacion").val() );
    //data.append('idtipo', $("#idtipo").val() );
    data.append('idtipo', $("#idtipoComboC").val() );
    //alert($("#idtipoCombo").val() );

                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/modificarCarrera.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarCarrera();
                       limpiarFormCarrera();
                    }
                 });

}


function prepararActualizarCarrera(id)
{
    var data= new   FormData();
    data.append('codigo',id);

       $.ajax({
                    url: "procesos/getId_Carrera.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                       // alert(data);
                       llenarFormCarrera(data);
                    }
                  

                 });

}


function llenarFormCarrera(data)
{
     $.each(data,function(i,item)
     {
         $('#idCodigo').val(item.idcarrera);
         $('#idNombre').val(item.Nombre);
         $('#idTelefono').val(item.Telefono);
         $('#idCorreo').val(item.Correo);
         $('#idTitulacion').val(item.Titulacion);
         $('#idDireccion').val(item.Direccion);
         $('#idtipoComboC').val(item.idtipo);
     });
}

function limpiarFormCarrera(data)
{
         $('#idCodigo').val("");
         $('#idNombre').val("");
         $('#idTelefono').val("");
         $('#idCorreo').val("");
         $('#idTitulacion').val("");
         $('#idDireccion').val("");
         $('#idtipoComboC').val("");
         $('#buscar').val("");

}


function validarCarrera(){
    
    
     if( $('#idCodigo').val()=="")
     {
        if ($('#idNombre').val() && $('#idDireccion').val() && $('#idTitulacion').val()
             && $('#idCorreo')&& $('#idTelefono')&& $('#idtipo')!="") 
        {
            ingresarCarrera();
        }else
        {
            alert("Porfavor llenar los campos !!");}
        }else
        {
            modificarCarrera();
        }
   
}


function cargarComboSeccion() {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                //data.append('opc',  "4");

                $.ajax({
                    url: "procesos/mostrarSeccion.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                          $.each(data,function(i,item)
                                 {
                                     $('#idtipoComboC').append("<option value='"+item.idSeccion+"'>"+item.Descripcion+"</option>");
                                 });

                    }
                 });

}


function filtrarCarrera()
{
    var data = new FormData();

    //data.append('idcarrera', idCodigo().val() );
    data.append('buscarC', $('#buscarC').val());
                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/filtrarAllCarrera.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        actualizartabla(data);
                    }
                 });

}




///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////
///////////////////////////
//////////////////////////
//////////////////////////                                /////////////////////// /
/////                                                   ////////////////////////////////
                                                                    //////////////////
                                                /////////////////////////////////////////////
                                                    ////////////////////////////////////////////
                                                    ////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function cargarPersona() 
{
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
               // data.append('opc',  "4");
                 //url: "procesos/mostrarCarrera.php", 
                 //url: "procesos/procesosCarrera.php",
                $.ajax({                   
                    url: "procesos/mostrarPersona.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //var data = JSON.stringify(requestData);
                        //alert(data);
                        actualizartablaPersona(data);
                    }
                 });

}


function actualizartablaPersona(data)
{

                $("#tablaDatosPersona").html("");    
                $.each(data, function(i, item) {
                    $("#tablaDatosPersona").append("<tr><td>"+ item.idpersona +"\
                                </td><td>"+ item.identificacion +"</td>\
                                <td>"+ item.nombre +"</td> \
                                <td>"+ item.apellido +"</td>\
                                <td>"+ item.usuario +"</td>\
                                <td>"+ item.fechanacimiento +"</td> \
                                <td>"+ item.idtipo +"</td> \
                                <td><button type='button' class='btn btn-info' onClick='prepararActualizarPersona("+item.idpersona+")'><i class='fa fa-check'></i></button></td>\
                                <td><button type='button' class='btn btn-danger' onClick='eliminarPersona("+item.idpersona+")'><i class='fa fa-close'></i></button></td></tr>");
                    });
}



function eliminarPersona(id) 
{
	//alert("En esta funcion se carga la tabla");

	 			var data = new FormData();
               // data.append('opc',  "3");
                data.append('codigo', id);
				//data.append('codigo', $id().val());

                $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/eliminarPersona.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarPersona();
                    }
                 });


}



function ingresarPersona()
{
    var data = new FormData();

    //data.append('idcarrera', idCodigo().val() );
    data.append('identificacion', $('#ididentificacion').val());
    data.append('nombre', $("#idnombre").val() );
    data.append('apellido', $("#idapellido").val() );
    data.append('usuario', $("#idusuario").val() );
    data.append('fechanacimiento', $("#idfechanacimiento").val() );
    data.append('idtipo', $("#idcombotipoP").val() );

                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/ingresarPersona.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarPersona();
                    }
                 });

}



function modificarPersona()
{
    var data = new FormData();

    data.append('idpersona',$('#idpersona').val() );
    data.append('identificacion', $('#ididentificacion').val());
    data.append('nombre', $("#idnombre").val() );
    data.append('apellido', $("#idapellido").val() );
    data.append('usuario', $("#idusuario").val() );
    data.append('fechanacimiento', $("#idfechanacimiento").val() );
    data.append('idtipo', $("#idcombotipoP").val() );
    
                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/modificarPersona.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                       cargarPersona();
                       limpiarFormPersona();
                    }
                 });

}

function prepararActualizarPersona(id)
{
    var data= new   FormData();
    data.append('codigo',id);

       $.ajax({
                    url: "procesos/getId_Persona.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                   
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                       // alert(data);
                        llenarFormPersona(data);
                    }
                  

                 });

}




function llenarFormPersona(data)
{
     $.each(data,function(i,item)
     {
         $('#idpersona').val(item.idpersona);
         $('#ididentificacion').val(item.identificacion);
         $('#idnombre').val(item.nombre);
         $('#idapellido').val(item.apellido);
         $('#idusuario').val(item.usuario);
         $('#idfechanacimiento').val(item.fechanacimiento);
         $('#idcombotipoP').val(item.idtipo);
     });
}

function limpiarFormPersona(data)
{
    $('#idpersona').val("");
    $('#ididentificacion').val("");
    $('#idnombre').val("");
    $('#idapellido').val("");
    $('#idusuario').val("");
    $('#idfechanacimiento').val("");
    $('#idcombotipoP').val("");

}


function validarPersona(){
    
    
     if( $('#idpersona').val()=="")
     {
        if ($('#idnombre').val() && $('#ididentificacion').val() && $('#idapellido').val()
             && $('#idusuario')&& $('#idfechanacimiento')&& $('#idtipo')!="") 
        {
            ingresarPersona();
        }else
        {
            alert("Porfavor llenar los campos !!");}
        }else
        {
            modificarPersona();
        }
   
}


function cargarComboTipoPersona() {
    //alert("En esta funcion se carga la tabla");

                var data = new FormData();
                //data.append('opc',  "4");

                $.ajax({
                    url: "procesos/mostrarTipoPersona.php",        // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        //alert(data);
                          $.each(data,function(i,item)
                                 {
                                     $('#idcombotipoP').append("<option value='"+item.idtipo+"'>"+item.descripcion+"</option>");
                                 });

                    }
                 });

}



function filtrarPersona()
{
    var data = new FormData();

    //data.append('idcarrera', idCodigo().val() );
    data.append('buscarP', $('#buscarP').val());
                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/filtrarAllPersona.php",         // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,        // To send DOMDocument or non processed data file it is set to false
                    success: function(requestData)   // A function to be called if request succeeds
                    {
                        var data = JSON.parse(requestData);
                        actualizartablaPersona(data);
                    }
                 });

}