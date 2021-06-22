@extends('template.main')

@section("styles")

@endsection

@section('conteudo')
<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 text-center text-lg-left">
        <h2>Obrigado, {{session()->get("cliente")["nome_dono"]}}</h2>
    </div>
</div>
<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 d-flex justify-content-center justify-content-lg-start text-lg-left circulo-passo">
        <p>Confirmação de pedido enviada para: {{session()->get("cliente")["email"]}}</p>
        <p>O número do seu pedido é: 123456</p>
    </div>
</div>
<div class="row justify-content-center justify-content-lg-start mt-5">
    <div class="col-10 col-lg-5 d-flex justify-content-center justify-content-lg-start text-lg-left circulo-passo">
        <p>Clique no botão a seguir para conversarmos sobre o pagamento pelo whatsapp.</p>
    </div>
</div>
<div class="row justify-content-center justify-content-lg-start mt-3">
    <div class="col-10 col-lg-5 d-flex justify-content-center justify-content-lg-start text-lg-left circulo-passo">
        <a href="" class="btn btn-vermelho">Whatsapp</a>
    </div>
</div>
@endsection