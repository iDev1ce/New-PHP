<?php

    // Upload de imagem
    function uploadImagem($file, $path) {
        // Recebe o nome do arquivo
        $filename = pathinfo($_FILES[$file]['name'], PATHINFO_FILENAME);
        // Recebe a extensão do arquivo
        $ext = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);

        // Encrypta o nome do arquivo
        $encryptedFilename = hash('sha256', uniqid(time() . $filename));
        // Forma um aquivo "encryptado.extensão"
        $encryptedFilename = $encryptedFilename . '.' . $ext;
        $tempFile = $_FILES[$file]['tmp_name'];
        
        // Envia a imagem para o banco
        if (move_uploaded_file($tempFile, $path . $encryptedFilename)) 
            return $encryptedFilename;
        
        return false;
    }
?>