<?php 

    //funçao que realiza e retorna a conexão com o banco de dados configurado
    function AbreConexaoBD() {
        //IP OU DNS DO SERVIDOR
        $host = "127.0.0.1";
        //usuário do banco de dados
        $usuario = "root";
        //senha do banco de dados
        $senhaBd = "";
        //banco de dados que deverá ser selecionado na conexão
        $banco_de_dados = "loja_virtual";


        //realiza a conexao com o banco de dados utilizando os parâmetros definidos
        $conexao = mysqli_connect($host, $usuario, $senhaBd, $banco_de_dados);
        //define o encode da conexão
        mysqli_set_charset($conexao,"utf8");

        //verifica se a conexão não foi realizada com sucesso
        if (!$conexao) {
            //mata a execução e exibe a mensagem de erro
            die("Não foi possível conectar ao banco de dados!");
        }
        //se a conexão foi com sucesso,retorna a mesma
        return $conexao;
    }

 

?>