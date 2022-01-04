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
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.teste_eletrico')</a>
            </li>
        </ul>
        
        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_test_eletric') }}" method="post" class="mt-3" id="formdados" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{$id_entrega_tecnica}}">
            <div id="alert">                
                @include('_layouts._includes._alert')    
            </div>        
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf
                    <div class="col-md-12" id="cssPreloader">
                        <input type="hidden" name="id_testee_tc[]" id="id_testee_tc" value="{{ $dados_tc['id_testee_tc'] }}">
                        {{-- TESTES TORRE CENTRAL --}}
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th>@lang('entregaTecnica.torre_central')</th>
                                            <th></th>
                                            <th>@lang('entregaTecnica.tensao_rs')</th>
                                            <th>@lang('entregaTecnica.tensao_st')</th>
                                            <th>@lang('entregaTecnica.tensao_rt')</th>
                                        </tr>
                                    </thead>
                                    <tbody class="campos_tabela">
                                        <input type="hidden" name="imagens_tc[]" id="imagens_tc" class="form-control">
                                        <tr>
                                            @foreach ($dados_tc as $item)                                                
                                                <td rowspan="2"><span>@lang('entregaTecnica.torre_central')</span></td>
                                                <td>@lang('entregaTecnica.tensao_sem_carga')</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_rs_semcarga" id="tensao_rs_semcarga" class="form-control" value="{{ $item['tensao_rs_semcarga'] }}">
                                                            <label for="tensao_rs_semcarga_img" id="lbtensao_rs_semcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_semcarga_img" id="tensao_rs_semcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>    
                                                        <div>
                                                            @if (count($item['tensao_rs_semcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rs_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_semcarga_preview" data-imgval="{{ $item['tensao_rs_semcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rs_semcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_st_semcarga" id="tensao_st_semcarga" class="form-control" value="{{ $item['tensao_st_semcarga'] }}">
                                                            <label for="tensao_st_semcarga_img" id="lbtensao_st_semcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_semcarga_img" id="tensao_st_semcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            
                                                            @if (count($item['tensao_st_semcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_st_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_semcarga_preview" data-imgval="{{ $item['tensao_st_semcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_st_semcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_rt_semcarga" id="tensao_rt_semcarga" class="form-control" value="{{ $item['tensao_rt_semcarga'] }}">
                                                            <label for="tensao_rt_semcarga_img" id="lbtensao_rt_semcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_semcarga_img" id="tensao_rt_semcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>                                                            
                                                            @if (count($item['tensao_rt_semcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rt_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_semcarga_preview" data-imgval="{{ $item['tensao_rt_semcarga_img'] }}" />   
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
                                                            <input type="number" name="tensao_rs_comcarga" id="tensao_rs_comcarga" class="form-control" value="{{ $item['tensao_rs_comcarga'] }}">
                                                            <label for="tensao_rs_comcarga_img" id="lbtensao_rs_comcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_comcarga_img" id="tensao_rs_comcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>                                                           
                                                            @if (count($item['tensao_rs_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rs_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_comcarga_preview" data-imgval="{{ $item['tensao_rs_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rs_comcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_st_comcarga" id="tensao_st_comcarga" class="form-control" value="{{ $item['tensao_st_comcarga'] }}">
                                                            <label for="tensao_st_comcarga_img" id="lbtensao_st_comcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_comcarga_img" id="tensao_st_comcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
        
                                                            <div>                                                           
                                                                @if (count($item['tensao_st_comcarga_img']) > 0)
                                                                    <img src="{{ asset('../storage/app/public/'. $item['tensao_st_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_comcarga_preview" data-imgval="{{ $item['tensao_st_comcarga_img'] }}" />   
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
                                                            <input type="number" name="tensao_rt_comcarga" id="tensao_rt_comcarga" class="form-control" value="{{ $item['tensao_rt_comcarga'] }}">
                                                            <label for="tensao_rt_comcarga_img" id="lbtensao_rt_comcarga_img" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_comcarga_img" id="tensao_rt_comcarga_img" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_rt_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rt_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_comcarga_preview" data-imgval="{{ $item['tensao_rt_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rt_comcarga_preview" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
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


                        {{-- TESTES CHAVE DE PARTIDA --}}
                        <div class="table-responsive m-auto tabela">
                            <div class="table mx-auto">
                                <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                    <thead class="headertable">
                                        <tr class="text-center">
                                            <th>@lang('entregaTecnica.chave_partida')</th>
                                            <th></th>
                                            <th>@lang('entregaTecnica.tensao_rs')</th>
                                            <th>@lang('entregaTecnica.tensao_st')</th>
                                            <th>@lang('entregaTecnica.tensao_rt')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chave_partida_testes as $item)

                                            @php 
                                                $i = $item['id_chave_partida'];
                                            @endphp
                                            <input type="hidden" name="id_chave_partida[]" id="id_chave_partida{{$i}}" value="{{ $item['id_chave_partida']}}">
                                            <input type="hidden" name="id_testee_cp[]" id="id_testee_cp" value="{{ $item['id_testee_cp'] }}">
                                            <tr>
                                                <td rowspan="3" class="align-middle"><span>@lang('entregaTecnica.chave_partida') - {{ $item['id_chave_partida'] }}</span></td>
                                                <td class="align-middle">@lang('entregaTecnica.tensao_sem_carga')</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_rs_semcarga_cp_{{$i}}" id="tensao_rs_semcarga_cp_{{$i}}" class="form-control" value="{{ $item['tensao_rs_semcarga'] }}">
                                                            <label for="tensao_rs_semcarga_cp_img{{$i}}" id="lbtensao_rs_semcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_semcarga_cp_img{{$i}}" id="tensao_rs_semcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_rs_semcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rs_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_semcarga_cp_preview{{$i}}" data-imgval="{{ $item['tensao_rs_semcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rs_semcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_st_semcarga_cp_{{$i}}" id="tensao_st_semcarga_{{$i}}" class="form-control" value="{{ $item['tensao_st_semcarga'] }}">
                                                            <label for="tensao_st_semcarga_cp_img{{$i}}"  id="lbtensao_st_semcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_semcarga_cp_img{{$i}}" id="tensao_st_semcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_st_semcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_st_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_semcarga_cp_preview{{$i}}" data-imgval="{{ $item['tensao_st_semcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_st_semcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_rt_semcarga_cp_{{$i}}" id="tensao_rt_semcarga_cp_{{$i}}" class="form-control" value="{{ $item['tensao_rt_semcarga'] }}">
                                                            <label for="tensao_rt_semcarga_cp_img{{$i}}" id="lbtensao_rt_semcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_semcarga_cp_img{{$i}}" id="tensao_rt_semcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_rt_semcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rt_semcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_semcarga_cp_preview{{$i}}" data-imgval="{{ $item['tensao_rt_semcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rt_semcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
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
                                                            <input type="number" name="tensao_rs_comcarga_cp_{{$i}}" id="tensao_rs_comcarga_cp_{{$i}}" class="form-control" value="{{ $item['tensao_rs_comcarga'] }}">
                                                            <label for="tensao_rs_comcarga_cp_img{{$i}}" id="lbtensao_rs_comcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rs_comcarga_cp_img{{$i}}" id="tensao_rs_comcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_rs_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rs_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rs_comcarga_cp_preview{{$i}}" data-imgval="{{ $item['tensao_rs_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rs_comcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_st_comcarga_cp_{{$i}}" id="tensao_st_comcarga_cp_{{$i}}" class="form-control" value="{{ $item['tensao_st_comcarga'] }}">
                                                            <label for="tensao_st_comcarga_cp_img{{$i}}" id="lbtensao_st_comcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_st_comcarga_cp_img{{$i}}" id="tensao_st_comcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_st_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_st_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_st_comcarga_cp_preview{{$i}}" data-imgval="{{ $item['tensao_st_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_st_comcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="tensao_rt_comcarga_cp_{{$i}}" id="tensao_rt_comcarga_cp_{{$i}}" class="form-control" value="{{ $item['tensao_rt_comcarga'] }}">
                                                            <label for="tensao_rt_comcarga_cp_img{{$i}}" id="lbtensao_rt_comcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="tensao_rt_comcarga_cp_img{{$i}}" id="tensao_rt_comcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['tensao_rt_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['tensao_rt_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="tensao_rt_comcarga_cp_preview{{$i}}" data-imgval="{{ $item['tensao_rt_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="tensao_rt_comcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
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
                                                            <input type="number" name="corrente_rs_comcarga_cp_{{$i}}" id="corrente_rs_comcarga_cp_{{$i}}" class="form-control" value="{{ $item['corrente_rs_comcarga'] }}">
                                                            <label for="corrente_rs_comcarga_cp_img{{$i}}" id="lbcorrente_rs_comcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="corrente_rs_comcarga_cp_img{{$i}}" id="corrente_rs_comcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['corrente_rs_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['corrente_rs_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="corrente_rs_comcarga_cp_preview{{$i}}" data-imgval="{{ $item['corrente_rs_comcarga_img'] }}" />   
                                                            @else
                                                                <img id="corrente_rs_comcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>                   
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="corrente_st_comcarga_cp_{{$i}}" id="corrente_st_comcarga_cp_{{$i}}" class="form-control" value="{{ $item['corrente_st_comcarga'] }}">
                                                            <label for="corrente_st_comcarga_cp_img{{$i}}" id="lbcorrente_st_comcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="corrente_st_comcarga_cp_img{{$i}}" id="corrente_st_comcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['corrente_st_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['corrente_st_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="corrente_st_comcarga_cp_preview{{$i}}" data-imgval="{{ $item['corrente_st_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="corrente_st_comcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>                   
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="campos_tensao col-10">
                                                            <input type="number" name="corrente_rt_comcarga_cp_{{$i}}" id="corrente_rt_comcarga_cp_{{$i}}" class="form-control" value="{{ $item['corrente_rt_comcarga'] }}">
                                                            <label for="corrente_rt_comcarga_cp_img{{$i}}" id="lbcorrente_rt_comcarga_cp_img{{$i}}" class="label_input_file">@lang('entregaTecnica.carregar_imagem')</label>
                                                            <input type="file" onchange="myfn(this)" style="display: none;" name="corrente_rt_comcarga_cp_img{{$i}}" id="corrente_rt_comcarga_cp_img{{$i}}" class="form-control" accept="image/gif, image/png, image/jpeg, image/pjpeg" />
                                                        </div>
        
                                                        <div>
                                                            @if (count($item['corrente_rt_comcarga_img']) > 0)
                                                                <img src="{{ asset('../storage/app/public/'. $item['corrente_rt_comcarga_img'])}}" class="img_preview_editar" onclick="expandImage(this)" id="corrente_rt_comcarga_cp_preview{{$i}}" data-imgval="{{ $item['corrente_rt_comcarga_img'] }}" />   
                                                            @else                                                             
                                                                <img id="corrente_rt_comcarga_cp_preview{{$i}}" class="img_preview" onclick="expandImage(this)" data-imgval=""/>
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
                                    </tfoot>
                                </table>
                            </div>
                        </div>

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
                                            <img src="{{ asset('../storage/app/public/')}}" class="img_modal">
                                        @else                                        
                                            <img src="" class="img_modal"/>                                   
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal imagens chave partida -->
                    
                        <div class="modal fade" id="modal_" tabindex="-1" role="dialog" aria-labelledby="modal_img_testes_Label">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal_label_"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">

                                    <img src="" class="img_modal" id="imagem_modal"/>
                                </div>
                            </div>
                            </div>
                        </div>

  
                    </div>
                </div>
            </div>

            {{-- BOTOES PARA SALVAR --}}
            <div class="row justify-content-center botaoAfericao mb-4" id="botoesSalvar">
                <button class="proximo ml-2" type="" name="botao" value="sair"
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
            
            var valor_imagem = $("#" + imagem_modal.id).data("imgval");
            var name_lang;
            var src_img = $(imagem_modal).attr("src");
            
            var id_img = $(imagem_modal).attr("id");
            var id_img_cp = $(imagem_modal).attr("id").substring(29);
            
            console.log(id_img_cp);
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

        });
</script>

    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
@endsection
