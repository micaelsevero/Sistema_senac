<?php
  require_once("../objetos/obj_departamento.php");
?>

<h4>Cadastrar Departamento</h4>
<form method="post">
  <div class="form-group">
    <label for="nomeDepartamento">Nome Departamento</label>
    <input type="text" name="nomeDepartamento" class="form-control" id="nomeDepartamento" required>
  </div>
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<br>

<h4>Departamentos</h4>
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
          echo "<th scope='row'>".$linha["id_departamento"]."</th>";
          echo "<td>" .$linha["nome"]."</td>";
          echo "</tr>";
      }
    ?>
  </tbody>
</table>