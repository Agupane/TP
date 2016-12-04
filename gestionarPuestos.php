<?php
require ("connect_db.php");
require ("clases_lucas/empresa.php");
require ("clases_lucas/competencia.php");
require ("clases_lucas/puesto.php");
session_start();



/*cargo todas las empresas para mostrar luego en el combobox*/
$GestorPuesto= GestorPuesto::getInstancia();
$empresas = $GestorPuesto->getAllEmpresas();


/*Ahora Busco todas las competencias para mostrar en una grilla*/

$GestorPuesto=GestorPuesto::getInstancia();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $puesto = $GestorPuesto->buscarContiene($_POST["codigo"],$_POST["nombrePuesto"],$_POST["empresa"]); 

}


?>



<!DOCTYPE html>
<html lang="en">

<script type="text/javascript">
            function RedirectAlta() {
               window.location="pantallaAltaPuesto.php";
            }
</script>

<script>
function verifica(){ 
    var valorRadio;
    var i; 
    for (i=0;i<document.verificaRadio.codigosGuardados.length;i++){ 
        if (document.verificaRadio.codigosGuardados[i].checked) 
            break; 
    } 
    valorRadio = document.verificaRadio.codigosGuardados[i].value;
    //alert('Es'+valorRadio); 
} 
</script>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestionar Puestos</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
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
                        <a class="page-scroll" href="#">Gestionar Puesto</a>
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
                    <h1>Gestionar Puestos</h1>
                    </div>
                </div>
            </div>
            </div>
    </section>

<!-- Services Section -->

<body id="page-top" class="index">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" onSubmit="return validation()">
  <br><div class="container">
     <div class='col-md-4 col-md-offset-4'>
             <h2>Puestos o funciones a evaluar</h2>
  
        <br><br><h4>Código</h4><input class="form-control" type="text" name="codigo" placeholder="Código..." value="" /> <br><br>
        <h4>Nombre del Puesto</h4> <input class="form-control" type="text" name="nombrePuesto" placeholder="Nombre del Puesto..." value="" /> <br><br>
        <br>
        <center>
        <h4>Empresa</h4><select name="empresa" class="form-control">
        <option value="0"> - Empresa -</option>
        <?php while($rowEmpresas=$empresas->fetch_assoc()){ ?>
            <option value="<?php echo $rowEmpresas['id_empresa']?>"><?php echo $rowEmpresas['nombre']?></option>
        <?php } ?>
       </select><br><br><br>
        <input class="btn btn-primary active" type="submit" value="Buscar" /> <input class="btn btn-primary active" type="button" value="Nuevo" onclick="RedirectAlta();" />
        <br><br>
        </center>
        </div>
        </div>
        </form>
<form name="verificaRadio">
<div class="container">
     <div class='col-md-4 col-md-offset-4'>
    <table class="table table-fixed">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre de puesto</th>
        <th>Empresa</th>
        <th>Seleccionar</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        for ($i=0;$i<count($puesto); $i++) {
          ?>
        <tr>
         <td> <?php echo $puesto[$i]->getCodigo(); ?> </td>
          <td> <?php echo $puesto[$i]->getNombre(); ?> </td>
           <td> <?php echo $GestorPuesto->buscarNombreEmpresa($puesto[$i]->getIdEmpresaDTO());?> </td>
            <td><input type="radio" name="codigosGuardados" value="<?php echo $puesto[$i]->getCodigo(); ?>" ></td>    
        </tr>
      <?php } }?>
       </tbody>
  </table>
  </div>
    <br><br>
</div>
<!--<center><a href="modificar.php?id=optradio[]">--><input type="button" class="btn btn-primary active" onclick="verifica()" value="Modificar">  </form>
<!-- Modal de Eliminar -->
                <a href="#myModal" role="button" class="btn btn-primary active" data-toggle="modal" onclick="verifica()">Eliminar</a>


                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="color-titulo"><strong>Eliminar Puesto</strong></h4>
                            </div><!--final modal-header-->
                            <div class="modal-body">
                                <form method="post" action="#" role="form" id="form_id" >
                                    <div class="container" style="margin-top:1px"></div>      
                    <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <span class="col-sm-12 col-md-10  col-md-offset-1 ">
                                            <h3>Los datos del puesto "Puesto" serán eliminados del Sistema</h3><br>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">

                                        <div class="form-group">
                                            <input class="btn btn-primary active" type="submit" name="submit_id" id="bnt_id" value="Eliminar" onclick="submit_by_id()"/> 
                                            <input class="btn btn-primary active" name="submit_id" value="Cancelar" onclick="submit_by_id()"/>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                
                            </form>
                            </div><!--final modal-body-->
                        </div><!--final modal-content-->
                    </div><!-- final modal-dialog-->
                </div><!-- final myModal -->

<a href="index.php"> <button class="btn btn-primary active">Salir</button></a><!--</center>-->  
<br><br><br><br><br><br><br><br><br><br>
    
<!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/lab.js"></script>

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
    <!--<script src="js/ajax.js"></script>-->
    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    <script src="js/submit_javascript.js"></script>


</body>
</html>