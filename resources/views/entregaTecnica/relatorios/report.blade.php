<!DOCTYPE html>



<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/7.1.2/css/highcharts.css"
        integrity="sha256-4bpG/e3EbIONg49CHrSw5c4jzs+8fb4eQbTJTibHWdw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
    <!-- choose one -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
    <link rel="stylesheet" href="https:
        //cdnjs.cloudflare.com/ajax/libs/highcharts/7.1.2/css/highcharts.css" integrity="sha256-4bpG/e3EbIONg49CHrSw5c4jzs+8fb4eQbTJTibHWdw="
        crossorigin="anonymous"   />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>@lang('entregaTecnica.ft_entrega_tecnica')</title>
    <style>
        @media print {
            body {
                font-size: 13px !important;
                size: A4;
            }

            b {
                font-size: 13px !important;
            }
            
            .pagebreak {
                clear: both;
                page-break-after: always;
            }

            .footer-fixed-bottom {
                position: fixed;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1030;
            }

            .label_declaracao {
                margin-bottom: 30px;
            }

            .declaracao {
                width: 500px;
            }

            .font-declaracao {
                font-size: 20px;
            }
            
            .font-declaracao-data {
                font-size: 17px;
            }
        }        

        .header {
            height: 2%; 
            background-color: #005f8d; 
            padding: 10px
        }

        .declaracao {
            background-color: transparent;
            border: 0;
            border-bottom: 1px solid #162E3C;
            color: #162E3C !important;
            text-transform: capitalize;
            width: 300px;
            outline: none;
        }

        .declaracao_cpf {
            width: 194px;
            border: 0;
            border-bottom: 1px solid #162E3C;
            outline: none;
        }

        .declaracao_data {
            width: 90px;
            border: 0;
            border-bottom: 1px solid #162E3C;
            outline: none;
        }

        .input-group-text {
            padding: 15px;
            margin: 10px
        }
        
        b {
            font-size: 14px
        }

        img {
            width: 310px;
        }

        @media screen and (max-width: 768px) {            
            img {
                width: 200px;
            }
            .declaracao {
                width: 290px;
            }
        }
        
        .cor-fundo {
            background-color: #005F8D;
            color: white;
            height: 35px;
        }
    
        .topo_detalhe {
            height: 100px;
            background-color: #E2EFF7 !important;
            margin-bottom: 20px;
            color: #3c8dbc;
        }
    
        form>div>div>div>.imprimir {
            display: inline-block;
            cursor: pointer;
            border: none !important;
            outline: none !important;
            background-color: #3c8dbc !important;
            padding: 15px;
            border-radius: 50%;
        }
    
        form>.voltar {
            display: inline-block;
            cursor: pointer;
            border: none !important;
            outline: none !important;
            float: right;
            margin-right: -10px;
            margin-top: 29px;
            border-radius: 50%;
        }
    
        form>div>div>div>.salvar>.fa-2x {
            font-size: 1.77em !important;
        }
        
        form>div>div>div>.salvar {
            border: none;
            outline: none;
            cursor: pointer;
            padding: 0;
        }
    
        .fa-stack-1x, .fa-stack-2x {
            background-color: #3c8dbc;
            border-radius: 50%;
        }
    
        .botoes {
            margin-top: 20px;
        }
        button svg {
            color: #fff;
        }
    
        hr {
            background-color: black;
            margin-top: 0.25rem;
            margin-bottom: 0.25rem;
        }

        .table td,
        .table th {
            padding: 0rem;
        }

        textarea {
            text-align: justify;
        }

        /* TOOLTIPS */

        .tooltip-inner {
            background-color: transparent;
            color: #162E3C;
            padding: 10px;
        }

        .bs-tooltip-auto[x-placement^=bottom] .arrow::before,
        .bs-tooltip-bottom .arrow::before,
        .bs-tooltip-auto[x-placement^=left] .arrow::before,
        .bs-tooltip-left .arrow::before,
        .bs-tooltip-auto[x-placement^=right] .arrow::before,
        .bs-tooltip-right .arrow::before {
            border-bottom-color: transparent;
            border-left-color: transparent;
            border-right-color: transparent;
        }

        .bs-tooltip-auto[x-placement^=bottom],
        .bs-tooltip-bottom {
            margin-top: -15px;
        }

        .nav-tabs {
            margin-top: -62px;
        }

        .sub_titulo_ft {
            background-color: #e2eff773;
            padding: 0 !important;
        }

        span {
            text-align: start;
        }

        .borda-campos-vazios {
            border-bottom: 1px solid black;
        }

        .borda-campos-vazios td {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
    </style>
</head>

<body>

    {{-- NAVTAB'S --}}
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="iGerais-tab" data-toggle="tab" href="#iGerais" role="tab"
                aria-controls="iGerais" aria-selected="true">@lang('entregaTecnica.ficha_tecnica')</a>
        </li>
    </ul>

    <div class="tab-content small.required tab-validate mt-4" id="myTabContent">
        @include('_layouts._includes._alert')

        {{-- FICHA TÉCNICA PRINCIPAL --}}
        @foreach ($entrega_tecnica as $item)            
            <div class="tab-pane fade show active" id="iGerais" role="tabpanel" aria-labelledby="iGerais-tab">
                <div class="col-md-12 formpivocentral" id="cssPreloader">
                    @csrf
                    <div class="container">
                        <div class="do-not-break col-12 header">
                            <div class="row">
                                {{-- <div class="col-2">
                                    <img src="{{ asset('img/logos/logo.png') }}" style="height: 50px; width: 200px;"
                                        class="img-responsive mx-auto d-block" alt="">
                                </div> --}}
                                <div class="col-6"></div>
                                <div class="col-6 row text-light text-right">
                                    <div class="col-12">
                                        <b>@lang('usuarios.consultor'): {{ $item['nome_usuario'] }}</b>
                                    </div>
                                    <div class="col-12">
                                        <b><i class="fa fa-fw fa-envelope"></i> {{ $item['email_tecnico'] }} | <i
                                                class="fa fa-fw fa-phone"></i> {{ $item['telefone_tecnico'] }}</b>
                                    </div>
                                </div>
                            </div>
                            {{-- CABEÇALHO FICHA TECNICA --}}
                            <div class="text-center cor-fundo">
                                    <h2>@lang('entregaTecnica.ft_entrega_tecnica')</h2>
                            </div>
                        </div>
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="row">
                                <div class="col-md-2 ">
                                    <b>@lang('fichaTecnica.proprietario'):</b>
                                </div>
                                <div class="col-md-4">
                                    {{ $item['nome_proprietario'] }}
                                </div>
                                <div class="col-md-2">
                                    <b>@lang('fichaTecnica.propriedade'):</b>
                                </div>
                                <div class="col-md-4">
                                    {{ $item['nome'] }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <b>@lang('fichaTecnica.municipio'):</b>
                                </div>
                                <div class="col-md-4">
                                    {{ $item['cidade'] }}
                                </div>
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.estado'):</b>
                                </div>
                                <div class="col-md-4">
                                    {{ $item['estado'] }}
                                </div>
                            </div>

                            {{-- 1º PARTE DA FICHA TÉCNICA --}}
                            <div class="row">

                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.data'):</b>
                                </div>
                                <div class="col-md-2">
                                    {{ date('d/m/Y', strtotime($item['data_entrega_tecnica'])) }}
                                </div>

                                <div class="col-md-2">
                                    
                                </div>

                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.numero_pedido'):</b>
                                </div>
                                <div class="col-md-2">
                                    {{ $item['numero_pedido'] }}
                                </div>
                            </div>
                            {{-- DADOS DA CARACTERÍSTICA GERAIS --}}     
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.caracteristicas_gerais'){{ $texto_composicao }}</h4>
                            </div>
                
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div>
                                @if(isset($item['numero_serie'])) <div class="col-md-2"> <span>{{ $item['numero_serie']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.modelo_equipamento'):</b></div>
                                @if(isset($item['modelo_equipamento'])) <div class="col-md-2"> <span>{{ $item['modelo_equipamento']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.tipo_equipamento'):</b></div>
                                @if(isset($item['tipo_equipamento'])) <div class="col-md-2"> <span>{{ __('listas.'. $item['tipo_equipamento'] )}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.opcao_equipamento'):</b></div>
                                @if(isset($item['tipo_equipamento_op1'])) <div class="col-md-2"> <span>{{ __('listas.'. $item['tipo_equipamento_op1'])}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                <div class="col-md-2"><b>@lang('entregaTecnica.painel'):</b></div>
                                @if(isset($item['painel'])) <div class="col-md-2" style="font-size: 12px;"> <span>{{ $item['painel']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.balanco'):</b></div>
                                @if(isset($item['balanco_comprimento'])) <div class="col-md-2"> <span>{{ $item['balanco_comprimento']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>
                
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.altura'):</b></div>
                                @if(isset($item['altura_equipamento_nome'])) <div class="col-md-2"> <span>{{ $item['altura_equipamento_nome']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente'):</b></div>
                                @if(isset($item['corrente_fusivel_nh500v'])) <div class="col-md-2"> <span>{{ $item['corrente_fusivel_nh500v']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.pneus'):</b></div>
                                @if(isset($item['pneus'])) <div class="col-md-2"> <span>{{ $item['pneus']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>
                
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.giro'):</b></div>
                                @if(isset($item['giro']))<div class="col-md-2"> <span>{{ $item['giro']}} @lang('unidadesAcoes._graus')</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>                    
                            
                            <div class="row">
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.injeferdPotencia'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @else 
                                    <div class="col-md-2"><b>@lang('entregaTecnica.injeferdPotencia'):</b></div>
                                    <div class="col-md-2">
                                        <span>{{ $item['injeferd'] ? __('comum.sim') : __('comum.nao')}}</span>
                                    </div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.canhaoFinal'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @else 
                                    <div class="col-md-2"><b>@lang('entregaTecnica.canhaoFinal'):</b></div>
                                    <div class="col-md-2">
                                        <span>{{ $item['canhao_final_valvula'] ? __('comum.sim') : __('comum.nao')}}</span>
                                    </div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.parada_automatica'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @else 
                                    <div class="col-md-2"><b>@lang('entregaTecnica.parada_automatica'):</b></div>
                                    <div class="col-md-2">
                                        <span>{{ $item['parada_automatica'] ? __('comum.sim') : __('comum.nao') }}</span>
                                    </div>
                                @endif
                            </div>
                
                            <div class="row mb-3">
                                @if (isset($item['barreira_seguranca']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.barreira_seguranca'):</b></div>
                                    <div class="col-md-2">
                                        <span>{{ $item['barreira_seguranca'] ? __('comum.sim') : __('comum.nao') }} </span>
                                    </div>
                                    @else <div class="col-md-2"><b>@lang('entregaTecnica.barreira_seguranca'):</b></div> <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>
                            <!------------------------------------------------------------------------------------------------>
                        </div>

                        {{-- LANCES --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.lances')</h4>
                            </div>

                            <div class="d-flex justify-content-center col-md-12 mb-3">
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
                                        @if(count($lances) > 0)
                                            @foreach ($lances as $lance) 
                                                    <tr>
                                                    <td>{{ $lance['diametro_tubo']}}</td>
                                                    <td>{{ $lance['quantidade_tubo']}}</td>
                                                    <td>{{ $lance['motorredutor_potencia']}}</td>
                                                    <td>{{ $lance['motorredutor_marca']}}</td>
                                                    <td>{{ $lance['numero_serie'] }}</td>
                                                    <td>{{ $lance['comprimento_lance']}} @lang('unidadesAcoes._m')</td>
                                                </tr>
                                            @endforeach
                                        @else 
                                            <tr class="borda-campos-vazios">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr class="borda-campos-vazios">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr class="borda-campos-vazios">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- ASPERSORES --}}

                        {{-- ASPERSOR CANHÃO FINAL --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.aspersores')</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.marca_aspersor'):</b></div>
                                @if(isset($item['aspersor_marca'])) <div class="col-md-2 pr-5"> <span>{{ __('listas.'. $item['aspersor_marca']) }}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.modelo_aspersor'):</b></div>
                                @if(isset($item['aspersor_modelo'])) <div class="col-md-2 pr-5"> <span>{{ $item['aspersor_modelo']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.defletor'):</b></div>
                                @if(isset($item['aspersor_defletor'])) <div class="col-md-2 pr-5"> <span>{{ __('listas.'. $item['aspersor_defletor']) }}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>

                            {{-- ASPERSOR REGULADOR --}}
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.marca_regulador'):</b></div>
                                @if(isset($item['aspersor_regulador_marca'])) <div class="col-md-2 pr-5"> <span>{{ __('listas.'. $item['aspersor_regulador_marca']) }}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.modelo_regulador'):</b></div>
                                @if(isset($item['aspersor_regulador_modelo'])) <div class="col-md-2 pr-5"> <span>{{ $item['aspersor_regulador_modelo']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                <div class="col-md-2"><b>@lang('entregaTecnica.pressao'):</b></div>
                                @if(isset($item['aspersor_pressao'])) <div class="col-md-2 pr-5"> <span>{{ $item['aspersor_pressao']}}</span> </div>
                                    @else <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>

                            {{-- ASPERSOR DE IMPACTO --}}
                            <div class="row">
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca_aspersor_impacto'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_impacto_marca']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca_aspersor_impacto'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_impacto_marca'] }}</span> </div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca_aspersor_impacto'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_impacto_modelo']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo_aspersor_impacto'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_impacto_modelo'] }}</span> </div>
                                @endif
                            </div>

                            {{-- ASPERSOR CANHÃO FINAL --}}
                            <div class="row">
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.canhao_final_marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_canhao_final']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.canhao_final_marca'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_canhao_final'] }}</span> </div>
                                @endif
                            </div>

                            {{-- ASPERSOR OPCIONAIS --}}
                            <div class="row"> 
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.outros'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_opcionais']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.outros'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_opcionais'] }}</span> </div>
                                @endif
                            </div>    
                            
                            {{-- ASPERSOR BOMBA BOOSTER --}}
                            <div class="row mb-3">
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_mbbooster_marca']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_marca'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_mbbooster_marca'] }}</span> </div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_modelo'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['bomba_booster_modelo']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_modelo'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['bomba_booster_modelo'] }}</span> </div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_rotor'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_mbbooster_rotor']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_rotor'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_mbbooster_rotor'] }}</span> </div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_potencia'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_mbbooster_potencia']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_potencia'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_mbbooster_potencia'] }}</span> </div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_corrente'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['aspersor_mbbooster_corrente']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.bomba_booster_corrente'):</b></div>
                                    <div class="col-md-2 pt-2 pr-5"> <span>{{ $item['aspersor_mbbooster_corrente'] }}</span> </div>
                                @endif
                            </div>
                            <!------------------------------------------------------------------------------------------------>
                        </div>

                        {{-- ADUTORA --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.adutora')</h4>
                            </div>                                
                            <div class="d-flex justify-content-center col-md-12 mb-3">
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
                                        @if (count($adutora) > 0)
                                            @foreach ($adutora as $item) 
                                                <tr>
                                                    <td>{{ __('listas.' . $item['tipo_tubo']) }}</td>
                                                    <td>{{ $item['diametro']}} @lang('unidadesAcoes._pol')</td>
                                                    <td>{{ $item['numero_linha']}}</td>
                                                    <td>{{ $item['comprimento']}} @lang('unidadesAcoes._m')</td>
                                                    <td>{{ __('listas.' . $item['fornecedor'] ) }}</td>
                                                    <td>{{ __('listas.' . $item['marca_tubo'] ) }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="borda-campos-vazios">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr class="borda-campos-vazios">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr class="borda-campos-vazios">
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>                            
                        </div>

                        {{-- LIGAÇÃO --}}                               
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.ligacao')</h4>
                            </div>

                            {{-- TUBO AZ --}}
                            <div class=''>                                    
                                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.tubo_az')</b></div>
                            </div>
                            <div class='row mb-3'>
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.comprimento'): 1</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['tubo_az1_comprimento']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento') 1:</b></div>
                                    <div class="col-md-1">{{ $item['tubo_az1_comprimento'] }} @lang('unidadesAcoes._m')</div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro'): 1</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['tubo_az1_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') 1:</b></div>
                                    <div class="col-md-1">{{ $item['tubo_az1_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.comprimento'): 2</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['tubo_az2_comprimento']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento') 2:</b></div>
                                    <div class="col-md-1">{{ $item['tubo_az2_comprimento'] }} @lang('unidadesAcoes._m')</div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro'): 2</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['tubo_az2_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') 2:</b></div>
                                    <div class="col-md-1">{{ $item['tubo_az2_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif
                            </div>

                            {{-- PEÇA DE AUMENTO --}}
                            <div class='d-flex justify-content-start'>                                    
                                <div class="col-md-6 text-start sub_titulo_ft mr-4" style="max-width: 48%;"><b>@lang('entregaTecnica.registro_gaveta')</b></div>
                                <div class="col-md-6 text-start sub_titulo_ft mr-5" style="max-width: 50%;"><b>@lang('entregaTecnica.peca_aumento')</b></div>
                            </div>
                            <div class='row'>
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['registro_gaveta_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro'):</b></div>
                                    <div class="col-md-1">{{ $item['registro_gaveta_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['registro_gaveta_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['registro_gaveta_marca'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro_maior'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['peca_aumento_diametro_maior']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['peca_aumento_diametro_maior'] }} @lang('unidadesAcoes._m')</div>
                                @endif
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro_menor'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['peca_aumento_diametro_menor']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro_menor'):</b></div>
                                    <div class="col-md-1">{{ $item['peca_aumento_diametro_menor'] }} @lang('unidadesAcoes._pol')</div>
                                @endif
                            </div>


                            {{-- VALVULA VENTOSA --}}
                            <br>
                            <div class=''>                                    
                                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_ventosa')</b></div>
                            </div>
                            <div class='row'>
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_ventosa_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_ventosa_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_ventosa_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_ventosa_marca'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.material'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_ventosa_modelo']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.material'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_ventosa_modelo'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.quantidade'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['quantidade_valv_ventosa']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.quantidade'):</b></div>
                                    <div class="col-md-1">{{ $item['quantidade_valv_ventosa'] }}</div>
                                @endif
                            </div>

                            <br>
                            {{-- VALVULA DE RETENÇÃO --}}
                            <div class=''>                                    
                                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_retencao')</b></div>
                            </div>
                            <div class='row mb-3'>
                                
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_retencao_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_retencao_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_retencao_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_retencao_marca'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.material'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_retencao_material']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.material'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_retencao_material'] }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- ACESSÓRIOS --}}     
                        <div class="do-not-break">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.acessorios')</h4>
                            </div>

                            {{-- VALVULA ANTECIPADORA DE ONDAS --}}
                            <div class='row'>                                    
                                <div class="col-md-12"><b>@lang('entregaTecnica.valvula_antecipadora')</b></div>
                            </div>
                            <div class='row'>
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.material'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_antecondas_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') 1:</b></div>
                                    <div class="col-md-2">{{ $item['valvula_antecondas_diametro'] }} @lang('unidadesAcoes._m')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_antecondas_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_antecondas_marca'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_antecondas_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_antecondas_marca'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['valvula_antecondas_modelo']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.modelo'):</b></div>
                                    <div class="col-md-1">{{ $item['valvula_antecondas_modelo'] }}</div>
                                @endif
                            </div>
                        </div>

                        {{-- HIDROMETRO --}}                                                  
                        <div class="do-not-break">
                            <div class='row'>                                    
                                <div class="col-md-12"><b>@lang('entregaTecnica.hidrometro')</b></div>
                            </div>
                            <div class='row mb-3'>
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.diametro'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['registro_eletrico_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro'):</b></div>
                                    <div class="col-md-2">{{ $item['registro_eletrico_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['registro_eletrico_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-1">{{ $item['registro_eletrico_marca'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['registro_eletrico_modelo']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.modelo'):</b></div>
                                    <div class="col-md-1">{{ $item['registro_eletrico_modelo'] }}</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.outros'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['medicoes_ligpress_outros']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.outros'):</b></div>
                                    <div class="col-md-1">{{ $item['medicoes_ligpress_outros'] }}</div>
                                @endif
                            </div>
                        </div>                                

                        {{-- CONJUNTO MOTOBOMBA --}}                               
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.moto_bomba')</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-3"><b>@lang('entregaTecnica.quantidade_motobomba'):</b></div>
                                <div class="col-md-1">
                                    {{ $item['quantidade_motobomba']}}
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.tipo_succao'):</b></div>
                                <div class="col-md-2">
                                    {{ $item['tipo_succao']}}
                                </div>
                                @if ($item['ligacao_serie'] > 0)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_serie'):</b></div>
                                    <div class="col-md-2">
                                        @lang('comum.sim')
                                    </div>                                        
                                @elseif($item['ligacao_paralelo'] > 0)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_paralela'):</b></div>
                                    <div class="col-md-2">
                                        @lang('comum.sim')
                                    </div>
                                @endif
                            </div>

                            @foreach ($bombas as $bomba)
                                <div class='mt-3'>                                    
                                    <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_bomba'] }}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div>
                                    <div class="col-md-2">
                                        {{ $bomba['marca']}}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo'):</b></div>
                                    <div class="col-md-2">
                                        {{ $bomba['modelo']}}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_estagio'):</b></div>
                                    <div class="col-md-2">
                                        {{ $bomba['numero_estagio']}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.rotor'):</b></div>
                                    <div class="col-md-2">
                                        {{ $bomba['rotor']}}  @lang('unidadesAcoes._mm')
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.opcionais'):</b></div>
                                    <div class="col-md-2">
                                        {{ $bomba['opcionais']}}
                                    </div>
                                </div>

                                @foreach ($motores as $motor)
                                    @if ($motor['id_bomba'] == $bomba['id_bomba'])      
                                        <div class='mt-3'>
                                            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.motor') - {{ $motor['id_motor'] }}</b></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"><b>@lang('entregaTecnica.tipo_motor'):</b></div>
                                            <div class="col-md-2">
                                                {{ $motor['tipo_motor']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div>
                                            <div class="col-md-2">
                                                {{ $motor['marca']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.modelo'):</b></div>
                                            <div class="col-md-2">
                                                {{ $motor['modelo']}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"><b>@lang('entregaTecnica.potencia'):</b></div>
                                            <div class="col-md-2">
                                                {{ $motor['potencia']}}  @lang('unidadesAcoes._cv')
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.rotacao'):</b></div>
                                            <div class="col-md-2">
                                                {{ $motor['rotacao']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div>
                                            <div class="col-md-2">
                                                {{ $motor['numero_serie']}}
                                            </div>
                                        </div>

                                        @if ($motor['tipo_motor'] == 'eletrico')                                            
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['tensao']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.lp_ln'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['lp_ln']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.classe_isolamento'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['classe_isolamento']}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente_nominal'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['corrente_nominal']}} @lang('unidadesAcoes._a')
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.fs'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['fs']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.ip'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['ip']}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.rendimento'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['rendimento']}} @lang('unidadesAcoes._%')
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.cos'):</b></div>
                                                <div class="col-md-2">
                                                    {{ $motor['cos']}}
                                                </div>
                                            </div>
                                            
                                            @foreach ($chave_partida as $cp)  
                                                @if ($cp['id_bomba'] == $bomba['id_bomba'])  
                                                    @if ($cp['id_motor'] == $motor['id_motor'])                                                    
                                                        <div class='mt-2'>
                                                            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.chave_partida') - {{ $cp['id_chave_partida'] }}</b></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2"><b>@lang('entregaTecnica.marca'):</b></div>
                                                            <div class="col-md-2">
                                                                {{ $cp['marca'] }}
                                                            </div>
                                                            <div class="col-md-2"><b>@lang('entregaTecnica.acionamento'):</b></div>
                                                            <div class="col-md-2">
                                                                {{ __('listas.'. $cp['acionamento'] )}}
                                                            </div>
                                                            <div class="col-md-2"><b>@lang('entregaTecnica.regulagem_reles'):</b></div>
                                                            <div class="col-md-2">
                                                                {{ $cp['regulagem_reles']}}
                                                            </div>
                                                        </div>                                      
                                                        <div class="row">
                                                            <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div>
                                                            <div class="col-md-2">
                                                                {{ $cp['numero_serie']}}
                                                            </div>
                                                        </div>
                                                    @endif
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

                        {{-- SUCÇÃO --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.succao')</h4>
                            </div>
                            <div class='row mb-3'>
                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.medicao_succao_l'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['medicao_succao_l']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_l'):</b></div>
                                    <div class="col-md-2 pr-3">{{ $item['medicao_succao_l'] }} @lang('unidadesAcoes._m')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.medicao_succao_h'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['medicao_succao_h']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_h'):</b></div>
                                    <div class="col-md-2 pr-3">{{ $item['medicao_succao_h'] }} @lang('unidadesAcoes._m')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.medicao_succao_e'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['medicao_succao_e']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_e'):</b></div>
                                    <div class="col-md-2 pr-3">{{ $item['medicao_succao_e'] }} @lang('unidadesAcoes._m')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.medicao_succao_diametro'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['medicao_succao_diametro']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_diametro'):</b></div>
                                    <div class="col-md-2 pr-3">{{ $item['medicao_succao_diametro'] }} @lang('unidadesAcoes._pol')</div>
                                @endif

                                @if($item['status'] == 0 || $item['status'] == 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.medicao_succao_tipo'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @elseif(isset($item['medicao_succao_tipo']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_tipo'):</b></div>
                                    <div class="col-md-2 pr-3">{{ $item['medicao_succao_tipo'] }}</div>
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                @if (!empty($item['tipo_succao']))
                                    <img src="{{ asset('img/img_succao/'. $item['tipo_succao'] . 'Pb.png' )}}"/>
                                @elseif (!empty($item['succao_auxiliar']))
                                    <img src="{{ asset('img/img_succao/'. $item['succao_auxiliar'] . 'Pb.png' )}}"/>
                                @endif
                                </div>
                            </div>
                        </div>
                        
                        {{-- AUTOTRÁFO --}}
                        <div class="do-not-break espacamento-cabecalho mb-3">
                            <div class='text-center cor-fundo'>
                                <h4>@lang('entregaTecnica.autotrafo_elevacao')</h4>
                            </div>
                            <div class='row'>
                                @if(isset($autotrafo['potencia_elevacao']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.potencia'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['potencia_elevacao'] }} @lang('unidadesAcoes._cv')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.potencia'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                @if(isset($autotrafo['tap_entrada_elevacao']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['tap_entrada_elevacao'] }}  @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tap_entrada'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                @if(isset($autotrafo['tap_saida_elevacao']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['tap_saida_elevacao'] }} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tap_saida'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>

                            <div class='row'>
                                @if(isset($autotrafo['corrente_disjuntor']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.corrente_disjuntor'):</b></div>
                                    <div class="col-md-2">{{  $autotrafo['corrente_disjuntor'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.corrente_disjuntor'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                @if(isset($autotrafo['numero_serie_elevacao']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.numero_serie'):</b></div>
                                    <div class="col-md-2">{{  $autotrafo['numero_serie_elevacao'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>

                            <div class='row col-md-12 mt-1'>
                                <h3><b>@lang('entregaTecnica.autotrafo_rebaixamento')</b></h3>
                            </div>

                            <div class='row'>
                                
                                @if(isset($autotrafo['potencia_rebaixamento']))
                                <div class="col-md-2 "><b>@lang('entregaTecnica.potencia'):</b></div>
                                <div class="col-md-2">{{ $autotrafo['potencia_rebaixamento'] }} @lang('unidadesAcoes._cv')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.potencia'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['tap_entrada_rebaixamento']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['tap_entrada_rebaixamento'] }}  @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tap_entrada'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['tap_saida_rebaixamento']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida'):</b></div>
                                    <div class="col-md-2">{{  $autotrafo['tap_saida_rebaixamento'] }}  @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tap_saida'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['numero_serie_rebaixamento']))
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['numero_serie_rebaixamento'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>
                        </div>                                
                
                        {{-- GERADOR --}}
                        <div class="do-not-break espacamento-cabecalho mb-3">

                            <div class='text-center cor-fundo'>
                                <h4>@lang('entregaTecnica.gerador')</h4>
                            </div>
                            <div class='row'>                                
                                @if(isset($autotrafo['gerador']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.gerador'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['gerador_marca']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_marca'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_marca'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.gerador_marca'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['gerador_modelo']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_modelo'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_modelo'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.gerador_modelo'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['gerador_potencia']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_potencia'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_potencia'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.gerador_potencia'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['gerador_frequencia']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_frequencia'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_frequencia'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.gerador_frequencia'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['gerador_tensao']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_tensao'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_tensao'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.gerador_tensao'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($autotrafo['numero_serie_gerador']))
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.numero_serie'):</b></div>
                                    <div class="col-md-2">{{ $autotrafo['numero_serie_gerador'] }}</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>
                        </div>

                        <div class="pagebreak"> </div>

                        {{-- TESTES HIDRAULICOS --}}                               
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.teste_torre_central')</h4>
                            </div>

                            <div class="row mb-3">
                                
                                @if(isset($teste_torre_central['tensao_rs_semcarga']))
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_sem_carga'):</b></div>
                                    <div class="col-md-1">{{ $teste_torre_central['tensao_rs_semcarga']}} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_sem_carga'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($teste_torre_central['tensao_st_semcarga']))
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_sem_carga'):</b></div>
                                    <div class="col-md-1">{{ $teste_torre_central['tensao_st_semcarga']}} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_sem_carga'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                                
                                @if(isset($teste_torre_central['tensao_rt_semcarga']))
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_sem_carga'):</b></div>
                                    <div class="col-md-1">{{ $teste_torre_central['tensao_rt_semcarga']}} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_sem_carga'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    @if (isset($teste_torre_central['tensao_rs_semcarga_img'])) <img src="{{ asset('storage/'. $teste_torre_central['tensao_rs_semcarga_img'])}}"/> @endif
                                </div>
                                <div class="col-md-4">
                                    @if (isset($teste_torre_central['tensao_st_semcarga_img'])) <img src="{{ asset('storage/'. $teste_torre_central['tensao_st_semcarga_img'])}}"/> @endif
                                </div>
                                <div class="col-md-4">
                                    @if (isset($teste_torre_central['tensao_rt_semcarga_img'])) <img src="{{ asset('storage/'. $teste_torre_central['tensao_rt_semcarga_img'])}}"/> @endif   
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-3">
                                @if(isset($teste_torre_central['tensao_rs_comcarga']))
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_com_carga'):</b></div>
                                    <div class="col-md-1">{{ $teste_torre_central['tensao_rs_comcarga']}} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_com_carga'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                @if(isset($teste_torre_central['tensao_st_comcarga']))
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_com_carga'):</b></div>
                                    <div class="col-md-1">{{ $teste_torre_central['tensao_st_comcarga']}} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_com_carga'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif

                                @if(isset($teste_torre_central['tensao_rt_comcarga']))
                                    <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_com_carga'):</b></div>
                                    <div class="col-md-1">{{ $teste_torre_central['tensao_rt_comcarga']}} @lang('unidadesAcoes._v')</div>
                                @else
                                    <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_com_carga'):</b></div> 
                                    <div class="col-md-2 borda-campos-vazios"></div> 
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    @if (isset($teste_torre_central['tensao_rs_comcarga_img']) )<img src="{{ asset('storage/'. $teste_torre_central['tensao_rs_comcarga_img'])}}"/> @endif   
                                </div>
                                <div class="col-md-4">
                                    @if (isset($teste_torre_central['tensao_st_comcarga_img'])) <img src="{{ asset('storage/'. $teste_torre_central['tensao_st_comcarga_img'])}}"/> @endif   
                                </div>
                                <div class="col-md-4">
                                    @if (isset($teste_torre_central['tensao_rt_comcarga_img'])) <img src="{{ asset('storage/'. $teste_torre_central['tensao_rt_comcarga_img'])}}"/> @endif  
                                </div>
                            </div>
                        </div>

                        {{-- TESTES ELETRICOS --}}                               
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.teste_bomba_cp')</h4>
                            </div>
                            @foreach ($teste_bombas as $bomba)
                                <div class='mt-3'>                                    
                                    <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_testeh_mb'] }}</b></div>
                                </div>

                                <div class="row">
                                    @if(isset($bomba['pressao_reg_fechado']))
                                        <div class="col-md-4"><b>@lang('entregaTecnica.pressao_reg_fechado'):&nbsp;</b>
                                            {{ $bomba['pressao_reg_fechado']}} @lang('unidadesAcoes._kgf/cm²')
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.pressao_reg_fechado'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif

                                    @if(isset($bomba['pressao_reg_aberto']))
                                        <div class="col-md-4"><b>@lang('entregaTecnica.pressao_reg_aberto'):&nbsp;</b>
                                            {{ $bomba['pressao_reg_aberto']}} @lang('unidadesAcoes._kgf/cm²')
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.pressao_reg_aberto'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif

                                    @if(isset($bomba['pressao_centro']))
                                        <div class="col-md-4"><b>@lang('entregaTecnica.pressao_centro'):&nbsp;</b>
                                            {{ $bomba['pressao_centro']}} @lang('unidadesAcoes._kgf/cm²')
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.pressao_centro'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        @if (isset($bomba['pressao_reg_fechado_img'])) <img src="{{ asset('storage/'. $bomba['pressao_reg_fechado_img'])}}"/> @endif
                                    </div>
                                    <div class="col-md-4">
                                        @if (isset($bomba['pressao_reg_aberto_img'])) <img src="{{ asset('storage/'. $bomba['pressao_reg_aberto_img'])}}"/> @endif
                                    </div>
                                    <div class="col-md-4">
                                        @if (isset($bomba['pressao_centro_img'])) <img src="{{ asset('storage/'. $bomba['pressao_centro_img'])}}"/> @endif
                                    </div>
                                </div>

                                <div class="row">

                                    @if(isset($bomba['pressao_ult_torre']))
                                        <div class="col-md-4"><b>@lang('entregaTecnica.pressao_ult_torre'):&nbsp;</b>
                                            {{ $bomba['pressao_ult_torre']}} @lang('unidadesAcoes._kgf/cm²')
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.pressao_ult_torre'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        @if (isset($bomba['pressao_ult_torre_img'])) <img src="{{ asset('storage/'. $bomba['pressao_ult_torre_img'])}}"/> @endif
                                    </div>
                                </div>

                                <hr>

                                @foreach ($teste_chave_partida as $cp)
                                    @if ($cp['id_bomba'] == $bomba['id_testeh_mb'])      
                                        <div class='mt-3'>
                                            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.chave_partida') - {{ $cp['id_chave_partida'] }}</b></div>
                                        </div>
                                        <div class="row">
                                            @if(isset($cp['tensao_rs_semcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.tensao_rs_sem_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_rs_semcarga']}} @lang('unidadesAcoes._v')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_sem_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif

                                            @if(isset($cp['tensao_st_semcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.tensao_st_sem_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_st_semcarga']}} @lang('unidadesAcoes._v')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_sem_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                            
                                            @if(isset($cp['tensao_rt_semcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.tensao_rt_sem_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_rt_semcarga']}} @lang('unidadesAcoes._v')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_sem_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if (isset($cp['tensao_rs_semcarga_img'])) <img src="{{ asset('storage/'. $cp['tensao_rs_semcarga_img'])}}"/> @endif   
                                            </div>
                                            <div class="col-md-4">
                                                @if (isset($cp['tensao_st_semcarga_img'])) <img src="{{ asset('storage/'. $cp['tensao_st_semcarga_img'])}}"/> @endif   
                                            </div>
                                            <div class="col-md-4">
                                                @if (isset($cp['tensao_rt_semcarga_img'])) <img src="{{ asset('storage/'. $cp['tensao_rt_semcarga_img'])}}"/> @endif   
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            
                                            @if(isset($cp['tensao_rs_comcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.tensao_rs_com_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_rs_comcarga']}} @lang('unidadesAcoes._v')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_com_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                            
                                            @if(isset($cp['tensao_st_comcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.tensao_st_com_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_st_comcarga']}} @lang('unidadesAcoes._v')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_com_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                            
                                            @if(isset($cp['tensao_rt_comcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.tensao_rt_com_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_rt_comcarga']}} @lang('unidadesAcoes._v')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_com_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if (isset($cp['tensao_rs_comcarga_img'])) <img src="{{ asset('storage/'. $cp['tensao_rs_comcarga_img'])}}"/> @endif   
                                            </div>
                                            <div class="col-md-4">
                                                @if (isset($cp['tensao_st_comcarga_img'])) <img src="{{ asset('storage/'. $cp['tensao_st_comcarga_img'])}}"/> @endif   
                                            </div>
                                            <div class="col-md-4">
                                                @if (isset($cp['tensao_rt_comcarga_img'])) <img src="{{ asset('storage/'. $cp['tensao_rt_comcarga_img'])}}"/> @endif   
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            
                                            @if(isset($cp['tensao_rt_comcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.corrente_rs_com_carga'):&nbsp;</b>
                                                    {{ $cp['tensao_rt_comcarga']}} @lang('unidadesAcoes._a')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente_rs_com_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                            
                                            @if(isset($cp['corrente_st_comcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.corrente_st_com_carga'):&nbsp;</b>
                                                    {{ $cp['corrente_st_comcarga']}} @lang('unidadesAcoes._a')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente_st_com_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                            
                                            @if(isset($cp['corrente_rt_comcarga']))
                                                <div class="col-md-4"><b>@lang('entregaTecnica.corrente_rt_com_carga'):&nbsp;</b>
                                                    {{ $cp['corrente_rt_comcarga']}} @lang('unidadesAcoes._a')
                                                </div>
                                            @else
                                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente_rt_com_carga'):</b></div> 
                                                <div class="col-md-2 borda-campos-vazios"></div> 
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                @if (isset($cp['corrente_rs_comcarga_img'])) <img src="{{ asset('storage/'. $cp['corrente_rs_comcarga_img'])}}"/>    @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if (isset($cp['corrente_st_comcarga_img'])) <img src="{{ asset('storage/'. $cp['corrente_st_comcarga_img'])}}"/>    @endif
                                            </div>
                                            <div class="col-md-4">
                                                @if (isset($cp['corrente_rt_comcarga_img'])) <img src="{{ asset('storage/'. $cp['corrente_rt_comcarga_img'])}}"/>    @endif
                                            </div>
                                        </div>
                                    @endif                                      
                                @endforeach
                            @endforeach
                        </div>

                        {{-- TELEMETRIA --}}                      
                            <div class="do-not-break espacamento-cabecalho mt-4 mb-3">    
                                <div class="text-center cor-fundo">
                                    <h4>@lang('entregaTecnica.telemetria')</h4>
                                </div>
                                <div class='row'>
                                            
                                    @if(isset($telemetria['aqua_tec_pro']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.aqua_tec_pro'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['aqua_tec_pro']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.aqua_tec_pro'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                            
                                    @if(isset($telemetria['aqua_tec_lite']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.aqua_tec_lite'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['aqua_tec_lite']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.aqua_tec_lite'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                            
                                    @if(isset($telemetria['commander_vp']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.commander_vp'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['commander_vp']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.commander_vp'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                </div>

                                <div class="row">
                                            
                                    @if(isset($telemetria['icon_link']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.icon_link'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['icon_link']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.icon_link'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                            
                                    @if(isset($telemetria['crop_link']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.crop_link'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['crop_link']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.crop_link'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                            
                                    @if(isset($telemetria['base_station3']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.base_station3'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['base_station3']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.base_station3'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                </div>

                                <div class="row">
                                            
                                    @if(isset($telemetria['field_commander']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.field_commander'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['field_commander']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.field_commander'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                            
                                    @if(isset($telemetria['estacao_metereologica_valley']))
                                        <div class="col-md-3"><b>@lang('entregaTecnica.estacao_metereologica_valley'):</b></div>
                                        <div class="col-md-1">
                                            {{ ($telemetria['estacao_metereologica_valley']) ? __('comum.sim') : __('comum.nao') }}
                                        </div>
                                    @else
                                        <div class="col-md-2"><b>@lang('entregaTecnica.estacao_metereologica_valley'):</b></div> 
                                        <div class="col-md-2 borda-campos-vazios"></div> 
                                    @endif
                                </div>
                            </div>    
                            <hr>       

                        <div class="pagebreak">&nbsp;</div>
    
                        {{-- BORDA FOOTER --}}
                                                        
                        <div class="do-not-break footer-fixed-bottom mt-4">
                            <div class="text-center cor-fundo">
                                <span class="align-middle">@lang('entregaTecnica.valmont')</span>
                            </div>
                        </div>
                                
                    </div>
                </div>


            </div>     
        @endforeach

    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#botaosalvar').on('click', function() {
            $('#formdados').submit();
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>

{{-- TOOLTIPS --}}

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

{{-- IMPRIMIR RELATORIO --}}

<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    window.onload = function() {
        var imprimir = document.querySelector("#imprimir");
        var topo = document.querySelector("#topo_detalhe");
        imprimir.onclick = function() {
            imprimir.style.display = 'none';
            topo.style.display = 'none';
            window.print();

            var time = window.setTimeout(function() {
                imprimir.style.display = 'block';
                topo.style.display = 'block';
            }, 1000);
        }
    }
</script>

<script>
    function voltar() {
        window.history.back()
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
    });
</script>

</html>
