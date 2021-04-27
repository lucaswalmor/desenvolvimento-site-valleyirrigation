

    <nav id="navbar" class="navbar navbar-expand-lg navbar-light  border-bottom ">
      <button class="btn" id="menu-toggle"><i class='fa fa-fw fa-2x fa-bars text-light'></i></button>

      <div class="navbar-brand text-center">
        @include('_layouts._includes._selecionar_fazenda')
      </div>

      <a class="navbar-brand text-light hidden-sm" href="{{route('dashboard')}}" > <img src="{{asset('img/logos/logo-irr.png')}}" style="max-height: 3rem" alt=""> </a>
      
      <button class="text-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-ellipsis-v"></i>
      </button>
      

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item">
            
          </li>
          <!-- Admin option -->
          <li class='nav-item  text-center my-auto'>
            <div class="text-light dropdown">
                <button class="btn btn-default btn-lg dropdown-toggle text-light" type="button" data-toggle="dropdown" id='dropAdmin' aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" >
                  <img style="max-height: 1.6rem" class="fa" src="{{asset('img/logos/header-menu-configuracoes.png')}}" alt=""> @lang('sidenav.admin')
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropAdmin">
                  @can('gerente')
                  <li class="container"><a href="{{route('centrocusto.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-money'></i> @lang('sidenav.cdc')</a></li>
                  <li class="container"><a href="{{route('fazendas.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazendas')</a></li>
                  <!--<li class="container"><a href=""   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazenda')</a></li>-->
                  <li class="container"><a href="{{route('proprietarios.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-id-card'></i> @lang('sidenav.proprietarios')</a></li>
                @endcan
            
                @can('supervisor')
                  <li class="container"><a href="{{route('usuarios.listar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-users'></i> @lang('sidenav.usuarios')</a></li>
                  <li class="container"><a href="{{route('fazendas.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazendas')</a></li>
                  <li class="container"><a href="{{route('proprietarios.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-id-card'></i> @lang('sidenav.proprietarios')</a></li>
              
                @endcan
            
                @can('consultor')
                  <li class="container"><a href="{{route('fazendas.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazendas')</a></li>
                  <!--<li class="container"><a href=""   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazenda')</a></li>-->
                  <li class="container"><a href="{{route('proprietarios.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-id-card'></i> @lang('sidenav.proprietarios')</a></li>
                @endcan
            
                @can('assistente')
                  <!--<li class="container"><a href=""   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazenda')</a></li>-->
                @endcan
            
                @can('admin')
                  <li class="container"><a href="{{route('usuarios.listar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-users'></i> @lang('sidenav.usuarios')</a></li>
                  <li class="container"><a href="{{route('centrocusto.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-money'></i> @lang('sidenav.cdc')</a></li>
                  <li class="container"><a href="{{route('fazendas.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazendas')</a></li>
                  <!--<li class="container"><a href=""   class='dropdown-item nav-link'> <i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazenda')</a></li>-->
                  <li class="container"><a href="{{route('proprietarios.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-id-card'></i> @lang('sidenav.proprietarios')</a></li>
                  <li class="container"><a href="{{route('fabricantes.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-shower'></i> @lang('sidenav.bocais')</a></li>
                  <li class="container"><a href="{{route('pivos.gerenciar')}}"   class='dropdown-item nav-link'> <i class='fa fa-fw fa-tint'></i> @lang('sidenav.pivos')</a></li>
                @endcan                    
                </ul>
              </div>
          </li>

          <!-- Language Options -->
          <li class='nav-item  text-center my-auto'>
            <div class="text-light dropdown">
                <button class="btn btn-default btn-lg dropdown-toggle text-light" type="button" data-toggle="dropdown" id='dropLang' aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" data-placement="bottom" title="@lang('comum.idioma')">
                    <i class="fa fa-fw fa-language" style="font-size:1.5rem"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropLang">
                  @if(session()->has('idiomas'))
                    @foreach (Session::get('idiomas') as $idioma)
                      <li class='container' ><a class='dropdown-item nav-link'href="{{route('alterarIdioma', $idioma['valor'])}}"> <img src="{{asset('img/flags/' . $idioma['valor'] . ".png")}}" alt=""> {{strtoupper ($idioma['valor'])}}</a></li>
                    @endforeach
                  @endif
                    
                </ul>
              </div>
          </li>



          <li class="nav-item text-center" >
          <a class="nav-link text-light" href="{{route('sair')}}" data-toggle="tooltip" data-placement="bottom" title="@lang('comum.sair')"><i class="fa fa-2x fa-fw fa-sign-out"></i></a>
          </li>
      
        </ul>
      </div>
    </nav>