<style>
    .espacamento-cabecalho img {
        width: 255px;
    }
</style>
<div class="container-fluid mt-5">
    {{-- TESTES HIDRAULICOS --}}                               
    <div class="do-not-break espacamento-cabecalho">
        <div class="cor-fundo text-center">
            <h2><b>@lang('entregaTecnica.teste_torre_central')</b></h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_sem_carga')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $teste_torre_central['tensao_rs_semcarga']}}</span>
            </div>
            <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_sem_carga')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $teste_torre_central['tensao_st_semcarga']}}</span>
            </div>
            <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_sem_carga')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $teste_torre_central['tensao_rt_semcarga']}}</span>
            </div>
        </div>

        <div class="row justify-content-center ">
            <div class="col-md-3">
                <img src="{{ asset('storage/'. $teste_torre_central['tensao_rs_semcarga_img'])}}"/>   
            </div>
            <div class="col-md-3">
                <img src="{{ asset('storage/'. $teste_torre_central['tensao_st_semcarga_img'])}}"/>   
            </div>
            <div class="col-md-3">
                <img src="{{ asset('storage/'. $teste_torre_central['tensao_rt_semcarga_img'])}}"/>   
            </div>
        </div>
        <hr>
        <div class="row justify-content-center ">
            <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_com_carga')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $teste_torre_central['tensao_rs_comcarga']}}</span>
            </div>
            <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_com_carga')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $teste_torre_central['tensao_st_comcarga']}}</span>
            </div>
            <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_com_carga')</b>:</div>
            <div class="col-md-1">
                <span class="span-mobile-et">{{ $teste_torre_central['tensao_rt_comcarga']}}</span>
            </div>
        </div>

        <div class="row justify-content-center ">
            <div class="col-md-3">
                    <img src="{{ asset('storage/'. $teste_torre_central['tensao_rs_comcarga_img'])}}"/>   
            </div>
            <div class="col-md-3">
                    <img src="{{ asset('storage/'. $teste_torre_central['tensao_st_comcarga_img'])}}"/>   
            </div>
            <div class="col-md-3">
                    <img src="{{ asset('storage/'. $teste_torre_central['tensao_rt_comcarga_img'])}}"/>   
            </div>
        </div>
    </div>

    {{-- TESTES ELETRICOS --}}                               
    <div class="do-not-break espacamento-cabecalho mt-4">
        <div class="cor-fundo text-center">
            <h2><b>@lang('entregaTecnica.teste_bomba_cp')</b></h2>
        </div>
        @foreach ($teste_bombas as $bomba)
            <div class='mt-3'>                                    
                <div class="col-md-12 sub_titulo_ft text-center"><b>@lang('entregaTecnica.bomba') - {{ $bomba['id_testeh_mb'] }}</b></div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-md-2"><b>@lang('entregaTecnica.pressao_reg_fechado')</b>:</div>
                <div class="col-md-1">
                    <span class="span-mobile-et">{{ $bomba['pressao_reg_fechado']}}</span>
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.pressao_reg_aberto')</b>:</div>
                <div class="col-md-1">
                    <span class="span-mobile-et">{{ $bomba['pressao_reg_aberto']}}</span>
                </div>
                <div class="col-md-2"><b>@lang('entregaTecnica.pressao_centro')</b>:</div>
                <div class="col-md-1">
                    <span class="span-mobile-et">{{ $bomba['pressao_centro']}}</span>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-md-3">
                        <img src="{{ asset('storage/'. $bomba['pressao_reg_fechado_img'])}}"/>   
                </div>
                <div class="col-md-3">
                        <img src="{{ asset('storage/'. $bomba['pressao_reg_aberto_img'])}}"/>   
                </div>
                <div class="col-md-3">
                        <img src="{{ asset('storage/'. $bomba['pressao_centro_img'])}}"/>   
                </div>
            </div>
            <hr>

            <div class="row justify-content-center ">
                <div class="col-md-2"><b>@lang('entregaTecnica.pressao_ult_torre')</b>:</div>
                <div class="col-md-1">
                    <span class="span-mobile-et">{{ $bomba['pressao_ult_torre']}}</span>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div class="col-md-3">
                        <img src="{{ asset('storage/'. $bomba['pressao_ult_torre_img'])}}"/>   
                </div>
            </div>
        <hr>
            @foreach ($teste_chave_partida as $cp)
                @if ($cp['id_bomba'] == $bomba['id_testeh_mb'])      
                    <div class='mt-3'>
                        <div class="col-md-12 sub_titulo_ft text-center"><b>@lang('entregaTecnica.chave_partida') - {{ $cp['id_chave_partida'] }}</b></div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_sem_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['tensao_rs_semcarga']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_sem_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['tensao_st_semcarga']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_sem_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['tensao_rt_semcarga']}}</span>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['tensao_rs_semcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['tensao_st_semcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['tensao_rt_semcarga_img'])}}"/>   
                        </div>
                    </div>
                    <hr>

                    <div class="row justify-content-center ">
                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rs_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['tensao_rs_comcarga']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao_st_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['tensao_st_comcarga']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.tensao_rt_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['tensao_rt_comcarga']}}</span>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['tensao_rs_comcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['tensao_st_comcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['tensao_rt_comcarga_img'])}}"/>   
                        </div>
                    </div>
                    <hr>

                    <div class="row justify-content-center ">
                        <div class="col-md-2"><b>@lang('entregaTecnica.corrente_rs_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['corrente_rs_comcarga']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.corrente_st_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['corrente_st_comcarga']}}</span>
                        </div>
                        <div class="col-md-2"><b>@lang('entregaTecnica.corrente_rt_com_carga')</b>:</div>
                        <div class="col-md-1">
                            <span class="span-mobile-et">{{ $cp['corrente_rt_comcarga']}}</span>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['corrente_rs_comcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['corrente_st_comcarga_img'])}}"/>   
                        </div>
                        <div class="col-md-3">
                                <img src="{{ asset('storage/'. $cp['corrente_rt_comcarga_img'])}}"/>   
                        </div>
                    </div>
                    <hr>
                @endif                                      
            @endforeach
        @endforeach
    </div>
</div>