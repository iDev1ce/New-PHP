<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Produtos em Promoção</title>

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

        <!-- Produtos em Promoção -->
        <section id="area_produto_promocoes" class="center">
                <h2>
                    PRODUTOS EM PROMOÇÃO
                </h2>
                <?php 
                    for ($i = 0; $i < 3; $i++) { ?>
                        <div class="produto">
                            <div class="informacoes_produto">
                                <img src="img/pepperoni.png" class="produto_imagem" alt="Pizza Pepperoni">
                            </div>
                            
                            <!-- Redes sociais -->
                            <?php
                                if (!file_exists(include_once("./include/redes_sociais.php")))
                                    include_once("./include/redes_sociais.php");
                            ?>
                            
                            <div class="descricao_produto">
                                <div class="informacoes_produto">
                                    <p>
                                        <span class="bold"> Nome: </span> Pizza de Pepperoni
                                    </p>

                                    <p>
                                        <span class="bold"> Descrição: </span> Pizza de calabresa com pimenta, queijo mussarela e molho de tomate.
                                    </p>

                                    <p>
                                        <span class="bold"> Preço: </span> <span class="line-through"> R$ 30,00 </span> R$19,99 
                                    </p>

                                    <a class="detalhes_produto">
                                        Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php } ?>
        </section>
        

        <!-- Rodapé -->
        <?php
            if (!file_exists(include_once("./include/footer.php"))) {
                include_once("./include/footer.php");
            }
        ?>
    </body>
</html>