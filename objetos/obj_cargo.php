<?php
    require_once("obj_conexao_bd.php");
    $conexao = AbreConexaoBd();

    $sqlSelect = "SELECT id_cargo, nome FROM tb_cargo";
    $resultado = mysqli_query($conexao, $sqlSelect);
    
    if (isset($_POST["nomeCargo"])) {
        $nomeCargo = $_POST["nomeCargo"];
        
        $sqlInsert = "INSERT INTO tb_cargo(nome) VALUES ('$nomeCargo')";
        
        if(mysqli_query($conexao, $sqlInsert)) {
            $resultado = mysqli_query($conexao, $sqlSelect);

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> Cargo cadastrado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
        else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Não foi possível cadastrar o cargo.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
?>