@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-entrega-tecnica-mobile-cadastros titulo-entrega-tecnica-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.moto_bomba') - @lang('comum.cadastrar')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('edit_technical_delivery', $id_entrega_tecnica) }}" style="color: #3c8dbc" data-toggle="tooltip"
                    data-placement="bottom" title="@lang('entregaTecnica.voltar')">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>

                <button type="button" id="botaosalvar" data-toggle="tooltip" data-placement="bottom" title="@lang('entregaTecnica.salvar')" name="botao" value="sair">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-save fa-stack-1x fa-inverse"></i>
                    </span>
                </button>

                <!-- modificação para botão salvar sair -->
                <button type="button" id="saveoutbutton" data-toggle="tooltip" data-placement="bottom" title="@lang('entregaTecnica.salvar_sair')">
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

        <div id="navtabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="motobomba-tab" data-toggle="tab" href="#motobomba" role="tab"
                        aria-controls="motobomba" aria-selected="true">@lang('entregaTecnica.principais')</a>
                </li>          
                
                @if (count($bombas['id_bomba'] > 0))                
                    @for ($i = 1; $i <= $total_bombas_cadastradas; $i++)
                        <li class="nav-item">                    
                            <a class="nav-link " id="bomba-{{$i}}-tab" data-toggle="tab" href="#bomba-{{$i}}" role="tab"
                                aria-controls="bomba_{{$i}}" aria-selected="true">@lang('afericao.bomba') {{$i}}</a>
                        </li>
                    @endfor
                @endif

            </ul>
        </div>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_pressurization') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="motobomba" role="tabpanel" aria-labelledby="motobomba-tab">
                    @csrf
                    <div id="alert">                
                        @include('_layouts._includes._alert')    
                    </div>  
                    <input type="hidden" name="id_fazenda" id="id_fazenda" value="{{$fazenda['id']}}">
                    <input type="hidden" name="id_tecnico" id="id_tecnico" value="{{$fazenda['id_consultor']}}">
                    <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
                    <input type="hidden" name="succao_auxiliar_existente" id="succao_auxiliar_existente" value="{{$motobomba['succao_auxiliar']}}">
                    <input type="hidden" name="succao_existente" id="succao_existente" value="{{$motobomba['tipo_succao']}}">
                    <!-- modificação para botão salvar sair -->
                    <input type="hidden" name="savebuttonvalue" id="savebuttonvalue" value="save">

                    <div class="col-md-12" id="cssPreloader"> 
                        <div class="form-row justify-content-start">              
                            <div class="form-group col-md-4 telo5ce">
                                <label for="quantidade_motobomba">@lang('entregaTecnica.quantidade_motobomba')</label>
                                <input type="number" id="quantidade_motobomba" class="form-control" name="quantidade_motobomba" maxlength="20" value="{{ $motobomba['quantidade_motobomba'] }}">
                            </div>          
                            <div class="form-group col-md-4 botao_criar_tab">
                                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Salvar" id="criarTab">
                                    <span class="fa-stack">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fas fa-exchange-alt fa-stack-1x fa-inverse"></i>
                                    </span>
                                </button>
                            </div>
                        </div> 
                        <div class="form-row justify-content-start mb-3">              
                            <div class="form-group col-md-2 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($motobomba['ligacao_serie'])) checked @endif name="ligacao_serie" id="customSwitch" disabled>
                                    <label class="custom-control-label" for="customSwitch" style="font-size: 1.2rem">@lang('entregaTecnica.ligacao_serie')</label>
                                </div>
                            </div>
                            <div class="form-group col-md-2 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($motobomba['ligacao_paralelo'])) checked @endif  name="ligacao_paralela" id="customSwitch1" disabled>
                                    <label class="custom-control-label" for="customSwitch1" style="font-size: 1.2rem">@lang('entregaTecnica.ligacao_paralela')</label>
                                </div>
                            </div>    
                        </div>
                        
                        <div class="form-row justify-content-start card_img">
                            
                            <div class="form-group col-md-2 mr-5">
                                <div class="card card_afogada" style="width: 250px;">
                                    <div class="card-body">
                                        <input type="radio" name="img_succao" id="afogada" value="afogada" @if(!empty($motobomba['tipo_succao'] == 'afogada') ) checked @endif>
                                        <label for="afogada" style="padding: 10px">@lang('entregaTecnica.afogada')</label>
                                        <img src="{{ asset('img/img_succao/afogada.png') }}" id="afogada" class="img-fluid img-succao abrirModal">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2 mr-5">
                                <div class="card card_direta" style="width: 250px;">
                                    <div class="card-body">
                                        <input type="radio" name="img_succao" id="direta" value="direta" @if(!empty($motobomba['tipo_succao'] == 'direta') ) checked @endif>
                                        <label for="direta" style="padding: 10px">@lang('entregaTecnica.direta')</label>
                                        <img src="{{ asset('img/img_succao/direta.png') }}" id="direta" class="img-fluid img-succao abrirModal">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2 mr-5">
                                <div class="card card_pocos" style="width: 250px;">
                                    <div class="card-body">
                                        <input type="radio" name="img_succao" id="poços" value="pocos" @if(!empty($motobomba['tipo_succao'] == 'pocos')) checked @endif>
                                        <label for="poços" style="padding: 10px">@lang('entregaTecnica.pocos')</label>
                                        <img src="{{ asset('img/img_succao/poços.png') }}" id="poços" class="img-fluid img-succao abrirModal">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-2 mr-5">
                                <div class="card card_balsa" style="width: 250px;">
                                    <div class="card-body">
                                        <input type="radio" name="img_succao" id="balsa" value="balsa" @if(!empty($motobomba['tipo_succao'] == 'balsa')) checked @endif>
                                        <label for="balsa" style="padding: 10px">@lang('entregaTecnica.balsa')</label>
                                        <img src="{{ asset('img/img_succao/balsa.png') }}" id="balsa_img" class="img-fluid img-succao abrirModal">
                                        <div class="form-group telo5ce mt-3" id="div_bomba_auxiliar_balsa" style="display: none">
                                            <label for="quantidade_motobomba_auxiliar">@lang('entregaTecnica.quantidade_motobomba_auxiliar')</label>
                                            <input type="number" id="quantidade_motobomba_auxiliar_balsa" class="form-control" name="quantidade_motobomba_auxiliar" maxlength="20" value="{{ $motobomba['quantidade_motobomba_auxiliar'] }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-2 mr-5">
                                <div class="card card_submersa" style="width: 250px;">
                                    <div class="card-body">
                                        <input type="radio" name="img_succao" id="submersa" value="submersa" @if(!empty($motobomba['tipo_succao'] == 'submersa')) checked @endif>
                                        <label for="submersa" style="padding: 10px">@lang('entregaTecnica.submersa')</label>
                                        <img src="{{ asset('img/img_succao/submersa.png') }}" id="submersa_img" class="img-fluid img-succao abrirModal">
                                        <div class="form-group telo5ce mt-3" id="div_bomba_auxiliar_submersa" style="display: none">
                                            <label for="quantidade_motobomba_auxiliar">@lang('entregaTecnica.quantidade_motobomba_auxiliar')</label>
                                            <input type="number" id="quantidade_motobomba_auxiliar_submersa" class="form-control" name="quantidade_motobomba_auxiliar" maxlength="20" value="{{ $motobomba['quantidade_motobomba_auxiliar'] }}" disabled>
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

                @if (count($bombas['id_bomba'] > 0))
                    @foreach ($bombas as $bomba)
                        <div class="tab-pane fade formcdc" id="bomba-{{$bomba['id_bomba']}}" role="tabpanel" aria-labelledby="bomba_{{$bomba['id_bomba']}}">
                        <input type="hidden" name="id_bomba[]" id="id_bomba_{{$bomba['id_bomba']}}" value="{{$bomba['id_bomba']}}">
                        <input type="hidden" name="tipo_motobomba[]" id="tipo_motobomba_{{$bomba['tipo_motobomba']}}" value="{{$bomba['tipo_motobomba']}}">
                            <div class="col-md-12" id="cssPreloader">
                                <div class="container-fluid">        
                                    <div class="form-row justify-content-start">
                                        <div class="form-group col-md-4 telo5ce">
                                            <label for="marca">@lang('entregaTecnica.marca')</label>
                                            <select class="form-control" name="marca[]" id="marca_{{$bomba['id_bomba']}}" onchange="carregaBombaModelo($(this).val(), {{ $bomba['id_bomba'] }})">
                                                <option value=""></option>
                                                @foreach ($bomba_marca as $marca)
                                                    <option value="{{ $marca['bomba_marca'] }}" {{ (($marca['bomba_marca'] == $bomba['marca']) ? 'selected' : '') }}>{{ $marca['bomba_marca'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-4 telo5ce">
                                            <label for="modelo">@lang('entregaTecnica.modelo')</label>
                                            <select class="form-control" name="modelo[]" id="modelo_{{$bomba['id_bomba']}}">
                                                <option value=""></option>
                                                @foreach ($bomba_modelo as $modelo)
                                                    @if ($modelo['bomba_marca'] == $bomba['marca'])
                                                        <option value="{{ $modelo['modelo'] }}" {{$modelo['modelo'] == $bomba['modelo'] ? 'selected' : '' }}>{{ $modelo['modelo'] }}</option>                                                        
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 telo5ce">
                                            <div class="form-group">
                                                <label for="numero_estagio">@lang('entregaTecnica.numero_estagio')</label>
                                                <input type="number" class="form-control" name="numero_estagio[]" id="numero_estagio_{{$bomba['id_bomba']}}" value="{{$bomba['numero_estagio']}}">
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-row justify-content-start">
                                        <div class="form-group col-md-4 telo5ce">
                                            <label for="rotor">@lang('entregaTecnica.rotor') (mm)</label>
                                            <input type="number" class="form-control" name="rotor[]" id="rotor_{{$bomba['id_bomba']}}" value="{{$bomba['rotor']}}">
                                        </div>
                                        <div class="form-group col-md-4 telo5ce">
                                            <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                            <input type="text" class="form-control" name="numero_serie[]" id="numero_serie_0{{ $bomba['id_bomba'] }}"  value="{{$bomba['numero_serie']}}">
                                        </div>
                                        <div class="form-group col-md-4 telo5ce">
                                            <label for="fornecedor">@lang('entregaTecnica.fornecedor')</label>
                                            <select class="form-control" name="fornecedor[]" id="fornecedor_{{$bomba['id_bomba']}}">
                                                <option value=""></option>
                                                @foreach ($fornecedores as $fornecedor)
                                                    <option value="{{ $fornecedor['fornecedor'] }}" {{ (($fornecedor['fornecedor'] == $bomba['fornecedor']) ? 'selected' : '') }}>{{ __('listas.' . $fornecedor['fornecedor'] ) }}</option>                                                        
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="form-row justify-content-start">
                                        <div class="form-group col-md-8 telo5ce">
                                            <label for="opcionais">@lang('entregaTecnica.outros')</label>
                                            <input type="text" class="form-control" name="opcionais[]" id="opcionais_{{$bomba['id_bomba']}}" value="{{$bomba['opcionais']}}">
                                        </div>
                                    </div>

                                    <div class="accordion card_cadastro_et" id="accordionMotor_{{ $bomba['id_bomba'] }}">
                                        @foreach ($motores as $motor)
                                            @if ($motor['id_bomba'] == $bomba['id_bomba'])
                                            
                                                <input type="hidden" name="id_motor_{{ $bomba['id_bomba'] }}[]" id="id_motor_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['id_motor']}}">
                                                <div class="card" data-motor="0{{$motor['id_motor']}}">
                                                    <div class="card-header" id="heading_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}">
                                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" aria-expanded="true" aria-controls="collapse_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}">
                                                            <span class="span_collapse">Motor 0{{$motor['id_motor']}}</span>
                                                            <i class="fa fa-chevron-down pull-right"></i>
                                                        </button>
                                                    </div>
                    
                                                    <div id="collapse_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" class="collapse show" aria-labelledby="heading_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" data-parent="#accordionMotor_{{ $bomba['id_bomba'] }}">
                                                        <div class="card-body">
                                                            <div class="form-row justify-content-start">
                                                                <div class="form-group col-md-4 telo5ce">
                                                                    <label for="tipo_motor">@lang('entregaTecnica.tipo_motor')</label>
                                                                    <select class="form-control motor_existente" name="tipo_motor_{{ $bomba['id_bomba'] }}[]" id="tipo_motor_0{{ $bomba['id_bomba'] }}_{{ str_pad($motor['id_bomba'],2,'0', STR_PAD_LEFT) }}" onchange="alterarMotor($(this).val(), {{ $bomba['id_bomba']}}, {{$motor['id_motor']}})">
                                                                        <option value=""></option>
                                                                        @foreach ($tipo_motor as $item)
                                                                            <option value="{{ $item['tipo'] }}" {{ $item['tipo'] == $motor['tipo_motor'] ? 'selected' : '' }}>{{ __('listas.' . $item['tipo'] ) }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>       
                                                                
                                                                <div id="diesel_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" style=" <?= ($motor['tipo_motor'] == 'diesel') ? 'display: flex;' : 'display: none;' ?> " class="form-group col-md-12 telo5ce row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="marca_motor">@lang('entregaTecnica.marca')</label>
                                                                        <select class="form-control" name="marca_motor_{{ $bomba['id_bomba'] }}[]" id="marca_motor_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" >
                                                                            @foreach ($motor_marca as $item)
                                                                                @if ($item['tipo'] == $motor['tipo_motor'])
                                                                                    <option value="{{ $item['marca'] }}" {{ $item['marca'] == $motor['marca'] ? 'selected' : '' }}>{{ $item['marca'] }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">
                                                                        <label for="modelo_motor">@lang('entregaTecnica.modelo')</label>
                                                                        <input type="text" class="form-control" name="modelo_motor_{{ $bomba['id_bomba'] }}[]" id="modelo_motor_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['modelo']}}">
                                                                    </div>  
                                                                </div>
                                                                
                                                                <div id="eletrico_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" class="form-group col-md-12 telo5ce row" <?= ($motor['tipo_motor'] == 'eletrico') ? 'display: block;' : 'display: none;' ?> >                                                        
                                                                    <div class="form-group col-md-4" style="padding-right: 0">
                                                                        <label for="marca_motor">@lang('entregaTecnica.marca')</label>
                                                                        <input type="text" class="form-control" name="marca_motor_eletrico_{{ $bomba['id_bomba'] }}[]" id="marca_motor_eletrico_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['marca']}}"  >
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">
                                                                        <label for="modelo_motor">@lang('entregaTecnica.modelo')</label>
                                                                        <input type="text" class="form-control" name="modelo_motor_eletrico_{{ $bomba['id_bomba'] }}[]" id="modelo_motor_eletrico_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['modelo']}}"  >
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="form-row justify-content-start" id="diesel_eletrico_0{{$bomba['id_bomba']}}_0{{$motor['id_motor']}}">
                                                                <div class="form-group col-md-4 telo5ce">
                                                                    <label for="potencia">@lang('entregaTecnica.potencia') (cv)</label>
                                                                    <input type="number" class="form-control" name="potencia_{{ $bomba['id_bomba'] }}[]" id="potencia_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}"  value="{{$motor['potencia']}}" >
                                                                </div>
                                                                <div class="form-group col-md-4 telo5ce">
                                                                    <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                                                    <input type="number" class="form-control" name="numero_serie_{{ $bomba['id_bomba'] }}[]" id="numero_serie_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}"  value="{{$motor['numero_serie']}}">
                                                                </div>
                                                                <div class="form-group col-md-4 telo5ce">
                                                                    <label for="rotacao">@lang('entregaTecnica.rotacao')</label>
                                                                    <input type="number" class="form-control" name="rotacao_{{ $bomba['id_bomba'] }}[]" id="rotacao_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}"  value="{{$motor['rotacao']}}">  
                                                                </div>
                                                            </div>   
                                                            
                                                            <div id="campos_motor_eletrico_0{{ $bomba['id_bomba']}}_0{{$motor['id_motor']}}" style=" <?= ($motor['tipo_motor'] == 'eletrico') ? 'display: block;' : 'display: none;' ?> ">
                                                                <div class="form-row justify-content-start">
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="tensao">@lang('entregaTecnica.tensao') (v)</label>
                                                                        <input type="number" class="form-control" name="tensao_{{ $bomba['id_bomba'] }}[]" id="tensao_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['tensao']}}" >
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="lp_ln">@lang('entregaTecnica.lp_ln')</label>
                                                                        <input type="number" class="form-control" name="lp_ln_{{ $bomba['id_bomba'] }}[]" id="lp_ln_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['lp_ln']}}" >
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="classe_isolamento">@lang('entregaTecnica.classe_isolamento')</label>
                                                                        <input type="text" class="form-control" name="classe_isolamento_{{ $bomba['id_bomba'] }}[]" id="classe_isolamento_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['classe_isolamento']}}" >
                                                                    </div>
                                                                </div>
                                
                                                                <div class="form-row justify-content-start">
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="corrente_nominal">@lang('entregaTecnica.corrente_nominal') (v)</label>
                                                                        <input type="number" class="form-control" name="corrente_nominal_{{ $bomba['id_bomba'] }}[]" id="corrente_nominal_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['corrente_nominal']}}" >
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="fs">@lang('entregaTecnica.fs')</label>
                                                                        <input type="number" class="form-control" name="fs_{{ $bomba['id_bomba'] }}[]" id="fs_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['fs']}}" >
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="ip">@lang('entregaTecnica.ip')</label>
                                                                        <input type="number" class="form-control" name="ip_{{ $bomba['id_bomba'] }}[]" id="ip_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['ip']}}" >
                                                                    </div>
                                                                </div>
                                
                                                                <div class="form-row justify-content-start">
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="rendimento">@lang('entregaTecnica.rendimento')</label>
                                                                        <input type="number" class="form-control" name="rendimento_{{ $bomba['id_bomba'] }}[]" id="rendimento_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['rendimento']}}" >
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="cos">@lang('entregaTecnica.cos')</label>
                                                                        <input type="number" class="form-control" name="cos_{{ $bomba['id_bomba'] }}[]" id="cos_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}" value="{{$motor['cos']}}" >
                                                                    </div>
                                                                </div> 

                                                                                                
                                                                <div class="form-row justify-content-start">
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <h4>@lang('entregaTecnica.chave_partida')</h4>
                                                                    </div>
                                                                </div>       
                                                                                                                        
                                                                <div class="form-row justify-content-start">
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <input type="hidden" name="id_chave_partida_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" id="id_chave_partida_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" value="1">
                                                                        <label for="marca_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}">@lang('entregaTecnica.marca')</label>
                                                                        <select name="marca_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="marca_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" class="form-control marca"  onchange="carregaAcionamento(this, $(this).val(), {{ $bomba['id_bomba']}}, {{$motor['id_motor']}})">
                                                                            <option value=""></option>
                                                                            @foreach ($chavePartida as $chave)
                                                                                <option value="{{ $chave['tipo'] }}" {{ ($chave['tipo'] == $cp['marca']) ? 'selected' : ''}}>{{ $chave['tipo'] }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="acionamento">@lang('entregaTecnica.acionamento')</label>
                                                                        <select name="acionamento_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="acionamento_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" class="form-control">
                                                                            <option value=""></option>
                                                                            @foreach ($chavePartidaAcionamento as $acionamento)
                                                                                @if ($acionamento['tipo'] == $cp['marca'])
                                                                                    <option value="{{ $acionamento['modelo'] }}" {{ ($acionamento['modelo'] == $cp['acionamento']) ? 'selected' : ''}}>{{ __('listas.' . $acionamento['modelo'] ) }}</option>
                                                                                @endif
                                                                            @endforeach                                                            
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="regulagem_reles">@lang('entregaTecnica.regulagem_reles') (A)</label>
                                                                        <input type="number" class="form-control" name="regulagem_reles_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="regulagem_reles_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" value="{{ $cp['regulagem_reles'] }}">
                                                                    </div>
                                                                </div>
                                
                                                                <div class="form-row justify-content-start">
                                                                    <div class="form-group col-md-4 telo5ce">
                                                                        <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                                                        <input type="text" class="form-control" name="numero_serie_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="numero_serie__0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" value="{{ $cp['numero_serie'] }}">
                                                                    </div>
                                                                </div>

                                                                {{-- CHAVE DE PARTIDA --}}
                                                                @foreach ($chave_partida as $cp)     
                                
                                                                    <div class="form-row justify-content-start">
                                                                        <div class="form-group col-md-4 telo5ce">
                                                                            <h4>@lang('entregaTecnica.chave_partida')</h4>
                                                                        </div>
                                                                    </div>       

                                                                    <div class="form-row justify-content-start">
                                                                        <div class="form-group col-md-4 telo5ce">
                                                                            <input type="hidden" name="id_chave_partida_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" id="id_chave_partida_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" value="1">
                                                                            <label for="marca_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}">@lang('entregaTecnica.marca')</label>
                                                                            <select name="marca_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="marca_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" class="form-control marca"  onchange="carregaAcionamento(this, $(this).val(), {{ $bomba['id_bomba']}}, {{$motor['id_motor']}})">
                                                                                <option value=""></option>
                                                                                @foreach ($chavePartida as $chave)
                                                                                    <option value="{{ $chave['tipo'] }}" {{ ($chave['tipo'] == $cp['marca']) ? 'selected' : ''}}>{{ $chave['tipo'] }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4 telo5ce">
                                                                            <label for="acionamento">@lang('entregaTecnica.acionamento')</label>
                                                                            <select name="acionamento_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="acionamento_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" class="form-control">
                                                                                <option value=""></option>
                                                                                @foreach ($chavePartidaAcionamento as $acionamento)
                                                                                    @if ($acionamento['tipo'] == $cp['marca'])
                                                                                        <option value="{{ $acionamento['modelo'] }}" {{ ($acionamento['modelo'] == $cp['acionamento']) ? 'selected' : ''}}>{{ __('listas.' . $acionamento['modelo'] ) }}</option>
                                                                                    @endif
                                                                                @endforeach                                                            
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-4 telo5ce">
                                                                            <label for="regulagem_reles">@lang('entregaTecnica.regulagem_reles') (A)</label>
                                                                            <input type="number" class="form-control" name="regulagem_reles_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="regulagem_reles_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" value="{{ $cp['regulagem_reles'] }}">
                                                                        </div>
                                                                    </div>
                                    
                                                                    <div class="form-row justify-content-start">
                                                                        <div class="form-group col-md-4 telo5ce">
                                                                            <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                                                                            <input type="text" class="form-control" name="numero_serie_cp_0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1[]" id="numero_serie__0{{ $bomba['id_bomba'] }}_0{{$motor['id_motor']}}_1" value="{{ $cp['numero_serie'] }}">
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>        
                                                </div>
                                            @endif                                    
                                        @endforeach
                                    </div>

                                    <div class="form-row justify-content-start mt-3">
                                        <div class="col-md-3">
                                            <button type="button" id="adicionarMotor" onclick="AdicionarMotor({{ $bomba['id_bomba'] }});" class="voltar">@lang('entregaTecnica.adicionar_motor')</button>
                                        </div>
                                    </div>      
                                </div>
                            </div>
                        </div>
                    @endforeach                        
                @endif
            </div>
        </form>


@endsection

@section('scripts')
    <script>

        $(document).ready(function () {

            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            /* modificação para botão salvar sair */
            $('#saveoutbutton').on('click', function() {  
                $("#savebuttonvalue").val("saveout");
                $('#formdados').submit();
            });      

            $('#adicionarMotor_').on('click', function() {
                AdicionarMotor();
            }); 

            $(".marca").change(function () {
                //Pegando o novo valor selecionado no combo
                var tipo = $(this).val();
            });

            $("#quantidade_motobomba").focusout(function(){
                var qtd_motobomba = $("#quantidade_motobomba").val();
                
                if (qtd_motobomba > 1) {
                    $("#customSwitch").removeAttr("disabled");
                    $("#customSwitch1").removeAttr("disabled");
                } else {                    
                    $('#customSwitch').prop('disabled', true);
                    $('#customSwitch1').prop('disabled', true);
                    $("#customSwitch").removeAttr('checked', false);
                    $("#customSwitch1").removeAttr('checked', false);
                }
            });

            $(".abrirModal").click(function() {
                var url = $(this).attr("src");
                $("#modal img").attr("src", url);
                $("#modal").modal("show");
            });
            
            $("#submersa").on('click', function() {
                $('#div_bomba_auxiliar_submersa').show();
                $('#div_bomba_auxiliar_balsa').hide();
                $('#quantidade_motobomba_auxiliar_balsa').val("");
                $('#quantidade_motobomba_auxiliar_submersa').prop('disabled', false);
                $('#quantidade_motobomba_auxiliar_balsa').prop('disabled', 'disabled');
                $('.card_submersa').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            });
            
            $("#balsa").on('click', function() {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').show();
                $('#quantidade_motobomba_auxiliar_submersa').val("");
                $('#quantidade_motobomba_auxiliar_submersa').prop('disabled', 'disabled');
                $('#quantidade_motobomba_auxiliar_balsa').prop('disabled', false);
                $('.card_balsa').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            });
            
            $("#direta").on('click', function() {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').hide();
                $('.card_direta').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            });
            
            $("#poços").on('click', function() {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').hide();
                $('.card_pocos').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            });
            
            $("#afogada").on('click', function() {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').hide();
                $('.card_afogada').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
            });

            tipo_succao = $('#succao_existente').val();
            if (tipo_succao == 'submersa') {
                $('#div_bomba_auxiliar_submersa').show();
                $('#div_bomba_auxiliar_balsa').hide();
                $('#quantidade_motobomba_auxiliar_submersa').prop('disabled', false);
                $('#quantidade_motobomba_auxiliar_balsa').prop('disabled', 'disabled');
                $('.card_submersa').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            } else if (tipo_succao == 'balsa') {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').show();
                $('#quantidade_motobomba_auxiliar_submersa').prop('disabled', 'disabled');
                $('#quantidade_motobomba_auxiliar_balsa').prop('disabled', false);
                $('.card_balsa').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            } else if (tipo_succao == 'direta') {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').hide();
                $('.card_direta').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            } else if (tipo_succao == 'poços') {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').hide();
                $('.card_pocos').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
                $('.card_afogada').css('box-shadow', 'none');
            } else if (tipo_succao == 'afogada') {
                $('#div_bomba_auxiliar_submersa').hide();
                $('#div_bomba_auxiliar_balsa').hide();
                $('.card_afogada').css('box-shadow', '0px -1px 10px 1px #053a5856');
                $('.card_balsa').css('box-shadow', 'none');
                $('.card_submersa').css('box-shadow', 'none');
                $('.card_pocos').css('box-shadow', 'none');
                $('.card_direta').css('box-shadow', 'none');
            }

            var quantidade = $("#quantidade_motobomba").val();
            
            if (quantidade > 1) {
                $("#customSwitch").removeAttr("disabled");
                $("#customSwitch1").removeAttr("disabled");
            } else {                    
                $('#customSwitch').prop('disabled', true);
                $('#customSwitch1').prop('disabled', true);
                $("#customSwitch").removeAttr('checked', false);
                $("#customSwitch1").removeAttr('checked', false);
            }

        }); 

        $('#criarTab').on('click', function() {            
            var quantidade_padrao = $("#quantidade_motobomba").val();
            var quantidade_submersa = $("#quantidade_motobomba_auxiliar_submersa").val();
            var quantidade_balsa = $("#quantidade_motobomba_auxiliar_balsa").val();
            
            if (quantidade_padrao > 0 && quantidade_submersa < 1 && quantidade_balsa < 1) {
                var quantidade = parseInt(quantidade_padrao);
            } else {
                    if (quantidade_balsa > 0) {
                        var quantidade = parseInt(quantidade_padrao) + parseInt(quantidade_balsa);
                    } else if (quantidade_submersa > 0) {
                        var quantidade = parseInt(quantidade_padrao) + parseInt(quantidade_submersa);
                    }
            }
            
            var CabTab = "";
            var HTML = "";
            var i = 0;
            var qtTab = $('#myTab > li').length;
            var qtBombaAtual = 0;
            var motor = 1;
            var tipo_motobomba = '';

            qtBombaAtual = qtTab - 1;
            if (quantidade > qtBombaAtual) {
                for (x = 0; x <= qtBombaAtual; x++) {
                    if (x <= quantidade_padrao) {
                        $('#tipo_motobomba_0' + x).val('padrao');
                    } else {
                        if ((quantidade_submersa > 0 && quantidade_submersa != null) || 
                            (quantidade_balsa > 0 && quantidade_balsa != null)) {
                            $('#tipo_motobomba_0' + x).val('auxiliar');
                        }
                    }
                }
                for (i = (qtBombaAtual + 1); i <= quantidade; i++) {
                    if (i <= quantidade_padrao) {
                        tipo_motobomba = 'padrao';
                    } else {
                        if ((quantidade_submersa > 0 && quantidade_submersa != null) || 
                            (quantidade_balsa > 0 && quantidade_balsa != null)) {
                            tipo_motobomba = 'auxiliar';
                        }
                    }


                    var id_cp1 = '_0'+ i + '_01_1';
                    var id_cp2 = '_0'+ i + '_01_2';

                    CabTab += "<li class='nav-item' id='liBombas-"+ i +"'>";
                    CabTab += '     <a class="nav-link" id="bombas-' + i +'-tab " data-toggle="tab" href="#bomba-' + i + '" role="tab" aria-controls="bomba_' + i + '" aria-selected="true" > @lang("afericao.bomba") ' + i + ' </a>';
                    CabTab += '</li>';

                    HTML += '        <div class="tab-pane fade" id="bomba-' + i + '" role="tabpanel" aria-labelledby="bomba_' + i + '" >';


                    HTML += '            <input type="hidden" name="tipo_motobomba[]" id="tipo_motobomba_0'+i+'" value="'+ tipo_motobomba +'">';
                    HTML += '            <input type="hidden" name="id_bomba[]" id="id_bomba_'+ i +'" value="'+ i +'">';
                    HTML += '            <div class="col-md-12" id="cssPreloader">';
                    HTML += '                <div class="container-fluid">';
                    HTML += '                    <div class="form-row justify-content-start">';
                    HTML += '                        <div class="form-group col-md-4 telo5ce">';
                    HTML += '                            <label for="marca">@lang("entregaTecnica.marca")</label>';
                    HTML += '                            <select class="form-control" name="marca[]" id="marca_'+ i +'" onchange="carregaBombaModelo($(this).val(), ' + i + ')">';
                    HTML += '                                <option value=""></option>';
                    HTML += '                                @foreach ($bomba_marca as $marca)';
                    HTML += '                                    <option value="{{ $marca["bomba_marca"] }}">{{ $marca["bomba_marca"] }}</option>';
                    HTML += '                                @endforeach';
                    HTML += '                            </select>';
                    HTML += '                        </div>';

                    HTML += '                        <div class="form-group col-md-4 telo5ce">';
                    HTML += '                            <div class="form-group">';
                    HTML += '                                <label for="modelo">@lang("entregaTecnica.modelo")</label>';
                    HTML += '                                <select class="form-control" name="modelo[]" id="modelo_'+ i +'">';
                    HTML += '                                    <option value=""></option>';
                    HTML += '                                    @foreach ($bomba_modelo as $modelo)';
                    HTML += '                                        @if ($modelo["bomba_marca"] == $bomba["marca"])';
                    HTML += '                                            <option value="{{ $modelo["modelo"] }}">{{ $modelo["modelo"] }}</option>';
                    HTML += '                                        @endif';
                    HTML += '                                    @endforeach';
                    HTML += '                                </select>';
                    HTML += '                            </div>';
                    HTML += '                        </div>';
                    
                    HTML += '                        <div class="form-group col-md-4 telo5ce">';
                    HTML += '                            <div class="form-group">';
                    HTML += '                                <label for="numero_estagio">@lang("entregaTecnica.numero_estagio")</label>';
                    HTML += '                                <input type="number" class="form-control" name="numero_estagio[]" id="numero_estagio_'+ i +'">';
                    HTML += '                            </div>';
                    HTML += '                        </div>';                        
                    HTML += '                    </div>';
                    
                    HTML += '                    <div class="form-row justify-content-start">';
                    HTML += '                        <div class="form-group col-md-4 telo5ce">';
                    HTML += '                            <label for="rotor">@lang("entregaTecnica.rotor") (mm)</label>';
                    HTML += '                            <input type="number" class="form-control" name="rotor[]" id="rotor_'+ i +'">';
                    HTML += '                        </div>';

                    HTML += '                       <div class="form-group col-md-4 telo5ce">';
                    HTML += '                           <label for="numero_serie">@lang("entregaTecnica.numero_serie")</label>';
                    HTML += '                           <input type="text" class="form-control" name="numero_serie[]" id="numero_serie_'+ i +'">';
                    HTML += '                       </div>';
                    
                    HTML += '                       <div class="form-group col-md-4 telo5ce">';
                    HTML += '                           <label for="fornecedor">@lang("entregaTecnica.fornecedor")</label>';
                    HTML += '                           <select class="form-control" name="fornecedor[]" id="fornecedor_'+ i +'">';
                    HTML += '                               <option value=""></option>';
                    HTML += '                               @foreach ($fornecedores as $fornecedor)';
                    HTML += '                                   <option value="{{ $fornecedor["fornecedor"] }}" {{ (($fornecedor["fornecedor"] == $bomba["fornecedor"]) ? "selected" : '') }}>{{ __("listas." . $fornecedor["fornecedor"] ) }}</option>';
                    HTML += '                               @endforeach';
                    HTML += '                           </select>';
                    HTML += '                       </div>';
                    HTML += '                    </div>';
                    
                    HTML += '                    <div class="form-row justify-content-start">';
                    HTML += '                       <div class="form-group col-md-4 telo5ce">';
                    HTML += '                            <label for="opcionais">@lang("entregaTecnica.outros")</label>';
                    HTML += '                            <input type="text" class="form-control" name="opcionais[]" id="opcionais_'+ i +'" value="{{$bomba["opcionais"]}}">';
                    HTML += '                       </div>';
                    HTML += '                    </div>';
                    HTML += '                </div>';

                        // MOTOR
                        HTML += '                    <div class="accordion card_cadastro_et" id="accordionMotor_'+ i +'">';
                        HTML += '                               <input type="hidden" name="id_motor_' + i + '[]" id="id_motor_0'+ i +'_01" value="1">';
                        HTML += '                                <div class="card" data-motor="01">';
                        HTML += '                                    <div class="card-header" id="heading_0'+ i +'_01">';
                        HTML += '                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_0'+ i +'_01" aria-expanded="true" aria-controls="collapse_0'+ i +'_01">';
                        HTML += '                                            <span class="span_collapse">Motor '+motor+' </span>';
                        HTML += '                                               <i class="fa fa-chevron-down pull-right"></i>';
                        HTML += '                                        </button>';
                        HTML += '                                    </div>';
                        HTML += '                                    <div id="collapse_0'+ i +'_01" class="collapse show" aria-labelledby="heading_0'+ i +'_01" data-parent="#accordionMotor_'+ i +'">';
                        HTML += '                                        <div class="card-body">';


                        HTML += '                                            <div class="form-row justify-content-start">';
                        HTML += '                                                <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                    <label for="tipo_motor">@lang("entregaTecnica.tipo_motor")</label>';
                        HTML += '                                                    <select class="form-control" name="tipo_motor_'+ i +'[]" id="tipo_motor_0'+ i +'_01" onchange="alterarMotor($(this).val(), '+ i +', '+ motor +')">';
                        HTML += '                                                        <option value=""></option>';
                        HTML += '                                                        @foreach ($tipo_motor as $motor)';
                        HTML += '                                                            <option value="{{ $motor["tipo"] }}">{{ __("listas." . $motor["tipo"] ) }}</option>';
                        HTML += '                                                        @endforeach';
                        HTML += '                                                    </select>';
                        HTML += '                                                </div>';                                                
                        HTML += '                                                <div id="diesel_0'+ i +'_01" style="display: none" class="form-group col-md-12 telo5ce row">';
                        HTML += '                                                    <div class="form-group col-md-4">';
                        HTML += '                                                        <label for="marca_motor">@lang("entregaTecnica.marca")</label>';
                        HTML += '                                                        <select class="form-control" name="marca_motor_'+ i +'[]" id="marca_motor_0'+ i +'_01">';
                        HTML += '                                                            <option value=""></option>';
                        HTML += '                                                        </select>';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">';
                        HTML += '                                                        <label for="modelo_motor">@lang("entregaTecnica.modelo")</label>';
                        HTML += '                                                        <input type="text" class="form-control" name="modelo_motor_'+ i +'[]" id="modelo_motor_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                </div>';                                                                            
                        HTML += '                                                <div id="eletrico_0'+ i +'_01" class="form-group col-md-12 telo5ce row">';
                        HTML += '                                                    <div class="form-group col-md-4" style="padding-right: 0">';
                        HTML += '                                                        <label for="marca_motor">@lang("entregaTecnica.marca")</label>';
                        HTML += '                                                        <input type="text" class="form-control" name="marca_motor_eletrico_'+ i +'[]" id="marca_motor_eletrico_0'+ i +'_01" disabled>';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">';
                        HTML += '                                                        <label for="modelo_motor">@lang("entregaTecnica.modelo")</label>';
                        HTML += '                                                        <input type="text" class="form-control" name="modelo_motor_eletrico_'+ i +'[]" id="modelo_motor_eletrico_0'+ i +'_01" disabled>';
                        HTML += '                                                    </div>';
                        HTML += '                                                </div>';
                        HTML += '                                            </div>';

                
                        HTML += '                                            <div class="form-row justify-content-start" id="diesel_eletrico_0'+ i +'_01">';
                        HTML += '                                                <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                    <label for="potencia">@lang("entregaTecnica.potencia") (cv)</label>';
                        HTML += '                                                    <input type="number" class="form-control" name="potencia_'+ i +'[]" id="potencia_0'+ i +'_01" disabled>';
                        HTML += '                                                </div>';
                        HTML += '                                                <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                    <label for="numero_serie">@lang("entregaTecnica.numero_serie")</label>';
                        HTML += '                                                    <input type="number" class="form-control" name="numero_serie_'+ i +'[]" id="numero_serie_0'+ i +'_01" disabled>';
                        HTML += '                                                </div>';
                        HTML += '                                                <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                    <label for="rotacao">@lang("entregaTecnica.rotacao")</label>';
                        HTML += '                                                    <input type="number" class="form-control" name="rotacao_'+ i +'[]" id="rotacao_0'+ i +'_01" disabled>';  
                        HTML += '                                                </div>';
                        HTML += '                                            </div>';  
                        
                        HTML += '                                            <div id="campos_motor_eletrico_0'+ i +'_01" style="display: none;">';
                        HTML += '                                                <div class="form-row justify-content-start">';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="tensao">@lang("entregaTecnica.tensao") (v)</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="tensao_'+ i +'[]" id="tensao_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="lp_ln">@lang("entregaTecnica.lp_ln")</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="lp_ln_'+ i +'[]" id="lp_ln_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="classe_isolamento">@lang("entregaTecnica.classe_isolamento")</label>';
                        HTML += '                                                        <input type="text" class="form-control" name="classe_isolamento_'+ i +'[]" id="classe_isolamento_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                </div>';
                                        
                        HTML += '                                                <div class="form-row justify-content-start">';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="corrente_nominal">@lang("entregaTecnica.corrente_nominal") (v)</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="corrente_nominal_'+ i +'[]" id="corrente_nominal_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="fs">@lang("entregaTecnica.fs")</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="fs_'+ i +'[]" id="fs_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="ip">@lang("entregaTecnica.ip")</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="ip_'+ i +'[]" id="ip_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                </div>';
                                        
                        HTML += '                                                <div class="form-row justify-content-start">';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="rendimento">@lang("entregaTecnica.rendimento")</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="rendimento_'+ i +'[]" id="rendimento_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                        <label for="cos">@lang("entregaTecnica.cos")</label>';
                        HTML += '                                                        <input type="number" class="form-control" name="cos_'+ i +'[]" id="cos_0'+ i +'_01">';
                        HTML += '                                                    </div>';
                        HTML += '                                                </div>';

                        HTML += '                                               <div class="form-row justify-content-start">';
                        HTML += '                                                   <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                       <h4>@lang("entregaTecnica.chave_partida")</h4>';
                        HTML += '                                                   </div>';
                        HTML += '                                               </div>'; 

                        HTML += '                                               <div class="form-row justify-content-start">';
                        HTML += '                                                    <div class="form-group col-md-4 telo5ce">';
                            
                        HTML += '                                                          <input type="hidden" name="id_chave_partida' + id_cp1 + '" id="id_chave_partida' + id_cp1 + '" value="1"';
                        HTML += '                                                          <label for="marca'+ id_cp1 +'">@lang("entregaTecnica.marca")</label>';
                        HTML += '                                                          <select name="marca'+ id_cp1 +'" id="marca'+ id_cp1 +'" class="form-control marca" onchange="carregaAcionamento(this, $(this).val(), '+ i +', '+ motor +')">';
                        HTML += '                                                              <option value=""></option>';
                        HTML += '                                                              @foreach ($chavePartida as $chave)';
                        HTML += '                                                                  <option value="{{ $chave["tipo"] }}" {{ ($chave["tipo"] == $item["marca"]) ? "selected" : ""}}>{{ $chave["tipo"] }}</option>';
                        HTML += '                                                            @endforeach';
                        HTML += '                                                          </select>';
                        HTML += '                                                     </div>';
                        HTML += '                                                     <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                         <label for="acionamento'+ id_cp1 +'">@lang("entregaTecnica.acionamento")</label>';
                        HTML += '                                                         <select name="acionamento'+ id_cp1 +'" id="acionamento'+ id_cp1 +'" class="form-control">';
                        HTML += '                                                             <option value=""></option>';
                        HTML += '                                                            @foreach ($chavePartidaAcionamento as $acionamento)';
                        HTML += '                                                                  @if ($acionamento["tipo"] == $item["marca"])';
                        HTML += '                                                                      <option value="{{ $acionamento["modelo"] }}" {{ ($acionamento["modelo"] == $item["acionamento"]) ? "selected" : ""}}>{{ __("listas." . $acionamento["modelo"] ) }}</option>';
                        HTML += '                                                                   @endif';
                        HTML += '                                                             @endforeach';                                                          
                        HTML += '                                                          </select>';
                        HTML += '                                                     </div>';
                        HTML += '                                                      <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                           <label for="regulagem_reles'+ id_cp1 +'">@lang("entregaTecnica.regulagem_reles") (A)</label>';
                        HTML += '                                                           <input type="number" class="form-control" name="regulagem_reles'+ id_cp1 +'" id="regulagem_reles'+ id_cp1 +'">';
                        HTML += '                                                      </div>';
                        HTML += '                                               </div>';
                        HTML += '                                              <div class="form-row justify-content-start">';
                        HTML += '                                                   <div class="form-group col-md-4 telo5ce">';
                        HTML += '                                                       <label for="numero_serie'+ id_cp1 +'">@lang("entregaTecnica.numero_serie")</label>';
                        HTML += '                                                       <input type="number" class="form-control" name="numero_serie_cp'+ id_cp1 +'" id="numero_serie'+ id_cp1 +'">';
                        HTML += '                                                   </div>';
                        HTML += '                                              </div>';
                        HTML += '                                        </div>';
            
                        HTML += '                                   </div>';
                        HTML += '                                </div>';
                        
                        HTML += '                            </div>';
                        HTML += '                         </div>';
                    HTML += '               <div class="form-row justify-content-start mt-3">';
                    HTML += '                   <div class="col-md-3">';
                    HTML += '                  <button type="button" id="adicionarMotor" onclick="AdicionarMotor('+ i +');" class="voltar">@lang("entregaTecnica.adicionar_motor")</button>';
                    HTML += '                   </div>';
                    HTML += '               </div>';
                    HTML += '           </div>';
                    HTML += '     </div>';   
                    HTML += '</div>';                        
                }

                $('#myTab').append(CabTab);

                $('#myTabContent').append(HTML);
            } else {
                for (i = 0; i <= quantidade; i++) {
                    if (i <= quantidade_padrao) {
                        $('#tipo_motobomba_0' + i).val('padrao');
                    } else {
                        if ((quantidade_submersa > 0 && quantidade_submersa != null) || 
                            (quantidade_balsa > 0 && quantidade_balsa != null)) {
                            $('#tipo_motobomba_0' + i).val('auxiliar');
                        }
                    }
                }
                

                for (j = qtBombaAtual; j > quantidade; j--){
                    $("#liBombas-"+ j +"").remove();
                }
            }
        });
    </script>

    {{-- COMBOS DE SELECTS --}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">

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

        //Array de TipoEquipOp em JSON puro
        var acionamento = [
            @php for ($i = 0; $i < count($chavePartidaAcionamento); $i++) { @endphp
                { tipo: "{{ $chavePartidaAcionamento[$i]['tipo'] }}", modelo: "{{ $chavePartidaAcionamento[$i]['modelo'] }}", modelo_txt: "{{ __('listas.' . $chavePartidaAcionamento[$i]['modelo'] ) }}" },
            @php } @endphp
        ];

        // carrega a lista de modelo das bombas
        function carregaMotorMarca(marca, id_bomba, id_motor) {
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var motorMarca = $.grep(motor_marca, function (e) { return e.marca == marca; });
            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#marca_motor_0" + id_bomba + '_0' + id_motor).html('<option>Selecione...</option>');
            $.each(motorMarca, function (i, marca) {
                $("#marca_motor_0" + id_bomba + '_0' + id_motor).append($('<option>', {
                    value: marca.modelo, //Id do objeto subcategoria
                    text: marca.modelo //Nome da Subcategoria
                }));
            });
        }

        function alterarMotor(val, id_motor, id_bomba) {  
            //var x  = parseintt(12) 
            $('#marca_motor_eletrico_0' + id_motor + '_0'  + id_bomba).prop('disabled', false);
            $('#modelo_motor_eletrico_0' + id_motor + '_0'  + id_bomba).prop('disabled', false);
            $('#potencia_0' + id_motor + '_0'  + id_bomba).prop('disabled', false);
            $('#numero_serie_0' + id_motor + '_0'  + id_bomba).prop('disabled', false);
            $('#rotacao_0' + id_motor + '_0'  + id_bomba).prop('disabled', false);

            if (val == 'diesel') {
                $('#eletrico_0' + id_motor + '_0' + id_bomba).hide();
                $('#diesel_0' + id_motor + '_0'  + id_bomba).show();                
                $('#diesel_eletrico_0' + id_motor + '_0'  + id_bomba).find('input').prop('disabled', false);
                $('#campos_motor_eletrico_0' + id_motor + '_0'  + id_bomba).hide(); 
                carregaMotorMarca(val, id_motor, id_bomba);               
            } else if (val == 'eletrico') {    
                $('#diesel_0' + id_motor + '_0'  + id_bomba).hide();      
                $('#eletrico_0' + id_motor + '_0'  + id_bomba).show();
                $('#eletrico_0' + id_motor + '_0'  + id_bomba).find('input').prop('disabled', false);
                $('#diesel_eletrico_0' + id_motor + '_0'  + id_bomba).find('input').prop('disabled', false);
                $('#campos_motor_eletrico_0' + id_motor + '_0'  + id_bomba).show();
            } else {         
                $('#campos_motor_eletrico_0' + id_motor + '_0'  + id_bomba).hide(); 
                $('#diesel_0' + id_motor + '_0'  + id_bomba).hide();      
                $('#eletrico_0' + id_motor + '_0'  + id_bomba).show();
                $('#eletrico_0' + id_motor + '_0'  + id_bomba).find('input').prop('disabled', true);
                $('#diesel_eletrico_0' + id_motor + '_0'  + id_bomba).find('input').prop('disabled', true);

                $('#potencia_0' + id_motor + '_0'  + id_bomba).prop('disabled', true);
                $('#numero_serie_0' + id_motor + '_0'  + id_bomba).prop('disabled', true);
                $('#rotacao_0' + id_motor + '_0'  + id_bomba).prop('disabled', true);
            }
        }
            
        // carrega a lista de modelo das bombas
        function carregaBombaModelo(marca, id_bomba) {
            $('#marca_' + id_bomba).val();
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var bombaModelo = $.grep(bomba_modelo, function (e) { return e.marca == marca; });

            //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
            $("#modelo_" + id_bomba).html('<option>Selecione...</option>');
            $.each(bombaModelo, function (i, marca) {
                $("#modelo_" + id_bomba).append($('<option>', {
                    value: marca.modelo, //Id do objeto subcategoria
                    text: marca.modelo //Nome da Subcategoria
                }));
            });
        }

        // Carrega a lista de opcoes do equipamento
        function carregaAcionamento(input, tipo, id_bomba, id_motor) {
            var id = $(input).attr('id');
            var id = id.substring(12);
            console.log(id_bomba);
            console.log(id_motor);
            //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no equipamento
            var acionamento_chave = $.grep(acionamento, function (e) { return e.tipo == tipo; });
            //Faz o append (adiciona) cada um dos itens do array filtrado no Acionamento
            $('#acionamento_0' + id_bomba + '_0' + id).html('<option>Selecione...</option>');
            $.each(acionamento_chave, function (i, tipo) {
                $('#acionamento_0' + id_bomba + '_0' + id_motor + '_' + id).append($('<option>', {
                    value: tipo.modelo, //Id do objeto subcategoria
                    text: tipo.modelo_txt //Nome da Subcategoria
                }));
            });
        }

        function AdicionarMotor(bomba) {
            var newCard = "";
            var numero_motor = parseInt($("#accordionMotor_" + bomba).children('.card').last().data('motor')) + 1;
            var qt_card = ("00" + numero_motor.toString()).slice(-2);
            var idChaveP1 = '_0'+ bomba +'_'+ qt_card +'_1';
            var idChaveP2 = '_0'+ bomba +'_'+ qt_card +'_2';
            

            newCard += ''; 
            newCard += '                            <div class="card" data-motor='+ qt_card +'>';
            newCard += '                                <div class="card-header" id="heading_0'+ bomba + '_' +qt_card+'">';
            newCard += '                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_0'+ bomba + '_' +qt_card+'" aria-expanded="true" aria-controls="collapse_0'+ bomba + '_' +qt_card+'">';
            newCard += '                                        <span class="span_collapse">Motor '+qt_card+'</span>';
            newCard += '                                        <i class="fa fa-chevron-down pull-right"></i>';
            newCard += '                                    </button>';
            newCard += '                                </div>';
            newCard += '                               <input type="hidden" name="id_motor_'+ bomba +'[]" id="id_motor_'+ qt_card +'_01" value="'+ numero_motor +'">';

            newCard += '                                <div id="collapse_0'+ bomba + '_' + qt_card+'" class="collapse" aria-labelledby="heading_0'+ bomba + '_' +qt_card+'" data-parent="#accordionMotor_' + bomba + '">';
            newCard += '                                    <div class="card-body">';
            newCard += '                                        <div class="form-row justify-content-start">';                
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                <label for="tipo_motor">@lang("entregaTecnica.tipo_motor")</label>';
            newCard += '                                                <select class="form-control" name="tipo_motor_'+ bomba + '[]" id="tipo_motor_0' + bomba + '_' + qt_card +'"  onchange="alterarMotor($(this).val(), '+ bomba +', '+ qt_card +')" >';
            newCard += '                                                     <option value=""></option>';
            newCard += '                                                     @foreach ($tipo_motor as $motor)';
            newCard += '                                                         <option value="{{ $motor["tipo"] }}">{{ __("listas." . $motor["tipo"] ) }}</option>';
            newCard += '                                                     @endforeach';
            newCard += '                                                </select>';
            newCard += '                                            </div>';

            newCard += '                                            <div id="diesel_0' + bomba + '_' + qt_card +'" style="display: none" class="form-group col-md-12 telo5ce row">';
            newCard += '                                                <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                    <label for="marca_motor">@lang("entregaTecnica.marca")</label>';
            newCard += '                                                    <select class="form-control" name="marca_motor_'+ bomba +'[]" id="marca_motor_0' + bomba + '_' + qt_card +'">';
            newCard += '                                                        <option value=""></option>';
            newCard += '                                                    </select>';
            newCard += '                                                </div>';

            newCard += '                                                <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">';
            newCard += '                                                    <label for="modelo_motor">@lang("entregaTecnica.modelo")</label>';
            newCard += '                                                    <input type="text" class="form-control" name="modelo_motor_'+ bomba +'[]" id="modelo_motor_0' + bomba + '_' + qt_card +'">';
            newCard += '                                                </div>';
            newCard += '                                            </div>';

            newCard += '                                            <div id="eletrico_0' + bomba + '_' + qt_card +'" class="form-group col-md-12 telo5ce row">';
            newCard += '                                                <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                    <label for="marca_motor">@lang("entregaTecnica.marca")</label>';
            newCard += '                                                    <input type="text" class="form-control" name="marca_motor_eletrico_'+ bomba +'[]" id="marca_motor_eletrico_0' + bomba + '_' + qt_card +'" disabled>';
            newCard += '                                                </div>';

            newCard += '                                                <div class="form-group col-md-4" style="padding-right: 0; margin-left: 5px;">';
            newCard += '                                                    <label for="modelo_motor">@lang("entregaTecnica.modelo")</label>';
            newCard += '                                                    <input type="text" class="form-control" name="modelo_motor_eletrico_'+ bomba +'[]" id="modelo_motor_eletrico_0' + bomba + '_' + qt_card +'" disabled>';
            newCard += '                                                </div>';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
        
            newCard += '                                        <div class="form-row justify-content-start" id="diesel_eletrico_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="potencia">@lang("entregaTecnica.potencia") (cv)</label>';
            newCard += '                                                 <input type="number" class="form-control" name="potencia_'+ bomba +'[]" id="potencia_0' + bomba + '_' + qt_card +'" disabled>';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="numero_serie">@lang("entregaTecnica.numero_serie")</label>';
            newCard += '                                                 <input type="text" class="form-control" name="numero_serie_'+ bomba +'[]" id="numero_serie_0' + bomba + '_' + qt_card +'" disabled>';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="rotacao">@lang("entregaTecnica.rotacao")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="rotacao_'+ bomba +'[]" id="rotacao_0' + bomba + '_' + qt_card +'" disabled>';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
                
            newCard += '                                        <div id="campos_motor_eletrico_0' + bomba + '_' + qt_card +'" style="display: none;">';
            newCard += '                                            <div class="form-row justify-content-start">';
            newCard += '                                                <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                     <label for="tensao">@lang("entregaTecnica.tensao") (v)</label>';
            newCard += '                                                     <input type="number" class="form-control" name="tensao_'+ bomba +'[]" id="tensao_0' + bomba + '_' + qt_card +'">';
            newCard += '                                                </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="lp_ln">@lang("entregaTecnica.lp_ln")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="lp_ln_'+ bomba +'[]" id="lp_ln_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="classe_isolamento">@lang("entregaTecnica.classe_isolamento")</label>';
            newCard += '                                                 <input type="text" class="form-control" name="classe_isolamento_'+ bomba +'[]" id="classe_isolamento_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
        
            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="corrente_nominal">@lang("entregaTecnica.corrente_nominal") (v)</label>';
            newCard += '                                                 <input type="number" class="form-control" name="corrente_nominal_'+ bomba +'[]" id="corrente_nominal_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="fs">@lang("entregaTecnica.fs")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="fs_'+ bomba +'[]" id="fs_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="ip">@lang("entregaTecnica.ip")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="ip_'+ bomba +'[]" id="ip_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                        </div>';
        
            newCard += '                                        <div class="form-row justify-content-start">';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                 <label for="rendimento">@lang("entregaTecnica.rendimento")</label>';
            newCard += '                                                 <input type="number" class="form-control" name="rendimento_'+ bomba +'[]" id="rendimento_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                            <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                    <label for="cos">@lang("entregaTecnica.cos")</label>';
            newCard += '                                                    <input type="number" class="form-control" name="cos_'+ bomba +'[]" id="cos_0' + bomba + '_' + qt_card +'">';
            newCard += '                                            </div>';
            newCard += '                                        </div>';        
            
                                
            newCard += '                                               <div class="form-row justify-content-start">';
            newCard += '                                                   <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                       <h4>@lang("entregaTecnica.chave_partida")</h4>';
            newCard += '                                                   </div>';
            newCard += '                                               </div>';                    
            newCard += '                                               <div class="form-row justify-content-start">';
            newCard += '                                         <div class="form-group col-md-4 telo5ce">';
                
            newCard += '                                              <input type="hidden" name="id_chave_partida' + idChaveP1 + '" id="id_chave_partida' + idChaveP1 + '" value="1"';
            newCard += '                                              <label for="marca'+ idChaveP1 +'">@lang("entregaTecnica.marca")</label>';
            newCard += '                                              <select name="marca'+ idChaveP1 + '" id="marca'+ idChaveP1 +'" class="form-control marca" onchange="carregaAcionamento(this, $(this).val(), '+ bomba +', '+ qt_card +')">';
            newCard += '                                                  <option value=""></option>';
            newCard += '                                                  @foreach ($chavePartida as $chave)';
            newCard += '                                                      <option value="{{ $chave["tipo"] }}" {{ ($chave["tipo"] == $item["marca"]) ? "selected" : ""}}>{{ $chave["tipo"] }}</option>';
            newCard += '                                                  @endforeach';
            newCard += '                                              </select>';
            newCard += '                                         </div>';
            newCard += '                                         <div class="form-group col-md-4 telo5ce">';
            newCard += '                                             <label for="acionamento">@lang("entregaTecnica.acionamento")</label>';
            newCard += '                                             <select name="acionamento' + idChaveP1 +'" id="acionamento'+ idChaveP1 +'" class="form-control">';
            newCard += '                                                 <option value=""></option>';
            newCard += '                                                 @foreach ($chavePartidaAcionamento as $acionamento)';
            newCard += '                                                      @if ($acionamento["tipo"] == $item["marca"])';
            newCard += '                                                          <option value="{{ $acionamento["modelo"] }}" {{ ($acionamento["modelo"] == $item["acionamento"]) ? "selected" : ""}}>{{ __("listas." . $acionamento["modelo"] ) }}</option>';
            newCard += '                                                       @endif';
            newCard += '                                                  @endforeach';                                                          
            newCard += '                                              </select>';
            newCard += '                                          </div>';
            newCard += '                                                   <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                       <label for="regulagem_reles">@lang("entregaTecnica.regulagem_reles") (A)</label>';
            newCard += '                                                       <input type="number" class="form-control" name="regulagem_reles'+ idChaveP1 +'" id="regulagem_reles'+ idChaveP1 +'">';
            newCard += '                                                   </div>';
            newCard += '                                               </div>';                    
            newCard += '                                               <div class="form-row justify-content-start">';
            newCard += '                                                   <div class="form-group col-md-4 telo5ce">';
            newCard += '                                                       <label for="numero_serie">@lang("entregaTecnica.numero_serie")</label>';
            newCard += '                                                       <input type="number" class="form-control" name="numero_serie_'+ idChaveP1 +'" id="numero_serie'+ idChaveP1 +'">';
            newCard += '                                                   </div>';
            newCard += '                                               </div>';            
            // newCard += '                                               <div class="form-row justify-content-start">';
            // newCard += '                                                   <div class="form-group col-md-4 telo5ce">';
            // newCard += '                                                       <h4>@lang("entregaTecnica.chave_partida") - 2</h4>';
            // newCard += '                                                   </div>';
            // newCard += '                                               </div>';                    
            // newCard += '                                               <div class="form-row justify-content-start">';
            // newCard += '                                         <div class="form-group col-md-4 telo5ce">';
                
            // newCard += '                                              <input type="hidden" name="id_chave_partida' + idChaveP2 + '" id="id_chave_partida' + idChaveP2 + '" value="2">';
            // newCard += '                                              <label for="marca'+ idChaveP2 +'">@lang("entregaTecnica.marca")</label>';
            // newCard += '                                              <select name="marca'+ idChaveP2 + '" id="marca'+ idChaveP2 +'" class="form-control marca" onchange="carregaAcionamento(this, $(this).val(), '+ bomba +')">';
            // newCard += '                                                  <option value=""></option>';
            // newCard += '                                                  @foreach ($chavePartida as $chave)';
            // newCard += '                                                      <option value="{{ $chave["tipo"] }}" {{ ($chave["tipo"] == $item["marca"]) ? "selected" : ""}}>{{ $chave["tipo"] }}</option>';
            // newCard += '                                                  @endforeach';
            // newCard += '                                              </select>';
            // newCard += '                                         </div>';
            // newCard += '                                         <div class="form-group col-md-4 telo5ce">';
            // newCard += '                                             <label for="acionamento">@lang("entregaTecnica.acionamento")</label>';
            // newCard += '                                             <select name="acionamento' + idChaveP2 +'" id="acionamento'+ idChaveP2 +'" class="form-control">';
            // newCard += '                                                 <option value=""></option>';
            // newCard += '                                                 @foreach ($chavePartidaAcionamento as $acionamento)';
            // newCard += '                                                      @if ($acionamento["tipo"] == $item["marca"])';
            // newCard += '                                                          <option value="{{ $acionamento["modelo"] }}" {{ ($acionamento["modelo"] == $item["acionamento"]) ? "selected" : ""}}>{{ __("listas." . $acionamento["modelo"] ) }}</option>';
            // newCard += '                                                       @endif';
            // newCard += '                                                  @endforeach';                                                          
            // newCard += '                                              </select>';
            // newCard += '                                          </div>';
            // newCard += '                                                   <div class="form-group col-md-4 telo5ce">';
            // newCard += '                                                       <label for="regulagem_reles">@lang("entregaTecnica.regulagem_reles")</label>';
            // newCard += '                                                       <input type="number" class="form-control" name="regulagem_reles'+ idChaveP2 +'" id="regulagem_reles'+ idChaveP2 +'">';
            // newCard += '                                                   </div>';
            // newCard += '                                               </div>';                    
            // newCard += '                                               <div class="form-row justify-content-start">';
            // newCard += '                                                   <div class="form-group col-md-4 telo5ce">';
            // newCard += '                                                       <label for="numero_serie">@lang("entregaTecnica.numero_serie")</label>';
            // newCard += '                                                       <input type="number" class="form-control" name="numero_serie'+ idChaveP2 +'" id="numero_serie'+ idChaveP2 +'">';
            // newCard += '                                                   </div>';
            // newCard += '                                               </div>';      

            newCard += '                                    </div>';
            newCard += '                                </div>';
            newCard += '                            </div>';
            newCard += '                         </div>';
            newCard += '                      </div>';

            $("#accordionMotor_" + bomba).append(newCard);
        }

        function campoQtdBombaAuxiliar() {
        }
    </script>


    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
