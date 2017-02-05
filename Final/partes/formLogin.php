<link href="https://arganarastomas.000webhostapp.com/css/bootstrap.min.css" rel="stylesheet">
<link href="https://arganarastomas.000webhostapp.com/css/ingreso.css" rel="stylesheet">
<body>
 <script type="text/javascript" src="https://arganarastomas.000webhostapp.com/js/funcionesLogin.js"></script>
 </body>




  <link rel="stylesheet" type="text/css" href="https://arganarastomas.000webhostapp.com/css/estilo.css">
  <link rel="stylesheet" type="text/css" href="https://arganarastomas.000webhostapp.com/css/animations.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="https://arganarastomas.000webhostapp.com/css/style.css" rel="stylesheet" type="text/css">

<body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


</body>

<?php 
 
session_start();
if(!isset($_SESSION['registro'])){  ?>
    <div id="formLogin" class="container">

      <form  class="form-ingreso">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
        <label for="correo" class="sr-only">Usuario</label>
                <input type="text" id="user" class="form-control" placeholder="Usuario" required="" autofocus="" value="<?php  if(isset($_COOKIE["registro"])){echo $_COOKIE["registro"];}?>">
        <label for="clave" class="sr-only">Clave</label>
        <input type="password" id="clave" minlength="4" class="form-control" placeholder="clave" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
          
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="validarLogin2()" >Ingresar</button>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="Admin2()" >ADMIN</button>

        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="Empleado2()" >EMPLEADO</button>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="Comprador2()" >COMPRADOR</button>
      </form>



    </div> <!-- /container -->

  <?php }else{echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
    
<div id="informe">

</div>
  <?php  }  ?>