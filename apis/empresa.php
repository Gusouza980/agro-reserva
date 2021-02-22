<?php
include_once('_functions.php');

/* se o cliente for > 0, relacionará com a empresa */
$cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "0"; //get ou post

/* link especifico */
$url = 'https://api.bscommerce.com.br/cadastro/';

/* array de dados */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "setEmpresa",
	"cliente" => $cliente, // numerico inteiro, vem da função da API getClientes
	"nome" => $_POST['nome'], // varchar(2) a varchar(200), obrigatorio
	"fantasia" => $_POST['fantasia'], // varchar(2) a varchar(200), obrigatorio
	"email" => $_POST['email'], // varchar(3) a varchar(100), obrigatorio
	"cnpj" => $_POST['cnpj'], // varchar(14) a varchar(18), se formatado, obrigatorio 999.999.999-99
	"telefone" => $_POST['telefone'], // varchar(10) a varchar(14), se formatado, obrigatorio (99)99999-9999
	"cidade" => $_POST['cidade'], // numerico inteiro, vem da função da API getCidades
	"endereco" => $_POST['endereco'], // varchar(3) a varchar(100), obrigatorio
	"numero" => $_POST['numero'], // varchar(1) a varchar(10), opcional
	"complemento" => $_POST['complemento'], // varchar(3) a varchar(50), opcional
	"cep" => $_POST['cep'], // varchar(8) a varchar(9), se formatado, obrigatorio 99999-999
	"bairro" => $_POST['bairro'], // varchar(3) a varchar(60), obrigatorio
	"status" => $_POST['status'] // 1 = validada, 0 = necessita validar pela administração, obrigatorio
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

// se $dados[0]->ID_Empresa > 0, empresa cadastrada com sucesso;


/* array de dados - retorna dados de empresa cadastrada */
/*
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getEmpresa",
	"cnpj" => $_POST['cnpj'],// varchar(14) a varchar(18), se formatado, obrigatorio 999.999.999-99
);
*/
?>