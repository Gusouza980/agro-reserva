<?php
include_once('_functions.php');

$setorpai = (isset($_GET['setor'])) ? $_GET['setor'] : "1"; //get ou post

/* link especifico */
$url = 'https://api.bscommerce.com.br/setor/';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getSetores",
  "pai"  	=> $setorpai
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

foreach ($dados as $key => $value) {
	echo 'Código : '.$value->ID_Setor.'<br>';
	echo 'Nome: '.$value->nm_Setor.'<br>';
	echo 'Slug: '.$value->nm_Slug.'<br>';
	echo 'Submenus: '.$value->qt_SubMenus.'<br>';
	echo 'Link: <a href="produtos.php?slug='.$value->nm_Slug.'">listar produtos</a><br><br>';
}

//var_dump($dados);
?>