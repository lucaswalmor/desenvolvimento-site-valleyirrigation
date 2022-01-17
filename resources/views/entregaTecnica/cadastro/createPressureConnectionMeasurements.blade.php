@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.ligacao')/@lang('entregaTecnica.acessorios') - @lang('comum.cadastrar')</h4>
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
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="ligacao-tab" data-toggle="tab" href="#ligacao" role="tab"
                    aria-controls="ligacao" aria-selected="true">@lang('entregaTecnica.ligacao')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="acessorios-tab" data-toggle="tab" href="#acessorios" role="tab"
                    aria-controls="acessorios" aria-selected="false">@lang('entregaTecnica.acessorios')
                </a>
            </li>
        </ul>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_pressure_connection') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="ligacao" role="tabpanel" aria-labelledby="ligacao-tab">                        
                    <div class="col-md-12">
                        {{-- TUBO AZ --}}
                        <div>
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-4 telo5ce">
                                    <h4>@lang('entregaTecnica.tubo_az')</h4>
                                </div>
                            </div>
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="tubo_az1_comprimento">@lang('entregaTecnica.comprimento') @lang('unidadesAcoes.(m)') 1</label>
                                    <input type="text" id="tubo_az1_comprimento" class="form-control" name="tubo_az1_comprimento" value="{{ $ligacao['tubo_az1_comprimento'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="tubo_az1_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)') 1</label>
                                    <input type="text" id="tubo_az1_diametro" class="form-control" name="tubo_az1_diametro" value="{{ $ligacao['tubo_az1_diametro'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="tubo_az2_comprimento">@lang('entregaTecnica.comprimento') @lang('unidadesAcoes.(m)') 2</label>
                                    <input type="text" id="tubo_az2_comprimento" class="form-control" name="tubo_az2_comprimento" value="{{ $ligacao['tubo_az2_comprimento'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="tubo_az2_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)') 2</label>
                                    <input type="text" id="tubo_az2_diametro" class="form-control" name="tubo_az2_diametro" value="{{ $ligacao['tubo_az2_diametro'] }}">
                                </div>
                            </div>
                        </div>

                        {{-- REGISTRO GAVETA E PEÇA AUMENTO --}}
                        <div>
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-6 telo5ce">
                                    <h4>@lang('entregaTecnica.registro_gaveta')</h4>
                                </div>
                                <div class="form-group col-md-6 telo5ce">
                                    <h4>@lang('entregaTecnica.peca_aumento')</h4>
                                </div>
                            </div>
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="registro_gaveta_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</label>
                                    <input type="text" id="registro_gaveta_diametro" class="form-control" name="registro_gaveta_diametro" value="{{ $ligacao['registro_gaveta_diametro'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="registro_gaveta_marca">@lang('entregaTecnica.marca')</label>
                                    <input type="text" id="registro_gaveta_marca" class="form-control" name="registro_gaveta_marca" value="{{ $ligacao['registro_gaveta_marca'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="peca_aumento_diametro_maior">@lang('entregaTecnica.diametro_maior') @lang('unidadesAcoes.(pol)')</label>
                                    <input type="text" id="peca_aumento_diametro_maior" class="form-control" name="peca_aumento_diametro_maior" value="{{ $ligacao['peca_aumento_diametro_maior'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="peca_aumento_diametro_menor">@lang('entregaTecnica.diametro_menor') @lang('unidadesAcoes.(pol)')</label>
                                    <input type="text" id="peca_aumento_diametro_menor" class="form-control" name="peca_aumento_diametro_menor" value="{{ $ligacao['peca_aumento_diametro_menor'] }}">
                                </div>
                            </div>
                        </div>
                        
                        {{-- VÁLVULA VENTOSA --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <h4>@lang('entregaTecnica.valvula_ventosa')</h4>
                            </div>
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="valvula_ventosa_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</label>
                                <input type="text" id="valvula_ventosa_diametro" class="form-control" name="valvula_ventosa_diametro" value="{{ $ligacao['valvula_ventosa_diametro'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="valvula_ventosa_marca">@lang('entregaTecnica.marca')</label>
                                <input type="text" id="valvula_ventosa_marca" class="form-control" name="valvula_ventosa_marca" value="{{ $ligacao['valvula_ventosa_marca'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="valvula_ventosa_modelo">@lang('entregaTecnica.modelo')</label>
                                <input type="text" id="valvula_ventosa_modelo" class="form-control" name="valvula_ventosa_modelo" value="{{ $ligacao['valvula_ventosa_modelo'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="quantidade_valv_ventosa">@lang('entregaTecnica.quantidade')</label>
                                <input type="text" id="quantidade_valv_ventosa" class="form-control" name="quantidade_valv_ventosa" value="{{ $ligacao['qtd_valvula_ventosa'] }}">
                            </div>
                        </div>

                        {{-- VÁLVULA RETENÇÃO --}}
                        <div>
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-4 telo5ce">
                                    <h4>@lang('entregaTecnica.valvula_retencao')</h4>
                                </div>
                            </div>
                            <div class="form-row justify-content-start">
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="valvula_retencao_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</label>
                                    <input type="text" id="valvula_retencao_diametro" class="form-control" name="valvula_retencao_diametro" value="{{ $ligacao['valvula_retencao_diametro'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="valvula_retencao_marca">@lang('entregaTecnica.marca')</label>
                                    <input type="text" id="valvula_retencao_marca" class="form-control" name="valvula_retencao_marca" value="{{ $ligacao['valvula_retencao_marca'] }}">
                                </div>
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="valvula_retencao_material">@lang('entregaTecnica.material')</label>
                                    <input type="text" id="valvula_retencao_material" class="form-control" name="valvula_retencao_material" value="{{ $ligacao['valvula_retencao_material'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="tab-pane fade" id="acessorios" role="tabpanel" aria-labelledby="acessorios-tab">                        
                    <div class="col-md-12">

                        {{-- VÁLVULA ANTECIPADORA DE ONDAS --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <h4>@lang('entregaTecnica.valvula_antecipadora')</h4>
                            </div>
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="valvula_antecondas_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</label>
                                <input type="text" id="valvula_antecondas_diametro" class="form-control" name="valvula_antecondas_diametro" value="{{ $ligacao['valvula_antecondas_diametro'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="valvula_antecondas_marca">@lang('entregaTecnica.marca')</label>
                                <input type="text" id="valvula_antecondas_marca" class="form-control" name="valvula_antecondas_marca" value="{{ $ligacao['valvula_antecondas_marca'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="valvula_antecondas_modelo">@lang('entregaTecnica.modelo')</label>
                                <input type="text" id="valvula_antecondas_modelo" class="form-control" name="valvula_antecondas_modelo" value="{{ $ligacao['valvula_antecondas_modelo'] }}">
                            </div>
                        </div>

                        {{-- REGISTRO ELÉTRICO --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-4 telo5ce">
                                <h4>@lang('entregaTecnica.hidrometro')</h4>
                            </div>
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="registro_eletrico_diametro">@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</label>
                                <input type="text" id="registro_eletrico_diametro" class="form-control" name="registro_eletrico_diametro" value="{{ $ligacao['registro_eletrico_diametro'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="registro_eletrico_marca">@lang('entregaTecnica.marca')</label>
                                <input type="text" id="registro_eletrico_marca" class="form-control" name="registro_eletrico_marca" value="{{ $ligacao['registro_eletrico_marca'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="registro_eletrico_modelo">@lang('entregaTecnica.modelo')</label>
                                <input type="text" id="registro_eletrico_modelo" class="form-control" name="registro_eletrico_modelo" value="{{ $ligacao['registro_eletrico_modelo'] }}">
                            </div>
                        </div>

                        {{-- OUTROS --}}
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-6 telo5ce">
                                <label for="medicoes_ligpress_outros">@lang('entregaTecnica.outros')</label>
                                <input type="text" id="medicoes_ligpress_outros" class="form-control" name="medicoes_ligpress_outros" value="{{ $ligacao['medicoes_ligpress_outros']}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


@endsection

@section('scripts')

    {{-- COMBOS DE SELECTS --}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });
        });
    </script>
@endsection
