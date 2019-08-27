<?php
    require_once("obj_conexao_bd.php");

    $mensagem = "";

    /*$host = "127.0.0.1";
    $usuario = "root";
    $senhaBd = "";
    $banco_de_dados = "loja_virtual";

    $conexao = mysqli_connect($host, $usuario, $senhaBd, $banco_de_dados);

    if (!$conexao) {
        die("Não foi possível!");
    }*/

    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $senhaCriptografada = md5($senha);

        $conexao = AbreConexaoBD();
        $sql = "SELECT id,nome FROM tb_usuario WHERE email = '$email' AND senha = '$senhaCriptografada'";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            session_start();
            $_SESSION["user"] = mysqli_fetch_assoc($resultado);

         
           
            header("location:paginas/navegacao.php");
        }
        else
            $mensagem = "Login ou senha inválido!";

        mysqli_close($conexao);
    }

?>