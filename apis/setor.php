<?php
include_once('_functions.php');

$slug = (isset($_GET['slug'])) ? $_GET['slug'] : ""; //get ou post

/* link especifico */
$url = 'https://api.bscommerce.com.br/setor/';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getSetor",
  "slug"  	=> $slug
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

var_dump($dados);
?>