<?php
include_once('_functions.php');

$codigo = $_GET['codigo']; //post ou get

/* link especifico */
$url = 'https://api.bscommerce.com.br/produto/';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getProduto",
  "code"  => $codigo
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

$produto = $dados->produto;
$adicionais = $dados->adicionais;

/* escrevendo os dados */
echo 'Codigo: '.$produto[0]->ID_Produto.'<br>';
echo 'Nome: '.$produto[0]->nm_Produto.'<br>';
echo 'Peso: '.$produto[0]->vl_Peso.'<br>';
echo 'Frete grátis: '.$produto[0]->fl_FreteGratis.'<br>';
echo 'Desconto Setor: '.$produto[0]->vl_DescontoSetor.'%<br>';
echo 'Descrição: '.$produto[0]->tx_Descricao.'<br><br>';
// echo 'Imagem principal: '.urldecode($produto[0]->tx_PathImagem).'<br>';
// echo 'Thumb principal: '.urldecode($produto[0]->tx_PathThumb).'<br>';

foreach ($adicionais as $key => $value) {
	echo 'Codigo aux: '.$value->ID_Adicional.'<br>';
	echo 'Valor: R$ '.number_format($value->vl_Produto, 2, ',', '.').'<br>';
	echo 'Desconto: '.$value->vl_Desconto.'%<br>';
	echo 'Subtitulo: '.$value->tx_Subtitulo.'<br>';
	echo 'Estoque: '.$value->qt_Disponivel.'<br>';

	echo 'Link: <a href="_carrinho_insere.php?auxiliar='.$value->ID_Adicional.'">inserir no carrinho</a><br>';

	echo 'Imagem adicional: '.urldecode($value->tx_PathImagem).'<br>';
	echo 'Thumb adicional: <br><img src="'.urldecode($value->tx_PathThumb).'"><br><br>';
}
//var_dump($adicionais);


?>