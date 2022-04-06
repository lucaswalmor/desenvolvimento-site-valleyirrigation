<style>
    .table tr th, td {
        font-size: 15px !important;
    }
</style>
<input type="hidden" name="succao_auxiliar_existente" id="succao_auxiliar_existente" value="{{$motobomba['succao_auxiliar']}}">
<input type="hidden" name="succao_existente" id="succao_existente" value="{{$motobomba['tipo_succao']}}">

<div class="row mt-5">
    <div class="d-flex justify-content-center form-group col-md-5">
        <div class="card" style="width: 335px;">
            <div class="card-body">
                <img src="{{ asset('img/image_none.png')}}" id="myImg" alt="none" class="img-fluid img-succao">
                <img src="{{ asset('img/img_succao/afogadaPb.png') }}" id="afogada" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                <img src="{{ asset('img/img_succao/diretaPb.png') }}" id="direta" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                <img src="{{ asset('img/img_succao/poçosPb.png') }}" id="poços" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                <img src="{{ asset('img/img_succao/balsaPb.png') }}" id="balsa" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
                <img src="{{ asset('img/img_succao/submersaPb.png') }}" id="submersa" class="img-fluid img-succao abrirModal" onclick="abrirImg(this);" style="display: none">
            </div>
        </div>
    </div>     

    <div class="col-md-6">
        <div class="table-responsive m-auto tabela" id="cssPreloader">
            <table class="table table-striped mx-auto text-center">
                <thead>
                    <tr>
                        <th>@lang('entregaTecnica.medicao_succao_l')@lang('unidadesAcoes.(m)')</th>
                        <th>@lang('entregaTecnica.medicao_succao_h')@lang('unidadesAcoes.(m)')</th>
                        <th>@lang('entregaTecnica.medicao_succao_e')@lang('unidadesAcoes.(m)')</th>
                        <th>@lang('entregaTecnica.medicao_succao_diametro') @lang('unidadesAcoes.(pol)')</th>
                        <th>@lang('entregaTecnica.medicao_succao_tipo')</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item['medicao_succao_l']}}</td>
                        <td>{{ $item['medicao_succao_h']}}</td>
                        <td>{{ $item['medicao_succao_e']}}</td>
                        <td>{{ $item['medicao_succao_diametro']}}</td>
                        <td>{{ $item['medicao_succao_tipo']}}</td>
                    </tr>
                </tbody>
                <tfoot>
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
<script>
    
    function abrirImg() {
        var url = $(this).attr("src");
        $("#modal img").attr("src", url);
        $("#modal").modal("show");
    }
  
    function imgSalvaBD() {
        var img_auxiliar = $('#succao_auxiliar_existente').val();
        var img_succao = $('#succao_existente').val();

        switch (img_succao) {
            case 'direta':
                $('#direta').show();
                $('#myImg').hide();
                $('#afogada').hide();
                $('#poços').hide();
                $('#submersa').hide();
                $('#balsa').hide();
                break;
            case 'afogada':
                $('#afogada').show();
                $('#myImg').hide();
                $('#direta').hide();
                $('#poços').hide();
                $('#submersa').hide();
                $('#balsa').hide();
                break;
            case 'pocos':
                $('#poços').show();
                $('#myImg').hide();
                $('#direta').hide();
                $('#afogada').hide();
                $('#submersa').hide();
                $('#balsa').hide();
                break;
            default :
                $('#myImg').show();     
                $('#balsa').hide();
                $('#direta').hide();
                $('#afogada').hide();
                $('#poços').hide();
                $('#submersa').hide();                   
        }            

        switch (img_auxiliar) {                
                case 'submersa': 
                    $('#submersa').show();
                    $('#myImg').hide();
                    $('#direta').hide();
                    $('#afogada').hide();
                    $('#poços').hide();
                    $('#balsa').hide();
                    break;
                case  'balsa': 
                    $('#balsa').show();
                    $('#myImg').hide();
                    $('#direta').hide();
                    $('#afogada').hide();
                    $('#poços').hide();
                    $('#submersa').hide();
                    break;
            }
    }

    $(document).ready(function() {
        imgSalvaBD();
    });       
</script>