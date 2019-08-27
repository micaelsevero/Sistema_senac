<?php
    session_start();

    if (isset($_SESSION["user"]) && $_SESSION["user"] > 0) {
        header("location:./paginas/navegacao.php");
    }

    require_once("./objetos/obj_login.php"); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Senac - login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <style>
        .container {
            padding: 5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login <i class="fas fa-user-plus"></i></h1>

        <br>

        <?php 
            if (!empty($mensagem))
                echo "<div class='alert alert-danger' role='alert'>
                        $mensagem
                     </div>";
        ?>
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
            </div>
           
            <button type="submit" class="btn btn-primary">Entrar <i class="fas fa-cart-plus"></i></button>
        </form>
    </div>
    
</body>
</html>


