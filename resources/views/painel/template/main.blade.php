<!doctype html>
<html lang="en">

    
<head>
        
        <meta charset="utf-8" />
        <title>Agroreserva - Painel Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Painel Administrativo da Agroreserva" name="description" />
        <meta content="Luis Gustavo de Souza Carvalho" name="author" />
        <meta name="_token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}?v=1.1" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        @livewireStyles
        @yield("styles")
        @stack('styles')
        <link href="{{asset('admin/css/app.min.css')}}?v=1.4" id="app-style" rel="stylesheet" type="text/css" />
        @toastr_css
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{route('painel.index')}}" class="logo logo-light">
                                <span class="text-white logo-sm">
                                    <i class="fas fa-clock fa-2x"></i>
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('imagens/logo_agroreserva_leite.svg')}}" style="width: 100%; max-width: 100px;">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="px-3 btn btn-sm font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        {{--  <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                                aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#!" class="small" key="t-view-all"> View All</a>
                                        </div>
                                    </div>
                                </div>
                                <div data-simplebar style="max-height: 230px;">
                                    <a href="#" class="text-reset notification-item">
                                        <div class="media">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                    <i class="bx bx-cart"></i>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mt-0 mb-1" key="t-your-order">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <div class="p-2 border-top d-grid">
                                    <a class="text-center btn btn-sm btn-link font-size-14" href="javascript:void(0)">
                                        <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                                    </a>
                                </div>
                            </div>
                        </div>  --}}

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{session()->get("admin")["nome"]}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item cpointer" data-bs-toggle="modal" data-bs-target="#modalAlteraSenha"><i class="align-middle bx bx-key font-size-16 me-1"></i> <span key="t-profile">Alterar Senha</span></a>
                                <div class="dropdown-divider"></div> 
                                <a class="dropdown-item text-danger" href="{{route('painel.sair')}}"><i class="align-middle bx bx-power-off font-size-16 me-1 text-danger"></i> <span key="t-logout">Sair</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>

                            {{-- CLIENTES --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.usuarios")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-user"></i>
                                        <span key="t-dashboards">Usuários</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.usuarios') }}" key="t-saas">Consultar</a></li>
                                        {{-- <li><a href="{{ route('painel.vendedores') }}" key="t-saas">Vendedores</a></li> --}}
                                    </ul>
                                </li>
                            @endif

                            {{-- CLIENTES --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.marketplaces")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-store"></i>
                                        <span key="t-dashboards">Marketplace</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.marketplace.vendedores') }}" key="t-saas">Vendedores</a></li>
                                        {{-- <li><a href="{{ route('painel.vendedores') }}" key="t-saas">Vendedores</a></li> --}}
                                    </ul>
                                </li>
                            @endif

                            {{-- CLIENTES --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.clientes")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-user"></i>
                                        <span key="t-dashboards">Clientes</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.clientes') }}" key="t-saas">Consultar</a></li>
                                        {{-- <li><a href="{{ route('painel.vendedores') }}" key="t-saas">Vendedores</a></li> --}}
                                    </ul>
                                </li>
                            @endif

                            {{-- FAZENDAS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.fazendas")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-tractor"></i>
                                        <span key="t-dashboards">Fazendas</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{route('painel.reservas')}}" key="t-saas">Reservas</a></li>
                                        <li><a href="{{ route('painel.fazendas') }}" key="t-saas">Consultar</a></li>
                                    </ul>
                                </li>
                            @endif

                            {{-- NOTICIAS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.noticias")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="far fa-sticky-note" aria-hidden="true"></i>
                                        <span key="t-dashboards">Notícias</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.noticias') }}" key="t-default">Cadastros</a></li>
                                        <li><a href="{{ route('painel.categorias') }}" key="t-default">Categorias</a></li>
                                    </ul>
                                </li>
                            @endif

                            {{-- RAÇAS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.racas")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-horse-head"></i>
                                        <span key="t-dashboards">Raças</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.racas') }}" key="t-saas">Consultar</a></li>
                                    </ul>
                                </li>
                            @endif

                            {{-- ASSESSORES --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.assessores")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-user-tie"></i>
                                        <span key="t-dashboards">Assessores</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.assessores') }}" key="t-saas">Consultar</a></li>
                                    </ul>
                                </li>
                            @endif

                            {{-- ASSESSORES --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.assessores")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-user-tie"></i>
                                        <span key="t-dashboards">Provas Sociais</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.provas_sociais') }}" key="t-saas">Consultar</a></li>
                                    </ul>
                                </li>
                            @endif
                            
                            {{-- VISITAS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.visitas")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-user"></i>
                                        <span key="t-dashboards">Visitas</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.visitas') }}" key="t-saas">Consultar</a></li>
                                    </ul>
                                </li>
                            @endif
                            
                            {{-- VENDAS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.vendas")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-money-bill-alt"></i>
                                        <span key="t-dashboards">Vendas</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.vendas') }}" key="t-saas">Consultar</a></li>
                                        <li><a href="{{ route('painel.vendas.lotes') }}" key="t-saas">Lotes</a></li>
                                        <li><a href="{{ route('painel.compradores') }}" key="t-saas">Compradores</a></li>
                                    </ul>
                                </li>
                            @endif

                            {{-- CARRINHOS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.carrinhos")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span key="t-dashboards">Carrinhos</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.carrinhos.abertos') }}" key="t-saas">Abertos</a></li>
                                    </ul>
                                </li>
                            @endif

                            {{-- POPUPS --}}
                            @if(in_array(session()->get("admin")["acesso"], config("acessos.popups")["consulta"]))
                                <li>
                                    <a href="javascript: void(0);" class="waves-effect">
                                        <i class="fas fa-bullhorn"></i>
                                        <span key="t-dashboards">Popups</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('painel.popups') }}" key="t-saas">Consultar</a></li>
                                    </ul>
                                </li>
                            @endif
                            
                            <li>
                                <a href="javascript: void(0);" class="waves-effect">
                                    <i class="fas fa-cog"></i>
                                    <span key="t-dashboards">Configurações</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    {{-- LIVE --}}
                                    @if(in_array(session()->get("admin")["acesso"], config("acessos.live")["consulta"]))
                                        <li><a href="{{ route('painel.configuracoes.live') }}" key="t-saas">Live</a></li>
                                    @endif

                                    {{-- BANNERS --}}
                                    @if(in_array(session()->get("admin")["acesso"], config("acessos.banners")["consulta"]))
                                        <li><a href="{{ route('painel.configuracoes.home.banners') }}" key="t-saas">Banners</a></li>
                                    @endif
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">@yield("titulo")</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        @yield("conteudo")                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Agroreserva.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <div class="modal fade" id="modalAlteraSenha" tabindex="-1" role="dialog"
            aria-labelledby="modalAlteraSenhaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAlteraSenhaLabel">Alteração de Senha</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('painel.usuarios.senha.alterar') }}"
                            method="post">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="senha_antiga">Senha Antiga</label>
                                <input type="password" class="form-control" name="senha_antiga"
                                    value="" required>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="senha_nova">Senha Nova</label>
                                <input type="password" class="form-control" name="senha_nova"
                                    value="" required>
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="mt-3 btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @livewire("painel.popup-mensagem")

        <!-- JAVASCRIPT -->
        <script src="{{asset('admin/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('admin/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('admin/libs/node-waves/waves.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin/js/app.js')}}"></script>
        <script src="{{asset('admin/js/datatable-ptbr.js')}}"></script>
        @jquery
        @toastr_js
        @toastr_render
        @livewireScripts
        <script>
            window.addEventListener('notificaToastr', event => {
                if (event.detail.tipo == 'success') {
                    toastr.success(event.detail.mensagem);
                } else if (event.detail.tipo == 'error') {
                    toastr.error(event.detail.mensagem);
                }
            });
        </script>
        @yield("scripts")
        @stack("scripts")
    </body>
</html>