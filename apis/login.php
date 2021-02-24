<?php
include_once('_functions.php');

$email = $_GET['email']; // usar post ou curl por segurança, get para testes
$senha = $_GET['senha']; // usar post ou curl por segurança, get para testes

/* link especifico */
$url = 'https://api.bscommerce.com.br/login/';

/* array de dados - lista carrinho completo */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getLogin",
	"email" => $email,
	"senha" => $senha
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

/*
$dados[0]->ID_Cliente
	-1 	= E-mail não existe
	 0 	= Senha não confere
	>0 	= Login OK, definir $_SESSION['userid'] 
*/

var_dump($dados); 
?>