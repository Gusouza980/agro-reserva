<?php
include_once('_functions.php');

/* link especifico */
$url = 'https://api.bscommerce.com.br/carrinho/';

/* array de dados - insere item no carrinho */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "delCarrinho",
	"user"  => $_SESSION['userid'],
	"uuid"  => $_SESSION['useruuid']
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

if ($retorno == 'false') {
	echo 'erro';
} else {
	echo '<script>document.location.href=\'carrinho.php\';</script>';
}

?>
