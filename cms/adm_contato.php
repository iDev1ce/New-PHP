<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    if (isset($_POST['btn_filter'])) {
        $filter = $_POST['slt_filter'];
        header('location:./adm_contato.php?filter=' . $filter);
    
    } elseif (isset($_POSt['btn_clear_filter']))
        header('location:./adm_contato.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Administração de Contato</title>

        <link href="./css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- Modal -->
        <div id="modal-container">
            <div id="modal">    
                <div>
                    <label src="./img/remove.png" title="Fechar" id="modal-close">
                        X
                    </label>
                </div>

                <div id="dados-modal"></div>
            </div>
        </div>

        <!-- Cabeçalho -->
        <?php 
            if (!file_exists(include_once('./include/header.php')))
                include_once('./include/header.php'); 
        ?>

        <!-- Menu -->
        <?php 
            if (!file_exists(include_once('./include/menu.php')))
                include_once('./include/menu.php'); 
        ?>

        <!-- Conteúdo principal -->
        <div id="cms-principal">
            <div id="contato-container" class="conteudo center">
                <h1>
                    <strong> Administração do Fale Conosco </strong>
                </h1>      
                
                <!-- Formulário do filtro -->
                <form name="frm_filter" action="./adm_contato.php" id="frm_filtro" method="post">
                    <select name="slt_filter">
                        <option value="critica" <?php if (@$_GET['filter'] === 'critica') echo('selected') ?>>Crítica</option>
                        <option value="sugestao" <?php if (@$_GET['filter'] === 'sugestao') echo('selected') ?>>Sugestão</option>
                    </select>

                    <input type="submit" name="btn_filter" value="Filtrar" />
                    <input type="submit" name="btn_clear_filter" value="Limpar Filtro" />
                </form>

                <!-- Listagem das mensagens -->
                <table>
                    <tr id="tbl-header">
                        <td>NOME</td>
                        <td>TELEFONE</td>
                        <td>EMAIL</td>
                        <td>CRITICA/SUGESTAO</td>
                        <td>OPÇÕES</td>
                    </tr>

                    <?php
                    if (isset($_GET['filter'])) {

                        if ($_GET['filter'] === 'sugestao') 
                            $sql = "SELECT * from tbl_contatos WHERE critica_sugestao='sugestao';";
                        elseif ($_GET['filter'] === 'critica')
                            $sql = "SELECT * from tbl_contatos WHERE critica_sugestao='critica';";

                    } else 
                        $sql = "SELECT * from tbl_contatos;";
             
                    $select = mysqli_query($conexao, $sql);

                    while ($rsContato = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td><?=$rsContato['nome']?></td>
                            <td><?=$rsContato['telefone']?></td>
                            <td><?=$rsContato['email']?></td>
                            <td>
                                <?php
                                if ($rsContato['critica_sugestao'] === 'critica')
                                    echo('Crítica');
                                elseif ($rsContato['critica_sugestao'] === 'sugestao')
                                    echo('Sugestão');
                                ?>
                            </td>
                            <td>
                                <a href="./db/deletar_contato.php?action=delete&id=<?=$rsContato['id']?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
                                    <img src="./img/remove.png" alt="Remover" title="Remover" />
                                </a>

                                <a href="#" class="handle-modal-view" onclick="showModalData(<?=$rsContato['id']?>);">
                                    <img src="./img/search.png" alt="Visualizar"  title="Visualizar" />
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <!-- Rodapé -->
        <?php 
            if (!file_exists(include_once('./include/footer.php')))
                include_once('./include/footer.php'); 
        ?>

        <script src="../js/jquery.js"></script>
        <script>
            /* Show modal */
            $(document).ready(function() {
                $('.handle-modal-view').click(function() {
                    $('#modal-container').slideDown(250);
                })
            });

            /* Hide modal on 'modal-close' click */
            $(document).ready(function() {
                $('#modal-close').click(function() {
                    $('#modal-container').fadeOut(100);
                })
            });

            /* Hide modal on press esc */
            $(document).keyup(function(event) {
                if (event.key === "Escape") 
                    $("#modal-container").fadeOut(100);
            });

            /* Ajax function to show modal data */
            function showModalData(id) {
                $.ajax({
                    type: 'POST',
                    url: './modal/contatos.php',
                    data: {
                        action: 'VISUALIZAR',
                        id: id
                    }, 
                    success: function(data) {
                        $('#dados-modal').html(data);
                    }
                });
            }
        </script>
    </body>
</html>