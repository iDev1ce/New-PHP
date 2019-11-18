<?php
    if (!file_exists(include_once('./db/conexao.php')))
    include_once('./db/conexao.php');

    if (!isset($_SESSION))
        session_start();

    if (isset($_POST['btn_submit'])) {
        $email = $_POST['txt_email'];
        $password = hash('sha256', $_POST['txt_senha']);
    
        $conexao = conexaoMySQL();
        $sql = 'SELECT * FROM usuarios;';
        $select = mysqli_query($conexao, $sql);

        

        while ($rsUser = mysqli_fetch_array($select)) {
            if ($rsUser['status']) {
                if ($email === $rsUser['email'] && $password === $rsUser['senha']) {
                    $_SESSION['id_nivel'] = $rsUser['id_nivel'];
                    $_SESSION['username'] = $rsUser['nome'];
                    header('location:./cms/');
                }
            }
        }

        echo("<script>alert('Login e/ou senha inválido!');</script>");
    }
?>

<header>
    <div class="conteudo center">
        <div id="area_logo">
            <a href="index.php">
                <div>
                    <img alt="Logo"  id="logo" title="Logo" src="./img/logo.png">
                </div>
            </a>
        </div>
        
        <!-- Menu de navegação do site -->
        <nav id="area_menu">
            <ul id="menu">
                <li class="menu_itens"> <a href="promocoes.php"> <div> PROMOÇÕES </div> </a> </li> 
                <li class="menu_itens"> <a href="curiosidades.php"> <div> CURIOSIDADES </div> </a> </li> 
                <li class="menu_itens"> <a href="produtos_mes.php"> <div> PRODUTO DO MÊS </div> </a> </li>
                <li class="menu_itens"> <a href="filiais.php"> <div> NOSSAS LOJAS </div> </a> </li>
                <li class="menu_itens"> <a href="sobre.php"> <div> SOBRE A EMPRESA </div> </a> </li>
                <li class="menu_itens"> <a href="contato.php"> <div> FALE CONOSCO </div> </a> </li>
            </ul>
        </nav>
        
        <!-- Área de login -->
        <div id="area_login">
            <form name="frm_Login" method="post" action="#">
                <div id="lgn">
                    <label for="txt_usuario">
                        Usuário
                    </label>
                    
                        <input type="text" name="txt_email" value="" id="txt_usuario" class="txt">
                </div>
                
                <div id="pass">
                    <label for="txt_senha">
                        Senha
                    </label>
                    
                    <input type="text" name="txt_senha" value="" id="txt_senha" class="txt">
                    
                    <input type="submit" name="btn_submit" value="ok" id="btn">
                </div>
            </form>
        </div>
    </div>
</header>