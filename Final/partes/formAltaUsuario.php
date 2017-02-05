<?php 


session_start();
if(isset($_SESSION['usuario']))
{

	require_once("clases/AccesoDatos.php");
	require_once("clases/Usuarios.php");
	$arrayDeUsuarios=Usuario::TraerTodosLosUsuarios();
//var_dump($arrayDeUsuarios);
	//echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>
<table border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" style=" background-color: beige;">
	<thead>

	<td><a onclick=grillaAlta() class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Agregar Usuario</a></td>

		<tr>
			<th style='color:#000000'; >Usuario</th><th style='color:#000000';>Rol</th><th style='color:#000000';>Ascender</th><th style='color:#000000';>Degradar</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeUsuarios as $usuario) {
	echo"<tr>
			
			<td style='color:#000000';>$usuario->usuario</td>
			<td style='color:#000000';>$usuario->rol</td>
			<td><a onclick='Accion($usuario->id, 'Ascender')' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Ascender</a></td>

			<td><a onclick='Accion($usuario->id, 'Degradar')' class='MiBotonUTN'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Degradar</a></td>
			
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>