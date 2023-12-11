<?php

    function limparString($string){
        $string = str_replace(' ', '', $string); // Remove espaços
        return preg_replace('/[^A-Za-z0-9]/', '', $string); // Remove caracteres especiais
    }
?>