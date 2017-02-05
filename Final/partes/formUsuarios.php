<link href="https://arganarastomas.000webhostapp.com/css/bootstrap.min.css" rel="stylesheet">
<link href="https://arganarastomas.000webhostapp.com/css/ingreso.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://arganarastomas.000webhostapp.com/css/estilo.css">
<link rel="stylesheet" type="text/css" href="https://arganarastomas.000webhostapp.com/css/animations.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="https://arganarastomas.000webhostapp.com/css/style.css" rel="stylesheet" type="text/css">

<body>
 <script type="text/javascript" src="https://arganarastomas.000webhostapp.com/js/funcionesABM.js"></script>
 <script type="text/javascript" src="https://arganarastomas.000webhostapp.com/js/funcionesAjax.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>

<?php 
session_start();
if(isset($_SESSION['usuario'])){  ?>
    <div id="formUsuario" class="container">

      <form  class="form-ingreso">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
        <label for="correo" class="sr-only">Usuario</label>
                <input type="text" id="user" class="form-control" placeholder="Usuario" required="" autofocus="" value=<?php  if(isset($_POST['usuario'])){echo $_POST['usuario'];}?>>
                <input type="password" id="pass" class="form-control" placeholder="Contraseña" required="" autofocus="" value="">
        <label class="sr-only"> PERFIL</label>
<select name="perfiles">
  		<option value="admin">Administrador</option>
  		<option value="empleado">Empleado</option>
		</select>

 <?php
        if(isset($_POST['id']))
        {
          echo "<input type='button' class='btn btn-lg btn-primary btn-block' value='Modificar' onclick= GuardarUsuario($_POST['id'])>";
        }
        else
        {
          echo "<input type='button' class='btn btn-lg btn-primary btn-block' value='Alta' onclick= GuardarUsuario()>";
        }
?>
        </div>

      </form>



    </div> <!-- /container -->

  <?php }else{echo"<h3>usted NO esta logeado. </h3>";         

 }  ?>