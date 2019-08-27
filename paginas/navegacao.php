<?php
    header('Content-Type: text/html; charset=UTF-8');

    session_start();

    if (!isset($_SESSION["user"]) || isset($_GET["sair"])) {
        session_destroy();
        header("location:../");
    }

    $pagina = "";
    if (isset($_GET["pagina"])) {
      $pagina = $_GET["pagina"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require_once("../objetos/dependencias_html.php"); ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="../img/logo.jpg" style="height: 2.5rem;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if($pagina=="home") echo 'active'; ?>">
          <a class="nav-link" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=home"; ?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Configuração
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=usuario"; ?>">Usuário</a>
            <a class="dropdown-item" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=departamento"; ?>">Departamento</a>
            <a class="dropdown-item" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=cargo"; ?>">Cargo</a>
            <a class="dropdown-item" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=funcionario"; ?>">Funcionário</a>
          </div>
        </li>
        <li class="nav-item <?php if($pagina=="imagens") echo 'active'; ?>">
          <a class="nav-link" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=imagens"; ?>">Imagens</a>
        </li>
        <li class="nav-item <?php if($pagina=="upload") echo 'active'; ?>">
          <a class="nav-link" href="<?php echo $_SERVER["PHP_SELF"]."?pagina=upload"; ?>">Upload</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $_SERVER["PHP_SELF"]."?sair=true"; ?>" tabindex="-1">Sair</a>
        </li>
      </ul>
    </div>
  </nav>

  <br>

  <div class="container">
    <?php
      switch($pagina) {
        case "usuario":
        include("./usuario.php");
        break;
        case "imagens":
        include("./imagens.php");
        break;
        case "upload":
        include("./upload.php");
        break;
        case "home":
        include("./home.php");
        break;

        case "departamento":
        include("./departamento.php");
        break;

        case "cargo":
        include("./cargo.php");
        break;

        case "funcionario":
        include("./funcionario.php");
        break;
        
        default:
        include("./home.php");
        break;
      }
    ?>
  </div>
</body>
</html>