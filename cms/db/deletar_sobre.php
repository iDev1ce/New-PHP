<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    // Deleta registro do sobre
    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'DELETE') {

        $conexao = conexaoMySQL();
        $id = $_GET['id'];
        $image = $_GET["image"];
        $sql = "DELETE FROM sobre WHERE id_sobre=" . $id . ";";

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql)) {
            unlink('uploads/' . $image);  
            header('location:../sobre.php');
        }
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>