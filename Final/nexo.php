<?php
require_once("clases/AccesoDatos.php");
//require_once("clases/Estacionamiento.php");
require_once("clases/Usuarios.php");
require_once('ws_5/SERVIDOR/lib/nusoap.php');
require_once('clases/AccesoDatos.php');
require_once('clases/Materiales.php');
//echo"vardump";
//var_dump($_POST['queHacer']);

$queHacer = $_POST['queHacer'];


		$host = 'http://localhost:8080/Final/ws_5/SERVIDOR/ws.php';
		$client = new nusoap_client($host . '?wsdl');
		$client->soap_defencoding = 'UTF-8';
	
		$err = $client->getError();
		if ($err) {// MOSTRAMOS EL ERROR.
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}




switch ($queHacer)
{

	case 'mostrarMateriales':
	include("partes/formGrilla.php");
	/*$cds = $client->call('ObtenerTodosLosMateriales', array());
	//$cds=Materiales::TraerTodoLosMateriales();

		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
		} 
		else {// CHECKEAMOS POR POSIBLES ERRORES
			$err = $client->getError();
			if ($err) {//MOSTRAMOS EL ERROR
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {//MOSTRAMOS EL RESULTADO DEL METODO DEL WS.
				echo '<h2>Resultado</h2>';
				echo '<pre>' . $cds . '</pre>';
			}
		}
*/
	//var_dump($cds);

	break;

	case 'Baja':
	try{
	 $client->call('EliminarMaterial', array($_POST['id']));
	}
	catch(Exception $ex)
	{
	  echo $ex->message();	
	}


	break;


	case 'AltaMaterial':
	try{

		/*$mat = new Materiales();
		$mat->nombre = $_POST['nombre'];
		$mat->precio = $_POST['precio'];
		$mat->tipo = $_POST['tipo'];
		return $mat::InsertarMaterial();*/
	 $client->call('AgregarMaterial', array($_POST['nombre'], $_POST['precio'], $_POST['tipo']));
	}
	catch(Exception $ex)
	{
	  echo $ex->message();	
	}


	break;

	case 'GrillaModificar':
    // var_dump($_POST);
       include("partes/grillaModificar.php");

	break;

	case 'ModificarMaterial':
     
      	 $client->call('ModificarMaterial', array($_POST['id'],$_POST['nombre'], $_POST['precio'], $_POST['tipo']));
		/*$mat = new Materiales();
		$mat->id = $_POST['id'];
		$mat->nombre = $_POST['nombre'];
		$mat->precio = $_POST['precio'];
		$mat->tipo = $_POST['tipo'];
		return $mat->ModificarMaterial();*/

	break;

	case 'EliminarCookie':
	setcookie("registro",$usuario,  time()-36000 , '/');
	break;


case 'Login':
	    include("partes/formLogin.php");
	    break;













/*
	case 'alta':
		try
		{
			$auto = new Estacionamiento();
			$auto->patente=$_POST['patente'];

			$auto->fechaActual=$hoy;
			//$auto->fechaEntrada = date_timestamp_get();
                        //echo "Vamos para insertarElVehiculo";
			$cantidad=$auto->InsertarElVehiculo();
if($cantidad>0)
{
echo"Vehiculo estacionado";
}
else
{echo "error";
console.log(retorno);
}
			//echo $cantidad;
			 break;
		}
		catch(Exception $ex)
		{
			echo $ex->getMessage();
		 	break;
		}
		
        case 'Baja':
       try
         {
              if(!isset($_POST['patente']))
              {
		$auto = new Estacionamiento();
		$auto->id=$_POST['id'];
		$auto->fechaActual  = $hoy;
		$cantidad = $auto->ExtraerVehiculo($auto->id);
		echo $cantidad;	
              }
              else
             {
              Estacionamiento::ExtraerVehiculoPatente($_POST['patente']);
             }
		break;
        }
        catch(Exception $exe)
		{
			echo $exe->getMessage();
		 	break;
		}
                
	case 'MostrarEstacionados':
	
           include("partes/formGrilla.php");
//Estacionamiento::Registros();
            break;

	
	case 'MostrarRecaudado':
        include("partes/recaudado.php");
      break;

      	case 'MostrarFormUsuarios':
		try
		{
        	include("partes/formUsuarios.php");
			break;
		}
		catch(Exception $exe)
		{
			echo $exe->getMessage();
		 	break;
		}

      break;

      case 'Mostrar_Usuario_Form':
      include("partes/formAltaUsuario.php");
      break;

      case "AltaUsuario":
      echo Usuario::AltaUsuario($_POST['user'], $_POST['pass'], $_POST['rol']);
      break;

      case "ModificarUsuario":
      echo Usuario::ModificarUsuario($_POST['id'],$_POST['user'], $_POST['pass'], $_POST['rol']);
      break;



            case 'Ascender':
    $res =   Usuario::Ascender($_POST['id']);
    echo $res;
      break;

            case 'Degradar':
      $res  = Usuario::Degradar($_POST['id']);
      echo $res;
      break;
*/
	default:
		# code...
		break;
}


?>