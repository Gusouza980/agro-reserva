<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-user"></i>
        <span key="t-dashboards">Clientes</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.clientes') }}" key="t-saas">Consultar</a></li>
        <li><a href="{{ route('painel.vendedores') }}" key="t-saas">Vendedores</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-tractor"></i>
        <span key="t-dashboards">Fazendas</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        {{-- <li><a href="{{route('painel.fazenda.cadastro')}}" key="t-saas">Cadastro</a></li> --}}
        <li><a href="{{ route('painel.fazendas') }}" key="t-saas">Consultar</a></li>
    </ul>
</li>
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

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-horse-head"></i>
        <span key="t-dashboards">Raças</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.racas') }}" key="t-saas">Consultar</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-user-tie"></i>
        <span key="t-dashboards">Assessores</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.assessores') }}" key="t-saas">Consultar</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-user"></i>
        <span key="t-dashboards">Visitas</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.visitas') }}" key="t-saas">Consultar</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-money-bill-alt"></i>
        <span key="t-dashboards">Vendas</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.vendas') }}" key="t-saas">Consultar</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-shopping-cart"></i>
        <span key="t-dashboards">Carrinhos</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.carrinhos.abertos') }}" key="t-saas">Abertos</a></li>
    </ul>
</li>
<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-bullhorn"></i>
        <span key="t-dashboards">Popups</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.popups') }}" key="t-saas">Consultar</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="fas fa-cog"></i>
        <span key="t-dashboards">Configurações</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="{{ route('painel.configuracoes.live') }}" key="t-saas">Live</a></li>
        <li><a href="{{ route('painel.configuracoes.home.banners') }}" key="t-saas">Banners</a></li>
    </ul>
</li>
