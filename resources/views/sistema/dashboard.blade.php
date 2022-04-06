@extends('_layouts._layout_site')

@section('topo_detalhe')

    <div class="container-fluid topo">
        <div class="row align-items-start">

            {{-- TITULO E SUBTITULO --}}
            <div class="col-6 titulo-entrega-tecnica-mobile">
                <h1>@lang('dashboard.dashboard')</h1>
            </div>
        </div>
    </div>
@endsection

@section('conteudo')
    @if (empty(session()->has('fazenda') ))
        <div class="alert alert-dismissible fade show" role="alert" style="color: red; font-weigth: bold;">
            {!! Session::get('error') !!}
        </div>
    @endif
    <br/><br/>
    @include('_layouts._includes._alert')
    {{-- <div class="row justify-content-center">
        <div class="col-2">
            <div class="card">
                <div class="card-body">
                    <div class="titulo-card-et col-10">
                        <h4>Total Entrega Técnica</h4>
                    </div>
                    <div class="card-items">
                        <div class="valor col-8">
                            <span>{{ $total_et }}</span>
                        </div>
                        <div class="icon col-4">
                            <i class="fa-solid fa-arrow-trend-up fa-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div> --}}
    <table class="table table-striped mx-auto" id="filtertable">
        <thead>
            <tr class="text-center">
                <th>@lang('entregaTecnica.data')</th>
                <th>@lang('entregaTecnica.tipo_entrega_tecnica')</th>
                <th>@lang('entregaTecnica.numero_pedido')</th>
                <th>@lang('entregaTecnica.fazenda')</th>
                <th>@lang('entregaTecnica.proprietario')</th>
                <th>@lang('entregaTecnica.tecnico_responsavel')</th>
                <th>@lang('entregaTecnica.status')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($table_data as $item)
                <tr>
                    <td>{{ date('d/m/Y', strtotime($item['data_entrega_tecnica'])) }}</td>
                    <td>{{ __('entregaTecnica.' . $item['tipo_entrega_tecnica']) }}</td>
                    <td>{{ $item->numero_pedido }}</td>
                        <td>{{ $item['nome_fazenda'] }}</td>
                    <td>{{ $item['nome_proprietario'] }}</td>
                    <td>{{ $item['nome_usuario'] }}</td>
                    <td>
                        @if($item['status'] === 3)
                            @lang('entregaTecnica.analise')
                        @elseif($item['status'] === 4)
                            @lang('entregaTecnica.aprovada')
                        @else
                            @lang('entregaTecnica.corrigir')
                        @endif
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
        </tfoot>
    </table>

    @if (!empty($table_data))
        <div class="d-flex justify-content-center">
            {{ $table_data->links() }}
        </div>

    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-body">              
                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">              
                <figure class="highcharts-figure">
                    <div id="container2"></div>
                </figure>
                </div>
            </div>
        </div>
    </div>
    {{ $data }}
@endsection

@section('scripts')
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                // GRAPHIC TITLE
                text: "@lang('dashboard.total_entrega_tecnica_ano')",
            },
            subtitle: {
                // text: 'Source: WorldClimate.com'
            },
            xAxis: {
                type: 'category',
                // LOAD THE LABELS TO INDICATE WHAT EACH VALUE BAR IS
                categories: <?php echo json_encode($data['ano']) ?>,
                crosshair: true 
            },
            yAxis: {
                min: 0,
                title: {
                // text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                pointPadding: 0.2,
                borderWidth: 0
                }
            },
            series: [{
                name: 'Entrega Técnica',
                // DADOS QUE SERÃO INPUTADOS DENTRO DA TABELA
                data: [
                    {{ $total_et }}
                    // {{ implode(', ', total_et) }},
                ],
            }]
        });

        Highcharts.chart('container2', {
            chart: {
                type: 'column',
            },
            title: {
                // GRAPHIC TITLE
                text: "@lang('dashboard.total_entrega_tecnica_mes')"
            },
            subtitle: {
                // text: 'Source: WorldClimate.com'
            },
            xAxis: {
                type: 'category',
                // LOAD THE LABELS TO INDICATE WHAT EACH VALUE BAR IS
                categories: <?php echo json_encode($data['mes']) ?>,
                crosshair: true 
            },
            yAxis: {
                min: 0,
                title: {
                // text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                pointPadding: 0.2,
                borderWidth: 0
                }
            },
            series: [{
                name: 'Entrega Técnica',
                // DADOS QUE SERÃO INPUTADOS DENTRO DA TABELA
                data: [
                    {{ implode(', ', $data['total']) }},
                ],
            }]
        });
    </script>
@endsection
