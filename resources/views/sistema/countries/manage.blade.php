@extends('_layouts._layout_admsystem')
@include('_layouts._includes._head_admsystem')

@section('topo_detalhe')
    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- Title and SubTitle --}}
            <div class="col-6">
                <h1>@lang('countries.country')</h1><br>
                <h4 style="margin-top: -20px">@lang('comum.gerenciar')</h4>
            </div>

            {{-- Log/Create Button --}}
            <div class="col-6 text-right mobile">
                <a href="{{ route('country_create') }}" data-toggle="tooltip" data-placement="left" title="Cadastrar País">
                    <span><i class="fas fa-plus-circle fa-3x"></i></span>
                </a>
            </div>
        </div>

        {{-- Filter Search Input --}}
        <div class="row justify-content-end telo5inputfiltro mt-3">
            <div class="col-3 position">
                <form action="{{ route('country_filter') }}" method="POST" class="form form-inline">
                    @csrf
                    <input class="form-control" name="filter" type="text" placeholder="@lang('comum.pesquisar')" />
                    <button type="submit" class="btn btn-primary search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
    @include('_layouts._includes._alert')
    <div class="col-md-11 m-auto tabela">
        <table class="table table-striped mx-auto" id="filtertable">
            @csrf
            <thead class="headertable">
                <tr class="text-center">
                    <th>@lang('countries.nameCountry')</th>
                    <th>@lang('countries.codPais')</th>
                    <th>@lang('countries.codPhone')</th>
                    <th>@lang('countries.sisMedidas')</th>
                    <th>@lang('countries.undTemperatura')</th>
                    <th>@lang('countries.dataForm')</th>
                    <th>@lang('countries.numForm')</th>
                    <th>@lang('countries.idioma')</th>
                    <th>@lang('sidenav.acoes')</th>
                </tr>
            </thead>

            <tbody>
                @foreach($country as $dados)
                    <tr class="text-center">
                        <td>{{ $dados->name }}</td>
                        <td>{{ $dados->code }}</td>
                        <td>{{ $dados->phone_code }}</td>
                        <td>
                            @if($dados->sistema_medida == 1)
                                @lang('countries.sisMetrico')
                            @endif
                            @if($dados->sistema_medida == 2)
                                @lang('countries.sisImperial')
                            @endif
                        </td>
                        <td>
                            @if($dados->unidade_medida == 1)
                                @lang('countries.celsius')
                            @endif
                            @if($dados->unidade_medida == 2)
                                @lang('countries.farenheit')
                            @endif
                        </td>
                        <td>
                            @if($dados->formato_data == 1)
                                @lang('countries.dataForm1')
                            @endif
                            @if($dados->formato_data == 2)
                                @lang('countries.dataForm2')
                            @endif
                            @if($dados->formato_data == 3)
                                @lang('countries.dataForm3')
                            @endif
                        </td>
                        <td>
                             @if($dados->formato_data == 1)
                                @lang('countries.numForm1')
                            @endif
                            @if($dados->formato_data == 2)
                                @lang('countries.numForm2')
                            @endif
                        </td>
                        <td>
                             @if($dados->idioma_padrao == 1)
                                @lang('countries.idioma1')
                            @endif
                            @if($dados->idioma_padrao == 2)
                                @lang('countries.idioma2')
                            @endif
                            @if($dados->idioma_padrao == 3)
                                @lang('countries.idioma3')
                            @endif
                        </td>
                        <td class="acoes">
                            <a href="{{ route('country_edit', $dados->id) }}"><button type="button" class="botaoTabela"><i class='fa fa-fw fa-pen'></i></button></a>
                            <button type="submit" class="botaoTabela" data-toggle="modal" data-target="#modalDeletar-{{ $dados->id }}"><i class='fa fa-fw fa-times'></i></button>

                            {{-- Modal Confirm Delete Action --}}
                            <div class="modal fade" id="modalDeletar-{{ $dados->id }}" tabindex="-1" aria-labelledby="modalDeletar" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>@lang('comum.centrodecusto') {{ $dados->name }} <br>
                                                @lang('comum.excluir')
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ action('Sistema\CountryController@deleteCountry',$dados->id) }}" method="POST" class="delete_form float-right"> {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('comum.nao')</button>
                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">@lang('comum.sim')</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $country->links() }}
    </div>
    @endsection

    @section('scripts')
        <script>
            // Script Filter Search on table
            $(document).ready(function() {
                $("#filtrotabela").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#filtertable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

        {{-- ToolTip funcionality script --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
    @endsection
