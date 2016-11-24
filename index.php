<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Capital Humano</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--  CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!--[IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <!-->

</head>

<body id="page-top" class="index">

    <!-- Navegación -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Display celular -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><img id="logo" src="img/logo_brand.png"></a>
            </div>

            <!-- Colección de links en el navbar  -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Quienes somos?</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Equipo</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Contacto</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

        <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"> Gestion de Consultas </div>
                <!--<div class="intro-heading"> IMPACTO</div>-->
                <div class="intro-heading"><img id="logo_header" src="img/logo_brand.png"></div>
                <!--Modal-->
                <a href="#myModal" role="button" class="btn btn-primary btn-lg" data-toggle="modal">Ingresar como usuario consultor</a>
                <a href="#myModal2" role="button" class="btn btn-primary btn-lg" data-toggle="modal">Realizar cuestionario</a> 
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="color-titulo"><strong>Ingresar cuenta</strong></h4>
                            </div><!--final modal-header-->
                            <div class="modal-body">
                                <form method="post" action="validar.php" role="form" id="form_id" >
                                    <div class="container" style="margin-top:1px"></div>      
                    <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <span class="fa-stack fa-4x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span> 
                                                <input class="form-control" placeholder="Usuario" name="usuario" id="usuario" type="text"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                <input class="form-control" placeholder="Contraseña" name="password" id="password" type="password"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-lg btn-primary" type="submit" name="submit_id" id="bnt_id" value="Ingresar" onclick="submit_by_id()"/> 
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                    <div class="panel-footer ">
                       #</a>
                    </div>
                            </form>
                            </div><!--final modal-body-->
                        </div><!--final modal-content-->
                    </div><!-- final modal-dialog-->
                </div><!-- final myModal -->

                <div class="modal fade" id="myModal2">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                                <h4 class="color-titulo"><strong>Nuevo Cuestionario</strong></h4>
                            </div><!--final modal-header-->
                            <div class="modal-body">
                                <form method="post" action="validarCuestionario.php" role="form" id="form_id" >
                                    <div class="container" style="margin-top:1px"></div>      
                    <div class="panel-body">
                            <fieldset>
                                <div class="row">
                                    <div class="center-block">
                                        <span class="fa-stack fa-4x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                             <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        <div class="form-group">
                                                <select class="form-control">
                                                  <option>DNI</option>
                                                  <option>CI</option>
                                                  <option>LE</option>
                                                  <option>LC</option>
                                                </select>
                                            </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </span> 
                                                <input class="form-control" placeholder="Nro de Documento" name="documento" id="documento" type="text"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                <input class="form-control" placeholder="Clave" name="claveCuestionario" id="claveCuestionario" type="claveCuestionario"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-lg btn-primary" type="submit" name="submit_id" id="bnt_id" value="Ingresar" onclick="submit_by_id()"/> 
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                    </div>
                    <div class="panel-footer ">
                        #
                    </div>
                            </form>
                            </div><!--final modal-body-->
                        </div><!--final modal-content-->
                    </div><!-- final modal-dialog-->
                </div><!-- final myModal -->
            </form>
            </div>
        </div>
    </header>
<br>

<!-- Seccion Servicios -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Grupo 4C</h2>
                    
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-file-text-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Test de Selección</h4>
                    <p class="text-muted">Informatizamos a través de evaluaciones, determinadas competencias técnicas y actitudinales.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-file-code-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Gestión de Candidatos ®</h4>
                    <p class="text-muted">Nuestro Sistema gestionará los mejores candidatos para su empresa, de la cual usted detallará que atributos y cuestiones técnicas/específicas es la que requiere para el puesto de trabajo que usted considera necesario.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Informes de alta calidad</h4>
                    <p class="text-muted">Contará con Informes detallados del personal, en los cuales podrá medir capacidades técnicas, actitudinales y/o específicas para su empresa.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Seccion Equipo -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Equipo de Gestion</h2>
                    <h3 class="section-subheading text-muted">Desarrolladores del Sistema de Gestión ®</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/1.jpg" class="img-responsive img-circle" alt="">
                        <h4>Nicolas Fiore</h4>
                        <p class="text-muted"> UTN | Estudiante de ingenieria en sistemas</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/nicolas.fiore.7?fref=ts"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/2.jpg" class="img-responsive img-circle" alt="">
                        <h4>Ignacio Gattarelli</h4>
                        <p class="text-muted"> UTN | Estudiante de ingenieria en sistemas </p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/ignacio.gattarelli?fref=ts"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/3.jpg" class="img-responsive img-circle" alt="">
                        <h4>Lucas Niklison</h4>
                        <p class="text-muted"> UTN | Estudiante de ingenieria en sistemasF </p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/lucas.niklison?fref=ts"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">#</p>
                </div>
            </div>
        </div>
    </section>
<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contacto JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.js"></script>

    <script src="js/submit_javascript.js"></script>

</body>
</html>