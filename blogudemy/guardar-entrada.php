<?php
if(isset($_POST)){
  require_once 'includes/con.php';

  $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
  $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
  $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
  $usuario = $_SESSION['usuario']['id'];

  $errores = array();
//validar
      if (empty($titulo)){
        $errores['titulo'] = "El titulo no es valido";
      }

      if (empty($descripcion)){
        $errores['descripcion'] = "La descripcion no es valida";
      }

      if (empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = "La categoria no es valida";
      }

  if(count($errores) == 0){
    if(isset($_GET['editar'])){
      $entrada_id = $_GET['editar'];
      $usuario_id = $_SESSION['usuario']['id'];
      $sql = "UPDATE entradas SET titulo = '$titulo', descripcion = '$descripcion', categoria_id = $categoria WHERE id = $entrada_id AND usuario_id = $usuario_id";
    }else{
      $sql = "INSERT INTO entradas VALUES(NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
    }
    $guardar = mysqli_query($db, $sql);
    header('Location: index.php');
  }else{
    $_SESSION["errores_entrada"] = $errores;
    if(isset($_GET['ediatr'])){
      header("Location: editar-entrada.php?id=".$_GET['editar']);
    }else{
      header('Location: crear-entradas.php');
    }

  }

}
 ?>
