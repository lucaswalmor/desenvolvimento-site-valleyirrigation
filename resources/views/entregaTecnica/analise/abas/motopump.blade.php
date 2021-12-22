
<div class="container-fluid mt-5">
    {{-- CONJUNTO MOTOBOMBA --}}                               
    <div class="do-not-break espacamento-cabecalho">
        <div class="row">
            <div class="col-md-3"><b>@lang('entregaTecnica.quantidade_motobomba')</b>:</div>
            <div class="col-md-1">
                {{ $item['quantidade_motobomba']}}
            </div>
            <div class="col-md-2"><b>@lang('entregaTecnica.tipo_succao')</b>:</div>
            <div class="col-md-2">
                {{ $item['tipo_succao']}}
            </div>
            @if ($item['ligacao_serie'] > 0)
                <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_serie')</b>:</div>
                <div class="col-md-2">
                    @lang('comum.sim')
                </div>                                        
            @elseif($item['ligacao_paralelo'] > 0)
                <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_paralela')</b>:</div>
                <div class="col-md-2">
                    @lang('comum.sim')
                </div>
            @endif
        </div>

        @foreach ($bombas as $bomba)
            <div class='mt-3'>                                    
                <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_bomba'] }}</b></div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                <div class="col-md-2">
                    {{ $bomba['marca']}}
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                <div class="col-md-2">
                    {{ $bomba['modelo']}}
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.numero_estagio')</b>:</div>
                <div class="col-md-2">
                    {{ $bomba['numero_estagio']}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>@lang('entregaTecnica.rotor')</b>:</div>
                <div class="col-md-2">
                    {{ $bomba['rotor']}}
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.opcionais')</b>:</div>
                <div class="col-md-2">
                    {{ $bomba['opcionais']}}
                </div>
            </div>

            @foreach ($motores as $motor)
                @if ($motor['id_bomba'] == $bomba['id_bomba'])      
                    <div class='mt-3'>
                        <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.motor') - {{ $motor['id_motor'] }}</b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><b>@lang('entregaTecnica.tipo_motor')</b>:</div>
                        <div class="col-md-2">
                            {{ $motor['tipo_motor']}}
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                        <div class="col-md-2">
                            {{ $motor['marca']}}
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                        <div class="col-md-2">
                            {{ $motor['modelo']}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><b>@lang('entregaTecnica.potencia')</b>:</div>
                        <div class="col-md-2">
                            {{ $motor['potencia']}}
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.rotacao')</b>:</div>
                        <div class="col-md-2">
                            {{ $motor['rotacao']}}
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                        <div class="col-md-2">
                            {{ $motor['numero_serie']}}
                        </div>
                    </div>

                    @if ($motor['tipo_motor'] == 'eletrico')                                            
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.tensao')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['tensao']}}
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.lp_ln')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['lp_ln']}}
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.classe_isolamento')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['classe_isolamento']}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.corrente_nominal')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['corrente_nominal']}}
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.fs')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['fs']}}
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.ip')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['ip']}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.rendimento')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['rendimento']}}
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.cos')</b>:</div>
                            <div class="col-md-2">
                                {{ $motor['cos']}}
                            </div>
                        </div>
                        
                        @foreach ($chave_partida as $cp)  
                            @if ($cp['id_motor'] == $motor['id_motor'])                                                    
                                <div class='mt-2'>
                                    <div class="col-md-12 sub_titulo_ft"><b>@lang('entregaTecnica.chave_partida') - {{ $cp['id_chave_partida'] }}</b></div>
                                </div>                                          
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $cp['marca'] }}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.acionamento')</b>:</div>
                                    <div class="col-md-2">
                                        {{ __('listas.'. $cp['acionamento'] )}}
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.regulagem_reles')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $cp['regulagem_reles']}}
                                    </div>
                                </div>                                      
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                    <div class="col-md-2">
                                        {{ $motor['numero_serie']}}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif  
                @endif                                      
            @endforeach
            @if (count($item['id_bomba']) > 1)
                <hr>                                        
            @endif
        @endforeach
    </div>
</div>