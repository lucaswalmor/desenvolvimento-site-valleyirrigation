<div class="container-fluid mt-5">

    @if (!empty($autotrafo['potencia_elevacao']) || !empty($autotrafo['tap_entrada_elevacao']) || !empty($autotrafo['tap_saida_elevacao']) || 
        !empty($autotrafo['corrente_disjuntor']))
        {{-- AUTOTRÁFO --}}
        <div class="do-not-break espacamento-cabecalho">
            <div class='row col-md-12'>
                <h3><b>@lang('entregaTecnica.autotrafo_elevacao')</b></h3>
            </div>
            <div class='row'>
                <div class="col-md-2"><b>@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</b></div>
                <div class="col-md-1">{{ $autotrafo['potencia_elevacao'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</b></div>
                <div class="col-md-1">{{ $autotrafo['tap_entrada_elevacao'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</b></div>
                <div class="col-md-1">{{ $autotrafo['tap_saida_elevacao'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.corrente_disjuntor')</b></div>
                <div class="col-md-1">{{  $autotrafo['corrente_disjuntor'] }}</div>
            </div>
            <div class='row'>
                <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b></div>
                <div class="col-md-2">{{ $autotrafo['numero_serie_elevacao'] }}</div>
            </div>
            <div class='row col-md-12 mt-3'>
                <h3><b>@lang('entregaTecnica.autotrafo_rebaixamento')</b></h3>
            </div>
            <div class='row'>
                <div class="col-md-2 "><b>@lang('entregaTecnica.potencia') @lang('unidadesAcoes.(cv)')</b></div>
                <div class="col-md-1">{{ $autotrafo['potencia_rebaixamento'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.tap_entrada') @lang('unidadesAcoes.(v)')</b></div>
                <div class="col-md-1">{{ $autotrafo['tap_entrada_rebaixamento'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.tap_saida') @lang('unidadesAcoes.(v)')</b></div>
                <div class="col-md-1">{{  $autotrafo['tap_saida_rebaixamento'] }}</div>

                <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b></div>
                <div class="col-md-1">{{ $autotrafo['numero_serie_rebaixamento'] }}</div>
            </div>
        </div>                                
    @endif

    {{-- GERADOR --}}
    @if ($autotrafo['gerador'] != null || $autotrafo['gerador_marca'] != null || $autotrafo['gerador_modelo'] != null || 
        $autotrafo['gerador_potencia'] != null || $autotrafo['gerador_frequencia'] != null || 
        $autotrafo['gerador_tensao'] != null || $autotrafo['numero_serie_gerador'] != null)
        <div class="do-not-break espacamento-cabecalho">
            <div class='row col-md-12'>
                <h3><b>@lang('entregaTecnica.gerador')</b></h3>
            </div>
            <div class='row'>
                <div class="col-md-2 "><b>@lang('entregaTecnica.gerador')</b></div>
                <div class="col-md-2">
                    @if ($autotrafo['gerador'] == null)
                        
                    @else 
                        {{ __('listas.'. $autotrafo['gerador'] ) }}
                    @endif
                </div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_marca')</b></div>
                <div class="col-md-2">{{ $autotrafo['gerador_marca'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_modelo')</b></div>
                <div class="col-md-2">{{ $autotrafo['gerador_modelo'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_potencia')</b></div>
                <div class="col-md-2">{{ $autotrafo['gerador_potencia'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_frequencia')</b></div>
                <div class="col-md-2">{{ $autotrafo['gerador_frequencia'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.gerador_tensao')</b></div>
                <div class="col-md-2">{{ $autotrafo['gerador_tensao'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.numero_serie')</b></div>
                <div class="col-md-2">{{ $autotrafo['numero_serie_gerador'] }}</div>
            </div>
        </div>
    @endif
</div>