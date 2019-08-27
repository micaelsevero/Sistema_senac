<?php
  require_once("../objetos/obj_usuario.php");
?>

<h4>Cadastrar Usuário</h4>
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
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" id="email" required>
               </div>
         </div>
    </div>

    <div class="row">
         <div class="col">
               <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" required>
               </div>
         </div>
         <div class="col">
               <div class="form-group">
                    <label for="confirmarSenha">Confirme a senha</label>
                    <input type="password" name="confirmarSenha" class="form-control" id="confirmarSenha" required>
               </div>
         </div>
    </div>

    <div class="row">
         <div class="col-6">
               <div class="form-group form-check">
                    <input type="checkbox" name="status" class="form-check-input" id="status" value="1" checked>
                    <label class="form-check-label" for="status">Ativo</label>
               </div>
         </div>
    </div>

  <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<br>

<h4>Usuários</h4>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($linha = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<th scope='row'>".$linha["id_usuario"]."</th>";
          echo "<td>" .$linha["nome"]."</td>";
          echo "<td>" .$linha["email"]."</td>";
          echo "<td>" .$linha["tp_status"]."</td>";
          echo "</tr>";
      }
    ?>
  </tbody>
</table>