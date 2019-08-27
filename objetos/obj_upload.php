<?php
    if (isset($_FILES["arquivo"])) {
        require_once("obj_conexao_bd.php");
        $conexao = AbreConexaoBD();
        /*$host = "127.0.0.1";
        $usuario = "root";
        $senhaBd = "";
        $banco_de_dados = "loja_virtual";

        $conexao = mysqli_connect($host, $usuario, $senhaBd, $banco_de_dados);

        if (!$conexao) {
            die("Não foi possível!");
        }*/

        $diretorio = "../arquivos/";
        $tamanhoMaximoUpload = 2; // em megabytes(mb)

        $arquivo = $_FILES["arquivo"];
        $arquivoNome = $arquivo["name"];
        //print_r($arquivo);

        /*echo "<br>";
        echo pathinfo($arquivoNome, PATHINFO_BASENAME)."<br>";
        echo pathinfo($arquivoNome, PATHINFO_FILENAME)."<br>";
        echo pathinfo($arquivoNome, PATHINFO_EXTENSION)."<br>";*/

        $somenteNomeArquivo = md5(Date("dmYHis").pathinfo($arquivoNome, PATHINFO_FILENAME));
        $somenteExtensaoArquivo = pathinfo($arquivoNome, PATHINFO_EXTENSION);
        $nomeArquivoCriptografado = "$somenteNomeArquivo.$somenteExtensaoArquivo";

        if ($arquivo["size"] > ($tamanhoMaximoUpload * 1024 * 1024))
            exit("Arquivo maior que o tamanho máximo permitido!<br>");

        $upload = move_uploaded_file($arquivo["tmp_name"], $diretorio . $nomeArquivoCriptografado);
        if ($upload) {
            $sql = "INSERT INTO tb_upload(nome) VALUES ('".$nomeArquivoCriptografado."');";
            if(mysqli_query($conexao, $sql)) {
                //echo "Upload realizado com sucesso!";
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> Upload realizado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            else
                echo "Erro no banco de dados!";
        }
        else    
            echo "Falha ao realizar upload!";

        mysqli_close($conexao);
    }
?>