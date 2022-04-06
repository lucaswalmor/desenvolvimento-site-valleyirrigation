<style>
    .table tr th, td {
        font-size: 15px !important;
    }
</style>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="table-responsive m-auto tabela" id="cssPreloader">
            <table class="table table-striped mx-auto text-center">
                <thead>
                    <tr>
                        <th>@lang('entregaTecnica.numero_serie')</th>
                        <th>@lang('entregaTecnica.modelo_equipamento')</th>
                        <th>@lang('entregaTecnica.tipo_equipamento')</th>
                        <th>@lang('entregaTecnica.opcao_equipamento')</th>
                        <th>@lang('entregaTecnica.painel')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item['numero_serie']}}</td>
                        <td>{{ $item['modelo_equipamento']}}</td>
                        <td>{{ __('listas.' . $item['tipo_equipamento']) }}</td>
                        <td>{{ __('listas.'. $item['tipo_equipamento_op1']) }}</td>
                        <td>{{ $item['painel']}}</td>
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
    
    <div class="col-md-6">
        <div class="table-responsive m-auto tabela" id="cssPreloader">
            <table class="table table-striped mx-auto text-center">
                <thead>
                    <tr>
                        <th>@lang('entregaTecnica.balanco')</th>
                        <th>@lang('entregaTecnica.altura')</th>
                        <th>@lang('entregaTecnica.corrente')</th>
                        <th>@lang('entregaTecnica.pneus')</th>
                        <th>@lang('entregaTecnica.giro')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item['balanco_comprimento']}}</td>
                        <td>{{ $item['altura_equipamento_nome']}}</td>
                        <td>{{ $item['corrente_fusivel_nh500v']}}</td>
                        <td>{{ $item['pneus']}}</td>
                        <td>{{ $item['giro']}}</td>
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
</div>

@if ($item['injeferd'] != 1 || $item['canhao_final_valvula'] != 1 || $item['parada_automatica'] != 1 || 
    $item['barreira_seguranca'] != 1)
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th>@lang('entregaTecnica.injeferd')</th>
                            <th>@lang('entregaTecnica.canhaoFinal')</th>
                            <th>@lang('entregaTecnica.parada_automatica')</th>
                            <th>@lang('entregaTecnica.barreira_seguranca')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['injeferd']}}</td>
                            <td>{{ $item['canhao_final_valvula']}}</td>
                            <td>{{ $item['parada_automatica'] }}</td>
                            <td>{{ $item['barreira_seguranca']}}</td>
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
    </div>
@endif  