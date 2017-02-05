<?php
class Usuario
{
	public $id;
 	public $usuario;
  	public $contraseña;
  	public $rol;
  	

	public static function guardar($correo,$contraseña,$rol)
	{
		$archivo = fopen("php/personas.txt", "a");
		$renglon = $correo . "," . $contraseña . "," . $rol . "," . "\n";

		fwrite($archivo, $renglon);
		echo "patente " . $usuario . "Se guardó exitosamente";
		fclose($archivo);
	}

	public static function leer()
	{
		$listadoDePersonas=array();

		$archivo = fopen("php/personas.txt", "r");
		
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			$persona = explode(",", $renglon);
 			$listadoDePersonas[]= $persona[0];
 			//$listadoDeAutos[] = $renglon;
		}

		fclose($archivo);

		return $listadoDePersonas;
	 //$listadoDeAutos=array();
	 //$listaDeAutosLeida[]= variable
	}

	public static function Consultar($correo, $contraseña)
	{
		$listadoDePersonas=array();

		$archivo = fopen("php/personas.txt", "r");
		
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			$persona = explode(",", $renglon);
			if($persona[0] == $correo && $persona[1] == $contraseña)
			{
				echo "true";
				fclose($archivo);
				return true;
			}
 			//$listadoDePersonas[]= $persona[0];
 			//$listadoDeAutos[] = $renglon;
		}

		fclose($archivo);
		echo "false";
		return false;
	 //$listadoDeAutos=array();
	 //$listaDeAutosLeida[]= variable
	}

	public static function GetRol($usuario)
	{

	$listadoDePersonas=array();

		$archivo = fopen("php/personas.txt", "r");
		
		while(!feof($archivo))
		{
			$renglon=fgets($archivo);
			$persona = explode(",", $renglon);
			if($persona[0] == $usuario)
			{
				//echo $persona[2];
				fclose($archivo);
				return $persona[2];
			}
 			//$listadoDePersonas[]= $persona[0];
 			//$listadoDeAutos[] = $renglon;
		}

		fclose($archivo);
		//echo "false";
		return "unknow";
	}






    public static function ConsultarUsuario($nombreUsuario)
    {
    	 try{
                  
	 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		 $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM Usuarios WHERE usuario = '$nombreUsuario'");
                          $consulta->execute();	 


		 //return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
		//$consulta->execute(array($this->patente, "2012-12-12"));
                	 $objeto = $consulta->fetchObject('Usuario');
return $objeto;
                       
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
             }
             catch(Exception $e)
            { 
             print "Error!: " . $e->getMessage(); 
             die();
            }
    }
	public function ProbandoUsuario()
	 {
	 	return "pasaste por estacionamiento.php";
	 }
 	
	
      public static function TraerTodosLosUsuarios()
	{
		try{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
		}
		catch(Exception $e)
		{
 			print "Error!: " . $e->getMessage(); 
             die();
		}
	}

	public static function Degradar($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE Usuarios SET rol = 'empleado' WHERE id = '$id'");
		$consulta->execute();			
		return $consulta->rowCount();
	}

	public static function Ascender($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE Usuarios SET rol = 'admin' WHERE id = '$id'");
		$consulta->execute();			
		return $consulta->rowCount();
	}

	public static function AltaUsuario($user,$pass,$rol)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO Usuarios VALUES ('$user', '$pass','$rol')");
		$consulta->execute();		
	}

	public static function ModificarUsuario($id,$user,$pass,$rol)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE Usuarios SET usuario = '$user', pass='$pass',rol = '$rol' WHERE id = '$id'");
		$consulta->execute();		
	}



}

?>