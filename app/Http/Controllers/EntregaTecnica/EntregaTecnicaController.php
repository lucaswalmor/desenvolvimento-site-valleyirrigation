<?php

namespace App\Http\Controllers\EntregaTecnica;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Constantes\Notificacao;
use Illuminate\Support\Facades\DB;
use App\Classes\Sistema\Revendas;
use App\Classes\Sistema\Proprietario;
use App\Classes\Sistema\Fazenda;
use App\Classes\EntregaTecnica\EntregaTecnica;
use App\Classes\EntregaTecnica\EntregaTecnicaAdutora;
use App\Classes\EntregaTecnica\EntregaTecnicaAnalise;
use App\Classes\EntregaTecnica\EntregaTecnicaAnaliseDivergencia;
use App\Classes\EntregaTecnica\EntregaTecnicaTelemetria;
use App\Classes\EntregaTecnica\EntregaTecnicaLances;
use App\Classes\EntregaTecnica\EntregaTecnicaBomba;
use App\Classes\EntregaTecnica\EntregaTecnicaBombaMotor;
use App\Classes\EntregaTecnica\EntregaTecnicaChavePartida;
use App\Classes\EntregaTecnica\EntregaTecnicaBombaAutotrafo;
use App\Classes\EntregaTecnica\EntregaTecnicaTesteEletricoCp;
use App\Classes\EntregaTecnica\EntregaTecnicaTesteEletricoTc;
use App\Classes\EntregaTecnica\EntregaTecnicaTesteHidraulicoMotoBomba;
use App\Classes\EntregaTecnica\EntregaTecnicaTesteHidraulicoVelocidade;
use App\Classes\Listas\Lista;
use App\User;
use Illuminate\Support\Facades\Lang;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use stdClass;

class EntregaTecnicaController extends Controller
{
    // GERENCIAR
    public function manageTechnicalDelivery() 
    {        
        if (session()->has('fazenda')) {
            session()->put('current_module', 'entrega_tecnica');
            $fazenda = session()->get('fazenda');                 
            $id_fazenda = Session::get('fazenda')['id'];
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
                
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
            'fazendas.nome as nome_fazenda', 'US.id_usuario', 'U.nome as nome_usuario')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
            ->join('users as U', 'US.id_usuario', '=', 'U.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->where('entrega_tecnica.id_fazenda', $id_fazenda)
            ->get();

            $proprietarios = Proprietario::select('nome', 'id')->orderBy('nome')->get();
            $revendas = Revendas::select('id', 'nome')->get();
            $consultores = User::where('tipo_usuario', 3)->where('situacao', 1)->select('id', 'nome')->get();

            $status_entrega_tecnica = EntregaTecnica::select('status_parte_aerea', 'status_lances', 'status_aspersores', 'status_adutora', 'status_ligacao',
                                                             'status_motobomba', 'status_succao', 'status_testes')
                                                             ->where('id', $entrega_tecnica['id'])
                                                             ->first();

            foreach ($entrega_tecnica as $et) {
                if ($et['status'] != 3 && $et['status'] != 4 && $et['status'] != 5) {
                    $status = '';
                    if ($et['status_parte_aerea'] === 2 && $et['status_lances'] === 2 && $et['status_aspersores'] === 2 && 
                        $et['status_adutora'] === 2 && $et['status_ligacao'] === 2 && $et['status_motobomba'] === 2 && 
                        $et['status_succao'] === 2 && $et['status_testes'] === 2) {
                            $status = EntregaTecnica::where('id', $et['id'])->update(['status' => 2]);
                    } else if ($et['status_parte_aerea'] === 1 || $et['status_lances'] === 1 || $et['status_aspersores'] === 1 || 
                                $et['status_adutora'] === 1 || $et['status_ligacao'] === 1 || $et['status_motobomba'] === 1 || 
                                $et['status_succao'] === 1 || $et['status_testes'] === 1) {
                                    $status = EntregaTecnica::where('id', $et['id'])->update(['status' => 1]);
                    } else if ($et['status_parte_aerea'] === 0 || $et['status_lances'] === 0 || $et['status_aspersores'] === 0 || 
                                $et['status_adutora'] === 0 || $et['status_ligacao'] === 0 || $et['status_motobomba'] === 0 || 
                                $et['status_succao'] === 0 || $et['status_testes'] === 0) {
                                    $status = EntregaTecnica::where('id', $et['id'])->update(['status' => 0]);
                    }
                }
            }

            return view('entregaTecnica.manage', compact('entrega_tecnica', 'proprietarios', 'revendas', 'consultores', 'fazenda', 'status'));
        } else {
            redirect()->back()->with('error', __('afericao.selecione_fazenda'), 'warning');
            return redirect()->route('dashboard');
        }
    }

    public function searchTechnilcalDelivery(Request $request) 
    {
        $entrega_tecnica = [];


        if (session()->has('fazenda')) {
            $fazenda = session()->get('fazenda');  
            $id_fazenda = Session::get('fazenda')['id'];
            
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
            'fazendas.nome as nome_fazenda', 'US.id_usuario', 'U.nome as nome_usuario')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
            ->join('users as U', 'US.id_usuario', '=', 'U.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->where('entrega_tecnica.id_fazenda', $id_fazenda)
            ->get();

            if(empty($request['filter'])) {
                    $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
                    'fazendas.nome as nome_fazenda', 'US.id_usuario', 'U.nome as nome_usuario')
                    ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                    ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
                    ->join('users as U', 'US.id_usuario', '=', 'U.id')
                    ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                    ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                ->where(function ($query) use ($request){
                    if (!empty($request['filter'])) {
                        $query->orWhere('data_entrega_tecnica', 'like', '%'.$request['filter'].'%')
                        ->orWhere('tipo_entrega_tecnica', 'like', '%'.$request['filter'].'%')
                        ->orWhere('numero_pedido', 'like', '%'.$request['filter'].'%')
                        ->orWhere('status', 'like', '%'.$request['filter'].'%')
                        ->orWhere('P.nome', 'like', '%'.$request['filter'].'%')
                        ->orWhere('U.nome', 'like', '%'.$request['filter'].'%');
                    }
                })->paginate();
            } else {
                    $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
                    'fazendas.nome as nome_fazenda', 'US.id_usuario', 'U.nome as nome_usuario')
                    ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                    ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
                    ->join('users as U', 'US.id_usuario', '=', 'U.id')
                    ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                    ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                    ->orderBy('created_at')
                    ->where(function ($query) use ($request){
                    if (!empty($request['filter'])) {
                        $query->orWhere('data_entrega_tecnica', 'like', '%'.$request['filter'].'%')
                        ->orWhere('tipo_entrega_tecnica', 'like', '%'.$request['filter'].'%')
                        ->orWhere('numero_pedido', 'like', '%'.$request['filter'].'%')
                        ->orWhere('status', 'like', '%'.$request['filter'].'%')
                        ->orWhere('P.nome', 'like', '%'.$request['filter'].'%')
                        ->orWhere('U.nome', 'like', '%'.$request['filter'].'%');
                    }
                })->paginate();
            }
        }

        return view('entregaTecnica.manage', compact('entrega_tecnica'));
    }

    // TELA DE CARDS
    public function editTechnicalDelivery($id_entrega_tecnica)
    { 
        $entrega_tecnica = EntregaTecnica::select('*')->where('id', $id_entrega_tecnica)->first();
        $qtd_chave_partida = EntregaTecnicaChavePartida::select('id_chave_partida')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
        $qtd_bombas = EntregaTecnicaBomba::select('id_bomba')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
        $tem_pivo = EntregaTecnica::select('tipo_equipamento')->where('id', $id_entrega_tecnica)->first();

        $status_entrega_tecnica = EntregaTecnica::select('status_parte_aerea', 'status_lances', 'status_aspersores', 'status_adutora', 'status_ligacao',
        'status_motobomba', 'status_succao', 'status_testes')
        ->where('id', $entrega_tecnica['id'])
        ->first();

        foreach ($entrega_tecnica as $et) {
            if ($et['status'] != 3) {
                $status = '';
                if ($et['status_parte_aerea'] === 2 && $et['status_lances'] === 2 && $et['status_aspersores'] === 2 && 
                    $et['status_adutora'] === 2 && $et['status_ligacao'] === 2 && $et['status_motobomba'] === 2 && 
                    $et['status_succao'] === 2 && $et['status_testes'] === 2) {
                        $status = EntregaTecnica::where('id', $et['id'])->update(['status' => 2]);
                } else if ($et['status_parte_aerea'] === 1 || $et['status_lances'] === 1 || $et['status_aspersores'] === 1 || 
                            $et['status_adutora'] === 1 || $et['status_ligacao'] === 1 || $et['status_motobomba'] === 1 || 
                            $et['status_succao'] === 1 || $et['status_testes'] === 1) {
                                $status = EntregaTecnica::where('id', $et['id'])->update(['status' => 1]);
                } else if ($et['status_parte_aerea'] === 0 || $et['status_lances'] === 0 || $et['status_aspersores'] === 0 || 
                            $et['status_adutora'] === 0 || $et['status_ligacao'] === 0 || $et['status_motobomba'] === 0 || 
                            $et['status_succao'] === 0 || $et['status_testes'] === 0) {
                                $status = EntregaTecnica::where('id', $et['id'])->update(['status' => 0]);
                }
            }
        }
        
        return view('entregaTecnica.editar.editTechnicalDelivery', compact('id_entrega_tecnica', 'qtd_chave_partida', 'entrega_tecnica', 'qtd_bombas', 'tem_pivo'));
    }

    // CRIAR A ENTREGA TECNICA INICIAL
    public function saveTechnicalDelivery(Request $request) 
    {
        $dados = $request->all();

        $verify = DB::table('entrega_tecnica')->where('numero_pedido', $dados['numero_pedido'])->first();
        
        $situacao = "create";
        $situacao = Session::put('situacao', $situacao);

        if (!empty($verify)) {
            return redirect()->back()->withErrors(['message' => 'Número de pedido já cadastrado']);;
        }

        $trecho['id_tecnico'] = $dados['id_tecnico'];
        $trecho['id_fazenda'] = $dados['id_fazenda'];
        $trecho['numero_pedido'] = $dados['numero_pedido'];
        $trecho['data_entrega_tecnica'] = $dados['data_entrega_tecnica'];
        $trecho['tipo_entrega_tecnica'] = $dados['tipo_entrega_tecnica'];

        $entrega_tecnica = EntregaTecnica::create($trecho);
        
        $id_entrega_tecnica = $entrega_tecnica['id'];

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
        return redirect()->route('edit_technical_delivery', $id_entrega_tecnica); 
    }

    public function VerifyDadosTechnicalDelivery(Request $request) 
    {
        $dados = $request->all();
                
        $mensagem = "ok";

        if ($dados['numero_pedido'] == null || $dados['numero_pedido'] < 0 || 
        is_numeric($dados['numero_pedido']) == false || strlen($dados['numero_pedido']) < 5) {        
            $mensagem = __('entregaTecnica.erro_numer_pedido');
        } else if ($dados['data_entrega_tecnica'] == null) {
            $mensagem = __('entregaTecnica.erro_data');
        } else if ($dados['tipo_entrega_tecnica'] == null) {
            $mensagem = __('entregaTecnica.erro_tipo');
        }

        return response()->json(array('mensagem' => $mensagem), 200);

    }

    // ENTREGA TÉCNICA TELEMETRIA
    public function createTelemetryTechnicalDelivery($id_entrega_tecnica) 
    {
        if (session()->has('fazenda')) {
            $id_fazenda = Session::get('fazenda')['id'];
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
        }

        $telemetria = EntregaTecnicaTelemetria::select('*')
        ->where('id_entrega_tecnica', $id_entrega_tecnica)->first();

        return view('entregaTecnica.cadastro.createTelemetry', compact('fazenda', 'id_entrega_tecnica', 'telemetria'));
    }

    public function saveTelemetryTechnicalDelivery(Request $request) 
    {
        $dados = $request->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        
        $trecho['id_entrega_tecnica'] = $id_entrega_tecnica;
        $trecho['id_telemetria'] = 1;                    
        $trecho['aqua_tec_pro'] = ($dados['aqua_tec_pro'] == "on") ? 1 : 0;
        $trecho['aqua_tec_lite'] = ($dados['aqua_tec_lite'] == "on") ? 1 : 0;
        $trecho['commander_vp'] = ($dados['commander_vp'] == "on") ? 1 : 0;
        $trecho['icon_link'] = ($dados['icon_link'] == "on") ? 1 : 0;
        $trecho['crop_link'] = ($dados['crop_link'] == "on") ? 1 : 0;
        $trecho['base_station3'] = ($dados['base_station3'] == "on") ? 1 : 0;
        $trecho['estacao_metereologica_valley'] = ($dados['estacao_metereologica_valley'] == "on") ? 1 : 0;
        $trecho['field_commander'] = ($dados['field_commander'] == "on") ? 1 : 0;
        $telemetria_existente =  EntregaTecnicaTelemetria::where('id_entrega_tecnica', $id_entrega_tecnica)->count();
    
        if ($telemetria_existente > 0) {
            EntregaTecnicaTelemetria::where('id_entrega_tecnica', $id_entrega_tecnica)->update($trecho);
        } else {
            EntregaTecnicaTelemetria::create($trecho);
        }

        if (!empty($dados)) {                
            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                'status_telemetria' => 2
            ]);
        }

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_telemetria', 'success');
        return redirect()->route('edit_technical_delivery', $id_entrega_tecnica); 
    }

    // TECHNICAL DELIVERY AIR PART
    public function createTechnicalDeliveryAerialPart($id_entrega_tecnica) 
    {
        if (session()->has('fazenda')) {
            $id_fazenda = Session::get('fazenda')['id'];
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
        }

        $proprietarios = Proprietario::select('nome', 'id')->orderBy('nome')->get();
        $revendas = Revendas::select('id', 'nome')->get();
        $consultores = User::where('tipo_usuario', 3)->where('situacao', 1)->select('id', 'nome')->get();
        $modelos = Lista::getModeloPivo();
        $equipamento = Lista::getTipoEquipamento();
        $lista_equipamento = Lista::getTipoEquipamentoOp1();
        $altura_equipamento = Lista::getListaAlturaEquipamento();
        $getListaAlturaTipo = Lista::getListaAlturaTipo();
        $getBalanco = Lista::getBalanco();
        $paineis = Lista::getPainel();
        $correntes = Lista::getCorrente();
        $tipoLances = Lista::getListaLances();        
        $getPneus = Lista::getPneus(); 
        $telemetria = Lista::getTelemetria();
        $injeferdPotencia = Lista::getInjeferdPotencia();
        $canhaoFinal = Lista::getCanhaoFinalValvula();
        $bombaLigacao = Lista::getBombaLigacao();
        
        // TESTE DE EDICAO////
            $lances = EntregaTecnicaLances::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $tem_lances = (count($lances) > 0) ? true : false;

            $entrega_tecnica_dados = EntregaTecnica::select('*')->where('id', $id_entrega_tecnica)->first();

            $equipamento_tipo = EntregaTecnica::select('tipo_equipamento')->where('id', $id_entrega_tecnica)->first();        
            $equipamento_modelo = EntregaTecnica::select('modelo_equipamento')->where('id', $id_entrega_tecnica)->first();
        /////////////////////

        // if ($entrega_tecnica_dados['status_parte_aerea'] == 0) {
        //     EntregaTecnica::where('id', $id_entrega_tecnica)->update([
        //         'status_parte_aerea' => 1
        //     ]);
        // }

        return view('entregaTecnica.cadastro.createAerialPart', compact('proprietarios', 'consultores', 'revendas', 'modelos', 
        'equipamento', 'lista_equipamento', 'altura_equipamento', 'getBalanco', 'paineis', 'correntes', 'motorredutores', 'getPneus',
        'getBombaMarca', 'getBombaMarcaSerie', 'tipoLances', 'diametroLances', 'fazenda', 'getListaDiametroTipo', 'getListaAlturaTipo',
        'marcaMotorredutor', 'telemetria', 'injeferdPotencia', 'canhaoFinal', 'bombaLigacao', 'id_entrega_tecnica',
    
        'lances', 'tem_lances', 'entrega_tecnica_dados', 'equipamento_tipo', 'equipamento_modelo', 'tem_lances'));
    }

    public function saveTechnicalDeliveryAerialPart(Request $req) 
    {
        $dados = $req->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        if ($dados['tipo_equipamento'] == null) {            
            Notificacao::gerarAlert('', 'entregaTecnica.tipo_equipamento_vazio', 'warning');
            return redirect()->back();
        } else {
            if( $dados['giro'] < 0 ||  $dados['giro'] > 360) {
                Notificacao::gerarAlert('', 'entregaTecnica.cadastro_giro_incorreto', 'warning');
                return redirect()->back();
            } else {
                $altura_valor = Lista::getAlturaValor($dados['altura_equipamento']);   
                $trecho['numero_serie'] = $dados['numero_serie'];      
                $trecho['modelo_equipamento'] = $dados['modelo'];
                $trecho['tipo_equipamento'] = $dados['tipo_equipamento'];
                $trecho['tipo_equipamento_op1'] = $dados['tipo_equipamento_op1'];
                $trecho['altura_equipamento_nome'] = $dados['altura_equipamento'];
                $trecho['altura_equipamento_valor'] = $altura_valor;                    
                $trecho['balanco_comprimento'] = $dados['balanco'];
                $trecho['painel'] = $dados['painel'];
                $trecho['corrente_fusivel_nh500v'] = $dados['corrente'];
                $trecho['pneus'] = $dados['pneus'];
                $trecho['parada_automatica'] = $dados['parada_automatica'];  
                $trecho['barreira_seguranca'] = $dados['barreira_seguranca'];  
                $trecho['telemetria'] = $dados['telemetria'];  
                $trecho['acessorios'] = $dados['acessorios'];  
                $trecho['injeferd'] = $dados['injeferd'];  
                $trecho['canhao_final_valvula'] = $dados['canhao_final_valvula'];  
                $trecho['giro'] = $dados['giro'];  

                $equipamento_existente = EntregaTecnica::select('tipo_equipamento')->where('id', $id_entrega_tecnica)->first();

                if ($equipamento_existente['tipo_equipamento'] != $dados['tipo_equipamento']) {
                    EntregaTecnicaLances::select('id_entrega_tecnica')->where('id_entrega_tecnica', $id_entrega_tecnica)->delete();
                    EntregaTecnica::where('id', $id_entrega_tecnica)->update($trecho);
                }
                
                EntregaTecnica::where('id', $id_entrega_tecnica)->update($trecho);

                if (!empty($dados['numero_serie']) && !empty($dados['modelo']) && !empty($dados['tipo_equipamento']) && !empty($dados['tipo_equipamento_op1']) && 
                    !empty($dados['altura_equipamento']) && !empty($dados['balanco']) && !empty($dados['painel']) && !empty($dados['corrente']) && 
                    !empty($dados['pneus']) && !empty($dados['giro'])) {
                        EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_parte_aerea' => 2]);
                } else if ($trecho != null) {
                    EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_parte_aerea' => 1]);
                }
                
                Notificacao::gerarAlert('', 'entregaTecnica.cadastro_parte_aerea', 'success');
                if ($dados['savebuttonvalue'] == "saveout") {
                    return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
                } else {
                    return redirect()->back();
                }
            }
        }
    }

    // TECHNICAL DELIVERY SPANS
    public function createTechnicalDeliverySpan($id_entrega_tecnica) 
    {
        if (session()->has('fazenda')) {
            $id_fazenda = Session::get('fazenda')['id'];
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
        }
        
        $tipo_equipamento = EntregaTecnica::select('tipo_equipamento', 'status_lances')->where('id', $id_entrega_tecnica)->get();
        $tipo_equipamento = $tipo_equipamento[0]['tipo_equipamento'];
        
        $diametroLances = Lista::getListaLancesDiametro();
        $getListaDiametroTipo = Lista::getListaDiametroTipo();
        $tipoLances = Lista::getListaLances();
        $diametro = EntregaTecnicaLances::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();        
        $motorredutores = Lista::getMotoredutor();
        $marcaMotorredutor = Lista::getMarcaMotorredutor();

        return view('entregaTecnica.cadastro.createSpans', compact('fazenda', 'id_entrega_tecnica', 'tipo_equipamento', 
        'getListaDiametroTipo', 'diametroLances', 'tipoLances', 'diametro', 'motorredutores', 'marcaMotorredutor'));

    }

    public function saveTechnicalDeliverySpan(Request $req)
    {
        $dados = $req->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        for ($i = 0; $i < count($dados['diametro']); $i++) {
            for ($i = 0; $i < count($dados['id_lance']); $i++) {
                $id_lance = (INT)$dados['id_lance'][$i];
                $lance_existe = EntregaTecnicaLances::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_lance', $id_lance)->count();
                $modelo = explode('_', $dados['qtd_tubos'][$i],2 );
                $qtd_tubos = (int)$modelo[0];
                $comprimento_lances = Lista::getTamanhoLance($dados['diametro'][$i], $modelo[1]);

                if ($lance_existe > 0) {
                    EntregaTecnicaLances::where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->where('id_lance', $dados['id_lance'][$i])
                    ->update([
                        'diametro_tubo' => $dados['diametro'][$i],
                        'numero_serie' => $dados['numero_serie'][$i],
                        'quantidade_tubo' => $qtd_tubos,
                        'comprimento_lance' => $comprimento_lances,
                        'motorredutor_marca' => $dados['motorredutor_marca'][$i],
                        'motorredutor_potencia' => $dados['motorredutor_potencia'][$i],
                    ]);
                } else {
                    EntregaTecnicaLances::create([
                        'diametro_tubo' => $dados['diametro'][$i],
                        'numero_serie' => $dados['numero_serie'][$i],
                        'quantidade_tubo' => $qtd_tubos,
                        'comprimento_lance' => $comprimento_lances,
                        'motorredutor_marca' => $dados['motorredutor_marca'][$i],
                        'motorredutor_potencia' => $dados['motorredutor_potencia'][$i],
                        'id_lance' =>  $id_lance,
                        'id_entrega_tecnica' => $id_entrega_tecnica
                    ]);
                }   
                   
                if (!empty($dados['diametro'][$i]) && !empty($dados['numero_serie'][$i]) && !empty($dados['qtd_tubos'][$i]) &&
                !empty($dados['motorredutor_marca'][$i]) && !empty($dados['motorredutor_potencia'][$i])) {
                    EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                        'status_lances' => 2,
                    ]);
                } else if (!empty($dados['diametro'][$i]) || !empty($dados['numero_serie'][$i]) || !empty($dados['qtd_tubos'][$i]) ||
                !empty($dados['motorredutor_marca'][$i]) || !empty($dados['motorredutor_potencia'][$i])) {
                    EntregaTecnica::where('id', $id_entrega_tecnica)->update([ 'status_lances' => 1 ]);
                }                  
            }
        }    

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_lances', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // TECHNICAL DELIVERY MOTORPUMP

    public function createPressurizationTechnicalDelivery($id_entrega_tecnica)
    {
        if (session()->has('fazenda')) {
            $id_fazenda = Session::get('fazenda')['id'];
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
        }
        
        $tipo_succao = Lista::getTipoSuccao();
        $tipo_succao_auxiliar = Lista::getTipoSuccaoAuxiliar();
        $motobomba = EntregaTecnica::select('quantidade_motobomba', 'ligacao_serie', 'ligacao_paralelo', 'tipo_succao', 'succao_auxiliar', 'quantidade_motobomba_auxiliar')->where('id', $id_entrega_tecnica)->first();
        $fornecedores = Lista::fornecedores();
        
        /// CONSULTAS DA BOMBA ///        
            $bombaLigacao = Lista::getBombaLigacao();
            $bomba_marca = Lista::getBombaMarca();
            $bomba_modelo = Lista::getBombaMarcaSerie();
            $tipo_motor = Lista::getTipoMotor();
            $motor_marca = Lista::getMotorMarca();
            $tipo_bomba = 'padrao';
            
            $total_bombas = EntregaTecnica::select('quantidade_motobomba', 'quantidade_motobomba_auxiliar')->where('id', $id_entrega_tecnica)->first();

            $total_bomba_padrao = $total_bombas[0]['quantidade_motobomba'];
            $bomba_padrao_cadastrada = EntregaTecnicaBomba::where('id_entrega_tecnica', $id_entrega_tecnica)->where('tipo_motobomba', 'padrao')->count();
                
            $total_bomba_auxiliar = $total_bombas[0]['quantidade_motobomba_auxiliar'];
            $bomba_auxiliar_cadastrada = EntregaTecnicaBomba::where('id_entrega_tecnica', $id_entrega_tecnica)->where('tipo_motobomba', 'auxiliar')->count();

            $bombas = EntregaTecnicaBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->orderby('id_bomba')->get();
            $motores = EntregaTecnicaBombaMotor::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->orderby('id_bomba')->orderby('id_motor')->get();
            $total_bombas_cadastradas = $total_bombas['quantidade_motobomba'] + $total_bombas['quantidade_motobomba_auxiliar'];
        /////////////////////////

        // CHAVE DE PARTIDA //
            $chavePartida = Lista::getChavePartida();
            $chavePartidaAcionamento = Lista::getChavePartidaAcionamento();
            $chaveSeccionadora = Lista::getChaveSeccionadora();
            $chave_partida = EntregaTecnicaChavePartida::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_bomba', $bombas['id_bomba'])->where('id_motor', $motores['id_motor'])->get();
            
        /////////////////////

        return view('entregaTecnica.cadastro.createMotoPump', compact('id_entrega_tecnica', 'fazenda', 'tipo_succao', 'tipo_succao_auxiliar', 'motobomba',
        'bombaLigacao', 'bomba_marca', 'tipo_bomba', 'total_bomba_padrao', 'total_bomba_auxiliar',
        'bomba_modelo', 'tipo_motor', 'motor_marca', 'bombas', 'bomba_padrao_cadastrada', 'bomba_auxiliar_cadastrada', 'total_bombas_cadastradas', 'motores',
        'chavePartida', 'chavePartidaAcionamento', 'chaveSeccionadora', 'chave_partida', 'fornecedores'));
    }

    public function savePressurizationTechnicalDelivery(Request $request)
    {
        $dados = $request->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        if ($dados['quantidade_motobomba'] == 0 || empty($dados['quantidade_motobomba'])) {
            Notificacao::gerarAlert('', 'entregaTecnica.qtd_bombas_erro', 'warning');
            return redirect()->back();
        } else {    
            $total_bombas = $dados['quantidade_motobomba'] + $dados['quantidade_motobomba_auxiliar'];
            // SE ALGUM CAMPO DA BOMBA ESTIVER PREENCHIDO IRÁ SALVAR A BOMBA
            for ($i = 0; $i < $total_bombas; $i++) {
                $id_bomba = $dados['id_bomba'][$i];

                // BLOCO ONDE CLICA A PARTE DE QTD DE BOMBAS
                $pressurizacao['quantidade_motobomba'] = $dados['quantidade_motobomba'];            
                $pressurizacao['ligacao_serie'] = ($dados['ligacao_serie'] == "on") ? 1 : 0;
                $pressurizacao['ligacao_paralelo'] = ($dados['ligacao_paralela'] == "on") ? 1 : 0;
                $pressurizacao['tipo_succao'] = $dados['img_succao'];
                if($dados['quantidade_motobomba_auxiliar'] == null) {                
                    $pressurizacao['quantidade_motobomba_auxiliar'] = null;
                } else {
                    $pressurizacao['quantidade_motobomba_auxiliar'] = $dados['quantidade_motobomba_auxiliar'];                
                }
    
                EntregaTecnica::where('id', $id_entrega_tecnica)->update($pressurizacao);

                // BLOCO DE CRIAÇÃO DA BOMBA
                $bomba_existe = EntregaTecnicaBomba::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_bomba', $id_bomba)->count();
                if ($bomba_existe > 0) {
                    EntregaTecnicaBomba::where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->where('id_bomba', $dados['id_bomba'][$i])
                    ->update([
                        'tipo_motobomba' => $dados['tipo_motobomba'][$i],
                        'marca' => $dados['marca'][$i],
                        'modelo' => $dados['modelo'][$i],
                        'numero_estagio' => $dados['numero_estagio'][$i],
                        'rotor' => $dados['rotor'][$i],
                        'numero_serie' => $dados['numero_serie'][$i],
                        'fornecedor' => $dados['fornecedor'][$i],
                        'opcionais' => $dados['opcionais'][$i],
                    ]);
                } else {
                    EntregaTecnicaBomba::create([
                        'tipo_motobomba' => $dados['tipo_motobomba'][$i],
                        'marca' => $dados['marca'][$i],
                        'modelo' => $dados['modelo'][$i],
                        'numero_estagio' => $dados['numero_estagio'][$i],
                        'rotor' => $dados['rotor'][$i],
                        'numero_serie' => $dados['numero_serie'][$i],
                        'fornecedor' => $dados['fornecedor'][$i],
                        'opcionais' => $dados['opcionais'][$i],
                        'id_entrega_tecnica' => $dados['id_entrega_tecnica'],
                        'id_bomba' => $dados['id_bomba'][$i],                    
                    ]);
                }

                //IDENTIFICADOR DO MOTOR DA BOMBA
                $j = $i + 1;

                for ($k = 0; $k < count($dados['id_motor_'.$j]); $k++) {
                    $id_motor = $dados['id_motor_'.$j][$k];
                                                
                    $marca = '';
                    $modelo = '';

                    if ($dados['tipo_motor_'.$j][$k] == 'diesel') {
                        $marca = $dados['marca_motor_'.$j][$k];
                        $modelo = $dados['modelo_motor_'.$j][$k];
                    } else {
                        $marca = $dados['marca_motor_eletrico_'.$j][$k];
                        $modelo = $dados['modelo_motor_eletrico_'.$j][$k];
                    }

                    $motor_existe = EntregaTecnicaBombaMotor::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_bomba', $id_bomba)->where('id_motor', $id_motor)->count();
                    if ($motor_existe > 0) {                                    
                        EntregaTecnicaBombaMotor::where('id_entrega_tecnica', $id_entrega_tecnica)
                        ->where('id_bomba', $id_bomba)
                        ->where('id_motor', $id_motor)
                        ->update([
                            'tipo_motor' => $dados['tipo_motor_' . $id_bomba][$k],
                            'marca' => $marca,
                            'modelo' => $modelo,
                            'potencia' => $dados['potencia_'.$j][$k],
                            'numero_serie' => $dados['numero_serie_'.$j][$k],
                            'rotacao' => $dados['rotacao_'.$j][$k],
                            'tensao' => $dados['tensao_'.$j][$k],
                            'lp_ln' => $dados['lp_ln_'.$j][$k],
                            'classe_isolamento' => $dados['classe_isolamento_'.$j][$k],
                            'corrente_nominal' => $dados['corrente_nominal_'.$j][$k],
                            'fs' => $dados['fs_'.$j][$k],
                            'ip' => $dados['ip_'.$j][$k],
                            'rendimento' => $dados['rendimento_'.$j][$k],
                            'cos' => $dados['cos_'.$j][$k],
                        ]); 

                    } else {
                        EntregaTecnicaBombaMotor::create([
                            'tipo_motor' => $dados['tipo_motor_' . $id_bomba][$k],
                            'marca' => $marca,
                            'modelo' => $modelo,
                            'potencia' => $dados['potencia_'.$j][$k],
                            'numero_serie' => $dados['numero_serie_'.$j][$k],
                            'rotacao' => $dados['rotacao_'.$j][$k],
                            'tensao' => $dados['tensao_'.$j][$k],
                            'lp_ln' => $dados['lp_ln_'.$j][$k],
                            'classe_isolamento' => $dados['classe_isolamento_'.$j][$k],
                            'corrente_nominal' => $dados['corrente_nominal_'.$j][$k],
                            'fs' => $dados['fs_'.$j][$k],
                            'ip' => $dados['ip_'.$j][$k],
                            'rendimento' => $dados['rendimento_'.$j][$k],
                            'cos' => $dados['cos_'.$j][$k],
                            'id_bomba' => $id_bomba,
                            'id_motor' => $id_motor,
                            'id_entrega_tecnica' => $dados['id_entrega_tecnica']
                        ]);
                    }

                    if ($dados['tipo_motor_' . $id_bomba][$k] == 'eletrico') {
                        // salva a 1º chave de partida
                        $id_chave_partida = $dados['id_chave_partida_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        
                        $chave_partida['marca'] = $dados['marca_cp_0'.$id_bomba.'_0'.$id_motor.'_1'][$k];
                        $chave_partida['acionamento'] = $dados['acionamento_cp_0'.$id_bomba.'_0'.$id_motor.'_1'][$k];
                        $chave_partida['regulagem_reles'] = $dados['regulagem_reles_0'.$id_bomba.'_0'.$id_motor.'_1'][$k];
                        $chave_partida['numero_serie'] = $dados['numero_serie_cp_0'.$id_bomba.'_0'.$id_motor.'_1'][$k];
                        $chave_partida['id_chave_partida'] = $dados['id_chave_partida_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        $chave_partida['id_bomba'] = $id_bomba;
                        $chave_partida['id_motor'] = $id_motor;
                        $chave_partida['id_entrega_tecnica'] = $id_entrega_tecnica;

                        $chave_partida_existente = EntregaTecnicaChavePartida::where('id_entrega_tecnica', $id_entrega_tecnica)
                        ->where('id_bomba', $id_bomba)
                        ->where('id_motor', $id_motor)
                        ->where('id_chave_partida', $id_chave_partida)
                        ->count();

                        if ($chave_partida_existente > 0) {
                            EntregaTecnicaChavePartida::where('id_entrega_tecnica', $id_entrega_tecnica)
                            ->where('id_bomba', $id_bomba)
                            ->where('id_motor', $id_motor)
                            ->where('id_chave_partida', $id_chave_partida)
                            ->update($chave_partida);
                        } else {
                            EntregaTecnicaChavePartida::create($chave_partida);
                        }
                    }
                }

                if ($dados['marca'][$i] != null && $dados['modelo'][$i] != null && $dados['numero_estagio'][$i] != null && 
                $dados['rotor'][$i] != null && $dados['opcionais'][$i] != null && $dados['fornecedor'][$i] != null && 
                $dados['numero_serie'][$i] != null && $dados['quantidade_motobomba'] && $dados['tipo_succao'] ) {
                    // BOMBA
                    if (!empty($dados['tipo_motor_' . $id_bomba][$k]) && !empty($dados['marca_motor_'.$j][$k]) && !empty($dados['modelo_motor_'.$j][$k]) 
                    && !empty($dados['marca_motor_eletrico_'.$j][$k]) && !empty($dados['modelo_motor_eletrico_'.$j][$k])
                    && !empty($dados['potencia_'.$j][$k]) && !empty($dados['numero_serie_'.$j][$k]) && !empty($dados['rotacao_'.$j][$k])) {
                        // MOTOR
                        if(!empty($dados['marca_0'.$id_bomba.'_0'.$id_motor.'_1']) && !empty($dados['acionamento_0'.$id_bomba.'_0'.$id_motor.'_1']) && 
                        !empty($dados['regulagem_reles_0'.$id_bomba.'_0'.$id_motor.'_1']) && !empty($dados['numero_serie_0'.$id_bomba.'_0'.$id_motor.'_1'])) {
                            // CHAVE DE PARTIDA
                            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                                'status_motobomba' => 2
                            ]);
                        }
                    }
                } else if ($dados['marca'][$i] != null || $dados['modelo'][$i] != null || $dados['numero_estagio'][$i] != null || 
                $dados['rotor'][$i] != null || $dados['opcionais'][$i] != null || $dados['fornecedor'][$i] != null || 
                $dados['numero_serie'][$i] != null || $dados['quantidade_motobomba'] || $dados['tipo_succao']) {
                    // BOMBA
                    EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                        'status_motobomba' => 1
                    ]);
                    if (!empty($dados['tipo_motor_' . $id_bomba][$k]) || !empty($dados['marca_motor_'.$j][$k]) || !empty($dados['modelo_motor_'.$j][$k]) 
                    || !empty($dados['marca_motor_eletrico_'.$j][$k]) || !empty($dados['modelo_motor_eletrico_'.$j][$k])
                    || !empty($dados['potencia_'.$j][$k]) || !empty($dados['numero_serie_'.$j][$k]) || !empty($dados['rotacao_'.$j][$k])) {
                        // MOTOR
                        EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                            'status_motobomba' => 1
                        ]);
                        if(!empty($dados['marca_0'.$id_bomba.'_0'.$id_motor.'_1']) || !empty($dados['acionamento_0'.$id_bomba.'_0'.$id_motor.'_1']) || 
                        !empty($dados['regulagem_reles_0'.$id_bomba.'_0'.$id_motor.'_1']) || !empty($dados['numero_serie_0'.$id_bomba.'_0'.$id_motor.'_1'])) {
                            // CHAVE DE PARTIDA
                            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                                'status_motobomba' => 1
                            ]);
                        }
                    }
                }
            }
            
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_bomba', 'success');
            if ($dados['savebuttonvalue'] == "saveout") {
                return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
            } else {
                return redirect()->back();
            }
        }       
    }

    // AUTOTRAFO TECHNICAL DELIVERY
    public function createStarterKeyTechnicalDelivery($id_entrega_tecnica) 
    {
        $autotrafos = EntregaTecnicaBombaAutotrafo::select('*')
        ->where('id_entrega_tecnica', $id_entrega_tecnica)->first();

        $chavePartidaAcionamento = Lista::getChavePartidaAcionamento();
        $chaveSeccionadora = Lista::getChaveSeccionadora();
        $gerador = Lista::getGerador();

        return view('entregaTecnica.cadastro.createPowerSupply', compact('id_entrega_tecnica', 'chavePartidaAcionamento', 'chaveSeccionadora',
        'gerador', 'autotrafos'));        
    }

    public function saveStarterKeyTechnicalDelivery(Request $req) 
    {
        $dados = $req->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        $autotrafo_existente = EntregaTecnicaBombaAutotrafo::where('id_entrega_tecnica', $id_entrega_tecnica)->count();  
        
        // CHECK BEFORE SAVING IF THE FIELDS HAVE NEGATIVE VALUES
        if (($dados['tap_entrada_elevacao'] != null || $dados['tap_saida_elevacao'] != null || $dados['corrente_disjuntor'] != null) &&
        ($dados['tap_entrada_elevacao'] < 0 || $dados['tap_saida_elevacao'] < 0 || $dados['corrente_disjuntor'] < 0)) {
            Notificacao::gerarAlert('', 'entregaTecnica.dados_invalidos', 'warning');
            return redirect()->back();
        }

        if (($dados['tap_entrada_rebaixamento'] != null || $dados['tap_saida_rebaixamento'] != null || $dados['corrente_disjuntor'] != null) &&
        ($dados['tap_entrada_rebaixamento'] < 0 || $dados['tap_saida_rebaixamento'] < 0 || $dados['corrente_disjuntor'] < 0)) {
            Notificacao::gerarAlert('', 'entregaTecnica.dados_invalidos', 'warning');
            return redirect()->back();
        }

        // ELEVATION AUTOTRAFO
        if (!empty($dados['potencia_elevacao']) || !empty($dados['tap_entrada_elevacao']) || !empty($dados['tap_saida_elevacao']) || 
            !empty($dados['corrente_disjuntor']) || !empty($dados['numero_serie_elevacao']) ) {   
            if (!empty($dados['gerador']) || !empty($dados['gerador_marca']) || !empty($dados['gerador_modelo']) || 
                !empty($dados['gerador_potencia']) || !empty($dados['gerador_frequencia']) || !empty($dados['gerador_tensao']) ||
                !empty($dados['numero_serie_gerador'])) {
                    Notificacao::gerarAlert('', 'entregaTecnica.cadastro_errado_autotrafo', 'warning');
                    return redirect()->back();      
            } else {
                if ($autotrafo_existente > 0) {
                    EntregaTecnicaBombaAutotrafo::where('id_entrega_tecnica', $id_entrega_tecnica)
                        ->update([
                        'potencia_elevacao' => $dados['potencia_elevacao'],
                        'tap_entrada_elevacao' => $dados['tap_entrada_elevacao'],
                        'tap_saida_elevacao' => $dados['tap_saida_elevacao'],
                        'corrente_disjuntor' => $dados['corrente_disjuntor'],
                        'numero_serie_elevacao' => $dados['numero_serie_elevacao'],
                    ]); 
                } else {
                    EntregaTecnicaBombaAutotrafo::create([
                        'potencia_elevacao' => $dados['potencia_elevacao'],
                        'tap_entrada_elevacao' => $dados['tap_entrada_elevacao'],
                        'tap_saida_elevacao' => $dados['tap_saida_elevacao'],
                        'corrente_disjuntor' => $dados['corrente_disjuntor'],
                        'numero_serie_elevacao' => $dados['numero_serie_elevacao'],
                        'id_autotrafo' => 1,
                        'id_entrega_tecnica' => $id_entrega_tecnica
                    ]); 
                }                
            }
        } 
                
        // DRAWING AUTOTRAFO
        if (!empty($dados['potencia_rebaixamento']) || !empty($dados['tap_entrada_rebaixamento']) || 
            !empty($dados['tap_saida_rebaixamento']) || !empty($dados['numero_serie_rebaixamento'])) {
            if (empty($dados['potencia_elevacao']) || empty($dados['tap_entrada_elevacao']) || empty($dados['tap_saida_elevacao']) || 
                empty($dados['corrente_disjuntor']) || empty($dados['numero_serie_elevacao']) ) {  
                    Notificacao::gerarAlert('', 'entregaTecnica.cadastro_errado_autotrafo_rebaixamento', 'warning');
                    return redirect()->back();
            } else {
                if ($autotrafo_existente > 0) {
                    EntregaTecnicaBombaAutotrafo::where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->update([
                        'potencia_rebaixamento' => $dados['potencia_rebaixamento'],
                        'tap_entrada_rebaixamento' => $dados['tap_entrada_rebaixamento'],
                        'tap_saida_rebaixamento' => $dados['tap_saida_rebaixamento'],
                        'numero_serie_rebaixamento' => $dados['numero_serie_rebaixamento'],
                    ]); 
                } else {
                    EntregaTecnicaBombaAutotrafo::create([
                        'potencia_rebaixamento' => $dados['potencia_rebaixamento'],
                        'tap_entrada_rebaixamento' => $dados['tap_entrada_rebaixamento'],
                        'tap_saida_rebaixamento' => $dados['tap_saida_rebaixamento'],
                        'numero_serie_rebaixamento' => $dados['numero_serie_rebaixamento'],
                        'id_autotrafo' => 1,
                        'id_entrega_tecnica' => $id_entrega_tecnica
                    ]); 
                }  
            }
        }  

        // GENERATOR
        if (!empty($dados['gerador']) || !empty($dados['gerador_marca']) || !empty($dados['gerador_modelo']) || 
            !empty($dados['gerador_potencia']) || !empty($dados['gerador_frequencia']) || !empty($dados['gerador_tensao']) || 
            !empty($dados['numero_serie_gerador'])) {
            if (!empty($dados['potencia_elevacao']) || !empty($dados['tap_entrada_elevacao']) || !empty($dados['tap_saida_elevacao']) || 
                !empty($dados['corrente_disjuntor']) || !empty($dados['numero_serie_elevacao']) ) {  
                    Notificacao::gerarAlert('', 'entregaTecnica.cadastro_errado_autotrafo', 'warning');
                    return redirect()->back();
            } else {
                if ($autotrafo_existente > 0) {
                EntregaTecnicaBombaAutotrafo::where('id_entrega_tecnica', $id_entrega_tecnica)->update([
                    'gerador' => $dados['gerador'],
                    'gerador_marca' => $dados['gerador_marca'],
                    'gerador_modelo' => $dados['gerador_modelo'],
                    'gerador_potencia' => $dados['gerador_potencia'],
                    'gerador_frequencia' => $dados['gerador_frequencia'],
                    'gerador_tensao' => $dados['gerador_tensao'],
                    'numero_serie_gerador' => $dados['numero_serie_gerador'],
                ]); 
        } else {
            EntregaTecnicaBombaAutotrafo::create([
                'gerador' => $dados['gerador'],
                'gerador_marca' => $dados['gerador_marca'],
                'gerador_modelo' => $dados['gerador_modelo'],
                'gerador_potencia' => $dados['gerador_potencia'],
                'gerador_frequencia' => $dados['gerador_frequencia'],
                'gerador_tensao' => $dados['gerador_tensao'],
                        'numero_serie_gerador' => $dados['numero_serie_gerador'],
                'id_autotrafo' => 1,
                'id_entrega_tecnica' => $id_entrega_tecnica
            ]); 
                }
            }                    
        }

        // E.T STATUS UPDATE
        if ((!empty($dados['potencia_elevacao']) && !empty($dados['tap_entrada_elevacao']) && !empty($dados['tap_saida_elevacao']) && 
            !empty($dados['corrente_disjuntor']) && !empty($dados['numero_serie_elevacao'])) || 
            (!empty($dados['gerador']) && !empty($dados['gerador_marca']) && !empty($dados['gerador_modelo']) && 
            !empty($dados['gerador_potencia']) && !empty($dados['gerador_frequencia']) && !empty($dados['gerador_tensao'])) ) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                'status_autotrafo' => 2
            ]);
        } else if ((!empty($dados['potencia_elevacao']) || !empty($dados['tap_entrada_elevacao']) || !empty($dados['tap_saida_elevacao']) || 
        !empty($dados['corrente_disjuntor']) || !empty($dados['numero_serie_elevacao'])) || 
        (!empty($dados['gerador']) || !empty($dados['gerador_marca']) || !empty($dados['gerador_modelo']) || 
        !empty($dados['gerador_potencia']) || !empty($dados['gerador_frequencia']) || !empty($dados['gerador_tensao'])) ) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                'status_autotrafo' => 1
            ]);
        }
            
        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_Autotrafo', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // SPRINKLER TECHNICAL DELIVERY

    public function createSprinklersTechnicalDelivery($id_entrega_tecnica)
    {
        $aspersor_marca = Lista::getAspersorMarca();
        $aspersor_modelo = Lista::getAspersorModelo();
        $defletores = Lista::getDefletores();
        $pressao = Lista::getPressao();
        $aspersor_opcional = Lista::getAspersorOpcional();
        $aspersor_canhao_final = Lista::getAspersorCanhaoFinal();
        $motobomba_booster_modelo = Lista::getMotobombaBoostermodelo();
        $reguladorModelo = Lista::getReguladorModelo();

        $aspersores = EntregaTecnica::select('aspersor_marca', 'aspersor_modelo', 'aspersor_defletor', 'aspersor_impacto_marca',
        'aspersor_impacto_modelo', 'aspersor_regulador_marca', 'aspersor_regulador_modelo', 'aspersor_pressao', 'tubo_descida', 'trilha_seca',
        'aspersor_canhao_final', 'aspersor_canhao_final_bocal', 'aspersor_mbbooster_marca', 'aspersor_mbbooster_modelo', 'status_aspersores',
        'aspersor_mbbooster_rotor', 'aspersor_mbbooster_potencia', 'aspersor_mbbooster_corrente')
        ->where('id', $id_entrega_tecnica)->first();

        $modelos = explode(", ", $aspersores['aspersor_regulador_modelo']);

        return view('entregaTecnica.cadastro.createSprinklers', compact('id_entrega_tecnica', 'aspersor_marca', 'aspersor_modelo', 'modelos',
        'defletores', 'pressao', 'aspersor_opcional', 'aspersor_canhao_final', 'motobomba_booster_modelo', 'id_aspersor', 'reguladorModelo', 'aspersores'));     
    }

    public function saveSprinklersTechnicalDelivery(Request $request)
    {
        $dados = $request->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        $aspersores['aspersor_marca'] = $dados['marca'];
        $aspersores['aspersor_modelo'] = $dados['modelo'];
        $aspersores['aspersor_defletor'] = $dados['defletor'];
        $aspersores['aspersor_impacto_marca'] = $dados['impacto_marca'];                    
        $aspersores['aspersor_impacto_modelo'] = $dados['impacto_modelo'];
        $aspersores['aspersor_regulador_marca'] = $dados['regulador_marca'];        
        $aspersores['aspersor_regulador_modelo'] = implode(', ', $dados['tags']);
        $aspersores['aspersor_pressao'] = $dados['pressao'];
        $aspersores['tubo_descida'] = $dados['tubo_descida'];
        $aspersores['aspersor_canhao_final'] = $dados['canhao_final'];
        $aspersores['aspersor_canhao_final_bocal'] = $dados['canhao_final_bocal'];
        $aspersores['aspersor_mbbooster_marca'] = $dados['mb_booster_marca'];
        $aspersores['aspersor_mbbooster_modelo'] = $dados['mb_booster_modelo'];
        $aspersores['aspersor_mbbooster_rotor'] = $dados['mb_booster_rotor'];
        $aspersores['aspersor_mbbooster_potencia'] = $dados['mb_booster_potencia'];
        $aspersores['aspersor_mbbooster_corrente'] = $dados['mb_booster_corrente'];

        EntregaTecnica::where('id', $id_entrega_tecnica)->update($aspersores);

        if (!empty($dados['marca']) && !empty($dados['modelo']) && !empty($dados['defletor']) && 
        !empty($dados['regulador_marca']) && !empty($dados['tags']) && !empty($dados['pressao'])) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_aspersores' => 2]);
        } else if (!empty($dados['marca']) || !empty($dados['modelo']) || !empty($dados['defletor']) || 
        !empty($dados['regulador_marca']) || !empty($dados['tags']) || !empty($dados['pressao'])) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_aspersores' => 1]);
        }

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_aspersor', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // SUCTION TECHNICAL DELIVERY

    public function createSuctionMeasurementsTechnicalDelivery($id_entrega_tecnica)
    {
        $succao = EntregaTecnica::select('medicao_succao_l', 'medicao_succao_h',
        'medicao_succao_e', 'medicao_succao_diametro', 'medicao_succao_tipo', 'tipo_tubo_succao')
        ->where('id', $id_entrega_tecnica)->first();

        $tipo_succao = Lista::getSuccaoTipo();
        $tubos = Lista::TipoTubos();
        $motobomba = EntregaTecnica::select('tipo_succao', 'succao_auxiliar', 'status_succao')->where('id', $id_entrega_tecnica)->first();

        $succao_tipo = explode(", ", $succao['medicao_succao_tipo']);

        return view('entregaTecnica.cadastro.createSuction', compact('id_entrega_tecnica', 'succao_tipo', 'tipo_succao', 
        'succao', 'motobomba', 'tubos'));     
    }

    public function saveSuctionMeasurementsTechnicalDelivery(Request $request)
    {
        $dados = request()->except(['_token']);        
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        // CHECK IF THE SUCTION FIELDS HAVE POSITIVE VALUES
        if (($dados['medicao_succao_l'] != null || $dados['medicao_succao_l'] != null || $dados['medicao_succao_l']) &&
            ($dados['medicao_succao_l'] < 0 || $dados['medicao_succao_l'] < 0 || $dados['medicao_succao_l'] < 0 )) {
                Notificacao::gerarAlert('', 'entregaTecnica.dados_invalidos', 'warning');
                return redirect()->back();
        }

        $succao['medicao_succao_l'] = $dados['medicao_succao_l'];
        $succao['medicao_succao_h'] = $dados['medicao_succao_h'];
        $succao['medicao_succao_e'] = $dados['medicao_succao_e'];
        $succao['medicao_succao_diametro'] = $dados['medicao_succao_diametro'];
        $succao['tipo_tubo_succao'] = $dados['tipo_tubo_succao'];
        $succao['medicao_succao_tipo'] = implode(', ', $dados['tags']);

        EntregaTecnica::where('id', $id_entrega_tecnica)->update($succao);

        if (!empty($dados['medicao_succao_l']) && !empty($dados['medicao_succao_h']) && !empty($dados['medicao_succao_e']) && 
        !empty($dados['medicao_succao_diametro']) && !empty($dados['tags'])) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_succao' => 2]);
        } else if (!empty($dados['medicao_succao_l']) || !empty($dados['medicao_succao_h']) || !empty($dados['medicao_succao_e']) || 
        !empty($dados['medicao_succao_diametro']) || !empty($dados['tags'])) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_succao' => 1]);
        }
            
        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_succao', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // TECHNICAL DELIVERY PRESSURE CONNECTION AND ACCESSORIES

    public function createPressureConnectionMeasurementsTechnicalDelivery($id_entrega_tecnica)
    {
        $ligacao = EntregaTecnica::select('tubo_az1_comprimento', 'tubo_az1_diametro', 'tubo_az2_comprimento', 'tubo_az2_diametro', 'peca_aumento_diametro_maior', 
        'peca_aumento_diametro_menor', 'registro_gaveta_diametro', 'registro_gaveta_marca', 'valvula_retencao_diametro', 'valvula_retencao_marca', 'status_ligacao',
        'valvula_retencao_material', 'valvula_ventosa_diametro', 'valvula_ventosa_marca', 'valvula_ventosa_modelo', 'valvula_antecondas_diametro',
        'valvula_antecondas_marca', 'valvula_antecondas_modelo', 'registro_eletrico_diametro', 'registro_eletrico_marca', 'registro_eletrico_modelo',
        'medicoes_ligpress_outros')->where('id', $id_entrega_tecnica)->first();

        return view('entregaTecnica.cadastro.createConnectionAndAccessories', compact('id_entrega_tecnica', 'ligacao'));     
    }

    public function savePressureConnectionMeasurementsTechnicalDelivery(Request $request)
    {
        $dados = $request->all();   
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        $pressao['tubo_az1_comprimento'] = $dados['tubo_az1_comprimento'];      
        $pressao['tubo_az1_diametro'] = $dados['tubo_az1_diametro'];
        $pressao['tubo_az2_comprimento'] = $dados['tubo_az2_comprimento'];
        $pressao['tubo_az2_diametro'] = $dados['tubo_az2_diametro'];
        $pressao['peca_aumento_diametro_maior'] = $dados['peca_aumento_diametro_maior'];            
        $pressao['peca_aumento_diametro_menor'] = $dados['peca_aumento_diametro_menor'];
        $pressao['registro_gaveta_diametro'] = $dados['registro_gaveta_diametro'];
        $pressao['registro_gaveta_marca'] = $dados['registro_gaveta_marca'];
        $pressao['valvula_retencao_diametro'] = $dados['valvula_retencao_diametro'];
        $pressao['valvula_retencao_marca'] = $dados['valvula_retencao_marca'];  
        $pressao['valvula_retencao_material'] = $dados['valvula_retencao_material'];  
        $pressao['valvula_ventosa_diametro'] = $dados['valvula_ventosa_diametro'];  
        $pressao['valvula_ventosa_marca'] = $dados['valvula_ventosa_marca'];  
        $pressao['valvula_ventosa_modelo'] = $dados['valvula_ventosa_modelo'];  
        $pressao['quantidade_valv_ventosa'] = $dados['quantidade_valv_ventosa'];  
        $pressao['valvula_antecondas_diametro'] = $dados['valvula_antecondas_diametro'];  
        $pressao['valvula_antecondas_marca'] = $dados['valvula_antecondas_marca'];  
        $pressao['valvula_antecondas_modelo'] = $dados['valvula_antecondas_modelo'];  
        $pressao['registro_eletrico_diametro'] = $dados['registro_eletrico_diametro'];  
        $pressao['registro_eletrico_marca'] = $dados['registro_eletrico_marca'];  
        $pressao['registro_eletrico_modelo'] = $dados['registro_eletrico_modelo'];  
        $pressao['medicoes_ligpress_outros'] = $dados['medicoes_ligpress_outros'];

        EntregaTecnica::where('id', $id_entrega_tecnica)->update($pressao);

        if (!empty($dados['tubo_az1_comprimento']) && !empty($dados['tubo_az1_diametro']) && 
            !empty($dados['tubo_az2_comprimento']) && !empty($dados['tubo_az2_diametro'])) {
                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_ligacao' => 2]);
        } else if (!empty($dados['tubo_az1_comprimento']) || !empty($dados['tubo_az1_diametro']) || 
            !empty($dados['tubo_az2_comprimento']) || !empty($dados['tubo_az2_diametro'])) {
                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_ligacao' => 1]);
        }

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_ligacao', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // ENTREGA TÉCNICA ADUTORA

    public function createWaterSupplyMeasurementsTechnicalDelivery($id_entrega_tecnica)
    {   
        $adutoras = EntregaTecnicaAdutora::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
        $fornecedores = Lista::fornecedores();
        $tubos = Lista::TipoTubos();
        $marcaTubos = Lista::marcaTubos();
        $adutora_existente = EntregaTecnicaAdutora::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();

        if ($adutora_existente < 1) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                'status_adutora' => 1
            ]);
        }

        return view('entregaTecnica.cadastro.createAdductor', compact('id_entrega_tecnica', 'adutoras', 'tubos', 
                    'fornecedores', 'marcaTubos'));     
    } 

    public function saveWaterSupplyMeasurementsTechnicalDelivery(Request $request)
    {
        $dados = $request->all();

        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        if (!empty($dados['tipo_tubo']) && !empty($dados['diametro']) && 
            !empty($dados['numero_linha']) && !empty($dados['numero_linha'])) {
                for ($i = 0; $i < count($dados['tipo_tubo']); $i++) {   
                    $id_adutora = $i + 1;             
                    $adutora_existente = EntregaTecnicaAdutora::select('*')
                    ->where('id_adutora', $id_adutora)
                    ->where('id_entrega_tecnica', $id_entrega_tecnica)->count();

                    if ($adutora_existente > 0) {
                        EntregaTecnicaAdutora::where('id_entrega_tecnica', $id_entrega_tecnica)
                        ->where('id_adutora', $id_adutora)
                        ->update([                            
                            'tipo_tubo' => $dados['tipo_tubo'][$i],
                            'diametro' => $dados['diametro'][$i],
                            'numero_linha' => $dados['numero_linha'][$i],
                            'comprimento' => $dados['comprimento'][$i],
                            'fornecedor' => $dados['fornecedor'][$i],
                            'marca_tubo' => $dados['marca_tubo'][$i],
                        ]);
                    } else {
                        EntregaTecnicaAdutora::create([
                            'tipo_tubo' => $dados['tipo_tubo'][$i],
                            'diametro' => $dados['diametro'][$i],
                            'numero_linha' => $dados['numero_linha'][$i],
                            'comprimento' => $dados['comprimento'][$i],
                            'fornecedor' => $dados['fornecedor'][$i],
                            'marca_tubo' => $dados['marca_tubo'][$i],
                            'id_entrega_tecnica' => $id_entrega_tecnica,
                            'id_adutora' => $id_adutora
                        ]);
                    }
                }
                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_adutora' => 2]);
        } else {
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_vazio_adutora', 'warning');
            return redirect()->back();
        }

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_adutora', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // ENTREGA TECNICA TESTES
    public function createTestsTechnicalDelivery($id_entrega_tecnica) 
    {

        if (session()->has('fazenda')) {
            $id_fazenda = Session::get('fazenda')['id'];
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
        } 

        $teste_cp_existente = EntregaTecnicaTesteEletricoCp::where('id_entrega_tecnica', $id_entrega_tecnica)->count();

        if ($teste_cp_existente == 0) {    

            // CRIA O PRIMEIRO TESTE CHAVE DE PARTIDA
            $chave_partida = EntregaTecnicaChavePartida::select('*')
                ->where('id_entrega_tecnica', $id_entrega_tecnica)
                ->orderby('id_bomba')
                ->orderby('id_motor')
                ->orderby('id_chave_partida')
                ->get();
            
            for ($i = 0; $i < count($chave_partida); $i++) {                
                $teste_chave_partida['id_entrega_tecnica'] = $id_entrega_tecnica;
                $teste_chave_partida['id_bomba'] = $chave_partida[$i]['id_bomba'];
                $teste_chave_partida['id_motor'] = $chave_partida[$i]['id_motor'];
                $teste_chave_partida['id_chave_partida'] = $chave_partida[$i]['id_chave_partida'];
                EntregaTecnicaTesteEletricoCp::create($teste_chave_partida);
            }

            // CRIA O PRIMEIRO TESTE TORRE CENTRAL
            EntregaTecnicaTesteEletricoTc::create([
                'id_entrega_tecnica' => $id_entrega_tecnica,
                'id_testee_tc' => 1
            ]);

            EntregaTecnicaTesteHidraulicoVelocidade::create([
                'id_entrega_tecnica' => $id_entrega_tecnica,
                'id_testeh_vut' => 1,
                'valor_tempo' => 0
            ]);

            $dados_bombas = EntregaTecnicaBomba::select('id_bomba')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $count_bombas = EntregaTecnicaBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            // CRIA O PRIMEIRO TESTE MOTOBOMBA
            for ($i = 0; $i < $count_bombas; $i++) {
                EntregaTecnicaTesteHidraulicoMotoBomba::create([
                     'id_entrega_tecnica' => $id_entrega_tecnica,
                     'id_testeh_mb' => $dados_bombas[$i]['id_bomba']
                ]);
            }
        }

        // MOTOBOMBA E CHAVE DE PARTIDA
            $bombas = EntregaTecnicaBomba::select('*')
            ->where('id_entrega_tecnica', $id_entrega_tecnica)
            ->get();
    
            $teste_bomba = EntregaTecnicaTesteHidraulicoMotoBomba::select('*')
            ->where('id_entrega_tecnica', $id_entrega_tecnica)
            ->get();

            $total_chave_partida = EntregaTecnicaTesteEletricoCp::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();

        ///////////////////////////////

        // TORRE CENTRAL
            $dados_tc = EntregaTecnicaTesteEletricoTc::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $teste_tc_existente = EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)->count();
        ////////////////
        
        // CALCULOS DA VELOCIDADE        
            $velocidade = EntregaTecnicaTesteHidraulicoVelocidade::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
        /////////////////////////

        $status_testes = EntregaTecnica::select('status_testes')->where('id', $id_entrega_tecnica)->first();
        if ($status_testes['status_testes'] == 0) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                'status_testes' => 1
            ]);
        }

        return view('entregaTecnica.cadastro.createTests', compact('fazenda', 'id_entrega_tecnica', 'bombas', 'velocidade', 'dados_tc', 'teste_bomba', 'total_chave_partida'));

    }

    public function saveTestsTechnicalDelivery(Request $request) 
    {
        $dados = $request->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        // TESTES TORRE CENTRAL VALORES INPUT
            if (!empty($dados['tensao_rs_semcarga_tc']) || !empty($dados['tensao_st_semcarga_tc']) || !empty($dados['tensao_rt_semcarga_tc'])  || !empty($dados['tensao_rs_comcarga_tc']) || 
                !empty($dados['tensao_st_comcarga_tc']) || !empty($dados['tensao_rt_comcarga_tc'])) {
                    $id_testee_tc = (INT)$dados['id_testee_tc'];
                    $teste_eletrico_tc_existente = EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_testee_tc', $id_testee_tc)->count();
                    if ($teste_eletrico_tc_existente > 0) {
                        EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)
                        ->where('id_testee_tc', $id_testee_tc )
                        ->update([
                            'tensao_rs_semcarga' => $dados['tensao_rs_semcarga_tc'],
                            'tensao_st_semcarga' => $dados['tensao_st_semcarga_tc'],
                            'tensao_rt_semcarga' => $dados['tensao_rt_semcarga_tc'],
                            'tensao_rs_comcarga' => $dados['tensao_rs_comcarga_tc'],
                            'tensao_st_comcarga' => $dados['tensao_st_comcarga_tc'],
                            'tensao_rt_comcarga' => $dados['tensao_rt_comcarga_tc'],
                        ]);
                    }

                    $namefile_tc = array ('tensao_rs_semcarga_img', 'tensao_st_semcarga_img',
                    'tensao_rt_semcarga_img', 'tensao_rs_comcarga_img',
                    'tensao_st_comcarga_img', 'tensao_rt_comcarga_img');

                    $imagens = array (
                        $dados['tensao_rs_semcarga_img_tc'], 
                        $dados['tensao_st_semcarga_img_tc'],
                        $dados['tensao_rt_semcarga_img_tc'],
                        $dados['tensao_rs_comcarga_img_tc'],
                        $dados['tensao_st_comcarga_img_tc'],
                        $dados['tensao_rt_comcarga_img_tc'],            
                    );

                    $i = 0;

                    foreach ($imagens as $img) {
                        if ($img != null) {

                            // Recupera a extensão do arquivo
                            $extension = $img->extension();
                            // Define finalmente o nome
                            $nameFile = $namefile_tc[$i].'_tc.'.$extension;
                            // faz o upload do arquivo no projeto
                            $file = $img->storeAs('projetos/entrega_tecnica/teste_torre_central_' . $id_entrega_tecnica, $nameFile);

                            EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)
                            ->where('id_testee_tc', $id_testee_tc)
                            ->update([
                                '' . $namefile_tc[$i] . '' => $file
                            ]);
                        }
                        $i += 1;
                    }
            } else {
                Notificacao::gerarAlert('', 'entregaTecnica.cadastro_vazio_torre_central', 'warning');
                return redirect()->back();
            }
        /////////////////////////////////////  

        // TESTES MOTOBOMBA VALORES INPUT
            $count_bombas = EntregaTecnicaBomba::select('id_bomba')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            for ($i = 1; $i <= $count_bombas; $i++) {
                $id_testeh_mb = $dados['id_bomba_'.$i];
                if (!empty($dados['pressao_reg_fechado_'.$id_testeh_mb]) && !empty($dados['pressao_reg_fechado_'.$id_testeh_mb]) && 
                    !empty($dados['pressao_reg_fechado_'.$id_testeh_mb]) && !empty($dados['pressao_reg_fechado_'.$id_testeh_mb])){
                    $bomba['pressao_reg_fechado'] = $dados['pressao_reg_fechado_'.$id_testeh_mb];
                    $bomba['pressao_reg_aberto'] = $dados['pressao_reg_aberto_'.$id_testeh_mb];
                    $bomba['pressao_centro'] = $dados['pressao_centro'];
                    $bomba['pressao_ult_torre'] = $dados['pressao_ult_torre'];

                    EntregaTecnicaTesteHidraulicoMotoBomba::where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->where('id_testeh_mb', $id_testeh_mb)
                    ->update($bomba);
                } else {
                    Notificacao::gerarAlert('', 'entregaTecnica.cadastro_vazio_teste_motobomba', 'warning');
                    return redirect()->back();
                }

                // IMAGENS DO TESTE DA MOTOBOMBA
                $namefile_mb_banco_dados = array ('pressao_reg_fechado_img', 'pressao_reg_aberto_img',
                'pressao_centro_img', 'pressao_ult_torre_img',);
    
                $indice = $id_entrega_tecnica.'_'.$id_testeh_mb;
    
                $namefile_mb = array ('pressao_reg_fechado_img_'.$indice, 'pressao_reg_aberto_img_'.$indice,
                'pressao_centro_img_'.$indice, 'pressao_ult_torre_img_'.$indice);            
                
                $imagens_mb = array(        
                    $dados['pressao_reg_fechado_img_'.$id_testeh_mb], 
                    $dados['pressao_reg_aberto_img_'.$id_testeh_mb],
                    $dados['pressao_centro_img'],
                    $dados['pressao_ult_torre_img'],
                );
    
                $j = 0;
    
                foreach ($imagens_mb as $img) {
                    if ($img != null) {
                        // Recupera a extensão do arquivo
                        $extension = $img->extension();
                        // Define finalmente o nome
                        $nameFile = $namefile_mb[$j].'_mb.'.$extension;
    
                        // faz o upload do arquivo no projeto
                        $file = $img->storeAs('projetos/entrega_tecnica/teste_motobomba_' . $id_entrega_tecnica, $nameFile);

                        EntregaTecnicaTesteHidraulicoMotoBomba::where('id_entrega_tecnica', $id_entrega_tecnica)
                        ->where('id_testeh_mb', $id_testeh_mb)
                        ->update([
                            '' . $namefile_mb_banco_dados[$j] . '' => $file
                        ]);
                    }
    
                    $j += 1;
                }
    
                unset($namefile_mb);
                unset($imagens_mb);
            }
            
        /////////////////////////////////

        // TESTES CHAVE PARTIDA VALORES INPUT
            for ($i = 1; $i <= $count_bombas; $i++) {       
                $id_bomba = $dados['id_bomba_'.$i];

                $count_motor = EntregaTecnicaBombaMotor::select('id_motor')
                ->where('id_bomba', $id_bomba)
                ->where('id_entrega_tecnica', $id_entrega_tecnica)
                ->count();


                for ($j = 1; $j <= $count_motor; $j++) {
                    $id_motor = $dados['id_motor_'.$id_bomba.'_'.$j];     

                    $cp = EntregaTecnicaChavePartida::select('id_chave_partida')
                    ->where('id_bomba', $id_bomba)
                    ->where('id_motor', $id_motor)
                    ->where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->count();

                    for ($x = 1; $x <= $cp; $x++) {
                        if (!empty($dados['tensao_rs_semcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && !empty($dados['tensao_st_semcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && 
                            !empty($dados['tensao_rt_semcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && !empty($dados['tensao_rs_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && 
                            !empty($dados['tensao_st_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && !empty($dados['tensao_rt_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && 
                            !empty($dados['corrente_rs_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && !empty($dados['corrente_st_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x]) && 
                            !empty($dados['corrente_rt_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x])) {
                                $teste_chave_partida['tensao_rs_semcarga'] = $dados['tensao_rs_semcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['tensao_st_semcarga'] = $dados['tensao_st_semcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['tensao_rt_semcarga'] = $dados['tensao_rt_semcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['tensao_rs_comcarga'] = $dados['tensao_rs_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['tensao_st_comcarga'] = $dados['tensao_st_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['tensao_rt_comcarga'] = $dados['tensao_rt_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['corrente_rs_comcarga'] = $dados['corrente_rs_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['corrente_st_comcarga'] = $dados['corrente_st_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                $teste_chave_partida['corrente_rt_comcarga'] = $dados['corrente_rt_comcarga_cp_0'.$id_bomba. '_' .$id_motor . '_' . $x];
                                EntregaTecnicaTesteEletricoCp::where('id_bomba', $id_bomba)
                                ->where('id_motor', $id_motor)
                                ->where('id_entrega_tecnica', $id_entrega_tecnica)
                                ->where('id_chave_partida', $x)
                                ->update($teste_chave_partida);
                        } else {
                            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_vazio_teste_chave_partida', 'warning');
                            return redirect()->back();
                        }
                        
                        // SALVAR IMAGENS DOS CAMPOS DE TESTE DA CHAVE DE PARTIDA

                        $namefile_cp_banco_dados = array ('tensao_rs_semcarga_img', 'tensao_st_semcarga_img',
                        'tensao_rt_semcarga_img', 'tensao_rs_comcarga_img',
                        'tensao_st_comcarga_img', 'tensao_rt_comcarga_img',
                        'corrente_rs_comcarga_img', 'corrente_st_comcarga_img',
                        'corrente_rt_comcarga_img');

                        $indice = $id_entrega_tecnica.'_'.$x;

                        $namefile_cp = array ('tensao_rs_semcarga_cp_img_'.$indice, 'tensao_st_semcarga_cp_img_'.$indice,
                        'tensao_rt_semcarga_cp_img_'.$indice, 'tensao_rs_comcarga_cp_img_'.$indice,
                        'tensao_st_comcarga_cp_img_'.$indice, 'tensao_rt_comcarga_cp_img_'.$indice,
                        'corrente_rs_comcarga_cp_img_'.$indice, 'corrente_st_comcarga_cp_img_'.$indice,
                        'corrente_rt_comcarga_cp_img_'.$indice);                       

                        $imagens_cp = array(        
                            $dados['tensao_rs_semcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x], 
                            $dados['tensao_st_semcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['tensao_rt_semcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['tensao_rs_comcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['tensao_st_comcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['tensao_rt_comcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['corrente_rs_comcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['corrente_st_comcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                            $dados['corrente_rt_comcarga_cp_img_0'.$id_bomba. '_' .$id_motor . '_' . $x],
                        );

                        $j = 0;
                        foreach ($imagens_cp as $img) {
                            if ($img != null) {
                                // Recupera a extensão do arquivo
                                $extension = $img->extension();

                                // Define finalmente o nome
                                $nameFile = $namefile_cp[$j].'_cp.'.$extension;

                                // faz o upload do arquivo no projeto
                                $file = $img->storeAs('projetos/entrega_tecnica/teste_chave_partida_' . $id_entrega_tecnica, $nameFile);

                                EntregaTecnicaTesteEletricoCp::where('id_bomba', $id_bomba)
                                ->where('id_motor', $id_motor)
                                ->where('id_entrega_tecnica', $id_entrega_tecnica)
                                ->where('id_chave_partida', $x)
                                ->update([$namefile_cp_banco_dados[$j] => $file]);
                            }

                            $j += 1;
                        }

                        unset($namefile_cp);
                        unset($imagens_cp);
                    }
                }
            }
        //////////////////////////////////////

        // CALCULO DE COMPARAÇÃO DA VELOCIDADE DA ULTIMA TORRE COM A LEITURA DE HORÍMETRO
            $giro = EntregaTecnica::select('giro')->where('id', $id_entrega_tecnica)->first();            
            $calculo_giro = (360 / $giro['giro']);
            $velocidade_ult_torre = number_format($dados['velocidade_ult_torre'], 2);
            $soma_lances = DB::table("entrega_tecnica_lances")->get()->sum("comprimento_lance");
            $calculo_velocidade = (( 2 * $soma_lances * pi()) / $velocidade_ult_torre) * $calculo_giro;

            if ($calculo_velocidade > $dados['leitura_horímetro']) {            
                Notificacao::gerarAlert('', 'entregaTecnica.erro_calculo', 'warning');
                return redirect()->back();
            } else {
                // Recupera a extensão do arquivo
                if ($dados['leitura_horímetro_img'] != null) {
                    $extension = $dados['leitura_horímetro_img']->extension();
                    // Define finalmente o nome
                    $nameFile = 'leitura_horimetro.'.$extension;
                    
                    // faz o upload do arquivo no projeto
                    $file = $dados['leitura_horímetro_img']->storeAs('projetos/entrega_tecnica/leitura_horimetro_' . $id_entrega_tecnica, $nameFile);
                }

                
                $velocidade = EntregaTecnicaTesteHidraulicoVelocidade::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
                $id_testeh_vut = $velocidade['id_testeh_vut'];

                if (count($velocidade) > 0) {
                    EntregaTecnicaTesteHidraulicoVelocidade::where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->where('id_testeh_vut', $id_testeh_vut)->update([
                        'velocidade_ult_torre' => $velocidade_ult_torre,
                        'leitura_horímetro' => $dados['leitura_horímetro'],
                        'leitura_horímetro_img' => $file,
                        'valor_tempo' => $calculo_velocidade
                    ]);
                }

            }
        /////////////////////////////////////////////////////////////////////////////////
        
        $img_tc = EntregaTecnicaTesteEletricoTc::select('tensao_rs_semcarga_img', 'tensao_st_semcarga_img', 'tensao_rt_semcarga_img', 'tensao_rs_comcarga_img', 'tensao_st_comcarga_img',
        'tensao_rt_comcarga_img')
        ->where('id_entrega_tecnica', $id_entrega_tecnica)
        ->first();
        
        $img_cp = EntregaTecnicaTesteEletricoCp::select('tensao_rs_semcarga_img', 'tensao_st_semcarga_img', 'tensao_rt_semcarga_img', 'tensao_rs_comcarga_img', 'tensao_st_comcarga_img',
        'tensao_rt_comcarga_img', 'corrente_rs_comcarga_img', 'corrente_st_comcarga_img', 'corrente_rt_comcarga_img')
        ->where('id_entrega_tecnica', $id_entrega_tecnica)
        ->get();

        $img_mb = EntregaTecnicaTesteHidraulicoMotoBomba::select('pressao_reg_fechado_img', 'pressao_reg_aberto_img', 'pressao_centro_img', 'pressao_ult_torre_img')->get();

        for ($i = 0; $i < count($img_cp); $i++) {
            for ($j = 0; $j < count($img_mb); $j++) {
                if (
                    !empty($img_tc['tensao_rs_semcarga_img']) && !empty($img_tc['tensao_st_semcarga_img']) && 
                    !empty($img_tc['tensao_rt_semcarga_img']) && !empty($img_tc['tensao_rs_comcarga_img']) && 
                    !empty($img_tc['tensao_st_comcarga_img']) && !empty($img_tc['tensao_rt_comcarga_img']) &&
                    
                    !empty($img_cp[$i]['tensao_rs_semcarga_img']) && !empty($img_cp[$i]['tensao_st_semcarga_img']) && 
                    !empty($img_cp[$i]['tensao_rt_semcarga_img']) && !empty($img_cp[$i]['tensao_rs_comcarga_img']) && 
                    !empty($img_cp[$i]['tensao_st_comcarga_img']) && !empty($img_cp[$i]['tensao_rt_comcarga_img']) && 
                    !empty($img_cp[$i]['corrente_rs_comcarga_img']) && !empty($img_cp[$i]['corrente_st_comcarga_img']) && 
                    !empty($img_cp[$i]['corrente_rt_comcarga_img']) &&
        
                    !empty($img_mb[$j]['pressao_reg_fechado_img']) && !empty($img_mb[$j]['pressao_reg_aberto_img']) && 
                    !empty($img_mb[$j]['pressao_centro_img']) && !empty($img_mb[$j]['pressao_ult_torre_img'])
                ) {
                    EntregaTecnica::where('id', $id_entrega_tecnica)->update([
                        'status_testes' => 2
                    ]);
                }
            }
        }
            
        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_testes', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);                        
        } else {
            return redirect()->back();
        }
    }

    // RELATÓRIO ENTREGA TECNICA
    public function datasheetTechnicalDelivery($id_entrega_tecnica)
    {

        if (session()->has('fazenda')) {
            $fazenda = session()->get('fazenda');            
            $id_fazenda = Session::get('fazenda')['id'];
            
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
                
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
            'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
            ->join('users as U', 'US.id_usuario', '=', 'U.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->where('entrega_tecnica.id_fazenda', $id_fazenda)
            ->where('entrega_tecnica.id', $id_entrega_tecnica)
            ->get();

            $lances = EntregaTecnicaLances::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $autotrafo = EntregaTecnicaBombaAutotrafo::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();

            $adutora = EntregaTecnicaAdutora::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $bombas = EntregaTecnicaBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $motores = EntregaTecnicaBombaMotor::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $chave_partida = EntregaTecnicaChavePartida::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $teste_torre_central = EntregaTecnicaTesteEletricoTc::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
            $teste_bombas = EntregaTecnicaTesteHidraulicoMotoBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $teste_chave_partida = EntregaTecnicaTesteEletricoCp::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $telemetria = EntregaTecnicaTelemetria::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
        }

        return view('entregaTecnica.relatorios.report', compact('entrega_tecnica', 'id_entrega_tecnica', 'fazenda', 'lances', 'autotrafo', 'bombas', 'motores', 'chave_partida',
                    'teste_torre_central', 'teste_bombas', 'teste_chave_partida', 'adutora', 'telemetria'));
    }

    public function sendTechnicalDelivery($id_entrega_tecnica)
    {
        if (session()->has('fazenda')) {
            $fazenda = session()->get('fazenda');            
            $id_fazenda = Session::get('fazenda')['id'];
            
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
        }
                
        $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
        'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario')
        ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
        ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
        ->join('users as U', 'US.id_usuario', '=', 'U.id')
        ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
        ->where('entrega_tecnica.id_fazenda', $id_fazenda)
        ->first();

        return view('entregaTecnica.relatorios.sendTechnicalDelivery', compact('id_entrega_tecnica', 'entrega_tecnica'));
    }

    public function sendCompleteTechnicalDelivery(Request $request)
    {
        $dados = $request->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        if (!empty($dados['data_envio_entrega_tecnica']) && !empty($dados['declaracao_img'])) {
                $extension = $dados['declaracao_img']->extension();
                // Define finalmente o nome
                $nameFile = 'declaracao.'.$extension;
            
                // faz o upload do arquivo no projeto
                $file = $dados['declaracao_img']->storeAs('projetos/entrega_tecnica/declaracao_' . $id_entrega_tecnica, $nameFile);
                $envio['img_declaracao'] = $file;
                $envio['data_envio_entrega_tecnica'] = $dados['data_envio_entrega_tecnica'];
                $envio['observacoes_envio'] = $dados['observacoes_envio'];
                $envio['status'] = 3;
                // EntregaTecnica::where('id', $id_entrega_tecnica)->update($envio);
                

                // ENVIO DO EMAIL PARA O CONSULTOR //

                    if (session()->has('fazenda')) {
                        $fazenda = session()->get('fazenda');            
                        $id_fazenda = Session::get('fazenda')['id'];
                        
                        $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                            ->where('fazendas.id', $id_fazenda)
                            ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                            ->join('users as U', 'U.id', 'fazendas.id_consultor')
                            ->first();
                            
                        $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
                        'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
                        ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                        ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
                        ->join('users as U', 'US.id_usuario', '=', 'U.id')
                        ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                        ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                        ->where('entrega_tecnica.id', $id_entrega_tecnica)
                        ->first();
                    }

                    $fromSend = 'noreply@valleycheckpivot.com';
                    $subjectTitle = 'Confirmação Envio de Entrega Técnica';
                    $msg = 'A Entrega Técnica do Nº Pedido ' . $entrega_tecnica['numero_pedido'] . ', foi enviada para análise';                
                    $toUser = $entrega_tecnica['email_tecnico'];
                    Mail::send(new \App\Mail\SendMailUser($toUser, $fromSend, $msg, $subjectTitle));
                /////////////////////////////////////
        } else {           
            Notificacao::gerarAlert('', 'entregaTecnica.dados_incompletos', 'warning');
            return redirect()->back();            
        }

        return redirect()->route('manage_technical_delivery');

    }

    // ANÁLISE ENTREGA TÉCNICA
    public function manageAnalysisTechnicalDelivery() 
    {   
        
        session()->put('current_module', 'entrega_tecnica_analise');

        $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'U.nome as nome_usuario')
        ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
        ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
        ->join('users as U', 'US.id_usuario', '=', 'U.id')
        ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
        ->orderby('data_entrega_tecnica', 'desc')
        ->get();
        
        foreach ($entrega_tecnica as $id) {
            $id_entrega_tecnica = $id['id'];
        }

        return view('entregaTecnica.analise.gerenciarAnaliseEntregaTecnica', compact('entrega_tecnica', 'id_entrega_tecnica'));
    }

    public function analysisTechnicalDelivery($id_entrega_tecnica) 
    {
        $entrega_tecnica_status = EntregaTecnica::select('status')->where('id', $id_entrega_tecnica)->first();

        if (session()->has('fazenda')) {
            $fazenda = session()->get('fazenda');            
            $id_fazenda = Session::get('fazenda')['id'];
            
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
                
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
            'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
            ->join('users as U', 'US.id_usuario', '=', 'U.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->where('entrega_tecnica.id_fazenda', $id_fazenda)
            ->where('entrega_tecnica.id', $id_entrega_tecnica)
            ->get();

            $lances = EntregaTecnicaLances::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $autotrafo = EntregaTecnicaBombaAutotrafo::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
            $adutora = EntregaTecnicaAdutora::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $bombas = EntregaTecnicaBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $motores = EntregaTecnicaBombaMotor::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $chave_partida = EntregaTecnicaChavePartida::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $teste_torre_central = EntregaTecnicaTesteEletricoTc::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
            $teste_bombas = EntregaTecnicaTesteHidraulicoMotoBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            $teste_chave_partida = EntregaTecnicaTesteEletricoCp::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();            
            $telemetria = EntregaTecnicaTelemetria::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
            $motobomba = EntregaTecnica::select('tipo_succao', 'succao_auxiliar', 'status_succao')->where('id', $id_entrega_tecnica)->first();
            $campos_reprovados = Lista::listaCamposET();

            return view('entregaTecnica.analise.analisarEntregaTecnica', compact('entrega_tecnica', 'id_entrega_tecnica',
            'lances', 'autotrafo', 'adutora', 'bombas', 'motores', 'chave_partida', 'teste_torre_central', 'teste_bombas', 
            'teste_chave_partida', 'telemetria', 'motobomba', 'campos_reprovados', 'entrega_tecnica_status'));
        }
    }

    public function sendAnalisyTechnicalDelivery(Request $req)
    {
        $dados = $req->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        if ($dados['situacao'] == 2) {
            Notificacao::gerarAlert('', 'entregaTecnica.dados_incompletos', 'warning');
            return redirect()->back();
        } else {
            $versao_analise = EntregaTecnicaAnalise::select('versao')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            $nova_versao = $versao_analise + 1;
            $analise['id_entrega_tecnica'] = $id_entrega_tecnica;
            $analise['versao'] = $nova_versao;
            $analise['status'] = $dados['situacao'];
            $analise['observacoes'] = $dados['observacoes'];
            EntregaTecnicaAnalise::create($analise);
    
            if ($dados['situacao'] == 0) {
                if (!empty($dados['tags'])) {
                    for ($i = 0; $i < count($dados['tags']); $i++) {
                        $divergencia['id_entrega_tecnica'] = $id_entrega_tecnica;
                        $divergencia['versao'] = $nova_versao;
                        $divergencia['divergencia'] = $dados['tags'][$i];
                        EntregaTecnicaAnaliseDivergencia::create($divergencia);
                        unset($divergencia);
                    }
                } else {
                    Notificacao::gerarAlert('', 'entregaTecnica.dados_incompletos', 'warning');
                    return redirect()->back();
                }
            }

            if ($dados['situacao'] == 1) {
                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status' => 4]);
            } else if ($dados['situacao'] == 0) {
                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status' => 5]);
            }
            
            // ENVIO DO EMAIL PARA O CONSULTOR //

                if (session()->has('fazenda')) {
                    $fazenda = session()->get('fazenda');            
                    $id_fazenda = Session::get('fazenda')['id'];
                    
                    $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                        ->where('fazendas.id', $id_fazenda)
                        ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                        ->join('users as U', 'U.id', 'fazendas.id_consultor')
                        ->first();
                        
                    $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'P.email as email_cliente',
                    'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
                    ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                    ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
                    ->join('users as U', 'US.id_usuario', '=', 'U.id')
                    ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                    ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                    ->where('entrega_tecnica.id', $id_entrega_tecnica)
                    ->first();
                }


                if ($entrega_tecnica['status'] === 4) {
                    $msgTec = 'A situação da Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi aprovada!';
                    $msgClient = 'A Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi realizada com sucesso!';
                } else if ($entrega_tecnica['status'] === 5) {
                    $msgTec = 'A situação da Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi reprovada!';
                    $msgClient = 'A Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi realizada com sucesso!';
        }

                $fromSend = 'noreply@valleycheckpivot.com';
                $subjectTitle = 'Confirmação Envio de Análise da Entrega Técnica';        
                
                $email_tecnico = $entrega_tecnica['email_tecnico'];
                $email_cliente = $entrega_tecnica['email_cliente'];

                $toTec = $email_tecnico;
                $toClient = $email_cliente;
                
                Mail::send(new \App\Mail\SendMailUser($toTec, $fromSend, $msgTec, $subjectTitle));
                Mail::send(new \App\Mail\SendMailUser($toClient, $fromSend, $msgClient, $subjectTitle));
            /////////////////////////////////////
        }
        return redirect()->route('manage_analysis_technical_delivery');
    }

    // EXCLUIR ENTREGA TECNICA
    public function delete($id)
    {
        $delete = EntregaTecnica::find($id);
        $delete->delete();
        return redirect()->route('historic_technical_delivery')->with('Sucesso', 'Foi deletado');
    }
}
