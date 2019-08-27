<div class="card-columns">
    <?php
        require_once("../objetos/obj_conexao_bd.php");
        $conexao = AbreConexaoBD();

        // trecho que recupera via POST imagem a ser excluída
        if (isset($_POST["idImagemExcluir"])) {
            $idImagem = $_POST["idImagemExcluir"];
            $sqlExcluir = "DELETE FROM tb_upload WHERE id = $idImagem";
            mysqli_query($conexao, $sqlExcluir);
        }

        $sql = "SELECT id as identificador, nome imagem FROM tb_upload";
        $resultado = mysqli_query($conexao, $sql);
        $diretorio = "../arquivos/";

        if (mysqli_num_rows($resultado) > 0) {
            while($linha = mysqli_fetch_assoc($resultado))
            {
                $imagem = $linha["imagem"];
                $id = $linha["identificador"];
                $imagemComDiretorio = $diretorio.$imagem;

                //echo "<a href='".$imagemComDiretorio."'>$imagem</a><br>";
                //echo $linha["identificador"] . " / " . $linha["imagem"] . "<br>";
                echo "<div class=\"card\" style=\"width: 18rem;\">
                        <img src=\"$imagemComDiretorio\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$imagem</h5>
                            <form method=\"post\">
                                <input type=\"hidden\" name=\"idImagemExcluir\" value=\"$id\">
                                <button type=\"submit\" class=\"btn btn-primary\">Excluir</button>
                            </form>
                        </div>
                    </div>";
            }
        }

        mysqli_close($conexao);
    ?>
</div>