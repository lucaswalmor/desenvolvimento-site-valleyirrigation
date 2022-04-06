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
                    data-placement="bottom" title="@lang('entregaTecnica.voltar')">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>

                @if ($entrega_tecnica_status['status'] == 4 || $entrega_tecnica_status['status'] == 5)
                    <button type="button" data-toggle="modal" data-target="#enviar_analise" disabled>
                        <span class="fa-stack fa-2x"  data-toggle="tooltip" data-placement="bottom" title="@lang("entregaTecnica.enviar")">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-share-square fa-stack-1x fa-inverse"></i>    
                        </span>
                    </button>
                @else
                    <button type="button" id="botao_enviar_analise" data-target="#enviar_analise" onclick="dataAnalysis();">
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
    <div class="modal fade" id="enviar_analise" tabindex="-1" aria-labelledby="enviar_analiseLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                        {{-- TITULO DA ENTREGA TECNICA REPROVADA --}}
                        <h3 class="text-danger titulo-reprovado" style="display: none;">@lang('entregaTecnica.et_repproved')</h3>                        
                        
                        {{-- TITULO DA ENTREGA TECNICA APROVADA --}}
                        <h3 class="text-success titulo-aprovado" style="display: none;">@lang('entregaTecnica.et_approved')</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('send_analisy_technical_delivery') }}" method="post" id="formdados">
                    @csrf
                        <input type="hidden" name="id_entrega_tecnica" value="{{ $id_entrega_tecnica }}">
                        <input type="hidden" name="status_analise" id="status_analise" value="">

                        <div class="col-md-12" id="cssPreloader">
                            <div class="form-row justify-content-start">    
                                <div class="form-group col-md-12 titulo-status-entrega-tecnica" id="formulario_reprovada" style="display: none;">
                                    <div class="form-group mt-3">
                                        <label for="divergence">@lang('entregaTecnica.detalhes_divergencia')</label>
                                        <textarea class="form-control" name="divergence" id="divergence" rows="5" readonly></textarea>
                                    </div>
                                </div>   
                            </div>

                            <div class="form-row justify-content-start"> 
                                <div class="form-group col-md-12" id="formulario_aprovada" style="display: none;">
                                </div>   
                            </div>

                            <div class="form-row justify-content-start"> 
                                <div class="form-group col-md-12 titulo-status-entrega-tecnica">
                                    <label for="observacoes">@lang('entregaTecnica.observacoes')</label>
                                    <textarea class="form-control" id="observacoes" name="observacoes" rows="4"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-end botaoAfericao mb-2 mr-4" id="botoesSalvar">
                            <button type="button" class="ml-2 etVoltar" data-dismiss="modal" aria-label="Close">@lang('unidadesAcoes.sair')</button>
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
            <a class="nav-link active" id="principal-tab" data-toggle="tab" href="#principal" role="tab"
                aria-controls="principal" aria-selected="true">@lang('entregaTecnica.principal')</a>
        </li>
    </ul>

    <div class="tab-content mobile-et" id="myTabContent">

        <div class="tab-pane fade show active" id="principal" role="tabpanel" aria-labelledby="principal-tab">

            <div class ="row justify-content-md-center mt-3">
                <div class="col-md-11">
                    <div id="myAlert" class="alert alert-warning alert-dismissible fade text-center" toggle="myAlert" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p id="messageAlert"></p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                @foreach ($entrega_tecnica as $item) 
                    @include('entregaTecnica.analise.abas.content_analysis')
                @endforeach
            </div>

        </div>

    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            $("#myAlert").hide();

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

        function dataAnalysis() {
            var general_features = $("input[name='general_features']:checked").val();
            var general_features_observacoes = $('#observacao_caracteristicas_gerais').val();

            var spans = $("input[name='spans']:checked").val();
            var spans_observacoes = $('#observacao_spans').val();
            
            var spiklers = $("input[name='spiklers']:checked").val();
            var spiklers_observacoes = $('#observacao_spiklers').val();

            var adductor = $("input[name='adductor']:checked").val();
            var adductor_observacoes = $('#observacao_adductor').val();

            var connection_accessories = $("input[name='connection_accessories']:checked").val();
            var connection_accessories_observacoes = $('#observacao_LA').val();

            var motopump = $("input[name='motopump']:checked").val();
            var motopump_observacoes = $('#observacao_motoPump').val();

            var suction = $("input[name='suction']:checked").val();
            var suction_observacoes = $('#observacao_suction').val();

            var powersupply = $("input[name='powersupply']:checked").val();
            var powersupply_observacoes = $('#observacao_powersupply').val();

            var tests = $("input[name='tests']:checked").val();
            var tests_observacoes = $('#observacao_tests').val();

            var telemetry = $("input[name='telemetry']:checked").val();
            var telemetry_observacoes = $('#observacao_telemetry').val();

            
            
            var array = [
                {campo: '@lang('entregaTecnica.caracteristicas_gerais')', value: general_features, texto: general_features_observacoes},
                {campo: '@lang('entregaTecnica.lances')', value: spans, texto: spans_observacoes},
                {campo: '@lang('entregaTecnica.aspersores')', value: spiklers, texto: spiklers_observacoes},
                {campo: '@lang('entregaTecnica.adutora')', value: adductor, texto: adductor_observacoes},
                {campo: '@lang('entregaTecnica.ligacao_acessorios')', value: connection_accessories, texto: connection_accessories_observacoes},
                {campo: '@lang('entregaTecnica.motobomba')', value: motopump, texto: motopump_observacoes},
                {campo: '@lang('entregaTecnica.succao')', value: suction, texto: suction_observacoes},
                {campo: '@lang('entregaTecnica.alimentacao_eletrica')', value: powersupply, texto: powersupply_observacoes},
                {campo: '@lang('entregaTecnica.testes')', value: tests, texto: tests_observacoes},
                {campo: '@lang('entregaTecnica.telemetria')', value: telemetry, texto: telemetry_observacoes},
            ];


            let divergencias = '';
            let conta_rep = 0;
            let status = 0;
            let exist_blank = false; 


            for(var i = 0; i < array.length; i++) {
                if(array[i].value != 'repproved' && array[i].value != 'approved') {
                    exist_blank = true;
                    break;
                }

                if(array[i].value == 'repproved') {
                    divergencias +=  array[i].campo + ': \n\t' + array[i].texto + '\n';
                    conta_rep += 1;                    
                }

            }

            if(!exist_blank) {
                divergencias = divergencias.substring(0, (divergencias.length - 2));

                if (conta_rep > 0 ) {
                    status = 0; // Repproved
                    $('#formulario_reprovada').show();
                    $('#formulario_aprovada').hide();
                    $('.titulo-reprovado').show();
                    $('.titulo-aprovado').hide();

                    document.getElementById('divergence').value = divergencias;
                    document.getElementById('status_analise').value = status;
                } 
                else {
                    status = 1; // Approved
                    $('#formulario_aprovada').show();
                    $('#formulario_reprovada').hide();
                    $('.titulo-reprovado').hide();
                    $('.titulo-aprovado').show();
                    
                    document.getElementById('status_analise').value = status;
                }

                $('#enviar_analise').modal('toggle');
            } 
            else {                
                $('#messageAlert').html('<strong style="font-size: 1.5rem;">@lang('entregaTecnica.campos_analise')</strong>');

                $('#myAlert').fadeTo(2000, 500).slideUp(500, function() {
                    $('#myAlert').fadeOut(500);
                })
            }
        }
    </script>
@endsection