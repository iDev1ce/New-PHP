<?php

// Verifica se houve ação do POST no form
if (isset($_POST['btn_salvar'])) {
        
    if (!file_exists(include_once('conexao.php'))) 
        include_once('conexao.php');

    $conexao = conexaoMySQL();
    
    //Resgate de dados
    $nome = $_POST['txt_nome'];
    $telefone = $_POST['txt_telefone'];
    $celular = $_POST['txt_celular'];
    $email = $_POST['txt_email'];
    $homepage = $_POST['txt_homepage'];
    $facebook = $_POST['txt_facebook'];
    $sexo = $_POST['rdo_sexo'];
    $profissao = $_POST['txt_profissao'];
    $mensagem = $_POST['txt_mensagem'];
    $critica_sugestao = $_POST['rdo_critica_sugestao'];

    if ($telefone == "") {
        $telefone = "NA";
    }

     if ($homepage == "") {
        $homepage = "NA";
    }

    if ($facebook == "") {
        $facebook = "NA";
    }
        
    // String de inserção pro banco
    $sql = "INSERT INTO tbl_contatos (nome, telefone, celular, email, homepage, facebook, sexo, profissao, mensagem, critica_sugestao) 
                VALUES
                        ('".$nome."',
                        '".$telefone."',
                        '".$celular."',
                        '".$email."',
                        '".$homepage."',
                        '".$facebook."',
                        '".$sexo."',
                        '".$profissao."',
                        '".$mensagem."',
                        '".$critica_sugestao."');";
    
    // Envio e checagem se os dados foram cadastrados
    if (mysqli_query($conexao, $sql))
        header('location: ../contato.php');
    else 
        echo('<script> alert("Erro ao enviar os dados!") </script>');
}

?>