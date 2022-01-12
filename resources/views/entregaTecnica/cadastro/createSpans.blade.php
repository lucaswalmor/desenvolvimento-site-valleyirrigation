@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.lances') - @lang('comum.cadastrar')</h4>
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

                <!-- modificação para botão salvar sair -->
                <button type="button" id="saveoutbutton" data-toggle="tooltip" data-placement="bottom" title="Salvar e Sair">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-chevron-right fa-stack-1x fa-inverse" style="margin-left:15px;"></i>
                        <i class="fas fa-save fa-stack-1x fa-inverse"style=" margin-left:-6px;"></i>
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
        <form action="{{ route('save_technical_delivery_span') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>        
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <input type="hidden" name="tipo_equipamento" id="tipo_equipamento" value="{{$tipo_equipamento}}">
            <input type="hidden" name="tem_lance" id="tem_lance" value="{{ $tem_lances }}">
            <!-- modificação para botão salvar sair -->
            <input type="hidden" name="savebuttonvalue" id="savebuttonvalue" value="save">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-md-12" id="cssPreloader">
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th scope="col-5">#</th>
                                            <th scope="col-5">@lang('entregaTecnica.diametro')</th>
                                            <th scope="col-5">@lang('entregaTecnica.qtd_tubos')</th>
                                            <th scope="col-5">@lang('entregaTecnica.motorredutor_marca')</th>
                                            <th scope="col-5">@lang('entregaTecnica.motorredutor_potencia')</th>
                                            <th scope="col-5">@lang('entregaTecnica.numero_serie')</th>
                                            <th scope="col-5">@lang('entregaTecnica.comprimento') @lang('unidadesAcoes.(m)')</th>
                                            <th scope="col-2">@lang('bocais.acoes')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($diametro) > 0)
                                            @foreach ($diametro as $item)                                            
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="diametro[]" id="diametro_value_<?= $item['id_lance'] ?>" value="{{ $item['diametro_tubo']}}">
                                                        <input type="hidden" name="id_lance[]" id="id_lance_<?= $item['id_lance'] ?>" value="<?= $item['id_lance'] ?>">
                                                        <span><?= $item['id_lance'] ?></span>
                                                    </td>
                                                    @if (!empty($diametro['diametro_tubo']))
                                                        <td class="col-md-2" >
                                                            <select name="diametro_select" id="diametro_<?= $item['id_lance'] ?>" class="form-control diametro" onchange="carregaQtdTubos($(this).val(), <?= $item['id_lance'] ?>)">
                                                                <option value=""></option>
                                                                @foreach ($getListaDiametroTipo as $lista)
                                                                    @if ($lista['tipo'] == $tipo_equipamento)
                                                                        <option value="{{ $lista['diametro']}}" {{ $lista['diametro'] == $item['diametro_tubo'] ? 'selected' : ''}} >{{  __('listas.'. $lista['diametro'] ) }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @else                                                    
                                                        <td class="col-md-2">
                                                            <select name="diametro_select" id="diametro_1" class="form-control diametro" onchange="carregaQtdTubos($(this).val(), 1)">
                                                                <option value=""></option>
                                                            </select>
                                                        </td>
                                                    @endif                                                    
                                                    <td class="col-md-2">
                                                        <select name="qtd_tubos[]" id="qtd_tubos_<?= $item['id_lance'] ?>" class="form-control" onchange="calculoLances(this);">                                                        
                                                            <option value=""></option>
                                                            @foreach ($tipoLances as $lista)
                                                                @if ($lista['diametro'] == $item['diametro_tubo'])
                                                                    <option value="{{ $lista['qtd_tubo'] . '_' . $lista['modelo'] }}" {{ $lista['qtd_tubo'] == $item['quantidade_tubo'] ? 'selected' : ''}} >{{ $lista['qtd_tubo']}} ({{  __('listas.'. $lista['modelo'] ) }})</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <select name="motorredutor_marca[]" class="form-control" id="motorredutor_marca_<?= $item['id_lance'] ?>">
                                                            <option value=""></option>
                                                            @foreach ($marcaMotorredutor as $marca)
                                                                <option value="{{ $marca['marca'] }}" {{ $marca['marca'] == $item['motorredutor_marca'] ? 'selected' : ''}}>{{ $marca['marca'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>                                                
                                                    <td class="col-md-2">
                                                        <select name="motorredutor_potencia[]" class="form-control" id="motorredutor_potencia_<?= $item['id_lance'] ?>">
                                                            <option value=""></option>
                                                            @foreach ($motorredutores as $motorredutor)
                                                                <option value="{{ $motorredutor['motoredutor_potencia'] }}" {{ $motorredutor['motoredutor_potencia'] == $item['motorredutor_potencia'] ? 'selected' : ''}}>{{ $motorredutor['motoredutor_potencia'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="col-md-2">
                                                        <input type="number" name="numero_serie[]" id="numero_serie_<?= $item['id_lance'] ?>" value="{{ $item['numero_serie'] }}" class="form-control">
                                                    </td>
                                                    <td class="col-md-2"><input type="text" class="form-control" id="comprimento_<?= $item['id_lance'] ?>" value="{{ $item['comprimento_lance'] }}" readonly></td>
                                                    @if ($item['id_lance'] > 1)
                                                        <td class="col-md-1">
                                                            <button type="button" class="removetablerow" onclick="remove(this)" style="outline: none; cursor: pointer; margin-top: 4px; justify-content: center;">
                                                                <i class="fa fa-fw fa-times fa-lg"></i>
                                                            </button>
                                                        </td>
                                                    @endif                                                    
                                                </tr>
                                            @endforeach                                              
                                        @else
                                            <tr>
                                                <input type="hidden" name="diametro[]" id="diametro_value_1" value="1">
                                                <input type="hidden" name="id_lance[]" id="id_lance_1" value="1">
                                                <td>
                                                    <span class="align-middle">1</span>
                                                </td>
                                                <td class="col-md-2">
                                                    <select name="diametro_select" id="diametro_1" class="form-control diametro" onchange="carregaQtdTubos($(this).val(), 1)">
                                                        <option value=""></option>
                                                    </select>
                                                </td>
                                                <td class="col-md-2">
                                                    <select name="qtd_tubos[]" id="qtd_tubos_1" class="form-control" onchange="calculoLances(this);">
                                                        
                                                    </select>
                                                </td>
                                                <td class="col-md-2">
                                                    <select name="motorredutor_marca[]" class="form-control" id="motorredutor_marca_1">
                                                        <option value=""></option>
                                                        @foreach ($marcaMotorredutor as $marca)
                                                            <option value="{{ $marca['marca'] }}" {{ $marca['marca'] == $item['motorredutor_marca'] ? 'selected' : ''}}>{{ $marca['marca'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>                                                
                                                <td class="col-md-2">
                                                    <select name="motorredutor_potencia[]" class="form-control" id="motorredutor_potencia_1">
                                                        <option value=""></option>
                                                        @foreach ($motorredutores as $motorredutor)
                                                            <option value="{{ $motorredutor['motoredutor_potencia'] }}" {{ $motorredutor['motoredutor_potencia'] == $item['motorredutor_potencia'] ? 'selected' : ''}}>{{ $motorredutor['motoredutor_potencia'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="col-md-2">
                                                    <input type="number" name="numero_serie[]" id="numero_serie" class="form-control">
                                                </td>
                                                <td><input type="text" class="form-control" id="comprimento_1" readonly></td>
                                                <td class="col-md-1">
                                                    <div class="row justify-content-center"></div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <td>
                                            <button onclick="AddTableRow()" type="button" class="addtablerow" id="addtablerow" style="margin-left: 0 !important" data-toggle="tooltip"
                                                data-placement="right" title="Adicionar Linha" disabled
                                                style="outline: none; cursor: pointer;">
                                                <span class="fa-stack fa-sm">
                                                    <i class="fas fa-plus-circle fa-stack-2x"></i>
                                                </span>
                                            </button>
                                        </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </form>


@endsection

@section('scripts')
    {{-- REMOVER LINHAS DA TABELA --}}
    <script>
        (function($) {
            remove = function(item)
            {
                var tr = $(item).closest('tr');
                var rowCount = $('#tabelaTrechos > tbody > tr').length;
                
                tr.fadeOut(400, function()
                {       
                    tr.remove();
                });

                $('#diametro_' + (rowCount - 1)).prop('disabled', false);

                return true;
            }
        })(jQuery);

    </script>

    {{-- COMBOS DE SELECTS --}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        //Array de diametro em JSON puro
        var diametro = [
            @php for ($i = 0; $i < count($getListaDiametroTipo); $i++) { @endphp
                { diame: "{{ $getListaDiametroTipo[$i]['tipo'] }}", value: "{{ $getListaDiametroTipo[$i]['diametro'] }}" },
            @php } @endphp
        ];

        //Array de tipoLances em JSON puro
        var tipoLances = [
            @php for ($i = 0; $i < count($tipoLances); $i++) { @endphp
                { diam: "{{ $tipoLances[$i]['diametro'] }}", value: "{{ $tipoLances[$i]['qtd_tubo'] . '_' . $tipoLances[$i]['modelo'] }}", qtd: "{{ $tipoLances[$i]['qtd_tubo'] }} ({{ __('listas.'. $tipoLances[$i]['modelo'] ) }})",  comprimento: "{{ $tipoLances[$i]['tamanho']}}" },
            @php } @endphp
        ];

        //Array de diametroLances em JSON puro        
        var diametroLances = [
            @php for ($i = 0; $i < count($diametroLances); $i++) { @endphp
                { diametro: "{{ $diametroLances[$i]['diametro'] }}"},
            @php } @endphp
        ];

        $(document).ready(function () {
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            
            carregaDiametroEquipamento();
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            /* modificação para botão salvar sair */
            $('#saveoutbutton').on('click', function() {  
                $("#savebuttonvalue").val("saveout");
                $('#formdados').submit();
            });      

            var count_lines = $('#tabelaTrechos > tbody > tr').length + 1;
            last_value = $('#diametro_' + (count_lines - 1));
            $(last_value).on('change', function(){
                verify_value = $('#diametro_' + (count_lines - 1)).val();
                console.log(verify_value)
                if (verify_value != null && verify_value != undefined) {
                    $('#addtablerow').prop('disabled', false);
                }
            });
            calculoLances();

            var tipo_equipamento = $('#tipo_equipamento').val();            
        });

        // Carrega a lista de opcoes do equipamento
        function carregaDiametroEquipamento() {

            var tipo_equipamento = $('#tipo_equipamento').val();
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var diametroEquipamentoFiltro = $.grep(diametro, function (e) { return e.diame == tipo_equipamento; });
            
            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2 
            $.each(diametroEquipamentoFiltro, function (i, diame) {
                $("#diametro_1").append($('<option>', {
                    value: diame.value, //Id do objeto subcategoria
                    text: diame.value //Nome da Subcategoria
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
            $('#addtablerow').prop('disabled', true);
            var rowCount = $('#tabelaTrechos > tbody > tr').length + 1;
            var newRow = $("<tr>");
            var cols = "";

            var tipo_equipamento = $('#tipo_equipamento').val();
            var lista_diametros = $.grep(diametro, function (e) { return e.diame == tipo_equipamento; });

            valor_anterior = $('#diametro_' + (rowCount - 1) + ' option:selected').val();
            valor_anterior = parseInt(valor_anterior.substring(0, 3));

            valor_anterior_motorredutor = $('#motorredutor_marca_' + (rowCount - 1) + ' option:selected').val();

            cols += '<td>';            
                cols += '<input type="hidden" name="diametro[]" id="diametro_value_' + rowCount + '"  value="' + rowCount +'">'
                cols += '<input type="hidden" name="id_lance[]" id="id_lance_' + rowCount + '" value="' + rowCount +'">'
                cols += '<span> '+ rowCount +' </span>';
            cols += '</td>';       

            cols += '<td>';
            cols +=     '<select name="diametro_select" id="diametro_' + rowCount + '" class="diametro form-control" onchange="carregaQtdTubos($(this).val(), '+ rowCount +')">';
            cols +=         '<option value=""></option>';
            for (i = 0; i < lista_diametros.length; i++) {
                valor_atual = parseInt(lista_diametros[i]['value'].substring(0, 3));
                if (valor_atual <= valor_anterior) {
                    $('#diametro_' + (rowCount - 1)).prop('disabled', 'disabled');
                    cols +=  '<option value="' + lista_diametros[i]['value'] + '"> ' + lista_diametros[i]['value'] + ' </option>';
                }
            }
            cols +=     '</select>';
            cols += '</td>';       

            cols += '<td>';
            cols +=     '<select name="qtd_tubos[]" id="qtd_tubos_' + rowCount + '" class="qtd_tubos form-control" onclick="calculoLances(this);">';
            cols +=         '<option value=""></option>';
            cols +=     '</select>';
            cols += '</td>';

            cols += '<td class="col-md-2">';
            cols += '    <select name="motorredutor_marca[]" class="form-control" id="motorredutor_marca_' + rowCount + '">';
            cols += '        <option value=""></option>';
            cols += '        @foreach ($marcaMotorredutor as $marca)';
            // if (valor_anterior_motorredutor != null) {
            //     var selected = '';                 
            //     @if ($marca["marca"] == valor_anterior_motorredutor) {
            //         console.log('teste')
            //     }
            //     @endif 
            // cols += '            <option value="{{ $marca["marca"] }}"  {{(  $marca["marca"] == "'+ valor_anterior_motorredutor +'") ? "selected" : "" }} >{{ $marca["marca"] }}</option>';                                
            // } else {
            // }
            cols += '            <option value="{{ $marca["marca"] }}" {{ $marca["marca"] == $item["motorredutor_marca"] ? "selected" : ""}}>{{ $marca["marca"] }}</option>';
            cols += '        @endforeach';
            cols += '    </select>';
            cols += '</td>';
            cols += '<td class="col-md-2">';
            cols += '    <select name="motorredutor_potencia[]" class="form-control" id="motorredutor_potencia_' + rowCount + '">';
            cols += '        <option value=""></option>';
            cols += '        @foreach ($motorredutores as $motorredutor)';
            cols += '            <option value="{{ $motorredutor["motoredutor_potencia"] }}" {{ $motorredutor["motoredutor_potencia"] == $item["motorredutor_potencia"] ? "selected" : ""}}>{{ $motorredutor["motoredutor_potencia"] }}</option>';
            cols += '        @endforeach';
            cols += '    </select>';
            cols += '</td>';
            cols += '<td class="col-md-2">';
            cols += '    <input type="number" name="numero_serie[]" id="numero_serie" class="form-control">';
            cols += '</td>';

            cols +='<td><input type="text" class="form-control" id="comprimento_' + rowCount + '" readonly></td>';            

            if (rowCount > 0) {
                cols += '<td><div class="row justify-content-center"><button type="button" class="removetablerow" onclick="remove(this)" style="outline: none; cursor: pointer; margin-top: 4px; justify-content: center;"><i class="fa fa-fw fa-times fa-lg"></i></button></div></td>';
            }

            newRow.append(cols);
            $("#tabelaTrechos").append(newRow);
            return false;
        }

        function calculoLances(input) {
            var id_qtd_tubos = $(input).attr('id');
            var xArray = id_qtd_tubos.split("_");
            var noLinha = xArray[2];
            var comprimento = $('#' + id_qtd_tubos).val();

            for (var i = 0; i < tipoLances.length; i++) {
                var tamanho_6 = tipoLances[i].comprimento.slice(0, -1);
                var tamanho_7 = tipoLances[i].comprimento.slice(0, -1);
                var tamanho_8 = tipoLances[i].comprimento.slice(0, -1);
                var tamanho_9 = tipoLances[i].comprimento.slice(0, -1);
                var calc_tubo_6 = 6 * parseInt(tipoLances[i].comprimento.slice(0, -1));
                var calc_tubo_7 = 7 * parseInt(tipoLances[i].comprimento.slice(0, -1));
                var calc_tubo_8 = 8 * parseInt(tipoLances[i].comprimento.slice(0, -1));
                var calc_tubo_9 = 9 * parseInt(tipoLances[i].comprimento.slice(0, -1));
                switch (comprimento) {
                    case '6_padrao':
                        if (tipoLances[i].value == '6_padrao') {
                            $('#comprimento_' + noLinha).val(tamanho_6);
                            $('#comprimento_total_' + noLinha).val(calc_tubo_6);                                
                        }                            
                        break;
                    case '7_medio':
                        if (tipoLances[i].value == '7_medio') {
                            $('#comprimento_' + noLinha).val(tamanho_7);
                            $('#comprimento_total_' + noLinha).val(calc_tubo_7);                                
                        }                            
                        break;
                    case '8_longo':
                        if (tipoLances[i].value == '8_longo') {
                            $('#comprimento_' + noLinha).val(tamanho_8);
                            $('#comprimento_total_' + noLinha).val(calc_tubo_8);                                
                        }                        
                        break;
                    case '9_extra_longo':
                        if (tipoLances[i].value == '9_extra_longo') {
                            $('#comprimento_' + noLinha).val(tamanho_9);
                            $('#comprimento_total_' + noLinha).val(calc_tubo_9);                                
                        }                        
                        break;
                }                       
            }

        }
    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
