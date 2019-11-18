<?php
    if (!file_exists(include_once('./db/conexao.php')))
        include_once('./db/conexao.php');

        $conexao = conexaoMySQL();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Curiosidades</title>

        <!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
        <!-- Cabeçalho -->
        <?php 
            if (!file_exists(include_once("include/header.php")))
                include_once("include/header.php");
        ?>

        <div id="area_curiosidades" class="center">

        <?php
        $sql = "SELECT * from curiosidades;";
    
        $select = mysqli_query($conexao, $sql);

        $counter = 0;

        while ($rsCuriosidade = mysqli_fetch_array($select)) { 
            if ($rsCuriosidade['status'] && $counter === 0) {?>
                <div class="info_curiosidades">
                    <!-- Imagem da curiosidade -->
                    <div class="foto_curiosidades">
                        <img src="cms/db/uploads/<?=$rsCuriosidade['imagem']?>" class="responsive_img" alt="Pizzaiolo Ricardo">
                    </div>
                    
                    <!-- Texto da curiosidade -->
                    <div class="descricao_curiosidades">
                        <br>
                        <br>
                        <br>
                        <p>
                            <?=$rsCuriosidade['texto']?>    
                        </p>
                    </div>

                </div>
        <?php
            $counter = 1;
            } elseif($rsCuriosidade['status'] && $counter === 1) { ?>
                <div class="info_curiosidades"> 
                    <!-- Texto da curiosidade -->
                    <div class="descricao_curiosidades">
                        <br>
                        <br>
                        <br>
                        <p>
                            <?=$rsCuriosidade['texto']?>    
                        </p>
                    </div>
                    
                    <!-- Imagem da curiosidade -->
                    <div class="foto_curiosidades">
                        <img src="cms/db/uploads/<?=$rsCuriosidade['imagem']?>" class="responsive_img" alt="Pizzaiolo Ricardo">
                    </div>
                </div>
        <?php
            $counter = 0;
        }
    } ?>

        <!-- Redes sociais -->
        <?php
            if (!file_exists(include_once("./include/redes_sociais.php")))
                include_once("./include/redes_sociais.php");
        ?>

        </div>

        <!-- Rodapé -->
        <?php 
            if (!file_exists(include_once("include/footer.php")))
                include_once("include/footer.php");
        ?>

    </body>
</html>