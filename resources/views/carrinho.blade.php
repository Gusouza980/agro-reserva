@extends('template.main')

@section("styles")
<!-- css especifico para o carrinho, personalizavel -->
<style>
	/* cart */
	table.tableCart {
		font-family: tahoma;
		font-size: 14px;
		width: 800px;
		border-collapse: collapse;
	}

    table.tableCart th{
        background-color: red;
        color: white;
        text-align: center;
    }

	table.tableCart th, table.tableCart td {
        padding: 5px;
        text-align: center !important;
	}

	div.errorResult {
		font-size: 18px;
		font-weight: bold;
		color: #C00000;
		text-align: center;
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
@endsection

@section('conteudo')

<div class="container py-5" style="min-height: 40vh;">
    @if($tabela != "false")
		<div class="row mt-5">
			<div class="col-12 d-flex justify-content-center">
				{!! $tabela !!}
			</div>
		</div>
		<div class="row">
			<div class="col-12 my-3 text-center">
				<a class="btn btn-success" id="btnContinue" href="{{route('carrinho.concluir')}}">Concluir</a>
				<a class="btn btn-warning" id="btnLimpar" href="{{route('carrinho.limpa')}}">Limpar carrinho</a>
			</div>
		</div>
	@else
		<div class="errorResult">Carrinho de compras vazio!</div>
	@endif
</div>
    

    
    

<script>
function deletaItem(cartid) {
	//alert(cartid);
	document.location.href = '/carrinho/deletar/'+cartid;
	//document.location.href = '_carrinho_deleta.php?cartid='+cartid;
}
</script>


@endsection