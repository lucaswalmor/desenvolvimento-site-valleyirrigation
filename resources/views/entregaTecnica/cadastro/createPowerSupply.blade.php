@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="form-row justify-content-start align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.alimentacao_eletrica') - @lang('comum.cadastrar')</h4>
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
        <form action="{{ route('save_technical_delivery_starter_key') }}" method="POST" class="mt-3" id="formdados">
            @csrf
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>  
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-md-12" id="cssPreloader">
                        {{-- AUTOTRÁFO --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-12 telo5ce">
                                <h3 for="gerador">@lang('entregaTecnica.autotrafo_elevacao')</h3>
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="potencia">@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</label>
                                <input type="number" id="potencia_" name="potencia_elevacao" class="form-control" value="{{ $autotrafos['potencia_elevacao'] }}">
                            </div>
                            <div class="form-group col-md-4 telo5ce">
                                <label for="tap_entrada">@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</label>
                                <input type="number" id="tap_entrada_" name="tap_entrada_elevacao" class="form-control" value="{{ $autotrafos['tap_entrada_elevacao'] }}">
                            </div>
                            <div class="form-group col-md-4 telo5ce">
                                <label for="tap_saida">@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</label>
                                <input type="number" id="tap_saida_" name="tap_saida_elevacao" class="form-control" value="{{ $autotrafos['tap_saida_elevacao'] }}">
                            </div>
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                <input type="text" id="numero_serie" name="numero_serie_elevacao" class="form-control" value="{{ $autotrafos['numero_serie_elevacao'] }}">
                            </div>
                            <div class="form-group col-md-4 telo5ce">
                                <label for="corrente_disjuntor">@lang('entregaTecnica.corrente_disjuntor')</label>
                                <input type="text" id="corrente_disjuntor" name="corrente_disjuntor" class="form-control" value="{{ $autotrafos['corrente_disjuntor'] }}">
                            </div>
                        </div>
                        

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-12 telo5ce">
                                <h3 for="gerador">@lang('entregaTecnica.autotrafo_rebaixamento')</h3>
                            </div>
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="potencia">@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</label>
                                <input type="number" id="potencia_" name="potencia_rebaixamento" class="form-control" value="{{ $autotrafos['potencia_rebaixamento'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="tap_entrada">@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</label>
                                <input type="number" id="tap_entrada_" name="tap_entrada_rebaixamento" class="form-control" value="{{ $autotrafos['tap_entrada_rebaixamento'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="tap_saida">@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</label>
                                <input type="number" id="tap_saida_" name="tap_saida_rebaixamento" class="form-control" value="{{ $autotrafos['tap_saida_rebaixamento'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                <input type="text" id="numero_serie" name="numero_serie_rebaixamento" class="form-control" value="{{ $autotrafos['numero_serie_rebaixamento'] }}">
                            </div>
                        </div>

                        {{-- GERADOR --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-12 telo5ce">
                                <h3 for="gerador">@lang('entregaTecnica.gerador')</h3>
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="gerador">@lang('entregaTecnica.tipo_gerador')</label>
                                <select name="gerador" id="gerador" class="form-control">
                                    <option value=""></option>
                                    @foreach ($gerador as $tipo)                                                            
                                        <option value="{{ $tipo['tipo'] }}" {{ ($tipo['tipo'] == $autotrafos['gerador']) ? 'selected' : '' }}>{{ __('listas.' . $tipo['tipo'] ) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="gerador_marca">@lang('entregaTecnica.gerador_marca')</label>
                                <input type="text" id="gerador_marca" name="gerador_marca" class="form-control" value="{{ $autotrafos['gerador_marca'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="gerador_modelo">@lang('entregaTecnica.gerador_modelo')</label>
                                <input type="text" id="gerador_modelo" name="gerador_modelo" class="form-control" value="{{ $autotrafos['gerador_modelo'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="gerador_potencia">@lang('entregaTecnica.gerador_potencia') @lang('unidadesAcoes.(cv)')</label>
                                <input type="number" id="gerador_potencia" name="gerador_potencia" class="form-control" value="{{ $autotrafos['gerador_potencia'] }}">
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="gerador_frequencia">@lang('entregaTecnica.gerador_frequencia') @lang('unidadesAcoes.(hz)')</label>
                                <input type="number" id="gerador_frequencia" name="gerador_frequencia" class="form-control" value="{{ $autotrafos['gerador_frequencia'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="gerador_tensao">@lang('entregaTecnica.gerador_tensao') @lang('unidadesAcoes.(v)')</label>
                                <input type="number" id="gerador_tensao" name="gerador_tensao" class="form-control" value="{{ $autotrafos['gerador_tensao'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="numero_serie_gerador">@lang('entregaTecnica.numero_serie')</label>
                                <input type="number" id="numero_serie_gerador" name="numero_serie_gerador" class="form-control" value="{{ $autotrafos['numero_serie_gerador'] }}">
                            </div>
                        </div>            
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
                { tipo: "{{ $chavePartidaAcionamento[$i]['tipo'] }}", modelo: "{{ $chavePartidaAcionamento[$i]['modelo'] }}", modelo_txt: "{{ __('listas.' . $chavePartidaAcionamento[$i]['modelo'] ) }}" },
            @php } @endphp
        ];
        
        $(document).ready(function() {

            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            $(".marca").change(function () {
                //Pegando o novo valor selecionado no combo
                var tipo = $(this).val();
            });

            $('#adicionarMotor').on('click', function() {
                AdicionarMotor();
            }); 

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
    
        // adiciona linhas dinamicas na tabela de lances
        function AddTableRow() {
            var rowCount = $('#tabelaTrechos > tbody > tr').length + 1;
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
                    text: tipo.modelo_txt //Nome da Subcategoria
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
            newCard += '                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_'+qt_card+'" aria-expanded="true" aria-controls="collapse_'+qt_card+'">';
            newCard += '                                        <h4>@lang("entregaTecnica.autotrafo_gerador")'+qt_card+'</h4>';
            newCard += '                                    </button>';
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
