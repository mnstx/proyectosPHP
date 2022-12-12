<?php
include 'func.php';

$id = $_GET['id'];

$datos = $con->query("SELECT * FROM pacientes WHERE id = $id");

if (isset($_POST['editar'])){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tel = $_POST['telefono'];
  $info = $_POST['info'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];

  $con->query("UPDATE pacientes SET nombre='$nombre', apellido='$apellido', telefono='$tel', info='$info', fecha='$fecha', hora='$hora' WHERE id = $id");

  header('location:index.php');
};
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Editar turno</title>
  </head>
  <body>
    <div id="feedback-form">
      <h2 class="header">Editar turno:</h2>
      <div>
        <?php
          while ($reg = $datos->fetchArray()) {
              ?>
        <form method="POST">
          <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $reg['nombre']; ?>" required></input>
          <input type="text" name="apellido" placeholder="Apellido" value="<?php echo $reg['apellido']; ?>" required></input>
          <input type="text" name="telefono" placeholder="Telefono" value="<?php echo $reg['telefono']; ?>" required></input>
          <input type="text" name="info" placeholder="Anotaciones" value="<?php echo $reg['info']; ?>"></input>
          <input type="date" name="fecha" min="2023-01-01" max="2024-12-31" value="<?php echo $reg['fecha']; ?>" required>
          <input type="text" name="hora" value="<?php echo $reg['hora']; ?>" required></input>
          <button type="submit" name="editar">Editar</button>
        </form>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
