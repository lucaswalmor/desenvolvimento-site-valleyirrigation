<div class="container-fluid mt-5">
    {{-- LIGAÇÃO --}}                               
    <div class="do-not-break espacamento-cabecalho">
        {{-- TUBO AZ --}}
        <div class=''>                                    
            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.tubo_az')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 1</b></div>
            <div class="col-md-1">{{ $item['tubo_az1_comprimento'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 1</b></div>
            <div class="col-md-1">{{ $item['tubo_az1_diametro'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.comprimento')@lang('unidadesAcoes.(m)') 2</b></div>
            <div class="col-md-1">{{ $item['tubo_az2_comprimento'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)') 2</b></div>
            <div class="col-md-1">{{ $item['tubo_az2_diametro'] }}</div>
        </div>
        <br>
        {{-- PEÇA DE AUMENTO --}}
        <div class='d-flex justify-content-start'>                                    
            <div class="col-md-6 text-start sub_titulo_ft mr-4" style="max-width: 48%;"><b>@lang('entregaTecnica.peca_aumento')</b></div>
            <div class="col-md-6 text-start sub_titulo_ft mr-5" style="max-width: 50%;"><b>@lang('entregaTecnica.registro_gaveta')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro_maior')@lang('unidadesAcoes.(m)')</b></div>
            <div class="col-md-1 pr-3">{{ $item['peca_aumento_diametro_maior'] }}</div>

            <div class="col-md-2"><b>@lang('entregaTecnica.diametro_menor')@lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1">{{ $item['peca_aumento_diametro_menor'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro')@lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1 pr-3">{{ $item['registro_gaveta_diametro'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
            <div class="col-md-1 pr-3">{{ $item['registro_gaveta_marca'] }}</div>
        </div>
        <br>
        {{-- VALVULA VENTOSA --}}
        <div class=''>                                    
            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_ventosa')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1 pr-3">{{ $item['valvula_ventosa_diametro'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
            <div class="col-md-1 pr-3">{{ $item['valvula_ventosa_marca'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
            <div class="col-md-1 pr-3">{{ $item['valvula_ventosa_modelo'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
            <div class="col-md-1 pr-3">{{ $item['quantidade_valv_ventosa'] }}</div>
        </div>
        <br>
        {{-- VALVULA DE RETENÇÃO --}}
        <div class=''>                                    
            <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.valvula_retencao')</b></div>
        </div>
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1 pr-3">{{ $item['valvula_retencao_diametro'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
            <div class="col-md-1 pr-3">{{ $item['valvula_retencao_marca'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.material')</b></div>
            <div class="col-md-1 pr-3">{{ $item['valvula_retencao_material'] }}</div>
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
                <div class="col-md-2">{{ $item['valvula_antecondas_diametro'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.marca') @lang('unidadesAcoes.(pol)') 1</b></div>
                <div class="col-md-2">{{ $item['valvula_antecondas_marca'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.modelo') @lang('unidadesAcoes.(m)') 2</b></div>
                <div class="col-md-2">{{ $item['valvula_antecondas_modelo'] }}</div>
            </div>
        </div>

        {{-- HIDROMETRO --}}                                                  
        <div class="do-not-break">
            <div class='row'>                                    
                <div class="col-md-12"><b>@lang('entregaTecnica.hidrometro')</b></div>
            </div>
            <div class='row'>
                <div class="col-md-2 "><b>@lang('entregaTecnica.diametro') @lang('unidadesAcoes.(pol)')</b></div>
                <div class="col-md-2">{{ $item['registro_eletrico_diametro'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.marca')</b></div>
                <div class="col-md-2">{{ $item['registro_eletrico_marca'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.modelo')</b></div>
                <div class="col-md-2">{{ $item['registro_eletrico_modelo'] }}</div>

                <div class="col-md-2 "><b>@lang('entregaTecnica.outros')</b></div>
                <div class="col-md-2">{{ $item['medicoes_ligpress_outros'] }}</div>
            </div>
        </div>                                
    @endif
</div>