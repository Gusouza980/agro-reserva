<?php
include_once('_functions.php');

$slug = $_GET['slug'];

/* link especifico */
$url = 'https://api.bscommerce.com.br/global/';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getTexto",
  "slug"  	=> $slug
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

echo urldecode($dados[0]->tt_Texto).'<br>';
echo urldecode($dados[0]->tx_Arquivo);

//--------------------

echo '<br><br>';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getTextos"
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

foreach ($dados as $key => $value) {
	echo 'Título: '.$value->tt_Texto.'<br>';
	echo 'Página: '.$value->nm_Pagina.'<br>';
	echo 'Slug: '.$value->tx_Slug.'<br>';
}
?>