function validarLogin2()
{
		var varUsuario=$("#user").val();
		var varClave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');

		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(varClave.length< 3)
		{
			alert("ingresar mas de 3 digitos en la clave");
			return false;
		}

    if ( !expr.test(varUsuario) )
		{
        alert("Error: La dirección de correo " + varUsuario + " es incorrecta.");
        return false;
		}
		
//$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	

	var funcionAjax=$.ajax({
		url:"validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			usuario:varUsuario,
			clave:varClave    // parametros que se toman y se pasan!!!!!
		}
	});


	funcionAjax.done(function(retorno){
		console.log(retorno);

			if(retorno=="true"){	
				window.location = "http://localhost:8080/final/";//"https://arganarastomas.000webhostapp.com";
				//die();
				//$("#Logeo").html("usuario o clave incorrecta");	
                              alert("logeo exitoso");
                             
			}else
			{
                            
				$("#Logeo").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}
	});
	funcionAjax.fail(function(retorno){
                 alert("retorno fail: " + retorno);
		$("#Logeo").html(retorno.responseText);	
	});
	
}

function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        alert("Error: La dirección de correo " + email + " es incorrecta.");
}

function Admin2()
{
	document.getElementById('user').value='admin@admin.com';
	document.getElementById('clave').value='321';
}

function Empleado2()
{
	document.getElementById('user').value='vend@vend.com';
	document.getElementById('clave').value='321';
}

function Comprador2()
{
	document.getElementById('user').value='comp@comp.com';
	document.getElementById('clave').value='123';
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
        alert("Usted fue deslogeado");
	window.location = "http://localhost:8080/final/";
        //die();
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		//$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}