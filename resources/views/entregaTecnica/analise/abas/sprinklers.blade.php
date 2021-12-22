<div class="container-fluid mt-5">   
    <div class="row">
        <div class="col-md-2">
            <b>@lang('entregaTecnica.marca_aspersor')</b>:
        </div>
        <div class="col-md-1">
            <span>{{ __('listas.'. $item['aspersor_marca']) }}</span>
        </div>
        <div class="col-md-2">
            <b>@lang('entregaTecnica.modelo_aspersor')</b>:
        </div>
        <div class="col-md-1">
            <span>{{ $item['aspersor_modelo']}}</span>
        </div>
        <div class="col-md-2">
            <b>@lang('entregaTecnica.defletor')</b>:
        </div>
        <div class="col-md-1">
            <span>{{ __('listas.'. $item['aspersor_defletor']) }}</span>
        </div>
    </div>

    {{-- ASPERSOR REGULADOR --}}
    <div class="row mt-3">
        <div class="col-md-2">
            <b>@lang('entregaTecnica.marca_regulador')</b>:
        </div>
        <div class="col-md-1">
            <span>{{ __('listas.'. $item['aspersor_regulador_marca']) }}</span>
        </div>
        <div class="col-md-2">
            <b>@lang('entregaTecnica.modelo_regulador')</b>:
        </div>
        <div class="col-md-1">
            <span>{{ $item['aspersor_regulador_modelo']}}</span>
        </div>
        <div class="col-md-2">
            <b>@lang('entregaTecnica.pressao')</b>:
        </div>
        <div class="col-md-1">
            <span>{{ $item['aspersor_pressao']}}</span>
        </div>
    </div>

    {{-- ASPERSOR DE IMPACTO --}}
    @if ($item['aspersor_impacto_marca'] != null)
        <div class="row mt-3">                                            
            <div class="col-md-2">
                <b>@lang('entregaTecnica.marca_aspersor_impacto')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_impacto_marca']}}</span>
            </div>
            <div class="col-md-2">
                <b>@lang('entregaTecnica.modelo_aspersor_impacto')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_impacto_modelo']}}</span>
            </div>
        </div>
    @endif

    {{-- ASPERSOR CANHÃO FINAL --}}
    @if ($item['aspersor_canhao_final'] != null)
        <div class="row mt-3">
            <div class="col-md-2">
                <b>@lang('entregaTecnica.canhao_final_marca')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_canhao_final']}}</span>
            </div>
        </div>
    @endif

    {{-- ASPERSOR OPCIONAIS --}}
    @if ($item['aspersor_opcionais'] != null)
        <div class="row mt-3">                           
            <div class="col-md-2">
                <b>@lang('entregaTecnica.outros')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_opcionais']}}</span>
            </div>
        </div>                                    
    @endif

    {{-- ASPERSOR BOMBA BOOSTER --}}
    @if ($item['aspersor_mbbooster_marca'] != null)
        <div class="row mt-3">                           
            <div class="col-md-2">
                <b>@lang('entregaTecnica.bomba_booster_marca')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_mbbooster_marca']}}</span>
            </div>             

            <div class="col-md-2">
                <b>@lang('entregaTecnica.bomba_booster_modelo')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_mbbooster_modelo']}}</span>
            </div>          

            <div class="col-md-2">
                <b>@lang('entregaTecnica.bomba_booster_rotor')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_mbbooster_rotor']}}</span>
            </div>      
                                    
            <div class="col-md-2">
                <b>@lang('entregaTecnica.bomba_booster_potencia')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_mbbooster_potencia']}}</span>
            </div>       
                                
            <div class="col-md-2">
                <b>@lang('entregaTecnica.bomba_booster_corrente')</b>:
            </div>
            <div class="col-md-1">
                <span>{{ $item['aspersor_mbbooster_corrente']}}</span>
            </div>
        </div>                                    
    @endif
</div>