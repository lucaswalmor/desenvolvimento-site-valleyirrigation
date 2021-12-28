
<div class="container-fluid mt-5">
    {{-- CONJUNTO MOTOBOMBA --}}                               
    <div class="do-not-break espacamento-cabecalho">
        <div class="row">
            <div class="col-md-3"><b>@lang('entregaTecnica.quantidade_motobomba')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $item['quantidade_motobomba']}}</span>
            </div>
            <div class="col-md-2"><b>@lang('entregaTecnica.tipo_succao')</b>:</div>
            <div class="col-md-2">
                <span class="span-mobile-et">{{ $item['tipo_succao']}}</span>
            </div>
            @if ($item['ligacao_serie'] > 0)
                <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_serie')</b>:</div>
                <div class="col-md-2">
                   <span class="span-mobile-et"> @lang('comum.sim')</span>
                </div>                                        
            @elseif($item['ligacao_paralelo'] > 0)
                <div class="col-md-2"><b>@lang('entregaTecnica.ligacao_paralela')</b>:</div>
                <div class="col-md-2">
                    <span class="span-mobile-et">@lang('comum.sim')</span>
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
                    <span class="span-mobile-et">{{ $bomba['marca']}}</span>
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                <div class="col-md-2">
                    <span class="span-mobile-et">{{ $bomba['modelo']}}</span>
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.numero_estagio')</b>:</div>
                <div class="col-md-2">
                    <span class="span-mobile-et">{{ $bomba['numero_estagio']}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"><b>@lang('entregaTecnica.rotor')</b>:</div>
                <div class="col-md-2">
                    <span class="span-mobile-et">{{ $bomba['rotor']}}</span>
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.opcionais')</b>:</div>
                <div class="col-md-2">
                    <span class="span-mobile-et">{{ $bomba['opcionais']}}</span>
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
                            <span class="span-mobile-et">{{ $motor['tipo_motor']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.marca')</b>:</div>
                        <div class="col-md-2">
                            <span class="span-mobile-et">{{ $motor['marca']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.modelo')</b>:</div>
                        <div class="col-md-2">
                            <span class="span-mobile-et">{{ $motor['modelo']}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"><b>@lang('entregaTecnica.potencia')</b>:</div>
                        <div class="col-md-2">
                            <span class="span-mobile-et">{{ $motor['potencia']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.rotacao')</b>:</div>
                        <div class="col-md-2">
                            <span class="span-mobile-et">{{ $motor['rotacao']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                        <div class="col-md-2">
                            <span class="span-mobile-et">{{ $motor['numero_serie']}}</span>
                        </div>
                    </div>

                    @if ($motor['tipo_motor'] == 'eletrico')                                            
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.tensao')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['tensao']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.lp_ln')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['lp_ln']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.classe_isolamento')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['classe_isolamento']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.corrente_nominal')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['corrente_nominal']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.fs')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['fs']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.ip')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['ip']}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"><b>@lang('entregaTecnica.rendimento')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['rendimento']}}</span>
                            </div>
                            <div class="col-md-2"><b>@lang('entregaTecnica.cos')</b>:</div>
                            <div class="col-md-2">
                                <span class="span-mobile-et">{{ $motor['cos']}}</span>
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
                                        <span class="span-mobile-et">{{ $cp['marca'] }}</span>
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.acionamento')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ __('listas.'. $cp['acionamento'] )}}</span>
                                    </div>
                                    <div class="col-md-2"><b>@lang('entregaTecnica.regulagem_reles')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $cp['regulagem_reles']}}</span>
                                    </div>
                                </div>                                      
                                <div class="row">
                                    <div class="col-md-2"><b>@lang('entregaTecnica.numero_serie')</b>:</div>
                                    <div class="col-md-2">
                                        <span class="span-mobile-et">{{ $motor['numero_serie']}}</span>
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