@extends('_layouts._layout_site')
@include('_layouts._includes._head')

@section('head')
@endsection

@section('titulo')

@endsection

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- Titlle --}}
            <div class="col-6">
                <h1>@lang('pivos.pivos')</h1>
            </div>

            {{-- Save button an return button --}}
            <div class="col-6 text-right botoes position">
                <a href="{{ route('pivos.gerenciar') }}" style="color: #3c8dbc">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>
                <button type="button" id="botaosalvar">
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
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="cadastro-tab" data-bs-toggle="tab" role="tab" aria-controls="cadastro"
                    aria-current="page" aria-selected="true" href="#cadastro">Geral</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active formpivos" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">

                <form action="{{ route('pivos.salvar') }}" method="post" class="mt-3" id="formdados">
                    @csrf
                    <div class="col-md-12 position">
                        <div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="fabricante">@lang('pivos.fabricante')</label>
                                    <input type="text" class="form-control" id="fabricante" name="fabricante" maxlength="50"
                                        required>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="nome">@lang('pivos.nome')</label>
                                    <input type="text" class="form-control" id="nome" name="nome" maxlength="15" required>
                                </div>
                                <div class="form-group col-md-4 telo5ce position">
                                    <label for="espacamento">@lang('pivos.espacamento')</label>
                                    <input type="number" class="form-control" id="espacamento" name="espacamento"
                                        maxlength="50" required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-row justify-content-center">
                                <div class="col-md-12 telo5ce">
                                    <label for=""><span style="font-size: 16px"><b>Lance inicial</b></span> </label>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="saida_1_inicial">@lang('pivos.saida1')</label>
                                    <input type="text" class="form-control" id="saida_1_inicial" name="saida_1_inicial"
                                        maxlength="50" required>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="saida_2_inicial">@lang('pivos.saida2')</label>
                                    <input type="text" class="form-control" id="saida_2_inicial" name="saida_2_inicial"
                                        maxlength="50" required>
                                </div>
                                <div class="form-group col-md-4 telo5ce position">
                                    <label for="saida_3_inicial">@lang('pivos.saida3')</label>
                                    <input type="text" class="form-control" id="saida_3_inicial" name="saida_3_inicial"
                                        maxlength="50" required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-row justify-content-center">
                                <div class="col-md-12 telo5ce">
                                    <label for=""><span style="font-size: 16px"><b>Lance Intermediário</b></span></label>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="saida_1_intermediario">@lang('pivos.saida1')</label>
                                    <input type="text" class="form-control" id="saida_1_intermediario"
                                        name="saida_1_intermediario" maxlength="50" required>
                                </div>
                                <div class="form-group col-md-4 telo5ce">
                                    <label for="saida_2_intermediario">@lang('pivos.saida2')</label>
                                    <input type="text" class="form-control" id="saida_2_intermediario"
                                        name="saida_2_intermediario" maxlength="50" required>
                                </div>
                                <div class="form-group col-md-4 telo5ce position">
                                    <label for="saida_3_intermediario">@lang('pivos.saida3')</label>
                                    <input type="text" class="form-control" id="saida_3_intermediario"
                                        name="saida_3_intermediario" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });
        });

    </script>
    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            $("#formdados").validate({
                rules: {
                    "fabricante": {
                        required: true
                    },
                    "nome": {
                        required: true
                    },
                    "espacamento": {
                        required: true
                    },
                    "saida_1_inicial": {
                        required: true
                    },
                    "saida_2_inicial": {
                        required: true
                    },
                    "saida_3_inicial": {
                        required: true
                    },           
                    "saida_1_intermediario": {
                        required: true
                    },
                    "saida_2_intermediario": {
                        required: true
                    },
                    "saida_3_intermediario": {
                        required: true
                    }
                },
                messages: {
                    fabricante: "Campo <strong>FABRICANTE</strong> é obrigatório",

                    "nome": {
                        required: "Campo <strong>MODELO</strong> é obrigatório"
                    },
                    "espacamento": {
                        required: "Campo <strong>ESPAÇAMENTO</strong> é obrigatório"
                    },
                    "saida_1_inicial": {
                        required: "Campo <strong>1° SAÍDA INICIAL</strong> é obrigatório"
                    },
                    "saida_2_inicial": {
                        required: "Campo <strong>2° SAÍDA INICIAL</strong> é obrigatório"
                    },
                    "saida_3_inicial": {
                        required: "Campo <strong>3° SAÍDA INICIAL</strong> é obrigatório"
                    },
                    "saida_1_intermediario": {
                        required: "Campo <strong>1° SAÍDA INTERMEDIÁRIA</strong> é obrigatório"
                    },                    
                    "saida_2_intermediario": {
                        required: "Campo <strong>2° SAÍDA INTERMEDIÁRIA</strong> é obrigatório"
                    },
                    "saida_3_intermediario": {
                        required: "Campo <strong>3° SAÍDA INTERMEDIÁRIA</strong> é obrigatório",
                    }              
                }
            });
        });

    </script>
@endsection