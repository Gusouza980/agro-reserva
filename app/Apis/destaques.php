<?php
include_once('_functions.php');

/* link especifico */
$url = 'https://api.bscommerce.com.br/produto/';
$rows = "12";

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getDestaques",
  "rows"  => $rows
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

foreach ($dados as $key => $value) {
	echo 'Código: '.$value->ID_Produto.'<br>';
	echo 'Nome: '.$value->nm_Produto.'<br>';
	echo 'Frete grátis: '.$value->fl_FreteGratis.'<br>';
	echo 'Valor: R$ '.number_format($value->vl_Produto, 2, ',', '.').'<br>';
	echo 'Desconto: '.$value->vl_Desconto.'%<br>';
	echo 'Mensagem: '.$value->tx_Mensagem.'<br>';
	echo 'Detalhes: <a href="produto.php?codigo='.$value->ID_Produto.'&slug='.$value->nm_Slug.'">ver produto</a><br>';
	echo 'Imagem principal: '.urldecode($value->tx_PathImagem).'<br>';
	echo 'Thumb principal: '.urldecode($value->tx_PathThumb).'<br><br>';
}

//var_dump($dados);
?>