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

    // Muda o estado do "sobre"
    if (isset($_GET['action'])) {

        $id = $_GET['id'];
        
        $conexao = conexaoMySQL();

        if (strtoupper($_GET['action']) == 'ENABLE')
            $sql = 'UPDATE sobre SET status=1 WHERE id_sobre=' . $id . ';';
        elseif (strtoupper($_GET['action']) === 'DISABLE')
            $sql = 'UPDATE sobre SET status=0 WHERE id_sobre=' . $id . ';';

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../sobre.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }

      
?>