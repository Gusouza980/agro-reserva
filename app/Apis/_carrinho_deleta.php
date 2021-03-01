<?php
include_once('_functions.php');

$cartid = $_GET['cartid']; //post ou get - id do carrinho

echo $cartid.'<br>';
/* link especifico */
$url = 'https://api.bscommerce.com.br/carrinho/';

/* array de dados - insere item no carrinho */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "delCarrinhoItem",
	"cartid"  => $cartid
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

//var_dump($retorno);

if ($retorno == 'false') {
	echo 'erro';
} else {
	echo '<script>document.location.href=\'carrinho.php\';</script>';
}

?>