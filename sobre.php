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

        <!-- Conteudos-->
        <div class="info_sobre">
            <div class="foto_sobre">
                <img alt="Pizza" title="Pizza" src="img/pizza_sobre.jpg">
            </div>
            <div class="descricao_sobre">
                <h2 class="titulo_sobre">
                    PIZZARIA FRAJOLA, UM EXEMPLO A SER SEGUIDO
                </h2>

                <p class="texto_sobre">
                    Não é Crepe, Panqueca, Cone, tampouco Taco. É Pizza Frajola's! Massa Extra Fina e crocante,
                    a qual é recheada com os mais variados e saborosos ingredientes.
                    São mais de 70 sabores de Pizzas (salgadas, doces e Light)
                    a escolha dos clientes.
                </p>
                <br>
                
                <p class="texto_sobre">
                    Na Pizzaria Frajola's tudo é pensado para que você tenha a melhor e mais espetacular experiência ao saborear uma Pizza prática, barata, diferente, crocante e muito saborosa. Para isso, somos criteriosos na escolha dos ingredientes e na apresentação de nossas Pizzas, as quais são embaladas individualmente para facilitar a degustação. 
                </p>
            </div>
            
        </div>

        <!-- Redes sociais -->
        <?php
            if (!file_exists(include_once("./include/redes_sociais.php")))
                include_once("./include/redes_sociais.php");
        ?>

        <div class="info_sobre">
            <div class="foto_sobre">
                <img alt="Pizza" title="Pizza" src="img/pizza_sobre2.jpg">
            </div>
            <div class="descricao_sobre">
                <h2 class="titulo_sobre">
                    UM NOVO CONCEITO DE PIZZA
                </h2>
                <p class="texto_sobre">
                    Não é Crepe, Panqueca, Cone, tampouco Taco. É Pizza Frajola's! Massa Extra Fina e crocante,
                    a qual é recheada com os mais variados e saborosos ingredientes.
                    São mais de 70 sabores de Pizzas (salgadas, doces e Light)
                    a escolha dos clientes.
                </p>
                <br>
                <p class="texto_sobre">
                    Na Pizza Frajola's tudo é pensado para que você tenha a melhor e mais espetacular experiência ao saborear uma Pizza prática, barata, diferente, crocante e muito saborosa. Para isso, somos criteriosos na escolha dos ingredientes e na apresentação de nossas Pizzas, as quais são embaladas individualmente para facilitar a degustação. 
                </p>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <?php 
        if (!file_exists(include_once("include/footer.php")))
            include_once("include/footer.php");
    ?>
    </body>
</html>