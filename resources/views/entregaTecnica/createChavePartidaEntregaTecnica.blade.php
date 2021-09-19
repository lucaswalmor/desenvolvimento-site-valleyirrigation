@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="form-row justify-content-start align-items-start">

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
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.pressurizacao_cp_aut')</a>
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
        <form action="{{ route('save_technical_delivery_starter_key') }}" method="POST" class="mt-3" id="formdados">
            @csrf
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-md-12" id="cssPreloader">
      
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th>@lang('entregaTecnica.marca')</th>
                                            <th>@lang('entregaTecnica.acionamento')</th>
                                            <th>@lang('entregaTecnica.regulagem_reles')</th>
                                            <th>@lang('entregaTecnica.numero_serie')</th>
                                            <th>@lang('bocais.acoes')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="marca[]" id="marca_0" class="form-control marca" onchange="carregaAcionamento($(this).val(), 0)">
                                                    <option value=""></option>
                                                    @foreach ($chavePartida as $chave)
                                                        <option value="{{ $chave['tipo'] }}">{{ $chave['tipo'] }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="acionamento[]" id="acionamento_0" class="form-control">

                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="regulagem_reles[]" id="regulagem_reles_0" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" name="numero_serie[]" id="numero_serie" class="form-control">
                                            </td>
                                            <td></td>
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
                                        <td></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>        
                        <div class="accordion" id="accordionMotor">
                            <div class="card">
                                <div class="card-header" id="heading_01">
                                    <a class="btn btn-header-link" data-toggle="collapse" data-parent="#accordionMotor" href="#collapse_01" aria-expanded="true" aria-controls="collapse_01">Autotráfo / Gerador 1</a>
                                </div>

                                <div id="collapse_01" class="collapse show" aria-labelledby="heading_01" data-parent="#accordionMotor">
                                    <div class="card-body">
                                        {{-- AUTOTRÁFO --}}
                                        <div class="form-row justify-content-start">
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="potencia">@lang('entregaTecnica.potencia')</label>
                                                <input type="number" id="potencia_01" name="potencia[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="tap_entrada">@lang('entregaTecnica.tap_entrada')</label>
                                                <input type="number" id="tap_entrada_01" name="tap_entrada[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="tap_saida">@lang('entregaTecnica.tap_saida')</label>
                                                <input type="number" id="tap_saida_01" name="tap_saida[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="chave_seccionadora">@lang('entregaTecnica.chave_seccionadora')</label>
                                                <select name="chave_seccionadora[]" id="chave_seccionadora_01" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($chaveSeccionadora as $seccionadora)
                                                        <option value="{{ $seccionadora['tipo'] }}">{{ __('listas.' . $seccionadora['tipo'] ) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- GERADOR --}}
                                        <div class="form-row justify-content-start">
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="gerador">@lang('entregaTecnica.gerador')</label>
                                                <select name="gerador[]" id="gerador_01" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($gerador as $tipo)
                                                        <option value="{{ $tipo['tipo'] }}">{{ __('listas.' . $tipo['tipo'] ) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="gerador_marca">@lang('entregaTecnica.gerador_marca')</label>
                                                <input type="number" id="gerador_marca_01" name="gerador_marca[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="gerador_modelo">@lang('entregaTecnica.gerador_modelo')</label>
                                                <input type="number" id="gerador_modelo_01" name="gerador_modelo[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="gerador_potencia">@lang('entregaTecnica.gerador_potencia')</label>
                                                <input type="number" id="gerador_potencia_01" name="gerador_potencia[]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-row justify-content-start">
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="gerador_frequencia">@lang('entregaTecnica.gerador_frequencia')</label>
                                                <input type="number" id="gerador_frequencia_01" name="gerador_frequencia[]" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3 telo5ce">
                                                <label for="gerador_tensao">@lang('entregaTecnica.gerador_tensao')</label>
                                                <input type="number" id="gerador_tensao_01" name="gerador_tensao[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>        
                            </div>
                        </div>     
        
                        <div class="form-row justify-content-start mt-3">
                            <div class="col-md-3">
                                <button type="button" id="adicionarMotor" class="voltar">@lang('entregaTecnica.adicionar_motor')</button>
                            </div>
                        </div>    

                        {{-- BOTOES PARA SALVAR --}}
                        <div class="form-row justify-content-start justify-content-center botaoAfericao mb-4" id="botoesSalvar">
                            <button class="proximo ml-2" type="" name="botao" value="sair"
                                id="botaosalvar">@lang('unidadesAcoes.salvarSair')
                            </button>

                            <button class="proximo ml-2" name="botao" value="proximo" type=""
                                id="botaosalvar">@lang('unidadesAcoes.proximo')
                            </button>
                        </div>
                        <br><br>                
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection

@section('scripts')

    {{-- VALIDAÇÕES DE CAMPOS --}}
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script>
        //Array de TipoEquipOp em JSON puro
        var acionamento = [
            @php for ($i = 0; $i < count($chavePartidaAcionamento); $i++) { @endphp
                { tipo: "{{ $chavePartidaAcionamento[$i]['tipo'] }}", modelo: "{{ __('listas.' . $chavePartidaAcionamento[$i]['modelo'] ) }}" },
            @php } @endphp
        ];
        
        $(document).ready(function() {
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            $("#formdados").validate({
                rules: {
                    "marca[]": {
                        required: true,
                    },
                    "acionamento[]": {
                        required: true,
                    },
                    "regulagem_reles[]": {
                        required: true,
                    },
                    "numero_serie[]": {
                        required: true,
                    },
                    "potencia[]": {
                        required: true,
                    },
                    "tap_entrada[]": {
                        required: true,
                    },
                    "tap_saida[]": {
                        required: true,
                    },
                    "chave_seccionadora[]": {
                        required: true,
                    },
                    "gerador[]": {
                        required: true,
                    },
                    "gerador_marca[]": {
                        required: true,
                    },
                    "gerador_modelo[]": {
                        required: true,
                    },
                    "gerador_potencia[]": {
                        required: true,
                    },
                    "gerador_frequencia[]": {
                        required: true,
                    },
                    "gerador_tensao[]": {
                        required: true,
                    }
                },
                messages: {
                    "marca[]": "@lang('validate.validate')",
                    "acionamento[]": {
                        required: "@lang('validate.validate')"
                    },
                    "regulagem_reles[]": {
                        required: "@lang('validate.validate')"
                    },
                    "numero_serie[]": {
                        required: "@lang('validate.validate')"
                    },
                    "potencia[]": {
                        required: "@lang('validate.validate')"
                    },
                    "tap_entrada[]": {
                        required: "@lang('validate.validate')"
                    },
                    "tap_saida[]": {
                        required: "@lang('validate.validate')"
                    },
                    "chave_seccionadora[]": {
                        required: "@lang('validate.validate')"
                    },
                    "gerador[]": {
                        required: "@lang('validate.validate')"
                    },
                    "gerador_marca[]": {
                        required: "@lang('validate.validate')"
                    },
                    "gerador_modelo[]": {
                        required: "@lang('validate.validate')"
                    },
                    "gerador_potencia[]": {
                        required: "@lang('validate.validate')"
                    },
                    "gerador_frequencia[]": {
                        required: "@lang('validate.validate')"
                    },
                    "gerador_tensao[]": {
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

            $(".marca").change(function () {
                //Pegando o novo valor selecionado no combo
                var tipo = $(this).val();
            });

            $('#adicionarMotor').on('click', function() {
                AdicionarMotor();
            }); 

            //carregar o combo baseado na categoria selecionada
            carregaAcionamento(0);

            //Definir o item selecionado no carregamento da página
            $("#marca_0").val(0);
            
            //Selecionar a subcategoria passando o id dela            
            $("#acionamento").val(0);

            // REMOVER LINHAS DA TABELA
            remove = function(item)
            {
                var tr = $(item).closest('tr');
                var rowCount = $('#tabelaTrechos > tbody > tr').length;
                
                tr.fadeOut(400, function()
                {       
                    tr.remove();
                });
                
                console.log($('#diametro_' + (rowCount - 1) + ' option:selected').val());
                console.log('#diametro_' + (rowCount - 1));

                $('#diametro_' + (rowCount - 1)).prop('disabled', false);

                return true;
            }
        });

        
        $(window).on('load', function() {
            $("#coverScreen").hide();
        });
    
        // adiciona linhas dinamicas na tabela de lances
        function AddTableRow() {
            var rowCount = $('#tabelaTrechos > tbody > tr').length;
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td>';
            cols +=     '<select name="marca[]" id="marca_' + rowCount + '" class="form-control" onchange="carregaAcionamento($(this).val(), ' + rowCount + ')" >';
            cols +=         '<option value=""></option>';
            cols +=         '@foreach ($chavePartida as $chave)';
            cols +=             '<option value="{{ $chave["tipo"] }}">{{ $chave["tipo"] }}</option>';
            cols +=         '@endforeach';
            cols +=     '</select>';
            cols += '</td>';    
            
            cols += '<td>';
            cols +=    '<select name="acionamento[]" id="acionamento_' + rowCount + '" class="form-control">';
            cols +=     '</select>';
            cols += '</td>';
            
            cols +='<td><input type="text" class="form-control" required name="regulagem_reles[]" id="regulagem_reles_' + rowCount + '"></td>';
            cols +='<td><input type="text" class="form-control" required name="numero_serie[]" id="numero_serie_' + rowCount + '"></td>';


            if (rowCount > 0) {
                cols += '<td><div class="row justify-content-center"><button type="button" class="removetablerow" onclick="remove(this)" style="outline: none; cursor: pointer; margin-top: 4px; justify-content: center;"><i class="fa fa-fw fa-times fa-lg"></i></button></div></td>';
            }
            
            newRow.append(cols);
            $("#tabelaTrechos").append(newRow);
            return false;
        }

        // Carrega a lista de opcoes do equipamento
        function carregaAcionamento(tipo, id_acionamento) {
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var acionamento_chave = $.grep(acionamento, function (e) { return e.tipo == tipo; });
            //Faz o append (adiciona) cada um dos itens do array filtrado no Acionamento
            $("#acionamento_" + id_acionamento).html('<option>Selecione...</option>');
            $.each(acionamento_chave, function (i, tipo) {
                $("#acionamento_" + id_acionamento).append($('<option>', {
                    value: tipo.modelo, //Id do objeto subcategoria
                    text: tipo.modelo //Nome da Subcategoria
                }));
            });
        }

        function AdicionarMotor() {
            var newCard = "";
            var numero_motor = parseInt($('.card').length) + 1;
            var qt_card = ("00" + numero_motor.toString()).slice(-2);

            newCard += ''; 
            newCard += '                            <div class="card">';
            newCard += '                                <div class="card-header" id="heading_'+qt_card+'">';
            newCard += '                                    <a class="btn btn-header-link" data-toggle="collapse" data-parent="#accordionMotor" href="#collapse_'+qt_card+'" aria-expanded="true" aria-controls="collapse_'+qt_card+'">Autotráfo / Gerador '+numero_motor.toString()+'</a>';
            newCard += '                                </div>';

            newCard += '                                <div id="collapse_'+qt_card+'" class="collapse show" aria-labelledby="heading_'+qt_card+'" data-parent="#accordionMotor">';
            newCard += '                                    <div class="card-body">';
            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="potencia">@lang("entregaTecnica.potencia")</label>';
            newCard += '                                                <input type="number" id="potencia_'+qt_card+'" name="potencia[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="tap_entrada">@lang("entregaTecnica.tap_entrada")</label>';
            newCard += '                                                <input type="number" id="tap_entrada_'+qt_card+'" name="tap_entrada[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="tap_saida">@lang("entregaTecnica.tap_saida")</label>';
            newCard += '                                                <input type="number" id="tap_saida_'+qt_card+'" name="tap_saida[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="potencia">@lang("entregaTecnica.potencia")</label>';
            newCard += '                                                <select name="chave_seccionadora[]" id="chave_seccionadora_'+qt_card+'" class="form-control">';
            newCard += '                                                   <option value=""></option>';
            newCard += '                                                   @foreach ($chaveSeccionadora as $seccionadora)';
            newCard += '                                                      <option value="{{ $seccionadora["tipo"] }}">{{ __("listas." . $seccionadora["tipo"] ) }}</option>';
            newCard += '                                                   @endforeach';
            newCard += '                                                </select>';
            newCard += '                                            </div>';
            newCard += '                                         </div>';

            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="gerador">@lang("entregaTecnica.gerador")</label>';
            newCard += '                                                <select name="gerador[]" id="gerador_'+qt_card+'" class="form-control">';
            newCard += '                                                   <option value=""></option>';
            newCard += '                                                   @foreach ($gerador as $tipo)';
            newCard += '                                                      <option value="{{ $tipo["tipo"] }}">{{ __("listas." . $tipo["tipo"] ) }}</option>';
            newCard += '                                                   @endforeach';
            newCard += '                                                </select>';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="gerador_marca">@lang("entregaTecnica.gerador_marca")</label>';
            newCard += '                                                <input type="number" id="gerador_marca_'+qt_card+'" name="gerador_marca[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="gerador_modelo">@lang("entregaTecnica.gerador_modelo")</label>';
            newCard += '                                                <input type="number" id="gerador_modelo_'+qt_card+'" name="gerador_modelo[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="gerador_potencia">@lang("entregaTecnica.gerador_potencia")</label>';
            newCard += '                                                <input type="number" id="gerador_potencia_'+qt_card+'" name="gerador_potencia[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                         </div>';

            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="gerador_frequencia">@lang("entregaTecnica.gerador_frequencia")</label>';
            newCard += '                                                <input type="number" id="gerador_frequencia_'+qt_card+'" name="gerador_frequencia[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-3 telo5ce">';
            newCard += '                                                <label for="gerador_tensao">@lang("entregaTecnica.gerador_tensao")</label>';
            newCard += '                                                <input type="number" id="gerador_tensao_'+qt_card+'" name="gerador_tensao[]" class="form-control">';
            newCard += '                                            </div>';
            newCard += '                                         </div>';            
            newCard += '                                      </div>';
            newCard += '                                 </div>';
            newCard += '                             </div>';


            $('#accordionMotor').append(newCard);
        }


    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
