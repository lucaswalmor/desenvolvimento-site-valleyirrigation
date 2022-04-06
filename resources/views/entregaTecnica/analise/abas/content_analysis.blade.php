<div class="accordion card_cadastro_et mt-3" id="accordionExample">
    {{-- GENERAL FEATURES / CARACTERISTICAS GERAIS --}}
    <div class="card">
        <div class="card-header" id="general_features">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="span_collapse">@lang('entregaTecnica.caracteristicas_gerais')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="approve_general_features" onclick="verfify_radio();">
                <input id="approve_general_features" type="radio" class="ml-3 option-input radio" name="general_features" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reprove_general_features" onclick="verfify_radio();">
                <input id="reprove_general_features" type="radio" class="ml-3 option-input-reprove option-input radio" name="general_features" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_cg" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_caracteristicas_gerais"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_caracteristicas_gerais" id="observacao_caracteristicas_gerais" rows="3"></textarea>
                </div>
            </div>
        </div>
  
        <div id="collapseOne" class="collapse show" aria-labelledby="general_features" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['numero_serie']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo_equipamento')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['modelo_equipamento']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.tipo_equipamento')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ __('listas.'. $item['tipo_equipamento'] )}}</span>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2"><b>@lang('entregaTecnica.opcao_equipamento'):</b></div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ __('listas.'. $item['tipo_equipamento_op1'])}}</span>
                    </div>
                    
                    <div class="col-md-2"><b>@lang('entregaTecnica.painel')</b>:</div>
                    <div class="col-md-2" >
                        <span class="span-mobile-et">{{ $item['painel']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.balanco'):</b></div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['balanco_comprimento']}}</span>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-2"><b>@lang('entregaTecnica.altura')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['altura_equipamento_nome']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.corrente')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['corrente_fusivel_nh500v']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.pneus')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['pneus']}}</span>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-2"><b>@lang('entregaTecnica.giro')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['giro']}} @lang('unidadesAcoes._graus')</span>
                    </div>
                </div>                    
                
                <div class="row">
                    <div class="col-md-2"><b>@lang('entregaTecnica.injeferdPotencia')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['injeferd']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.canhaoFinal')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['canhao_final_valvula']}}</span>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-2"><b>@lang('entregaTecnica.parada_automatica')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['parada_automatica']}}</span>
                    </div>
                    <div class="col-md-2"><b>@lang('entregaTecnica.barreira_seguranca')</b>:</div>
                    <div class="col-md-2">
                        <span class="span-mobile-et">{{ $item['barreira_seguranca']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SPANS / LANCES --}}
    <div class="card">
        <div class="card-header" id="spans">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSpan" aria-expanded="true" aria-controls="collapseSpan">
                    <span class="span_collapse">@lang('entregaTecnica.lances')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveSpan" onclick="verfify_radio();">
                <input id="aproveSpan" type="radio" class="ml-3 option-input radio" name="spans" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveSpan" onclick="verfify_radio();">
                <input id="reproveSpan" type="radio" class="ml-3 option-input-reprove option-input radio" name="spans" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_spans" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_spans"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_spans" id="observacao_spans" rows="3"></textarea>
                </div>
            </div>
        </div>
  
        <div id="collapseSpan" class="collapse" aria-labelledby="spans" data-parent="#accordionExample">
            <div class="card-body">
                <div class="d-flex justify-content-center col-md-12">
                    <table class="col-md-12 text-center">
                        <thead>
                            <tr>
                                <th>@lang('entregaTecnica.diametro')</th>
                                <th>@lang('entregaTecnica.qtd_tubos')</th>
                                <th>@lang('entregaTecnica.motorredutor_potencia')</th>
                                <th>@lang('entregaTecnica.motorredutor_marca')</th>
                                <th>@lang('entregaTecnica.numero_serie')</th>
                                <th>@lang('entregaTecnica.comprimento_lance')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lances as $lance) 
                                <tr>
                                    <td>{{ $lance['diametro_tubo']}}</td>
                                    <td>{{ $lance['quantidade_tubo']}}</td>
                                    <td>{{ $lance['motorredutor_potencia']}}</td>
                                    <td>{{ $lance['motorredutor_marca']}}</td>
                                    <td>{{ $lance['numero_serie'] }}</td>
                                    <td>{{ $lance['comprimento_lance']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- SPIKLERS / ASPERSORES --}}
    <div class="card">
        <div class="card-header" id="spiklers">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSpiklers" aria-expanded="true" aria-controls="collapseSpiklers">
                    <span class="span_collapse">@lang('entregaTecnica.aspersores')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveSpiklers" onclick="verfify_radio();">
                <input id="aproveSpiklers" type="radio" class="ml-3 option-input radio" name="spiklers" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveSpiklers" onclick="verfify_radio();">
                <input id="reproveSpiklers" type="radio" class="ml-3 option-input-reprove option-input radio" name="spiklers" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_spiklers" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_spiklers"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_spiklers" id="observacao_spiklers" rows="3"></textarea>
                </div>
            </div>
        </div>
  
        <div id="collapseSpiklers" class="collapse" aria-labelledby="spiklers" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.marca_aspersor'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ __('listas.'. $item['aspersor_marca']) }}</span>
                    </div>
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.modelo_aspersor'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_modelo']}}</span>
                    </div>
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.defletor'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ __('listas.'. $item['aspersor_defletor']) }}</span>
                    </div>
                </div>
            
                {{-- ASPERSOR REGULADOR --}}
                <div class="row mt-3">
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.marca_regulador'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ __('listas.'. $item['aspersor_regulador_marca']) }}</span>
                    </div>
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.modelo_regulador'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_regulador_modelo']}}</span>
                    </div>
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.pressao'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_pressao']}}</span>
                    </div>
                </div>
            
                {{-- ASPERSOR DE IMPACTO --}}
                <div class="row mt-3">                                            
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.marca_aspersor_impacto'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_impacto_marca']}}</span>
                    </div>
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.modelo_aspersor_impacto'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_impacto_modelo']}}</span>
                    </div>
                </div>
            
                {{-- ASPERSOR CANHÃO FINAL --}}
                <div class="row mt-3">
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.canhao_final_marca'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_canhao_final']}}</span>
                    </div>
                </div>
            
                {{-- ASPERSOR OPCIONAIS --}}
                <div class="row mt-3">                           
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.outros'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_opcionais']}}</span>
                    </div>
                </div>                                    
            
                {{-- ASPERSOR BOMBA BOOSTER --}}
                <div class="row mt-3">                           
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.bomba_booster_marca'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_mbbooster_marca']}}</span>
                    </div>             
            
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.bomba_booster_modelo'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_mbbooster_modelo']}}</span>
                    </div>          
            
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.bomba_booster_rotor'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_mbbooster_rotor']}}</span>
                    </div>      
                                            
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.bomba_booster_potencia'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_mbbooster_potencia']}}</span>
                    </div>       
                                        
                    <div class="col-md-2">
                        <b>@lang('entregaTecnica.bomba_booster_corrente'):</b>
                    </div>
                    <div class="col-md-1">
                        <span class="span-mobile-et">{{ $item['aspersor_mbbooster_corrente']}}</span>
                    </div>
                </div>         
            </div>
        </div>
    </div>

    {{-- ADDUCTOR / ADUTORA --}}
    <div class="card">
        <div class="card-header" id="adductor">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseAdductor" aria-expanded="true" aria-controls="collapseAdductor">
                    <span class="span_collapse">@lang('entregaTecnica.adutora')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveAdductor" onclick="verfify_radio();">
                <input id="aproveAdductor" type="radio" class="ml-3 option-input radio" name="adductor" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveAdductor" onclick="verfify_radio();">
                <input id="reproveAdductor" type="radio" class="ml-3 option-input-reprove option-input radio" name="adductor" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_adductor" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_adductor"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_adductor" id="observacao_adductor" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapseAdductor" class="collapse" aria-labelledby="adductor" data-parent="#accordionExample">
            <div class="card-body">
                <div class="d-flex justify-content-center col-md-12">
                    <table class="col-md-12 text-center">
                        <thead>
                            <tr>
                                <th scope="col">@lang('afericao.tipoCano')</th>
                                <th scope="col">@lang('afericao.diametro')</th>
                                <th scope="col">@lang('afericao.numeroCanos')</th>
                                <th scope="col">@lang('afericao.comprimento')</th>
                                <th scope="col">@lang('entregaTecnica.fornecedor')</th>
                                <th scope="col">@lang('entregaTecnica.marca_tubo')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($adutora as $iten) 
                                <tr>
                                    <td>{{ __('listas.' . $iten['tipo_tubo']) }}</td>
                                    <td>{{ $iten['diametro']}} @lang('unidadesAcoes._pol')</td>
                                    <td>{{ $iten['numero_linha']}}</td>
                                    <td>{{ $iten['comprimento']}} @lang('unidadesAcoes._m')</td>
                                    <td>{{ __('listas.' . $iten['fornecedor'] ) }}</td>
                                    <td>{{ __('listas.' . $iten['marca_tubo'] ) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- PRESSURE CONNECTION AND ACCESSORIES / LIGAÇÃO DE PRESSÃO E ACCESSÓRIOS --}}
    <div class="card">
        <div class="card-header" id="LA">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseLA" aria-expanded="true" aria-controls="collapseLA">
                    <span class="span_collapse">@lang('entregaTecnica.ligacao_acessorios')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveLA" onclick="verfify_radio();">
                <input id="aproveLA" type="radio" class="ml-3 option-input radio" name="connection_accessories" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveLA" onclick="verfify_radio();">
                <input id="reproveLA" type="radio" class="ml-3 option-input-reprove option-input radio" name="connection_accessories" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_LA" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_LA"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_LA" id="observacao_LA" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapseLA" class="collapse" aria-labelledby="LA" data-parent="#accordionExample">
            <div class="card-body">
                {{-- LIGAÇÃO --}}                               
                <div class="do-not-break espacamento-cabecalho">
                    {{-- TUBO AZ --}}
                    <div class=''>                                    
                        <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.tubo_az')</b></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento') 1</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az1_comprimento'] }} @lang('unidadesAcoes._m')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') 1</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az1_diametro'] }} @lang('unidadesAcoes._pol')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento') 2</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az2_comprimento'] }} @lang('unidadesAcoes._m')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') 2</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az2_diametro'] }} @lang('unidadesAcoes._pol')</span></div>
                    </div>
                    <br>
                    {{-- PEÇA DE AUMENTO --}}
                    <div class='d-flex justify-content-start'>                                    
                        <div class="col-md-6 text-start sub_titulo_ft mr-4" style="max-width: 48%;"><b>@lang('entregaTecnica.peca_aumento')</b></div>
                        <div class="col-md-6 text-start sub_titulo_ft mr-5" style="max-width: 50%;"><b>@lang('entregaTecnica.registro_gaveta')</b></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro_maior')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['peca_aumento_diametro_maior'] }} @lang('unidadesAcoes._m')</span></div>

                        <div class="col-md-2"><b>@lang('entregaTecnica.diametro_menor')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $item['peca_aumento_diametro_menor'] }} @lang('unidadesAcoes._pol')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['registro_gaveta_diametro'] }} @lang('unidadesAcoes._pol')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['registro_gaveta_marca'] }}</span></div>
                    </div>
                    <br>
                    {{-- VALVULA VENTOSA --}}
                    <div class=''>                                    
                        <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_ventosa')</b></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_ventosa_diametro'] }} @lang('unidadesAcoes._pol')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_ventosa_marca'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_ventosa_modelo'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['quantidade_valv_ventosa'] }}</span></div>
                    </div>
                    <br>
                    {{-- VALVULA DE RETENÇÃO --}}
                    <div class=''>                                    
                        <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_retencao')</b></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_retencao_diametro'] }} @lang('unidadesAcoes._pol')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_retencao_marca'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
                        <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_retencao_material'] }}</span></div>
                    </div>
                </div>
                <br>
                
                {{-- ACESSÓRIOS --}}     
                <div class="do-not-break">
                    {{-- VALVULA ANTECIPADORA DE ONDAS --}}
                    <div class='row'>                                    
                        <div class="col-md-12"><b>@lang('entregaTecnica.valvula_antecipadora')</b></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') 1</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['valvula_antecondas_diametro'] }} @lang('unidadesAcoes._m')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.marca') 1</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['valvula_antecondas_marca'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.modelo') 2</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['valvula_antecondas_modelo'] }}</span></div>
                    </div>
                </div>

                {{-- HIDROMETRO --}}                                                  
                <div class="do-not-break">
                    <div class='row'>                                    
                        <div class="col-md-12"><b>@lang('entregaTecnica.hidrometro')</b></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['registro_eletrico_diametro'] }} @lang('unidadesAcoes._pol')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['registro_eletrico_marca'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.modelo')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['registro_eletrico_modelo'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.outros')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $item['medicoes_ligpress_outros'] }}</span></div>
                    </div>
                </div>                                
            </div>
        </div>
    </div>

    {{-- MOTOPUMP / BOMBAS --}}
    <div class="card">
        <div class="card-header" id="motopump">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseMotopump" aria-expanded="true" aria-controls="collapseMotopump">
                    <span class="span_collapse">@lang('entregaTecnica.motobomba')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aprovePump" onclick="verfify_radio();">
                <input id="aprovePump" type="radio" class="ml-3 option-input radio" name="motopump" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reprovePump" onclick="verfify_radio();">
                <input id="reprovePump" type="radio" class="ml-3 option-input-reprove option-input radio" name="motopump" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_motoPump" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_motoPump"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_motoPump" id="observacao_motoPump" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapseMotopump" class="collapse" aria-labelledby="motopump" data-parent="#accordionExample">
            <div class="card-body">
                {{-- CONJUNTO MOTOBOMBA --}}                               
                <div class="do-not-break espacamento-cabecalho">
                    <div class="row">
                        <div class="col-md-3"><b>@lang('entregaTecnica.quantidade_motobomba'):</b></div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $item['quantidade_motobomba']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.tipo_succao'):</b></div>
                        <div class="col-md-2">
                            <span class="span-mobile-et">{{ $item['tipo_succao']}}</span>
                        </div>
                        @if ($item['ligacao_serie'] > 0)
                            <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_serie')</b>:</div>
                            <div class="col-md-2">
                               <span class="span-mobile-et"> @lang('comum.sim')</span>
                            </div>                                        
                        @elseif($item['ligacao_paralelo'] > 0)
                            <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_paralela')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">@lang('comum.sim')</span>
                            </div>
                        @endif
                    </div>
            
                    @foreach ($bombas as $bomba)
                        <div class='mt-3'>                                    
                            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_bomba'] }}</b></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $bomba['marca']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $bomba['modelo']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.numero_estagio')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $bomba['numero_estagio']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.rotor')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $bomba['rotor']}} @lang('unidadesAcoes._mm')</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.opcionais')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $bomba['opcionais']}}</span>
                            </div>
                        </div>
            
                        @foreach ($motores as $motor)
                            @if ($motor['id_bomba'] == $bomba['id_bomba'])      
                                <div class='mt-3'>
                                    <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.motor') - {{ $motor['id_motor'] }}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tipo_motor')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['tipo_motor']}}</span>
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['marca']}}</span>
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['modelo']}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.potencia')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['potencia']}} @lang('unidadesAcoes._cv')</span>
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.rotacao')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['rotacao']}}</span>
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['numero_serie']}}</span>
                                    </div>
                                </div>
            
                                @if ($motor['tipo_motor'] == 'eletrico')                                            
                                    <div class="row">
                                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['tensao']}}</span>
                                        </div>
                                        <div class="col-md-2"><b>@lang('entregaTecnica.lp_ln')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['lp_ln']}}</span>
                                        </div>
                                        <div class="col-md-2"><b>@lang('entregaTecnica.classe_isolamento')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['classe_isolamento']}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"><b>@lang('entregaTecnica.corrente_nominal')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['corrente_nominal']}} @lang('unidadesAcoes._a')</span>
                                        </div>
                                        <div class="col-md-2"><b>@lang('entregaTecnica.fs')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['fs']}}</span>
                                        </div>
                                        <div class="col-md-2"><b>@lang('entregaTecnica.ip')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['ip']}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"><b>@lang('entregaTecnica.rendimento')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['rendimento']}} @lang('unidadesAcoes._%')</span>
                                        </div>
                                        <div class="col-md-2"><b>@lang('entregaTecnica.cos')</b>:</div>
                                        <div class="col-md-2">
                                            <span class="span-mobile-et">{{ $motor['cos']}}</span>
                                        </div>
                                    </div>
                                    
                                    @foreach ($chave_partida as $cp)  
                                        @if ($cp['id_motor'] == $motor['id_motor'])                                                    
                                            <div class='mt-2'>
                                                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.chave_partida') - {{ $cp['id_chave_partida'] }}</b></div>
                                            </div>                                          
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                                                <div class="col-md-2">
                                                    <span class="span-mobile-et">{{ $cp['marca'] }}</span>
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.acionamento')</b>:</div>
                                                <div class="col-md-2">
                                                    <span class="span-mobile-et">{{ __('listas.'. $cp['acionamento'] )}}</span>
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.regulagem_reles')</b>:</div>
                                                <div class="col-md-2">
                                                    <span class="span-mobile-et">{{ $cp['regulagem_reles']}}</span>
                                                </div>
                                            </div>                                      
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                                <div class="col-md-2">
                                                    <span class="span-mobile-et">{{ $motor['numero_serie']}}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif  
                            @endif                                      
                        @endforeach
                        @if (count($item['id_bomba']) > 1)
                            <hr>                                        
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- SUCTION / SUCÇÃO --}}
    <div class="card">
        <div class="card-header" id="suction">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSuction" aria-expanded="true" aria-controls="collapseSuction">
                    <span class="span_collapse">@lang('entregaTecnica.succao')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveSuction" onclick="verfify_radio();">
                <input id="aproveSuction" type="radio" class="ml-3 option-input radio" name="suction" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveSuction" onclick="verfify_radio();">
                <input id="reproveSuction" type="radio" class="ml-3 option-input-reprove option-input radio" name="suction" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_suction" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_suction"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_suction" id="observacao_suction" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapseSuction" class="collapse" aria-labelledby="suction" data-parent="#accordionExample">
            <div class="card-body">
                    {{-- SUCÇÃO --}}
                    <input type="hidden" name="succao_auxiliar_existente" id="succao_auxiliar_existente" value="{{$motobomba['succao_auxiliar']}}">
                    <input type="hidden" name="succao_existente" id="succao_existente" value="{{$motobomba['tipo_succao']}}">
                    <div class="do-not-break espacamento-cabecalho">
                        <div class='row'>
                            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_l')</b></div>
                            <div class="col-md-1"><span class="span-mobile-et">{{ $item['medicao_succao_l'] }} @lang('unidadesAcoes._m')</span></div>

                            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_h')</b></div>
                            <div class="col-md-1"><span class="span-mobile-et">{{ $item['medicao_succao_h'] }} @lang('unidadesAcoes._m')</span></div>

                            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_e')</b></div>
                            <div class="col-md-1"><span class="span-mobile-et">{{ $item['medicao_succao_e'] }} @lang('unidadesAcoes._m')</span></div>

                            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_diametro')</b></div>
                            <div class="col-md-1"><span class="span-mobile-et">{{ $item['medicao_succao_diametro'] }} @lang('unidadesAcoes._pol')</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_tipo')</b></div>
                            <div class="col-md-1"><span class="span-mobile-et">{{ $item['medicao_succao_tipo'] }}</span></div>
                        </div>
                        <div class="row mt-4">
                            <div class="form-group col-md-4">
                                <div class="card" style="width: 335px;">
                                    <div class="card-body">
                                        <img src="{{ asset('img/image_none.png')}}" id="myImg" alt="none" class="img-fluid img-succao">
                                        <img src="{{ asset('img/img_succao/afogadaPb.png') }}" id="afogada" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                                        <img src="{{ asset('img/img_succao/diretaPb.png') }}" id="direta" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                                        <img src="{{ asset('img/img_succao/poçosPb.png') }}" id="poços" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                                        <img src="{{ asset('img/img_succao/balsaPb.png') }}" id="balsa" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                                        <img src="{{ asset('img/img_succao/submersaPb.png') }}" id="submersa" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                                    </div>
                                </div>
                            </div>     
                        </div>
                    </div>
                    <!-- Modal imagens torre central -->
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="" class="img_modal"/>   
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    {{-- POWERSUPPLY / ALIMENTAÇÃO ELÉTRICA --}}
    <div class="card">
        <div class="card-header" id="powerSupply">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapsePowerSupply" aria-expanded="true" aria-controls="collapsePowerSupply">
                    <span class="span_collapse">@lang('entregaTecnica.alimentacao_eletrica')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aprovePowerSupply" onclick="verfify_radio();">
                <input id="aprovePowerSupply" type="radio" class="ml-3 option-input radio" name="powersupply" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reprovePowerSupply" onclick="verfify_radio();">
                <input id="reprovePowerSupply" type="radio" class="ml-3 option-input-reprove option-input radio" name="powersupply" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_powersupply" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_powersupply"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_powersupply" id="observacao_powersupply" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapsePowerSupply" class="collapse" aria-labelledby="powerSupply" data-parent="#accordionExample">
            <div class="card-body"> 
                {{-- AUTOTRÁFO --}}
                <div class="do-not-break espacamento-cabecalho">
                    <div class='row col-md-12'>
                        <h3><b>@lang('entregaTecnica.autotrafo_elevacao')</b></h3>
                    </div>
                    <div class='row'>
                        <div class="col-md-2"><b>@lang('entregaTecnica.potencia')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $autotrafo['potencia_elevacao'] }} @lang('unidadesAcoes._cv')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $autotrafo['tap_entrada_elevacao'] }} @lang('unidadesAcoes._v')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $autotrafo['tap_saida_elevacao'] }} @lang('unidadesAcoes._v')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.corrente_disjuntor')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{  $autotrafo['corrente_disjuntor'] }}</span></div>
                    </div>
                    <div class='row'>
                        <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['numero_serie_elevacao'] }}</span></div>
                    </div>
                    <div class='row col-md-12 mt-3'>
                        <h3><b>@lang('entregaTecnica.autotrafo_rebaixamento')</b></h3>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.potencia')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $autotrafo['potencia_rebaixamento'] }} @lang('unidadesAcoes._cv')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $autotrafo['tap_entrada_rebaixamento'] }} @lang('unidadesAcoes._v')</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{  $autotrafo['tap_saida_rebaixamento'] }} @lang('unidadesAcoes._v')</span></div>

                        <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b></div>
                        <div class="col-md-1"><span class="span-mobile-et">{{ $autotrafo['numero_serie_rebaixamento'] }}</span></div>
                    </div>
                </div>                                

            {{-- GERADOR --}}
                <div class="do-not-break espacamento-cabecalho">
                    <div class='row col-md-12'>
                        <h3><b>@lang('entregaTecnica.gerador')</b></h3>
                    </div>
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.gerador')</b></div>
                        <div class="col-md-2">
                            @if ($autotrafo['gerador'] == null)
                                
                            @else 
                                <span class="span-mobile-et">{{ __('listas.'. $autotrafo['gerador'] ) }}</span>
                            @endif
                        </div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_marca')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['gerador_marca'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_modelo')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['gerador_modelo'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_potencia')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['gerador_potencia'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_frequencia')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['gerador_frequencia'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_tensao')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['gerador_tensao'] }}</span></div>

                        <div class="col-md-2 "><b>@lang('entregaTecnica.numero_serie')</b></div>
                        <div class="col-md-2"><span class="span-mobile-et">{{ $autotrafo['numero_serie_gerador'] }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TESTS / TESTES --}}
    <div class="card">
        <div class="card-header" id="tests">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTests" aria-expanded="true" aria-controls="collapseTests">
                    <span class="span_collapse">@lang('entregaTecnica.testes')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveTests" onclick="verfify_radio();">
                <input id="aproveTests" type="radio" class="ml-3 option-input radio" name="tests" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveTests" onclick="verfify_radio();">
                <input id="reproveTests" type="radio" class="ml-3 option-input-reprove option-input radio" name="tests" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_tests" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_tests"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_tests" id="observacao_tests" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapseTests" class="collapse" aria-labelledby="tests" data-parent="#accordionExample">
            <div class="card-body">
                {{-- TESTES HIDRAULICOS --}}                               
                <div class="do-not-break espacamento-cabecalho">
                    <div class="cor-fundo">
                        <h2><b>@lang('entregaTecnica.teste_torre_central')</b></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_sem_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $teste_torre_central['tensao_rs_semcarga']}} @lang('unidadesAcoes._v')</span>
                        </div>
                        <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_sem_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $teste_torre_central['tensao_st_semcarga']}} @lang('unidadesAcoes._v')</span>
                        </div>
                        <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_sem_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $teste_torre_central['tensao_rt_semcarga']}} @lang('unidadesAcoes._v')</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                                <img src="{{ asset('storage/'. $teste_torre_central['tensao_rs_semcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-4">
                                <img src="{{ asset('storage/'. $teste_torre_central['tensao_st_semcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-4">
                                <img src="{{ asset('storage/'. $teste_torre_central['tensao_rt_semcarga_img'])}}"/>   
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $teste_torre_central['tensao_rs_comcarga']}} @lang('unidadesAcoes._v')</span>
                        </div>
                        <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $teste_torre_central['tensao_st_comcarga']}} @lang('unidadesAcoes._v')</span>
                        </div>
                        <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $teste_torre_central['tensao_rt_comcarga']}} @lang('unidadesAcoes._v')</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                                <img src="{{ asset('storage/'. $teste_torre_central['tensao_rs_comcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-4">
                                <img src="{{ asset('storage/'. $teste_torre_central['tensao_st_comcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-4">
                                <img src="{{ asset('storage/'. $teste_torre_central['tensao_rt_comcarga_img'])}}"/>   
                        </div>
                    </div>
                </div>

                {{-- TESTES ELETRICOS --}}                               
                <div class="do-not-break espacamento-cabecalho mt-4">
                    <div class="cor-fundo">
                        <h2><b>@lang('entregaTecnica.teste_bomba_cp')</b></h2>
                    </div>
                    @foreach ($teste_bombas as $bomba)
                        <div class='mt-3'>                                    
                            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_testeh_mb'] }}</b></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><b>@lang('entregaTecnica.pressao_reg_fechado')</b>:</div>
                            <div class="col-md-1">
                                <span class="span-mobile-et">{{ $bomba['pressao_reg_fechado']}} @lang('unidadesAcoes._kgf/cm²')</span>
                            </div>
                            <div class="col-md-3"><b>@lang('entregaTecnica.pressao_reg_aberto')</b>:</div>
                            <div class="col-md-1">
                                <span class="span-mobile-et">{{ $bomba['pressao_reg_aberto']}} @lang('unidadesAcoes._kgf/cm²')</span>
                            </div>
                            <div class="col-md-3"><b>@lang('entregaTecnica.pressao_centro')</b>:</div>
                            <div class="col-md-1">
                                <span class="span-mobile-et">{{ $bomba['pressao_centro']}} @lang('unidadesAcoes._kgf/cm²')</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                    <img src="{{ asset('storage/'. $bomba['pressao_reg_fechado_img'])}}"/>   
                            </div>
                            <div class="col-md-4">
                                    <img src="{{ asset('storage/'. $bomba['pressao_reg_aberto_img'])}}"/>   
                            </div>
                            <div class="col-md-4">
                                    <img src="{{ asset('storage/'. $bomba['pressao_centro_img'])}}"/>   
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-3"><b>@lang('entregaTecnica.pressao_ult_torre')</b>:</div>
                            <div class="col-md-1">
                                <span class="span-mobile-et">{{ $bomba['pressao_ult_torre']}} @lang('unidadesAcoes._kgf/cm²')</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                    <img src="{{ asset('storage/'. $bomba['pressao_ult_torre_img'])}}"/>   
                            </div>
                        </div>
                    <hr>
                        @foreach ($teste_chave_partida as $cp)
                            @if ($cp['id_bomba'] == $bomba['id_testeh_mb'])      
                                <div class='mt-3'>
                                    <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.chave_partida') - {{ $cp['id_chave_partida'] }}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_sem_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['tensao_rs_semcarga']}} @lang('unidadesAcoes._v')</span>
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_sem_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['tensao_st_semcarga']}} @lang('unidadesAcoes._v')</span>
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_sem_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['tensao_rt_semcarga']}} @lang('unidadesAcoes._v')</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['tensao_rs_semcarga_img'])}}"/>   
                                    </div>
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['tensao_st_semcarga_img'])}}"/>   
                                    </div>
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['tensao_rt_semcarga_img'])}}"/>   
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_com_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['tensao_rs_comcarga']}} @lang('unidadesAcoes._v')</span>
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_com_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['tensao_st_comcarga']}} @lang('unidadesAcoes._v')</span>
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_com_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['tensao_rt_comcarga']}} @lang('unidadesAcoes._v')</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['tensao_rs_comcarga_img'])}}"/>   
                                    </div>
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['tensao_st_comcarga_img'])}}"/>   
                                    </div>
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['tensao_rt_comcarga_img'])}}"/>   
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-3"><b>@lang('entregaTecnica.corrente_rs_com_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['corrente_rs_comcarga']}} @lang('unidadesAcoes._a')</span>
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.corrente_st_com_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['corrente_st_comcarga']}} @lang('unidadesAcoes._a')</span>
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.corrente_rt_com_carga')</b>:</div>
                                    <div class="col-md-1">
                                        <span class="span-mobile-et">{{ $cp['corrente_rt_comcarga']}} @lang('unidadesAcoes._a')</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['corrente_rs_comcarga_img'])}}"/>   
                                    </div>
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['corrente_st_comcarga_img'])}}"/>   
                                    </div>
                                    <div class="col-md-4">
                                            <img src="{{ asset('storage/'. $cp['corrente_rt_comcarga_img'])}}"/>   
                                    </div>
                                </div>
                                <hr>
                            @endif                                      
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- TELEMETRY / TELEMETRIA --}}
    <div class="card">
        <div class="card-header" id="adductor">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseAdductor" aria-expanded="true" aria-controls="collapseAdductor">
                    <span class="span_collapse">@lang('entregaTecnica.telemetria')</span>
                    <i class="fa fa-chevron-down pull-right"></i>
                </button>
            </h2>
            
            <label for="aproveTelemetry" onclick="verfify_radio();">
                <input id="aproveTelemetry" type="radio" class="ml-3 option-input radio" name="telemetry" value="approved"/>
                @lang('entregaTecnica.aprovada')
            </label>
            
            <label for="reproveTelemetry" onclick="verfify_radio();">
                <input id="reproveTelemetry" type="radio" class="ml-3 option-input-reprove option-input radio" name="telemetry" value="repproved"/>
                @lang('entregaTecnica.reprovada')
            </label>

            <div class="row detalhes_divergencias_telemetry" style="display: none;">
                <div class="form-group col-6 mt-3">
                  <label for="observacao_telemetry"><strong>@lang('entregaTecnica.detalhes_divergencia')</strong></label>
                  <textarea class="form-control" name="observacao_telemetry" id="observacao_telemetry" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div id="collapseAdductor" class="collapse" aria-labelledby="adductor" data-parent="#accordionExample">
            <div class="card-body">                    
                {{-- TELEMETRIA --}}                      
                <div class="do-not-break espacamento-cabecalho">
        
                    <div class='row'>
                        <div class="col-md-2 "><b>@lang('entregaTecnica.aqua_tec_pro')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['aqua_tec_pro']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
        
                        <div class="col-md-2 "><b>@lang('entregaTecnica.aqua_tec_lite')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['aqua_tec_lite']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
        
                        <div class="col-md-2 "><b>@lang('entregaTecnica.commander_vp')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['commander_vp']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-2"><b>@lang('entregaTecnica.icon_link')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['icon_link']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
                        
                        <div class="col-md-2"><b>@lang('entregaTecnica.crop_link')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['crop_link']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
        
                        <div class="col-md-2"><b>@lang('entregaTecnica.base_station3')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['base_station3']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
                    </div>
        
                    <div class="row">
                        
                        <div class="col-md-2"><b>@lang('entregaTecnica.field_commander')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['field_commander']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
                        <div class="col-md-3"><b>@lang('entregaTecnica.estacao_metereologica_valley')</b></div>
                        <div class="col-md-2">
                            {{ ($telemetria['estacao_metereologica_valley']) ? __('comum.sim') : __('comum.nao') }}
                        </div>
                    </div>
                </div>                   
            </div>
        </div>
    </div>

</div>

<script>
    
    function verfify_radio() {
        ($("input[name='general_features']:checked").val() == 'repproved') ? $('.detalhes_divergencias_cg').show() : $('.detalhes_divergencias_cg').hide();
        ($("input[name='spans']:checked").val() == 'repproved') ? $('.detalhes_divergencias_spans').show() : $('.detalhes_divergencias_spans').hide();
        ($("input[name='spiklers']:checked").val() == 'repproved') ? $('.detalhes_divergencias_spiklers').show() : $('.detalhes_divergencias_spiklers').hide();
        ($("input[name='adductor']:checked").val() == 'repproved') ? $('.detalhes_divergencias_adductor').show() : $('.detalhes_divergencias_adductor').hide();
        ($("input[name='connection_accessories']:checked").val() == 'repproved') ? $('.detalhes_divergencias_LA').show() : $('.detalhes_divergencias_LA').hide();
        ($("input[name='motopump']:checked").val() == 'repproved') ? $('.detalhes_divergencias_motoPump').show() : $('.detalhes_divergencias_motoPump').hide();
        ($("input[name='suction']:checked").val() == 'repproved') ? $('.detalhes_divergencias_suction').show() : $('.detalhes_divergencias_suction').hide();
        ($("input[name='powersupply']:checked").val() == 'repproved') ? $('.detalhes_divergencias_powersupply').show() : $('.detalhes_divergencias_powersupply').hide();
        ($("input[name='tests']:checked").val() == 'repproved') ? $('.detalhes_divergencias_tests').show() : $('.detalhes_divergencias_tests').hide();
        ($("input[name='telemetry']:checked").val() == 'repproved') ? $('.detalhes_divergencias_telemetry').show() : $('.detalhes_divergencias_telemetry').hide();
    }

    function abrirImg() {
        var url = $(this).attr("src");
        $("#modal img").attr("src", url);
        $("#modal").modal("show");
    }
  
    function imgSalvaBD() {
        var img_auxiliar = $('#succao_auxiliar_existente').val();
        var img_succao = $('#succao_existente').val();

        switch (img_succao) {
            case 'direta':
                $('#direta').show();
                $('#myImg').hide();
                $('#afogada').hide();
                $('#poços').hide();
                $('#submersa').hide();
                $('#balsa').hide();
                break;
            case 'afogada':
                $('#afogada').show();
                $('#myImg').hide();
                $('#direta').hide();
                $('#poços').hide();
                $('#submersa').hide();
                $('#balsa').hide();
                break;
            case 'pocos':
                $('#poços').show();
                $('#myImg').hide();
                $('#direta').hide();
                $('#afogada').hide();
                $('#submersa').hide();
                $('#balsa').hide();
                break;
            default :
                $('#myImg').show();     
                $('#balsa').hide();
                $('#direta').hide();
                $('#afogada').hide();
                $('#poços').hide();
                $('#submersa').hide();                   
        }            

        switch (img_auxiliar) {                
                case 'submersa': 
                    $('#submersa').show();
                    $('#myImg').hide();
                    $('#direta').hide();
                    $('#afogada').hide();
                    $('#poços').hide();
                    $('#balsa').hide();
                    break;
                case  'balsa': 
                    $('#balsa').show();
                    $('#myImg').hide();
                    $('#direta').hide();
                    $('#afogada').hide();
                    $('#poços').hide();
                    $('#submersa').hide();
                    break;
            }
    }

    $(document).ready(function() {
        imgSalvaBD();
    });       
</script>