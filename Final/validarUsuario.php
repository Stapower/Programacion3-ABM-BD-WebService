<?php 
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;


try{
	//header('Access-Control-Allow-Origin: *');
	//include("https://arganarastomas.000webhostapp.com/clases/Usuarios.php");
	require_once("clases/Usuarios.php");
        require_once("clases/AccesoDatos.php");
    
	//$user = new Usuario();
	//$user->usuario = $usuario;
        
	$user = Usuario::consultar($usuario, $clave);
   
       //echo "('usuraio ' . $user->usuario . ' usuarioIngresado: ' . $usuario . ' clave: ' . $user->contraseña . ' Clave ingresada ' . $clave)";

//var_dump($user);
        
	if($user)
	{			
		if($recordar=="true")
		{
			setcookie("registro",$usuario,  time()+36000 , '/');
			
		}else
		{
			setcookie("registro",$usuario,  time()-36000 , '/');
			
		}
		$_SESSION['registrado']= true;
		$_SESSION['rol'] = Usuario::GetRol($usuario);
		$_SESSION['usuario'] = $usuario;

		//$retorno=" ingreso";

		
	}else
	{
		//$retorno= "No-esta";
	}
}
catch(Exception $ex)
	{
		echo $ex->getMessage();
	 	
	}

//echo $retorno;
?>