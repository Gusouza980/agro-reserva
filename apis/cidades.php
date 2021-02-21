<?php
include_once('_functions.php');

$cidade = (isset($_GET['cidade'])) ? $_GET['cidade'] : 0; //get ou post
$uf = (isset($_GET['uf'])) ? $_GET['uf'] : ""; //get ou post

/* link especifico */
$url = 'https://api.bscommerce.com.br/cadastro/';

/* array de dados - lista carrinho completo */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getCidades",
	"cidade" => $cidade,
	"uf" => $uf
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

var_dump($dados); 
?>