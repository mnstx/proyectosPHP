<?php require_once 'con.php'; ?>
<?php require_once 'helpers.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <header id="cabecera">
      <!-- Logo -->
      <div id="logo">
        <a href="index.php">
          Blog de Videojuegos
        </a>
      </div>
      <!-- Navegacion -->
      <nav id="menu">
        <ul>
          <li> <a href="index.php">Inicio</a> </li>
          <li>
            <?php
            $result = conseguirCategorias($db);
            while($categorias = mysqli_fetch_assoc($result)):
            ?>
            <li>
              <a href="categoria.php?id=<?=$categorias['id']?>"><?=$categorias['nombre']?></a>
            </li>
          <?php endwhile; ?>
          </li>
          <li> <a href="index.php">Sobre Mi</a> </li>
          <li> <a href="index.php">Contacto</a> </li>
        </ul>
      </nav>

    </header>
<div id="contenedor">
