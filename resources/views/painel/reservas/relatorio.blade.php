@extends('painel.template.main')

@section('conteudo')
    <div class="row mb-3">
        <div class="col-12">
            <a name="" id="" class="btn btn-primary" href="{{route('painel.fazenda.reservas.relatorio.pdf', ['reserva' => $reserva])}}" role="button">Gerar PDF</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Visitas</p>
                            <h5 class="mt-3">{{$visitas}}</h5>
                        </div>
    
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="far fa-eye font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Vendas Finalizadas</p>
                            <h5 class="mt-3">{{$num_vendas}}</h5>
                        </div>
    
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-handshake font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Valor Total das Vendas</p>
                            <h5 class="mt-3">R${{number_format($valor_vendas, 2, ",", ".")}}</h5>
                        </div>
    
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-money-bill-wave font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Curtidas</p>
                            <h5 class="mt-3">{{$curtidas}}</h5>
                        </div>
    
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-thumbs-up font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Descurtidas</p>
                            <h5 class="mt-3">{{$descurtidas}}</h5>
                        </div>
    
                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="fas fa-thumbs-down font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection