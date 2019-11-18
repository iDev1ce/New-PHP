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
        <title>Filiais</title>

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

        <div id="area_mapa" class="center">
            <p> <span class="bold txt_center"> NOSSAS LOJAS </span> </p>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1829.304966967376!2d-46.86230799152408!3d-23.510555292198305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf022a5d8b15cb%3A0xb0c39c8f80c39fc7!2sRua%20Luiz%20Scott%2C%20108%20-%20Vila%20Nossa%20Sra.%20da%20Escada%2C%20Barueri%20-%20SP%2C%2006440-260!5e0!3m2!1sen!2sbr!4v1569791336021!5m2!1sen!2sbr" width="600" height="450" style="border:0;" allowfullscreen=""></iframe>
            </div>|
            <?php
                $sql = 'SELECT * FROM filiais;';
                $select = mysqli_query($conexao, $sql);

                while ($rsFiliais = mysqli_fetch_array($select)){
                    if ($rsFiliais['status']) { ?>
                        <p>
                            Endereço:  <?=$rsFiliais['logradouro']?>, <?=$rsFiliais['numero']?> - <?=$rsFiliais['bairro']?>, <?=$rsFiliais['cidade']?> - <?=$rsFiliais['uf']?>, <?=$rsFiliais['cep']?>
                        </p>
            <?php   }
                }       
            ?>
            <br>
            <p class="txt_slogan">
                "Frajola's, mais que uma pizzaria"
            </p>
            
        </div>

        <!-- Rodapé -->
        <?php 
            if (!file_exists(include_once("include/footer.php")))
                include_once("include/footer.php");
        ?>
    </body>
</html>