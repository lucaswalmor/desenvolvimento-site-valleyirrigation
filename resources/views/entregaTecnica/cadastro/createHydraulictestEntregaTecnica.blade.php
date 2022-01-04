@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('comum.cadastrar')</h4>
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
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
        {{-- NAVTAB'S --}}
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.teste_hidraulico')</a>
            </li>
        </ul>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_test_hidraulic') }}" method="post" class="mt-3" id="formdados" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>        
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf
                    <div class="col-md-12" id="cssPreloader">
                        
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th>@lang('entregaTecnica.chave_partida')</th>
                                            <th></th>
                                            <th>@lang('entregaTecnica.registro_fechado')</th>
                                            <th>@lang('entregaTecnica.registro_aberto')</th>
                                            <th>@lang('entregaTecnica.pressao_centro')</th>
                                            <th>@lang('entregaTecnica.pressao_balanco')</th>
                                        </tr>
                                    </thead>
                                    <tbody class="campos_tabela">
                                        @foreach ($bombas as $item)
                                            @php 
                                                $i = $item['id_bomba'];
                                            @endphp

                                            <input type="hidden" name="id_testeh_mb_1" id="id_testeh_mb" value="{{ $item['id_testeh_mb'] }}">
                                            <input type="hidden" name="id_testeh_mb_2" id="id_testeh_mb" value="{{ $item['id_testeh_mb'] }}">
                                            <input type="hidden" name="id_testeh_mb_3" id="id_testeh_mb" value="{{ $item['id_testeh_mb'] }}">



                                            <input type="hidden" name="id_testeh_mb[]" id="id_testeh_mb" value="{{ $item['id_testeh_mb'] }}">
                                            <input type="hidden" name="id_bomba[]" id="id_bomba{{$i}}" value="{{ $item['id_bomba'] }}">
                                            <tr>
                                                <td><span>@lang('entregaTecnica.bomba') - {{ $item['id_bomba'] }}</span></td>
                                                <td>@lang('entregaTecnica.pressao_motobomba')</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="pressao_reg_fechado{{$i}}" id="pressao_reg_fechado{{$i}}" class="form-control" value="{{ $item['pressao_reg_fechado'] }}">
                                                            <label for="pressao_reg_fechado_img{{$i}}" id="lbpressao_reg_fechado_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_reg_fechado_img{{$i}}" id="pressao_reg_fechado_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div>
                                                            @if (count($item['pressao_reg_fechado_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['pressao_reg_fechado_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_reg_fechado_preview{{$i}}" data-imgval="{{ $item['pressao_reg_fechado_img'] }}" />   
                                                            @else                                                             
                                                                <img id="pressao_reg_fechado_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="pressao_reg_aberto{{$i}}" id="pressao_reg_aberto" class="form-control" value="{{ $item['pressao_reg_aberto'] }}">
                                                            <label for="pressao_reg_aberto_img{{$i}}" id="lbpressao_reg_aberto_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_reg_aberto_img{{$i}}" id="pressao_reg_aberto_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div>
                                                            @if (count($item['pressao_reg_aberto_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['pressao_reg_aberto_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_reg_aberto_preview{{$i}}" data-imgval="{{ $item['pressao_reg_aberto_img'] }}" />   
                                                            @else                                                             
                                                                <img id="pressao_reg_aberto_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="pressao_centro{{$i}}" id="pressao_centro{{$i}}" class="form-control" value="{{ $item['pressao_centro'] }}">
                                                            <label for="pressao_centro_img{{$i}}" id="lbpressao_centro_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_centro_img{{$i}}" id="pressao_centro_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div>
                                                            @if (count($item['pressao_centro_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['pressao_centro_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_centro_preview{{$i}}" data-imgval="{{ $item['pressao_centro_img'] }}" />   
                                                            @else                                                             
                                                                <img id="pressao_centro_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="pressao_ult_torre{{$i}}" id="pressao_ult_torre{{$i}}" class="form-control" value="{{ $item['pressao_ult_torre'] }}">
                                                            <label for="pressao_ult_torre_img{{$i}}" id="lbpressao_ult_torre_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_ult_torre_img{{$i}}" id="pressao_ult_torre_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div>
                                                            @if (count($item['pressao_ult_torre_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['pressao_ult_torre_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_ult_torre_preview{{$i}}" data-imgval="{{ $item['pressao_ult_torre_img'] }}" />   
                                                            @else                                                             
                                                                <img id="pressao_ult_torre_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-2 telo5ce">
                                <div class="form-group">
                                    <label for="velocidade_ult_torre">@lang('entregaTecnica.velocidade_ult_torre') (M / H)</label>
                                    <input type="number" class="form-control" name="velocidade_ult_torre" id="velocidade_ult_torre" value="{{ $velocidade['velocidade_ult_torre'] }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-2 telo5ce">
                                <div class="form-group">
                                    <label for="leitura_horímetro">@lang('entregaTecnica.leitura_horímetro') (H)</label>
                                    <input type="number" class="form-control" name="leitura_horímetro" id="leitura_horímetro" value="{{ $velocidade['leitura_horímetro']}}" required>
                                </div>
                            </div>
                            
                            <div class="form-group col-md-4 ">                                
                                <div class="d-flex justify-content-start">
                                    <div class="campos_tensao col-6">
                                        <label for="leitura_horímetro_img" id="lbleitura_horímetro_img" class="label_input_file_horimetro">@lang('entregaTecnica.carregar_imagem')</label>
                                        <input type="file" onchange="myfn(this)" style="display: none;" name="leitura_horímetro_img" id="leitura_horímetro_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                    </div>    
                                    <div>
                                        @if (count($velocidade['leitura_horímetro_img']) > 0)
                                            <img src="{{ asset('../storage/app/public/'. $velocidade['leitura_horímetro_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="leitura_horímetro_preview" data-imgval="{{ $velocidade['leitura_horímetro_img'] }}" />   
                                        @else                                                             
                                            <img id="leitura_horímetro_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal img horimetro-->
                        <div class="modal fade" id="modal_img_testes_" tabindex="-1" role="dialog" aria-labelledby="modal_img_testes_Label">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal_label_"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                            @if (!empty($velocidade['leitura_horímetro_img']))
                                                <img src="{{ asset('../storage/app/public/')}}" class="img_modal">
                                            @else                                        
                                                <img src="" class="img_modal"/>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            {{-- BOTOES PARA SALVAR --}}
            <div class="row justify-content-center botaoAfericao mb-4" id="botoesSalvar">
                <button class="proximo ml-2" type="" name="botao" value="sair" style="margin-top: 10px;"
                    id="botaosalvar">@lang('unidadesAcoes.salvar')</button>
            </div>
        </form>


@endsection

@section('scripts')
{{-- VALIDAÇÕES DE CAMPOS --}}
<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
<script> 
        function myfn(myinput) {
            var name = $(myinput).attr("name");
            var id = $(myinput).attr("id");
            var val = $(myinput).val();
            switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png': case 'jpeg':
                    readURL(myinput);
                    break;
                default:
                    $(this).val('');
                    break;
            }
        }

        function readURL(myinput) {
            var id_image = $(myinput).attr("id").replace("img", "preview");
            var id_label = 'lb' + $(myinput).attr("id");
            if (myinput.files && myinput.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#' + id_image).attr('src', e.target.result);
                    $('#' + id_image).css('background-image', 'none');                    
                    $('#' + id_label ).html(' @lang("entregaTecnica.alterar_imagem") ');
                }
                
                reader.readAsDataURL(myinput.files[0]);
            }
        }

        function expandImage(imagem_modal) {
            
            var name_lang;
            var src_img = $(imagem_modal).attr("src");
            var id_img = $(imagem_modal).attr("id");            
            
            $('#modal_').attr('id', id_img);

            $('#modal_img_testes_').attr('id', 'modal_img_testes_' + id_img);
            $('#modal_label_').attr('id', 'modal_label_' + id_img);
            
            switch (id_img) {
                case 'pressao_reg_fechado_preview': 
                    name_lang = '@lang("entregaTecnica.com_registro_fechado")';
                    break;
                case 'pressao_reg_aberto_preview': 
                    name_lang = '@lang("entregaTecnica.com_registro_aberto")';
                    break;
                case 'pressao_centro_preview': 
                    name_lang = '@lang("entregaTecnica.pressao_centro")';
                    break;
                case 'pressao_ult_torre_preview': 
                    name_lang = '@lang("entregaTecnica.pressao_balanco")';
                    break;
            }

            $('#modal_label_' + id_img).text(name_lang);
            
            $("#modal_img_testes_"+ id_img + " img").attr("src", src_img);

            $("#modal_img_testes_" + id_img).modal("show");

            $("#modal_img_testes_" + id_img).on('hidden.bs.modal', function(){
                $('#modal_img_testes_' + id_img).attr('id', 'modal_img_testes_');
                $("#modal_img_testes_ img").attr("src", '');
                $('#modal_label_' + id_img).attr('id', 'modal_label_');
                $('#modal_label_' + id_img).text('');          
            });
        }

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