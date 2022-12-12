<?php
include 'func.php';

$turnos = $con->query('SELECT * FROM pacientes ORDER BY fecha, hora ASC');

if (isset($_POST['guardar'])){
  guardarTurno($con);
};

if (isset($_POST['eliminar'])){
  eliminarTurno($con);
};

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Turnos Web</title>
    </head>
    <body>
      <div id="feedback-form">
        <h2 class="header">Agendar turno:</h2>
        <div>
          <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre" required></input>
            <input type="text" name="apellido" placeholder="Apellido" required></input>
            <input type="text" name="telefono" placeholder="Telefono" required></input>
            <input type="text" name="info" placeholder="Anotaciones"></input>
            <input type="date" name="fecha" min="2023-01-01" max="2024-12-31" required>
            <select name="hora">
              <option value="15:00">15:00</option>
              <option value="15:15">15:15</option>
              <option value="15:30">15:30</option>
              <option value="15:45">15:45</option>
              <option value="16:00">16:00</option>
              <option value="16:15">16:15</option>
              <option value="16:30">16:30</option>
              <option value="16:45">16:45</option>
              <option value="17:00">17:00</option>
              <option value="17:15">17:15</option>
              <option value="17:30">17:30</option>
              <option value="17:45">17:45</option>
              <option value="18:00">18:00</option>
              <option value="18:15">18:15</option>
              <option value="18:30">18:30</option>
              <option value="18:45">18:45</option>
              <option value="19:00">19:00</option>
              <option value="19:15">19:15</option>
              <option value="19:30">19:30</option>
              <option value="19:45">19:45</option>
              <option value="20:00">20:00</option>
              <option value="20:15">20:15</option>
              <option value="20:30">20:30</option>
              <option value="20:45">20:45</option>
            </select>
            <button type="submit" name="guardar">Guardar</button>
          </form>
        </div>
      </div>
        <div class="table-wrapper">
      <table class="fl-table">
          <thead>
          <tr>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Nombre y Apellido</th>
              <th>Telefono</th>
              <th>Anotaciones</th>
              <th>Eliminar</th>
              <th>Editar</th>
          </tr>
          </thead>
          <tbody>
        <?php
          while ($reg = $turnos->fetchArray()) {
              ?>

              <tr>
                <td><?php echo $reg['fecha']; ?></td>
                <td><?php echo $reg['hora']; ?></td>
                <td><?php echo $reg['nombre'] . " " . $reg['apellido']; ?></td>
                <td><?php echo $reg['telefono']; ?></td>
                <td><?php echo $reg['info']; ?></td>
                <td><a href="delete.php?id=<?php echo $reg['id'];?>">Eliminar</a></td>
                <td><a href="update.php?id=<?php echo $reg['id'];?>">Editar</a></td>
            </tr>

         <?php } ?>
         <tbody>
     </table>
   </div>
    </body>
</html>
