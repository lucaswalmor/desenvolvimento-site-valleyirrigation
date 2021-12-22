@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.telemetria') - @lang('comum.cadastrar')</h4>
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
        <form action="{{ route('save_telemetry_technical_delivery') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>        
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf
                    <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
                    <input type="hidden" name="situacao" id="situacao" value="create">
                    <div class="col-md-12" id="cssPreloader">
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['aqua_tec_pro'])) checked @endif name="aqua_tec_pro" id="customSwitch">
                                    <label class="custom-control-label" for="customSwitch" style="font-size: 1.2rem">@lang('entregaTecnica.aqua_tec_pro')</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['aqua_tec_lite'])) checked @endif name="aqua_tec_lite" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1" style="font-size: 1.2rem">@lang('entregaTecnica.aqua_tec_lite')</label>
                                </div>
                            </div>                            
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['commander_vp'])) checked @endif name="commander_vp" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2" style="font-size: 1.2rem">@lang('entregaTecnica.commander_vp')</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['icon_link'])) checked @endif name="icon_link" id="customSwitch3">
                                    <label class="custom-control-label" for="customSwitch3" style="font-size: 1.2rem">@lang('entregaTecnica.icon_link')</label>
                                </div>
                            </div>                            
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['crop_link'])) checked @endif name="crop_link" id="customSwitch5">
                                    <label class="custom-control-label" for="customSwitch5" style="font-size: 1.2rem">@lang('entregaTecnica.crop_link')</label>
                                </div>
                            </div>                        
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['base_station3'])) checked @endif name="base_station3" id="customSwitch6">
                                    <label class="custom-control-label" for="customSwitch6" style="font-size: 1.2rem">@lang('entregaTecnica.base_station3')</label>
                                </div>
                            </div>
                        </div>   

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['estacao_metereologica_valley'])) checked @endif name="estacao_metereologica_valley" id="customSwitch4">
                                    <label class="custom-control-label" for="customSwitch4" style="font-size: 1.2rem">@lang('entregaTecnica.estacao_metereologica_valley')</label>
                                </div>
                            </div>                            
                            <div class="form-group col-md-4 telo5ce entregaTecnica-checkbox">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" @if(!empty($telemetria['field_commander'])) checked @endif name="field_commander" id="customSwitch7">
                                    <label class="custom-control-label" for="customSwitch7" style="font-size: 1.2rem">@lang('entregaTecnica.field_commander')</label>
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
        $(document).ready(function() {
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);

            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });
                        
        });
    </script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
