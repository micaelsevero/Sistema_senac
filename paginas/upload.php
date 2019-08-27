<?php
    require_once("../objetos/obj_upload.php");
?>

<form action="<?php echo $_SERVER["PHP_SELF"]."?pagina=upload"; ?>" method="post" enctype="multipart/form-data" >
    <input type="file" name="arquivo">
    <input type="submit" class="btn btn-secondary" value="Upload">
</form> 