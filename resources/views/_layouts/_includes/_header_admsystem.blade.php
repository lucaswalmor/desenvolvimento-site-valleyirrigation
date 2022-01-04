
<style>
    .ativo {
        background-color: #1b6b9a !important;
    }
</style>

{{-- MENU HAMBURGUER --}}
<div class="dropdown4">
    <button onclick="myFunction4()" class="dropbtn4">
        <i class="fas fa-bars"></i>
    </button>

    <div id="myDropdown4" class="dropdown-content4 content">
        <nav class="nav11" role="navigation">
            <ul class="nav11__list">
                <li class="navbar11">

                    <a href="{{ route('usuarios_manager') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.usuarios')
                    </a>

                    <a href="{{ route('manage_cost_center') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.cdc')
                    </a>

                    <a href="{{ route('farms_manager') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.fazendas')
                    </a>

                    <a href="{{ route('owner_manager') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.proprietarios')
                    </a>

                    <a href="{{ route('manager_nozzles') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.bocais')
                    </a>

                    <a href="{{ route('manager_pivot') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.pivos')
                    </a>

                    <a href="{{ route('manager_resales') }}" class="nav-link entrega-tecnica-link sub_grupo">
                        @lang('sidenav.revendas')
                    </a>

                </li>
            </ul>
        </nav>
    </div>
</div>

{{-- BOTOES DO MENU NO HEADER --}}
<div class="imagens ">
    <a href="{{ route('dashboard') }}"> <img src="{{ asset('img/ico_dashboard.png') }}" alt="dashboard" class="icodash"> </a>
</div>

{{-- MENU LATERAL DA DIREITA --}}
<div id="main">
    <ul id="menu" class="nav navbar-right header-usuario">
        <li class="header-logo"></li>

        <li>
            <a href="{{ route('sair') }}" data-toggle="tooltip" data-placement="bottom">
                <img src="{{ asset('img/ico_sair.png') }}" class="icones sair2">
            </a>
        </li>
    </ul>
</div>
