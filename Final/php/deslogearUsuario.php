<?php 
session_start();

	$_SESSION['registrado']=null;
	$_SESSION['usuario'] = null;
	$_SESSION['rol'] = null;

session_destroy();

 ?>