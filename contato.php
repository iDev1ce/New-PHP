<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fale Conosco</title>

        <!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <!-- Importacão Módulo de Tratamento para Letras e Números -->
        <script src="./js/module.js"></script>
    </head>
    <body>

        <!-- Cabeçalho -->
        <?php
            if (!file_exists(include_once("include/header.php")))
                include_once("include/header.php");
        ?>

        <!-- Area de Contato -->

        <section id="area_contato" class="center">
            <h2> Fale Conosco !</h2>
            <form id="contato" method="post" class="center" action="db/inserir.php">
                <div class="opcoes">
                    <label class="infos" for="txt_nome">
                        Nome*:
                    </label>
                    <div class="entradas">
                        <input placeholder="Digite seu nome" type="text"  name="txt_nome" id="txt_nome" class="txt_entrada" onkeypress="return validarLetrasNumeros(event, true , false)" required>
                    </div>
                </div>
                <div class="opcoes">
                    <label class="infos" for="txt_telefone">
                        Telefone:
                    </label>
                    <div class="entradas">
                        <input placeholder="Digite seu telefone" type="tel"  name="txt_telefone" id="txt_telefone" class="txt_entrada" data-mask="(00) 0000-0000">
                    </div>
                </div>
                <div class="opcoes">
                    <label class="infos" for="txt_celular">
                        Celular*:
                    </label>
                    <div class="entradas">
                        <input placeholder="Digite seu celular" type="tel"  name="txt_celular" id="txt_celular" class="txt_entrada" required data-mask="(00) 00000-0000" required>
                    </div>
                </div>
                <div class="opcoes">
                    <label class="infos" for="txt_email">
                        Email*:
                    </label>
                    <div class="entradas">
                        <input placeholder="Digite seu email" type="email"  name="txt_email" id="txt_email" class="txt_entrada" required>
                    </div>
                </div>
                <div class="opcoes">
                    <label class="infos" for="txt_homepage">
                        Home Page:
                    </label>
                    <div class="entradas">
                        <input placeholder="Link da Homepage (caso houver)" type="text"  name="txt_homepage" id="txt_homepage" class="txt_entrada">
                    </div>
                </div>
                <div class="opcoes">
                    <label class="infos" style="padding-top:15px;" for="txt_facebook">
                        Link Facebook:
                    </label>
                    <div class="entradas">
                        <input placeholder="Digite o link da sua página no Facebook" type="url"  name="txt_facebook" id="txt_facebook" class="txt_entrada">
                    </div>
                </div>
                <div class="opcoes">
                    <div class="infos">
                        Sexo*:
                    </div>
                    <div class="entradas">
                        <input type="radio"  name="rdo_sexo" value="M" id="rdo_mas" required>
                        <label for="rdo_mas" style="color: black;"> Masculino </label>
                        
                        <input type="radio"  name="rdo_sexo" value="F" id="rdo_fem" required>
                        <label for="rdo_fem" style="color: black;"> Feminino </label>
                    </div>
                </div>
                <div class="opcoes">
                    <label class="infos" style="padding-top:30px;" for="txt_profissao">
                        Profissão*:
                    </label>
                    <div class="entradas">
                        <input placeholder="Digite sua profissão" type="text"  name="txt_profissao" id="txt_profissao" class="txt_entrada" required>
                    </div>
                </div>
                <div id="opcoes_mensagem">
                    <label id="info_mensagem" for="txt_mensagem">
                        Mensagem*: 
                    </label>
                    <div id="entrada_mensagem">
                        <textarea rows="7" cols="40" id="txt_mensagem" name="txt_mensagem" required></textarea>
                    </div>
                </div>
                <div class="entradas">
                    <input type="radio" name="rdo_critica_sugestao" id="rdo_sugestao" value="sugestao" data-type="radio">
                    <label for="rdo_sugestao" class="label_radio"> Sugestão </label>
                    <input type="radio" name="rdo_critica_sugestao" id="rdo_critica" value="critica" data-type="radio">
                    <label for="rdo_critica" class="label_radio"> Crítica </label>
                </div>
                <input type="submit"  value="Enviar" name="btn_salvar" id="btn_salvar">
            </form>
        </section>             

        <!-- Rodapé -->
        <?php
            if (!file_exists(include_once("include/footer.php")))
                include_once("include/footer.php");
        ?>
        
        <!-- Importação biblioteca JQuery e JQuery Mask -->
        <script src="./js/jquery.js"></script>
        <script src="./js/jquery.mask.js"></script>
    </body>
</html>