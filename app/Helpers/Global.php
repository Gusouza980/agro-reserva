<?php

    function limparString($string){
        $string = str_replace(' ', '', $string); // Remove espaços
        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Remove caracteres especiais
    }

    function getFileExtension($filePath) {
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }

    function getFileName($filePath) {
        return pathinfo($filePath, PATHINFO_BASENAME);
    }

    function getFileIcon($filePath) {
        $ext = getFileExtension($filePath);
        if(isset(config('documentos.icones')[$ext])){
            return config('documentos.icones.'.$ext);
        }else{
            return config('documentos.icones.default');
        }
    }

    function formataDinheiro($valor){
        return number_format($valor, 2, ',', '.');
    }

?>