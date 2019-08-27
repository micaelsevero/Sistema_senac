<?php
    require_once("obj_conexao_bd.php");
    $conexao = AbreConexaoBd();

    $sqlSelectDepartamento = "SELECT * FROM tb_departamento";
    $sqlSelectCargo = "SELECT * FROM tb_cargo";
    $resultadoDepartamento = mysqli_query($conexao, $sqlSelectDepartamento);
    $resultadoCargo = mysqli_query($conexao, $sqlSelectCargo);
    $sqlSelect = "SELECT 
                        funcionario.id_funcionario,
                        funcionario.nome AS nomeFuncionario,
                        funcionario.sobrenome,
                        DATE_FORMAT(funcionario.dt_nascimento, '%d/%m/%Y') AS dt_nascimento,
                        funcionario.cpf,
                        departamento.nome AS nomeDepartamento,
                        cargo.nome nomeCargo
                    FROM
                        tb_funcionario funcionario
                            INNER JOIN
                        tb_departamento departamento ON funcionario.id_departamento = departamento.id_departamento
                            INNER JOIN
                        tb_cargo cargo ON funcionario.id_Cargo = cargo.id_cargo";

    $resultado = mysqli_query($conexao, $sqlSelect);
    
    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $dtNascimento = $_POST["dtNascimento"]; // DD/MM/AAAA
        $cpf = $_POST["cpf"];
        $idDepartamento = $_POST["idDepartamento"];
        $idCargo = $_POST["idCargo"];
        
        $sqlInsert = "INSERT INTO tb_funcionario(nome, sobrenome, dt_nascimento, cpf, id_departamento, id_cargo) 
        VALUES ('$nome', '$sobrenome', STR_TO_DATE('$dtNascimento', '%d/%m/%Y'), '$cpf', $idDepartamento, $idCargo)";
        
        if(mysqli_query($conexao, $sqlInsert)) {
            $resultado = mysqli_query($conexao, $sqlSelect);

            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sucesso!</strong> Funcionário cadastrado.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
        else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Não foi possível cadastrar o funcionário.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
?>