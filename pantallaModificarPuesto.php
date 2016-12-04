
<?php
require ("connect_db.php");
require ("clases_lucas/empresa.php");
require ("clases_lucas/competencia.php");
require ("clases_lucas/puesto.php");

/*cargo todas las empresas para mostrar luego en el combobox*/
$GestorPuesto= GestorPuesto::getInstancia();
$empresas = $GestorPuesto->getAllEmpresas();

/*Ahora Busco todas las competencias para mostrar en una grilla*/

$GestorCompetencia=GestorCompetencia::getInstancia();
$competencias= $GestorCompetencia->buscarCompetencias();


?>



<!DOCTYPE html>
<html lang="en">

<script type="text/javascript">
            function RedirectCancelar() {
               window.location="gestionarPuestos.php";
            }
</script>

<head>

    <meta charset="utf8_general_ci">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alta Puesto</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img id="logo" src="img/logo_brand.png"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Dar de Alta</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="">Perfil</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="cerrar_sesion.php">Cerrar Sesion</a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   

<section id="services" class="bg-alta-puesto">
        <div class="container">
            <div class="row">
               <div class="text-left">
                <div class="col-lg-2 col-md-offset-4">
                    <h1>Alta de Puesto</h1>
                    </div>
                </div>
            </div>
            </div>
    </section>

<!-- Services Section -->

<body id="page-top" class="index bg-light-gray">
  <form action="darDeAltaPuesto.php" method="POST" enctype="multipart/form-data" onSubmit="return validation()">
    <div class="container">
     <div class='col-md-4 col-md-offset-4'>
            <!--<div class="input-group">-->
            <h2>Dar de Alta puesto o función</h2>
		<br><br><h4>Código</h4><input type="text" REQUIRED class="form-control" name="codigo" placeholder="Código..." value="" /> <br><br>
		<h4>Nombre del Puesto</h4><input type="text" REQUIRED class="form-control" name="nombrePuesto" placeholder="Nombre del Puesto..." value="" /> <br><br>
		<h4>Descripción</h4><input class="form-control" type="text" REQUIRED name="descripcion" placeholder="Descripción..." value="" /> <br>
		<br><br>
		<center>
		<h4>Empresa</h4><select name="empresa" class="form-control" placeholder=".col-xs-2">
		<option value="0"> - Empresa -</option>
		<?php while($row=$empresas->fetch_assoc()){ ?>
            <option value="<?php echo $row['id_empresa']?>"><?php echo $row['nombre']?></option>
        <?php } ?>
       </select><br><br><br><h4>Características del Puesto</h4>
       <table class="table table-bordered">
    <thead>
      <tr>
        <th>Seleccionar</th>
        <th>Competencias</th>
        <th>Ponderación</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        while($row =$competencias->fetch_assoc()){ ?>

        <tr>
        <td><input type="checkbox" name="competencia[]" value="<?php echo $row['codigo_competencia']; ?>"></td>
        <td> <?php echo $row['nombre']; ?> </td>
        <td><select name="pond[]" class="form-control" placeholder=".col-xs-2">         <option value="0">- Ponderación -</option>
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option></select></td>
        </tr>
      <?php } ?>
       </tbody>
  </table><br><br><br>
		<input class="btn btn-primary active" type="submit" value="Aceptar" /><a href ="gestionarPuestos.php">   <button class="btn btn-primary active" onclick="RedirectCancelar();">Cancelar</button></a>     <br><br>    
         </div></div></form><br><br><br><br><br>  
    
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!--ajax-->
    <script src="js/ajax.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    <script src="js/submit_javascript.js"></script>

</body>
</html>