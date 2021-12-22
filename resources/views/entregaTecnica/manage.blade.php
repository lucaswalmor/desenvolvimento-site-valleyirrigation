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
                <button type="button" data-toggle="modal" data-target="#createET"><i class="fas fa-plus-circle fa-3x"></i></button>
            </div>
        </div>

        {{-- FILTRO DE PESQUISA --}}
        <div class="row justify-content-end telo5inputfiltro mt-3">
            <div class="col-md-3 position">
                <form action="{{route('technical_delivery_filter')}}" method="POST" class="form form-inline">
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
                            @if ($item['status'] == 3 || $item['status'] == 4)
                                <button type="button" class="botaoTabela" style="font-size: 20px; cursor: default;" disabled><i class="fa fa-pen"></i></button>
                            @else
                                <a href="{{ route('edit_technical_delivery', $item->id ) }}" style="font-size: 20px;"><button type="button" class="botaoTabela"><i class="fa fa-pen"></i></button></a>
                            @endif
                            
                            @if ($item['status'] != 0 || $item['status'] != 1)
                                <a href="{{ route('datasheet_technical_delivery', $item->id ) }}" target="_blank" style="font-size: 20px"><button type="button" class="botaoTabela"><i class="far fa-file-pdf"></i></button></a>
                            @else
                                <button type="button" class="botaoTabela" style="font-size: 20px; cursor: default;" data-toggle="modal" data-target="#alert_cad_inco"><i class="far fa-file-pdf"></i></button>
                            @endif
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


    <!-- CADASTRO INCOMPLETO -->
    <div class="modal fade" id="alert_cad_inco" tabindex="-1" aria-labelledby="alert_cad_inco_Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="alert_cad_inco_Label" style="color: #856404"> <i class="fas fa-exclamation-triangle pr-3" style="color: #e9c251;"></i> @lang('entregaTecnica.atencao') </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="alert pt-4 pl-5" role="alert">
                        <ul style="text-align: center; color: #856404">
                            <li><h4>@lang('entregaTecnica.cadastro_incompleto')</h4></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE ET JA EM ANALISE -->
    <div class="modal fade" id="alert_et" tabindex="-1" aria-labelledby="alert_et_Label" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="alert_et_Label" style="color: #856404"> <i class="fas fa-exclamation-triangle pr-3" style="color: #e9c251;"></i> @lang('entregaTecnica.atencao') </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="alert pt-4 pl-5" role="alert">
                    <ul style="text-align: center; color: #856404">
                        <li><h4>@lang('entregaTecnica.entrega_tecnica_analise')</h4></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createET" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="createETLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="createETLabel">@lang('entregaTecnica.nova_entrega_tecnica')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save_technical_delivery') }}" id="formdados" method="POST">
                    @csrf
                    <input type="hidden" name="id_fazenda" id="id_fazenda" value="{{$fazenda['id']}}">
                    <input type="hidden" name="id_tecnico" id="id_tecnico" value="{{$fazenda['id_consultor']}}">

                    <div class="alert alert-warning" role="alert" id="mensagem" style="display: none;">   
                        
                    </div>
                    
                    <div class="form-row justify-content-start">
                        <div class="form-group col-md-4 telo5ce">
                            <label for="numero_pedido">@lang('entregaTecnica.numero_pedido')</label>
                            <input type="number" id="numero_pedido" class="form-control" name="numero_pedido" maxlength="4" required>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="data_entrega_tecnica">@lang('entregaTecnica.data')</label>
                            <input type="date" id="data_entrega_tecnica" class="form-control" name="data_entrega_tecnica" maxlength="30" required>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="tipo_entrega_tecnica">@lang('entregaTecnica.tipo_entrega_tecnica')</label>
                            <select name="tipo_entrega_tecnica" id="tipo_entrega_tecnica" class="form-control" required>
                                <option value=""></option>
                                <option value="completa">@lang('entregaTecnica.completa')</option>
                                <option value="motobomba">@lang('entregaTecnica.motobomba')</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row justify-content-start">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row justify-content-center botaoAfericao mb-4" id="botoesSalvar">
                    <button type="button" class=" ml-2 etVoltar" data-dismiss="modal" aria-label="Close">
                        @lang('unidadesAcoes.sair')
                    </button>
                    <button class="etSalvar ml-2" name="botao" value="salvar" id="botaosalvar">@lang('unidadesAcoes.criar')</button>
                </div>
            </div>
        </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>            
        $(document).ready(function() {

            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            $("#alert2").fadeIn(300).delay(2000).fadeOut(400);

            $('#botaosalvar').on('click', function() {
                $.ajax({
                    url: "{{ route('check_technical_delivery') }}",
                    type: "post",
                    data: $('#formdados').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        var mensagem = data.mensagem;
                        
                        if (mensagem != "ok"){
                            $("#mensagem").css("display","");
                            $('#mensagem').html(mensagem);
                            $("#mensagem").fadeIn(300).delay(3000).fadeOut(400);
                        } else {
                            $('#formdados').submit(); 
                        }
                    }
                });  
            });

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