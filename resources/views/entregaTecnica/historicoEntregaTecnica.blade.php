@extends('_layouts._layout_site')

@section('head')
@endsection

@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-afericao-mobile">
                <h1>@lang('entregaTecnica.historico')</h1>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('manage_technical_delivery') }}" style="color: #3c8dbc" data-toggle="tooltip"
                    data-placement="bottom" title="Voltar">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>
            </div>
        </div>

        {{-- FILTRO DE PESQUISA --}}
        <div class="row justify-content-end telo5inputfiltro mt-5">
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
            @csrf
            <thead>
                <tr class="text-center">
                    <th>@lang('entregaTecnica.numero_pedido')</th>
                    <th>@lang('entregaTecnica.fazenda')</th>
                    <th>@lang('entregaTecnica.proprietario')</th>
                    <th>@lang('entregaTecnica.numero_serie')</th>
                    <th>@lang('entregaTecnica.status')</th>
                    <th>@lang('sidenav.acoes')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historico_entrega_tecnica as $historico)
                    <tr>
                        <td>{{ $historico->numero_pedido }}</td>
                        <td>{{ $historico->nome }}</td>
                        <td>{{ $historico->nome_proprietario }}</td>
                        <td>{{ $historico->numero_serie }}</td>
                        <td></td>
                        <td class="acoes">
                            {{-- <a href="{{ route('gauging_status', $afericao->id) }}"><button type="button" class="botaoTabela"><i class="far fa-chart-bar"></i></button></a>
                            <a href="{{ route('gauging_edit', $afericao->id) }}"><button type="button" class="botaoTabela"> <i class="fas fa-pen"></i></button></a> --}}
                            <a href="{{ route('view_technical_delivery', $historico->id ) }}"><button type="button" class="botaoTabela"> <i class="far fa-eye"></i></a>
                            <button type="submit" class="botaoTabela" data-toggle="modal" data-target="#modalDeletar-{{ $historico->id }}"><i class="fas fa-times"></i></button>

                            <div class="modal fade" id="modalDeletar-{{ $historico->id }}" tabindex="-1"
                                aria-labelledby="modalDeletar" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>@lang('entregaTecnica.pedidoEfazenda') {{ $historico->numero_pedido }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 style="padding-bottom: 20px">@lang('comum.excluir')</h4>
                                            
                                            <form
                                                action="{{ action('EntregaTecnica\EntregaTecnicaController@delete', $historico->id) }}"
                                                method="POST" class="delete_form float-right"> {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">@lang('comum.nao')</button>
                                                <button type="submit" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">@lang('comum.sim')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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