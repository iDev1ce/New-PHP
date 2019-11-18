<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Frajola's Pizzaria </title>

        <!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/flickity.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- Cabeçalho -->
        <?php
            if (!file_exists(include_once("./include/header.php"))) {
                include_once("./include/header.php");
            }
        ?>
        
        <!-- Slider -->
        <?php 
            if (!file_exists(include_once("./include/slider.php"))) {
                include_once("./include/slider.php");
            }
        ?>
        
        <!-- Loja -->
        <section id="loja">
            <h2 class="nothing">
                nothing
            </h2>
            
            <div class="conteudo center">
                
                <!-- Menu de navegação da loja -->
                <nav id="area_menu_loja">
                    <ul id="menu_loja">
                        <li class="menu_itens_loja"> Especiais da Casa 
                            <ul class="submenu">
                                <li class="menu_itens_loja"> Calabresa </li>
                                <li class="menu_itens_loja"> Brócolis </li>
                                <li class="menu_itens_loja"> Mussarela </li>
                            </ul>
                        </li>
                        <li class="menu_itens_loja"> Veganas
                            <ul class="submenu">
                                <li class="menu_itens_loja"> Batata Doce </li>
                                <li class="menu_itens_loja"> Mandioca </li>
                                <li class="menu_itens_loja"> Batata Doce </li>
                                <li class="menu_itens_loja"> Couve-Flor </li>
                            </ul>
                        </li>
                        <li class="menu_itens_loja"> Doces
                            <ul class="submenu">
                                <li class="menu_itens_loja"> Chocolate </li>
                                <li class="menu_itens_loja"> Morango </li>
                                <li class="menu_itens_loja"> Ao leite </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                
                <!-- Produtos -->
                <div id="produtos">
                    <?php 
                        for ($i = 0; $i < 9; $i++) { ?>
                            <div class="produto">
                                <div class="informacoes_produto">
                                    <img src="img/pepperoni.png" class="produto_imagem" alt="Pizza Pepperoni">
                                </div>
                                
                                <div class="descricao_produto">
                                    <div class="informacoes_produto">
                                        <p>
                                            <span class="bold"> Nome: </span> Pizza de Pepperoni
                                        </p>

                                        <p>
                                            <span class="bold"> Descrição: </span> Pizza de calabresa com pimenta, queijo mussarela e molho de tomate.
                                        </p>

                                        <p>
                                            <span class="bold"> Preço: </span> R$ 30,00
                                        </p>

                                        <a class="detalhes_produto">
                                            Detalhes
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                </div>
                
                <!-- Redes sociais -->
                <?php
                    if (!file_exists(include_once("./include/redes_sociais.php")))
                        include_once("./include/redes_sociais.php");
                ?>
            </div>
        </section>
        
        <!-- Rodapé -->
        <?php
            if (!file_exists(include_once("./include/footer.php"))) {
                include_once("./include/footer.php");
            }
        ?>
        
        <script src="js/jquery.js"></script>
        <script src="js/flickity.js"></script>
        <script src="js/slider.js"></script>
    </body>
</html>