@extends('_layouts._layout_site')

@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-entrega-tecnica-mobile">
                <h1>@lang('entregaTecnica.analise_entregaTecnica')</h1>
                <h4>@lang('comum.gerenciar')</h4>
            </div>
        </div>

        {{-- FILTRO DE PESQUISA --}}
        <div class="row justify-content-end telo5inputfiltro mt-3">
            <div class="col-md-3 position">
                <form action="#" method="POST" class="form form-inline">
                    @csrf
                    <input class="form-control" name="filter" type="text" placeholder="@lang('comum.pesquisar')"/>
                    <button type="submit" class="btn btn-primary search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')

    <div id="alert">                
        @include('_layouts._includes._alert')    
    </div>  

    <div class="table-responsive m-auto tabela">
        <input type="hidden" name="id_entrega_tecnica" value="{{ $id_entrega_tecnica }}">
        @if (Session::has('send'))
            <div class="alert alert-success mr-3 ml-3" id="alert2" role="alert">{{ Session::get('send') }}</div>
        @endif
        
        <table class="table table-striped mx-auto" id="filtertable">
            <thead>
                <tr class="text-center">
                    <th>@lang('entregaTecnica.data')</th>
                    <th>@lang('entregaTecnica.tipo_entrega_tecnica')</th>
                    <th>@lang('entregaTecnica.numero_pedido')</th>
                    <th>@lang('entregaTecnica.proprietario')</th>
                    <th>@lang('entregaTecnica.tecnico_responsavel')</th>
                    <th>@lang('entregaTecnica.status')</th>
                    <th>@lang('sidenav.acoes')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrega_tecnica as $item)
                    <tr>
                        <td>{{ date('d/m/Y', strtotime($item['data_entrega_tecnica'])) }}</td>
                        <td>{{ $item['tipo_entrega_tecnica'] }}</td>
                        <td>{{ $item->numero_pedido }}</td>
                        <td>{{ $item['nome_proprietario'] }}</td>
                        <td>{{ $item['nome_usuario'] }}</td>
                        <td>
                            @if ($item['status'] === 0)
                                @lang('entregaTecnica.nao_iniciada')
                            @elseif($item['status'] === 1)
                                @lang('entregaTecnica.incompleta')
                            @elseif($item['status'] === 2)
                                @lang('entregaTecnica.completa')
                            @elseif($item['status'] === 3)
                                @lang('entregaTecnica.analise')
                            @elseif($item['status'] === 4)
                                @lang('entregaTecnica.aprovada')
                            @else
                                @lang('entregaTecnica.corrigir')
                            @endif
                        </td>
                        <td class="acoes">
                            <a href="{{ route('analysis_technical_delivery', $item->id ) }}" style="font-size: 20px"><button type="button" class="botaoTabela"><i class="fas fa-eye"></i></button></a>
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
            </tfoot>
        </table>
    </div>
@endsection

@section('scripts')
    <script>            
        $(document).ready(function() {

            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
        });

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