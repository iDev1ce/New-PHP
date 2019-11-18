<?php
    if (!file_exists(include_once('../db/conexao.php')))
        include_once('../db/conexao.php');

    $button = 'Cadastrar';
    $conexao = conexaoMySQL();

    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
        $id = $_GET['id'];

        $conexao = conexaoMySQL();
        $sql = 'SELECT * FROM sobre WHERE id_sobre=' . $id . ';';
        $select = mysqli_query($conexao, $sql);

        if ($rsSobre = mysqli_fetch_array($select)) {
            $titulo = $rsSobre['titulo'];
            $texto = $rsSobre['texto'];
            $imagem = $rsSobre['imagem'];
        }

        $button = "Editar";

        if (!mysqli_query($conexao, $sql))
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Pizzaria Frajola - CMS</title>

        <link href="./css/styles.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <!-- Modal -->
        <div id="modal-container">
            <div id="modal">    
                <header>
                    X
                </header>

                <div id="modal-data">

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

        <!-- Conteudo Principal -->
        <div id="cms-principal">
            <div id="sobre-container" class="conteudo center">
                <h1> 
                    <strong> Administração de Conteúdo </strong>
                </h1>     
                
                <h2>
                    Sobre
                </h2>

                <form name="frm_sobre" enctype="multipart/form-data" method="POST" action="./db/salvar_sobre.php<?php if (isset($id)) echo('?action=edit&id=' . $id . '&image=' . $image); ?>">
                    <div>
                        <textarea id="titulo" name="txt_titulo" placeholder="Título"><?=@$rsSobre['titulo']?></textarea>
                        <textarea id="texto" name="txt_texto" placeholder="Texto*" required><?=@$rsSobre['texto']?></textarea>

                        <label id="thumbnail" style="background-image: url('db/uploads/<?=@$image?>'); border: <?php if (isset($image)) { echo('none'); } ?>;">
                            <input type="file" name="file_sobre" id="img-sobre" accept="image/png, image/jpeg, image/jpg" required />
                            <img src="./img/camera.svg" id="camera-icon" alt="Selecione a imagem" style="display: <?php if (isset($image)) { echo('none'); } ?>;" />
                        </label>
                    </div>
                    
                    <input type="submit" name="btn_submit" value="<?=$button?>" />
                </form>

                <table>
                    <tr id="tbl-header">
                        <td>TÍTULO</td>
                        <td>TEXTO</td>
                        <td>IMAGEM</td>
                        <td>ESTADO</td>
                        <td>OPÇÕES</td>
                    </tr>

                    <?php
                    $sql = 'SELECT * FROM sobre;';
                    $select = mysqli_query($conexao, $sql);

                    while ($rsSobre = mysqli_fetch_array($select)) { ?>
                        <tr>
                            <td><?=substr($rsSobre['titulo'], 0, 48) . '...'?></td>

                            <td><?=substr($rsSobre['texto'], 0, 48) . '...'?></td>

                            <td>
                                <img src="./db/uploads/<?=$rsSobre['imagem']?>" class="preview">
                            </td>

                            <td class="tbl-enable-disable"> <?php
                                if ($rsSobre['status']) {
                                    echo('
                                    <a href="./db/status_sobre.php?action=disable&id='. $rsSobre['id_sobre'] .'">
                                        <img src="./img/on.png" alt="Desabilitar" title="Desabilitar" /> 
                                    </a>');
                                }
                                else   
                                    echo('
                                    <a href="./db/status_sobre.php?action=enable&id='. $rsSobre['id_sobre'] .'">
                                        <img src="./img/off.png" alt="Habilitar" title="Habilitar" /> 
                                    </a>'); ?>
                            </td>

                            <td>
                                <a href="./sobre.php?action=edit&id=<?=$rsSobre['id_sobre']?>">
                                    <img src="./img/edit.png" alt="Editar" title="Editar" />
                                </a>

                                <a href="./db/deletar_sobre.php?action=delete&id=<?=$rsSobre['id_sobre']?>" onclick="return confirm('Deseja realmente excluir esse registro?');">
                                    <img src="./img/remove.png" alt="Remover" title="Remover" />
                                </a>
                                <a href="#" class="handleModalView" onclick="showModalData(<?=$rsSobre['id_sobre']?>);">
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
            var $imagemSobre = document.getElementById('img-sobre');
            var $thumbnail = document.getElementById('thumbnail');
            var $cameraIcon = document.getElementById('camera-icon');
            
            $imagemSobre.addEventListener('change', function(e) {
                const url = URL.createObjectURL(e.target.files[0]);

                $thumbnail.style.backgroundImage = `url(${url})`;
                $thumbnail.style.border = 'none';
                $cameraIcon.style.display = 'none';
            });

            /* Show modal */
            $(document).ready(function() {
                $('.handleModalView').click(function() {
                    $('#modal-container').fadeIn(250);
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
                    $("#modal-container").slideUp(100);
            });

            /* Ajax function to show modal data */
            function showModalData(id) {
                $.ajax({
                    type: 'POST',
                    url: './modal/sobre.php',
                    data: {
                        action: 'VISUALIZAR',
                        id: id
                    }, 
                    success: function(data) {
                        $('#modal-data').html(data);
                    }
                });
            }
        </script>
    </body>
</html>