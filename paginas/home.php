<?php
    $nome = $_SESSION["user"]["nome"];
?>

<h6>Olá, <span class="badge badge-secondary"><?php echo $nome ?></span></h6>

<button id="buscarFraseMotivadora" type="button" class="btn btn-info">Buscar frase motivadora</button>

<br>
<br>

<div id="fraseMotivadora"></div>

<script>
    let objBuscarFraseMotivadora = document.getElementById("buscarFraseMotivadora");
    objBuscarFraseMotivadora.addEventListener('click', function(event) {
        $.ajax({
            url: "../objetos/obj_buscarFraseMotivadora.php",
            method: "GET"
        })
        .done(function(data) {
            let obj = document.getElementById("fraseMotivadora");
            obj.innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert">' +
                        '<strong>Frase!</strong> ' + data +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                    '</div>';
            
            console.log(data);
        })
        .fail(function(obj, error) {
            console.log(error);
        });
    });
</script>