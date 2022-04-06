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
                        <th>@lang('entregaTecnica.quantidade_motobomba')</th>
                        <th>@lang('entregaTecnica.tipo_succao')</th>
                        @if ($item['ligacao_serie'] > 0)
                            <th>@lang('entregaTecnica.ligacao_serie')</th>
                        @elseif($item['ligacao_paralelo'] > 0)
                            <th>@lang('entregaTecnica.ligacao_paralela')</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item['quantidade_motobomba']}}</td>
                        <td>{{ $item['tipo_succao']}}</td>
                        @if ($item['ligacao_serie'] > 0)
                            <td>@lang('comum.sim')</td>
                        @elseif($item['ligacao_paralelo'] > 0)
                            <td>@lang('comum.sim')</td>
                        @endif
                    </tr>
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    @if ($item['ligacao_serie'] > 0)
                        <td></td>
                    @elseif($item['ligacao_paralelo'] > 0)
                        <td></td>
                    @endif
                </tfoot>
            </table>
        </div>
    </div>
</div>

@foreach ($bombas as $bomba)
    @foreach ($motores as $motor)
        @if ($motor['id_bomba'] == $bomba['id_bomba'])                            
            @foreach ($chave_partida as $cp)  
                @if ($cp['id_motor'] == $motor['id_motor'])  
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="table-responsive m-auto tabela" id="cssPreloader">
                                <table class="table table-striped mx-auto text-center">
                                    <thead>
                                        <tr>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <th colspan="13">@lang('entregaTecnica.bomba') - {{ $bomba['id_bomba'] }}</th>
                                            @else
                                                <th colspan="6">@lang('entregaTecnica.bomba') - {{ $bomba['id_bomba'] }}</th>
                                            @endif
                                        </tr>
                                        <tr>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <th colspan="4"></th>
                                            @endif
                                            <th>@lang('entregaTecnica.marca')</th>
                                            <th>@lang('entregaTecnica.modelo')</th>
                                            <th>@lang('entregaTecnica.numero_estagio')</th>
                                            <th>@lang('entregaTecnica.rotor')</th>
                                            <th>@lang('entregaTecnica.opcionais')</th>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <th colspan="4"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <td colspan="4"></td>
                                            @endif
                                            <td>{{ $bomba['marca']}}</td>
                                            <td>{{ $bomba['modelo']}}</td>
                                            <td>{{ $bomba['numero_estagio'] }}</td>
                                            <td>{{ $bomba['rotor'] }}</td>
                                            <td>{{ $bomba['opcionais']}}</td>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <td colspan="4"></td>
                                            @endif
                                        </tr>
                                    </tbody>
                                    <thead>                                
                                        <tr>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <th colspan="13">@lang('entregaTecnica.motor')</th>
                                            @else
                                                <th colspan="5">@lang('entregaTecnica.motor')</th>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>@lang('entregaTecnica.tipo_motor')</th>
                                            <th>@lang('entregaTecnica.marca')</th>
                                            <th>@lang('entregaTecnica.modelo')</th>
                                            <th>@lang('entregaTecnica.potencia')</th>
                                            <th>@lang('entregaTecnica.numero_serie')</th>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <th>@lang('entregaTecnica.tensao')</th>
                                                <th>@lang('entregaTecnica.lp_ln')</th>
                                                <th>@lang('entregaTecnica.classe_isolamento')</th>
                                                <th>@lang('entregaTecnica.corrente_nominal')</th>
                                                <th>@lang('entregaTecnica.fs')</th>
                                                <th>@lang('entregaTecnica.ip')</th>
                                                <th>@lang('entregaTecnica.rendimento')</th>
                                                <th>@lang('entregaTecnica.cos')</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>                                
                                        <tr>
                                            <td>{{ $motor['tipo_motor']}}</td>
                                            <td>{{ $motor['marca']}}</td>
                                            <td>{{ $motor['modelo'] }}</td>
                                            <td>{{ $motor['potencia'] }}</td>
                                            <td>{{ $motor['numero_serie']}}</td>
                                            @if ($motor['tipo_motor'] == 'eletrico')
                                                <td>{{ $motor['tensao']}}</td>
                                                <td>{{ $motor['lp_ln']}}</td>
                                                <td>{{ $motor['classe_isolamento'] }}</td>
                                                <td>{{ $motor['corrente_nominal'] }}</td>
                                                <td>{{ $motor['fs']}}</td>                                    
                                                <td>{{ $motor['ip']}}</td>                                    
                                                <td>{{ $motor['rendimento']}}</td>                                    
                                                <td>{{ $motor['cos']}}</td>
                                            @endif
                                        </tr>
                                    </tbody>
                                    @if ($motor['tipo_motor'] == 'eletrico')
                                        <thead>
                                            <tr>
                                                @if ($motor['tipo_motor'] == 'eletrico')
                                                    <th colspan="13">@lang('entregaTecnica.chave_partida')</th>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($motor['tipo_motor'] == 'eletrico')
                                                    <th colspan="4"></th>
                                                @endif
                                                <th>@lang('entregaTecnica.marca')</th>
                                                <th>@lang('entregaTecnica.acionamento')</th>
                                                <th>@lang('entregaTecnica.regulagem_reles')</th>
                                                <th>@lang('entregaTecnica.numero_serie')</th>
                                                @if ($motor['tipo_motor'] == 'eletrico')
                                                    <th colspan="5"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>                                
                                            <tr>
                                                @if ($motor['tipo_motor'] == 'eletrico')
                                                    <th colspan="4"></th>
                                                @endif
                                                <td>{{ $cp['marca']}}</td>
                                                <td>{{ $cp['acionamento']}}</td>
                                                <td>{{ $cp['regulagem_reles'] }}</td>
                                                <td>{{ $cp['numero_serie'] }}</td>
                                                @if ($motor['tipo_motor'] == 'eletrico')
                                                    <th colspan="5"></th>
                                                @endif
                                            </tr>
                                        </tbody>
                                    @endif
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if ($motor['tipo_motor'] == 'eletrico')
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        @endif
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
@endforeach