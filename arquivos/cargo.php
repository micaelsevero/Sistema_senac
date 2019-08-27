<?php
  require_once("../objetos/obj_cargo.php");
?>

<h4>Cadastrar Cargo</h4>
<form method="post">
  <div class="form-group">
    <label for="nomeCargo">Nome Cargo</label>
    <input type="text" name="nomeCargo" class="form-control" id="nomeCargo" required>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<br>

<h4>Cargos</h4>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($linha = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<th scope='row'>".$linha["id_cargo"]."</th>";
          echo "<td>" .$linha["nome"]."</td>";
          echo "</tr>";
      }
    ?>
  </tbody>
</table>