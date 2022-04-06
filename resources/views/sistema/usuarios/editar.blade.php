@extends('_layouts._layout_admsystem')
@include('_layouts._includes._head_admsystem')

@section('head')
@endsection

@section('titulo')
    @lang('usuarios.usuarios')
@endsection

@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6">
                <h1>@lang('usuarios.usuarios')</h1>
                <h4 style="margin-top: -2px">@lang('comum.editar')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes">
                <a href="{{ route('usuarios_manager') }}" style="color: #3c8dbc" data-toggle="tooltip"
                    data-placement="bottom" title="Voltar">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>
                <button type="button" id="botaosalvar" data-toggle="tooltip" data-placement="bottom" title="Salvar">
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
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="cadastro-tab" data-toggle="tab" role="tab" aria-controls="cadastro"
                aria-selected="true" href="#cadastro">@lang('comum.informacoes_navtabs')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab" aria-controls="permissions"
                aria-selected="false">@lang('comum.permissions')</a>
            </li>
        </ul>

        {{-- PRELOADER --}}
        <div id="coverScreen">
            <div class="preloader">
                <i class="fas fa-circle-notch fa-spin fa-2x"></i>
                <div>@lang('comum.preloader')</div>
            </div>
        </div>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('usuario_update') }}" method="post" class="mt-3" id="formdados">
            <div class="tab-content" id="myTabContent">
                @include('_layouts._includes._alert')
                <div class="tab-pane fade show active" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf
                    <div class="col-md-12 position" id="cssPreloader">
                        <input type="hidden" name="id" value="{{ $usuarios->id }}">
                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="nome">@lang('usuarios.nome')</label>
                                <input type="text" class="form-control telo5ce" id="nome" name="nome" maxlength="50"
                                    value="{{ $usuarios->nome }}">
                            </div>

                            @php
                                $typeUserDesc = "";

                                if($usuarios->tipo_usuario == 0){
                                    $typeUserDesc = __("usuarios.administrador");
                                } 
                                else if($usuarios->tipo_usuario == 1){
                                    $typeUserDesc = __("usuarios.gerente");
                                }
                                else if($usuarios->tipo_usuario == 2){
                                    $typeUserDesc = __("usuarios.supervisor");
                                }
                                else if($usuarios->tipo_usuario == 3){
                                    $typeUserDesc = __("usuarios.consultor");
                                }
                                else if($usuarios->tipo_usuario == 4){
                                    $typeUserDesc = __("usuarios.assistente");
                                }
                            @endphp

                            <div class="form-group col-md-3 position telo5ce">
                                <label for="tipo_usuario">@lang('usuarios.tipo_usuario')</label><br>
                                <select name="tipo_usuario" id="tipo_usuario" class="form-control position telo5ce"
                                    onchange="etrocarDivAtivaSuperior()">
                                    <option value="0" {{ $usuarios->tipo_usuario == '0' ? 'selected' : '' }}>@lang("usuarios.administrador")</option>
                                    <option value="1" {{ $usuarios->tipo_usuario == '1' ? 'selected' : '' }}>@lang("usuarios.gerente")</option>
                                    <option value="2" {{ $usuarios->tipo_usuario == '2' ? 'selected' : '' }}>@lang("usuarios.supervisor")</option>
                                    <option value="3" {{ $usuarios->tipo_usuario == '3' ? 'selected' : '' }}>@lang("usuarios.consultor")</option>
                                    <option value="4" {{ $usuarios->tipo_usuario == '4' ? 'selected' : '' }}>@lang("usuarios.assistente")</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="telefone">@lang('usuarios.telefone')</label>
                                <input type="tel" class="form-control telo5ce" id="telefone" name="telefone"
                                    maxlength="15" value="{{ $usuarios->telefone }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="pais">@lang('usuarios.pais')</label><br>
                                <input type="hidden" name="pais" id="pais" />
                                <select required name="id_country" id="id_country" class="form-control telo5ce">
                                    <option value="{{ $usuarios->id_country }}">{{ $usuarios->pais }}</option>
                                @foreach ($countries as $datas)
                                    <option value="{{ $datas['name'] }}">{{ $datas['name'] }}</option>
                                @endforeach
                                </select>
                            </div>
                            </div>

                        <div class="form-row justify-content-start">
                            
                            <div class="form-group col-md-3 telo5ce">
                                <label for="cep">@lang('usuarios.cep')</label>
                                <input type="text" class="form-control telo5ce" id="cep" name="cep" maxlength="10"
                                    value="{{ $usuarios['cep'] }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="rua">@lang('usuarios.rua')</label>
                                <input type="text" class="form-control telo5ce" id="rua" name="rua" maxlength="100"
                                    value="{{ $usuarios->rua }}">
                            </div>
                            <div class="form-group col-md-3 position telo5ce">
                                <label for="cidade">@lang('usuarios.cidade')</label>
                                <input type="text" class="form-control position telo5ce" id="cidade" name="cidade"
                                    maxlength="60" value="{{ $usuarios->cidade }}">
                            </div>
                            <div class="form-group col-md-3 telo5ce">
                                <label for="estado">@lang('usuarios.estado')</label>
                                <input type="text" class="form-control telo5ce" id="estado" name="estado" maxlength="60"
                                    value="{{ $usuarios->estado }}">
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class="form-group col-md-3 telo5ce">
                                <label for="email">@lang('usuarios.email')</label>
                                <input type="email" class="form-control telo5ce" id="email" name="email" maxlength="100"
                                    value="{{ $usuarios->email }}">
                            </div>
                            <div class="form-group col-md-3 position telo5ce">
                                <label for="configuracao_idioma">@lang('usuarios.idioma')</label><br>
                                <select name="configuracao_idioma" id="configuracao_idioma"
                                    class="form-control position telo5ce">
                                    <option value="0" {{ $usuarios->configuracao_idioma == '0' ? 'selected' : '' }}>pt-BR</option>
                                    <option value="1" {{ $usuarios->configuracao_idioma == '1' ? 'selected' : '' }}>EN</option>
                                    <option value="2" {{ $usuarios->configuracao_idioma == '2' ? 'selected' : '' }}>ES</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class='form-group telo5ce col-md-3' id='edivSupervisor'>
                                <label for="tipo_usuario">@lang('usuarios.superior')</label>
                                <select name="superior_s" id="esuperior_s" class='form-control' required>
                                    <option value=""></option>
                                    @foreach ($usuarios_superiores as $item)
                                        @if ($item->tipo_usuario == 1)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="line"></div>
                            </div>

                            <div class='form-group telo5ce col-md-3' id='edivConsultor'>
                                <label for="tipo_usuario">@lang('usuarios.superior')</label>
                                <select name="superior_c" id="esuperior_c" class='form-control' required>
                                    <option value=""></option>
                                    @foreach ($usuarios_superiores as $item)
                                        @if ($item->tipo_usuario == 1 || $item->tipo_usuario == 2)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="line"></div>
                            </div>

                            <div class='form-group telo5ce col-md-3' id='edivAssistente'>
                                <label for="tipo_usuario">@lang('usuarios.superior')</label>
                                <select name="superior_a" id="esuperior_a" class='form-control' required>
                                    <option value=""></option>
                                    @foreach ($usuarios_superiores as $item)
                                        @if ($item->tipo_usuario == 3)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="line"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-start">
                            <div class='form-group telo5ce col-md-3' id="edivCentroCusto">
                                <label for="cdcs">@lang('usuarios.centrodecustos')</label>
                                <select class='form-control telo5ce' name="cdcs[]" id="ecdcs">
                                        <option value=""></option>
                                    @foreach ($cdcs as $item)
                                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PERMISSIONS --}}
                <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">
                    <div class="col-md-12">
                        <div class="table mx-auto">
                            <div class="form-row justify-content  ml-4 mt-4 telo5ce formulario-bocais-mobile">
                                <div class="col-md-3">
                                    <label for="user_name">@lang('usuarios.userName')</label>
                                    <input type="text" class="form-control telo5ce" id="user_name" name="user_name" readonly />
                                </div>
                                <div class="col-md-3">
                                    <label for="type_user">@lang('usuarios.tipo_usuario')</label>
                                    <input type="text" class="form-control telo5ce" id="type_user" name="type_user" readonly />
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive m-auto tabela">
                            <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                <thead class="headertable">
                                    <tr class="text-center">
                                        <th scope="col-5">@lang('comum.modules')</th>
                                        <th scope="col-5">@lang('comum.rules')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $modulesLang as $module )
                                    <tr>
                                        <td class="col-md-2" style="width: 40%;">
                                            <input type="hidden" id="id_module" name="id_module[]" value="{{ $module['id_module'] }}"/>
                                            <h4>{{ $module['description'] }}</h4>
                                        </td>
                                        @php
                                            $permissionModule = 0;

                                            foreach($userPermissions as $permission) {
                                                if($permission['id_module'] == $module['id_module']){
                                                    $permissionModule = $permission['permissions'];
                                                    break;
                                                }
                                            }

                                        @endphp
                                        <td class="col-md-2" style="width: 40%;">
                                            <select class="form-control telo5ce" name="permissions[]" id="permissions">
                                                @foreach ( $rolesList as $roles )
                                                    <option value="{{ $roles['id'] }}" {{ ($roles['id'] == $permissionModule) ? 'selected' : ''}}>@lang($roles['role'])</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td></td>
                                    <td></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

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
                    "nome": {
                        required: true
                    },
                    "rua": {
                        required: true
                    },
                    "cep": {
                        required: true
                    },
                    "cidade": {
                        required: true
                    },
                    "telefone": {
                        required: true
                    },
                    "estado": {
                        required: true
                    },
                    "pais": {
                        required: true
                    },
                    "email": {
                        required: true,
                        email: true
                    },
                    "password": {
                        required: true
                    },
                    "confirmar_senha": {
                        required: true
                    }
                },
                messages: {
                    nome: "@lang('validate.validate')",

                    "rua": {
                        required: "@lang('validate.validate')"
                    },
                    "cep": {
                        required: "@lang('validate.validate')"
                    },
                    "cidade": {
                        required: "@lang('validate.validate')"
                    },
                    "telefone": {
                        required: "@lang('validate.validate')"
                    },
                    "estado": {
                        required: "@lang('validate.validate')"
                    },
                    "pais": {
                        required: "@lang('validate.validate')"
                    },
                    "email": {
                        required: "@lang('validate.validate')"
                    },
                    "password": {
                        required: "@lang('validate.validate')"
                    },
                    "confirmar_senha": {
                        required: "@lang('validate.validate')"
                    }
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
            verifyInputs("{{ $usuarios->nome }}", "{{ $typeUserDesc }}");
            $("#coverScreen").hide();
        });
    </script>

    {{-- SCRIPT PARA FUNCIONALIDADE DO TOOLTIP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Includes to combobox style -->
    <script type="text/javascript">
        $(document).ready(function() {
            trocarDivAtivaSuperior();
            etrocarDivAtivaSuperior();
            verifyInputsIsEmpty();
            
            $('#edivSuperiores').show();

            $("#formAdicionar").submit(function(e) {
                if (!checkIfPasswordsMatch()) {
                    alert("{{ __('usuarios.senhasNaoBatem') }}");
                    return false;
                }
            });

            $("#formEditar").submit(function(e) {
                if (!checkIfPasswordsEditMatch()) {
                    alert("{{ __('usuarios.senhasNaoBatem') }}");
                    return false;
                }
            });

            $('#nome').on('change',function() {
                var userName = $('#nome').val();
                $('#user_name').val(userName);
            });

            $('#tipo_usuario').on('change',function() {
                var typeUser = $('#tipo_usuario :selected').text();
                $('#type_user').val(typeUser);
            });

            $('#id_country').on('change',function() {
                var country = $('#id_country :selected').text();
                $('#pais').val(country);
            });

        });

        function verifyInputs(userName, typeUser){
                    $('#user_name').val(userName);
            $('#type_user').val(typeUser);
            }

        function verifyInputsIsEmpty(){
            var country = $('#id_country').val();

            if( country != '' || country != null ){
                var country = $('#id_country :selected').text();
                $('#pais').val(country);
            }
        }

        function trocarDivAtivaSuperior() {
            var papel = $('#tipo_usuario').val();
            togleDivCentroCustos(papel);
            var divAssist = $('#divAssistente');
            var divConsult = $('#divConsultor');
            var divSup = $('#divSupervisor');
            var fieldAssist = $("#superior_a");
            var fieldConsult = $("#superior_c");
            var fieldSup = $("#superior_s");
            if (papel == 2) {
                divAssist.hide();
                divConsult.hide();
                divSup.show();
                fieldAssist.removeAttr('required');
                fieldConsult.removeAttr('required');
                fieldSup.attr('required', 'required');
            } else if (papel == 3) {
                divAssist.hide();
                divConsult.show();
                divSup.hide();
                fieldAssist.removeAttr('required');
                fieldSup.removeAttr('required');
                fieldConsult.attr('required', 'required');
            } else if (papel == 4) {
                divAssist.show();
                divConsult.hide();
                divSup.hide();
                fieldSup.removeAttr('required');
                fieldConsult.removeAttr('required');
                fieldAssist.attr('required', 'required');
            } else {
                divAssist.hide();
                divConsult.hide();
                divSup.hide();
                fieldSup.removeAttr('required');
                fieldConsult.removeAttr('required');
                fieldAssist.removeAttr('required');
            }
        }

        $('#editar').on('shown.bs.modal', function(e) {
            etrocarDivAtivaSuperior();
        })

        function togleDivCentroCustos(papel) {
            var divCDC = $('#divCentroCusto');
            if (papel == 0) {
                divCDC.hide();
                $("#cdcs").removeAttr('required');
            } else {
                divCDC.show();
                $("#cdcs").attr('required', 'required');
            }
        }


        function etrocarDivAtivaSuperior() {
            $('#edivSuperiores').hide();
            $('#trocarSuperior').hide();
            var papel = $('#etipo_usuario').val();
            etogleDivCentroCustos(papel);
            var divAssist = $('#edivAssistente');
            var divConsult = $('#edivConsultor');
            var divSup = $('#edivSupervisor');
            var fieldAssist = $("#esuperior_a");
            var fieldConsult = $("#esuperior_c");
            var fieldSup = $("#esuperior_s");
            if (papel == 2) {
                divAssist.hide();
                divConsult.hide();
                divSup.show();
                fieldAssist.removeAttr('required');
                fieldConsult.removeAttr('required');
                fieldSup.attr('required', 'required');
            } else if (papel == 3) {
                divAssist.hide();
                divConsult.show();
                divSup.hide();
                fieldAssist.removeAttr('required');
                fieldSup.removeAttr('required');
                fieldConsult.attr('required', 'required');
            } else if (papel == 4) {
                divAssist.show();
                divConsult.hide();
                divSup.hide();
                fieldSup.removeAttr('required');
                fieldConsult.removeAttr('required');
                fieldAssist.attr('required', 'required');
            } else {
                divAssist.hide();
                divConsult.hide();
                divSup.hide();
                fieldSup.removeAttr('required');
                fieldConsult.removeAttr('required');
                fieldAssist.removeAttr('required');
            }
        }

        function etogleDivCentroCustos(papel) {
            var divCDC = $('#edivCentroCusto');
            if (papel == 0) {
                divCDC.hide();
                $("#ecdcs").removeAttr('required');
            } else {
                divCDC.show();
                $("#ecdcs").attr('required', 'required');
            }
        }

        function checkIfPasswordsMatch() {
            let senha1 = $("#password").val();
            let senha2 = $("#confirmpassword").val();
            if (senha1 !== "" && senha1 === senha2) {
                return true;
            } else {
                return false;
            }
        }


        function checkIfPasswordsEditMatch() {
            let senha1 = $("#epassword").val();
            let senha2 = $("#econfirmpassword").val();
            if (senha1 === "" || senha1 === senha2) {
                return true;
            } else {
                return false;
            }
        }

    </script>

    <script type="text/javascript">
        window.onload = function() {
            if (!empty($filtro['tipo_usuario'])) '{{ $filtro['tipo_usuario'] }}'
            else ''
            endif).change();
        }
        $('#editar').on('shown.bs.modal', function(e) {
            $("#ecdcs").selectpicker('refresh');
        })

    </script>
@endsection
