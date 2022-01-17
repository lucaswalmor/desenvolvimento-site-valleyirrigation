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
                            {{-- DADOS DA PARTE AÉREA --}}     
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.caracteristicas_gerais'){{ $texto_composicao }}</h4>
                            </div>
                
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ $item['numero_serie']}}</span>
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.modelo_equipamento')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ $item['modelo_equipamento']}}</span>
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.tipo_equipamento')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ __('listas.'. $item['tipo_equipamento'] )}}</span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.opcao_equipamento'):</b></div>
                                <div class="col-md-2">
                                    <span>{{ __('listas.'. $item['tipo_equipamento_op1'])}}</span>
                                </div>
                                
                                <div class="col-md-2"><b>@lang('entregaTecnica.painel')</b>:</div>
                                <div class="col-md-2" style="font-size: 12px;">
                                    <span>{{ $item['painel']}}</span>
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.balanco'):</b></div>
                                <div class="col-md-2">
                                    <span>{{ $item['balanco_comprimento']}}</span>
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.altura')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ $item['altura_equipamento_nome']}}</span>
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ $item['corrente_fusivel_nh500v']}}</span>
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.pneus')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ $item['pneus']}}</span>
                                </div>
                            </div>
                
                            <div class="row">
                                <div class="col-md-2"><b>@lang('entregaTecnica.giro')</b>:</div>
                                <div class="col-md-2">
                                    <span>{{ $item['giro']}}</span>
                                </div>
                            </div>                    
                            
                            <div class="row">
                                @if ($item['telemetria'] != 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.telemetria')</b>:</div>
                                    <div class="col-md-2">
                                        <span>{{ $item['telemetria']}}</span>
                                    </div>
                                @endif
                                @if ($item['injeferd'] != 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.injeferd')</b>:</div>
                                    <div class="col-md-2">
                                        <span>{{ $item['injeferd']}}</span>
                                    </div>
                                @endif
                                @if ($item['canhao_final_valvula'] != 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.canhaoFinal')</b>:</div>
                                    <div class="col-md-2">
                                        <span>{{ $item['canhao_final_valvula']}}</span>
                                    </div>
                                @endif
                            </div>
                
                            <div class="row">
                                @if ($item['parada_automatica'] != 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.parada_automatica')</b>:</div>
                                    <div class="col-md-2">
                                        <span>{{ $item['parada_automatica']}}</span>
                                    </div>
                                @endif
                                @if ($item['barreira_seguranca'] != 1)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.barreira_seguranca')</b>:</div>
                                    <div class="col-md-2">
                                        <span>{{ $item['barreira_seguranca']}}</span>
                                    </div>
                                @endif
                            </div>
                            <!------------------------------------------------------------------------------------------------>
                        </div>

                        {{-- LANCES --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.lances')</h4>
                            </div>

                            <div class="d-flex justify-content-center col-md-12">
                                <table class="col-md-12 text-center">
                                    <thead>
                                        <tr>
                                            <th>@lang('entregaTecnica.diametro')</th>
                                            <th>@lang('entregaTecnica.qtd_tubos')</th>
                                            <th>@lang('entregaTecnica.motorredutor_potencia')</th>
                                            <th>@lang('entregaTecnica.motorredutor_marca')</th>
                                            <th>@lang('entregaTecnica.comprimento_lance')</th>
                                            <th>@lang('entregaTecnica.comprimento_total')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lances as $lance) 
                                                <tr>
                                                <td>{{ $lance['diametro_tubo']}}</td>
                                                <td>{{ $lance['quantidade_tubo']}}</td>
                                                <td>{{ $lance['motorredutor_potencia']}}</td>
                                                <td>{{ $lance['motorredutor_marca']}}</td>
                                                <td>{{ $lance['comprimento_lance']}}</td>
                                                <td>{{ $lance['quantidade_tubo'] * $lance['comprimento_lance'] }}</td>
                                            </tr>
                                        @endforeach
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
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.marca_aspersor')</b>:
                                </div>
                                <div class="col-md-2 pr-5">
                                    <span>{{ __('listas.'. $item['aspersor_marca']) }}</span>
                                </div>
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.modelo_aspersor')</b>:
                                </div>
                                <div class="col-md-2 pr-5">
                                    <span>{{ $item['aspersor_modelo']}}</span>
                                </div>
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.defletor')</b>:
                                </div>
                                <div class="col-md-2 pr-5">
                                    <span>{{ __('listas.'. $item['aspersor_defletor']) }}</span>
                                </div>
                            </div>

                            {{-- ASPERSOR REGULADOR --}}
                            <div class="row">
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.marca_regulador')</b>:
                                </div>
                                <div class="col-md-2 pr-5">
                                    <span>{{ __('listas.'. $item['aspersor_regulador_marca']) }}</span>
                                </div>
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.modelo_regulador')</b>:
                                </div>
                                <div class="col-md-2 pr-5">
                                    <span>{{ $item['aspersor_regulador_modelo']}}</span>
                                </div>
                                <div class="col-md-2">
                                    <b>@lang('entregaTecnica.pressao')</b>:
                                </div>
                                <div class="col-md-2 pr-5">
                                    <span>{{ $item['aspersor_pressao']}}</span>
                                </div>
                            </div>

                            {{-- ASPERSOR DE IMPACTO --}}
                            @if ($item['aspersor_impacto_marca'] != null)
                                <div class="row">                                            
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.marca_aspersor_impacto')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_impacto_marca']}}</span>
                                    </div>
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.modelo_aspersor_impacto')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_impacto_modelo']}}</span>
                                    </div>
                                </div>
                            @endif

                            {{-- ASPERSOR CANHÃO FINAL --}}
                            @if ($item['aspersor_canhao_final'] != null)
                                <div class="row">
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.canhao_final_marca')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_canhao_final']}}</span>
                                    </div>
                                </div>
                            @endif

                            {{-- ASPERSOR OPCIONAIS --}}
                            @if ($item['aspersor_opcionais'] != null)
                                <div class="row">                           
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.outros')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_opcionais']}}</span>
                                    </div>
                                </div>                                    
                            @endif
                            
                            {{-- ASPERSOR BOMBA BOOSTER --}}
                            @if ($item['aspersor_mbbooster_marca'] != null)
                                <div class="row">                           
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.bomba_booster_marca')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_mbbooster_marca']}}</span>
                                    </div>             

                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.bomba_booster_modelo')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_mbbooster_modelo']}}</span>
                                    </div>          

                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.bomba_booster_rotor')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_mbbooster_rotor']}}</span>
                                    </div>      
                                                            
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.bomba_booster_potencia')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_mbbooster_potencia']}}</span>
                                    </div>       
                                                        
                                    <div class="col-md-2">
                                        <b>@lang('entregaTecnica.bomba_booster_corrente')</b>:
                                    </div>
                                    <div class="col-md-2 pr-5">
                                        <span>{{ $item['aspersor_mbbooster_corrente']}}</span>
                                    </div>
                                </div>                                    
                            @endif

                            <!------------------------------------------------------------------------------------------------>
                        </div>

                        {{-- ADUTORA --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.adutora')</h4>
                            </div>                                

                            <div class="d-flex justify-content-center col-md-12">
                                <table class="col-md-12 text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">@lang('afericao.tipoCano')</th>
                                            <th scope="col">@lang('afericao.diametro') @lang('unidadesAcoes.(pol)')</th>
                                            <th scope="col">@lang('afericao.numeroCanos')</th>
                                            <th scope="col">@lang('afericao.comprimento') @lang('unidadesAcoes.(m)')</th>
                                            <th scope="col">@lang('entregaTecnica.fornecedor')</th>
                                            <th scope="col">@lang('entregaTecnica.marca_tubo')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adutora as $iten) 
                                                <tr>
                                                <td>{{ __('listas.' . $iten['tipo_tubo']) }}</td>
                                                <td>{{ $iten['diametro']}}</td>
                                                <td>{{ $iten['numero_linha']}}</td>
                                                <td>{{ $iten['comprimento']}}</td>
                                                <td>{{ __('listas.' . $iten['fornecedor'] ) }}</td>
                                                <td>{{ __('listas.' . $iten['marca_tubo'] ) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            
                            <hr>
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
                            <div class='row'>
                                <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 1</b></div>
                                <div class="col-md-1">{{ $item['tubo_az1_comprimento'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 1</b></div>
                                <div class="col-md-1">{{ $item['tubo_az1_diametro'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 2</b></div>
                                <div class="col-md-1">{{ $item['tubo_az2_comprimento'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 2</b></div>
                                <div class="col-md-1">{{ $item['tubo_az2_diametro'] }}</div>
                            </div>

                            <hr>

                            <br>
                            {{-- PEÇA DE AUMENTO --}}
                            <div class='d-flex justify-content-start'>                                    
                                <div class="col-md-6 text-start sub_titulo_ft mr-4" style="max-width: 48%;"><b>@lang('entregaTecnica.peca_aumento')</b></div>
                                <div class="col-md-6 text-start sub_titulo_ft mr-5" style="max-width: 50%;"><b>@lang('entregaTecnica.registro_gaveta')</b></div>
                            </div>
                            <div class='row'>
                                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro_maior')@lang('unidadesAcoes.(m)')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['peca_aumento_diametro_maior'] }}</div>

                                <div class="col-md-2"><b>@lang('entregaTecnica.diametro_menor')@lang('unidadesAcoes.(pol)')</b></div>
                                <div class="col-md-1">{{ $item['peca_aumento_diametro_menor'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['registro_gaveta_diametro'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['registro_gaveta_marca'] }}</div>
                            </div>

                            <hr>

                            {{-- VALVULA VENTOSA --}}
                            <br>
                            <div class=''>                                    
                                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_ventosa')</b></div>
                            </div>
                            <div class='row'>
                                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['valvula_ventosa_diametro'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['valvula_ventosa_marca'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['valvula_ventosa_modelo'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['quantidade_valv_ventosa'] }}</div>
                            </div>

                            <hr>

                            <br>
                            {{-- VALVULA DE RETENÇÃO --}}
                            <div class=''>                                    
                                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_retencao')</b></div>
                            </div>
                            <div class='row'>
                                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['valvula_retencao_diametro'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['valvula_retencao_marca'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
                                <div class="col-md-1 pr-3">{{ $item['valvula_retencao_material'] }}</div>
                            </div>
                        </div>

                        {{-- ACESSÓRIOS --}}     
                        @if ($item['valvula_antecondas_diametro'] || $item['valvula_antecondas_marca'] || $item['valvula_antecondas_modelo']
                            )
                            <div class="do-not-break">
                                <div class="text-center cor-fundo">
                                    <h4>@lang('entregaTecnica.acessorios')</h4>
                                </div>

                                {{-- VALVULA ANTECIPADORA DE ONDAS --}}
                                <div class='row'>                                    
                                    <div class="col-md-12"><b>@lang('entregaTecnica.valvula_antecipadora')</b></div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(m)') 1</b></div>
                                    <div class="col-md-2">{{ $item['valvula_antecondas_diametro'] }}</div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca') @lang('unidadesAcoes.(pol)') 1</b></div>
                                    <div class="col-md-2">{{ $item['valvula_antecondas_marca'] }}</div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.modelo') @lang('unidadesAcoes.(m)') 2</b></div>
                                    <div class="col-md-2">{{ $item['valvula_antecondas_modelo'] }}</div>
                                </div>
                            </div>

                            {{-- HIDROMETRO --}}                                                  
                            <div class="do-not-break">
                                <div class='row'>                                    
                                    <div class="col-md-12"><b>@lang('entregaTecnica.hidrometro')</b></div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
                                    <div class="col-md-2">{{ $item['registro_eletrico_diametro'] }}</div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                                    <div class="col-md-2">{{ $item['registro_eletrico_marca'] }}</div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.modelo')</b></div>
                                    <div class="col-md-2">{{ $item['registro_eletrico_modelo'] }}</div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.outros')</b></div>
                                    <div class="col-md-2">{{ $item['medicoes_ligpress_outros'] }}</div>
                                </div>
                            </div>                                
                        @endif

                        {{-- CONJUNTO MOTOBOMBA --}}                               
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.moto_bomba')</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-3"><b>@lang('entregaTecnica.quantidade_motobomba')</b>:</div>
                                <div class="col-md-1">
                                    {{ $item['quantidade_motobomba']}}
                                </div>
                                <div class="col-md-2"><b>@lang('entregaTecnica.tipo_succao')</b>:</div>
                                <div class="col-md-2">
                                    {{ $item['tipo_succao']}}
                                </div>
                                @if ($item['ligacao_serie'] > 0)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_serie')</b>:</div>
                                    <div class="col-md-2">
                                        @lang('comum.sim')
                                    </div>                                        
                                @elseif($item['ligacao_paralelo'] > 0)
                                    <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_paralela')</b>:</div>
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
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $bomba['marca']}}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $bomba['modelo']}}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_estagio')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $bomba['numero_estagio']}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.rotor')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $bomba['rotor']}}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.opcionais')</b>:</div>
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
                                            <div class="col-md-2"><b>@lang('entregaTecnica.tipo_motor')</b>:</div>
                                            <div class="col-md-2">
                                                {{ $motor['tipo_motor']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                                            <div class="col-md-2">
                                                {{ $motor['marca']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                                            <div class="col-md-2">
                                                {{ $motor['modelo']}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"><b>@lang('entregaTecnica.potencia')</b>:</div>
                                            <div class="col-md-2">
                                                {{ $motor['potencia']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.rotacao')</b>:</div>
                                            <div class="col-md-2">
                                                {{ $motor['rotacao']}}
                                            </div>
                                            <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                            <div class="col-md-2">
                                                {{ $motor['numero_serie']}}
                                            </div>
                                        </div>

                                        @if ($motor['tipo_motor'] == 'eletrico')                                            
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.tensao')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['tensao']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.lp_ln')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['lp_ln']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.classe_isolamento')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['classe_isolamento']}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.corrente_nominal')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['corrente_nominal']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.fs')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['fs']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.ip')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['ip']}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2"><b>@lang('entregaTecnica.rendimento')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['rendimento']}}
                                                </div>
                                                <div class="col-md-2"><b>@lang('entregaTecnica.cos')</b>:</div>
                                                <div class="col-md-2">
                                                    {{ $motor['cos']}}
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
                                                            {{ $cp['marca'] }}
                                                        </div>
                                                        <div class="col-md-2"><b>@lang('entregaTecnica.acionamento')</b>:</div>
                                                        <div class="col-md-2">
                                                            {{ __('listas.'. $cp['acionamento'] )}}
                                                        </div>
                                                        <div class="col-md-2"><b>@lang('entregaTecnica.regulagem_reles')</b>:</div>
                                                        <div class="col-md-2">
                                                            {{ $cp['regulagem_reles']}}
                                                        </div>
                                                    </div>                                      
                                                    <div class="row">
                                                        <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                                        <div class="col-md-2">
                                                            {{ $motor['numero_serie']}}
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

                        {{-- SUCÇÃO --}}
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.succao')</h4>
                            </div>
                            <div class='row'>
                                <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_l') @lang('unidadesAcoes.(m)')</b></div>
                                <div class="col-md-2 pr-3">{{ $item['medicao_succao_l'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_h') @lang('unidadesAcoes.(m)')</b></div>
                                <div class="col-md-2 pr-3">{{ $item['medicao_succao_h'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_e') @lang('unidadesAcoes.(m)')</b></div>
                                <div class="col-md-2 pr-3">{{ $item['medicao_succao_e'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_diametro') @lang('unidadesAcoes.(pol)')</b></div>
                                <div class="col-md-2 pr-3">{{ $item['medicao_succao_diametro'] }}</div>

                                <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_tipo')</b></div>
                                <div class="col-md-2 pr-3">{{ $item['medicao_succao_tipo'] }}</div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/'. $item['tipo_succaos'])}}"/>   
                                </div>
                            </div> --}}
                        </div>

                        @if (!empty($autotrafo['potencia_elevacao']) || !empty($autotrafo['tap_entrada_elevacao']) || !empty($autotrafo['tap_saida_elevacao']) || 
                            !empty($autotrafo['corrente_disjuntor']))
                            {{-- AUTOTRÁFO --}}
                            <div class="do-not-break espacamento-cabecalho">
                                <div class='row col-md-12 text-center cor-fundo'>
                                    <h3><b>@lang('entregaTecnica.autotrafo_elevacao')</b></h3>
                                </div>
                                <div class='row'>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['potencia_elevacao'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['tap_entrada_elevacao'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['tap_saida_elevacao'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.corrente_disjuntor')</b></div>
                                    <div class="col-md-2">{{  $autotrafo['corrente_disjuntor'] }}</div>
                                </div>
                                <div class='row'>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['numero_serie_elevacao'] }}</div>
                                </div>
                                <div class='row col-md-12 mt-3'>
                                    <h3><b>@lang('entregaTecnica.autotrafo_rebaixamento')</b></h3>
                                </div>
                                <div class='row'>
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['potencia_rebaixamento'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['tap_entrada_rebaixamento'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</b></div>
                                    <div class="col-md-2">{{  $autotrafo['tap_saida_rebaixamento'] }}</div>
                    
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['numero_serie_rebaixamento'] }}</div>
                                </div>
                            </div>                                
                        @endif
                
                        {{-- GERADOR --}}
                        @if ($autotrafo['gerador'] != null || $autotrafo['gerador_marca'] != null || $autotrafo['gerador_modelo'] != null || 
                            $autotrafo['gerador_potencia'] != null || $autotrafo['gerador_frequencia'] != null || 
                            $autotrafo['gerador_tensao'] != null || $autotrafo['numero_serie_gerador'] != null)
                            <div class="do-not-break espacamento-cabecalho">
                                <div class='row col-md-12 text-center cor-fundo'>
                                    <h3><b>@lang('entregaTecnica.gerador')</b></h3>
                                </div>
                                <div class='row'>
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador')</b></div>
                                    <div class="col-md-2">
                                        @if ($autotrafo['gerador'] == null)
                                            
                                        @else 
                                            {{ __('listas.'. $autotrafo['gerador'] ) }}
                                        @endif
                                    </div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_marca')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_marca'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_modelo')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_modelo'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_potencia')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_potencia'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_frequencia')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_frequencia'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_tensao')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['gerador_tensao'] }}</div>
                    
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.numero_serie')</b></div>
                                    <div class="col-md-2">{{ $autotrafo['numero_serie_gerador'] }}</div>
                                </div>
                            </div>
                        @endif

                        <div class="pagebreak"> </div>

                        {{-- TESTES HIDRAULICOS --}}                               
                        <div class="do-not-break espacamento-cabecalho">
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.teste_torre_central')</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rs_sem_carga')</b>:</div>
                                <div class="col-md-1">
                                    {{ $teste_torre_central['tensao_rs_semcarga']}}
                                </div>
                                <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_sem_carga')</b>:</div>
                                <div class="col-md-1">
                                    {{ $teste_torre_central['tensao_st_semcarga']}}
                                </div>
                                <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_sem_carga')</b>:</div>
                                <div class="col-md-1">
                                    {{ $teste_torre_central['tensao_rt_semcarga']}}
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
                                    {{ $teste_torre_central['tensao_rs_comcarga']}}
                                </div>
                                <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_com_carga')</b>:</div>
                                <div class="col-md-1">
                                    {{ $teste_torre_central['tensao_st_comcarga']}}
                                </div>
                                <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_com_carga')</b>:</div>
                                <div class="col-md-1">
                                    {{ $teste_torre_central['tensao_rt_comcarga']}}
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
                            <div class="text-center cor-fundo">
                                <h4>@lang('entregaTecnica.teste_bomba_cp')</h4>
                            </div>
                            @foreach ($teste_bombas as $bomba)
                                <div class='mt-3'>                                    
                                    <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_testeh_mb'] }}</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><b>@lang('entregaTecnica.pressao_reg_fechado')</b>:</div>
                                    <div class="col-md-1">
                                        {{ $bomba['pressao_reg_fechado']}}
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.pressao_reg_aberto')</b>:</div>
                                    <div class="col-md-1">
                                        {{ $bomba['pressao_reg_aberto']}}
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.pressao_centro')</b>:</div>
                                    <div class="col-md-1">
                                        {{ $bomba['pressao_centro']}}
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
                                        {{ $bomba['pressao_ult_torre']}}
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
                                                {{ $cp['tensao_rs_semcarga']}}
                                            </div>
                                            <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_sem_carga')</b>:</div>
                                            <div class="col-md-1">
                                                {{ $cp['tensao_st_semcarga']}}
                                            </div>
                                            <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_sem_carga')</b>:</div>
                                            <div class="col-md-1">
                                                {{ $cp['tensao_rt_semcarga']}}
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
                                                {{ $cp['tensao_rs_comcarga']}}
                                            </div>
                                            <div class="col-md-3"><b>@lang('entregaTecnica.tensao_st_com_carga')</b>:</div>
                                            <div class="col-md-1">
                                                {{ $cp['tensao_st_comcarga']}}
                                            </div>
                                            <div class="col-md-3"><b>@lang('entregaTecnica.tensao_rt_com_carga')</b>:</div>
                                            <div class="col-md-1">
                                                {{ $cp['tensao_rt_comcarga']}}
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
                                                {{ $cp['corrente_rs_comcarga']}}
                                            </div>
                                            <div class="col-md-3"><b>@lang('entregaTecnica.corrente_st_com_carga')</b>:</div>
                                            <div class="col-md-1">
                                                {{ $cp['corrente_st_comcarga']}}
                                            </div>
                                            <div class="col-md-3"><b>@lang('entregaTecnica.corrente_rt_com_carga')</b>:</div>
                                            <div class="col-md-1">
                                                {{ $cp['corrente_rt_comcarga']}}
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

                        @if (!empty($telemetria['aqua_tec_pro']) || !empty($telemetria['aqua_tec_lite']) || !empty($telemetria['commander_vp']) || 
                            !empty($telemetria['icon_link']) || !empty($telemetria['crop_link']) || !empty($telemetria['base_station3']) || !empty($telemetria['estacao_metereologica_valley']) || 
                            !empty($telemetria['field_commander']) )
                            {{-- TELEMETRIA --}}                      
                            <div class="do-not-break espacamento-cabecalho">    

                                <div class="text-center cor-fundo">
                                    <h4>@lang('entregaTecnica.telemetria')</h4>
                                </div>

                                <div class='row'>
                                    <div class="col-md-2 "><b>@lang('entregaTecnica.aqua_tec_pro')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')
                                    </div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.aqua_tec_lite')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')
                                    </div>

                                    <div class="col-md-2 "><b>@lang('entregaTecnica.commander_vp')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.icon_link')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')
                                    </div>
                                    
                                    <div class="col-md-2"><b>@lang('entregaTecnica.crop_link')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')                           
                                    </div>

                                    <div class="col-md-2"><b>@lang('entregaTecnica.base_station3')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')                           
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-2"><b>@lang('entregaTecnica.field_commander')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')                           
                                    </div>
                                    <div class="col-md-3"><b>@lang('entregaTecnica.estacao_metereologica_valley')</b></div>
                                    <div class="col-md-2">
                                            @lang('comum.sim')
                                    </div>
                                </div>
                            </div>    
                            <hr>                            
                        @endif

                        <div class="pagebreak"> </div>
    
                        <div class="container mt-5">
                            <div id="alert">                
                                @include('_layouts._includes._alert')    
                            </div>  
                            <input type="hidden" name="id_entrega_tecnica" value="{{ $id_entrega_tecnica }}">
                            <div class="col-md-12" style="background-color: #fff; width: 100%; color: #162E3C;; border-radius: 10px; border: 1px solid #162E3C;">
                                <div class="col-md-12 mt-4 text-center">
                                    
                                </div>           
    
                                {{-- DECLARAÇÃO DO CLIENTE --}}       
                                
                                <div class="col-md-12">
                                    <p class="font-declaracao">@lang('entregaTecnica.eu') <strong>{{ strtoupper($item['nome_proprietario']) }}</strong> @lang('entregaTecnica.declaracao_texto_cliente')</p>
                                </div>
    
                                <div class="row justify-content-center pt-3 ml-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                    </div>
                                        </div>
                                        <label style="margin: 15px 10px;" class="font-declaracao">@lang('entregaTecnica.item_manual_montagem')</label>
                                    </div>
                                </div>
    
                                <div class="row justify-content-center pt-3 ml-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            </div>
                                        </div>
                                        <label style="margin: 15px 10px;" class="font-declaracao">@lang('entregaTecnica.item_listagem_aspersores')</label>
                                    </div>
                                </div>
    
                                <div class="row justify-content-center pt-3 ml-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            </div>
                                        </div>
                                        <label  style="margin: 15px 10px;" class="font-declaracao">@lang('entregaTecnica.item_manual_bomba')</label>
                                    </div>
                                </div>
    
                                <div class="row justify-content-center pt-3 ml-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            </div>
                                        </div>
                                        <label  style="margin: 15px 10px;" class="font-declaracao">@lang('entregaTecnica.item_manual_motor_diesel')</label>
                                    </div>
                                </div>
    
                                <div class="row justify-content-center pt-3 ml-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                            </div>
                                        </div>
                                        <label  style="margin: 15px 10px;" class="font-declaracao">@lang('entregaTecnica.item_manual_chave_partida_ss')</label>
                                    </div>
                                </div>
    
                                <div class="row justify-content-center pt-3 ml-2">
                                    <div class="form-group col-md-12">
                                        <label for="observacoes" class="font-declaracao">@lang('entregaTecnica.observacoes'):</label>
                                        <textarea class="form-control" id="observacoes" rows="5"></textarea>
                                      </div>
                                </div>


                                <div class="col-md-12 ml-2 pt-3 pb-3 row">
                                    <div class="col-md-6">
                                        <label for="" class="label_declaracao font-declaracao">@lang('entregaTecnica.assinatura_cliente')</label>
                                        <input type="text" class="declaracao pl-2 pr-2 font-declaracao">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="label_declaracao font-declaracao">@lang('entregaTecnica.cpf_cliente')</label>
                                        <input type="text" class="declaracao_cpf pl-2 pr-2 font-declaracao">
                                            </div>
                                    <div class="col-md-2 font-declaracao-data">
                                        <label for="" class="label_declaracao font-declaracao">@lang('entregaTecnica.data'):</label>
                                        <input type="text" class="declaracao_data font-declaracao-data" value="{{ date('d/m/Y') }}" readonly>
                                        </div>
                                </div>

                                {{-- DECLARAÇÃO DO TÉCNICO --}}          
                                <div class="col-md-12 ml-2">
                                    <hr>
                                </div>
                                <div class="col-md-12 ml-2 pt-3">
                                    <p class="font-declaracao">@lang('entregaTecnica.eu') <strong>{{ strtoupper($item['nome_usuario']) }} </strong> @lang('entregaTecnica.declaracao_texto_tecnico_pt_1') <strong>{{ $item['numero_pedido'] }}</strong> @lang('entregaTecnica.declaracao_texto_tecnico_pt_2')</p>
                                </div>
                                
                                <div class="row justify-content-center ml-2">
                                    <div class="form-group col-md-12 font-declaracao">
                                        <label for="observacoes">@lang('entregaTecnica.observacoes'):</label>
                                        <textarea class="form-control" id="observacoes" rows="5"></textarea>
                                      </div>
                                </div>      

                                <div class="col-md-12 ml-2 pt-3 pb-3 row">
                                    <div class="col-md-6">
                                        <label for="" class="label_declaracao font-declaracao">@lang('entregaTecnica.assinatura_tecnico')</label>
                                        <input type="text" class="declaracao pl-2 pr-2 form-group">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="label_declaracao font-declaracao">@lang('entregaTecnica.cpf_tecnico')</label>
                                        <input type="text" class="declaracao_cpf pl-2 pr-2">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="label_declaracao font-declaracao">@lang('entregaTecnica.data'):</label>
                                        <input type="text" class="declaracao_data font-declaracao-data" value="{{ date('d/m/Y') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
    
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
