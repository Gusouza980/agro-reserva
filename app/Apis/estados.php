<?php
include_once('_functions.php');

$uf = (isset($_GET['uf'])) ? $_GET['uf'] : ""; //get ou post

/* link especifico */
$url = 'https://api.bscommerce.com.br/cadastro/';

/* array de dados - lista carrinho completo */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getEstados",
	"uf" => $uf
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

var_dump($dados);
?>