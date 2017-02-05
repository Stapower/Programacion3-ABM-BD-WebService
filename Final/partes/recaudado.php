<?php 


session_start();
if(isset($_SESSION['usuario']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/Estacionamiento.php");
	$arrayDeVehiculos=Estacionamiento::TraerRecaudado();

	//echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000"  style=" background-color: beige;">
	<thead>
		<tr>
			<th style='color:#000000'; background-color: '#79C5DF'>Patente</th>
                        <th style='color:#000000'; background-color: '#79C5DF'>Precio</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeVehiculos as $vehiculo) {
	echo"<tr>
			
			<td style='color:#000000';>$vehiculo->patente</td>
			<td style='color:#000000';>$vehiculo->precio</td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>