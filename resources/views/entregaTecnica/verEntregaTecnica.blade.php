@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.visualizar')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('manage_technical_delivery') }}" style="color: #3c8dbc" data-toggle="tooltip"
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
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.identificacao')</a>
            </li>
        </ul>

        {{-- FORMULARIO DE CADASTRO --}}
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                <input type="hidden" name="id" id="id" value="{{$visualizar_entrega_tecnica[0]['id']}}">
                <div class="col-md-12" id="cssPreloader">
                    <div class="form-row justify-content-start mt-3">
                        <div class="form-group col-md-4 telo5ce">
                            <label for="numero_pedido">@lang('entregaTecnica.numero_pedido')</label>
                            <input type="number" id="numero_pedido" class="form-control" name="numero_pedido" value="{{ $visualizar_entrega_tecnica[0]['numero_pedido'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="numero_serie">@lang('entregaTecnica.numero_serie')</label>
                            <input type="text" id="numero_serie" class="form-control" name="numero_serie" value="{{ $visualizar_entrega_tecnica[0]['numero_serie'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="id_tecnico">@lang('entregaTecnica.tecnico_responsavel')</label>
                            <input type="text" id="id_tecnico" class="form-control" name="id_tecnico" value="{{ $visualizar_entrega_tecnica[0]['nome_usuario'] }}" readonly>
                        </div>
                    </div>

                    <div class="form-row justify-content-start">                                  
                        <div class="form-group col-md-4 telo5ce">
                            <label for="fazenda">@lang('entregaTecnica.fazenda')</label>
                            <input type="text" id="fazenda" class="form-control" name="id_fazenda" value="{{ $visualizar_entrega_tecnica[0]['nome_fazenda'] }}" readonly>
                        </div>     

                        <div class="form-group col-md-4 telo5ce">
                            <label for="cidade_fazenda">@lang('entregaTecnica.cidade')</label>
                            <input type="text" id="cidade_fazenda" class="form-control" name="cidade_fazenda" value="{{ $visualizar_entrega_tecnica[0]['cidade_fazenda'] }}" readonly>
                        </div>        

                        <div class="form-group col-md-4 telo5ce">
                            <label for="estado_fazenda">@lang('entregaTecnica.estado')</label>
                            <input type="text" id="estado_fazenda" class="form-control" name="estado_fazenda" value="{{ $visualizar_entrega_tecnica[0]['estado_fazenda'] }}" readonly>
                        </div>      
                    </div>

                    <div class="form-row justify-content-start">  
                        <div class="form-group col-md-4 telo5ce">
                            <label for="modelo_equipamento">@lang('entregaTecnica.modelo')</label>
                            <input type="text" id="modelo_equipamento" class="form-control" name="modelo_equipamento" value="{{ $visualizar_entrega_tecnica[0]['modelo_equipamento'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="tipo_equipamento">@lang('entregaTecnica.tipo_equipamento')</label>
                            <input type="text" id="tipo_equipamento" class="form-control" name="tipo_equipamento" value="{{ __('listas.' . $visualizar_entrega_tecnica[0]['tipo_equipamento'] ) }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="tipo_equipamento_op1">@lang('entregaTecnica.tipo_equipamento')</label>
                            <input type="text" id="tipo_equipamento_op1" class="form-control" name="tipo_equipamento_op1" value="{{ __('listas.' . $visualizar_entrega_tecnica[0]['tipo_equipamento_op1'] ) }}" readonly>
                        </div>
                    </div>

                    <div class="form-row justify-content-start">  
                        <div class="form-group col-md-4 telo5ce">
                            <label for="altura_equipamento_nome">@lang('entregaTecnica.modelo')</label>
                            <input type="text" id="altura_equipamento_nome" class="form-control" name="altura_equipamento_nome" value="{{ $visualizar_entrega_tecnica[0]['altura_equipamento_nome'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="altura_equipamento_valor">@lang('entregaTecnica.altura_equipamento')</label>
                            <input type="text" id="altura_equipamento_valor" class="form-control" name="altura_equipamento_valor" value="{{$visualizar_entrega_tecnica[0]['altura_equipamento_valor']}}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="balanco_comprimento">@lang('entregaTecnica.comprimento_balanco')</label>
                            <input type="text" id="balanco_comprimento" class="form-control" name="balanco_comprimento" value="{{$visualizar_entrega_tecnica[0]['balanco_comprimento']}}" readonly>
                        </div>
                    </div>

                    <div class="form-row justify-content-start">  
                        <div class="form-group col-md-4 telo5ce">
                            <label for="painel">@lang('entregaTecnica.painel')</label>
                            <input type="text" id="painel" class="form-control" name="painel" value="{{ $visualizar_entrega_tecnica[0]['painel'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="corrente_fusivel_nh500v">@lang('entregaTecnica.corrente')</label>
                            <input type="text" id="corrente_fusivel_nh500v" class="form-control" name="corrente_fusivel_nh500v" value="{{$visualizar_entrega_tecnica[0]['corrente_fusivel_nh500v']}}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="pneus">@lang('entregaTecnica.pneus')</label>
                            <input type="text" id="pneus" class="form-control" name="pneus" value="{{$visualizar_entrega_tecnica[0]['pneus']}}" readonly>
                        </div>
                    </div>

                    <div class="form-row justify-content-start">  
                        <div class="form-group col-md-4 telo5ce">
                            <label for="motorreduror_marca">@lang('entregaTecnica.motorreduror_marca')</label>
                            <input type="text" id="motorreduror_marca" class="form-control" name="motorreduror_marca" value="{{ $visualizar_entrega_tecnica[0]['motorreduror_marca'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="motorredutores">@lang('entregaTecnica.motorredutores')</label>
                            <input type="text" id="motorredutores" class="form-control" name="motorredutores" value="{{ $visualizar_entrega_tecnica[0]['motorredutores'] }}" readonly>
                        </div> 
                        <div class="form-group col-md-4 telo5ce">
                            <label for="telemetria">@lang('entregaTecnica.telemetria')</label>
                            <input type="text" id="telemetria" class="form-control" name="telemetria" value="{{ $visualizar_entrega_tecnica[0]['telemetria'] }}" readonly>
                        </div> 
                    </div>

                    <div class="form-row justify-content-start"> 
                        <div class="form-group col-md-4 telo5ce">
                            <label for="injeferd">@lang('entregaTecnica.injeferdPotencia')</label>
                            <input type="text" id="injeferd" class="form-control" name="injeferd" value="{{ $visualizar_entrega_tecnica[0]['injeferd'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="canhao_final_valvula">@lang('entregaTecnica.canhaoFinal')</label>
                            <input type="text" id="canhao_final_valvula" class="form-control" name="canhao_final_valvula" value="{{ $visualizar_entrega_tecnica[0]['canhao_final_valvula'] }}" readonly>
                        </div>
                        <div class="form-group col-md-4 telo5ce">
                            <label for="acessorios">@lang('entregaTecnica.acessorios')</label>
                            <input type="text" id="acessorios" class="form-control" name="acessorios" value="{{ $visualizar_entrega_tecnica[0]['acessorios'] }}" readonly>
                        </div>
                    </div>

                    <div class="form-row justify-content-start"> 
                        
                        <div class="table-responsive m-auto tabela">
                            <table class="table table-striped mx-auto">
                                <thead>
                                    <th scope="col-5">#</th>
                                    <th scope="col-5">@lang('entregaTecnica.diametro')</th>
                                    <th scope="col-5">@lang('entregaTecnica.qtd_lances')</th>
                                    <th scope="col-5">@lang('entregaTecnica.qtd_tubos')</th>
                                </thead>
                                <tbody>
                                    @foreach ($visualizar_entrega_tecnica as $item)  
                                        <tr>
                                            <td>{{ $item->id_lance }}</td>
                                            <td>{{ $item->diametro_tubo }}</td>
                                            <td>{{ $item->quantidade_lances }}</td>
                                            <td>{{ $item->quantidade_tubo }}</td>  
                                        </tr>     
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
