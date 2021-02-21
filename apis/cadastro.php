<?php
include_once('_functions.php');

/* link especifico */
$url = 'https://api.bscommerce.com.br/cadastro/';

/* array de dados - lista carrinho completo */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "setCliente",
	"nome" => $_POST['nome'], // varchar(2) a varchar(100), obrigatorio
	"email" => $_POST['email'], // varchar(3) a varchar(100), obrigatorio
	"cpf" => $_POST['cpf'], // varchar(11) a varchar(14), se formatado, obrigatorio 999.999.999-99
	"nascimento" => $_POST['nascimento'], // varchar(10), formatado dd/mm/aaaa, opcional
	"sexo" => $_POST['sexo'], // 1 = masculino, 0 = feminino, obrigatorio
	"cidade" => $_POST['cidade'], // numerico inteiro, vem da função da API getCidades
	"endereco" => $_POST['endereco'], // varchar(3) a varchar(100), obrigatorio
	"numero" => $_POST['numero'], // varchar(1) a varchar(10), opcional
	"complemento" => $_POST['complemento'], // varchar(3) a varchar(50), opcional
	"cep" => $_POST['cep'], // varchar(8) a varchar(9), se formatado, obrigatorio 99999-999
	"bairro" => $_POST['bairro'], // varchar(3) a varchar(60), obrigatorio
	"referencia" => $_POST['referencia'], // varchar(400), opcional
	"telefone" => $_POST['telefone'], // varchar(10) a varchar(14), se formatado, opcional (99)99999-9999
	"celular" => $_POST['celular'], // varchar(10) a varchar(14), se formatado, opcional (99)99999-9999
	"senha" => $_POST['senha'] // varchar(5) a varchar(15), obrigatorio (recomendo confirmação)
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* converte json em array (opcional) */
$dados = json_decode($retorno);

// se $dados[0]->ID_Cliente > 0, seta $_SESSION['userid'] = $dados[0]->ID_Cliente;
// se $_SESSION['userid'] > 0, libera acesso a areas restritas
// o default de $_SESSION['userid'] é sempre 0;
?>