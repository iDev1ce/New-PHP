<?php

    // Conexao com o banco
    function conexaoMySQL() {

        $host = (string) "localhost";
        $user = (string) "root";
        $password = (string) "bcd127";
        $database = (string) "db_pizzaria";

        $conexao_mysql = mysqli_connect($host, $user, $password, $database);

        if (!$conexao_mysql) 
            echo("<script> alert('Erro ao conectar-se ao banco!') </script>");
        
        return $conexao_mysql;
    }
?>