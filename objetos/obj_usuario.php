<?php
    function RetornaMensagemErro($mensagem) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> '.$mensagem.'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }

    require_once("obj_conexao_bd.php");
    $conexao = AbreConexaoBd();

    $sqlSelect = "SELECT id as id_usuario, nome, email, IF(tp_status=1,'Ativo','Inativo') AS tp_status 
                    FROM tb_usuario";
    $resultado = mysqli_query($conexao, $sqlSelect);
    
    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $confirmarSenha = $_POST["confirmarSenha"];
        $status = isset($_POST["status"]) ? $_POST["status"] : 0;

        if ($senha == $confirmarSenha) {
            $senha = md5($senha);
        
            $sqlInsert = "INSERT INTO tb_usuario(nome, email, senha, tp_status) 
                            VALUES ('$nome', '$email', '$senha', $status)";
            
            if(mysqli_query($conexao, $sqlInsert)) {
                $resultado = mysqli_query($conexao, $sqlSelect);

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> Usuário cadastrado.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
            }
            else {
                RetornaMensagemErro("Não foi possível cadastrar o usuário");
            }
        }
        else {
            RetornaMensagemErro("As senhas não conferem! Por favor, digite novamente.");
        }
    }
?>