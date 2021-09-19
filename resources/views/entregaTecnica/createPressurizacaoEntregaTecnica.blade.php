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
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.pressurizacao_motor')</a>
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
        <form action="{{ route('save_technical_delivery_pressurization') }}" method="POST" class="mt-3" id="formdados">
            @csrf
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <input type="hidden" name="id_bomba" id="id_bomba" value="{{$id_bomba}}">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-md-12" id="cssPreloader">
                        <div class="container-fluid">
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="quantidade">@lang('entregaTecnica.quantidade')</label>
                                    <input type="number" class="form-control" name="quantidade" id="quantidade">
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="ligacao">@lang('entregaTecnica.ligacao')</label>
                                    <select class="form-control" name="ligacao" id="ligacao" disabled>
                                        <option value=""></option>
                                        @foreach ($bombaLigacao as $ligacao)
                                            <option value="{{ $ligacao['tipo'] }}">{{ __('listas.' . $ligacao['tipo'] ) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="marca">@lang('entregaTecnica.marca')</label>
                                    <select class="form-control" name="marca" id="marca">
                                        <option value=""></option>
                                        @foreach ($bomba_marca as $marca)
                                            <option value="{{ $marca['bomba_marca'] }}">{{ $marca['bomba_marca'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <div class="form-group">
                                        <label for="modelo">@lang('entregaTecnica.modelo')</label>
                                        <select class="form-control" name="modelo" id="modelo">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <div class="form-group">
                                        <label for="numero_estagio">@lang('entregaTecnica.numero_estagio')</label>
                                        <input type="number" class="form-control" name="numero_estagio" id="numero_estagio">
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="rotor">@lang('entregaTecnica.rotor') (mm)</label>
                                    <input type="number" class="form-control" name="rotor" id="rotor">
                                </div>
                                <div class="form-group col-md-8 telo5ce">
                                    <label for="opcionais">@lang('entregaTecnica.opcionais')</label>
                                    <input type="text" class="form-control" name="opcionais" id="opcionais">
                                </div>
                            </div>
        
                            <div class="accordion" id="accordionMotor">
                                <div class="card">
                                    <div class="card-header" id="heading_01">
                                        <a class="btn btn-header-link" data-toggle="collapse" data-parent="#accordionMotor" href="#collapse_01" aria-expanded="true" aria-controls="collapse_01">Motor 1</a>
                                    </div>
    
                                    <div id="collapse_01" class="collapse show" aria-labelledby="heading_01" data-parent="#accordionMotor">
                                        <div class="card-body">
                                            <div class="form-row justify-content-start">
                                                <div class="form-group col-md-4 telo5ce">
                                                    <label for="tipo_motor">@lang('entregaTecnica.tipo_motor')</label>
                                                    <select class="form-control" name="tipo_motor[]" id="tipo_motor_01" required onchange="alterarMotor($(this).val(), 1)">
                                                        <option value=""></option>
                                                        @foreach ($tipo_motor as $motor)
                                                            <option value="{{ $motor['tipo'] }}">{{ __('listas.' . $motor['tipo'] ) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div id="diesel_01" style="display: none" class="form-group col-md-12 telo5ce row">
                                                    <div class="form-group col-md-4">
                                                        <label for="marca_motor">@lang('entregaTecnica.marca')</label>
                                                        <select class="form-control" name="marca_motor[]" id="marca_motor_01" required>
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">
                                                        <label for="modelo_motor">@lang('entregaTecnica.modelo')</label>
                                                        <input type="text" class="form-control" name="modelo_motor[]" id="modelo_motor_01" required>
                                                    </div>  
                                                </div>
                                                
                                                <div id="eletrico_01" class="form-group col-md-12 telo5ce row">                                                        
                                                    <div class="form-group col-md-4" style="padding-right: 0">
                                                        <label for="marca_motor">@lang('entregaTecnica.marca')</label>
                                                        <input type="text" class="form-control" name="marca_motor_eletrico[]" id="marca_motor_eletrico_01" disabled required>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">
                                                        <label for="modelo_motor">@lang('entregaTecnica.modelo')</label>
                                                        <input type="text" class="form-control" name="modelo_motor_eletrico[]" id="modelo_motor_eletrico_01" disabled required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row justify-content-start" id="diesel_eletrico_01">
                                                <div class="form-group col-md-4 telo5ce">
                                                    <label for="potencia">@lang('entregaTecnica.potencia')</label>
                                                    <input type="number" class="form-control" name="potencia[]" id="potencia_01" disabled required>
                                                </div>
                                                <div class="form-group col-md-4 telo5ce">
                                                    <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                                    <input type="number" class="form-control" name="numero_serie[]" id="numero_serie_01" disabled required>
                                                </div>
                                                <div class="form-group col-md-4 telo5ce">
                                                    <label for="rotacao">@lang('entregaTecnica.rotacao')</label>
                                                    <input type="number" class="form-control" name="rotacao[]" id="rotacao_01" disabled required>  
                                                </div>
                                            </div>   
                                            
                                            <div id="campos_motor_eletrico_01" style="display: none;">
                                                <div class="form-row justify-content-start">
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="tensao">@lang('entregaTecnica.tensao')</label>
                                                        <input type="number" class="form-control" name="tensao[]" id="tensao_01" required>
                                                    </div>
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="lp_ln">@lang('entregaTecnica.lp_ln')</label>
                                                        <input type="number" class="form-control" name="lp_ln[]" id="lp_ln_01" required>
                                                    </div>
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="classe_isolamento">@lang('entregaTecnica.classe_isolamento')</label>
                                                        <input type="number" class="form-control" name="classe_isolamento[]" id="classe_isolamento_01" required>
                                                    </div>
                                                </div>
                
                                                <div class="form-row justify-content-start">
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="corrente_nominal">@lang('entregaTecnica.corrente_nominal')</label>
                                                        <input type="number" class="form-control" name="corrente_nominal[]" id="corrente_nominal_01" required>
                                                    </div>
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="fs">@lang('entregaTecnica.fs')</label>
                                                        <input type="number" class="form-control" name="fs[]" id="fs_01" required>
                                                    </div>
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="ip">@lang('entregaTecnica.ip')</label>
                                                        <input type="number" class="form-control" name="ip[]" id="ip_01" required>
                                                    </div>
                                                </div>
                
                                                <div class="form-row justify-content-start">
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="rendimento">@lang('entregaTecnica.rendimento')</label>
                                                        <input type="number" class="form-control" name="rendimento[]" id="rendimento_01" required>
                                                    </div>
                                                    <div class="form-group col-md-4 telo5ce">
                                                        <label for="cos">@lang('entregaTecnica.cos')</label>
                                                        <input type="number" class="form-control" name="cos[]" id="cos_01" required>
                                                    </div>
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

                                <button class="proximo ml-2" type="" name="botao" value="nova_bomba"
                                    id="botaosalvar">@lang('unidadesAcoes.nova_bomba')
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
        //Array de bomba_modelo em JSON puro
        var bomba_modelo = [
            @php for ($i = 0; $i < count($bomba_modelo); $i++) { @endphp
                { marca: "{{ $bomba_modelo[$i]['bomba_marca'] }}", modelo: "{{ $bomba_modelo[$i]['modelo'] }}" },
            @php } @endphp
        ];

        //Array de bomba_modelo em JSON puro
        var motor_marca = [
            @php for ($i = 0; $i < count($motor_marca); $i++) { @endphp
                { marca: "{{ $motor_marca[$i]['tipo'] }}", modelo: "{{ $motor_marca[$i]['marca'] }}" },
            @php } @endphp
        ];

        //Array de bomba_modelo em JSON puro
        var motor_modelo = [
            @php for ($i = 0; $i < count($motor_modelo); $i++) { @endphp
                { marca: "{{ $motor_modelo[$i]['tipo'] }}", modelo: "{{ $motor_modelo[$i]['marca'] }}" },
            @php } @endphp
        ];

        // carrega a lista de modelo das bombas
        function carregaMotorMarca(marca, id_motor) {
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var motorMarca = $.grep(motor_marca, function (e) { return e.marca == marca; });
            console.log(motorMarca)

            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#marca_motor_0" + id_motor).html('<option>Selecione...</option>');
            $.each(motorMarca, function (i, marca) {
                $("#marca_motor_0" + id_motor).append($('<option>', {
                    value: marca.modelo, //Id do objeto subcategoria
                    text: marca.modelo //Nome da Subcategoria
                }));
            });
        }

        function alterarMotor(val, id_motor) {
            
            $('#marca_motor_eletrico_0' + id_motor).prop('disabled', false);
            $('#modelo_motor_eletrico_0' + id_motor).prop('disabled', false);
            $('#potencia_0' + id_motor).prop('disabled', false);
            $('#numero_serie_0' + id_motor).prop('disabled', false);
            $('#rotacao_0' + id_motor).prop('disabled', false);

            if (val == 'diesel') {
                $('#eletrico_0' + id_motor).hide();
                $('#diesel_0' + id_motor).show();   
                $('#campos_motor_eletrico_0' + id_motor).hide(); 
                carregaMotorMarca(val, id_motor);                    
            } else if (val == 'eletrico') {              
                $('#diesel_0' + id_motor).hide();      
                $('#eletrico_0' + id_motor).show();
                $('#campos_motor_eletrico_0' + id_motor).show();
                // carregaMotorMarca(val, id_motor);                     
            } else {         
                $('#campos_motor_eletrico_0' + id_motor).hide(); 
                $('#diesel_0' + id_motor).hide();      
                $('#eletrico_0' + id_motor).show();
                
                $('#marca_motor_eletrico_0' + id_motor).prop('disabled', true);
                $('#modelo_motor_eletrico_0' + id_motor).prop('disabled', true);
                $('#potencia_0' + id_motor).prop('disabled', true);
                $('#numero_serie_0' + id_motor).prop('disabled', true);
                $('#rotacao_0' + id_motor).prop('disabled', true);
            }
        }
        
        $(document).ready(function() {
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            $("#formdados").validate({
                rules: {
                    "quantidade": {
                        required: true,
                    },
                    "marca": {
                        required: true,
                    },
                    "modelo": {
                        required: true,
                    },
                    "numero_estagio": {
                        required: true,
                    },
                    "rotor": {
                        required: true,
                    },
                    "tipo_motor[]": {
                        required: true,
                    },
                    "marca_motor[]": {
                        required: true,
                    },
                    "modelo_motor[]": {
                        required: true,
                    },
                    "potencia[]": {
                        required: true,
                    },
                    "numero_serie[]": {
                        required: true,
                    },
                    "rotacao[]": {
                        required: true,
                    },
                    "tensao[]": {
                        required: true,
                    },
                    "lp_ln[]": {
                        required: true,
                    },
                    "classe_isolamento[]": {
                        required: true,
                    },
                    "corrente_nominal[]": {
                        required: true,
                    },
                    "fs[]": {
                        required: true,
                    },
                    "ip[]": {
                        required: true,
                    },
                    "rendimento[]": {
                        required: true,
                    },
                    "cos[]": {
                        required: true,
                    }
                },
                messages: {
                    quantidade: "@lang('validate.validate')",
                    "marca": {
                        required: "@lang('validate.validate')"
                    },
                    "modelo": {
                        required: "@lang('validate.validate')"
                    },
                    "numero_estagio": {
                        required: "@lang('validate.validate')"
                    },
                    "rotor": {
                        required: "@lang('validate.validate')"
                    },
                    "tipo_motor[]": {
                        required: "@lang('validate.validate')"
                    },
                    "marca_motor[]": {
                        required: "@lang('validate.validate')"
                    },
                    "modelo_motor[]": {
                        required: "@lang('validate.validate')"
                    },
                    "potencia[]": {
                        required: "@lang('validate.validate')"
                    },
                    "numero_serie[]": {
                        required: "@lang('validate.validate')"
                    },
                    "rotacao[]": {
                        required: "@lang('validate.validate')"
                    },
                    "tensao[]": {
                        required: "@lang('validate.validate')"
                    },
                    "lp_ln[]": {
                        required: "@lang('validate.validate')"
                    },
                    "classe_isolamento[]": {
                        required: "@lang('validate.validate')"
                    },
                    "corrente_nominal[]": {
                        required: "@lang('validate.validate')"
                    },
                    "fs[]": {
                        required: "@lang('validate.validate')"
                    },
                    "ip[]": {
                        required: "@lang('validate.validate')"
                    },
                    "rendimento[]": {
                        required: "@lang('validate.validate')"
                    },
                    "cos[]": {
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

            $("#quantidade").focusout(function(){
                var quantidade = $("#quantidade").val();
                if (quantidade > 1) {
                    $('#ligacao').prop('disabled', false);
                } else {                    
                    $('#ligacao').prop('disabled', true);
                    $("#ligacao option[value='']").prop('selected', true);
                }
            });
            
            //Vai ser acionado cada vez que o equipamento tracar de item selecionado
            $("#marca").change(function () {
                //Pegando o novo valor selecionado no combo
                var marca = $(this).val();
                carregaBombaModelo(marca);
            });

            $('#adicionarMotor').on('click', function() {
                AdicionarMotor();
            }); 

            //Definir o item selecionado no carregamento da página
            $("#marca").val(0);
            $("#tipo_motor_0").val(0);

            //carregar o combo baseado na categoria selecionada
            carregaBombaModelo(0);
            carregaMotorMarca(0);

            //Selecionar a subcategoria passando o id dela
            $("#modelo").val(0);
            $("#marca_motor0").val(0);
            
            // carrega a lista de modelo das bombas
            function carregaBombaModelo(marca) {
                //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
                var bombaMarca = $.grep(bomba_modelo, function (e) { return e.marca == marca; });

                //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
                $("#modelo").html('<option>Selecione...</option>');
                $.each(bombaMarca, function (i, marca) {
                    $("#modelo").append($('<option>', {
                        value: marca.modelo, //Id do objeto subcategoria
                        text: marca.modelo //Nome da Subcategoria
                    }));
                });
            }
        });

        $(window).on('load', function() {
            $("#coverScreen").hide();
        });

    </script>

    <script>    
        function AdicionarMotor() {
            var newCard = "";
            var numero_motor = parseInt($('.card').length) + 1;
            var qt_card = ("00" + numero_motor.toString()).slice(-2);

            


            newCard += ''; 
            newCard += '                            <div class="card">';
            newCard += '                                <div class="card-header" id="heading_'+qt_card+'">';
            newCard += '                                    <a class="btn btn-header-link" data-toggle="collapse" data-parent="#accordionMotor" href="#collapse_'+qt_card+'" aria-expanded="true" aria-controls="collapse_'+qt_card+'">Motor '+numero_motor.toString()+'</a>';
            newCard += '                                </div>';

            newCard += '                                <div id="collapse_'+qt_card+'" class="collapse show" aria-labelledby="heading_'+qt_card+'" data-parent="#accordionMotor">';
            newCard += '                                    <div class="card-body">';
            newCard += '                                        <div class="form-row justify-content-start">';                
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                <label for="tipo_motor">@lang("entregaTecnica.tipo_motor")</label>';
            newCard += '                                                <select class="form-control" name="tipo_motor[]" id="tipo_motor_'+qt_card+'" required onchange="alterarMotor($(this).val(), '+ qt_card +')" >';
            newCard += '                                                     <option value=""></option>';
            newCard += '                                                     @foreach ($tipo_motor as $motor)';
            newCard += '                                                         <option value="{{ $motor["tipo"] }}">{{ __("listas." . $motor["tipo"] ) }}</option>';
            newCard += '                                                     @endforeach';
            newCard += '                                                </select>';
            newCard += '                                            </div>';

            newCard += '                                            <div id="diesel_'+qt_card+'" style="display: none" class="form-group col-md-12 telo5ce row">';
            newCard += '                                                <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                    <label for="marca_motor">@lang("entregaTecnica.marca")</label>';
            newCard += '                                                    <select class="form-control" name="marca_motor[]" id="marca_motor_'+qt_card+'">';
            newCard += '                                                        <option value=""></option>';
            newCard += '                                                    </select>';
            newCard += '                                                </div>';

            newCard += '                                                <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">';
            newCard += '                                                    <label for="modelo_motor">@lang("entregaTecnica.modelo")</label>';
            newCard += '                                                    <input type="text" class="form-control" name="modelo_motor[]" id="modelo_motor_'+qt_card+'">';
            newCard += '                                                </div>';
            newCard += '                                            </div>';

            newCard += '                                            <div id="eletrico_'+qt_card+'" class="form-group col-md-12 telo5ce row">';
            newCard += '                                                <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                    <label for="marca_motor">@lang("entregaTecnica.marca")</label>';
            newCard += '                                                    <input type="text" class="form-control" name="marca_motor_eletrico[]" id="marca_motor_eletrico_'+qt_card+'" disabled>';
            newCard += '                                                </div>';

            newCard += '                                                <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">';
            newCard += '                                                    <label for="modelo_motor">@lang("entregaTecnica.modelo")</label>';
            newCard += '                                                    <input type="text" class="form-control" name="modelo_motor_eletrico[]" id="modelo_motor_eletrico_'+qt_card+'" disabled>';
            newCard += '                                                </div>';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
        
            newCard += '                                        <div class="form-row justify-content-start" id="diesel_eletrico_'+qt_card+'">';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="potencia">@lang("entregaTecnica.potencia")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="potencia[]" id="potencia_'+qt_card+'" disabled>';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="numero_serie">@lang("entregaTecnica.numero_serie")</label>';
            newCard += '                                                 <input type="text" class="form-control" name="numero_serie[]" id="numero_serie_'+qt_card+'" disabled>';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="rotacao">@lang("entregaTecnica.rotacao")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="rotacao[]" id="rotacao_'+qt_card+'" disabled>';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
                
            newCard += '                                        <div id="campos_motor_eletrico_'+qt_card+'" style="display: none;">';
            newCard += '                                            <div class="form-row justify-content-start">';
            newCard += '                                                <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                     <label for="tensao">@lang("entregaTecnica.tensao")</label>';
            newCard += '                                                     <input type="number" class="form-control" name="tensao[]" id="tensao_'+qt_card+'">';
            newCard += '                                                </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="lp_ln">@lang("entregaTecnica.lp_ln")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="lp_ln[]" id="lp_ln_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="classe_isolamento">@lang("entregaTecnica.classe_isolamento")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="classe_isolamento[]" id="classe_isolamento_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
        
            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="corrente_nominal">@lang("entregaTecnica.corrente_nominal")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="corrente_nominal[]" id="corrente_nominal_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="fs">@lang("entregaTecnica.fs")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="fs[]" id="fs_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="ip">@lang("entregaTecnica.ip")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="ip[]" id="ip_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
        
            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="rendimento">@lang("entregaTecnica.rendimento")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="rendimento[]" id="rendimento_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                    <label for="cos">@lang("entregaTecnica.cos")</label>';
            newCard += '                                                    <input type="number" class="form-control" name="cos[]" id="cos_'+qt_card+'">';
            newCard += '                                            </div>';
            newCard += '                                        </div>';        
            newCard += '                                    </div>';
            newCard += '                                </div>';
            newCard += '                            </div>';
            newCard += '                         </div>';
            newCard += '                      </div>';

            $('#accordionMotor').append(newCard);
        }
    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
