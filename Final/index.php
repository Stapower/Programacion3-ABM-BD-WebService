<!DOCTYPE html>
<html>
<head>
	<title>Mascotas</title>
</head>
<?php session_start(); ?>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/animations.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

 

<body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/funcionesAjax.js"></script>
<script type="text/javascript" src="js/funcionesABM.js"></script>
<script type="text/javascript" src="js/funcionesLogin.js"></script>

<?php if(isset($_SESSION['usuario']))
{

echo "Bienvenido " . $_SESSION['usuario'];

}?>

     <div style="top: 0; right: 0;"><input type="button" class="MiBotonUTN" value="<?php if(isset($_SESSION['registrado'])){echo 'LogOut';} else{echo 'LogIn';}?>" onclick= "<?php if(isset($_SESSION['registrado'])){echo 'deslogear()';}else{echo "LogIn('Login')";}?>" /></div>

<div id="ingreso">
<form >
	
	
</form>

<input type='submit' class='MiBotonUTN' name='btnGrillaRecaudado' id='btnGrillaRecaudado' onclick=llamada5('mostrarMateriales') value='mostrarMascotas'>
<input type='submit' class='MiBotonUTN' name='btnIngreso' id='btnIngreso'onclick=AltaMaterial2() value='Alta'>";
<input type='submit' class='MiBotonUTN' name='btnCookie' id='btnCookie'onclick=EliminarCookie() value='EliminarCookie'>";


	
</div>


<div id="usuarios">
</div>

</br>
<div id="Estacionados">
</div>

</br>
<div id="formUsuario">
</div>

<div id="AMUser">
	
</div>


<div id ="importes">
</div>

<div style="position: relative; bottom: 0; right: 0;"  >
	<article  class="post clearfix">
		<div id="Logeo">
		</div>
	</article>


</div>



</body>
</html>