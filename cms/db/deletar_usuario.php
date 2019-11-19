<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

        
    // Validação de segurança
    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    // Deleta registro do usuário
    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'DELETE') {

        $conexao = conexaoMySQL();
        $id = $_GET['id'];
        $sql = 'DELETE FROM usuarios WHERE id=' . $id . ';';

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../usuarios.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>