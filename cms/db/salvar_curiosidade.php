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

    if (isset($_POST['btn_submit'])) {

        $curiosity = addslashes($_POST['txt_curiosity']);

        if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
            if ($_FILES['file_curiosidade']['name'] === '' && $_FILES['file_curiosidade']['size'] === 0) {
                $sql = "UPDATE curiosidades 
                        SET texto='".$curiosity."'
                        WHERE id=" . $_GET['id'] . ';';  
            } else {
 
                $encryptedFilename = uploadImagem('file_curiosidade', 'uploads/');

                if (!$encryptedFilename)
                    echo("
                        <script>
                            alert('ERRO: Não foi possível enviar o arquivo para o servidor!'); 
                            location.href='../curiosidades.php';
                        </script>");
                else
                    $sql = "UPDATE curiosidades 
                        SET texto='".$curiosity."',
                        imagem='".$encryptedFilename."'
                        WHERE id=" . $_GET['id'] . ';';
            }
        } else {
            if ($_FILES['file_curiosidade']['name'] === '' && $_FILES['file_curiosidade']['size'] === 0) {
                $sql = "INSERT INTO curiosidades (texto, status)
                        VALUES ('".$curiosity."',
                                1);";
            } else {

                $encryptedFilename = uploadImagem('file_curiosidade', 'uploads/');

                if (!$encryptedFilename)
                    echo("
                        <script>
                            alert('ERRO: Não foi possível enviar o arquivo para o servidor!'); 
                            location.href='../curiosidades.php';
                        </script>");
                else 
                    $sql = "INSERT INTO curiosidades (texto, imagem, status)
                            VALUES ('".$curiosity."',
                                    '".$encryptedFilename."',
                                    1);";
            }
        }

        $conexao = conexaoMySQL();

        if (mysqli_query($conexao, $sql)) {
            if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT' && $_FILES['file_curiosidade']['name'] !== '' && $_FILES['file_curiosidade']['size'] !== 0) 
                unlink('uploads/' . $_GET['image']);  

            header('location:../curiosidades.php');
        }
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>