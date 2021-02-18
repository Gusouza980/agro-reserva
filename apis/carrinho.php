<?php
include_once('_functions.php');

/* link especifico */
$url = 'https://api.bscommerce.com.br/carrinho/';

/* array de dados - lista carrinho completo */
$data =  array(
	"token" => $tokenapi,
	"ope"   => "getCarrinho",
	"user"  => $_SESSION['userid'],
	"uuid"  => $_SESSION['useruuid']
);

/* envia dados e recebe retorno */
$retorno = callAPI($url, $data);

/* retorno em html, devolve tabela do carrinho completa */


if ($retorno != 'false') {
	echo $retorno;
?>
<br>

<a id="btnContinue" href="javascript: document.location.href='_seguro.php';">Concluir</a><br><br>

<a id="btnLimpar" href="javascript: document.location.href='_carrinho_limpa.php';">Limpar carrinho</a><br><br>

<?php
} else {
	echo '<div class="errorResult">Carrinho de compras vazio!</div>';
	//var_dump($_SESSION);
}
?>

<script>
function deletaItem(cartid) {
	//alert(cartid);
	document.location.href = '_carrinho_deleta.php?cartid='+cartid;
}
</script>

<!-- css especifico para o carrinho, personalizavel -->
<style>
	/* cart */
	table.tableCart {
		font-family: tahoma;
		font-size: 14px;
		width: 800px;
		border-collapse: collapse;
	}

	table.tableCart th, table.tableCart td {
		border: 1px solid #333333;
		padding: 5px;
	}

	div.errorResult {
		font-size: 18px;
		font-weight: bold;
		color: #C00000;
	}

	svg.ico_trash, svg.ico_refresh {
		width: 24px;
		height: 24px;	
		margin: 0 3px;
		cursor: pointer;
	}

	svg.ico_trash {
		fill: #C00000;
	}

	svg.ico_refresh {
		fill: #008000;
	}
	/* end cart */
</style>

