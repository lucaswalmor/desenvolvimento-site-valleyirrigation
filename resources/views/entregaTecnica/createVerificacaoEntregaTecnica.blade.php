@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('comum.cadastrar')</h4>
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
    </div>
@endsection

@section('conteudo')
        {{-- NAVTAB'S --}}
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.verificacao')</a>
            </li>
        </ul>

        {{-- PRELOADER --}}
        <div id="coverScreen">
            <div class="preloader">
                <i class="fas fa-circle-notch fa-spin fa-2x"></i>
                <div>@lang('comum.preloader')</div>
            </div>
        </div>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_verification_technical_delivery') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf
                    <input type="hidden" name="id_fazenda" id="id_fazenda" value="{{$fazenda['id']}}">
                    <input type="hidden" name="id_tecnico" id="id_tecnico" value="{{$fazenda['id_consultor']}}">
                    <div class="col-md-12" id="cssPreloader">
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="numero_pedido">@lang('entregaTecnica.numero_pedido')</label>
                                <input type="number" id="numero_pedido" class="form-control" name="numero_pedido" maxlength="30" required>
                            </div>
                            
                            <div class="form-group col-md-4 telo5ce">
                                <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                <input type="number" id="numero_serie" class="form-control" name="numero_serie" maxlength="30" required>
                            </div>
                            
                            <div class="form-group col-md-4 telo5ce">
                                <label for="data_entrega_tecnica">@lang('entregaTecnica.data')</label>
                                <input type="date" id="data_entrega_tecnica" class="form-control" name="data_entrega_tecnica" maxlength="30" required>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="motor">@lang('entregaTecnica.motor')</label>
                                <select name="fornecedor_motor" id="motor" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div>           
                            <div class="form-group col-md-4 telo5ce">
                                <label for="bomba">@lang('entregaTecnica.bomba')</label>
                                <select name="fornecedor_bomba" id="bomba" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div>         
                            <div class="form-group col-md-4 telo5ce">
                                <label for="chave_partida">@lang('entregaTecnica.chave_partida')</label>
                                <select name="fornecedor_chave_partida" id="chave_partida" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div>                          
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="conjunto_succao">@lang('entregaTecnica.conjunto_succao')</label>
                                <select name="fornecedor_conjunto_succao" id="conjunto_succao" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4 telo5ce">
                                <label for="ligacao_pressao">@lang('entregaTecnica.ligacao_pressao')</label>
                                <select name="fornecedor_ligacao_pressao" id="ligacao_pressao" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4 telo5ce">
                                <label for="adutora">@lang('entregaTecnica.adutora')</label>
                                <select name="fornecedor_adutora" id="adutora" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="kit_aspersores">@lang('entregaTecnica.kit_aspersores')</label>
                                <select name="fornecedor_kit_aspersores" id="kit_aspersores" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="form-group col-md-4 telo5ce">
                                <label for="pivo_central">@lang('entregaTecnica.pivo_central')</label>
                                <select name="fornecedor_pivo_central" id="pivo_central" class="form-control">
                                    <option value=""></option>
                                    @foreach ($fornecedores as $fornecedor)
                                        @php 
                                            if ($fornecedor['fornecedor'] == 'cliente') {
                                                continue;
                                            }
                                        @endphp
                                        <option value="{{ $fornecedor['fornecedor']}}">{{ __('listas.' . $fornecedor['fornecedor']) }}</option>
                                    @endforeach
                                </select>
                            </div> 
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="item_manual_montagem" id="customSwitch">
                                    <label class="custom-control-label" for="customSwitch" style="font-size: 1.2rem">@lang('entregaTecnica.item_manual_montagem')</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="item_listagem_aspersores" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1" style="font-size: 1.2rem">@lang('entregaTecnica.item_listagem_aspersores')</label>
                                </div>
                            </div>                            
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="item_manual_bomba" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2" style="font-size: 1.2rem">@lang('entregaTecnica.item_manual_bomba')</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="item_manual_motor_diesel" id="customSwitch3">
                                    <label class="custom-control-label" for="customSwitch3" style="font-size: 1.2rem">@lang('entregaTecnica.item_manual_motor_diesel')</label>
                                </div>
                            </div>                            
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="item_manual_chave_partida_ss" id="customSwitch4">
                                    <label class="custom-control-label" for="customSwitch4" style="font-size: 1.2rem">@lang('entregaTecnica.item_manual_chave_partida_ss')</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BOTOES PARA SALVAR --}}
            <div class="row justify-content-center botaoAfericao mb-4" id="botoesSalvar">
                <button class="proximo ml-2" type="" name="botao" value="sair"
                    id="botaosalvar">@lang('unidadesAcoes.salvarSair')</button>
                <button class="proximo ml-2" name="botao" value="proximo" type=""
                    id="botaosalvar">@lang('unidadesAcoes.proximo')</button>
            </div>
        </form>


@endsection

@section('scripts')
    {{-- REMOVER LINHAS DA TABELA --}}
    <script>
        $(document).ready(function() {});

        (function($) {
            remove = function(item)
            {
                var tr = $(item).closest('tr');
                tr.fadeOut(400, function()
                {
                    tr.remove();
                });
                return false;
            }
        })(jQuery);

    </script>

    {{-- COMBOS DE SELECTS --}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        //Array de TipoEquipOp em JSON puro
        var tipo_equip_op = [
            @php for ($i = 0; $i < count($lista_equipamento); $i++) { @endphp
                { tipo: "{{ $lista_equipamento[$i]['tipo_equipamento'] }}", tipo_op: "{{ __('listas.'. $lista_equipamento[$i]['tipo_op1'] ) }}" },
            @php } @endphp
        ];

        //Array de getBombaMarcaSerie em JSON puro
        var getBombaMarcaSerie = [
            @php for ($i = 0; $i < count($getBombaMarcaSerie); $i++) { @endphp
                { marca: "{{ $getBombaMarcaSerie[$i]['bomba_marca'] }}", modelo: "{{ $getBombaMarcaSerie[$i]['tipo_bomba'] }}" },
            @php } @endphp
        ];

        //Array de tipoLances em JSON puro
        var tipoLances = [
            @php for ($i = 0; $i < count($tipoLances); $i++) { @endphp
                { diam: "{{ $tipoLances[$i]['diametro'] }}", value: "{{ $tipoLances[$i]['qtd_tubo'] . '_' . $tipoLances[$i]['modelo'] }}", qtd: "{{ $tipoLances[$i]['qtd_tubo'] }} ({{ __('listas.'. $tipoLances[$i]['modelo'] ) }})" },
            @php } @endphp
        ];

        //Array de diametroLances em JSON puro        
        var diametroLances = [
            @php for ($i = 0; $i < count($diametroLances); $i++) { @endphp
                { diametro: "{{ $diametroLances[$i]['diametro'] }}" },
            @php } @endphp
        ];

        $(document).ready(function () {

            //Vai ser acionado cada vez que o equipamento tracar de item selecionado
            $("#tipo_equipamento").change(function () {
                //Pegando o novo valor selecionado no combo
                var tipo = $(this).val();
                carregaCombo2(tipo);
            });

            //Vai ser acionado cada vez que o equipamento tracar de item selecionado
            $("#bomba_marca").change(function () {
                //Pegando o novo valor selecionado no combo
                var marca = $(this).val();
                carregaBombaModelo(marca);
            });

            //Vai ser acionado cada vez que o equipamento tracar de item selecionado
            $(".diametro").change(function () {
                //Pegando o novo valor selecionado no combo
                var diam = $(this).val();
                // carregaQtdTubos(diam);
            });

            //Definir o item selecionado no carregamento da página
            $("#tipo_equipamento").val(0);
            $("#bomba_marca").val(0);
            $("#diametro").val(0);
            
            //carregar o combo baseado na categoria selecionada
            carregaCombo2(0);
            carregaBombaModelo(0);
            carregaQtdTubos(0);
            
            //Selecionar a subcategoria passando o id dela
            $("#tipo_equipamento_op1").val(0);
            $("#bomba_modelo").val(0);
            $("#qtd_tubos").val(0);
        });

        // Carrega a lista de opcoes do equipamento
        function carregaCombo2(tipo) {

            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var tipoEquipOpFiltradas = $.grep(tipo_equip_op, function (e) { return e.tipo == tipo; });
            
            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#tipo_equipamento_op1").html('<option>Selecione...</option>');
            $.each(tipoEquipOpFiltradas, function (i, tipoEquipOp) {
                $("#tipo_equipamento_op1").append($('<option>', {
                    value: tipoEquipOp.tipo_op, //Id do objeto subcategoria
                    text: tipoEquipOp.tipo_op //Nome da Subcategoria
                }));
            });

            
        }

        // carrega a lista de modelo das bombas
        function carregaBombaModelo(marca) {

            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var bombaMarca = $.grep(getBombaMarcaSerie, function (e) { return e.marca == marca; });

            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#bomba_modelo").html('<option>Selecione...</option>');
            $.each(bombaMarca, function (i, marca) {
                $("#bomba_modelo").append($('<option>', {
                    value: marca.modelo, //Id do objeto subcategoria
                    text: marca.modelo //Nome da Subcategoria
                }));
            });

        }

        // carrega a quantidade de tubos do lance
        function carregaQtdTubos(diam, id_diametro) {
            
            $("#diametro_value_" + id_diametro).attr('value', diam);
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var lances = $.grep(tipoLances, function (e) { return e.diam == diam; });
            
            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#qtd_tubos_" + id_diametro).html('<option>Selecione...</option>');
            $.each(lances, function (i, diam) {
                $("#qtd_tubos_" + id_diametro).append($('<option>', {
                    value: diam.value, //Id do objeto subcategoria
                    text: diam.qtd //Nome da Subcategoria
                }));
            });

        }

        // adiciona linhas dinamicas na tabela de lances
        function AddTableRow() {
            var rowCount = $('#tabelaTrechos > tbody > tr').length;
                var newRow = $("<tr>");
                var cols = "";
                
                ultimo_tubo = $('#tabelaTrechos .diametro option:selected').last().val();
                                
                valor_anterior = $('#diametro_' + (rowCount - 1) + ' option:selected').val();
                valor_anterior = parseInt(valor_anterior.substring(0, 3));

                cols += '<td>';
                cols += '<input type="hidden" name="diametro[]" id="diametro_value_' + rowCount + '"  value="">'
                cols +=     '<select name="diametro_select" id="diametro_' + rowCount + '" class="diametro form-control" onchange="carregaQtdTubos($(this).val(), '+ rowCount +')">';
                cols +=         '<option value=""></option>';
                for (i = 0; i < diametroLances.length; i++) {
                    valor_atual = parseInt(diametroLances[i]['diametro'].substring(0, 3));
                    if (valor_atual <= valor_anterior) {
                        $('#diametro_' + (rowCount - 1)).prop('disabled', 'disabled');
                        cols +=  '<option value="' + diametroLances[i]['diametro'] + '"> ' + diametroLances[i]['diametro'] + ' </option>';
                    }
                }                
                cols +=     '</select>';
                cols += '</td>';       
                
                cols +='<td><input type="number" min="0" class="form-control" required name="qtd_lances[]" id="qtd_lances_' + rowCount + '"></td>';

                cols += '<td>';
                cols +=     '<select name="qtd_tubos[]" id="qtd_tubos_' + rowCount + '" class="qtd_tubos form-control">';
                cols +=         '<option value=""></option>';
                cols +=     '</select>';
                cols += '</td>';

                if (rowCount > 0) {
                    cols += '<td><div class="row justify-content-center"><button type="button" class="removetablerow" onclick="remove(this)" style="outline: none; cursor: pointer; margin-top: 4px; justify-content: center;"><i class="fa fa-fw fa-times fa-lg"></i></button></div></td>';
                }
                
                newRow.append(cols);
                $("#tabelaTrechos").append(newRow);
                return false;
        }
    </script>

    {{-- VALIDAÇÕES DE CAMPOS --}}
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            $("#formdados").validate({
                rules: {
                    "numero_pedido": {
                        required: true,
                    },
                    "numero_serie": {
                        required: true,
                    },
                    "data_entrega_tecnica": {
                        required: true,
                    },
                    "fornecedor_motor": {
                        required: true,
                    },
                    "fornecedor_bomba": {
                        required: true,
                    },
                    "fornecedor_chave_partida": {
                        required: true,
                    },
                    "fornecedor_conjunto_succao": {
                        required: true,
                    },
                    "fornecedor_ligacao_pressao": {
                        required: true,
                    },
                    "fornecedor_adutora": {
                        required: true,
                    },
                    "fornecedor_kit_aspersores": {
                        required: true,
                    },
                    "fornecedor_pivo_central": {
                        required: true,
                    }
                },
                messages: {
                    numero_pedido: "@lang('validate.validate')",
                    "numero_serie": {
                        required: "@lang('validate.validate')"
                    },
                    "data_entrega_tecnica": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_motor": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_bomba": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_chave_partida": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_conjunto_succao": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_ligacao_pressao": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_adutora": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_kit_aspersores": {
                        required: "@lang('validate.validate')"
                    },
                    "fornecedor_pivo_central": {
                        required: "@lang('validate.validate')"
                    }
                },
                submitHandler: function(form) {
                    $("#coverScreen").show();
                    $("#cssPreloader input").each(function() {
                        $(this).css('opacity', '0.2');
                    });
                    $("#cssPreloader select").each(function() {
                        $(this).css('opacity', '0.2');
                    });
                    form.submit();
                }
            });
            
            
        });

        $(window).on('load', function() {
            $("#coverScreen").hide();
        });

    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
