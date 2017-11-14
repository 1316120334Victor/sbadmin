

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
                        actualizartabla(data);
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


function actualizartabla(data)
{

                $("#tablaDatos").html("");    
                $.each(data, function(i, item) {
                    $("#tablaDatos").append("<tr><td>"+ item.idcarrera +"\
                                </td><td>"+ item.Nombre +"</td>\
                                <td>"+ item.Direccion +"</td> \
                                <td>"+ item.Telefono +"</td>\
                                <td>"+ item.Correo +"</td>\
                                <td>"+ item.Titulacion +"</td> \
                                <td>"+ item.idtipo +"</td> \
                                <td><button type='button' class='btn btn-info' onClick='prepararActualizar("+item.idcarrera+")'><i class='fa fa-check'></i></button></td>\
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
    data.append('idtipo', $("#idtipo").val() );

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
    data.append('idtipo', $("#idtipoCombo").val() );
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
                       limpiarForm();
                    }
                 });

}


function prepararActualizar(id)
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
                        llenarForm(data);
                    }
                  

                 });

}


function llenarForm(data)
{
     $.each(data,function(i,item)
     {
         $('#idCodigo').val(item.idcarrera);
         $('#idNombre').val(item.Nombre);
         $('#idTelefono').val(item.Telefono);
         $('#idCorreo').val(item.Correo);
         $('#idTitulacion').val(item.Titulacion);
         $('#idtipo').val(item.idtipo);
         $('#idDireccion').val(item.Direccion);
         $('#idtipoCombo').val(item.idtipo);
     });
}

function limpiarForm(data)
{
         $('#idCodigo').val("");
         $('#idNombre').val("");
         $('#idTelefono').val("");
         $('#idCorreo').val("");
         $('#idTitulacion').val("");
         $('#idtipo').val("");
         $('#idDireccion').val("");
         $('#idtipoCombo').val("");
         $('#buscar').val("");

}


function probando(){
    
    
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


function cargarCombo() {
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
                                     $('#idtipoCombo').append("<option value='"+item.IdSeccion+"'>"+item.Descripcion+"</option>");
                                 });

                    }
                 });

}


function filtrarCarrera()
{
    var data = new FormData();

    //data.append('idcarrera', idCodigo().val() );
    data.append('buscar', $('#buscar').val());
                   $.ajax({
                    //url: "procesos/mostrarCarrera.php", 
                    url: "procesos/filtrarAll.php",         // Url to which the request is send
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

function limpiarForm(data)
{
    $('#idpersona').val("");
    $('#ididentificacion').val("");
    $('#idnombre').val("");
    $('#idapellido').val("");
    $('#idusuario').val("");
    $('#idfechanacimiento').val("");
    $('#idcombotipoP').val("");

}


function validar(){
    
    
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
    data.append('buscar', $('#buscarP').val());
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