@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.caracteristicas_gerais') - @lang('comum.cadastrar')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('edit_technical_delivery', $id_entrega_tecnica) }}" style="color: #3c8dbc" data-toggle="tooltip"
                    data-placement="bottom" title="Voltar">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>

                <button type="button" id="botaosalvar" data-toggle="tooltip" data-placement="bottom" title="Salvar" name="botao" value="sair">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-save fa-stack-1x fa-inverse"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
        {{-- NAVTAB'S --}}
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.principais')</a>
            </li>
        </ul>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_aerial_part') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>            

            <div id="alert_equipamento" style="display: none; text-align: center;">                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @lang('entregaTecnica.alterar_tipo_equipamento')
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <input type="hidden" name="tem_lance" id="tem_lance" value="{{ $tem_lances }}">
            <input type="hidden" name="lances" id="lances" value="{{ $equipamento_tipo['tipo_equipamento'] }}">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-md-12" id="cssPreloader">
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                <input type="text" id="numero_serie" class="form-control" name="numero_serie" maxlength="20" value="{{$entrega_tecnica_dados['numero_serie']}}">
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="modelo">@lang('entregaTecnica.modelo')</label>
                                <select name="modelo" class='form-control' id="modelo">
                                    <option value=""></option>
                                    @for ($i = 0; $i < count($modelos); $i++)                                    
                                        <option value="{{ $modelos[$i]['modelo']}}" {{ ($modelos[$i]['modelo'] == $entrega_tecnica_dados['modelo_equipamento'] ? 'selected' : '') }}>{{ $modelos[$i]['modelo']}}</option>                                    
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="tipo_equipamento">@lang('entregaTecnica.tipo_equipamento')</label>
                                <select name="tipo_equipamento" class="form-control" id="tipo_equipamento">
                                    <option value=""></option>
                                    @for ($i = 0; $i < count($equipamento); $i++)
                                        <option value="{{ $equipamento[$i]['tipo_equipamento']}}" {{ $equipamento[$i]['tipo_equipamento'] == $entrega_tecnica_dados['tipo_equipamento'] ? 'selected' : ''}} >{{  __('listas.'. $equipamento[$i]['tipo_equipamento'] ) }}</option>                                    
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="tipo_equipamento_op1">@lang('entregaTecnica.opcao_equipamento')</label>
                                <select name="tipo_equipamento_op1" class="form-control" id="tipo_equipamento_op1">
                                    @foreach ($lista_equipamento as $lista)
                                        @if ($lista['tipo_equipamento'] == $entrega_tecnica_dados['tipo_equipamento'])
                                            <option value="{{ $lista['tipo_op1']}}" {{ $lista['tipo_op1'] == $entrega_tecnica_dados['tipo_equipamento_op1'] ? 'selected' : ''}} >{{  __('listas.'. $lista['tipo_op1'] ) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="altura_equipamento">@lang('entregaTecnica.altura_equipamento')</label>
                                <select name="altura_equipamento" class="form-control" id="altura_equipamento">
                                    @foreach ($getListaAlturaTipo as $item)
                                        @if ($item['tipo'] == $entrega_tecnica_dados['tipo_equipamento'])
                                            <option value="{{ __('listas.'. $item['altura'] ) .' - '. $item['altura_equipamento'] }}" {{ __('listas.'. $item['altura'] ) .' - '. $item['altura_equipamento'] == $entrega_tecnica_dados['altura_equipamento_nome'] ? 'selected' : ''}} >{{ __('listas.'. $item['altura'] ) .' - '. $item['altura_equipamento'] }}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="balanco">@lang('entregaTecnica.balanco')</label>
                                <select name="balanco" class="form-control" id="balanco">
                                    <option value=""></option>
                                    @foreach ($getBalanco as $balanco)
                                        <option value="{{ $balanco['balanco'] }}" {{ $balanco['balanco'] == $entrega_tecnica_dados['balanco_comprimento'] ? 'selected' : ''}}> {{ $balanco['balanco'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="painel">@lang('entregaTecnica.painel')</label>
                                <select name="painel" class="form-control" id="painel">
                                    <option value=""></option>
                                    @foreach ($paineis as $painel)
                                        <option value="{{ $painel['painel'] }}" {{ $painel['painel'] == $entrega_tecnica_dados['painel'] ? 'selected' : ''}}> {{ __('listas.' . $painel['painel'] ) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="corrente">@lang('entregaTecnica.corrente')</label>
                                <select name="corrente" class="form-control" id="corrente">
                                    <option value=""></option>
                                    @foreach ($correntes as $corrente)
                                        <option value="{{ $corrente['corrente_fusivel_nh500v'] }}" {{ $corrente['corrente_fusivel_nh500v'] == $entrega_tecnica_dados['corrente_fusivel_nh500v'] ? 'selected' : ''}}>{{ $corrente['corrente_fusivel_nh500v'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="pneus">@lang('entregaTecnica.pneus')</label>
                                <select name="pneus" class="form-control" id="pneus">
                                    <option value=""></option>
                                    @foreach ($getPneus as $pneus)
                                        <option value="{{ $pneus['pneus'] }}" {{ $pneus['pneus'] == $entrega_tecnica_dados['pneus'] ? 'selected' : ''}}>{{ $pneus['pneus'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="giro">@lang('entregaTecnica.giro')</label>
                                <input type="number" max="360" min="0" name="giro" id="giro" class="form-control" value="{{ $entrega_tecnica_dados['giro'] }}">
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="injeferd">@lang('entregaTecnica.injeferdPotencia')</label>
                                <select name="injeferd" class="form-control" id="injeferd">
                                    <option value="1">@lang('entregaTecnica.opcional')</option>
                                    @foreach ($injeferdPotencia as $item)
                                        <option value="{{ $item['potencia'] }}" {{ $item['potencia'] == $entrega_tecnica_dados['injeferd'] ? 'selected' : ''}}> {{ $item['potencia'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3 telo5ce">
                                <label for="canhao_final_valvula">@lang('entregaTecnica.canhaoFinal')</label>
                                <select name="canhao_final_valvula" class="form-control" id="canhao_final_valvula">
                                    <option value="1">@lang('entregaTecnica.opcional')</option>
                                    @foreach ($canhaoFinal as $item)
                                        <option value="{{ $item['tipo'] }}" {{ $item['tipo'] == $entrega_tecnica_dados['canhao_final_valvula'] ? 'selected' : ''}}>{{ __('listas.' . $item['tipo'] ) }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>

                        <div class="form-row justify-content-start">   
                            <div class="form-group col-md-3 telo5ce">
                                <label for="parada_automatica">@lang('entregaTecnica.parada_automatica')</label>
                                <select name="parada_automatica" class="form-control" id="parada_automatica">
                                    <option value="1">@lang('entregaTecnica.opcional')</option>
                                    <option value="0" {{ '0' == $entrega_tecnica_dados['parada_automatica'] ? 'selected' : ''}}>@lang('comum.nao')</option>
                                    <option value="2" {{ '2' == $entrega_tecnica_dados['parada_automatica'] ? 'selected' : ''}}>@lang('comum.sim')</option>
                                </select>
                            </div>           
                            <div class="form-group col-md-3 telo5ce">
                                <label for="barreira_seguranca">@lang('entregaTecnica.barreira_seguranca')</label>
                                <select name="barreira_seguranca" class="form-control" id="barreira_seguranca">
                                    <option value="1">@lang('entregaTecnica.opcional')</option>
                                    <option value="0" {{ '0' == $entrega_tecnica_dados['barreira_seguranca'] ? 'selected' : ''}}>@lang('comum.nao')</option>
                                    <option value="2" {{ '2' == $entrega_tecnica_dados['barreira_seguranca'] ? 'selected' : ''}}>@lang('comum.sim')</option>
                                </select>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </form>


@endsection

@section('scripts')

    {{-- COMBOS DE SELECTS --}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        //Array de TipoEquipOp em JSON puro
        var tipo_equip_op = [
            @php for ($i = 0; $i < count($lista_equipamento); $i++) { @endphp
                { tipo: "{{ $lista_equipamento[$i]['tipo_equipamento'] }}", tipo_op: "{{ $lista_equipamento[$i]['tipo_op1'] }}", nome_op: "{{ __('listas.' . $lista_equipamento[$i]['tipo_op1']) }}" },
            @php } @endphp
        ];

        //Array de alturaEquipamento em JSON puro
        var alturaEquipamento = [
            @php for ($i = 0; $i < count($getListaAlturaTipo); $i++) { @endphp
                { altura_eqp: "{{ __('listas.'. $getListaAlturaTipo[$i]['altura'] ) .' - '. $getListaAlturaTipo[$i]['altura_equipamento'] }}", tipo_eqp: "{{$getListaAlturaTipo[$i]['tipo'] }}" },
            @php } @endphp
        ];

        $(document).ready(function () {
            $('#botaosalvar').on('click', function() {            
                $('#formdados').submit();
            });      

            $("#alert").fadeIn(300).delay(2000).fadeOut(400);

            //Vai ser acionado cada vez que o equipamento tracar de item selecionado
            $("#tipo_equipamento").change(function () {
                //Pegando o novo valor selecionado no combo
                var tipo = $(this).val();
                var tipo_eqp = $(this).val();
                
                tem_lance = $("#tem_lance").val();
                lance_atual = $('#lances').val();

                if (tem_lance == 1) {
                    $("#alert_equipamento").css('display', 'block');
                } 
                                
                if (tipo == lance_atual) {
                    $("#alert_equipamento").css('display', 'none');
                }

                $("#tipo_equipamento_op1").html('');
                $("#altura_equipamento").html('');
                carregaCombo2(tipo);
                carregaAlturaEquipamento(tipo_eqp);
            });
        });

        // Carrega a lista de opcoes do equipamento
        function carregaCombo2(tipo) {
            value = $("#tipo_equipamento").val();

            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var tipoEquipOpFiltradas = $.grep(tipo_equip_op, function (e) { return e.tipo == value; });

            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $.each(tipoEquipOpFiltradas, function (i, tipoEquipOp) {
                $("#tipo_equipamento_op1").append($('<option>', {
                    value: tipoEquipOp.tipo_op, //Id do objeto subcategoria
                    text: tipoEquipOp.nome_op //Nome da Subcategoria
                }));
            });            
        }

        // Carrega a lista de opcoes do equipamento
        function carregaAlturaEquipamento(tipo_eqp) {
            value = $("#tipo_equipamento").val();
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var tipoAlturaEquipamento = $.grep(alturaEquipamento, function (e) { return e.tipo_eqp == value; });
            
            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            
            $.each(tipoAlturaEquipamento, function (i, tipo_eqp) {
                $("#altura_equipamento").append($('<option>', {
                    value: tipo_eqp.altura_eqp, //Id do objeto subcategoria
                    text: tipo_eqp.altura_eqp //Nome da Subcategoria
                }));
            });            
        }
    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
