<?php

$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'blogmaster';

$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

session_start();
 ?>
