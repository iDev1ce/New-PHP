<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Produtos do Mês</title>

            <!-- Favicon -->
            <link rel="icon" href="img/favicon.png">
            <link rel="stylesheet" type="text/css" href="./css/style.css">
        </head>
    <body>
        <!-- Cabeçalho -->
        <?php
            if (!file_exists(include_once("./include/header.php"))) {
                include_once("./include/header.php");
            }
        ?>

        <!-- Produtos do Mês -->
        <section id="area_produto_mes" class="center">
                <h2>
                    PRODUTO DO MÊS
                </h2>
            <div class="produto_mes center">
                <div id="foto_produto_mes">
                    <img  src="./img/pizza_calabresa.jpg" alt="Pizza de Calabresa" title="Pizza de Calabresa">
                </div>
                <div class="descricao_produto_mes">
                    <p> 
                        <span class="bold"> Nome: </span> Pizza de Calabresa 
                    </p>

                    <p> 
                        <span class="bold"> Descrição: </span> Pizza de calabresa, acompanhada com queijo e tomate 
                    </p>
                    
                </div>
            </div>
            <!-- Redes sociais -->
            <?php
                if (!file_exists(include_once("./include/redes_sociais.php")))
                    include_once("./include/redes_sociais.php");
            ?>

            <div id="info_produto_mes" class="center">
                <p>
                    Acredita-se na verdade que ela seja uma invenção norte-americana, já que a calabresa era um condimento muito popular, e mais barato, por lá. Porém, existem versões italianas que dizem que pizza calabresa nada mais era do que a tradicional italiana pizza de pepperoni, porém como importar este ingrediente era caro, os americanos adaptaram, e deixaram com o mesmo nome (em inglês, pizza calabresa fica pepperoni pizza). E assim, ela se tornou popular no mundo todo.
                </p>
                <p>
                Com um sabor bem peculiar, a rúcula agrada ao paladar de muitos ao mesmo tempo em que outros torcem o nariz só de ouvir falar. Mas a verdura, que faz parte da mesma família do brócolis, da mostarda e do agrião, é na realidade extremamente saudável e pode ser incluída no prato mesmo se você não for muito fã.
                </p>
            </div>
        </section>

        <!-- Rodapé -->
        <?php
            if (!file_exists(include_once("./include/footer.php"))) {
                include_once("./include/footer.php");
            }
        ?>
    </body>
</html>