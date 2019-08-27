<?php
    //importa arquivo de conexão com o banco de dados
    require_once("obj_conexao_bd.php");

    //inicializa variável com vazio
    $mensagem = "";

  
//verifica se está definido o post de email e senha
    if (isset($_POST["email"]) && isset($_POST["senha"])) {

        //recupera os valores enviados pelo formulário
        //acessando pelo name do input
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        //criptografia em md5 da senha recebida do formulário
        $senhaCriptografada = md5($senha);

          /*
          abre Conexão com o banco e dados utilizando a função AbreConexaoBD()
          disponibilizada no arquivo obj_conexao_bd.php

          Armazena a conexão aberta na variável $conexao
          */

        $conexao = AbreConexaoBD();


        //armazena o select de validação se o usuário está cadastrado
        //na tabela tb_usuario com o email e a senha informados
        //e o status do usuário é ativo
        $sql = "SELECT id, nome 
                  FROM tb_usuario 
                 WHERE email = '$email' 
                   AND senha = '$senhaCriptografada'
                   AND tp_status = 1";

         
        //solicita a execução do select ao banco de dados
        //armazenando o resultado da execução na variavel $resultado

        $resultado = mysqli_query($conexao, $sql);


        //valida se retornou algum registro
        if (mysqli_num_rows($resultado) > 0) {
            //se o usuario existe,inicio  a sessão do php
            session_start();

            //busco o resultado da execução e armazeno na sessão retorna em array
            $_SESSION["user"] = mysqli_fetch_assoc($resultado);

            //redireciona o usuário para a página principal
            header("location:paginas/navegacao.php");
        }
        else{
            //atribui mensagem de usuário inexistente
            $mensagem = "Login ou senha inválido!";

        }
        //fecha a conexão aberta utilizada para validar o usuário no banco de dados
        mysqli_close($conexao);
    }

?>