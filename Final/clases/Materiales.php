<?php
class Materiales
{
	public $nombre;
	public $precio;
	public $tipo;
	public $id;



 	public $patente;
  	public $fechaEntrada;
  	public $fechaSalida;
  	public $fechaActual;
  	public $valor;


	 public static function InsertarMaterial($nombre, $precio, $tipo)
	 {
        try{
	 			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                          
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO mascotas (nombre,precio, tipo) values ('$nombre', '$precio', '$tipo'");
                                
				$consulta->execute();
                               
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
           }
         catch(Exception $e)
       		{ 
	         print "Error!: " . $e->getMessage(); 
	         die();
       		}
	 }

	     public static function TraerMaterial($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from mascotas WHERE id = '$id'"); 
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Materiales");		
	}

    public static function TraerTodoLosMateriales()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from mascotas"); 
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Materiales");		
	}
	public function ModificarMaterial()
	{

          try
          {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("UPDATE mascotas SET nombre ='$this->nombre', precio= '$this->precio', tipo = '$this->tipo' WHERE id='$this->id'");
            $consulta->execute();
          }
         catch(Exception $e)
   		{ 
         print "Error!: " . $e->getMessage(); 
         die();
   		}

    }
	public static function EliminarMateriales($idABorrar)
	{

          try
          {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM mascotas WHERE id='$idABorrar'");
	        $consulta->execute();
          }
         catch(Exception $e)
   		{ 
         print "Error!: " . $e->getMessage(); 
         die();
   		}

    }















public function ExtraerVehiculoPatente($patente)
{
try{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM Estacionamiento  WHERE patente='$patente' AND  precio IS NULL");	
	$consulta->execute();
         $obj = $consulta->fetchObject('Estacionamiento');
		 if($obj-> id == NULL || $obj->id == 0)
		 {
			 echo "patente no encontrada";
			 return 0;
		 }
$es = new Estacionamiento();
	$es->id = $obj->id;
return $es->ExtraerVehiculo($obj->id);
}
         catch(Exception $e)
        { 
         print "Error!: " . $e->getMessage(); 
         die();
        }
}
public static function Registros()
{

for ($i=0; $i <301 ; $i++) { 
	
	
	$letraUno=chr(rand(65,90));
	$letraDos=chr(rand(65,90));
	$letraTres=chr(rand(65,90));

	$numeroUno = rand(0,9);
	$numeroDos = rand(0,9);
	$numeroTres = rand(0,9);


	$es = new Estacionamiento();
	$es->patente = $letraUno.$letraDos.$letraTres.$numeroUno.$numeroDos.$numeroTres;
 
	$es->InsertarElVehiculo();
      }
}


	   	public function ExtraerVehiculo($idABorrar)
	 {

          try
          {
	 		$date=new DateTime(); //this returns the current date time
			$hoy =  $date->format('Y-m-d H:i:s');
	 		$this->fechaActual = $hoy;
                     	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("
							UPDATE Estacionamiento SET fechaEgreso ='$this->fechaActual'WHERE id='$this->id'");
	
             $consulta->execute();


$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM Estacionamiento WHERE id='$idABorrar'");

	
             $consulta->execute();


             $objeto =  $consulta->fetchObject('Estacionamiento');

  
  $ingreso = strtotime($objeto->fechaIngreso);
  $egreso = strtotime($objeto->fechaEgreso);

  $diffMinutes = round(($egreso - $ingreso) / 60);//3600 horas
  												  //60 minutos
			 $precio = $diffMinutes * (20/60);


echo "cobrar $".$precio;
 $this->cobrar($precio, $idABorrar);


          }	
         catch(Exception $e)
        { 
         print "Error!: " . $e->getMessage(); 
         die();
        }
	 }

	 public function cobrar($precio, $id)
	 {
	 	                   	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE Estacionamiento SET precio = '$precio'	
				WHERE id='$id'");	
			$consulta->execute();
			 return $consulta->fetchObject('Estacionamiento');
				//$consulta->bindValue
	 }


	/*public static function BorrarCdPorAnio($año)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from cds 				
				WHERE jahr=:anio");	
				$consulta->bindValue(':anio',$año, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }*/

	/*public function ModificarCd()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel='$this->titulo',
				interpret='$this->cantante',
				jahr='$this->año'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }*/
	public function ProbandoEstacionamiento()
	 {
	 	return "pasaste por estacionamiento.php";
	 }
  
	 public function InsertarElVehiculo()
	 {
                   try{
	 			$date = new DateTime();
	 			$this->fechaActual= $date->format('Y-m-d H:i:s');

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
                                //var_dump($objetoAccesoDato);
				$consulta =$objetoAccesoDato->RetornarConsulta('INSERT INTO Estacionamiento (patente,fechaIngreso) values (?, ?)');
                                
				$consulta->execute(array($this->patente, $this->fechaActual));
                               
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
                        }
                     catch(Exception $e)
                    { 
                     print "Error!: " . $e->getMessage(); 
                     die();
                    }
	 }

	  /*public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel=:titulo,
				interpret=:cantante,
				jahr=:anio
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarElCdParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (titel,interpret,jahr)values(:titulo,:cantante,:anio)");
				$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
				$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
				$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }*/
	 public function GuardarVehiculo()
	 {




	 	InsertarElVehiculo();
	 	/*if($this->id>0)
	 		{
	 			$this->ModificarCdParametros();
	 		}else {
	 			$this->InsertarElCdParametros();
	 		}*/

	 }


  	public static function TraerTodoLosVehiculosEstacionados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Estacionamiento where fechaEgreso IS NULL"); //si no anda precio = 0
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Estacionamiento");		
	}	 

    public static function TraerTodoLosVehiculosRetirados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Estacionamiento where fechaSalida IS NOT NULL"); //si no anda precio > 0
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Estacionamiento");		
	}

    public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select * from Usuarios where");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuarios");		
	}


/*
	public static function TraerUnd($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, titel as titulo, interpret as cantante,jahr as año from cds where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
			return $cdBuscado;				

			
	}

	public static function TraerUnCdAnio($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=? AND jahr=?");
			$consulta->execute(array($id, $anio));
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}

	public static function TraerUnCdAnioParamNombre($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $anio, PDO::PARAM_STR);
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}
	
	public static function TraerUnCdAnioParamNombreArray($id,$anio) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  titel as titulo, interpret as cantante,jahr as año from cds  WHERE id=:id AND jahr=:anio");
			$consulta->execute(array(':id'=> $id,':anio'=> $anio));
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('cd');
      		return $cdBuscado;				

			
	}*/


	public static function traerRecaudado()
{
try{

	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

	$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM Estacionamiento WHERE precio IS NOT NULL AND precio > 0");
	$consulta->execute();

	$vechiculos = $consulta->fetchAll(PDO::FETCH_CLASS, "Estacionamiento");

	$recaudado;

	$contador = 0;
	foreach ($vechiculos as $vehiculo) {

		$aux1= explode('-', $vehiculo->fechaEgreso);
                
                $otroAux= explode(':',$aux1[2]);
                  $tiempo = explode(' ',$otroAux[0]);
                

		$date= new DateTime();
                $aux = $date->format('Y-m-d H:i:s');
                $aux2 = explode('-', $aux);
                $aux3 = explode(':', $aux2[2]);
                $ahora = explode(' ', $aux3[0]);

		if($ahora[0] == $tiempo[0])
		{

			$recaudado[$contador] = $vehiculo;
		}
		$contador++;
	}


	return $recaudado;
}
catch(Exception $e)
{ 
   print "Error!: " . $e->getMessage(); 
   die();
}

}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->patente."  ".$this->fechaEntrada."  ".$this->precio;
	}

	
}