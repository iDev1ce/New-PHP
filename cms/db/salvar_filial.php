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

    // Salva registro da filial
    if (isset($_POST['btn_submit'])) {

        $id = $_GET['id'];

        $logradouro = $_POST['txt_logradouro'];
        $numero = $_POST['txt_numero'];
        $bairro = $_POST['txt_bairro'];
        $cidade = $_POST['txt_cidade'];
        $uf = $_POST['txt_uf'];
        $cep = $_POST['txt_cep'];

        $conexao = conexaoMySQL();

        // Faz a edição da filial
        if (isset($_GET['action']) && strtoupper($_GET['action']) === 'EDIT') {
            $sql = "UPDATE filiais 
                    SET id_filial=".$id.",
                        logradouro='".$logradouro."',
                        numero='".$numero."',
                        bairro='".$bairro."',
                        cidade='".$cidade."',
                        uf='".$uf."',
                        cep='".$cep."' 
                        WHERE id_filial=" . $_GET['id'] . ';';
        } else {
            $sql = "INSERT INTO  filiais (logradouro, bairro, cidade, uf, cep, status, numero)
			            VALUES ('".$logradouro."',
                            '".$bairro."',
                            '".$cidade."',
                            '".$uf."',
                            '".$cep."',
                            1,
                            '".$numero."');";
            
        }
        
        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../filiais.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }
?>