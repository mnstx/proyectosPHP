<?php
include 'func.php';
$id = $_GET['id'];
$con->query("DELETE FROM pacientes WHERE id = '$id'");

header('location:index.php');
 ?>
