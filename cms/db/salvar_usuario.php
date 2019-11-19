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

    // Salva registro do usuário
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

        // Envia para execução a tarefa desejada
        if (mysqli_query($conexao, $sql))
            header('location:../usuarios.php');
        else
            echo("<script>alert('ERRO: Falha ao executar o script no banco de dados!');</script>");
    }

    // DELETAR DEPOIS
    /* 
        Passo 1
            INSERT INTO niveis (nome, adm_conteudo, adm_contato, adm_usuarios, status)
                    VALUES ('Administrador',
                            1,
                            1,
                            1,
                            1);

        Passo 2
            INSERT INTO usuarios (id_nivel, nome, email, senha, status) 
                    VALUES (1,
                            'Juan Riquelme',
                            'juan@gmail.com',
                            'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',
                            1);
    */
?>