<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Impacto</title>

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
                    <?php
                    if($_SESSION['permiso']==4 || $_SESSION['permiso']==3 ){
                    	echo '<li class="dropdown">
         					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion<span class="caret"></span></a>
         				         <ul class="dropdown-menu">
            					   <li><a href="tabla.php">Permisos</a></li>
            					   <li><a href="#">Campamento</a></li>
          				         </ul>
                              </li>';
                    }
                    ?>
                    <li>
                        <a class="page-scroll" href="cerrar_sesion.php">Cerrar Sesion</a>
                    </li>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
   

<!-- Seccion Tabla -->


<div class="container">
  <h2>Lista de Usuarios</h2>
  <p>Aca se pueden modificar cada una de los atributos de los Usuarios:</p>
  <center>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Permiso</th>
        <?php
        if($_SESSION['permiso']==4){
        	echo '<th>Administrar Nivel</th>'; 
        }
        ?>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<?php
			include("connect_db.php");

			$query="SELECT * FROM gestion_usuarios ORDER BY id desc";
			$resultado = $conexion -> query($query);
			while($row=$resultado->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $row['usuario'];?></td>
				<td><?php echo $row['nombre'];?></td>
				<td><?php echo $row['apellido'];?></td>
				<td><?php echo $row['email'];?></td>
				<?php if($row['permiso']== -1) {echo '<td><a href="cancela_pedido.php?id=';}?><?php if($row['permiso']== -1) {echo $row['id'];}?><?php if($row['permiso']== -1) {echo '"><span class="glyphicon glyphicon-remove"> </span></a>  |  
				    <a href="modifica_permiso.php?id=';}?> <?php if($row['permiso']== -1) {echo $row['id'];}?><?php if($row['permiso']== -1) {echo '"><span class="glyphicon glyphicon-ok">  </span></td>';}?>
                <?php if($row['permiso']== 0) {echo '<td><span class="glyphicon glyphicon-remove"> </span></td>';}?>
                <?php if($row['permiso'] > 0) {echo '<td><span class="glyphicon glyphicon-ok"> </span></td>';}?>

				<?php if($_SESSION['permiso']==4){echo '<td><div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default'; }?> <?php if($row['permiso'] == 1 && $_SESSION['permiso']==4 ){echo 'active';}?> <?php if($_SESSION['permiso']==4){ echo '<td><div class="btn-group" data-toggle="buttons"><input type="radio" id="q156" name="quality[25]" value="1" /><span class="glyphicon glyphicon-user"></span>
                </label>';} ?>
                <?php if($_SESSION['permiso']==4){echo '<div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default'; }?> <?php if($row['permiso'] == 2 && $_SESSION['permiso']==4){echo 'active';}?> <?php if($_SESSION['permiso']==4){ echo '<td><div class="btn-group" data-toggle="buttons"><input type="radio" id="q156" name="quality[25]" value="1" /><span class="glyphicon glyphicon-star"></span>
                </label>';} ?><?php if($_SESSION['permiso']==4){echo '<div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default'; }?> <?php if($row['permiso'] == 3 && $_SESSION['permiso']==4){echo 'active';}?> <?php if($_SESSION['permiso']==4){ echo '<td><div class="btn-group" data-toggle="buttons"><input type="radio" id="q156" name="quality[25]" value="1" /><span class="glyphicon glyphicon-tower"></span>
                </label>';}?>
                <?php if($_SESSION['permiso']==4){echo '</div></td>';}?>
			</tr>
			<?php
			}
		?>
  </tbody>
  </table>
  </center>
</div>

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