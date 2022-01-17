@extends('_layouts._layout_site')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-cdc-mobile">
                <h1>@lang('entregaTecnica.entregaTecnica')</h1><br>
                <h4 style="margin-top: -20px">@lang('entregaTecnica.adutora') - @lang('comum.cadastrar')</h4>
            </div>

            {{-- BOTOES SALVAR E VOLTAR --}}
            <div class="col-6 text-right botoes mobile">
                <a href="{{ route('edit_technical_delivery', $id_entrega_tecnica) }}" style="color: #3c8dbc" data-toggle="tooltip"
                    data-placement="bottom" title="@lang('entregaTecnica.voltar')">
                    <button type="button">
                        <span class="fa-stack fa-lg">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-angle-double-left fa-stack-1x fa-inverse"></i>
                        </span>
                    </button>
                </a>

                <button type="button" id="botaosalvar" data-toggle="tooltip" data-placement="bottom" title="@lang('entregaTecnica.salvar')" name="botao" value="sair">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-save fa-stack-1x fa-inverse"></i>
                    </span>
                </button>

                <!-- modificação para botão salvar sair -->
                <button type="button" id="saveoutbutton" data-toggle="tooltip" data-placement="bottom" title="@lang('entregaTecnica.salvar_sair')">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-chevron-right fa-stack-1x fa-inverse" style="margin-left:15px;"></i>
                        <i class="fas fa-save fa-stack-1x fa-inverse"style=" margin-left:-6px;"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
        {{-- NAVTAB'S --}}
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">@lang('entregaTecnica.principais')</a>
            </li>
        </ul>

        {{-- FORMULARIO DE CADASTRO --}}
        <form action="{{ route('save_technical_delivery_water_supply') }}" method="post" class="mt-3" id="formdados">
            <div class="tab-content" id="myTabContent">
                <div id="alert">                
                    @include('_layouts._includes._alert')    
                </div>            
                <input type="hidden" name="id_entrega_tecnica" id="id_entrega_tecnica" value="{{ $id_entrega_tecnica }}">
                <input type="hidden" name="adutora" id="adutora" value="{{ count($adutoras) > 0 }}">
                <!-- modificação para botão salvar sair -->
                <input type="hidden" name="savebuttonvalue" id="savebuttonvalue" value="save">
                <div class="tab-pane fade show active formcdc" id="cadastro" role="tabpanel" aria-labelledby="cadastro-tab">
                    @csrf 

                    <div class="informativo">
                        <span class="removetablerow" style=""><i class="fas fa-exclamation-circle"></i></span> <span class="informacao">@lang('entregaTecnica.informacao_adutora')</span>
                    </div>

                    <div class="table-responsive m-auto tabela" id="cssPreloader">
                        @if ($adutoras > 0)         
                            <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('afericao.tipoCano')</th>
                                        <th scope="col">@lang('afericao.diametro') @lang('unidadesAcoes.(pol)')</th>
                                        <th scope="col">@lang('afericao.numeroCanos')</th>
                                        <th scope="col">@lang('afericao.comprimento') @lang('unidadesAcoes.(m)')</th>
                                        <th scope="col">@lang('entregaTecnica.fornecedor')</th>
                                        <th scope="col">@lang('entregaTecnica.marca_tubo')</th>
                                        <th scope="col">@lang('afericao.acoes')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adutoras as $adutora)                       
                                        <tr>
                                            <td>
                                                <select name="tipo_tubo[]" required class="form-control"  id="tipo_tubo_'{{ $adutora['id_adutora'] }}">
                                                    <option value=""></option>
                                                    @foreach ($tubos as $tubo)
                                                        <option value="{{ $tubo["tipo"] }}" {{ $tubo["tipo"] == $adutora["tipo_tubo"] ? 'selected' : '' }}>{{ __("listas." . $tubo["tipo"] ) }}</option>
                                                    @endforeach
                                                </select>
                                            </td>                
                                            <td><input type="number" class="form-control" required name="diametro[]" id="diametro_'{{ $adutora['id_adutora'] }}" value="{{ $adutora['diametro'] }}"></td>
                                            <td><input type="number" class="form-control" required name="numero_linha[]" id="numero_linha_'{{ $adutora['id_adutora'] }}" value="{{ $adutora['numero_linha'] }}"></td>
                                            <td><input type="number" min=1 class="form-control" required name="comprimento[]" id="comprimento_'{{ $adutora['id_adutora'] }}" value="{{ $adutora['comprimento'] }}"></td>
                                            <td>                                                          
                                                <select name="fornecedor[]" required class="form-control"  id="fornecedor_'{{ $adutora['id_adutora'] }}">
                                                    @foreach ($fornecedores as $fornecedor)
                                                        <option value="{{ $fornecedor["fornecedor"] }}" {{ $fornecedor["fornecedor"] == $adutora["fornecedor"] ? 'selected' : '' }}>{{ __("listas." . $fornecedor["fornecedor"] ) }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="marca_tubo[]" required class="form-control"  id="marca_tubo_'{{ $adutora['id_adutora'] }}">
                                                    <option value=""></option>
                                                    @foreach ($marcaTubos as $tubo)
                                                        <option value="{{ $tubo["marca"] }}" {{ $tubo["marca"] == $adutora["marca_tubo"] ? 'selected' : '' }}>{{ __("listas." . $tubo["marca"] ) }}</option>
                                                    @endforeach
                                                </select>                                                
                                            </td>
                                            <td>
                                                <button type="button" class="removetablerow" onclick="remove(this)"
                                                    style="outline: none; cursor: pointer; margin-top: 4px;"><i class="fa fa-fw fa-times fa-lg"></i>
                                                </button>
                                            </td>
                                        </tr>        
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <td>
                                        <button onclick="AddTableRow()" type="button" class="addtablerow" style="outline: none; cursor: pointer;">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-plus-circle fa-stack-2x"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tfoot>
                            </table>
                        @else 
                            <table class="table table-striped mx-auto text-center" id="tabelaTrechos">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('afericao.tipoCano')</th>
                                        <th scope="col">@lang('afericao.diametro') @lang('unidadesAcoes.(pol)')</th>
                                        <th scope="col">@lang('afericao.numeroCanos')</th>
                                        <th scope="col">@lang('afericao.comprimento') @lang('unidadesAcoes.(m)')</th>
                                        <th scope="col">@lang('afericao.fornecedor')</th>
                                        <th scope="col">@lang('afericao.marca_tubo')</th>
                                        <th scope="col">@lang('afericao.acoes')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <td>
                                        <button onclick="AddTableRow()" type="button" class="addtablerow"
                                            style="outline: none; cursor: pointer;">
                                            <span class="fa-stack fa-sm">
                                                <i class="fas fa-plus-circle fa-stack-2x"></i>
                                            </span>
                                        </button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tfoot>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </form>
@endsection

@section('scripts')

    {{-- COMBOS DE SELECTS --}}
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            
            $("#alert").fadeIn(300).delay(2000).fadeOut(400);
            var adutora = $('#adutora').val();
            if (adutora == 0) {
                AddTableRow();
            }
            
            $('#botaosalvar').on('click', function() {
                $('#formdados').submit();
            });

            /* modificação para botão salvar sair */
            $('#saveoutbutton').on('click', function() {  
                $("#savebuttonvalue").val("saveout");
                $('#formdados').submit();
            });      
        });
    </script>

    {{-- FUNÇÃO PARA REMOVER LINHAS DA TABELA --}}
    <script>

        (function($) {
            remove = function(item) {
                var tr = $(item).closest('tr');
                tr.fadeOut(400, function() {
                    tr.remove();
                });
                return false;
            }
        })(jQuery);

    </script>

    {{-- FUNÇÃO PARA ADICIONAR LINHAS A TABELA --}}
    <script>
        (function($) {
            AddTableRow = function() {

                var rowCount = $('#tabelaTrechos >tbody >tr').length;
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td hidden><input type="number" class="form-control" name="id_adutora[]" id="id_adutora_' + rowCount + '"></td>';
                
                cols += '<td>';
                cols += '   <select name="tipo_tubo[]" required class="form-control"  id="tipo_tubo_' + rowCount + '">';
                cols += '       <option value=""></option>';
                cols += '       @foreach ($tubos as $tubo)';
                cols += '           <option value="{{ $tubo["tipo"] }}" {{ $tubo["tipo"] == $adutora["tipo_tubo"]}}>{{ __("listas." . $tubo["tipo"] ) }}</option>';
                cols += '       @endforeach';
                cols += '   </select>';
                cols += '</td>';
                cols += '<td><input type="number" class="form-control" required name="diametro[]" id="diametro_' + rowCount + '"></td>';
                cols += '<td><input type="number" class="form-control" required name="numero_linha[]" id="numero_linha_' + rowCount + '"></td>';
                cols += '<td><input type="number" min=1 class="form-control" required name="comprimento[]" id="comprimento_' + rowCount + '"></td>';

                cols += '<td>';                                                          
                cols += '     <select name="fornecedor[]" required class="form-control"  id="fornecedor_"{{ $adutora["id_adutora"] }}">';
                cols += '          @foreach ($fornecedores as $fornecedor)';
                cols += '               <option value="{{ $fornecedor["fornecedor"] }}" {{ $fornecedor["fornecedor"] == $adutora["fornecedor"] ? "selected" : '' }}>{{ __("listas." . $fornecedor["fornecedor"] ) }}</option>';
                cols += '          @endforeach';
                cols += '     </select>';
                cols += '</td>';
                cols += '<td>';
                cols += '      <select name="marca_tubo[]" required class="form-control"  id="marca_tubo_"{{ $adutora["id_adutora"] }}">';
                cols += '           <option value=""></option>';
                cols += '               @foreach ($marcaTubos as $tubo)';
                cols += '                    <option value="{{ $tubo["marca"] }}" {{ $tubo["marca"] == $adutora["fornecedor"] ? "selected" : '' }}>{{ __("listas." . $tubo["marca"] ) }}</option>';
                cols += '           @endforeach';
                cols += '      </select>';
                cols += '</td>';

                if (rowCount > 0){
                    cols += '<td><button type="button" class="removetablerow" onclick="remove(this)" style="outline: none; cursor: pointer; margin-top: 4px;"><i class="fa fa-fw fa-times fa-lg"></i></button></td>';
                }
                newRow.append(cols);
                $("#tabelaTrechos").append(newRow);
                return false;
            };
        })(jQuery);

    </script>
@endsection
