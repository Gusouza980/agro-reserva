@extends('template.main')

@section('conteudo')
<div class="container-fluid">
    <div class="row align-items-center" id="row-header-blog" style="background: url({{asset('imagens/banner-blog.jpg')}}); background-size: cover; background-position: top;">
        <div class="col-12 text-center text-header-blog">
            <h1>Fique por dentro das novidades</h1>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #f5f5f5;">
    <div class="w1200 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="container-fluid my-4">
                    <div class="row justify-content-center">
                        <div class="card-noticia mx-2 mt-3">
                            <div class="container-fluid px-0">
                                <div class="row px-0 mx-0">
                                    <div class="col-12 card-noticia-imagem px-0" style="background: url({{asset('imagens/thumb-noticia.jpg')}}); background-size: cover; background-position: center;">

                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-3">
                                    <div class="col-12 px-3 card-noticia-data">
                                        <i class="fas fa-calendar-week mr-2"></i> <span>20 dias atrás</span>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-3">
                                    <div class="col-12 px-3 card-noticia-text">
                                        <h2>CONHEÇA A AGRO RESERVA: UM NOVO MODELO DE NEGÓCIO PARA O AGRO</h2>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-1 mb-3">
                                    <div class="col-12 px-3 card-noticia-text">
                                        <h3>A Agro Reserva é uma empresa nasce com a proposta de ser uma nova modalidade de…</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-noticia mx-2 mt-3">
                            <div class="container-fluid px-0">
                                <div class="row px-0 mx-0">
                                    <div class="col-12 card-noticia-imagem px-0" style="background: url({{asset('imagens/thumb-noticia.jpg')}}); background-size: cover; background-position: center;">

                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-3">
                                    <div class="col-12 px-3 card-noticia-data">
                                        <i class="fas fa-calendar-week mr-2"></i> <span>20 dias atrás</span>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-3">
                                    <div class="col-12 px-3 card-noticia-text">
                                        <h2>CONHEÇA A AGRO RESERVA: UM NOVO MODELO DE NEGÓCIO PARA O AGRO</h2>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-1 mb-3">
                                    <div class="col-12 px-3 card-noticia-text">
                                        <h3>A Agro Reserva é uma empresa nasce com a proposta de ser uma nova modalidade de…</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-noticia mx-2 mt-3">
                            <div class="container-fluid px-0">
                                <div class="row px-0 mx-0">
                                    <div class="col-12 card-noticia-imagem px-0" style="background: url({{asset('imagens/thumb-noticia.jpg')}}); background-size: cover; background-position: center;">

                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-3">
                                    <div class="col-12 px-3 card-noticia-data">
                                        <i class="fas fa-calendar-week mr-2"></i> <span>20 dias atrás</span>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-3">
                                    <div class="col-12 px-3 card-noticia-text">
                                        <h2>CONHEÇA A AGRO RESERVA: UM NOVO MODELO DE NEGÓCIO PARA O AGRO</h2>
                                    </div>
                                </div>
                                <div class="row px-0 mx-0 mt-1 mb-3">
                                    <div class="col-12 px-3 card-noticia-text">
                                        <h3>A Agro Reserva é uma empresa nasce com a proposta de ser uma nova modalidade de…</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
</div>
@endsection