@extends('_layouts._layout_site')
<style>
    table thead tr th {
        font-size: 20px;
    }

    table tbody tr td {
        font-size: 18px !important;
    }

    .select2-container {
        width: 100% !important;
    }
</style>
@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-entrega-tecnica-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1>
                <h4>@lang('entregaTecnica.analise_geral')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('manage_analysis_technical_delivery', $id_entrega_tecnica) }}" style="color: #3c8dbc" data-toggle="tooltip"
                    data-placement="bottom" title="Voltar">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>

                @if ($entrega_tecnica_status['status'] == 4)
                    <button type="button" data-toggle="modal" data-target="#envar_analise" disabled>
                        <span class="fa-stack fa-2x"  data-toggle="tooltip" data-placement="bottom" title="@lang("entregaTecnica.enviar")">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-share-square fa-stack-1x fa-inverse"></i>    
                        </span>
                    </button>
                @else
                    <button type="button" data-toggle="modal" data-target="#envar_analise" >
                        <span class="fa-stack fa-2x"  data-toggle="tooltip" data-placement="bottom" title="@lang("entregaTecnica.enviar")">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-share-square fa-stack-1x fa-inverse"></i>    
                        </span>
                    </button>
                @endif
            </div>
            </div>
        </div>

    {{-- ENVIAR ANÁLISE DA ENTREGA TECNICA --}}
    <div class="modal fade" id="envar_analise" tabindex="-1" aria-labelledby="envar_analiseLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="envar_analiseLabel">@lang('entregaTecnica.enviar_analise')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('send_analisy_technical_delivery') }}" method="post" id="formdados">
                    @csrf
                        <input type="hidden" name="id_entrega_tecnica" value="{{ $id_entrega_tecnica }}">
                        <div class="col-md-12" id="cssPreloader">
                            <div class="form-row justify-content-start">    
                                <div class="form-group col-md-3 telo5ce">
                                    <label for="situacao">@lang('entregaTecnica.situacao')</label>
                                    <select name="situacao" class='form-control' id="situacao" onchange="reprovado();">
                                        <option value="2"></option>
                                        <option value="1">@lang('entregaTecnica.aprovada')</option>
                                        <option value="0">@lang('entregaTecnica.reprovada')</option>
                                    </select>
                                </div>      
                                <div class="form-group col-md-9 telo5ce" id="formulario_reprovada" style="display: none;">
                                    <label for="tags">@lang('entregaTecnica.divergencia')</label>
                                    <select class='form-control' multiple="true" name="tags[]" id="tagSelector">
                                        <option value=""></option>
                                        @foreach ($campos_reprovados as $campos)
                                            <option value="{{ $campos['campo']}}" {{ $campos['campo'] == $entrega_tecnica_dados['tipo_equipamento_op1'] ? 'selected' : ''}} >{{  __('entregaTecnica.'. $campos['campo'] ) }}</option>
                                        @endforeach
                                    </select>
                                </div>   
                            </div>
                            <div class="form-row justify-content-start"> 
                                <div class="form-group col-md-12">
                                    <label for="observacoes">@lang('entregaTecnica.observacoes')</label>
                                    <textarea class="form-control" id="observacoes" name="observacoes" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end botaoAfericao mb-2 mr-4" id="botoesSalvar">
                            <button type="button" class=" ml-2 etVoltar" data-dismiss="modal" aria-label="Close">
                                @lang('unidadesAcoes.sair')
                            </button>
                            <button class="etSalvar ml-2" name="botao" value="salvar" id="botaosalvar">@lang('entregaTecnica.enviar')</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
      </div>
@endsection

@section('conteudo')
    {{-- NAVTAB'S --}}
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item mobile-et" role="presentation">
            <a class="nav-link active" id="caracteristicas_gerais-tab" data-toggle="tab" href="#caracteristicas_gerais" role="tab"
                aria-controls="caracteristicas_gerais" aria-selected="true">@lang('entregaTecnica.caracteristicas_gerais')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="lances-tab" data-toggle="tab" href="#lances" role="tab"
                aria-controls="lances" aria-selected="false">@lang('entregaTecnica.lances')
            </a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="aspersores-tab" data-toggle="tab" href="#aspersores" role="tab" aria-controls="aspersores"
                aria-selected="false">@lang('entregaTecnica.aspersores')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="adutora-tab" data-toggle="tab" href="#adutora" role="tab"
                aria-controls="adutora" aria-selected="false">@lang('entregaTecnica.adutora')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="ligacao-tab" data-toggle="tab" href="#ligacao" role="tab"
                aria-controls="ligacao" aria-selected="false">@lang('entregaTecnica.ligacao_acessorios')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="motobomba-tab" data-toggle="tab" href="#motobomba" role="tab"
                aria-controls="motobomba" aria-selected="false">@lang('entregaTecnica.motobomba')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="succao-tab" data-toggle="tab" href="#succao" role="tab"
                aria-controls="succao" aria-selected="false">@lang('entregaTecnica.succao')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="alimentacao_eletrica-tab" data-toggle="tab" href="#alimentacao_eletrica" role="tab"
                aria-controls="alimentacao_eletrica" aria-selected="false">@lang('entregaTecnica.alimentacao_eletrica')</a>
        </li>
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="testes-tab" data-toggle="tab" href="#testes" role="tab"
                aria-controls="testes" aria-selected="false">@lang('entregaTecnica.testes')</a>
        </li>

        @if (count($telemetria) > 0)
        <li class=" mobile-et" role="presentation">
            <a class="nav-link" id="telemetria-tab" data-toggle="tab" href="#telemetria" role="tab"
                aria-controls="telemetria" aria-selected="false">@lang('entregaTecnica.telemetria')</a>
        </li>
        @endif

    </ul>

<div id="alert">                
    @include('_layouts._includes._alert')    
</div>  

<div class="tab-content mobile-et" id="myTabContent">
    @foreach ($entrega_tecnica as $item) 
        <div class="tab-pane fade show active" id="caracteristicas_gerais" role="tabpanel" aria-labelledby="caracteristicas_gerais-tab">
            @include('entregaTecnica.analise.abas.general_features')
        </div>
        
        <div class="tab-pane fade" id="lances" role="tabpanel" aria-labelledby="lances-tab">
            @include('entregaTecnica.analise.abas.spans')
        </div>

        <div class="tab-pane fade" id="aspersores" role="tabpanel" aria-labelledby="aspersores-tab">
            @include('entregaTecnica.analise.abas.sprinklers')
        </div>

        <div class="tab-pane fade" id="adutora" role="tabpanel" aria-labelledby="adutora-tab">
            @include('entregaTecnica.analise.abas.adductor')
        </div>
        
        <div class="tab-pane fade" id="ligacao" role="tabpanel" aria-labelledby="ligacao-tab">
            @include('entregaTecnica.analise.abas.connectionAndAcessories')
        </div>
        
        <div class="tab-pane fade" id="motobomba" role="tabpanel" aria-labelledby="motobomba-tab">
            @include('entregaTecnica.analise.abas.motopump')
        </div>
        
        <div class="tab-pane fade" id="succao" role="tabpanel" aria-labelledby="succao-tab">
            @include('entregaTecnica.analise.abas.sucction')
        </div>
        
        <div class="tab-pane fade" id="alimentacao_eletrica" role="tabpanel" aria-labelledby="alimentacao_eletrica-tab">
            @include('entregaTecnica.analise.abas.powerSupply')
        </div>
    
        <div class="tab-pane fade" id="testes" role="tabpanel" aria-labelledby="testes-tab">
            @include('entregaTecnica.analise.abas.tests')
        </div>
    
        <div class="tab-pane fade" id="telemetria" role="tabpanel" aria-labelledby="telemetria-tab">
            @include('entregaTecnica.analise.abas.telemetry')
        </div>
            @endforeach
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#botaosalvar').on('click', function() {            
                $('#formdados').submit();
            });      

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
        });       

        function reprovado() {
            var reprovada = $('#situacao').val();
            if (reprovada == 0) {
                $('#formulario_reprovada').show();
            } else if (reprovada == 1 || reprovada == 2) {
                $('#formulario_reprovada').hide();
            }
        }
    </script>
@endsection