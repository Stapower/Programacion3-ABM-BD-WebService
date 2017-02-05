<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../AccesoDatos.php');
	require_once('../Materiales.php');
	ini_set('display_errors','Off');

	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:wsPdo'); 

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'
	$server->register('ObtenerTodosLosMateriales',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosMateriales',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los Materiales'    			
					);

		$server->register('ObtenerMaterial',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosCds',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene un material'    			
					);


			$server->register('EliminarMaterial',                	
						array('id'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ObtenerTodosLosCds',             
						'rpc',                        		
						'encoded',                    		
						'Elimina el material'    			
					);


				$server->register('AgregarMaterial',                	
						array('nombre', 'precio', 'tipo'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#AgregarMaterial',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los Cds de la Base de Datos'    			
					);

				$server->register('ModificarMaterial',                	
						array('id', 'nombre', 'precio', 'tipo'),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#AgregarMaterial',             
						'rpc',                        		
						'encoded',                    		
						'Obtiene todos los Cds de la Base de Datos'    			
					);



	function EliminarMaterial($id)
	{
		try
		{
			Materiales::EliminarMateriales($id);	
	    }
	    catch(Exception $ex)
	    {
	    	echo $ex->message();
	    }
	}


	function AgregarMaterial($nombre, $precio, $tipo) {
		
		$mat = new Materiales();
		$mat->nombre = $nombre;
		$mat->precio = $precio;
		$mat->tipo = $tipo;
		return $mat->InsertarMaterial();
	}


		function ModificarMaterial($id,$nombre, $precio, $tipo) {
		
		$mat = new Materiales();
		$mat->id = $id;
		$mat->nombre = $nombre;
		$mat->precio = $precio;
		$mat->tipo = $tipo;
		return $mat->ModificarMaterial();
	}


	function ObtenerTodosLosMateriales() {
		
		$resultado = Materiales::TraerTodoLosMateriales();
		return $resultado;
	}
///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
