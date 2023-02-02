<?php require_once 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">
  <h1>Crear Categorias</h1>
  <p>
    Anade nuevas categorias al blog para que los usuarios puedan
    usarlas al crear sus entradas.
  </p>
  <br/>
  <form action="guardar-categoria.php" method="POST">
    <label for="nombre">Nombre de la categoria</label>
    <input type="text" name="nombre">
    <input type="submit" name="guardar">
  </form>
</div>

<?php require_once 'includes/footer.php'; ?>
