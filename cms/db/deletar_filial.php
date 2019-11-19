<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    // Deleta registro da filial
    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'DELETE') {

        $conexao = conexaoMySQL();
        $id = $_GET['id'];
        $sql = "DELETE FROM filiais WHERE id_filial=" . $id . ";";

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../filiais.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>