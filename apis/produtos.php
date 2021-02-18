<?php
include_once('_functions.php');

$page = "1"; //get ou post
$rows = "12"; //get ou post
$slug = $_GET['slug']; //get ou post

/* link especifico */
$url = 'https://api.bscommerce.com.br/produto/';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getProdutos",
	"page"  => $page,
  "rows"  => $rows,
  "slug"  => $slug
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

$registros = $dados[0]->qt_Registros;

echo 'Registros: '.$registros.'<br><br>'; // para paginacao

foreach ($dados as $key => $value) {
	echo 'Código: '.$value->ID_Produto.'<br>';
	echo 'Nome: '.$value->nm_Produto.'<br>';
	echo 'Slug: '.$value->nm_Slug.'<br>';
	echo 'Frete grátis: '.$value->fl_FreteGratis.'<br>';
	echo 'Valor: R$ '.number_format($value->vl_Produto, 2, ',', '.').'<br>';
	echo 'Desconto: '.$value->vl_Desconto.'%<br>';
	echo 'Mensagem: '.$value->tx_Mensagem.'<br>';
	echo 'Detalhes: <a href="produto.php?codigo='.$value->ID_Produto.'&slug='.$value->nm_Slug.'">ver produto</a><br>';
	echo 'Imagem principal: '.urldecode($value->tx_PathImagem).'<br>';
	echo 'Thumb principal: <br><img src="'.urldecode($value->tx_PathThumb).'"><br><br>';
}

//var_dump($dados);
//var_dump($_SESSION);
?>