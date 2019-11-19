<?php
    if(!file_exists(include_once('db/conexao.php')))
        include_once('db/conexao.php');

    $conexao = conexaoMySQL();
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sobre nós</title>

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

    <!-- Sobre Empresa -->
    <div id="area_sobre" class="center">

        <?php
            $sql = "SELECT * from sobre;";
        
            $select = mysqli_query($conexao, $sql);

            $counter = 0;

            while ($rsSobre = mysqli_fetch_array($select)) { 
                if ($rsSobre['status'] && $counter === 0) {?>
                    <div class="info_sobre">
                        <!-- Imagem da sobre -->
                        <div class="foto_sobre">
                            <img src="cms/db/uploads/<?=$rsSobre['imagem']?>" class="responsive_img" alt="Pizzaiolo Ricardo">
                        </div>
                        
                        <!-- Texto da sobre -->
                        <div class="descricao_sobre">
                            <h2 class="titulo_sobre">
                                <?=$rsSobre['titulo']?>
                            </h2>
                            <br>
                            <p>
                                <?=$rsSobre['texto']?>    
                            </p>
                        </div>

                    </div>
            <?php
                $counter = 1;
                } elseif($rsSobre['status'] && $counter === 1) { ?>
                    <div class="info_sobre"> 
                        <!-- Texto da sobre -->
                        <div class="descricao_sobre">
                            <p class="titulo_sobre">
                                <?=$rsSobre['titulo']?>
                            </p>
                            <br>
                            <p class="titulo_sobre">
                                <?=$rsSobre['texto']?>    
                            </p>
                        </div>
                        
                        <!-- Imagem da sobre -->
                        <div class="foto_sobre">
                            <img src="cms/db/uploads/<?=$rsSobre['imagem']?>" class="responsive_img" alt="Pizzaiolo Ricardo">
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