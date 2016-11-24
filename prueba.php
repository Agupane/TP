<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

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



$name = $email = $gender = $comment = $website = "";






?>
<h2>PHP Form Validation Example</h2>

<form method="post" action="darDeAtlta.php"> 

  Codigo <input type="text" REQUIRED name="codigo" placeholder="Codigo..." value="" /> <br><br>
  Nombre del Puesto <input type="text" REQUIRED name="nombrePuesto" placeholder="Nombre del Puesto..." value="" /> <br><br>
  Descripcion <textarea class="form-control" REQUIRED name="descripcion" rows="5" cols="40" placeholder="Descripcion..." value="" /></textarea> <br>
    


  <br><br>
  Gender:
  <input type="radio" name="gender" <?php echo"checked" ?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <br><br>
  Empresa <select name="empresa" class="form-control" placeholder=".col-xs-2">
    <option value="0"> </option>
    <?php while($row=$empresas->fetch_assoc()){ ?>
            <option value="<?php echo $row['id_empresa']?>"><?php echo $row['nombre']?></option>
        <?php } ?>
       </select><br><br>

  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Activa</th>
        <th>Competencia</th>
        <th>Ponderacion</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        while($row =$competencias->fetch_assoc()){ ?>
        <tr>
        <td><input type="radio"></td>
        <td> <?php echo $row['nombre']; ?> </td>
        <td>asdsa</td>
        </tr>
      <?php } ?>
       </tbody>
  </table>
</body>
</html>