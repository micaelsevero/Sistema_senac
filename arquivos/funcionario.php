<?php
  require_once("../objetos/obj_funcionario.php");
?>

<h4>Cadastrar Funcionário</h4>
<form method="post">
    <div class="row">

        <div class="col">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" required>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" class="form-control" id="sobrenome" required>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col">
            <div class="form-group">
                <label for="dtNascimento">Data de nascimento</label>
                <input type="text" name="dtNascimento" class="form-control" id="dtNascimento" required>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" class="form-control" id="cpf" required>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col">
            <div class="form-group">
                <label for="idDepartamento">Departamento</label>
                <select class="form-control" name="idDepartamento" id="idDepartamento">
                    <option value="" selected></option>
                    <?php
                        while($linha = mysqli_fetch_assoc($resultadoDepartamento)) {
                            echo "<option value=".$linha["id_departamento"].">".$linha["nome"]."</option>";
                        } 
                    ?>
                </select>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="idCargo">Cargo</label>
                <select class="form-control" name="idCargo" id="idCargo">
                    <option value="1">1</option>
                </select>
            </div>
        </div>

    </div>
    
  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<br>

<h4>Funcionários</h4>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Sobrenome</th>
      <th scope="col">Data de nascimento</th>
      <th scope="col">CPF</th>
      <th scope="col">Departamento</th>
      <th scope="col">Cargo</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($linha = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<th scope='row'>".$linha["id_funcionario"]."</th>";
          echo "<td>" .$linha["nomeFuncionario"]."</td>";
          echo "<td>" .$linha["sobrenome"]."</td>";
          echo "<td>" .$linha["dt_nascimento"]."</td>";
          echo "<td>" .$linha["cpf"]."</td>";
          echo "<td>" .$linha["nomeDepartamento"]."</td>";
          echo "<td>" .$linha["nomeCargo"]."</td>";
          echo "</tr>";
      }
    ?>
  </tbody>
</table>