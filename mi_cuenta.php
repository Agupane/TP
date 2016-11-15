<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Datos personales</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

<body id="page-top" class="index">

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

            <!-- Collect the nav links, forms, and other content for toggling -->
				<?php
				session_start();
				//print_r($_SESSION);
				?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="mi_cuenta.php"><?php echo $_SESSION['usuario'];?></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="">Noticias</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#about">Campamento</a>
                    </li>-->
                    <li>
                        <a class="page-scroll" href="cerrar_sesion.php">Cerrar Sesion</a>
                    </li>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   

<!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                     <?php

                        include("connect_db.php");

                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM gestion_usuarios WHERE id=$id";
                        $resultado = $conexion->query($query);
                        $row = $resultado->fetch_assoc();
                     ?>

                    <div class="col-sm-2 thumbnail img-responsive img-circle"><img src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>"/></div>
                    <h2 class="section-heading">Cuenta: <?php echo $_SESSION['usuario']; ?> <br> <td>Nombre: <?php echo $_SESSION['nombre'];?></td> <br>
                    <td>Apellido: <?php echo $_SESSION['apellido'];?></td> <br> <td>Email: <?php echo $_SESSION['email'];?></td> <br>
                    <td><a href="modificar.php?id=<?php echo $_SESSION['id']; ?>">Modificar Contraseña</a></td> </h2>
                    <h3 class="section-subheading text-muted">Un equipo de personas que trabajan en conjunto, sin fines de lucro, para agradar a Dios en el ministerio de la niñez.<br> Nuestra <b>misión</b> es complementar a la familia en alcanzar a los niños y ayudarlos a convertirse en verdaderos seguidores de <b>Cristo</b>.</h3>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

    <script src="js/submit_javascript.js"></script>

</body>
</html>