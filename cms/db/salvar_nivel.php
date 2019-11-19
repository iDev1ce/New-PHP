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

    // Salva registro do nível
    if (isset($_POST['btn_submit'])) {

        $name = $_POST['txt_name'];
        $adm_conteudo = isset($_POST['chk_conteudo']) ? 1 : 0;
        $adm_contato = isset($_POST['chk_contato']) ? 1 : 0;
        $adm_usuario = isset($_POST['chk_usuarios']) ? 1 : 0;
        
        $conexao = conexaoMySQL();

        // Faz a edição do nível
        if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
            $sql = "UPDATE niveis 
                    SET nome='".$name."',
                        adm_conteudo=".$adm_conteudo.",
                        adm_contato=".$adm_contato.",
                        adm_usuarios=".$adm_usuario." 
                        WHERE id_nivel=" . $_GET['id'] . ';';
            
        } else {
            $sql = "INSERT INTO niveis (nome, adm_conteudo, adm_contato, adm_usuarios, status)
                    VALUES ('".$name."',
                            ".$adm_conteudo.",
                            ".$adm_contato.",
                            ".$adm_usuario.",
                            1);";
        }

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../niveis.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>