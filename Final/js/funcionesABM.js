function RetirarMaterial(id)
{
	//alert(id);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Baja",
			id: id
		}
	});
	funcionAjax.done(function(retorno){
              
                 
                //alert(retorno);
		llamada5("mostrarMateriales");
		$("#Estacionados").html("registro eliminado");	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function AltaMaterial2()
{
var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GrillaModificar"
		}
	});
	funcionAjax.done(function(retorno){
     //alert("ok");
		$("#Estacionados").html(retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}


function AltaMaterial()
{
	var nombre = document.getElementById('nombree').value;
	var precio = document.getElementById('precioo').value;
	var tipo = document.getElementById('tipoo').value;

if(tipo != "perro" && tipo != "gato")
{
	alert("Animales disponibles: perro/gato");
	return false;
}

//alert(nombre + precio + tipo);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"AltaMaterial",
			nombre : nombre,
			precio : precio,
			tipo : tipo
		}
	});
	funcionAjax.done(function(retorno){
              
            //  alert(retorno);
   		llamada5("mostrarMateriales");
		$("#Estacionados").html("registro agregado");	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function GrillaModificar(id, nombre, precio, tipo)
{

	//var nombre = document.getElementById('nombre').value;
	//var precio = document.getElementById('precio').value;
	//var tipo = document.getElementById('tipo').value;

	//alert("Grilla Modificar");
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GrillaModificar",
			id : id,
			nombre : nombre,
			precio : precio,
			tipo : tipo
		}
	});
	funcionAjax.done(function(retorno){
              
             console.log(retorno);
           //  alert(retorno);
   		
		$("#Estacionados").html(retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#Estacionados").html(retorno.responseText);	
	});	
}

function ModificarMaterial(id)
{
	var nombre = document.getElementById('nombree').value;
	var precio = document.getElementById('precioo').value;
	var tipo = document.getElementById('tipoo').value;
//alert(id+nombre+precio+tipo);
if(tipo != "perro" && tipo != "gato")
{
	alert("Animales disponibles: perro/gato");
	return false;
}


	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"ModificarMaterial",
			id : id,
			nombre : nombre,
			precio : precio,
			tipo : tipo
		}
	});
	funcionAjax.done(function(retorno){
              
         //     alert(retorno);
   		llamada5("mostrarMateriales");
		$("#Estacionados").html("registro agregado");	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#Estacionados").html(retorno.responseText);	
	});	

}




















function grillaAlta()
{
	alert("grilla alta");
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
				queHacer:"MostrarFormUsuarios"
             }
	});
	funcionAjax.done(function(retorno){
		alert("retorno " + retorno);
		$("#formUsuario").html(retorno);
	});
	funcionAjax.fail(function(retorno){	
		console.log(retorno);
		$("#formUsuario").html("error inesperado");	
	});	
}
function AltaUsuario(queMostrar)
{
alert("mostrar: " + queMostrar);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:queMostrar
             }
	});
	funcionAjax.done(function(retorno){
		//var cd =JSON.parse(retorno);	
		//$("#idCD").val(cd.id);
		//$("#cantante").val(cd.cantante);
		//$("#titulo").val(cd.titulo);
		//$("#anio").val(cd.año);
		$("#formUsuario").html(retorno);
	});
	funcionAjax.fail(function(retorno){	
		$("#formUsuario").html(retorno);	
	});	
	usuarios("Usuarios");
}


function GuardarUsuario(id)
{
    var user = getElementById('user').value;
	var pass = getElementById('contraseña').value;
	var rol = getElementById('perfiles').value;
	
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"ModificarUsuario",
			id: id,
			user:user,
			pass:pass,
			rol:rol	
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
	});
	funcionAjax.fail(function(retorno){	
		console.log(retorno);
	});	
	
}

function GuardarUsuario()
{
	
	var user = getElementById('user').value;
	var pass = getElementById('contraseña').value;
	var rol = getElementById('perfiles').value;
    

var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"AltaUsuario",
			user:user,
			pass:pass,
			rol:rol	
			
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
	});
	funcionAjax.fail(function(retorno){	
		console.log(retorno);
	});	
	
}

function Accion(id, queHacer)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			id : id,
			queHacer:queHacer			
		}
	});
	funcionAjax.done(function(retorno){
		//var cd =JSON.parse(retorno);	
		//$("#idCD").val(cd.id);
		//$("#cantante").val(cd.cantante);
		//$("#titulo").val(cd.titulo);
		$("#AMUser").val(retorno);
		//alert("guardado exitoso!");

	});
	funcionAjax.fail(function(retorno){	
				$("#AMUser").val(retorno);
	});
}