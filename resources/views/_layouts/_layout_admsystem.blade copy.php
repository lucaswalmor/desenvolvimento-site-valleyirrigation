<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    <head>
        @include('_layouts._includes._head_admsystem')
    </head>

  <body class="d-flex flex-column h-100">
        
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue">
            <!--<a class="navbar-brand" href="#">Fixed navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>-->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('usuarios_manager') }}"><i class='fa fa-fw fa-users'></i> @lang('sidenav.usuarios')</a>
                            <a class="dropdown-item" href="{{ route('manage_cost_center') }}"><i class="far fa-money-bill-alt"></i> @lang('sidenav.cdc')</a>
                            <a class="dropdown-item" href="{{ route('farms_manager') }}"><i class='fa fa-fw fa-map-signs'></i> @lang('sidenav.fazendas')</a>
                            <a class="dropdown-item" href="{{ route('owner_manager') }}"><i class='fa fa-fw fa-id-card'></i> @lang('sidenav.proprietarios')</a>
                            <a class="dropdown-item" href="{{ route('manager_nozzles') }}"><i class='fa fa-fw fa-shower'></i> @lang('sidenav.bocais')</a>
                            <a class="dropdown-item" href="{{ route('manager_pivot') }}"><i class='fa fa-fw fa-tint'></i> @lang('sidenav.pivos')</a>
                            <a class="dropdown-item" href="{{ route('manager_resales') }}"><i class="fas fa-store-alt"></i> @lang('sidenav.revendas')</a>
                        </div>
                    </li>                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-building fa-lg"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
        <div class="container-fluid">
            @yield('topo_detalhe')

            @yield('conteudo')
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container-fluid">
            <span>Valley Check Pivot © <?= date("Y")?></span>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
      
  </body>
</html>
