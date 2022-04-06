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
                        <th>@lang('entregaTecnica.marca_aspersor')</th>
                        <th>@lang('entregaTecnica.modelo_aspersor')</th>
                        <th>@lang('entregaTecnica.defletor')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('listas.'. $item['aspersor_marca']) }}</td>
                        <td>{{ __('listas.'. $item['aspersor_modelo']) }}</td>
                        <td>{{ __('listas.' . $item['aspersor_defletor']) }}</td>
                    </tr>
                </tbody>
                <tfoot>
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
                        <th>@lang('entregaTecnica.marca_regulador')</th>
                        <th>@lang('entregaTecnica.modelo_regulador')</th>
                        <th>@lang('entregaTecnica.pressao')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('listas.'. $item['aspersor_regulador_marca']) }}</td>
                        <td>{{ $item['aspersor_regulador_modelo']}}</td>
                        <td>{{ __('listas.' . $item['aspersor_pressao']) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@if ($item['aspersor_impacto_marca'] != null || $item['aspersor_canhao_final'] != null)    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th>@lang('entregaTecnica.marca_aspersor_impacto')</th>
                            <th>@lang('entregaTecnica.modelo_aspersor_impacto')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['aspersor_impacto_marca'] }}</td>
                            <td>{{ $item['aspersor_impacto_modelo'] }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
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
                            <th>@lang('entregaTecnica.canhao_final_marca')</th>
                            <th>@lang('entregaTecnica.canhao_final_modelo')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['aspersor_canhao_final'] }}</td>
                            <td>{{ $item['aspersor_canhao_final_bocal']}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endif

{{-- ASPERSOR BOMBA BOOSTER --}}
@if ($item['aspersor_mbbooster_marca'] != null)
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th>@lang('entregaTecnica.bomba_booster_marca')</th>
                            <th>@lang('entregaTecnica.bomba_booster_modelo')</th>
                            <th>@lang('entregaTecnica.bomba_booster_rotor')</th>
                            <th>@lang('entregaTecnica.bomba_booster_potencia')</th>
                            <th>@lang('entregaTecnica.bomba_booster_corrente')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['aspersor_mbbooster_marca'] }}</td>
                            <td>{{ $item['aspersor_mbbooster_modelo'] }}</td>
                            <td>{{ $item['aspersor_mbbooster_rotor'] }}</td>
                            <td>{{ $item['aspersor_mbbooster_potencia'] }}</td>
                            <td>{{ $item['aspersor_mbbooster_corrente'] }}</td>
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