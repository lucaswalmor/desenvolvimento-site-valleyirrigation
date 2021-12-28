<div class="container-fluid mt-5">
    {{-- LIGAÇÃO --}}                               
    <div class="do-not-break espacamento-cabecalho">
        {{-- TUBO AZ --}}
        <div class=''>                                    
            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.tubo_az')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 1</b></div>
            <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az1_comprimento'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 1</b></div>
            <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az1_diametro'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 2</b></div>
            <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az2_comprimento'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 2</b></div>
            <div class="col-md-1"><span class="span-mobile-et">{{ $item['tubo_az2_diametro'] }}</span></div>
        </div>
        <br>
        {{-- PEÇA DE AUMENTO --}}
        <div class='d-flex justify-content-start'>                                    
            <div class="col-md-6 text-start sub_titulo_ft mr-4" style="max-width: 48%;"><b>@lang('entregaTecnica.peca_aumento')</b></div>
            <div class="col-md-6 text-start sub_titulo_ft mr-5" style="max-width: 50%;"><b>@lang('entregaTecnica.registro_gaveta')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro_maior')@lang('unidadesAcoes.(m)')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['peca_aumento_diametro_maior'] }}</span></div>

            <div class="col-md-2"><b>@lang('entregaTecnica.diametro_menor')@lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1"><span class="span-mobile-et">{{ $item['peca_aumento_diametro_menor'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['registro_gaveta_diametro'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['registro_gaveta_marca'] }}</span></div>
        </div>
        <br>
        {{-- VALVULA VENTOSA --}}
        <div class=''>                                    
            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_ventosa')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_ventosa_diametro'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_ventosa_marca'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_ventosa_modelo'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['quantidade_valv_ventosa'] }}</span></div>
        </div>
        <br>
        {{-- VALVULA DE RETENÇÃO --}}
        <div class=''>                                    
            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_retencao')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_retencao_diametro'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_retencao_marca'] }}</span></div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
            <div class="col-md-1 pr-3"><span class="span-mobile-et">{{ $item['valvula_retencao_material'] }}</span></div>
        </div>
    </div>
    <br>
    
    {{-- ACESSÓRIOS --}}     
    @if ($item['valvula_antecondas_diametro'] || $item['valvula_antecondas_marca'] || $item['valvula_antecondas_modelo'])
        <div class="do-not-break">
            {{-- VALVULA ANTECIPADORA DE ONDAS --}}
            <div class='row'>                                    
                <div class="col-md-12"><b>@lang('entregaTecnica.valvula_antecipadora')</b></div>
            </div>
            <div class='row'>
                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(m)') 1</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['valvula_antecondas_diametro'] }}</span></div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.marca') @lang('unidadesAcoes.(pol)') 1</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['valvula_antecondas_marca'] }}</span></div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.modelo') @lang('unidadesAcoes.(m)') 2</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['valvula_antecondas_modelo'] }}</span></div>
            </div>
        </div>

        {{-- HIDROMETRO --}}                                                  
        <div class="do-not-break">
            <div class='row'>                                    
                <div class="col-md-12"><b>@lang('entregaTecnica.hidrometro')</b></div>
            </div>
            <div class='row'>
                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['registro_eletrico_diametro'] }}</span></div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['registro_eletrico_marca'] }}</span></div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.modelo')</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['registro_eletrico_modelo'] }}</span></div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.outros')</b></div>
                <div class="col-md-2"><span class="span-mobile-et">{{ $item['medicoes_ligpress_outros'] }}</span></div>
            </div>
        </div>                                
    @endif
</div>