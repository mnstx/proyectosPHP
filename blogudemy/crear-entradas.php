<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">
  <h1>Crear Entradas</h1>
  <p>
    Anade nuevas entradas al blog para que los usuarios puedan
    leerlas y disfrutar de nuestro contenido.
  </p>
  <br/>
  <form action="guardar-entrada.php" method="POST">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo">
    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>


    <label for="descripcion">Descripcion:</label>
    <textarea name="descripcion" rows="8" cols="80"></textarea>
    <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>


    <label for="categoria">Categoria</label>
    <select name="categoria">
      <?php $categorias = conseguirCategorias($db);
      if(!empty($categorias)):
        while($categoria = mysqli_fetch_assoc($categorias)):
      ?>
      <option value="<?=$categoria['id']?>">
        <?=$categoria['nombre']?>
      </option>
      <?php
          endwhile;
          endif;
      ?>
    </select>

    <input type="submit" name="guardar">
  </form>
  <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php'; ?>
