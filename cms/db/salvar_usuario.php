<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    if (isset($_POST['btn_submit'])) {

        $nivel = $_POST['slt_nivel'];
        $name = $_POST['txt_name'];
        $email = $_POST['txt_email'];
        $password = hash('sha256', $_POST['txt_password']);

        $conexao = conexaoMySQL();

        if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
            $sql = "UPDATE usuarios 
                    SET id_nivel=".$nivel.",
                        nome='".$name."',
                        email='".$email."',
                        senha='".$password."' 
                        WHERE id=" . $_GET['id'] . ';';
        } else {
            $sql = "INSERT INTO usuarios (id_nivel, nome, email, senha, status) 
                    VALUES (".$nivel.",
                            '".$name."',
                            '".$email."',
                            '".$password."',
                            1);";
        }

        if (mysqli_query($conexao, $sql))
            header('location:../usuarios.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>