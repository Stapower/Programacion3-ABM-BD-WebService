<?php 
//session_start();
if(true)//isset($_SESSION['registrado']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/Materiales.php");

	$host = 'http://localhost:8080/Final/ws_5/SERVIDOR/ws.php';
	$client = new nusoap_client($host . '?wsdl');
	$client->soap_defencoding = 'UTF-8';

	$materiales = $client->call('ObtenerTodosLosMateriales', array());
	//$materiales = Materiales::TraerTodoLosMateriales();
//var_dump($materiales);
	//$arrayDeVehiculos=Estacionamiento::TraerTodoLosVehiculosEstacionados();
	//echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style=" background-color: beige;">
	<thead>
		<tr>
			<th style='color:#000000'; background-color: '#79C5DF'>Eliminar</th> <th style='color:#000000'; background-color: '#79C5DF'>Modificar</th> <th style='color:#000000'; background-color: '#79C5DF'>Nombre</th><th style='color:#000000'; background-color: '#79C5DF'>raza</th><th style='color:#000000'; background-color: '#79C5DF'>tipo</th>

		</tr>
	</thead>
	<tbody>

		<?php 
//var_dump($materiales[0]);
//var_dump($materiales);
//echo $materiales->nombre;

	

foreach ($materiales as $material) {

	$id = $material['id'];
	$nombre = $material['nombre'];
	$precio = $material['raza'];
	$tipo = $material['tipo'];
	
	echo"<tr>
			<td><a onclick='RetirarMaterial($id)' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Borrar</a></td>
			<td><a onclick=GrillaModificar($id,'$nombre','$precio','$tipo') class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Modificar</a></td>			
			<td style='color:#000000';>$nombre </a></td>
			<td style='color:#000000';>$precio</a></td>
			<td style='color:#000000';>$tipo</a></td>
			
		</tr>  ";

}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>