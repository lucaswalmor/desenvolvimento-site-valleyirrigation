 @extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang("entregaTecnica.testes") - @lang('entregaTecnica.cadastrar')</h4>
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
            <a class="nav-link active" id="torre_central-tab" data-toggle="tab" href="#torre_central" role="tab"
                aria-controls="torre_central" aria-selected="true">@lang("entregaTecnica.tc_vel")</a>
        </li>          
        @foreach ($bombas as $item)
            <li class='nav-item' id='liBombas-{{ $item['id_bomba'] }}'>
                <a class="nav-link" id="bombas-{{ $item['id_bomba'] }}-tab " data-toggle="tab"
                    href="#bomba-{{ $item['id_bomba'] }}" role="tab" aria-controls="bomba_{{ $item['id_bomba'] }}"
                    aria-selected="true"> @lang("afericao.afericoes") - {{ $item['id_bomba'] }}</a>
            </li>
        @endforeach
    </ul>
    
    {{-- FORMULARIO DE CADASTRO --}}
    <form action="{{ route('save_technical_delivery_tests') }}" method="post" class="mt-3" id="formdados" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{ $id_entrega_tecnica }}">
        <!-- modificação para botão salvar sair -->
        <input type="hidden" name="savebuttonvalue" id="savebuttonvalue" value="save">
        <div id="alert">
            @include('_layouts._includes._alert')
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active formcdc" id="torre_central" role="tabpanel" aria-labelledby="torre_central-tab">
                <div class="col-md-12" id="cssPreloader">
                    {{-- TESTES TORRE CENTRAL --}}
                    <div class="table-responsive m-auto tabela">
                        <div class="table mx-auto">
                            <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                <thead class="headertable">
                                    <tr class="text-center">
                                        <th colspan="2">@lang('entregaTecnica.tensao_rs')</th>
                                        <th>@lang('entregaTecnica.tensao_st')</th>
                                        <th>@lang('entregaTecnica.tensao_rt')</th>
                                    </tr>
                                </thead>
                                <tbody class="campos_tabela">
                                    <input type="hidden" name="imagens_tc[]" id="imagens_tc" class="form-control">
                                    @foreach ($dados_tc as $item) 
                                        <input type="hidden" name="id_testee_tc" id="id_testee_tc" value="{{ $item['id_testee_tc'] }}">
                                        <tr>                                               
                                            <td>@lang('entregaTecnica.tensao_sem_carga')</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="campos_tensao col-10">
                                                        <input type="number" name="tensao_rs_semcarga_tc" id="tensao_rs_semcarga_tc" class="form-control" value="{{ $item['tensao_rs_semcarga'] }}">
                                                        <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                        <label for="tensao_rs_semcarga_img" id="lbtensao_rs_semcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                        <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_semcarga_img_tc" id="tensao_rs_semcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                    </div>    
                                                    <div>
                                                        @if (count($item['tensao_rs_semcarga_img']) > 0)
                                                            <img src="{{ asset('storage/'. $item['tensao_rs_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_semcarga_preview" data-imgval="{{ $item['tensao_rs_semcarga_img'] }}" />   
                                                           @else                                                             
                                                            <img id="tensao_rs_semcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="campos_tensao col-10">
                                                        <input type="number" name="tensao_st_semcarga_tc" id="tensao_st_semcarga_tc" class="form-control" value="{{ $item['tensao_st_semcarga'] }}">
                                                        <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                        <label for="tensao_st_semcarga_img" id="lbtensao_st_semcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                        <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_semcarga_img_tc" id="tensao_st_semcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                    </div>
    
                                                    <div>                                                            
                                                        @if (count($item['tensao_st_semcarga_img']) > 0)
                                                            <img src="{{ asset('storage/'. $item['tensao_st_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_semcarga_preview" data-imgval="{{ $item['tensao_st_semcarga_img'] }}" />   
                                                        @else                                                             
                                                            <img id="tensao_st_semcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="campos_tensao col-10">
                                                        <input type="number" name="tensao_rt_semcarga_tc" id="tensao_rt_semcarga" class="form-control" value="{{ $item['tensao_rt_semcarga'] }}">
                                                        <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                        <label for="tensao_rt_semcarga_img" id="lbtensao_rt_semcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                        <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_semcarga_img_tc" id="tensao_rt_semcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                    </div>
    
                                                    <div>                                                            
                                                        @if (count($item['tensao_rt_semcarga_img']) > 0)
                                                            <img src="{{ asset('storage/'. $item['tensao_rt_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_semcarga_preview" data-imgval="{{ $item['tensao_rt_semcarga_img'] }}" />   
                                                        @else                                                             
                                                            <img id="tensao_rt_semcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>@lang('entregaTecnica.tensao_com_carga')</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="campos_tensao col-10">
                                                        <input type="number" name="tensao_rs_comcarga_tc" id="tensao_rs_comcarga" class="form-control" value="{{ $item['tensao_rs_comcarga'] }}">
                                                        <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                        <label for="tensao_rs_comcarga_img" id="lbtensao_rs_comcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                        <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_comcarga_img_tc" id="tensao_rs_comcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                    </div>
    
                                                    <div>                                                           
                                                        @if (count($item['tensao_rs_comcarga_img']) > 0)
                                                            <img src="{{ asset('storage/'. $item['tensao_rs_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_comcarga_preview" data-imgval="{{ $item['tensao_rs_comcarga_img'] }}" />   
                                                        
                                                        @else                                                             
                                                            <img id="tensao_rs_comcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="campos_tensao col-10">
                                                        <input type="number" name="tensao_st_comcarga_tc" id="tensao_st_comcarga" class="form-control" value="{{ $item['tensao_st_comcarga'] }}">
                                                        <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                        <label for="tensao_st_comcarga_img" id="lbtensao_st_comcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                        <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_comcarga_img_tc" id="tensao_st_comcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                    </div>
    
                                                    <div>
    
                                                        <div>                                                           
                                                            @if (count($item['tensao_st_comcarga_img']) > 0)
                                                                <img src="{{ asset('storage/'. $item['tensao_st_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_comcarga_preview" data-imgval="{{ $item['tensao_st_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_st_comcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="campos_tensao col-10">
                                                        <input type="number" name="tensao_rt_comcarga_tc" id="tensao_rt_comcarga" class="form-control" value="{{ $item['tensao_rt_comcarga'] }}">
                                                        <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                        <label for="tensao_rt_comcarga_img" id="lbtensao_rt_comcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                        <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_comcarga_img_tc" id="tensao_rt_comcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                    </div>
    
                                                    <div>
                                                        @if (count($item['tensao_rt_comcarga_img']) > 0)
                                                            <img src="{{ asset('storage/'. $item['tensao_rt_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_comcarga_preview" data-imgval="{{ $item['tensao_rt_comcarga_img'] }}" />   
                                                        @else                                                             
                                                            <img id="tensao_rt_comcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
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
                                </tfoot>
                            </table>
                        </div>
                    </div>   

                    {{-- TESTE MOBOTOMBA --}}
                    <div class="table-responsive m-auto tabela">
                        <div class="table mx-auto">
                            <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                <thead class="headertable">
                                    <tr class="text-center">
                                        {{-- <th>@lang('entregaTecnica.pressoes')</th> --}}
                                        <th colspan="2"></th>
                                        <th>@lang('entregaTecnica.pressao_centro')</th>
                                        <th>@lang('entregaTecnica.pressao_balanco')</th>
                                    </tr>
                                </thead>
                                <tbody class="campos_tabela">
                                        <tr>
                                                
                                                <td colspan="2">
                                                    <span style="font-size: 15px;"><strong>@lang('entregaTecnica.pressoes')</strong></span><br>
                                                    <span>@lang('entregaTecnica.pressao_motobomba')</span>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="pressao_centro" id="pressao_centro_{{$h}}" class="form-control" value="{{ $teste_bomba[0]['pressao_centro'] }}">
                                                            <em class="input-ts-unidade">@lang('unidadesAcoes._kgf/cm²')</em>
                                                            <label for="pressao_centro_img_{{$h}}" id="lbpressao_centro_img_{{$h}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_centro_img" id="pressao_centro_img_{{$h}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div>
                                                            @if (count($teste_bomba[0]['pressao_centro_img']) > 0)
                                                                <img src="{{ asset('storage/'. $teste_bomba[0]['pressao_centro_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_centro_preview_{{$h}}" data-imgval="{{ $teste_bomba[0]['pressao_centro_img'] }}" />   
                                                            @else                                                             
                                                                <img id="pressao_centro_preview_{{$h}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="pressao_ult_torre" id="pressao_ult_torre_{{$h}}" class="form-control" value="{{ $teste_bomba[1]['pressao_ult_torre'] }}">
                                                            <em class="input-ts-unidade">@lang('unidadesAcoes._kgf/cm²')</em>
                                                            <label for="pressao_ult_torre_img_{{$h}}" id="lbpressao_ult_torre_img_{{$h}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_ult_torre_img" id="pressao_ult_torre_img_{{$h}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div> 
                                                            @if (count($teste_bomba[1]['pressao_ult_torre_img']) > 0)
                                                                <img src="{{ asset('storage/'. $teste_bomba[1]['pressao_ult_torre_img']) }}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_ult_torre_preview_{{$h}}" data-imgval="{{ $teste_bomba[1]['pressao_ult_torre_img'] }}" />   
                                                            @else                                                             
                                                                <img id="pressao_ult_torre_preview_{{$h}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                        </tr> 
                                </tbody>
                                <tfoot>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="form-row justify-content-start">                            
                        <div class="form-group ml-3 col-md-3 telo5ce">
                            <div class="form-group">
                                <label for="velocidade_ult_torre">@lang('entregaTecnica.velocidade_ult_torre')</label>
                                <input type="number" class="form-control" name="velocidade_ult_torre" id="velocidade_ult_torre" value="{{ $velocidade['velocidade_ult_torre'] }}" required>
                                <em class="input-ts2-unidade">@lang('unidadesAcoes._m/h')</em>
                            </div>
                        </div>
                        <div class="form-group col-md-2 telo5ce">
                            <div class="form-group">
                                <label for="leitura_horímetro">@lang('entregaTecnica.leitura_horímetro')</label>
                                <input type="number" class="form-control" name="leitura_horímetro" id="leitura_horímetro" value="{{ $velocidade['leitura_horímetro']}}" required>
                                <em class="input-ts2-unidade">@lang('unidadesAcoes._h')</em>
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
                                        <img src="{{ asset('storage/'. $velocidade['leitura_horímetro_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="leitura_horímetro_preview" data-imgval="{{ $velocidade['leitura_horímetro_img'] }}" />   
                                    @else                                                             
                                        <img id="leitura_horímetro_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
            @foreach ($bombas as $bomba)
                <div class="tab-pane fade" id="bomba-{{ $bomba['id_bomba'] }}" role="tabpanel" aria-labelledby="bomba_{{ $bomba['id_bomba'] }}" >
                    <div class="col-md-12" id="cssPreloader">
                        {{-- TESTE MOBOTOMBA --}}
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th>@lang('entregaTecnica.teste_bomba')</th>
                                            <th></th>
                                            <th>@lang('entregaTecnica.registro_fechado')</th>
                                            <th>@lang('entregaTecnica.registro_aberto')</th>
                                        </tr>
                                    </thead>
                                    <tbody class="campos_tabela">
                                        @foreach ($teste_bomba as $item)
                                            @if ($item['id_testeh_mb'] == $bomba['id_bomba'])                                                
                                                @php 
                                                    $h = $bomba['id_bomba'];
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <span>@lang('entregaTecnica.bomba') - {{ $bomba['id_bomba'] }}</span><br>
                                                        <span>@lang('entregaTecnica.pressao_motobomba')</span>
                                                    </td>
                                                    <td class="acoes"></td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="pressao_reg_fechado_{{$h}}" id="pressao_reg_fechado_{{$h}}" class="form-control" value="{{ $item['pressao_reg_fechado'] ?? '' }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._kgf/cm²')</em>
                                                                <label for="pressao_reg_fechado_img_{{$h}}" id="lbpressao_reg_fechado_img_{{$h}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_reg_fechado_img_{{$h}}" id="pressao_reg_fechado_img_{{$h}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>    
                                                            <div>
                                                                @if (count($item['pressao_reg_fechado_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['pressao_reg_fechado_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_reg_fechado_preview_{{$h}}" data-imgval="{{ $item['pressao_reg_fechado_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="pressao_reg_fechado_preview_{{$h}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="pressao_reg_aberto_{{$h}}" id="pressao_reg_aberto" class="form-control" value="{{ $item['pressao_reg_aberto'] ?? '' }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._kgf/cm²')</em>
                                                                <label for="pressao_reg_aberto_img_{{$h}}" id="lbpressao_reg_aberto_img_{{$h}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="pressao_reg_aberto_img_{{$h}}" id="pressao_reg_aberto_img_{{$h}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>    
                                                            <div>
                                                                @if (count($item['pressao_reg_aberto_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['pressao_reg_aberto_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="pressao_reg_aberto_preview_{{$h}}" data-imgval="{{ $item['pressao_reg_aberto_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="pressao_reg_aberto_preview_{{$h}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>                                                                       
                                                </tr> 
                                            @endif
                                        @endforeach           
                                    </tbody>
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        {{-- TESTES CHAVE DE PARTIDA --}}
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th>@lang('entregaTecnica.teste_chave_partida')</th>
                                            <th></th>
                                            <th>@lang('entregaTecnica.tensao_rs')</th>
                                            <th>@lang('entregaTecnica.tensao_st')</th>
                                            <th>@lang('entregaTecnica.tensao_rt')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($total_chave_partida as $item)
                                            @if ($item['id_bomba'] == $bomba['id_bomba'])

                                                @php 
                                                    $b = $item['id_bomba'];
                                                    $m = $item['id_motor'];
                                                    $i = $item['id_chave_partida'];
                                                @endphp

                                                <input type="hidden" name="id_bomba_{{$b}}" id="id_bomba_{{$b}}" value="{{ $item['id_bomba']}}">
                                                <input type="hidden" name="id_motor_{{$b}}_{{$m}}" id="id_motor_{{$b}}_{{$m}}" value="{{ $item['id_motor']}}">
                                                <input type="hidden" name="id_chave_partida_{{$b}}_{{$m}}_{{$i}}" id="id_chave_partida_{{$b}}_{{$m}}_{{$i}}" value="{{ $item['id_chave_partida'] }}">
                                                
                                                <tr>                                                                    
                                                    <td rowspan="3" class="align-middle">
                                                        <span>@lang('entregaTecnica.bomba') - {{ $item['id_bomba'] }}</span><br>
                                                        <span>@lang('entregaTecnica.motor') - {{ $item['id_motor'] }}</span><br>
                                                        <span>@lang('entregaTecnica.chave_partida') - {{ $item['id_chave_partida'] }}</span>
                                                    </td>
                                                    <td class="align-middle">@lang('entregaTecnica.tensao_sem_carga')</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="tensao_rs_semcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rs_semcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['tensao_rs_semcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="tensao_rs_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbtensao_rs_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rs_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['tensao_rs_semcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['tensao_rs_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_semcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['tensao_rs_semcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="tensao_rs_semcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="tensao_st_semcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="tensao_st_semcarga_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['tensao_st_semcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="tensao_st_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}"  id="lbtensao_st_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="tensao_st_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['tensao_st_semcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['tensao_st_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_semcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['tensao_st_semcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="tensao_st_semcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="tensao_rt_semcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rt_semcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['tensao_rt_semcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="tensao_rt_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbtensao_rt_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rt_semcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['tensao_rt_semcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['tensao_rt_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_semcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['tensao_rt_semcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="tensao_rt_semcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td class="align-middle">@lang('entregaTecnica.tensao_com_carga')</td>                                                
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="tensao_rs_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rs_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['tensao_rs_comcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="tensao_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbtensao_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['tensao_rs_comcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['tensao_rs_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['tensao_rs_comcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="tensao_rs_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="tensao_st_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="tensao_st_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['tensao_st_comcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="tensao_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbtensao_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="tensao_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['tensao_st_comcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['tensao_st_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['tensao_st_comcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="tensao_st_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="tensao_rt_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rt_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['tensao_rt_comcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="tensao_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbtensao_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="tensao_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['tensao_rt_comcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['tensao_rt_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['tensao_rt_comcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="tensao_rt_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="align-middle">@lang('entregaTecnica.corrente')</td>                   
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="corrente_rs_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="corrente_rs_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['corrente_rs_comcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="corrente_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbcorrente_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="corrente_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="corrente_rs_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['corrente_rs_comcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['corrente_rs_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="corrente_rs_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['corrente_rs_comcarga_img'] }}" />   
                                                                @else
                                                                    <img id="corrente_rs_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>                   
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="corrente_st_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="corrente_st_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['corrente_st_comcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="corrente_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbcorrente_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="corrente_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="corrente_st_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['corrente_st_comcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['corrente_st_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="corrente_st_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['corrente_st_comcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="corrente_st_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>                   
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <div class="campos_tensao col-10">
                                                                <input type="number" name="corrente_rt_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" id="corrente_rt_comcarga_cp_0{{$b}}_{{$m}}_{{$i}}" class="form-control" value="{{ $item['corrente_rt_comcarga'] }}">
                                                                <em class="input-ts-unidade">@lang('unidadesAcoes._v')</em>
                                                                <label for="corrente_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="lbcorrente_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                                <input type="file" onchange="myfn(this)" style="display: none;" name="corrente_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" id="corrente_rt_comcarga_cp_img_0{{$b}}_{{$m}}_{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                            </div>
            
                                                            <div>
                                                                @if (count($item['corrente_rt_comcarga_img']) > 0)
                                                                    <img src="{{ asset('storage/'. $item['corrente_rt_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="corrente_rt_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" data-imgval="{{ $item['corrente_rt_comcarga_img'] }}" />   
                                                                @else                                                             
                                                                    <img id="corrente_rt_comcarga_cp_preview_0{{$b}}_{{$m}}_{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>                                                
                                                </tr>

                                            @endif

                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <!-- Modal imagens torre central -->
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
                        @foreach ($dados_tc as $item)
                            @if (count($item) > 0)
                                <img src="{{ asset('storage/')}}" class="img_modal">
                            @else                                        
                                <img src="" class="img_modal"/>                                   
                            @endif
                        @endforeach
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
            
            var valor_imagem = $("#" + imagem_modal.id).data("imgval");
            var name_lang;
            var src_img = $(imagem_modal).attr("src");
            
            var id_img = $(imagem_modal).attr("id");
            var id_img_cp = $(imagem_modal).attr("id").substring(29);
            $('#modal_').attr('id', id_img);

            $('#modal_img_testes_').attr('id', 'modal_img_testes_' + id_img);
            $('#modal_label_').attr('id', 'modal_label_' + id_img);

            switch (id_img) {
                case 'tensao_rs_semcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_rs_sem_carga")';
                    break;
                case 'tensao_st_semcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_st_sem_carga")';
                    break;
                case 'tensao_rt_semcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_rt_sem_carga")';
                    break;
                case 'tensao_rs_comcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_rs_com_carga")';
                    break;
                case 'tensao_st_comcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_st_com_carga")';
                    break;
                case 'tensao_rt_comcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_st_com_carga")';
                    break;

                case 'tensao_rs_semcarga_cp_preview' + id_img_cp: 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_rs_sem_carga")';
                    break;
                case 'tensao_st_semcarga_cp_preview' + id_img_cp: 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_st_sem_carga")';
                    break;
                case 'tensao_rt_semcarga_cp_preview' + id_img_cp: 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_rt_sem_carga")';
                    break;
                case 'tensao_rs_comcarga_cp_preview' + id_img_cp: 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_rs_com_carga")';
                    break;
                case 'tensao_st_comcarga_cp_preview' + id_img_cp: 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_st_com_carga")';
                    break;
                case 'tensao_rt_comcarga_cp_preview' + id_img_cp: 
                    name_lang = '@lang("entregaTecnica.imagem_tensao_st_com_carga")';
                    break;

                case 'corrente_rs_comcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_corrente_rs_com_carga")';
                    break;
                case 'corrente_st_comcarga_preview': 
                    name_lang = '@lang("entregaTecnica.imagem_corrente_st_com_carga")';
                    break;
                default :
                    name_lang = '@lang("entregaTecnica.imagem_corrente_rt_com_carga")';
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

            /* modificação para botão salvar sair */
            $('#saveoutbutton').on('click', function() {  
                $("#savebuttonvalue").val("saveout");
                $('#formdados').submit();
            });   
        });
</script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
