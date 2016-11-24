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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#"></a>
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

<center>
	<form action="operacion.php" method="POST" enctype="multipart/form-data" onSubmit="return validation()">
		<br><br><br><br><br><br><input type="text" REQUIRED name="usuario" placeholder="Usuario..." value="" /> <br><br>
		<input type="password" REQUIRED name="password" placeholder="Contraseña..." value="" /> <br><br>
		<input type="password" REQUIRED name="repassword" placeholder="Verifica Contraseña..." value="" /> <br><br>
		<input type="text" REQUIRED name="nombre" placeholder="Nombre..." value="" /> <br><br>
		<input type="text" REQUIRED name="apellido" placeholder="Apellido..." value="" /> <br><br>
		Sexo <input type="radio" name="sexo" id="mujer" value="Mujer">
		<label for="mujer">Mujer </label>
		<input type="radio" name="sexo" id="varon" value="Varon">
		<label for="varon">Varon </label>
		<br><br>
		<center>
		<input type="text" REQUIRED name="dia" placeholder="Dia" value="" /> / 
		<input type="text" REQUIRED name="mes" placeholder="Mes" value="" /> /
		<input type="text" REQUIRED name="ano" placeholder="Año" value="" />    Ej: 16/03/1992 </center><br><br>
		<input type="text" REQUIRED name="email" placeholder="Email..." value="" /> <br><br>
		<!--<input type="file" REQUIRED name="Imagen"/> <br><br>-->
		<input type="submit" value="Aceptar" />
	</form>
	</center>
    
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