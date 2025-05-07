<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <form wire:submit.prevent='filtrar' class="row">
                <div class="mb-3 col-12 col-md-3">
                    <label for="" class="form-label">Início</label>
                    <input type="date" class="form-control" name="" id="" aria-describedby="helpId" wire:model.defer="inicio">
                </div>
                <div class="mb-3 col-12 col-md-3">
                    <label for="" class="form-label">Início</label>
                    <input type="date" class="form-control" name="" id="" aria-describedby="helpId" wire:model.defer="fim">
                </div>
                <div class="mb-3 col-12 col-md-3 mt-4">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </form>
        </div>
        <hr>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Usuários Online</p>
                                <h4 class="mb-0">{{$analytics["numero_acessos_atuais"]}}</h4>
                            </div>
    
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-laranja align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bx-user font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Novos visitantes ({{ $periodo_texto }})</p>
                                <h4 class="mb-0">{{$analytics["tipos_usuarios"][0]["sessions"]}}</h4>
                            </div>
    
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-laranja align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bx-user font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <p class="text-muted fw-medium">Visitantes Recorrentes ({{ $periodo_texto }})</p>
                                <h4 class="mb-0">{{$analytics["tipos_usuarios"][1]["sessions"]}}</h4>
                            </div>
    
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-laranja align-self-center">
                                <span class="avatar-title">
                                    <i class="bx bx-user font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Acessos ({{ $periodo_texto }})</h4>
                        <ul class="verti-timeline list-unstyled">
                            @foreach($analytics["numero_acessos"] as $acessos)
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">{{\App\Classes\Util::convertStringToDate($acessos[0])}} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                {{$acessos[1]}} Recorrentes e {{$acessos[2]}} Novos
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Principais Referências ({{ $periodo_texto }})</h4>
                        <ul class="verti-timeline list-unstyled">
                            @foreach($analytics["top_referencias"] as $referencia)
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">{{$referencia["url"]}} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                {{$referencia["pageViews"]}} acessos
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-5">Páginas mais visitadas ({{ $periodo_texto }})</h4>
                        <ul class="verti-timeline list-unstyled">
                            @foreach($analytics["paginas_mais_visualizadas"] as $pagina)
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">{{$pagina["url"]}} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                {{$pagina["pageViews"]}} visitantes
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100vh; background-color: rgba(0,0,0,0.45); z-index: 100000;">
        <div class="row justify-content-center align-items-center" style="width: 100%; height: 100vh;">
            <img src="{{ asset('imagens/gif_relogio.gif') }}" style="width: 80px !important;" alt="">
        </div>
    </div>
    
</div>

@push("scripts")
    <script>
        window.addEventListener("loading", (event) => {
            $("#row-estatisticas").hide();
            $("#row-ajax").show();
        });

        window.addEventListener("loaded", (event) => {
            $("#row-estatisticas").show();
            $("#row-ajax").hide();
        });
    </script>
@endpush