<?php
include_once('_functions.php');

$auxiliar = $_GET['auxiliar']; //post ou get - codigo auxiliar
$qtde = 1;

/* link especifico */
$url = 'https://api.bscommerce.com.br/carrinho/';

/* array de dados - insere item no carrinho */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "setCarrinhoItem",
	"user"  => $_SESSION['userid'],
	"uuid"  => $_SESSION['useruuid'],
	"code"  => $auxiliar,
  "qtde"  => $qtde
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

if ($retorno == 'false') {
	echo 'erro';
} else {
	echo '<script>document.location.href=\'carrinho.php\';</script>';
}

?>
