<html>
<head>
	<title>WEB SERVICE TEST</title>
	  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--final de Estilos-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	<div class="container">
	  	<div class="page-header">
        </div>
		<div class="page-header" align="center">
			<h1>WEB SERVICE #5</h1>      
		</div>
	<?php

		require_once('./SERVIDOR/lib/nusoap.php');
		require_once('AccesoDatos.php');
		require_once('Cd.php');

		$host = 'http://localhost:8080/TP/webservice/clase11/ws_5/SERVIDOR/ws.php';
		
		$client = new nusoap_client($host . '?wsdl');

		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}

//INVOCO AL METODO DE MI WS		
		$cds = $client->call('ObtenerTodosLosCds', array());
		var_dump($cds);
		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
				echo '<h2>Resultado</h2>';
				echo '<pre>' . var_dump($cds) . '</pre>';
				echo '<br/>';
				echo "<table border='1' width='70%'>
						<tr>
							<th>ID</th><th>CANTANTE</th><th>A&Ntilde;O</th><th>TITULO</th>
						</tr>";
				foreach($cds as $cd)
				{
					echo "<tr>
							<td>".$cd['id']."</td><td>".$cd['interpret']."</td><td>".$cd['jahr']."</td><td>".$cd['titel']."</td>
						  </tr>";
				}
				echo '</table>';
				echo '<br/>';
			}
		}
	?>
	</div>
</body>
</html>