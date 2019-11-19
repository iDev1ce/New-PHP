<?php
    if (!file_exists(include_once('../../db/conexao.php')))
        include_once('../../db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (!isset($_SESSION['username'])) {
        header('location:../../'); 
        return;
    }

    // Deleta registro do nível
    if (isset($_GET['action']) && strtoupper($_GET['action']) === 'DELETE') {

        $conexao = conexaoMySQL();
        $id = $_GET['id'];
        $sql = 'DELETE FROM niveis WHERE id_nivel=' . $id . ';';
        
        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../niveis.php');
        else 
            echo("
                <script>
                    alert('ERRO: Existe um usuário com permissões desse nível!');
                    location.href = '../niveis.php';
                </script>");
    }
?>