<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (!file_exists(include_once('../include/uploads.php')))
        include_once('../include/uploads.php');

    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    // Salva registro do sobre
    if (isset($_POST['btn_submit'])) {

        $titulo = $_POST['txt_titulo'];
        $texto = $_POST['txt_texto'];

        // Faz a edição do sobre
        if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
            if ($_FILES['file_sobre']['name'] === '' && $_FILES['file_sobre']['size'] === 0) {
                $sql = "UPDATE sobre 
                        SET titulo='".$titulo."',
                            texto='".$texto."'
                        WHERE id_sobre=" . $_GET['id'] . ';';  
            } else {
 
                $encryptedFilename = uploadImagem('file_sobre', 'uploads/');

                if (!$encryptedFilename)
                    echo("
                        <script>
                            alert('ERRO: Não foi possível enviar o arquivo para o servidor!'); 
                            location.href='../sobre.php';
                        </script>");
                else
                    $sql = "UPDATE sobre 
                                SET titulo='".$titulo."',
                                    texto='".$texto."',
                                    imagem='".$encryptedFilename."'
                                WHERE id_sobre=" . $_GET['id'] . ';';
            }
        } else {
            if ($_FILES['file_sobre']['name'] === '' && $_FILES['file_sobre']['size'] === 0) {
                $sql = "INSERT INTO sobre (titulo, texto, status)
                        VALUES ('".$titulo."',
                                '".$texto."',
                                1);";
            } else {

                $encryptedFilename = uploadImagem('file_sobre', 'uploads/');

                if (!$encryptedFilename)
                    echo("
                        <script>
                            alert('ERRO: Opora Não foi possível enviar o arquivo para o servidor!'); 
                            location.href='../sobre.php';
                        </script>");
                else 
                    $sql = "INSERT INTO sobre (titulo, texto, imagem, status)
                            VALUES ('".$titulo."',
                                    '".$texto."',
                                    '".$encryptedFilename."',
                                    1);";
            }
        }

        $conexao = conexaoMySQL();

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql)) {
            if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT' && $_FILES['file_sobre']['name'] !== '' && $_FILES['file_sobre']['size'] !== 0) 
                unlink('uploads/' . $_GET['image']);  

            header('location:../sobre.php');
        }
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>