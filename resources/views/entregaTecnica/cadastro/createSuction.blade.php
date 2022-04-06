@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.succao') - @lang('comum.cadastrar')</h4>
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
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.principais')</a>
            </li>
        </ul>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_suction') }}" method="post" class="mt-3" id="formdados">
            @csrf
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
                    <input type="hidden" name="succao_auxiliar_existente" id="succao_auxiliar_existente" value="{{$motobomba['succao_auxiliar']}}">
                    <input type="hidden" name="succao_existente" id="succao_existente" value="{{$motobomba['tipo_succao']}}">
                    <!-- modificação para botão salvar sair -->
                    <input type="hidden" name="savebuttonvalue" id="savebuttonvalue" value="save">
                    <div id="alert">                
                        @include('_layouts._includes._alert')   
                    </div>
                    <div class="col-md-12" id="cssPreloader"> 
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('img/image_none.png')}}" id="myImg" alt="none" class="img-fluid img-succao">
                                        <img src="{{ asset('img/img_succao/afogadaPb.png') }}" id="afogada" class="img-fluid img-succao abrirModal" style="display: none">
                                        <img src="{{ asset('img/img_succao/diretaPb.png') }}" id="direta" class="img-fluid img-succao abrirModal" style="display: none">
                                        <img src="{{ asset('img/img_succao/pocosPb.png') }}" id="pocos" class="img-fluid img-succao abrirModal" style="display: none">
                                        <img src="{{ asset('img/img_succao/balsaPb.png') }}" id="balsa" class="img-fluid img-succao abrirModal" style="display: none">
                                        <img src="{{ asset('img/img_succao/submersaPb.png') }}" id="submersa" class="img-fluid img-succao abrirModal" style="display: none">
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
                            
                            <div class="col-md-3 telo5ce no-gutters">
                                <div class="form-group col-md-12">
                                    <label for="medicao_succao_l">@lang('entregaTecnica.medicao_succao_l')</label>
                                    <input type="number" id="medicao_succao_l" class="form-control mb-4" name="medicao_succao_l" maxlength="20" value="{{ $succao['medicao_succao_l'] }}">
                                    <em class="input-unidade">@lang('unidadesAcoes._m')</em>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="medicao_succao_h">@lang('entregaTecnica.medicao_succao_h')</label>
                                    <input type="number" id="medicao_succao_h" class="form-control mb-4" name="medicao_succao_h" maxlength="20" value="{{ $succao['medicao_succao_h'] }}">
                                    <em class="input-unidade">@lang('unidadesAcoes._m')</em>
                                </div>

                                <div class="form-group col-md-12">
                                @if (count($succao['medicao_succao_tipo']) > 0)
                                    <label for="medicao_succao_tipo">@lang('entregaTecnica.medicao_succao_tipo')</label>
                                    <select multiple="true" name="tags[]" id="tagSelector" class="form-control telo5ce">
                                        @foreach ($succao_tipo as $item)
                                            <option value="{{ $item }}" {{ $item == $item ? 'selected' : '' }} > {{ $item }}</option>
                                        @endforeach
                                    </select>       
                                @else
                                    <label for="medicao_succao_tipo">@lang('entregaTecnica.medicao_succao_tipo')</label>
                                    <select multiple="true" name="tags[]" id="tagSelector" class="form-control telo5ce">
                                        <option value="Flange">@lang('entregaTecnica.flange')</option>
                                        <option value="Engate Rápido">@lang('entregaTecnica.engate_rapido')</option>
                                    </select>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-3 telo5ce no-gutters">
                                <div class="form-group col-md-12">
                                    <label for="medicao_succao_e">@lang('entregaTecnica.medicao_succao_e')</label>
                                    <input type="number" id="medicao_succao_e" class="form-control mb-4" name="medicao_succao_e" maxlength="20" value="{{ $succao['medicao_succao_e'] }}">
                                    <em class="input-unidade">@lang('unidadesAcoes._m')</em>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="medicao_succao_diametro">@lang('entregaTecnica.medicao_succao_diametro')</label>
                                    <input type="number" id="medicao_succao_diametro" class="form-control mb-4" name="medicao_succao_diametro" maxlength="20" value="{{ $succao['medicao_succao_diametro'] }}">
                                    <em class="input-unidade">@lang('unidadesAcoes._pol')</em>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="tipo_tubo_succao">@lang('afericao.tipoCano')</label>
                                    <select name="tipo_tubo_succao" id="tipo_tubo_succao" class="form-control telo5ce">
                                        <option value=""></option>
                                        @foreach ($tubos as $item)
                                            <option value="{{ $item['tipo'] }}" {{ $item['tipo'] == $succao['tipo_tubo_succao'] ? 'selected' : '' }} > {{ __('listas.' . $item['tipo'] ) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>          

                </div>
            </div>
        </form>


@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js" integrity="sha512-UR25UO94eTnCVwjbXozyeVd6ZqpaAE9naiEUBK/A+QDbfSTQFhPGj5lOR6d8tsgbBk84Ggb5A3EkjsOgPRPcKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <script>
        $(document).ready(function() {
            
            imgSalvaBD();

            $("#alert").fadeIn(300).delay(2000).fadeOut(400);

            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });  

            /* modificação para botão salvar sair */
            $('#saveoutbutton').on('click', function() {  
                $("#savebuttonvalue").val("saveout");
                $('#formdados').submit();
            });   
               
            $(".abrirModal").click(function() {
                var url = $(this).attr("src");
                $("#modal img").attr("src", url);
                $("#modal").modal("show");
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
      
        function imgSalvaBD() {
            var img_auxiliar = $('#succao_auxiliar_existente').val();
            var img_succao = $('#succao_existente').val();

            switch (img_succao) {
                case 'direta':
                    $('#direta').show();
                    $('#myImg').hide();
                    $('#afogada').hide();
                    $('#pocos').hide();
                    $('#submersa').hide();
                    $('#balsa').hide();
                    break;
                case 'afogada':
                    $('#afogada').show();
                    $('#myImg').hide();
                    $('#direta').hide();
                    $('#pocos').hide();
                    $('#submersa').hide();
                    $('#balsa').hide();
                    break;
                case 'pocos':
                    $('#pocos').show();
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
                    $('#pocos').hide();
                    $('#submersa').hide();                   
            }            

            switch (img_auxiliar) {                
                    case 'submersa': 
                        $('#submersa').show();
                        $('#myImg').hide();
                        $('#direta').hide();
                        $('#afogada').hide();
                        $('#pocos').hide();
                        $('#balsa').hide();
                        break;
                    case  'balsa': 
                        $('#balsa').show();
                        $('#myImg').hide();
                        $('#direta').hide();
                        $('#afogada').hide();
                        $('#pocos').hide();
                        $('#submersa').hide();
                        break;
                }
        }
    </script>
@endsection
