<?php require_once 'includes/con.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php

  $categoria_actual = conseguirCategoria($db, $_GET['id']);
  if(!isset($categoria_actual['id'])){
    header("Location: index.php");
  }
 ?>

<?php require_once 'includes/header.php'; ?>

    <!-- Contendedor -->

    <?php require_once 'includes/aside.php'; ?>

      <div id="principal">

        <h1>Entradas de <?=$categoria_actual['nombre']?></h1>

        <?php
        $entradas = conseguirEntradas($db, null, $_GET['id']);
        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
          while($entrada = mysqli_fetch_assoc($entradas)):
         ?>

         <article class="entrada">
           <a href="entrada.php?id=<?=$entrada['id']?>">
           <h2><?=$entrada['titulo']?></h2>
           <span class="fecha"><?=$entrada['categoria']." | ".$entrada['fecha'] ?></span>
           <p>
             <?=substr($entrada['descripcion'], 0, 180)."..."?>
           </p>
           </a>
         </article>

         <?php
          endwhile;
        else:
        ?>
        <div class="alerta">
          No hay entradas en esta categoria!
        </div>
      <?php endif; ?>
      </div>

      <?php require_once 'includes/footer.php'; ?>
