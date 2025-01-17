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

    // Muda o estado do nível
    if (isset($_GET['action'])) {

        $id = $_GET['id'];
        
        $conexao = conexaoMySQL();

        if (strtoupper($_GET['action']) == 'ENABLE')
            $sql = 'UPDATE niveis SET status=1 WHERE id_nivel=' . $id . ';';
        elseif (strtoupper($_GET['action']) === 'DISABLE')
            $sql = 'UPDATE niveis SET status=0 WHERE id_nivel=' . $id . ';';

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../niveis.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>