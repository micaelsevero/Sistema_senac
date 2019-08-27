<?php
    include_once('./obj_conexao_bd.php');
    $conexao = AbreConexaoBD();

    $sql = "SELECT frase FROM tb_frase_motivadora ORDER BY RAND() LIMIT 1";
    $resultado = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_assoc($resultado);

    echo $linha["frase"];
?>


