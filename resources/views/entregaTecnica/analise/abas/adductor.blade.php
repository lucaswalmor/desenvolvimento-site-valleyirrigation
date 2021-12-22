
<div class="container-fluid mt-5">
    <div class="table-responsive m-auto tabela" id="cssPreloader">
        <div class="d-flex justify-content-center col-md-12">
            <table class="table table-striped mx-auto text-center">
                <thead>
                    <tr>
                        <th scope="col">@lang('afericao.tipoCano')</th>
                        <th scope="col">@lang('afericao.diametro') @lang('unidadesAcoes.(pol)')</th>
                        <th scope="col">@lang('afericao.numeroCanos')</th>
                        <th scope="col">@lang('afericao.comprimento') @lang('unidadesAcoes.(m)')</th>
                        <th scope="col">@lang('entregaTecnica.fornecedor')</th>
                        <th scope="col">@lang('entregaTecnica.marca_tubo')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adutora as $iten) 
                            <tr>
                            <td>{{ __('listas.' . $iten['tipo_tubo']) }}</td>
                            <td>{{ $iten['diametro']}}</td>
                            <td>{{ $iten['numero_linha']}}</td>
                            <td>{{ $iten['comprimento']}}</td>
                            <td>{{ __('listas.' . $iten['fornecedor'] ) }}</td>
                            <td>{{ __('listas.' . $iten['marca_tubo'] ) }}</td>
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
                </tfoot>
            </table>
        </div>
    </div>
</div>