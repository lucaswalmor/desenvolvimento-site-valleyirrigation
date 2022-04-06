@extends('_layouts._layout_admsystem')
@include('_layouts._includes._head_admsystem')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">
            {{-- Title --}}
            <div class="col-6">
                <h1>@lang('countries.country')</h1><br>
                <h4 style="margin-top: -20px">@lang('comum.cadastrar')</h4>
            </div>

            {{-- BOTOES VOLTAR E SALVAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('country_manage') }}" style="color: #3c8dbc" data-toggle="tooltip" data-placement="bottom" title="@lang('comum.voltar')">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>
                <button type="button" id="botaosalvar" data-toggle="tooltip" data-placement="bottom" title="@lang('comum.salvar')">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-save fa-stack-1x fa-inverse"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
    <div>
        {{-- NAVTAB'S --}}
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="cadastro-tab" data-bs-toggle="tab" role="tab" aria-controls="cadastro" aria-current="page" aria-selected="true" href="#cadastro">@lang('comum.informacoes_navtabs')</a>
            </li>
        </ul>

        {{-- PRELOADER --}}
        <div id="coverScreen">
            <div class="preloader">
                <i class="fas fa-circle-notch fa-spin fa-2x"></i>
                <div>@lang('comum.preloader')</div>
            </div>
        </div>

        {{-- Log/Create Form --}}
        <form action="{{ route('country_save') }}" method="post" class="mt-3" id="formdados" autocomplete="off">
            @csrf
            <div class="tab-content" id="myTabContent">
                @include('_layouts._includes._alert')
                <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    <div class="col-12" id="cssPreloader">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-12 telo5ce">
                                        <label for="code">@lang('countries.nameCountry') @lang('countries.idioma1')</label>
                                        <input type="text" class="form-control telo5ce" id="inputPTBR" name="inputPTBR" maxlength="50" required
                                               style="text-transform: capitalize;" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 telo5ce">
                                        <label for="code">@lang('countries.nameCountry') @lang('countries.idioma2')</label>
                                        <input type="text" class="form-control telo5ce" id="inputEN" name="inputEN" maxlength="50" required
                                               style="text-transform: capitalize;" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 telo5ce">
                                        <label for="code">@lang('countries.nameCountry') @lang('countries.idioma3')</label>
                                        <input type="text" class="form-control telo5ce" id="inputES" name="inputES" maxlength="50" required
                                               style="text-transform: capitalize;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="code">@lang('countries.codPais')</label>
                                        <input type="text" class="form-control" id="code" name="code" maxlength="50" required autocomplete="off" style="text-transform: uppercase">
                                    </div>

                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="phone_code">@lang('countries.codPhone')</label>
                                        <input type="number" class="form-control" id="phone_code" name="phone_code" maxlength="50" required autocomplete="off">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="sistema_medida">@lang('countries.sisMedidas')</label>
                                        <select class="form-control selectized" name="sistema_medida" id="sistema_medida">
                                            <option value=""></option>
                                            <option value="1">@lang('countries.sisMetrico')</option>
                                            <option value="2">@lang('countries.sisImperial')</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="unidade_medida">@lang('countries.undTemperatura')</label>
                                        <select class="form-control selectized" name="unidade_medida" id="unidade_medida">
                                            <option value=""></option>
                                            <option value="1">@lang('countries.celsius')</option>
                                            <option value="2">@lang('countries.farenheit')</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="formato_data">@lang('countries.dataForm')</label>
                                        <select class="form-control selectized" name="formato_data" id="formato_data">
                                            <option value=""></option>
                                            <option value="1">@lang('countries.dataForm1')</option>
                                            <option value="2">@lang('countries.dataForm2')</option>
                                            <option value="3">@lang('countries.dataForm3')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="formato_numero">@lang('countries.numForm')</label>
                                        <select class="form-control selectized" name="formato_numero" id="formato_numero">
                                            <option value=""></option>
                                            <option value="1">@lang('countries.numForm1')</option>
                                            <option value="2">@lang('countries.numForm2')</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 telo5ce">
                                        <label for="idioma_padrao">@lang('countries.idioma')</label>
                                        <select class="form-control selectized" name="idioma_padrao" id="idioma_padrao">
                                            <option value=""></option>
                                            <option value="1">@lang('countries.idioma1')</option>
                                            <option value="2">@lang('countries.idioma2')</option>
                                            <option value="3">@lang('countries.idioma3')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    {{-- SCRIPT DE FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    {{-- FILTRO SELECT --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
            integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    {{-- SALVAR E VALIDAR CAMPOS VAZIOS --}}
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            $("#formdados").validate({
                rules: {
                    "inputPTBR[]": {
                        required: true
                    },
                    "inputEN[]": {
                        required: true
                    },
                    "inputES[]": {
                        required: true
                    },
                    "sistema_medida[]": {
                        required: true
                    },
                    "unidade_medida[]": {
                        required: true
                    },
                    "formato_data[]": {
                        required: true
                    },
                    "formato_numero[]": {
                        required: true
                    },
                    "idioma_padrao[]": {
                        required: true
                    },
                    "code_language[]": {
                        required: true
                    },
                    "code[]": {
                        required: true
                    },
                    "phone_code[]": {
                        required: true
                    }
                },
                messages: {
                    "inputPTBR": "@lang('validate.validate')",

                    "inputEN": {
                        required: "@lang('validate.validate')"
                    },
                    "inputES": {
                        required: "@lang('validate.validate')"
                    },
                    "sistema_medida": {
                        required: "@lang('validate.validate')"
                    },
                    "unidade_medida": {
                        required: "@lang('validate.validate')"
                    },
                    "formato_data": {
                        required: "@lang('validate.validate')"
                    },
                    "formato_numero": {
                        required: "@lang('validate.validate')"
                    },
                    "idioma_padrao": {
                        required: "@lang('validate.validate')"
                    },
                    "code_language": {
                        required: "@lang('validate.validate')"
                    },
                    "code": {
                        required: "@lang('validate.validate')"
                    },
                    "phone_code": {
                        required: "@lang('validate.validate')"
                    },

                },
                submitHandler: function(form) {
                    $("#coverScreen").show();
                    $("#cssPreloader input").each(function() {
                        $(this).css('opacity', '0.2');
                    });
                    $("#cssPreloader select").each(function() {
                        $(this).css('opacity', '0.2');
                    });
                    form.submit();
                }
            });
        });

        $(window).on('load', function() {
            $("#coverScreen").hide();
        });
    </script>
@endsection
