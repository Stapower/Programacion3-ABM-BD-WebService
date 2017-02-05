function llamada(queMostrar)
{
	$.ajax({
		url : "nexo.php",
		type : "POST",
		//contentType: "application/json; charset=utf-8",
   		//dataType: "json",
		data : {queHacer : queMostrar }

	})
	.then(function(retorno)
	{	
     $("#Estacionados").html(retorno);
     console.log(retorno);
	},function(retorno){
		console.log(retorno);
	});
	
}


function llamada5(queMostrar)
{
	$.ajax({
		url : "nexo.php",
		type : "POST",
		//contentType: "application/json; charset=utf-8",
   		//dataType: "json",
		data : {queHacer : queMostrar }

	})
	.then(function(retorno)
	{	
     $("#Estacionados").html(retorno);
     console.log(retorno);
	},function(retorno){
		console.log(retorno);
	});
	
}



function EliminarCookie()
{
	$.ajax({
		url : "nexo.php",
		type : "POST",
		data : {queHacer : "EliminarCookie"}

	})
	.then(function(retorno)
	{	
		console.log(retorno);

	},function(retorno){
		console.log(retorno);
	});
}


function usuarios(queMostrar)
{

$.ajax({
		url : "nexo.php",
		type : "POST",
		data : {queHacer : queMostrar}

	})
	.then(function(retorno)
	{	
               
        $("#usuarios").html(retorno);
		console.log(retorno);

	},function(retorno){
		console.log(retorno);
	});
	
}

function LogIn(queMostrar)
{
	//alert(queMostrar);
	
	$.ajax({
		url : "nexo.php",
		type : "POST",
		//contentType: "application/json; charset=utf-8",
   		//dataType: "json",
		data : {queHacer : queMostrar}

	})
	.then(function(retorno)
	{	
               $("#Logeo").html(retorno);
		console.log(retorno);
		//alert("Ok "+retorno);

	},function(retorno){
		console.log(retorno);
	});
	
}

function redirect()
{
	window.location = "https://arganarastomas.000webhostapp.com";
}
/*

/*

function MostrarError()
{
	var funcionAjax=$.ajax({url:"nexoNoExiste.php",type:"post",data:{queHacer:"MostrarTexto"}});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
			$("#principal").html("error :(");
		$("#informe").html(retorno.responseText);		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}
function MostrarSinParametros()
{
	var funcionAjax=$.ajax({url:"nexoTexto.php"});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}
function redirect()
{
	window.location = "https://arganarastomas.000webhostapp.com/partes/formLogin.php";
}
function Mostrar(queMostrar)
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostarLogin()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}*/