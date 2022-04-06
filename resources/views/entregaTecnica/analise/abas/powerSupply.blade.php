<style>
    .table tr th, td {
        font-size: 15px !important;
    }
</style>

<div class="row mt-5">
    @if (!empty($autotrafo['potencia_elevacao']) || !empty($autotrafo['tap_entrada_elevacao']) || !empty($autotrafo['tap_saida_elevacao']) || 
    !empty($autotrafo['corrente_disjuntor']))
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="5">@lang('entregaTecnica.autotrafo_elevacao')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</th>
                            <th>@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</th>
                            <th>@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</th>
                            <th>@lang('entregaTecnica.corrente_disjuntor')</th>
                            <th>@lang('entregaTecnica.numero_serie')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $autotrafo['potencia_elevacao']}}</td>
                            <td>{{ $autotrafo['tap_entrada_elevacao']}}</td>
                            <td>{{ $autotrafo['tap_saida_elevacao']}}</td>
                            <td>{{ $autotrafo['corrente_disjuntor']}}</td>
                            <td>{{ $autotrafo['numero_serie_elevacao']}}</td>
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
    @endif

    @if (!empty($autotrafo['potencia_rebaixamento']) || !empty($autotrafo['tap_entrada_rebaixamento']) || !empty($autotrafo['tap_saida_rebaixamento']) || 
        !empty($autotrafo['numero_serie_rebaixamento']))
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="4">@lang('entregaTecnica.autotrafo_rebaixamento')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</th>
                            <th>@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</th>
                            <th>@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</th>
                            <th>@lang('entregaTecnica.numero_serie')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['potencia_rebaixamento']}}</td>
                            <td>{{ $item['tap_entrada_rebaixamento']}}</td>
                            <td>{{ $item['tap_saida_rebaixamento']}}</td>
                            <td>{{ $item['numero_serie_rebaixamento']}}</td>
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
    @endif
</div>

{{-- GERADOR --}}
@if ($autotrafo['gerador'] != null || $autotrafo['gerador_marca'] != null || $autotrafo['gerador_modelo'] != null || 
    $autotrafo['gerador_potencia'] != null || $autotrafo['gerador_frequencia'] != null || 
    $autotrafo['gerador_tensao'] != null || $autotrafo['numero_serie_gerador'] != null)
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="4">@lang('entregaTecnica.gerador')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.gerador_marca')</th>
                            <th>@lang('entregaTecnica.gerador_modelo')</th>
                            <th>@lang('entregaTecnica.gerador_potencia') @lang('unidadesAcoes.(cv)')</th>
                            <th>@lang('entregaTecnica.gerador_frequencia')</th>
                            <th>@lang('entregaTecnica.gerador_tensao')</th>
                            <th>@lang('entregaTecnica.numero_serie')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $autotrafo['gerador_marca']}}</td>
                            <td>{{ $autotrafo['gerador_modelo']}}</td>
                            <td>{{ $autotrafo['gerador_potencia']}}</td>
                            <td>{{ $autotrafo['gerador_frequencia']}}</td>
                            <td>{{ $autotrafo['gerador_tensao']}}</td>
                            <td>{{ $autotrafo['numero_serie_gerador']}}</td>
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
@endif