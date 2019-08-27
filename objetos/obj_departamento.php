<?php
    require_once("obj_conexao_bd.php");
    $conexao = AbreConexaoBd();

    $sqlSelect = "SELECT id_departamento, nome FROM tb_departamento";
    $resultado = mysqli_query($conexao, $sqlSelect);
    
    if (isset($_POST["nomeDepartamento"])) {
        $nomeDepartamento = $_POST["nomeDepartamento"];
        
        $sqlInsert = "INSERT INTO tb_departamento(nome) VALUES ('$nomeDepartamento')";
        
        if(mysqli_query($conexao, $sqlInsert)) {
            $resultado = mysqli_query($conexao, $sqlSelect);

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> Departamento cadastrado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
        else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Não foi possível cadastrar o departamento.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
?>