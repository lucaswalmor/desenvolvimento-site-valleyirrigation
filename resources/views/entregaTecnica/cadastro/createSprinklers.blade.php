@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6  titulo-entrega-tecnica-mobile-cadastros titulo-entrega-tecnica-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.aspersores') - @lang('comum.cadastrar')</h4>
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
        <form action="{{ route('save_technical_delivery_sprinklers') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>  
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <input type="hidden" name="id_aspersor" id="id_aspersor" value="{{$id_aspersor}}">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-md-12" id="cssPreloader">
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-6">
                                <h4>@lang('entregaTecnica.bocal')</h4>
                            </div>  
                        </div>
                        {{-- ASPERSORES --}}
                        <div class="form-row justify-content-start">                        
                            <div class="form-group col-md-2 telo5ce">
                                <label for="marca">@lang('entregaTecnica.marca')</label>
                                <select name="marca" class='form-control' id="marca">
                                    <option value=""></option>
                                    @foreach ($aspersor_marca as $item)
                                        <option value="{{ $item['marca']}}" {{ ( $item['marca'] == $aspersores['aspersor_marca'] ) ? 'selected' : '' }}>{{  __('listas.'. $item['marca'] ) }}</option>        
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2 telo5ce">
                                <label for="modelo">@lang('entregaTecnica.modelo')</label>
                                <select name="modelo" class='form-control' id="modelo">
                                    <option value=""></option>
                                    @foreach ($aspersor_modelo as $item)
                                        @if ($item['marca'] == $aspersores['aspersor_marca'])
                                            <option value="{{ $item['modelo']}}" {{ ( $item['modelo'] == $aspersores['aspersor_modelo'] ) ? 'selected' : '' }}>{{  __('listas.'. $item['modelo'] ) }}</option>        
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2 telo5ce">
                                <label for="defletor">@lang('entregaTecnica.defletor')</label>
                                <select name="defletor" class="form-control" id="defletor">
                                    <option value=""></option>
                                    @foreach ($defletores as $item)
                                        <option value="{{ $item['modelo']}}" {{ ( $item['modelo'] == $aspersores['aspersor_defletor'] ) ? 'selected' : '' }}>{{  __('listas.'. $item['modelo'] ) }}</option>                                             
                                    @endforeach
                                </select>
                            </div>
                           
                        </div>

                        {{-- REGULADOR --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-6">
                                <h4>@lang('entregaTecnica.regulador')</h4>  
                            </div>  
                        </div>
                        <div class="form-row justify-content-start">  
                            <div class="form-group col-md-2 telo5ce">
                                <label for="regulador_marca">@lang('entregaTecnica.marca')</label>
                                <select name="regulador_marca" class='form-control' id="regulador_marca">
                                    <option value=""></option>
                                    @foreach ($aspersor_marca as $item)
                                        <option value="{{ $item['marca']}}" {{ ( $item['marca'] == $aspersores['aspersor_regulador_marca'] ) ? 'selected' : '' }}>{{  __('listas.'. $item['marca'] ) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2 telo5ce">
                                @if (count($aspersores['aspersor_regulador_modelo']) > 0)
                                    <label for="regulador_modelo">@lang('entregaTecnica.modelo')</label>
                                    <select multiple="true" name="tags[]" id="tagSelector" class="form-control telo5ce">
                                        @foreach ($modelos as $modelo)                                    
                                            <option value="{{ $modelo }}" {{ $modelo == $modelo ? 'selected' : '' }} > {{ $modelo }}</option>
                                        @endforeach
                                    </select>    
                                @else
                                    <label for="regulador_modelo">@lang('entregaTecnica.modelo')</label>
                                    <select multiple="true" name="tags[]" id="tagSelector" class="form-control telo5ce">
                                        @foreach ($reguladorModelo as $modelo)                                    
                                            <option value="{{ $modelo['modelo'] }}" {{ $modelo['modelo'] == $aspersores['aspersor_regulador_modelo'] ? 'selected' : '' }} > {{ $modelo['modelo'] }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <div class="form-group col-md-2 pl-2 telo5ce">
                                <label for="pressao">@lang('entregaTecnica.pressao')</label>
                                <select name="pressao" class="form-control" id="pressao">
                                    <option value=""></option>
                                    @foreach ($pressao as $item)
                                        <option value="{{ $item['psi'] }}" {{ $item['psi'] == $aspersores['aspersor_pressao'] ? 'selected' : '' }} >{{ __('listas.' . $item['psi'] ) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- OPICIONAIS --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-6">
                                <h4>@lang('entregaTecnica.tubo_descida')</h4>  
                            </div>  
                        </div>
                        <div class="form-row justify-content-start">                        
                            <div class="form-group col-md-2 telo5ce">
                                <label for="tubo_descida">@lang('entregaTecnica.material')</label>
                                <select name="tubo_descida" class='form-control' id="tubo_descida" >
                                    <option value=""></option>
                                    @foreach ($aspersor_opcional as $item)
                                        <option value="{{ $item['modelo'] }}" {{ $item['modelo'] == $aspersores['tubo_descida'] ? 'selected' : '' }} > {{ __('listas.' . $item['modelo'] ) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2 telo5ce">
                                <label for="trilha_seca">@lang('entregaTecnica.trilha_seca')</label>
                                <select name="trilha_seca" class='form-control' id="trilha_seca" >
                                    <option value="{{ $aspersores['trilha_seca'] }}" {{ $aspersores['trilha_seca'] == 0 ? 'selected' : '' }} > @lang('entregaTecnica.opcional')</option>
                                    <option value="{{ $aspersores['trilha_seca'] }}" {{ $aspersores['trilha_seca'] == 1 ? 'selected' : '' }} > @lang('comum.sim')</option>
                                    <option value="{{ $aspersores['trilha_seca'] }}" {{ $aspersores['trilha_seca'] == 2 ? 'selected' : '' }} > @lang('comum.nao')</option>
                                </select>
                            </div>
                        </div>

                        <div class="accordion card_cadastro_et" id="accordionExample">
                            {{-- ASPERSORES DE IMPACTO --}}
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="span_collapse">@lang('entregaTecnica.aspersor_impacto')</span>
                                    <i class="fa fa-chevron-down pull-right"></i>
                                  </button>
                                </h2>
                              </div>
                          
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-row justify-content-start">
                                        <div class="form-group col-md-2 telo5ce" id="impacto-div-marca" >
                                            <label for="impacto_marca">@lang('entregaTecnica.marca')</label>
                                            <input type="text" class="form-control" name="impacto_marca" id="impacto_marca" value="{{ $aspersores['aspersor_impacto_marca']}}">
                                        </div>
            
                                        <div class="form-group col-md-2 telo5ce" id="impacto-div-modelo" >
                                            <label for="impacto_modelo">@lang('entregaTecnica.modelo')</label>
                                            <input type="text" class="form-control" name="impacto_modelo" id="impacto_modelo" value="{{ $aspersores['aspersor_impacto_modelo']}}">
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
         
                            {{-- CANHÃO FINAL --}}
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="span_collapse">@lang('entregaTecnica.canhao_final')</span>
                                    <i class="fa fa-chevron-down pull-right"></i>
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-row justify-content-start">   
                                        <div class="form-group col-md-2 telo5ce" id="canhao-final-marca-div" >
                                            <label for="canhao_final">@lang('entregaTecnica.marca')</label>
                                            <select name="canhao_final" class='form-control' id="canhao_final" >
                                                <option value=""></option>
                                                @foreach ($aspersor_canhao_final as $item)
                                                    <option value="{{ $item['marca'] }}" {{ $item['marca'] == $aspersores['aspersor_canhao_final'] ? 'selected' : ''}}>{{  __('listas.' . $item['marca'] ) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 telo5ce" id="canhao-final-modelo-div" >
                                            <label for="canhao_final_bocal">@lang('entregaTecnica.modelo')</label>
                                            <input type="text" name="canhao_final_bocal" id="canhao_final_bocal" class="form-control" value="{{$aspersores['aspersor_canhao_final_bocal']}}">
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>

                            {{-- BOMBA BOOSTER --}}
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="span_collapse">@lang('entregaTecnica.bomba_booster')</span>
                                    <i class="fa fa-chevron-down pull-right"></i>
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="form-row justify-content-start">
                                        <div class="form-group col-md-2 telo5ce">
                                            <label for="mb_booster_marca">@lang('entregaTecnica.marca')</label>
                                            <select name="mb_booster_marca" class='form-control' id="mb_booster_marca" >
                                                <option value=""></option>
                                                @foreach ($motobomba_booster_modelo as $marca)
                                                    <option value="{{ $marca['marca'] }}" {{ $marca['marca'] == $aspersores['aspersor_mbbooster_marca'] ? 'selected' : '' }}>{{ $marca['marca'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-2 telo5ce">
                                            <label for="mb_booster_modelo">@lang('entregaTecnica.modelo')</label>
                                            <select name="mb_booster_modelo" class='form-control' id="mb_booster_modelo" >
                                                <option value=""></option>
                                                @foreach ($motobomba_booster_modelo as $item)
                                                    <option value="{{ $item['modelo'] }}" {{ $item['modelo'] == $aspersores['aspersor_mbbooster_modelo'] ? 'selected' : '' }}>{{ $item['modelo'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2 telo5ce">
                                            <label for="mb_booster_rotor">@lang('entregaTecnica.rotor')</label>
                                            <input type="text" name="mb_booster_rotor" id="mb_booster_rotor" class="form-control" value="{{$aspersores['aspersor_mbbooster_rotor']}}">
                                        </div>
                                        <div class="form-group col-md-2 telo5ce">
                                            <label for="mb_booster_potencia">@lang('entregaTecnica.potencia')</label>
                                            <input type="text" name="mb_booster_potencia" id="mb_booster_potencia" class="form-control" value="{{ $aspersores['aspersor_mbbooster_potencia']}}">
                                        </div>                            
                                        <div class="form-group col-md-2 telo5ce">
                                            <label for="mb_booster_corrente">@lang('entregaTecnica.corrente')</label>
                                            <input type="text" name="mb_booster_corrente" id="mb_booster_corrente" class="form-control" value="{{ $aspersores['aspersor_mbbooster_corrente']}}">
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </form>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#tagSelector').select2({
            tags: true,
            tokenSeparators: [",", " "],
            createTag: function (tag) {
                return {
                    id: tag.term,
                    text: tag.term,
                    isNew : true
                };
            }
        });
    </script>

    {{-- COMBOS DE SELECTS --}}
    <script type="text/javascript">
       //Array de modelo_aspersor em JSON puro
       var modelo_aspersor = [
            @php for ($i = 0; $i < count($aspersor_modelo); $i++) { @endphp
                { tipo: "{{ $aspersor_modelo[$i]['marca'] }}", modelo_txt: "{{ __('listas.'. $aspersor_modelo[$i]['modelo'] ) }}",  modelo: "{{ $aspersor_modelo[$i]['modelo'] }}" },
            @php } @endphp
        ];

        $(document).ready(function () {
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });
            
            //Vai ser acionado cada vez que o equipamento tracar de item selecionado
            $("#marca").change(function () {
                //Pegando o novo valor selecionado no combo
                var tipo = $(this).val(); 
                carregaModeloAspersores(tipo);
            });
            
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);

        });

        // Carrega a lista de opcoes do equipamento
        function carregaModeloAspersores(tipo) {

            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var filtroModeloAspersores = $.grep(modelo_aspersor, function (e) { return e.tipo == tipo; });
            
            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#modelo").html('<option>Selecione...</option>');
            $.each(filtroModeloAspersores, function (i, tipoEquipOp) {
                $("#modelo").append($('<option>', {
                    value: tipoEquipOp.modelo, //Id do objeto subcategoria
                    text: tipoEquipOp.modelo_txt //Nome da Subcategoria
                }));
            });            
        }
    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
