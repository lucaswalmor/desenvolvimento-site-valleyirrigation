<div class="container-fluid mt-5">
    @if (!empty($telemetria['aqua_tec_pro']) || !empty($telemetria['aqua_tec_lite']) || !empty($telemetria['commander_vp']) || 
        !empty($telemetria['icon_link']) || !empty($telemetria['crop_link']) || !empty($telemetria['base_station3']) || !empty($telemetria['estacao_metereologica_valley']) || 
        !empty($telemetria['field_commander']) )
        {{-- TELEMETRIA --}}                      
        <div class="do-not-break espacamento-cabecalho">

            <div class='row'>
                <div class="col-md-2 "><b>@lang('entregaTecnica.aqua_tec_pro')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')
                </div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.aqua_tec_lite')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')
                </div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.commander_vp')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"><b>@lang('entregaTecnica.icon_link')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')
                </div>
                
                <div class="col-md-2"><b>@lang('entregaTecnica.crop_link')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')                           
                </div>

                <div class="col-md-2"><b>@lang('entregaTecnica.base_station3')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')                           
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-2"><b>@lang('entregaTecnica.field_commander')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')                           
                </div>
                <div class="col-md-3"><b>@lang('entregaTecnica.estacao_metereologica_valley')</b></div>
                <div class="col-md-2">
                        @lang('comum.sim')
                </div>
            </div>
        </div>                   
    @endif
</div>