<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    $button = 'Cadastrar';
    $conexao = conexaoMySQL();

    // Editar registro no banco
    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
        $id = $_GET['id'];

        $conexao = conexaoMySQL();
        $sql = 'SELECT * FROM curiosidades WHERE id=' . $id . ';';
        $select = mysqli_query($conexao, $sql);

        if ($rsCuriosidade = mysqli_fetch_array($select)) {
            $curiosity = $rsCuriosidade['texto'];
            $image = $rsCuriosidade['imagem'];
        }

        $button = "Editar";

        if (!mysqli_query($conexao, $sql))
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <title>
            Pizzaria Frajola - CMS
        </title>

        <!-- Favicon -->
        <link rel="icon" href="../img/favicon.png">
        
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

                <div id="dados-modal">

                </div>
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
            <div id="conteudo-container" class="conteudo center">
                <h1> 
                    <strong> Administração de Conteúdo </strong>
                </h1>     
                
                <h2>
                    Curiosidades
                </h2>

                <form name="frm_curiosities" enctype="multipart/form-data" method="POST" action="./db/salvar_curiosidade.php<?php if (isset($id)) echo('?action=edit&id=' . $id . '&image=' . $image); ?>">
                    <div>
                        <!-- Recebe o preview da imagem -->
                        <label id="thumbnail" style="background-image: url('db/uploads/<?=@$image?>'); border: <?php if (isset($image)) { echo('none'); } ?>;">
                            <input type="file" name="file_curiosidade" id="img-curiosity" accept="image/png, image/jpeg, image/jpg" />
                            <img src="./img/camera.svg" id="camera-icon" alt="Selecione a imagem" style="display: <?php if (isset($image)) { echo('none'); } ?>;" />
                        </label>

                        <textarea name="txt_curiosity" placeholder="Curiosidade*" required><?=@$curiosity?></textarea>
                    </div>
                    
                    <input type="submit" name="btn_submit" value="<?=$button?>" />
                </form> 

                <table>
                    <tr id="tbl-header">
                        <td>CURIOSIDADE</td>
                        <td>IMAGEM</td>
                        <td>ESTADO</td>
                        <td>OPÇÕES</td>
                    </tr>

                    <?php
                    $sql = "SELECT * from curiosidades;";
             
                    $select = mysqli_query($conexao, $sql);

                    // Resgatar valores da tabela no banco conforme a necessidade
                    while ($rsCuriosidade = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td> 
                                <?=substr($rsCuriosidade['texto'], 0, 48) . '...'?>
                            </td>

                            <td>
                                <img src="db/uploads/<?=$rsCuriosidade['imagem']?>" class="preview" />
                            </td>

                            <td class="tbl-enable-disable"> <?php
                                // Caso o estado estiver ativado, muda o botão para desativar
                                if ($rsCuriosidade['status']) {
                                    echo('
                                    <a href="./db/status_curiosidade.php?action=disable&id='. $rsCuriosidade['id'] .'">
                                        <img src="./img/on.png" alt="Desabilitar" title="Desabilitar" /> 
                                    </a>');
                                }
                                // Caso o estado estiver desativado, muda o botão para ativar
                                else   
                                    echo('
                                    <a href="./db/status_curiosidade.php?action=enable&id='. $rsCuriosidade['id'] .'">
                                        <img src="./img/off.png" alt="Habilitar" title="Habilitar" /> 
                                    </a>'); ?>
                            </td>

                            <td>
                                <!-- Chama a função que edita o registro -->
                                <a href="./curiosidades.php?action=edit&id=<?=$rsCuriosidade['id']?>">
                                    <img src="./img/edit.png" alt="Editar" title="Editar" />
                                </a>

                                <!-- Chama a função que remove o registro -->
                                <a href="./db/deletar_curiosidade.php?action=delete&id=<?=$rsCuriosidade['id']?>&image=<?=$rsCuriosidade['imagem']?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
                                    <img src="./img/remove.png" alt="Remover" title="Remover" />
                                </a>

                                <!-- Chama a função que visualiza o registro -->
                                <a href="#" class="handleModalView" onclick="showModalData(<?=$rsCuriosidade['id']?>);">
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
            var $imagemCuriosidade = document.getElementById('img-curiosity');
            var $thumbnail = document.getElementById('thumbnail');
            var $cameraIcon = document.getElementById('camera-icon');
            
            // Função responsável pelo preview da imagem
            $imagemCuriosidade.addEventListener('change', function(e) {
                const url = URL.createObjectURL(e.target.files[0]);

                $thumbnail.style.backgroundImage = `url(${url})`;
                $thumbnail.style.border = 'none';
                $cameraIcon.style.display = 'none';
            });

            /* Mostrar modal */
            $(document).ready(function() {
                $('.handleModalView').click(function() {
                    $('#modal-container').slideDown(250);
                })
            });

            /* Fechar modal no click */
            $(document).ready(function() {
                $('#modal-close').click(function() {
                    $('#modal-container').slideUp(100);
                })
            });

            /* Fechar modal apertando Esc */
            $(document).keyup(function(event) {
                if (event.key === "Escape") 
                    $("#modal-container").slideUp(100);
            });

            /* AJAX para mostrar os dados na modal */
            function showModalData(id) {
                $.ajax({
                    type: 'POST',
                    url: './modal/curiosidade.php',
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