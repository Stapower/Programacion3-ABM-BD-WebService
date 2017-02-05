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
if(isset($_SESSION['usuario'])){  

  //var_dump($_POST) 

  ?>
    <div id="formUsuario" class="container">
      <form  class="form-ingreso">
        <h2 class="form-ingreso-heading">Ingrese los datos</h2>


Nombre del material<input type="text" id="nombree" class="form-control" placeholder="nombre" required="" autofocus="" value=<?php  if(isset($_POST['nombre'])){echo $_POST['nombre'];}?>>
         raza  <input type="text" id="precioo" class="form-control" placeholder="raza" required="" autofocus="" value=<?php  if(isset($_POST['precio'])){echo $_POST['precio'];}?>>
          Tipo<input type="text" id="tipoo" class="form-control" placeholder="Tipo" required="" autofocus="" value=<?php  if(isset($_POST['tipo'])){echo $_POST['tipo'];}?>>
 <?php
        if(isset($_POST['id']))
        {
          $id = $_POST['id'];
          echo "<input type='button' class='btn btn-lg btn-primary btn-block' value='Modificar' onclick= ModificarMaterial($id)>";
        }
        else
        {
          echo "<input type='button' class='btn btn-lg btn-primary btn-block' value='Alta' onclick= AltaMaterial()>";
        }
?>
        </div>

      </form>



    </div> <!-- /container -->

  <?php }else{echo"<h3>usted NO esta logeado. </h3>";         

 }  ?>