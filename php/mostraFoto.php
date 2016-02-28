<?php 
    include_once '../model/Foto.php';
    
    $foto = new Foto();
    $mostra = $foto->listar();
    
    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        foreach ($mostra as $mostra):
            echo $mostra['nome']."<br>";
            echo "<img src=\"" . $mostra['foto'] . "\" />";
        endforeach;
        ?>
    </body>
</html>

