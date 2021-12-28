<div class="container-fluid mt-5">                
    <div class="row">
        <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['numero_serie']}}</span>
        </div>
        <div class="col-md-2"><b>@lang('entregaTecnica.modelo_equipamento')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['modelo_equipamento']}}</span>
        </div>
        <div class="col-md-2"><b>@lang('entregaTecnica.tipo_equipamento')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ __('listas.'. $item['tipo_equipamento'] )}}</span>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2"><b>@lang('entregaTecnica.opcao_equipamento'):</b></div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ __('listas.'. $item['tipo_equipamento_op1'])}}</span>
        </div>
        
        <div class="col-md-2"><b>@lang('entregaTecnica.painel')</b>:</div>
        <div class="col-md-2" >
            <span class="span-mobile-et">{{ $item['painel']}}</span>
        </div>
        <div class="col-md-2"><b>@lang('entregaTecnica.balanco'):</b></div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['balanco_comprimento']}}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"><b>@lang('entregaTecnica.altura')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['altura_equipamento_nome']}}</span>
        </div>
        <div class="col-md-2"><b>@lang('entregaTecnica.corrente')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['corrente_fusivel_nh500v']}}</span>
        </div>
        <div class="col-md-2"><b>@lang('entregaTecnica.pneus')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['pneus']}}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"><b>@lang('entregaTecnica.giro')</b>:</div>
        <div class="col-md-2">
            <span class="span-mobile-et">{{ $item['giro']}}</span>
        </div>
    </div>                    
    
    <div class="row">
        @if ($item['injeferd'] != 1)
            <div class="col-md-2"><b>@lang('entregaTecnica.injeferd')</b>:</div>
            <div class="col-md-2">
                <span class="span-mobile-et">{{ $item['injeferd']}}</span>
            </div>
        @endif
        @if ($item['canhao_final_valvula'] != 1)
            <div class="col-md-2"><b>@lang('entregaTecnica.canhaoFinal')</b>:</div>
            <div class="col-md-2">
                <span class="span-mobile-et">{{ $item['canhao_final_valvula']}}</span>
            </div>
        @endif
    </div>

    <div class="row">
        @if ($item['parada_automatica'] != 1)
            <div class="col-md-2"><b>@lang('entregaTecnica.parada_automatica')</b>:</div>
            <div class="col-md-2">
                <span class="span-mobile-et">{{ $item['parada_automatica']}}</span>
            </div>
        @endif
        @if ($item['barreira_seguranca'] != 1)
            <div class="col-md-2"><b>@lang('entregaTecnica.barreira_seguranca')</b>:</div>
            <div class="col-md-2">
                <span class="span-mobile-et">{{ $item['barreira_seguranca']}}</span>
            </div>
        @endif
    </div>
</div>