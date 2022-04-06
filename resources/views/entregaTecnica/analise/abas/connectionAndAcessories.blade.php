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
                        <th colspan="4">@lang('entregaTecnica.tubo_az')</th>
                    </tr>
                    <tr>
                        <th>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 1</th>
                        <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 1</th>
                        <th>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 2</th>
                        <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item['tubo_az1_comprimento']}}</td>
                        <td>{{ $item['tubo_az1_diametro']}}</td>
                        <td>{{ $item['tubo_az2_comprimento']}}</td>
                        <td>{{ $item['tubo_az2_diametro']}}</td>
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
    
    @if ( $item['peca_aumento_diametro_maior'] != null || $item['peca_aumento_diametro_menor'] != null ||
        $item['registro_gaveta_diametro'] != null || $item['registro_gaveta_marca'] != null)
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="2">@lang('entregaTecnica.peca_aumento')</th>
                            <th colspan="2">@lang('entregaTecnica.registro_gaveta')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.diametro_maior')@lang('unidadesAcoes.(m)')</th>
                            <th>@lang('entregaTecnica.diametro_menor')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.marca')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['peca_aumento_diametro_maior']}}</td>
                            <td>{{ $item['peca_aumento_diametro_menor']}}</td>
                            <td>{{ $item['registro_gaveta_diametro']}}</td>
                            <td>{{ $item['registro_gaveta_marca']}}</td>
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

<div class="row mt-5">    
    @if ( $item['valvula_ventosa_diametro'] != null || $item['valvula_ventosa_marca'] != null ||
        $item['valvula_ventosa_modelo'] != null || $item['quantidade_valv_ventosa'] != null)
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="4">@lang('entregaTecnica.valvula_ventosa')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.marca')@lang('unidadesAcoes.(m)')</th>
                            <th>@lang('entregaTecnica.material')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.material')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['valvula_ventosa_diametro']}}</td>
                            <td>{{ $item['valvula_ventosa_marca']}}</td>
                            <td>{{ $item['valvula_ventosa_modelo']}}</td>
                            <td>{{ $item['quantidade_valv_ventosa']}}</td>
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
    
    @if ( $item['valvula_retencao_diametro'] != null || $item['valvula_retencao_marca'] != null ||
        $item['valvula_retencao_material'] != null)
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="4">@lang('entregaTecnica.valvula_retencao')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.marca')</th>
                            <th>@lang('entregaTecnica.material')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['valvula_retencao_diametro']}}</td>
                            <td>{{ $item['valvula_retencao_marca']}}</td>
                            <td>{{ $item['valvula_retencao_material']}}</td>
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
    @endif
</div>

<div class="row mt-5">    
    @if ( $item['valvula_antecondas_diametro'] != null || $item['valvula_antecondas_marca'] != null ||
        $item['valvula_antecondas_modelo'] != null)
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="4">@lang('entregaTecnica.valvula_antecipadora')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.marca')</th>
                            <th>@lang('entregaTecnica.modelo')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['valvula_antecondas_diametro']}}</td>
                            <td>{{ $item['valvula_antecondas_marca']}}</td>
                            <td>{{ $item['valvula_antecondas_modelo']}}</td>
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
    @endif
    
    @if ( $item['registro_eletrico_diametro'] != null || $item['registro_eletrico_marca'] != null ||
        $item['registro_eletrico_modelo'] != null || $item['medicoes_ligpress_outros'] != null)
        <div class="col-md-6">
            <div class="table-responsive m-auto tabela" id="cssPreloader">
                <table class="table table-striped mx-auto text-center">
                    <thead>
                        <tr>
                            <th colspan="4">@lang('entregaTecnica.hidrometro')</th>
                        </tr>
                        <tr>
                            <th>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</th>
                            <th>@lang('entregaTecnica.marca')</th>
                            <th>@lang('entregaTecnica.modelo')</th>
                            <th>@lang('entregaTecnica.outros')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $item['registro_eletrico_diametro']}}</td>
                            <td>{{ $item['registro_eletrico_marca']}}</td>
                            <td>{{ $item['registro_eletrico_modelo']}}</td>
                            <td>{{ $item['medicoes_ligpress_outros']}}</td>
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