@extends('_layouts._layout_site')

@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-entrega-tecnica-mobile">
                <h1>
                    @lang('entregaTecnica.entregaTecnica')
                </h1>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">

                <a href="{{ route('manage_technical_delivery') }}" style="color: #3c8dbc">
                    <button type="button" data-toggle="tooltip" data-placement="bottom" title="@lang("entregaTecnica.voltar")">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>

                <button type="button" data-toggle="tooltip" data-placement="bottom" title="@lang("entregaTecnica.relatorio")" id="criarTab">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        @if ($entrega_tecnica['status'] == 2)
                            <a href="{{ route('datasheet_technical_delivery', $id_entrega_tecnica)}}" target="_blank">
                                <i class="far fa-file-pdf fa-stack-1x fa-inverse"></i>                        
                            </a>
                        @else
                            <i class="far fa-file-pdf fa-stack-1x fa-inverse" data-toggle="modal" data-target="#alert_et"></i>                        
                        @endif
                        
                    </span>
                </button>

                <button type="button" data-toggle="tooltip" data-placement="bottom" title="@lang("entregaTecnica.enviar")" id="criarTab">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        @if ($entrega_tecnica['status'] == 2)
                            <a href="{{ route('send_technical_delivery', $id_entrega_tecnica)}}"><i class="far fa-envelope-open fa-stack-1x fa-inverse"></i></a>
                        @else
                            <i class="far fa-envelope-open fa-stack-1x fa-inverse" data-toggle="modal" data-target="#alert_et"></i>
                        @endif
                    </span>
                </button>
            </div>
        </div>

        {{-- FILTRO DE PESQUISA --}}
        <div class="row justify-content-start mt-5 dados-et-mobile">
            <div class="ml-4">
                <h3> @lang('entregaTecnica.numero_pedido'):  <span style="color: #003A5D">{{ $entrega_tecnica['numero_pedido'] }}</span></h3> 
            </div>
            <div class="ml-5">
                <h3> @lang('entregaTecnica.data'):  <span style="color: #003A5D">{{ date('d/m/Y', strtotime($entrega_tecnica['data_entrega_tecnica'])) }}</span></h3> 
            </div>
            <div class="ml-5">
                <h3> @lang('entregaTecnica.tipo_entrega_tecnica'):  <span style="color: #003A5D">{{ strtoupper( __('entregaTecnica.'. $entrega_tecnica['tipo_entrega_tecnica'] )) }}</span></h3> 
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
                            <li><h4>@lang('entregaTecnica.cadastro_incompleto')</h4></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')

<div id="alert">                
    @include('_layouts._includes._alert')    
</div>
@if ($entrega_tecnica['tipo_entrega_tecnica'] == 'completa')    
    <div class="form-row form-row-statusAfericao justify-content-center mobileStatus">
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_parte_aerea'] == 0)
                        @lang('entregaTecnica.caracteristicas_gerais') 
                    @elseif($entrega_tecnica['status_parte_aerea'] == 1) 
                        @lang('entregaTecnica.caracteristicas_gerais') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.caracteristicas_gerais') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_parte_aerea'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_aerial_part_technical_delivery', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_parte_aerea'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_aerial_part_technical_delivery', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_aerial_part_technical_delivery', $id_entrega_tecnica) }}" style="color: #fff;"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                @if ($tem_pivo['tipo_equipamento'] == null)
                    <h3>@lang('entregaTecnica.lances') <i class="fas fa-lock tooltip-et" data-tooltip="@lang('entregaTecnica.tooltip_caracteristicas_equipamento')" style="color: #6d97ac; float: right;"></i></h3>
                @else
                    <h3>
                        @if ($entrega_tecnica['status_lances'] == 0)
                            @lang('entregaTecnica.lances') 
                        @elseif($entrega_tecnica['status_lances'] == 1) 
                            @lang('entregaTecnica.lances') 
                            <i class="fas fa-edit" style="color: orange; float: right;"></i>
                        @else
                            @lang('entregaTecnica.lances')
                            <i class="fas fa-check" style="color: green; float: right;"></i>
                        @endif
                    </h3>
                @endif
            </div>    
            @if ($tem_pivo['tipo_equipamento'] == null)   
                <div style="background-color: #6d97ac; color: #fff">
                    <a class="cad-lance-bloqueado">@lang('entregaTecnica.bloqueado')</i></a>
                </div>
            @else
                @if ($entrega_tecnica['status_lances'] == 0)   
                    <div class="p-2"  style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_span', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_lances'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_span', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_span', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
            @endif
        </div>
        
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_aspersores'] == 0)
                        @lang('entregaTecnica.aspersores') 
                    @elseif($entrega_tecnica['status_aspersores'] == 1) 
                        @lang('entregaTecnica.aspersores') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.aspersores') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_aspersores'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_sprinklers', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_aspersores'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_sprinklers', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_sprinklers', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
        
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_adutora'] == 0)
                        @lang('entregaTecnica.adutora') 
                    @elseif($entrega_tecnica['status_adutora'] == 1) 
                        @lang('entregaTecnica.adutora') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.adutora') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_adutora'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_water_supply', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_adutora'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_water_supply', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_water_supply', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
    </div>

    <div class="form-row form-row-statusAfericao justify-content-center mobileStatus">
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3 class="h3-ligacao-et">
                    @if ($entrega_tecnica['status_ligacao'] == 0)
                        @lang('entregaTecnica.ligacao_acessorios') 
                    @elseif($entrega_tecnica['status_ligacao'] == 1) 
                        @lang('entregaTecnica.ligacao_acessorios') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.ligacao_acessorios') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_ligacao'] == 0)
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_pressure_connection', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_ligacao'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_pressure_connection', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_pressure_connection', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>

        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_motobomba'] == 0)
                        @lang('entregaTecnica.moto_bomba') 
                    @elseif($entrega_tecnica['status_motobomba'] == 1) 
                        @lang('entregaTecnica.moto_bomba') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.moto_bomba') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_motobomba'] == 0)
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_pressurization', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_motobomba'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_pressurization', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_pressurization', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
        
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_succao'] == 0)
                        @lang('entregaTecnica.succao') 
                    @elseif($entrega_tecnica['status_succao'] == 1) 
                        @lang('entregaTecnica.succao') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.succao') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_succao'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_suction', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_succao'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_suction', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_suction', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
        
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_autotrafo'] == 0)
                        @lang('entregaTecnica.alimentacao_eletrica') 
                    @elseif($entrega_tecnica['status_autotrafo'] == 1) 
                        @lang('entregaTecnica.alimentacao_eletrica') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.alimentacao_eletrica') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_autotrafo'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_starter_key', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_autotrafo'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_starter_key', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_starter_key', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
    </div>

    <div class="form-row form-row-statusAfericao justify-content-center mobileStatus">
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                @if($entrega_tecnica['status_parte_aerea'] == 2 && $entrega_tecnica['status_lances'] == 2 && $entrega_tecnica['status_aspersores'] == 2 && 
                    $entrega_tecnica['status_adutora'] == 2 && $entrega_tecnica['status_motobomba'] == 2 && $entrega_tecnica['status_succao'] == 2 &&
                    $entrega_tecnica['status_autotrafo'] == 2)
                    <h3>
                        @if ($entrega_tecnica['status_testes'] == 0)
                            @lang('entregaTecnica.testes') 
                        @elseif($entrega_tecnica['status_testes'] == 1) 
                            @lang('entregaTecnica.testes') 
                            <i class="fas fa-edit" style="color: orange; float: right;"></i>
                        @else
                            @lang('entregaTecnica.testes') 
                            <i class="fas fa-check" style="color: green; float: right;"></i>
                        @endif
                    </h3>
                @else
                    <h3>@lang('entregaTecnica.testes') <i class="fas fa-lock tooltip-et tooltip-et-testes" data-tooltip="@lang('entregaTecnica.tooltip_testes')" style="color: #6d97ac; float: right;"></i></h3>
                @endif
            </div>    
            @if ($entrega_tecnica['status_parte_aerea'] == 2 && $entrega_tecnica['status_lances'] == 2 && $entrega_tecnica['status_aspersores'] == 2 && 
                $entrega_tecnica['status_adutora'] == 2 && $entrega_tecnica['status_motobomba'] == 2 && $entrega_tecnica['status_succao'] == 2 &&
                $entrega_tecnica['status_autotrafo'] == 2)   
                @if ($entrega_tecnica['status_testes'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_tests', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_testes'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_tests', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_tests', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
            @else
                <div class="p-2 cad-lance-bloqueado" style="background-color: #6d97ac; color: #fff">
                    <a href="#">@lang('entregaTecnica.bloqueado')</i></a>
                </div>
            @endif
        </div>
        
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_telemetria'] == 0)
                        @lang('entregaTecnica.telemetria')
                    @else
                        @lang('entregaTecnica.telemetria') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_telemetria'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_telemetry_technical_delivery', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_telemetry_technical_delivery', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
    </div>
@endif

@if ($entrega_tecnica['tipo_entrega_tecnica'] == 'motobomba')      
    <div class="form-row form-row-statusAfericao justify-content-center mobileStatus">  
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_ligacao'] == 0)
                        @lang('entregaTecnica.ligacao_acessorios') 
                    @elseif($entrega_tecnica['status_ligacao'] == 1) 
                        @lang('entregaTecnica.ligacao_acessorios') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.ligacao_acessorios') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_ligacao'] == 0)
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_pressure_connection', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_ligacao'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_pressure_connection', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento') <i class="fas fa-edit" style="color: #fff"></i></a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_pressure_connection', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>

        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_motobomba'] == 0)
                        @lang('entregaTecnica.moto_bomba') 
                    @elseif($entrega_tecnica['status_motobomba'] == 1) 
                        @lang('entregaTecnica.moto_bomba') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.moto_bomba') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_motobomba'] == 0)
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_pressurization', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_motobomba'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_pressurization', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento') <i class="fas fa-edit" style="color: #fff"></i></a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_pressurization', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>
        
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_succao'] == 0)
                        @lang('entregaTecnica.succao') 
                    @elseif($entrega_tecnica['status_succao'] == 1) 
                        @lang('entregaTecnica.succao') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.succao') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>    
                @if ($entrega_tecnica['status_succao'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_suction', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_succao'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_suction', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento')</a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_suction', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
        </div>

        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                <h3>
                    @if ($entrega_tecnica['status_adutora'] == 0)
                        @lang('entregaTecnica.adutora') 
                    @elseif($entrega_tecnica['status_adutora'] == 1) 
                        @lang('entregaTecnica.adutora') 
                        <i class="fas fa-edit" style="color: orange; float: right;"></i>
                    @else
                        @lang('entregaTecnica.adutora') 
                        <i class="fas fa-check" style="color: green; float: right;"></i>
                    @endif
                </h3>
            </div>   
            <div> 
                @if ($entrega_tecnica['status_adutora'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_water_supply', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_adutora'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_water_supply', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento') <i class="fas fa-edit" style="color: #fff"></i></a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_water_supply', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="form-row form-row-statusAfericao justify-content-center mobileStatus">
        <div class="form-group col-md-2 col-10 text-center afericao">
            <div>
                @if ($qtd_bombas < 1)
                    <h3>@lang('entregaTecnica.testes') <i class="fas fa-lock" style="color: #6d97ac; float: right;"></i></h3>
                @else
                    <h3>
                        @if ($entrega_tecnica['status_testes'] == 0)
                            @lang('entregaTecnica.testes') 
                        @elseif($entrega_tecnica['status_testes'] == 1) 
                            @lang('entregaTecnica.testes') 
                            <i class="fas fa-edit" style="color: orange; float: right;"></i>
                        @else
                            @lang('entregaTecnica.testes') 
                            <i class="fas fa-check" style="color: green; float: right;"></i>
                        @endif
                    </h3>
                @endif
            </div>    
            @if ($qtd_bombas < 1)   
                <div class="p-2" style="background-color: #6d97ac; color: #fff">
                    @lang('entregaTecnica.bloqueado')</i>
                </div>
            @else
                @if ($entrega_tecnica['status_testes'] == 0)   
                    <div class="p-2" style="background-color: #1B6B9A">
                        <a href="{{ route('create_technical_delivery_tests', $id_entrega_tecnica) }}"> @lang('entregaTecnica.nao_iniciada')</i></a>
                    </div>
                @elseif($entrega_tecnica['status_testes'] == 1) 
                    <div class="p-2" style="background-color: orange">
                        <a href="{{ route('create_technical_delivery_tests', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.em_andamento') <i class="fas fa-edit" style="color: #fff"></i></a>
                    </div>
                @else
                    <div class="p-2" style="background-color: green">
                        <a href="{{ route('create_technical_delivery_tests', $id_entrega_tecnica) }}" style="color: #fff"> @lang('entregaTecnica.finalizado')</a>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(document).ready(function () {            
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
        });
    </script>

<script>
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            // more then one submenu open?
            this.multiple = multiple || false;
            
            var dropdownlink = this.el.find('.dropdownlink');
            dropdownlink.on('click',
                            { el: this.el, multiple: this.multiple },
                            this.dropdown);
        };
        
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el,
                $this = $(this),
                //this is the ul.submenuItems
                $next = $this.next();
            
            $next.slideToggle();
            $this.parent().toggleClass('open');
            
            if(!e.data.multiple) {
            //show only one menu at the same time
            $el.find('.submenuItems').not($next).slideUp().parent().removeClass('open');
            }
        }
        
        var accordion = new Accordion($('.accordion-menu'), false);
        })
</script>
@endsection
