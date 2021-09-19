@extends('_layouts._layout_site')

@section('head')
@endsection

@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-entrega-tecnica-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1>
                <h4>@lang('comum.gerenciar')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('create_verification_technical_delivery') }}" data-toggle="tooltip" data-placement="left"
                    title="Cadastrar Cento de custo">
                    <span><i class="fas fa-plus-circle fa-3x"></i></span>
                </a>
            </div>
        </div>

        {{-- FILTRO DE PESQUISA --}}
        <div class="row justify-content-end telo5inputfiltro mt-3">
            <div class="col-md-3 position">
                <form action="{{route('filter_historic')}}" method="POST" class="form form-inline">
                    @csrf
                    <input class="form-control" name="filter" type="text" placeholder="@lang('comum.pesquisar')"/>
                    <button type="submit" class="btn btn-primary search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
@include('_layouts._includes._alert')
    <div class="table-responsive m-auto tabela">
        <table class="table table-striped mx-auto" id="filtertable">
            <thead>
                <tr class="text-center">
                    <th>@lang('entregaTecnica.numero_pedido')</th>
                    <th>@lang('entregaTecnica.numero_serie')</th>
                    <th>@lang('entregaTecnica.fazenda')</th>
                    <th>@lang('entregaTecnica.proprietario')</th>
                    <th>@lang('entregaTecnica.tecnico_responsavel')</th>
                    <th>@lang('entregaTecnica.data')</th>
                    <th>@lang('entregaTecnica.status')</th>
                    <th>@lang('sidenav.acoes')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrega_tecnica as $item)
                    <tr>
                        <td>{{ $item->numero_pedido }}</td>
                        <td>{{ $item->numero_serie }}</td>
                        <td>{{ $item['nome_fazenda'] }}</td>
                        <td>{{ $item['nome_proprietario'] }}</td>
                        <td>{{ $item['nome_usuario'] }}</td>
                        <td>{{ $item['data_entrega_tecnica'] }}</td>
                        <td></td>
                        <td class="acoes">
                            {{-- <a href="{{ route('gauging_status', $afericao->id) }}"><button type="button" class="botaoTabela"><i class="far fa-chart-bar"></i></button></a> --}}
                            <a href="#"><button type="button" class="botaoTabela"> <i class="fas fa-pen"></i></button></a>
                            <a href="{{ route('view_technical_delivery', $item->id ) }}"><button type="button" class="botaoTabela"> <i class="far fa-eye"></i></button></a>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
        </table>
    </div>

@endsection

@section('scripts')
        {{-- FILTRO DE BUSCA DAS TABELAS --}}
        <script>
            var $rows = $('#filtertable tbody tr');
            $('#filtrotabela').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
    
        </script>
@endsection