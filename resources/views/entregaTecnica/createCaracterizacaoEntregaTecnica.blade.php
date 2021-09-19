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
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.caracterizacao')</a>
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
        <form action="{{ route('save_technical_delivery_descripcion') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf
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
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="modelo">@lang('entregaTecnica.modelo')</label>
                                <select name="modelo" class='form-control' id="modelo" required='true'>
                                    <option value=""></option>
                                    @for ($i = 0; $i < count($modelos); $i++)
                                        <option value="{{ $modelos[$i]['modelo']}}">{{ $modelos[$i]['modelo']}}</option>                                    
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-4 telo5ce">
                                <label for="tipo_equipamento">@lang('entregaTecnica.tipo_equipamento')</label>
                                <select name="tipo_equipamento" class="form-control" id="tipo_equipamento" required>
                                    <option value=""></option>
                                    @for ($i = 0; $i < count($equipamento); $i++)
                                        <option value="{{ $equipamento[$i]['tipo_equipamento']}}">{{  __('listas.'. $equipamento[$i]['tipo_equipamento'] ) }}</option>          
                                    @endfor
                                </select>
                            </div>

                            <div class="form-group col-md-4 telo5ce">
                                <label for="tipo_equipamento_op1">@lang('entregaTecnica.opcao_equipamento')</label>
                                <select name="tipo_equipamento_op1" class="form-control" id="tipo_equipamento_op1" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="altura_equipamento">@lang('entregaTecnica.altura_equipamento')</label>
                                <select name="altura_equipamento" class="form-control" id="altura_equipamento" required>
                                    <option value=""></option>
                                    @foreach ($altura_equipamento as $altura)   
                                        <option value="{{ $altura['altura_equipamento'] }} ">{{ __('listas.'. $altura["altura_equipamento"])}} - {{ $altura['altura']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 telo5ce">
                                <label for="balanco">@lang('entregaTecnica.balanco')</label>
                                <select name="balanco" class="form-control" id="balanco" required>
                                    <option value=""></option>
                                    @foreach ($getBalanco as $balanco)
                                        <option value="{{ $balanco['balanco'] }}">{{ $balanco["balanco"] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 telo5ce">
                                <label for="painel">@lang('entregaTecnica.painel')</label>
                                <select name="painel" class="form-control" id="painel" required>
                                    <option value=""></option>
                                    @foreach ($paineis as $painel)
                                        <option value="{{ $painel['painel'] }}">{{ __('listas.' . $painel['painel'] ) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row justify-content-start">

                            <div class="form-group col-md-4 telo5ce">
                                <label for="corrente">@lang('entregaTecnica.corrente')</label>
                                <select name="corrente" class="form-control" id="corrente" required>
                                    <option value=""></option>
                                    @foreach ($correntes as $corrente)
                                        <option value="{{ $corrente['corrente_fusivel_nh500v'] }}">{{ $corrente['corrente_fusivel_nh500v'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 telo5ce">
                                <label for="motorredutores">@lang('entregaTecnica.motorredutores')</label>
                                <select name="motorredutores" class="form-control" id="motorredutores" required>
                                    <option value=""></option>
                                    @foreach ($motorredutores as $motorredutor)
                                        <option value="{{ $motorredutor['motoredutor_potencia'] }}">{{ $motorredutor['motoredutor_potencia'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4 telo5ce">
                                <label for="pneus">@lang('entregaTecnica.pneus')</label>
                                <select name="pneus" class="form-control" id="pneus" required>
                                    <option value=""></option>
                                    @foreach ($getPneus as $pneus)
                                        <option value="{{ $pneus['pneus'] }}">{{ $pneus['pneus'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="opcionais">@lang('entregaTecnica.opcionais')</label>
                                <select name="opcionais" class="form-control" id="opcionais" required>
                                    <option value=""></option>
                                    @foreach ($getOpcionais as $opcionais)
                                        <option value="{{ $opcionais['opcionais'] }}">{{ $opcionais['opcionais'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive m-auto tabela">
                        <div class="table mx-auto">
                            <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                <thead class="headertable">
                                    <tr class="text-center">
                                        <th scope="col-5">@lang('entregaTecnica.diametro')</th>
                                        <th scope="col-5">@lang('entregaTecnica.qtd_lances')</th>
                                        <th scope="col-5">@lang('entregaTecnica.qtd_tubos')</th>
                                        <th scope="col-2">@lang('bocais.acoes')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="col-md-2" >
                                        <input type="hidden" name="diametro[]" id="diametro_value_0" value="">
                                        <select name="diametro_select" id="diametro_0" class="form-control" onchange="carregaQtdTubos($(this).val(), 0)">                                            
                                            <option value=""></option>
                                            @for ($i = 0; $i < count($diametroLances); $i++)
                                                <option value="{{ $diametroLances[$i]['diametro']}}">{{ __('listas.'. $diametroLances[$i]['diametro'] ) }}</option>          
                                            @endfor
                                        </select>
                                    </td>
                                    <td class="col-md-2">
                                        <input type="number" min="0" class="form-control" required
                                            name="qtd_lances[]" id="qtd_lances" autocomplete="off">
                                    </td>
                                    <td class="col-md-2">
                                        <select name="qtd_tubos[]" id="qtd_tubos_0" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </td>
                                    <td class="col-md-1">
                                        <div class="row justify-content-center"></div>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <td>
                                        <button onclick="AddTableRow()" type="button" class="addtablerow" data-toggle="tooltip"
                                            data-placement="right" title="Adicionar Linha"
                                            style="outline: none; cursor: pointer;">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-plus-circle fa-stack-2x"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tfoot>
                            </table>
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
                    "modelo": {
                        required: true,
                    },
                    "tipo_equipamento": {
                        required: true,
                    },
                    "tipo_equipamento_op1": {
                        required: true,
                    },
                    "altura_equipamento": {
                        required: true,
                    },
                    "balanco": {
                        required: true,
                    },
                    "painel": {
                        required: true,
                    },
                    "corrente": {
                        required: true,
                    },
                    "motorredutores": {
                        required: true,
                    },
                    "pneus": {
                        required: true,
                    },
                    "opcionais": {
                        required: true,
                    },
                    "diametro": {
                        required: true,
                    },
                    "qtd_lances": {
                        required: true,
                    },
                    "qtd_tubos": {
                        required: true,
                    }
                },
                messages: {
                    modelo: "@lang('validate.validate')",
                    "tipo_equipamento": {
                        required: "@lang('validate.validate')"
                    },
                    "tipo_equipamento_op1": {
                        required: "@lang('validate.validate')"
                    },
                    "altura_equipamento": {
                        required: "@lang('validate.validate')"
                    },
                    "balanco": {
                        required: "@lang('validate.validate')"
                    },
                    "painel": {
                        required: "@lang('validate.validate')"
                    },
                    "corrente": {
                        required: "@lang('validate.validate')"
                    },
                    "motorredutores": {
                        required: "@lang('validate.validate')"
                    },
                    "pneus": {
                        required: "@lang('validate.validate')"
                    },
                    "opcionais": {
                        required: "@lang('validate.validate')"
                    },
                    "diametro": {
                        required: "@lang('validate.validate')"
                    },
                    "qtd_lances": {
                        required: "@lang('validate.validate')"
                    },
                    "qtd_tubos": {
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
