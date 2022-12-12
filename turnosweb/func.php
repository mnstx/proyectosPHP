<?php

$con = new SQLite3('turnosweb.db') or die ("No se puede abrir la base de datos!");

function guardarTurno($con){

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $tel = $_POST['telefono'];
  $info = $_POST['info'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];

  $con->query("INSERT INTO 'pacientes'(nombre, apellido, telefono, info, fecha, hora) VALUES ('$nombre', '$apellido', '$tel', '$info', '$fecha', '$hora')");


  header('location:index.php');
}
 ?>
