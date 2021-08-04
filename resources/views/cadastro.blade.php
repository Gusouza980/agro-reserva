<!doctype html>
<html lang="pt-BR">

<head>
    <title>Agroreserva</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reserva de gado da fazenda Santa Luzia pela Agro Reserva">
    <meta name="keywords" content="compra de gado, Gado leitero, Compra e venda de gado, Girolando, compra gado leitero, leilão de gado, venda de gado, agropecuária, pecuária">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/cadastro/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W84N3LS');</script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WH89Z553QY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-WH89Z553QY');
    </script>
    <style>
        body {
            background-color: #F2F3F7;
        }
    </style>
</head>

<body>
	<a class="btn-whats d-sm-block" href="https://api.whatsapp.com/send?phone=5514981809051" target="_blank">
    </a>
    <div class="container-fluid px-0" id="topbar">
        <div class="row align-items-center justify-content-center" id="topbar-row">
            <div class="col-12 text-center">
                <img id="logo-topbar" src="{{asset('imagens/logo_agroreserva_leite_escura.svg')}}" alt="Logo Agroreserva">
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex align-items-center justify-content-center" id="pagina-cadastro-corpo">
        <div class="w1200" id="caixa-cadastro">
            <div id="pre-cadastro">
                <div class="row">
                    <div class="col-12" id="caixa-cadastro-section1-text">
                        <h1>Você está no pré-cadastro Agro Reserva. Caso já tenha realizado o pré cadastro com <u>e-mail</u> e <u>senha</u>, <a class="text-primary cpointer" id="botao-pular-pre-cadastro">clique aqui</a> para prosseguir ao cadastro completo.</h1>
                        <br>
                        <p>
                           É uma honra te receber aqui. Agora que você está dentro do novo movimento de compra e venda de animais de alto padrão, prossiga nessa jornada.
                        </p>
                        <p>
                            Para você seguir evoluindo seu rebanho, investindo ou vendendo na nossa plataforma, <b>preencha o formulário de cadastro completo com total segurança</b> e respeito pelas suas informações.<br>
    Uma vez preenchidos, os dados serão revisados e validados pelo nosso departamento de cadastro. <b>Rápido, prático e seguro</b>.
                        </p>
                        <p>
                            Para realizar o cadastro completo, você precisará dos seguintes documentos:
                        </p>
                        <p>
                            RG, CPF, Comprovante de Residência e Certidão de Ônus da Fazenda.
                        </p>
                        <p>
                            Se surgir alguma dúvida, fale com a gente. Sempre tem alguém pronto para te atender.
                        </p>
                        <br>
                        <p>
                            <b>Email:</b> <a href="mailto:cadastro@agroreserva.com.br">cadastro@agroreserva.com.br</a>
                        </p>
                        <p>
                            <b>End.:</b> Av. Getúlio Vargas, 1116, Centro, CEP 38400-435 – Uberlândia/MG
                        </p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="https://api.whatsapp.com/send?phone=5514981809051" class="fa-2x" style="color: #7E8298;"><i class="fab fa-whatsapp"></i></a>
                        <a href="mailto:contato@agroreserva.com.br" class="fa-2x mx-4" style="color: #7E8298;"><i class="far fa-envelope"></i></a>
                        <a href="tel:+5514981809051" class="fa-2x" style="color: #7E8298;"><i class="fas fa-phone"></i></a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="w800 mx-auto" id="caixa-voce-quer">
                            <div class="row">
                                <div class="col-12 caixa-voce-quer-text">
                                    <h1>Você quer:</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input-radio" type="radio" name="interesse" value="Comprar">
                                        <label class="form-check-label ml-2 label-branca">Comprar</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input-radio" type="radio" name="interesse" value="Vender">
                                        <label class="form-check-label ml-2 label-branca">Vender</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-check form-check-inline mt-2">
                                        <input class="form-check-input-radio" type="radio" name="interesse" value="Comprar e Vender">
                                        <label class="form-check-label ml-2 label-branca">Comprar e Vender</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="container-passo1" style="display: none;">
                    <div class="row mt-5" id="caixa-dados">
                        <div class="col-12 col-lg-6 pr-3 mt-4">
                            <div class="form-group">
                                <label for="">Nome Completo</label>
                                <input type="text" class="form-control" name="nome" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 pr-3 mt-4">
                            <div class="form-group">
                                <label for="">Seu whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" id="" aria-describedby="helpId" value="55" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 pl-3 mt-4">
                            <div class="form-group">
                                <label for="">Nome da Fazenda</label>
                                <input type="text" class="form-control" name="fazenda" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 pr-3 mt-4">
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 pr-3 mt-4">
                            <div class="form-group">
                                <label for="">Confirmar Email</label>
                                <input type="email" class="form-control" name="email2" id="confirm-email" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 pl-3 mt-4">
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="password" class="form-control" name="senha" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12" id="caixa-racas-titulo">
                                <h1>Agora, <span class="destaque">indique as raças que mais te interessam.</span></h1>
                            </div>
                        </div>
                    </div>
    
                    <div class="container-fluid mt-3" id="caixa-racas">
                        <div class="row">
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Ângus">
                                    <label class="form-check-label ml-3 label-cinza">Ângus</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Senepol">
                                    <label class="form-check-label ml-3 label-cinza">Senepol</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Guzera">
                                    <label class="form-check-label ml-3 label-cinza">Guzera</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Mangalarga">
                                    <label class="form-check-label ml-3 label-cinza">Mangalarga</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-0 mt-lg-3">
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Gir Leiteiro">
                                    <label class="form-check-label ml-3 label-cinza">Gir Leiteiro</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Jersey">
                                    <label class="form-check-label ml-3 label-cinza">Jersey</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Nelore">
                                    <label class="form-check-label ml-3 label-cinza">Nelore</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-0 mt-lg-3">
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Holandês">
                                    <label class="form-check-label ml-3 label-cinza">Holandês</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Girolando">
                                    <label class="form-check-label ml-3 label-cinza">Girolando</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="form-check form-check-inline mt-2">
                                    <input class="form-check-input-radio input-w25" type="checkbox" name="racas" value="Sindi">
                                    <label class="form-check-label ml-3 label-cinza">Sindi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12" id="caixa-raca-extra">
                                <h1>Sentiu falta de alguma raça?<span class="destaque"> Qual?</span></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-8" id="input-raca-extra">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="raca_extra" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="" id="termos" value="checkedValue">
                                        Confirmo que li e estou ciente dos <a href="{{route('termos')}}" style="text-decoration: underline; color: #E8521B" target="_blank">termos de uso</a> e <a href="{{route('politicas')}}"  style="text-decoration: underline; color: #E8521B" target="_blank">política de privacidade</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="container-fluid mt-5" id="container-cadastro-completo" style="display: none;">
                        <div class="row">
                            <div class="col-12 text-center" id="container-cadastro-completo-titulo">
                                <h1>Preencha os campos a baixo para completar seu cadastro!</h1>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 caixa-cadastro-completo">
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 caixa-cadastro-completo-conteudo">
                                            <h1>Dados Pessoais</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 col-lg-6 pr-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Nome Completo</label>
                                                <input type="text" class="form-control" name="nome_completo" id="" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-3 mt-4">
                                            <div class="form-group">
                                                <label for="">RG</label>
                                                <input type="text" class="form-control" name="rg" id="" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pr-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Data de Nascimento</label>
                                                <input type="date" class="form-control" name="nascimento" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-3 mt-4">
                                            <div class="form-group">
                                                <label for="">CPF/CNPJ</label>
                                                <input type="text" class="form-control" name="documento" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pr-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Estado Civil</label>
                                                <input type="text" class="form-control" name="estado_civil" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Inscrição de Produtor (Opcional)</label>
                                                <input type="text" class="form-control" name="inscricao_produtor_rural" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
                        </div>
    
                        <div class="row mt-5">
                            <div class="col-12 caixa-cadastro-completo">
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 caixa-cadastro-completo-conteudo">
                                            <h1>Dados de Correspondência</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 col-lg-6 pr-3 mt-4">
                                            <div class="form-group">
                                                <label for="">CEP</label>
                                                <input type="text" class="form-control" name="cep" id="" aria-describedby="helpId" placeholder="" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Endereço</label>
                                                <input type="text" class="form-control" name="endereco" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pr-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Número</label>
                                                <input type="text" class="form-control" name="numero" id="" aria-describedby="helpId" placeholder="" maxlength="6">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Complemento (Opcional)</label>
                                                <input type="text" class="form-control" name="complemento" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pl-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <select class="form-control" name="estado" id="">
                                                    @foreach(\App\Models\Estado::all() as $estado)
                                                        <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 pr-3 mt-4">
                                            <div class="form-group">
                                                <label for="">Cidade</label>
                                                <select class="form-control" name="cidade" id="">
                                                    @foreach(\App\Models\Estado::first()->cidades as $cidade)
                                                        <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" class="form-control" name="cidade" id="" aria-describedby="helpId" placeholder="" maxlength="50"> --}}
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
    
    
                            </div>
                        </div>
    
                        <div class="row mt-5">
                            <div class="col-12 caixa-cadastro-completo">
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 caixa-cadastro-completo-conteudo">
                                            <h1>Dados de Referência</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0 mt-5">
                                    <div class="row px-0">
                                        <div class="col-12 caixa-cadastro-completo-conteudo">
                                            <h2>Referência Bancária</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 col-lg-4 mt-4">
                                            <div class="form-group">
                                                <label for="">Banco Principal</label>
                                                <input type="text" class="form-control" name="referencia_bancaria_banco" id="" aria-describedby="helpId" placeholder="Banco, agência e conta" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-4">
                                            <div class="form-group">
                                                <label for="">Gerente</label>
                                                <input type="text" class="form-control" name="referencia_bancaria_gerente" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-4">
                                            <div class="form-group">
                                                <label for="">Telefone</label>
                                                <input type="text" class="form-control input-tel" name="referencia_bancaria_tel" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0 mt-5">
                                    <div class="row px-0">
                                        <div class="col-12 caixa-cadastro-completo-conteudo">
                                            <h2>Referências Comerciais</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">R1</label>
                                                <input type="text" class="form-control" name="referencia_comercial1" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">Telefone</label>
                                                <input type="text" class="form-control input-tel" name="referencia_comercial1_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">R2</label>
                                                <input type="text" class="form-control" name="referencia_comercial2" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">Telefone</label>
                                                <input type="text" class="form-control input-tel" name="referencia_comercial2_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">R3 (Opcional)</label>
                                                <input type="text" class="form-control" name="referencia_comercial3" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">Telefone (Opcional)</label>
                                                <input type="text" class="form-control input-tel" name="referencia_comercial3_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0 mt-5">
                                    <div class="row px-0">
                                        <div class="col-12 caixa-cadastro-completo-conteudo">
                                            <h2>Referências de Cooperativa</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid px-0">
                                    <div class="row px-0">
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">R1 (Opcional)</label>
                                                <input type="text" class="form-control" name="referencia_coorporativa1" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">Telefone (Opcional)</label>
                                                <input type="text" class="form-control input-tel" name="referencia_coorporativa1_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">R2 (Opcional)</label>
                                                <input type="text" class="form-control" name="referencia_coorporativa2" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 mt-4">
                                            <div class="form-group">
                                                <label for="">Telefone (Opcional)</label>
                                                <input type="text" class="form-control input-tel" name="referencia_coorporativa2_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div id="botoes-cadastrar">
                                    <button id="btn-cadastro">Cadastrar</button>
                                </div>
                                <div id="botoes-comprar" style="display: none;">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 px-0 text-center">
                                                <button id="btn-finalizar-cadastro-agora">Finalizar cadastro agora</button>
                                                <br class="d-lg-none">
                                                <a href="/"><button id="btn-aguardar-contato" class="ml-0 mt-4 mt-lg-0 ml-lg-5">Aguardar contato</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="botoes-vender" style="display: none;">
                                    <a href="/"><button id="btn-finalizar-cadastro-agora">Finalizar</button></a>
                                </div>
                                <div id="gif-ajax" class="text-center" style="display: none;">
                                    <img id="ajax-loading" src="{{asset('imagens/gif_relogio.gif')}}" style="width: 60px;" alt="">
                                </div>
                                <div id="botoes-finalizar" style="display: none;">
                                    <button id="btn-finalizar">Finalizar cadastro</button>
                                </div>
                                <div id="botoes-voltar" style="display: none;">
                                    <a href="/"><button id="btn-voltar">Voltar ao site</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid" id="cadastro-completo-direto" style="display:none;">
                <div class="container-fluid mt-5" id="cadastro-completo-direto-email">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-lg-6 pr-3 mt-4">
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="text" class="form-control" name="email_direto" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12 col-lg-6 pr-3 mt-4">
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="password" class="form-control" name="senha_direto" id="" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-5" id="container-cadastro-completo-direto" style="display:none;">
                    <div class="row">
                        <div class="col-12 text-center" id="container-cadastro-completo-titulo">
                            <h1>Preencha os campos a baixo para completar seu cadastro!</h1>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 caixa-cadastro-completo">
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 caixa-cadastro-completo-conteudo">
                                        <h1>Dados Pessoais</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <input type="hidden" name="email_completo_direto" id="email_completo_direto" val="">
                                    <div class="col-12 col-lg-6 pr-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Nome Completo</label>
                                            <input type="text" class="form-control" name="nome_completo" id="nome_completo_direto" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pl-3 mt-4">
                                        <div class="form-group">
                                            <label for="">RG</label>
                                            <input type="text" class="form-control" name="rg" id="" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pr-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Data de Nascimento</label>
                                            <input type="date" class="form-control" name="nascimento" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pl-3 mt-4">
                                        <div class="form-group">
                                            <label for="">CPF/CNPJ</label>
                                            <input type="text" class="form-control" name="documento" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pr-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Estado Civil</label>
                                            <input type="text" class="form-control" name="estado_civil" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pl-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Inscrição de Produtor (Opcional)</label>
                                            <input type="text" class="form-control" name="inscricao_produtor_rural" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 caixa-cadastro-completo">
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 caixa-cadastro-completo-conteudo">
                                        <h1>Dados de Correspondência</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 col-lg-6 pr-3 mt-4">
                                        <div class="form-group">
                                            <label for="">CEP</label>
                                            <input type="text" class="form-control" name="cep" id="" aria-describedby="helpId" placeholder="" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pl-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Endereço</label>
                                            <input type="text" class="form-control" name="endereco" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pr-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Número</label>
                                            <input type="text" class="form-control" name="numero" id="" aria-describedby="helpId" placeholder="" maxlength="6">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pl-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Complemento (Opcional)</label>
                                            <input type="text" class="form-control" name="complemento" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pl-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select class="form-control" name="estado" id="estado_direto">
                                                @foreach(\App\Models\Estado::all() as $estado)
                                                    <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 pr-3 mt-4">
                                        <div class="form-group">
                                            <label for="">Cidade</label>
                                            <select class="form-control" name="cidade" id="cidade_direto">
                                                @foreach(\App\Models\Estado::first()->cidades as $cidade)
                                                    <option value="{{$cidade->id}}">{{$cidade->nome}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control" name="cidade" id="" aria-describedby="helpId" placeholder="" maxlength="50"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 caixa-cadastro-completo">
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 caixa-cadastro-completo-conteudo">
                                        <h1>Dados de Referência</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0 mt-5">
                                <div class="row px-0">
                                    <div class="col-12 caixa-cadastro-completo-conteudo">
                                        <h2>Referência Bancária</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 col-lg-4 mt-4">
                                        <div class="form-group">
                                            <label for="">Banco Principal</label>
                                            <input type="text" class="form-control" name="referencia_bancaria_banco" id="" aria-describedby="helpId" placeholder="Banco, agência e conta" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-4">
                                        <div class="form-group">
                                            <label for="">Gerente</label>
                                            <input type="text" class="form-control" name="referencia_bancaria_gerente" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 mt-4">
                                        <div class="form-group">
                                            <label for="">Telefone</label>
                                            <input type="text" class="form-control" name="referencia_bancaria_tel" id="" aria-describedby="helpId" placeholder="" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0 mt-5">
                                <div class="row px-0">
                                    <div class="col-12 caixa-cadastro-completo-conteudo">
                                        <h2>Referências Comerciais</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">R1</label>
                                            <input type="text" class="form-control" name="referencia_comercial1" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">Telefone</label>
                                            <input type="text" class="form-control" name="referencia_comercial1_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">R2</label>
                                            <input type="text" class="form-control" name="referencia_comercial2" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">Telefone</label>
                                            <input type="text" class="form-control" name="referencia_comercial2_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">R3 (Opcional)</label>
                                            <input type="text" class="form-control" name="referencia_comercial3" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">Telefone (Opcional)</label>
                                            <input type="text" class="form-control" name="referencia_comercial3_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0 mt-5">
                                <div class="row px-0">
                                    <div class="col-12 caixa-cadastro-completo-conteudo">
                                        <h2>Referências de Cooperativa</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid px-0">
                                <div class="row px-0">
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">R1 (Opcional)</label>
                                            <input type="text" class="form-control" name="referencia_coorporativa1" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">Telefone (Opcional)</label>
                                            <input type="text" class="form-control" name="referencia_coorporativa1_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">R2 (Opcional)</label>
                                            <input type="text" class="form-control" name="referencia_coorporativa2" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-4">
                                        <div class="form-group">
                                            <label for="">Telefone (Opcional)</label>
                                            <input type="text" class="form-control" name="referencia_coorporativa2_tel" id="" aria-describedby="helpId" placeholder="" maxlength="255">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div id="botoes-prosseguir">
                                <button id="btn-prosseguir">Prosseguir</button>
                            </div>
                            <div id="botoes-vender-direto" style="display: none;">
                                <a href="/"><button id="btn-finalizar-cadastro-agora">Finalizar</button></a>
                            </div>
                            <div id="gif-ajax-direto" class="text-center" style="display: none;">
                                <img id="ajax-loading" src="{{asset('imagens/gif_relogio.gif')}}" style="width: 60px;" alt="">
                            </div>
                            <div id="botoes-finalizar-direto" style="display: none;">
                                <button id="btn-finalizar-direto">Finalizar cadastro</button>
                            </div>
                            <div id="botoes-voltar-direto" style="display: none;">
                                <a href="/"><button id="btn-voltar">Voltar ao site</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPrecadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 500px;" role="document">
            <div class="modal-content" style="padding: 0px 0 30px 0; border-radius: 20px;">

                <div class="modal-body px-4 py-0">
                    <button type="button" id="close-modal" class="close cpointer" data-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px; z-index: 9;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{asset('imagens/icone_pre_cadastro.png')}}" style="width: 100px;" alt="Ícone de Pré Cadastro">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h1>Quase lá!</h1>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h2>Pré-cadastro realizado com sucesso!</h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h3>Em breve nosso time entrará em contato para finalizar o cadastro completo.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 500px;" role="document">
            <div class="modal-content" style="padding: 0px 0 30px 0; border-radius: 20px;">

                <div class="modal-body px-4 py-0">
                    <button type="button" id="close-modal" class="close cpointer" data-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px; z-index: 9;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{asset('imagens/icone_cadastro.png')}}" style="width: 100px;" alt="Ícone de Cadastro">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h1>Tudo certo !</h1>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h2>Seu cadastro foi realizado com sucesso!</h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h3>Nossa equipe de cadastro irá processar suas informações e retornaremos em breve.</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h4>Logo logo, você já estará habilitado para desfrutar dos melhores animais.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 500px;" role="document">
            <div class="modal-content" style="padding: 0px 0 30px 0; border-radius: 20px;">

                <div class="modal-body px-5 pt-0 pb-4">
                    <button type="button" id="close-modal" class="close cpointer" data-dismiss="modal" aria-label="Close" style="position: absolute; top: 10px; right: 10px; z-index: 9;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{asset('imagens/icone_erro.png')}}" style="width: 100px;" alt="Ícone de Cadastro">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center modal-erro-text">
                                <h1>Ops !</h1>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h2 id="titulo-erro-modal">Seu cadastro foi realizado com sucesso!</h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h3 id="subtitulo-erro-modal">asdasdasdasd</h3>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center modal-precadastro-text">
                                <h4 id="texto-erro-modal">Caso tenha algum problema, entre em contato com um consultor.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script>

        function login() {
            if ($('input[name=email_direto]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=email_direto]").offset().top - 200 }, 1000);
                $('input[name=email_direto]').addClass("erro-validacao");
                return false;
            }
            if ($('input[name=senha_direto]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=senha_direto]").offset().top - 200 }, 1000);
                $('input[name=senha_direto]').addClass("erro-validacao");
                return false;
            }

            var email = $('input[name=email_direto]').val();
            var senha = $('input[name=senha_direto]').val();

        
            data = {
                email: email,
                senha: senha,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{!! route('cadastro.login') !!}",
                data: data,
                beforeSend: function () {
                    $("#botoes-prosseguir").hide();
                    $("#gif-ajax-direto").show();
                },
                success: function (ret) {
                    if(ret == "001"){
                        $("#titulo-erro-modal").html("E-mail não cadastrado");
                        $("#subtitulo-erro-modal").html("Realize seu pré-cadastro ou cadastro completo.");
                        $("#modalErro").modal("show");
                        $("#botoes-prosseguir").show();
                        $("#gif-ajax-direto").hide();
                        console.log("Deu ruim");
                    }else if(ret == "002"){
                        $("#titulo-erro-modal").html("E-mail ou senha incorretos");
                        $("#subtitulo-erro-modal").html("Verifique as informações inseridas e tente novamente.");
                        $("#modalErro").modal("show");
                        $("#botoes-prosseguir").show();
                        $("#gif-ajax-direto").hide();
                        console.log("Deu ruim");
                    }else{
                        var cliente = JSON.parse(ret);
                        $("#gif-ajax-direto").hide();
                        $("#cadastro-completo-direto-email").slideUp(400, function(){
                            $("#container-cadastro-completo-direto").slideDown(400, function(){
                                $("#botoes-finalizar-direto").show();
                            });
                        });
                        $("#email_completo_direto").val(cliente.email);
                        $("#nome_completo_direto").val(cliente.nome_dono);
                    }
                },
                error: function (ret) {
                    console.log("Deu muito ruim");
                    console.log(ret);
                }
                // dataType: dataType
            });
        }

        function precadastro() {
            if(!$("#termos").is(":checked")){
                $("#titulo-erro-modal").html("Falta pouco");
                $("#subtitulo-erro-modal").html("Você precisa confirmar que está ciente dos termos de compromisso e política de privacidade para continuar.");
                $("#modalErro").modal("show");
                return false;
            }

            if ($('input[name=nome]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=nome]").offset().top - 200 }, 1000);
                $('input[name=nome]').addClass("erro-validacao");
                return false;
            }
            if ($('input[name=senha]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=senha]").offset().top - 200 }, 1000);
                $('input[name=senha]').addClass("erro-validacao");
                return false;
            }
            if ($('input[name=sobrenome]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=sobrenome]").offset().top - 200 }, 1000);
                $('input[name=sobrenome]').addClass("erro-validacao");
                return false;
            }
            if ($('input[name=email]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=email]").offset().top - 200 }, 1000);
                $('input[name=email]').addClass("erro-validacao");
                return false;
            }
            if ($('input[name=whatsapp]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=whatsapp]").offset().top - 200 }, 1000);
                $('input[name=whatsapp]').addClass("erro-validacao");
                return false;
            }

            
            if ($('input[name=email]').val() != $('input[name=email2]').val()) {
                alert("Os emails não coincidem");
                return false;
            }

            var nome = $('input[name=nome]').val();
            var email = $('input[name=email]').val();
            var whatsapp = $('input[name=whatsapp]').val();
            var interesse = $('input[name=interesse]:checked').val();
            var fazenda = $('input[name=fazenda]').val();
            var senha = $('input[name=senha]').val();

            var racas = [];
            
            $('input[name=racas]:checked').each(function () {
                racas.push($(this).val());
            });

            if ($("input[name='raca_extra']").val().length > 0) {
                racas.push($("input[name='raca_extra']").val());
            }

            racas.push(" ");

            data = {
                nome: nome,
                email: email,
                whatsapp: whatsapp,
                interesse: interesse,
                fazenda: fazenda,
                senha: senha,
                racas: racas
            }
            
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                type: "POST",
                url: "{!! route('cadastro.salvar') !!}",
                data: data,
                beforeSend: function () {
                    $("input").each(function () {
                        $(this).removeClass("erro-validacao");
                    });
                    $("#botoes-cadastrar").hide();
                    $("#botoes-comprar").hide();
                    $("#botoes-vender").hide();
                    $("#gif-ajax").show();
                },
                success: function (ret) {
                    if(ret == "001"){
                        $("#titulo-erro-modal").html("E-mail já cadastrado");
                        $("#subtitulo-erro-modal").html("Se já tiver realizado o pré-cadastro utilze o link no início da página para continuar para o cadastro completo.");
                        $("#modalErro").modal("show");
                        return;
                    }
                    if (ret == "200") {
                        console.log("sucesso")
                        $("input").each(function () {
                            $(this).removeClass("erro-validacao");
                        });
                        if ($("input[name='interesse']:checked").val() != "Vender") {
                            $("#gif-ajax").hide();
                            $("#botoes-cadastrar").hide();
                            $("#modalPrecadastro").modal("show");
                            $("#botoes-comprar").show();
                            $("#botoes-vender").hide();
                        } else {
                            $("#gif-ajax").hide();
                            $("#botoes-cadastrar").hide();
                            $("#modalPrecadastro").modal("show");
                            $("#botoes-vender").show();
                            $("#botoes-comprar").hide();
                        }
                    } else {
                        console.log(ret);
                    }

                },
                error: function (ret) {
                }
                // dataType: dataType
            });
        }

        function cadastro() {

            if ($('input[name=nome_completo]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=nome_completo]").offset().top - 200 - 200 }, 1000);
                $('input[name=nome_completo]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=rg]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=rg]").offset().top - 200 }, 1000);
                $('input[name=rg]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=nascimento]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=nascimento]").offset().top - 200 }, 1000);
                $('input[name=nascimento]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=documento]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=documento]").offset().top - 200 }, 1000);
                $('input[name=documento]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=estado_civil]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=estado_civil]").offset().top - 200 }, 1000);
                $('input[name=estado_civil]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=cep]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=cep]").offset().top - 200 }, 1000);
                $('input[name=cep]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=numero]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=numero]").offset().top - 200 }, 1000);
                $('input[name=numero]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=cidade]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=cidade]").offset().top - 200 }, 1000);
                $('input[name=cidade]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=estado]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=estado]").offset().top - 200 }, 1000);
                $('input[name=estado]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=referencia_bancaria_banco]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_bancaria_banco]").offset().top - 200 }, 1000);
                $('input[name=referencia_bancaria_banco]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=referencia_bancaria_gerente]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_bancaria_gerente]").offset().top - 200 }, 1000);
                $('input[name=referencia_bancaria_gerente]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=referencia_bancaria_tel]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_bancaria_tel]").offset().top - 200 }, 1000);
                $('input[name=referencia_bancaria_tel]').addClass("erro-validacao");
                return false;
            }
            //
            if ($('input[name=referencia_comercial1]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_comercial1]").offset().top - 200 }, 1000);
                $('input[name=referencia_comercial1]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=referencia_comercial1_tel]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_comercial1_tel]").offset().top - 200 }, 1000);
                $('input[name=referencia_comercial1_tel]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=referencia_comercial2]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_comercial2]").offset().top - 200 }, 1000);
                $('input[name=referencia_comercial2]').addClass("erro-validacao");
                return false;
            }

            if ($('input[name=referencia_comercial2_tel]').val() == "") {
                $('html, body').animate({ scrollTop: $("input[name=referencia_comercial2_tel]").offset().top - 200 }, 1000);
                $('input[name=referencia_comercial2_tel]').addClass("erro-validacao");
                return false;
            }

            var email = $('input[name=email]').val();
            var nome_completo = $('input[name=nome_completo]').val();
            var rg = $('input[name=rg]').val();
            var nascimento = $('input[name=nascimento]').val();
            var documento = $('input[name=documento]').val();
            var estado_civil = $('input[name=estado_civil]').val();
            var inscricao_produtor_rural = $('input[name=inscricao_produtor_rural]').val();
            var cep = $('input[name=cep]').val();
            var endereco = $('input[name=endereco]').val();
            var numero = $('input[name=numero]').val();
            var complemento = $('input[name=complemento]').val();
            var cidade = $('input[name=cidade]').val();
            var estado = $('input[name=estado]').val();
            var referencia_bancaria_banco = $('input[name=referencia_bancaria_banco]').val();
            var referencia_bancaria_gerente = $('input[name=referencia_bancaria_gerente]').val();
            var referencia_bancaria_tel = $('input[name=referencia_bancaria_tel]').val();
            var referencia_comercial1 = $('input[name=referencia_comercial1]').val();
            var referencia_comercial1_tel = $('input[name=referencia_comercial1_tel]').val();
            var referencia_comercial2 = $('input[name=referencia_comercial2]').val();
            var referencia_comercial2_tel = $('input[name=referencia_comercial2_tel]').val();
            var referencia_comercial3 = $('input[name=referencia_comercial3]').val();
            var referencia_comercial3_tel = $('input[name=referencia_comercial3_tel]').val();
            var referencia_coorporativa1 = $('input[name=referencia_coorporativa1]').val();
            var referencia_coorporativa1_tel = $('input[name=referencia_coorporativa1_tel]').val();
            var referencia_coorporativa2 = $('input[name=referencia_coorporativa2]').val();
            var referencia_coorporativa2_tel = $('input[name=referencia_coorporativa2_tel]').val();

            data = {
                email: email,
                nome_completo: nome_completo,
                rg: rg,
                nascimento: nascimento,
                documento: documento,
                estado_civil: estado_civil,
                inscricao_produtor_rural: inscricao_produtor_rural,
                cep: cep,
                endereco: endereco,
                numero: numero,
                complemento: complemento,
                cidade: cidade,
                estado: estado,
                referencia_bancaria_banco: referencia_bancaria_banco,
                referencia_bancaria_gerente: referencia_bancaria_gerente,
                referencia_bancaria_tel: referencia_bancaria_tel,
                referencia_comercial1: referencia_comercial1,
                referencia_comercial1_tel: referencia_comercial1_tel,
                referencia_comercial2: referencia_comercial2,
                referencia_comercial2_tel: referencia_comercial2_tel,
                referencia_comercial3: referencia_comercial3,
                referencia_comercial3_tel: referencia_comercial3_tel,
                referencia_coorporativa1: referencia_coorporativa1,
                referencia_coorporativa1_tel: referencia_coorporativa1_tel,
                referencia_coorporativa2: referencia_coorporativa2,
                referencia_coorporativa2_tel: referencia_coorporativa2_tel,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{!! route('cadastro.finalizar') !!}",
                data: data,
                beforeSend: function () {
                    $("#botoes-finalizar").hide();
                    $("#gif-ajax").show();
                    $("input").each(function () {
                        $(this).removeClass("erro-validacao");
                    });
                },
                success: function (ret) {
                    $("input").each(function () {
                        $(this).removeClass("erro-validacao");
                    });
                    if (ret == "Sucesso") {
                        console.log("sucesso")
                        $("#gif-ajax").hide();
                        $("#botoes-voltar").show();
                        $("#modalCadastro").modal("show");
                    } else {
                        console.log(ret);
                        $("#gif-ajax").hide();
                        $("#botoes-finalizar").show();
                    }
                },
                error: function (ret) {
                    console.log(ret);
                }
                // dataType: dataType
            });
        }

        function cadastro_direto() {

            if ($('#container-cadastro-completo-direto input[name=nome_completo]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=nome_completo]").offset().top - 200 - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=nome_completo]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=rg]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=rg]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=rg]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=nascimento]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=nascimento]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=nascimento]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=documento]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=documento]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=documento]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=estado_civil]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=estado_civil]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=estado_civil]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=cep]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=cep]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=cep]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=numero]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=numero]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=numero]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=cidade]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=cidade]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=cidade]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=estado]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=estado]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=estado]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=referencia_bancaria_banco]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_bancaria_banco]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_bancaria_banco]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=referencia_bancaria_gerente]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_bancaria_gerente]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_bancaria_gerente]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=referencia_bancaria_tel]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_bancaria_tel]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_bancaria_tel]').addClass("erro-validacao");
                return false;
            }
            //
            if ($('#container-cadastro-completo-direto input[name=referencia_comercial1]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_comercial1]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_comercial1]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=referencia_comercial1_tel]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_comercial1_tel]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_comercial1_tel]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=referencia_comercial2]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_comercial2]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_comercial2]').addClass("erro-validacao");
                return false;
            }

            if ($('#container-cadastro-completo-direto input[name=referencia_comercial2_tel]').val() == "") {
                $('html, body').animate({ scrollTop: $("#container-cadastro-completo-direto input[name=referencia_comercial2_tel]").offset().top - 200 }, 1000);
                $('#container-cadastro-completo-direto input[name=referencia_comercial2_tel]').addClass("erro-validacao");
                return false;
            }

            var email = $('#email_completo_direto').val();
            var nome_completo = $('#container-cadastro-completo-direto input[name=nome_completo]').val();
            var rg = $('#container-cadastro-completo-direto input[name=rg]').val();
            var nascimento = $('#container-cadastro-completo-direto input[name=nascimento]').val();
            var documento = $('#container-cadastro-completo-direto input[name=documento]').val();
            var estado_civil = $('#container-cadastro-completo-direto input[name=estado_civil]').val();
            var inscricao_produtor_rural = $('#container-cadastro-completo-direto input[name=inscricao_produtor_rural]').val();
            var cep = $('#container-cadastro-completo-direto input[name=cep]').val();
            var endereco = $('#container-cadastro-completo-direto input[name=endereco]').val();
            var numero = $('#container-cadastro-completo-direto input[name=numero]').val();
            var complemento = $('#container-cadastro-completo-direto input[name=complemento]').val();
            var cidade = $('#container-cadastro-completo-direto select[name=cidade]').val();
            var estado = $('#container-cadastro-completo-direto select[name=estado]').val();
            var referencia_bancaria_banco = $('#container-cadastro-completo-direto input[name=referencia_bancaria_banco]').val();
            var referencia_bancaria_gerente = $('#container-cadastro-completo-direto input[name=referencia_bancaria_gerente]').val();
            var referencia_bancaria_tel = $('#container-cadastro-completo-direto input[name=referencia_bancaria_tel]').val();
            var referencia_comercial1 = $('#container-cadastro-completo-direto input[name=referencia_comercial1]').val();
            var referencia_comercial1_tel = $('#container-cadastro-completo-direto input[name=referencia_comercial1_tel]').val();
            var referencia_comercial2 = $('#container-cadastro-completo-direto input[name=referencia_comercial2]').val();
            var referencia_comercial2_tel = $('#container-cadastro-completo-direto input[name=referencia_comercial2_tel]').val();
            var referencia_comercial3 = $('#container-cadastro-completo-direto input[name=referencia_comercial3]').val();
            var referencia_comercial3_tel = $('#container-cadastro-completo-direto input[name=referencia_comercial3_tel]').val();
            var referencia_coorporativa1 = $('#container-cadastro-completo-direto input[name=referencia_coorporativa1]').val();
            var referencia_coorporativa1_tel = $('#container-cadastro-completo-direto input[name=referencia_coorporativa1_tel]').val();
            var referencia_coorporativa2 = $('#container-cadastro-completo-direto input[name=referencia_coorporativa2]').val();
            var referencia_coorporativa2_tel = $('#container-cadastro-completo-direto input[name=referencia_coorporativa2_tel]').val();

            data = {
                email: email,
                nome_completo: nome_completo,
                rg: rg,
                nascimento: nascimento,
                documento: documento,
                estado_civil: estado_civil,
                inscricao_produtor_rural: inscricao_produtor_rural,
                cep: cep,
                endereco: endereco,
                numero: numero,
                complemento: complemento,
                cidade: cidade,
                estado: estado,
                referencia_bancaria_banco: referencia_bancaria_banco,
                referencia_bancaria_gerente: referencia_bancaria_gerente,
                referencia_bancaria_tel: referencia_bancaria_tel,
                referencia_comercial1: referencia_comercial1,
                referencia_comercial1_tel: referencia_comercial1_tel,
                referencia_comercial2: referencia_comercial2,
                referencia_comercial2_tel: referencia_comercial2_tel,
                referencia_comercial3: referencia_comercial3,
                referencia_comercial3_tel: referencia_comercial3_tel,
                referencia_coorporativa1: referencia_coorporativa1,
                referencia_coorporativa1_tel: referencia_coorporativa1_tel,
                referencia_coorporativa2: referencia_coorporativa2,
                referencia_coorporativa2_tel: referencia_coorporativa2_tel,
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{!! route('cadastro.finalizar') !!}",
                data: data,
                beforeSend: function () {
                    $("#botoes-finalizar-direto").hide();
                    $("#gif-ajax-direto").show();
                    $("input").each(function () {
                        $(this).removeClass("erro-validacao");
                    });
                },
                success: function (ret) {
                    $("input").each(function () {
                        $(this).removeClass("erro-validacao");
                    });
                    if (ret == "Sucesso") {
                        console.log("sucesso")
                        $("#gif-ajax-direto").hide();
                        $("#botoes-voltar-direto").show();
                        $("#modalCadastro").modal("show");
                    } else {
                        console.log(ret);
                        $("#gif-ajax-direto").hide();
                        $("#botoes-finalizar-direto").show();
                    }
                },
                error: function (ret) {
                    console.log(ret);
                    $("#gif-ajax-direto").hide();
                    $("#botoes-finalizar-direto").show();
                }
                // dataType: dataType
            });
        }


        $(document).ready(function () {
            $("input[name='cep']").mask("99999-999");
            $("input[name='whatsapp']").mask("+99 (99) 99999-9999");
            $(".input-tel").mask("(99) 99999-9999");

            const myInput = document.getElementById("confirm-email");
            myInput.onpaste = e => e.preventDefault();
            
            $("#botao-pular-pre-cadastro").click(function(){
                $("#pre-cadastro").slideUp(400, function(){
                    $("#cadastro-completo-direto").slideDown(800);
                });
            });

            $("#btn-prosseguir").click(function(){
                login();
            });

            $("input[name='interesse']").change(function () {
                $("#container-passo1").slideDown(500, function(){
					$('html, body').animate({ scrollTop: $("#container-passo1").offset().top - 100 }, 1000);
				});
            });

            $("#btn-cadastro").click(function () {
                precadastro();
            });

            $("#btn-finalizar-cadastro-agora").click(function () {
                $("#botoes-comprar").hide(function () {
                    $("#botoes-finalizar").show();
                    $("#container-cadastro-completo").slideDown("500", function(){
						$('html, body').animate({ scrollTop: $("#container-cadastro-completo").offset().top - 100 }, 1000);
					});
                    $('input[name=nome_completo]').val($('input[name=nome]').val());
                    $('input[name=email]').attr("readonly", "readonly");
                    $('input[name=nome]').attr("readonly", "readonly");
                    $('input[name=email2]').attr("readonly", "readonly");
                    $('input[name=whatsapp]').attr("readonly", "readonly");
                    $('input[name=senha]').attr("readonly", "readonly");
                    $('input[name=fazenda]').attr("readonly", "readonly");
                });
            });

            $("#btn-finalizar").click(function () {
                cadastro();
            });

            $("#btn-finalizar-direto").click(function () {
                cadastro_direto();
            });

            $("select[name='estado']").change(function(){
                var estado = $("select[name='estado']").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/api/getCidadesByUf/' + estado,
                    dataType: 'json',
                    success: function (data) {
                        html = "";
                        var cidades = JSON.parse(data);
                        for(var cidade in cidades){
                            html += "<option value='"+cidades[cidade].id+"'>"+cidades[cidade].nome+"</option>"
                        }
                        $("select[name='cidade']").each(function(){
                            $(this).html(html);
                        })
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            $("#estado_direto").change(function(){
                var estado = $("#estado_direto").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: '/api/getCidadesByUf/' + estado,
                    dataType: 'json',
                    success: function (data) {
                        html = "";
                        var cidades = JSON.parse(data);
                        for(var cidade in cidades){
                            html += "<option value='"+cidades[cidade].id+"'>"+cidades[cidade].nome+"</option>"
                        }
                        $("#cidade_direto").html(html);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W84N3LS" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>