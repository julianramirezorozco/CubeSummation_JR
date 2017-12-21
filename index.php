<?php 


// Clase Cubo
include "includes/cube.php";

session_name("cubeJulianR");
session_start();

// Respuesta
$msg = '';

// switche Establecer
$sw_E = 0;
// Switche Consulta
$sw_C = 0;

// Valores de los campos Establecer
$val_set = array("set1"=>"","set2"=>"","set3"=>"","set4"=>"");
// Valores de los campos de Consulta
$val_query = array("query1"=>"","query2"=>"","query3"=>"","query4"=>"","query5"=>"","query6"=>"");

if(!isset($_POST["metodo"])){
  $cubo = new cubo();
  $cubo->inicializar();
  $_SESSION["cubo"] = $cubo;

}else{
  $cubo = $_SESSION["cubo"];

  // Método Establecer
  if($_POST["metodo"]=="Establecer"){

    $val_set["set1"] = $_POST["set1"];
    $val_set["set2"] = $_POST["set2"];
    $val_set["set3"] = $_POST["set3"];
    $val_set["set4"] = $_POST["set4"];

    $sw_E = 1;
    $cubo->establecer($_POST["set1"],$_POST["set2"],$_POST["set3"],$_POST["set4"]);
    $msg = "Establecer (".$_POST["set1"].",".$_POST["set2"].",".$_POST["set3"].") = ".$_POST["set4"];
  }

  // Método Consulta
  if($_POST["metodo"]=="Consulta"){  
    $val_query["query1"] = $_POST["query1"]; //x1   
    $val_query["query2"] = $_POST["query2"]; //y1 
    $val_query["query3"] = $_POST["query3"]; //z1 
    $val_query["query4"] = $_POST["query4"]; //x2
    $val_query["query5"] = $_POST["query5"]; //y2
    $val_query["query6"] = $_POST["query6"]; //z2

    $sw_C = 1;
    $msg = "Respuesta: ".$cubo->consulta($_POST);

  } 

  $_SESSION["cubo"] = $cubo;
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cube Summation by Julian Ramirez</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <h1 class="text-center">Cube Summation <small>by Julian Ramirez</small></h1>

          <form action="index.php" method="POST" onsubmit="return validateform(this)">
           <div class="form-group">
              <h3>MÉTODO</h3>
              <select id="metodo" name="metodo" class="form-control">
                <option value="">Seleccione...</option>
                <option value="Establecer" <?php if(isset($_POST["metodo"])){if($_POST["metodo"]=='Establecer'){ echo 'selected';}} ?>>Establecer/Actualizar</option>
                <option value="Consulta" <?php if(isset($_POST["metodo"])){if($_POST["metodo"]=='Consulta'){ echo 'selected';}} ?>>Consulta</option>
              </select>
            </div>

          <div id="establecer_actualizar" <?php if($sw_E==0){echo 'class="hider"';} ?>>
            <h3>ESTABLECER/ACTUALIZAR:</h3>
            <div class="form-group">
              <input id="set1" class="form-control" type="text" name="set1" placeholder="x" value="<?php echo $val_set["set1"]; ?>" />
            </div>
             <div class="form-group">
              <input id="set2" class="form-control" type="text" name="set2" placeholder="y" value="<?php echo $val_set["set2"]; ?>" />
            </div>
             <div class="form-group">
              <input id="set3" class="form-control" type="text" name="set3" placeholder="z" value="<?php echo $val_set["set3"]; ?>" />
            </div>
             <div class="form-group">
              <input id="set4" class="form-control" type="text" name="set4" placeholder="w" value="<?php echo $val_set["set4"]; ?>" />
            </div>
          </div>

          <div id="consulta_box" <?php if($sw_C==0){echo 'class="hider"';} ?>>
            <h3>CONSULTA:</h3>
            <div class="form-group">
              <input id="query1" class="form-control" type="text" name="query1" placeholder="x1" value="<?php echo $val_query["query1"]; ?>" />
            </div>
            <div class="form-group">
              <input id="query2" class="form-control" type="text" name="query2" placeholder="y1" value="<?php echo $val_query["query2"]; ?>" />
            </div>
            <div class="form-group">
              <input id="query3" class="form-control" type="text" name="query3" placeholder="z1" value="<?php echo $val_query["query3"]; ?>" />
            </div>
            <div class="form-group">
              <input id="query4" class="form-control" type="text" name="query4" placeholder="x2" value="<?php echo $val_query["query4"]; ?>" />
            </div>
            <div class="form-group">
              <input id="query5" class="form-control" type="text" name="query5" placeholder="y2" value="<?php echo $val_query["query5"]; ?>" />
            </div>
            <div class="form-group">
              <input id="query6" class="form-control" type="text" name="query6" placeholder="z2" value="<?php echo $val_query["query6"]; ?>" />
            </div>
          </div>

          <div id="btnid" <?php if($sw_E==0 && $sw_C==0){echo 'class="hider"';} ?>>
            <input type="submit" class="btn btn-primary" value="Enviar" />
            <input type="button" id="reiniciar" class="btn btn-danger" value="Reiniciar" />
          </div>

          </form>
        </div>
        <div class="col-sm-3"></div>
      </div>

      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <br>
          <h2 id="respuesta"><?php echo $msg; ?></h2>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/function.js"></script>
  </body>
</html>
