<div class="container-fluid mt-5">
    {{-- SUCÇÃO --}}
    <input type="hidden" name="succao_auxiliar_existente" id="succao_auxiliar_existente" value="{{$motobomba['succao_auxiliar']}}">
    <input type="hidden" name="succao_existente" id="succao_existente" value="{{$motobomba['tipo_succao']}}">
    <div class="do-not-break espacamento-cabecalho">
        <div class='row'>
            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_l') @lang('unidadesAcoes.(m)')</b></div>
            <div class="col-md-1">{{ $item['medicao_succao_l'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_h') @lang('unidadesAcoes.(m)')</b></div>
            <div class="col-md-1">{{ $item['medicao_succao_h'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_e') @lang('unidadesAcoes.(m)')</b></div>
            <div class="col-md-1">{{ $item['medicao_succao_e'] }}</div>

            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_diametro') @lang('unidadesAcoes.(pol)')</b></div>
            <div class="col-md-1">{{ $item['medicao_succao_diametro'] }}</div>
        </div>
        <div class="row">
            <div class="col-md-2 "><b>@lang('entregaTecnica.medicao_succao_tipo')</b></div>
            <div class="col-md-1">{{ $item['medicao_succao_tipo'] }}</div>
        </div>
        <div class="row mt-4">
            <div class="form-group col-md-4">
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
        </div>
    </div>
    <!-- Modal imagens torre central -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="" class="img_modal"/>   
                </div>
            </div>
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