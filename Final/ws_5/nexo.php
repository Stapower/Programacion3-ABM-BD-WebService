<?php


		require_once('./SERVIDOR/lib/nusoap.php');
		require_once('AccesoDatos.php');
		require_once('Cd.php');

		$host = 'http://localhost:8080/TP/webservice/clase11/ws_5/SERVIDOR/ws.php';
		
		$client = new nusoap_client($host . '?wsdl');

		
//INVOCO AL METODO DE MI WS		
		$cds = $client->call('ObtenerTodosLosCds', array());
		var_dump($cds);
		
?>


