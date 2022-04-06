<div class="container-fluid mt-5">
    <div class="table-responsive m-auto tabela" id="cssPreloader">
        <table class="table table-striped mx-auto text-center">
            <thead>
                <tr>
                    <th>@lang('entregaTecnica.diametro')</th>
                    <th>@lang('entregaTecnica.qtd_tubos')</th>
                    <th>@lang('entregaTecnica.motorredutor_potencia')</th>
                    <th>@lang('entregaTecnica.motorredutor_marca')</th>
                    <th>@lang('entregaTecnica.numero_serie')</th>
                    <th>@lang('entregaTecnica.comprimento_lance')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lances as $lance) 
                        <tr>
                        <td>{{ $lance['diametro_tubo']}}</td>
                        <td>{{ $lance['quantidade_tubo']}}</td>
                        <td>{{ $lance['motorredutor_potencia']}}</td>
                        <td>{{ $lance['motorredutor_marca']}}</td>
                        <td>{{ $lance['numero_serie'] }}</td>
                        <td>{{ $lance['comprimento_lance']}}</td>
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