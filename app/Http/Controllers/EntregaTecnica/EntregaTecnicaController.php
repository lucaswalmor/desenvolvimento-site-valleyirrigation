<?php

namespace App\Http\Controllers\EntregaTecnica;

use App\Classes\Comum\Validates;
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
use App\Mail\SendMailUser;
use App\User;
use CreateEntregaTecnicaTestehMb;
use Illuminate\Support\Facades\Lang;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use stdClass;

class EntregaTecnicaController extends Controller
{
    // To manage
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

            // List of technical delivery for status update, if needed
            $entrega_tecnica_status = EntregaTecnica::select('id')->where('id_fazenda', $id_fazenda)->get();
            foreach ($entrega_tecnica_status as $item) {
                // Check and change, if needed, the technical delivery status.
                $this->updateStatus($item['id']);
            }
        
            // List of technical delivery for managered
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'users.nome as nome_tecnico', 'P.nome as nome_proprietario')
                ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                ->join('users', 'entrega_tecnica.id_tecnico', '=', 'users.id')
                ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                ->get();

            $proprietarios = Proprietario::select('nome', 'id')->orderBy('nome')->get();
            $revendas = Revendas::select('id', 'nome')->get();
            $consultores = User::where('tipo_usuario', 3)->where('situacao', 1)->select('id', 'nome')->get();

            return view('entregaTecnica.manage', compact('entrega_tecnica', 'proprietarios', 'revendas', 'consultores', 'fazenda', 'status', 'tecnico'));
        } else {
            redirect()->back()->with('error', __('afericao.selecione_fazenda'), 'warning');
            return redirect()->route('dashboard');
        }
    }

    // To create a new Technical Delivery
    public function saveTechnicalDelivery(Request $request) 
    {
        $dados = $request->all();

        // check if the Order Number already exists
        $found_entrega_tecnica = EntregaTecnica::where('numero_pedido', $dados['numero_pedido'])->count();
        
        if ($found_entrega_tecnica == 0) {
            // if Order Number not exists

            $situacao = "create";
            $situacao = Session::put('situacao', $situacao);

            $tecnico = session()->get('user_logged')->id;
            // $nova_entrega_tecnica['id_tecnico'] = $dados['id_tecnico'];
            $nova_entrega_tecnica['id_tecnico'] = $tecnico;
            $nova_entrega_tecnica['id_fazenda'] = $dados['id_fazenda'];
            $nova_entrega_tecnica['numero_pedido'] = $dados['numero_pedido'];
            $nova_entrega_tecnica['data_entrega_tecnica'] = $dados['data_entrega_tecnica'];
            $nova_entrega_tecnica['tipo_entrega_tecnica'] = $dados['tipo_entrega_tecnica'];
    
            $entrega_tecnica = EntregaTecnica::create($nova_entrega_tecnica);
            
            $id_entrega_tecnica = $entrega_tecnica['id'];
    
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica); 
        } 
        else {
            // if Order Number exists
            Notificacao::gerarAlert('', 'entregaTecnica.erro_pedido_existe', 'warning');
            return redirect()->route('manage_technical_delivery');
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
                        ->where(function ($query) use ($request) {
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
                        ->where(function ($query) use ($request) {
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

    // Cards
    public function editTechnicalDelivery($id_entrega_tecnica)
    { 
        // Check and change, if needed, the technical delivery status.
        $this->updateStatus($id_entrega_tecnica);

        $entrega_tecnica = EntregaTecnica::select('*')->where('id', $id_entrega_tecnica)->first();
        $qtd_chave_partida = EntregaTecnicaChavePartida::select('id_chave_partida')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
        $qtd_bombas = EntregaTecnicaBomba::select('id_bomba')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
        $tem_pivo = EntregaTecnica::select('tipo_equipamento')->where('id', $id_entrega_tecnica)->first();
      
        return view('entregaTecnica.editar.editTechnicalDelivery', compact('id_entrega_tecnica', 'qtd_chave_partida', 'entrega_tecnica', 'qtd_bombas', 'tem_pivo'));
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

    // Telemetry
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

        $telemetria = EntregaTecnicaTelemetria::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();

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
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_telemetria' => 2]);
        }

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_telemetria', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica); 
        } else {
            return redirect()->back();
        }
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
                $trecho['parada_automatica'] = (empty($dados['parada_automatica'])) ? null : $dados['parada_automatica'];  
                $trecho['barreira_seguranca'] = (empty($dados['barreira_seguranca'])) ? null : $dados['barreira_seguranca'];  
                $trecho['telemetria'] = $dados['telemetria'];  
                $trecho['acessorios'] = $dados['acessorios'];  
                $trecho['injeferd'] = (empty($dados['injeferd'])) ? null : $dados['injeferd'];  
                $trecho['canhao_final_valvula'] = (empty($dados['canhao_final_valvula'])) ? null : $dados['canhao_final_valvula'];  
                $trecho['giro'] = $dados['giro'];  

                if (!empty($dados['numero_serie']) && !empty($dados['modelo']) && !empty($dados['tipo_equipamento']) && 
                    !empty($dados['tipo_equipamento_op1']) && !empty($dados['altura_equipamento']) && !empty($dados['balanco']) && 
                    !empty($dados['painel']) && !empty($dados['corrente']) && !empty($dados['pneus']) && !empty($dados['giro'])) {
                    
                    $trecho['status_parte_aerea'] = 2;
                } 
                else {
                    $trecho['status_parte_aerea'] = 1;
                }

                $equipamento_existente = EntregaTecnica::select('tipo_equipamento')->where('id', $id_entrega_tecnica)->first();

                // if user edit the equipment type and change the value, 
                if ($equipamento_existente['tipo_equipamento'] != $dados['tipo_equipamento']) {
                    EntregaTecnicaLances::select('id_entrega_tecnica')->where('id_entrega_tecnica', $id_entrega_tecnica)->delete();
                }
            
                EntregaTecnica::where('id', $id_entrega_tecnica)->update($trecho);
                
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

        // checks if you have existing bids in this technical delivery
        $spans = EntregaTecnicaLances::where('id_entrega_tecnica', $id_entrega_tecnica)->count();

        // delete the existing bids in this technical delivery and recreate the bids again
        if ($spans > 0) {
            EntregaTecnicaLances::where('id_entrega_tecnica', $id_entrega_tecnica)->forceDelete();
        }

        $status_lances = 0;
        for ($i = 0; $i < count($dados['diametro']); $i++) {
            $id_lance = (INT)$dados['id_lance'][$i];
            $modelo = explode('_', $dados['qtd_tubos'][$i],2 );
            $qtd_tubos = (int)$modelo[0];
            $comprimento_lances = Lista::getTamanhoLance($dados['diametro'][$i], $modelo[1]);

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

            if ($status_lances != 1) {
                if (!empty($dados['diametro'][$i]) && !empty($dados['numero_serie'][$i]) && !empty($dados['qtd_tubos'][$i]) &&
                    !empty($dados['motorredutor_marca'][$i]) && !empty($dados['motorredutor_potencia'][$i])) {
                    $status_lances = 2;   
                } else {
                    $status_lances = 1;
                }
            }
        }       

        EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_lances' => $status_lances]);

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
            $chave_partida = EntregaTecnicaChavePartida::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->orderby('id_bomba')->orderby('id_motor')->orderby('id_chave_partida')->get();
        /////////////////////

        return view('entregaTecnica.cadastro.createMotoPump', compact('id_entrega_tecnica', 'fazenda', 'tipo_succao', 'tipo_succao_auxiliar', 
                    'motobomba', 'bombaLigacao', 'bomba_marca', 'tipo_bomba', 'total_bomba_padrao', 'total_bomba_auxiliar', 'bomba_modelo', 
                    'tipo_motor', 'motor_marca', 'bombas', 'bomba_padrao_cadastrada', 'bomba_auxiliar_cadastrada', 'total_bombas_cadastradas', 
                    'motores', 'chavePartida', 'chavePartidaAcionamento', 'chaveSeccionadora', 'chave_partida', 'fornecedores'));
    }

    public function savePressurizationTechnicalDelivery(Request $request)
    {
        $dados = $request->all();

        dd($dados);
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        if ($dados['quantidade_motobomba'] == 0 || empty($dados['quantidade_motobomba'])) {
            Notificacao::gerarAlert('', 'entregaTecnica.qtd_bombas_erro', 'warning');
            return redirect()->back();
        } else if (empty($dados['id_bomba'])) {
            Notificacao::gerarAlert('', 'entregaTecnica.gerar_bomba', 'warning');
            return redirect()->back();
        } else {    
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

            if (!empty($dados['quantidade_motobomba']) && !empty($dados['img_succao'])) {
                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 1]);
            }

            // soma o total de bombas padrões com as auxiliares
            $total_bombas = $dados['quantidade_motobomba'] + $dados['quantidade_motobomba_auxiliar'];

            // SE ALGUM CAMPO DA BOMBA ESTIVER PREENCHIDO IRÁ SALVAR A BOMBA
            for ($i = 0; $i < $total_bombas; $i++) {
                $id_bomba = $dados['id_bomba'][$i];

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
                        
                        $img_plaqueta = $dados['plaqueta_img_'.$id_bomba][$k];
                        
                        if ($img_plaqueta != null) {

                            // SALVAR IMAGENS DOS CAMPOS DE TESTE DA CHAVE DE PARTIDA
                            $namefile = 'plaqueta_img_'.$id_bomba.'_'. ($k + 1);
    
                            // Recupera a extensão do arquivo
                            $extension = $img_plaqueta->extension();

                            // Define finalmente o nome
                            $nameFile = $namefile.'.'.$extension;

                            // faz o upload do arquivo no projeto

                            $file = $img_plaqueta->storeAs('projetos/entrega_tecnica/plaqueta_motor_' . $id_entrega_tecnica, $nameFile);

                            EntregaTecnicaBombaMotor::where('id_entrega_tecnica', $id_entrega_tecnica)
                            ->where('id_bomba', $id_bomba)
                            ->where('id_motor', $id_motor)
                            ->update([
                                'plaqueta_img' => $file
                            ]);
                        }

                        unset($namefile);
                        unset($img_plaqueta);

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

                        $chave_partida['marca'] = $dados['marca_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        $chave_partida['acionamento'] = $dados['acionamento_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        $chave_partida['regulagem_reles'] = $dados['regulagem_reles_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        $chave_partida['numero_serie'] = $dados['numero_serie_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        $chave_partida['drive_connect'] = $dados['drive_connect_0'.$id_bomba.'_0'.$id_motor.'_1'];
                        $chave_partida['id_chave_partida'] = $id_chave_partida;
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

                        // Checks the fields if it is electric to change the registration status
                        if ($dados['marca'][$i] != null && $dados['modelo'][$i] != null && $dados['numero_estagio'][$i] != null && 
                            $dados['rotor'][$i] != null && $dados['opcionais'][$i] != null && $dados['fornecedor'][$i] != null && 
                            $dados['numero_serie'][$i] != null && $dados['quantidade_motobomba'] != null && $dados['img_succao'] != null ) {

                            // BOMBA
                            if (!empty($dados['tipo_motor_' . $id_bomba][$k]) && !empty($dados['marca_motor_eletrico_'.$j][$k]) && 
                                !empty($dados['modelo_motor_eletrico_'.$j][$k]) && !empty($dados['potencia_'.$j][$k]) && 
                                !empty($dados['numero_serie_'.$j][$k]) && !empty($dados['rotacao_'.$j][$k])) {
                                
                                // MOTOR
                                if(!empty($dados['marca_0'.$id_bomba.'_0'.$id_motor.'_1']) && !empty($dados['acionamento_0'.$id_bomba.'_0'.$id_motor.'_1']) && 
                                !empty($dados['regulagem_reles_0'.$id_bomba.'_0'.$id_motor.'_1']) && !empty($dados['numero_serie_0'.$id_bomba.'_0'.$id_motor.'_1'])) {
                                    
                                    // CHAVE DE PARTIDA
                                    EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 2]);
                                } 
                            }
                        } else if ($dados['marca'][$i] != null || $dados['modelo'][$i] != null || $dados['numero_estagio'][$i] != null || 
                                $dados['rotor'][$i] != null || $dados['opcionais'][$i] != null || $dados['fornecedor'][$i] != null || 
                                $dados['numero_serie'][$i] != null || $dados['quantidade_motobomba'] != null && $dados['img_succao'] != null) {
                            // BOMBA
                            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 1]);

                            if (!empty($dados['tipo_motor_' . $id_bomba][$k]) || !empty($dados['marca_motor_'.$j][$k]) || 
                                !empty($dados['modelo_motor_'.$j][$k]) || !empty($dados['marca_motor_eletrico_'.$j][$k]) || 
                                !empty($dados['modelo_motor_eletrico_'.$j][$k]) || !empty($dados['potencia_'.$j][$k]) || 
                                !empty($dados['numero_serie_'.$j][$k]) || !empty($dados['rotacao_'.$j][$k])) {
                                
                                // MOTOR
                                EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 1]);
                                        
                                // CHAVE DE PARTIDA
                                if(!empty($dados['marca_0'.$id_bomba.'_0'.$id_motor.'_1']) || !empty($dados['acionamento_0'.$id_bomba.'_0'.$id_motor.'_1']) || 
                                !empty($dados['regulagem_reles_0'.$id_bomba.'_0'.$id_motor.'_1']) || !empty($dados['numero_serie_0'.$id_bomba.'_0'.$id_motor.'_1'])) {
                                    
                                    // CHAVE DE PARTIDA
                                    EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 1]);
                                }
                            }
                        }
                    }

                    // Checks the fields if it is diesel to change the registration status
                    // if ($dados['tipo_motor_' . $id_bomba][$k] == 'diesel') {
                    //     if ($dados['marca'][$i] != null && $dados['modelo'][$i] != null && $dados['numero_estagio'][$i] != null && 
                    //         $dados['rotor'][$i] != null && $dados['opcionais'][$i] != null && $dados['fornecedor'][$i] != null && 
                    //         $dados['numero_serie'][$i] != null && $dados['quantidade_motobomba'] != null && $dados['img_succao'] != null) {
                            
                    //         // BOMBA
                    //         if (!empty($dados['tipo_motor_' . $id_bomba][$k]) && !empty($dados['marca_motor_'.$j][$k]) && 
                    //             !empty($dados['modelo_motor_'.$j][$k]) && !empty($dados['potencia_'.$j][$k]) && 
                    //             !empty($dados['numero_serie_'.$j][$k]) && !empty($dados['rotacao_'.$j][$k])) {

                    //             // MOTOR
                    //             EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 2]);
                    //         }
                    //     } else if ($dados['marca'][$i] != null || $dados['modelo'][$i] != null || $dados['numero_estagio'][$i] != null || 
                    //                $dados['rotor'][$i] != null || $dados['opcionais'][$i] != null || $dados['fornecedor'][$i] != null || 
                    //                $dados['numero_serie'][$i] != null || $dados['quantidade_motobomba'] || $dados['img_succao']) {
                    //         // BOMBA
                    //         EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 1]);
                            
                    //         if (!empty($dados['tipo_motor_' . $id_bomba][$k]) || !empty($dados['marca_motor_'.$j][$k]) || 
                    //             !empty($dados['modelo_motor_'.$j][$k]) || !empty($dados['potencia_'.$j][$k]) || 
                    //             !empty($dados['numero_serie_'.$j][$k]) || !empty($dados['rotacao_'.$j][$k])) {
                    //             // MOTOR
                    //             EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_motobomba' => 1]);
                    //         }
                    //     }
                    // }

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
                    EntregaTecnicaBombaAutotrafo::where('id_entrega_tecnica', $id_entrega_tecnica)->update([
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
            
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_autotrafo' => 2]);
        } 
        else if ((!empty($dados['potencia_elevacao']) || !empty($dados['tap_entrada_elevacao']) || !empty($dados['tap_saida_elevacao']) || 
                  !empty($dados['corrente_disjuntor']) || !empty($dados['numero_serie_elevacao'])) || 
                 (!empty($dados['gerador']) || !empty($dados['gerador_marca']) || !empty($dados['gerador_modelo']) || 
                  !empty($dados['gerador_potencia']) || !empty($dados['gerador_frequencia']) || !empty($dados['gerador_tensao'])) ) {

            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_autotrafo' => 1]);
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
        $aspersor_canhao_final_marca = Lista::getAspersorCanhaoFinal();
        $motobomba_booster_modelo = Lista::getMotobombaBoostermodelo();
        $reguladorModelo = Lista::getReguladorModelo();

        $aspersores = EntregaTecnica::select('aspersor_marca', 'aspersor_modelo', 'aspersor_defletor', 'aspersor_impacto_marca',
                                             'aspersor_impacto_modelo', 'aspersor_regulador_marca', 'aspersor_regulador_modelo', 
                                             'aspersor_pressao', 'tubo_descida', 'trilha_seca', 'aspersor_canhao_final_marca', 
                                             'aspersor_canhao_final_modelo', 'aspersor_mbbooster_marca', 'aspersor_mbbooster_modelo', 
                                             'status_aspersores', 'aspersor_mbbooster_rotor', 'aspersor_mbbooster_potencia', 
                                             'aspersor_mbbooster_corrente')
            ->where('id', $id_entrega_tecnica)->first();

        $modelos = explode(", ", $aspersores['aspersor_regulador_modelo']);

        return view('entregaTecnica.cadastro.createSprinklers', compact('id_entrega_tecnica', 'aspersor_marca', 'aspersor_modelo', 
                    'modelos', 'defletores', 'pressao', 'aspersor_opcional', 'aspersor_canhao_final_marca', 'motobomba_booster_modelo', 
                    'id_aspersor', 'reguladorModelo', 'aspersores'));     
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
        $aspersores['aspersor_canhao_final_marca'] = $dados['canhao_final_marca'];
        $aspersores['aspersor_canhao_final_modelo'] = $dados['canhao_final_modelo'];
        $aspersores['aspersor_mbbooster_marca'] = $dados['mb_booster_marca'];
        $aspersores['aspersor_mbbooster_modelo'] = $dados['mb_booster_modelo'];
        $aspersores['aspersor_mbbooster_rotor'] = $dados['mb_booster_rotor'];
        $aspersores['aspersor_mbbooster_potencia'] = $dados['mb_booster_potencia'];
        $aspersores['aspersor_mbbooster_corrente'] = $dados['mb_booster_corrente'];

        EntregaTecnica::where('id', $id_entrega_tecnica)->update($aspersores);

        if (!empty($dados['marca']) && !empty($dados['modelo']) && !empty($dados['defletor']) && 
            !empty($dados['regulador_marca']) && !empty($dados['tags']) && !empty($dados['pressao'])) {
    
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_aspersores' => 2]);
        } 
        else if (!empty($dados['marca']) || !empty($dados['modelo']) || !empty($dados['defletor']) || 
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
        $succao = EntregaTecnica::select('medicao_succao_l', 'medicao_succao_h', 'medicao_succao_e', 
                                         'medicao_succao_diametro', 'medicao_succao_tipo', 'tipo_tubo_succao')
            ->where('id', $id_entrega_tecnica)->first();

        $tipo_succao = Lista::getSuccaoTipo();
        $tubos = Lista::TipoTubos();
        $motobomba = EntregaTecnica::select('tipo_succao', 'succao_auxiliar', 'status_succao')
            ->where('id', $id_entrega_tecnica)->first();

        $succao_tipo = explode(", ", $succao['medicao_succao_tipo']);

        return view('entregaTecnica.cadastro.createSuction', compact('id_entrega_tecnica', 'succao_tipo', 
                    'tipo_succao', 'succao', 'motobomba', 'tubos'));     
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
        } 
        else if (!empty($dados['medicao_succao_l']) || !empty($dados['medicao_succao_h']) || !empty($dados['medicao_succao_e']) || 
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

        if (!empty($dados['tubo_az1_diametro']) &&
            !empty($dados['tubo_az2_diametro']) &&
            !empty($dados['registro_gaveta_diametro']) &&
            !empty($dados['peca_aumento_diametro_maior']) &&
            !empty($dados['peca_aumento_diametro_menor']) &&
            !empty($dados['valvula_ventosa_diametro']) &&
            !empty($dados['valvula_retencao_diametro'])) {

            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_ligacao' => 2]);
        } 
        else if (empty($dados['tubo_az1_comprimento']) &&
                 empty($dados['tubo_az1_diametro']) &&
                 empty($dados['tubo_az2_comprimento']) &&
                 empty($dados['tubo_az2_diametro']) &&
                 empty($dados['peca_aumento_diametro_maior']) &&            
                 empty($dados['peca_aumento_diametro_menor']) &&
                 empty($dados['registro_gaveta_diametro']) &&
                 empty($dados['registro_gaveta_marca']) &&
                 empty($dados['valvula_retencao_diametro']) &&
                 empty($dados['valvula_retencao_marca']) &&  
                 empty($dados['valvula_retencao_material']) &&  
                 empty($dados['valvula_ventosa_diametro']) &&  
                 empty($dados['valvula_ventosa_marca']) &&  
                 empty($dados['valvula_ventosa_modelo']) &&  
                 empty($dados['quantidade_valv_ventosa']) &&  
                 empty($dados['valvula_antecondas_diametro']) &&  
                 empty($dados['valvula_antecondas_marca']) &&  
                 empty($dados['valvula_antecondas_modelo']) &&  
                 empty($dados['registro_eletrico_diametro']) &&  
                 empty($dados['registro_eletrico_marca']) &&  
                 empty($dados['registro_eletrico_modelo']) &&  
                 empty($dados['medicoes_ligpress_outros'])) {
                    
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_ligacao' => 0]);
        }
        else {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_ligacao' => 1]);
        } 

        Notificacao::gerarAlert('', 'entregaTecnica.cadastro_ligacao', 'success');
        if ($dados['savebuttonvalue'] == "saveout") {
            return redirect()->route('edit_technical_delivery', $id_entrega_tecnica);
        } else {
            return redirect()->back();
        }
    }

    // TECHNICAL DELIVERY ADDUCTOR
    public function createWaterSupplyMeasurementsTechnicalDelivery($id_entrega_tecnica)
    {   
        $adutoras = EntregaTecnicaAdutora::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
        $fornecedores = Lista::fornecedores();
        $tubos = Lista::TipoTubos();
        $marcaTubos = Lista::marcaTubos();
        $adutora_existente = EntregaTecnicaAdutora::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();

        return view('entregaTecnica.cadastro.createAdductor', compact('id_entrega_tecnica', 'adutoras', 'tubos', 
                    'fornecedores', 'marcaTubos'));     
    } 

    public function saveWaterSupplyMeasurementsTechnicalDelivery(Request $request)
    {
        $dados = $request->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        // checks if you have existing bids in this technical delivery
        $aducctor = EntregaTecnicaAdutora::where('id_entrega_tecnica', $id_entrega_tecnica)->count();

        // delete the existing bids in this technical delivery and recreate the bids again
        if ($aducctor > 0) {
            EntregaTecnicaAdutora::where('id_entrega_tecnica', $id_entrega_tecnica)->forceDelete();
        }
        
        $status_adutora = 0;
        for ($i = 0; $i < count($dados['tipo_tubo']); $i++) {   
            $id_adutora = $i + 1;             
            if ($dados['diametro'][$i] < 0) {                
                Notificacao::gerarAlert('', 'entregaTecnica.valor_diametro_negativo', 'warning');
                return redirect()->back();
            } else if ($dados['numero_linha'][$i] < 0) {                
                Notificacao::gerarAlert('', 'entregaTecnica.valor_numero_linhas_negativo', 'warning');
                return redirect()->back();
            } else if ($dados['comprimento'][$i] < 0) {                
                Notificacao::gerarAlert('', 'entregaTecnica.valor_comprimento_negativo', 'warning');
                return redirect()->back();
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
    
                if ($status_adutora != 1) {
                    if (!empty($dados['tipo_tubo'][$i]) && !empty($dados['diametro'][$i]) && 
                        !empty($dados['numero_linha'][$i]) && !empty($dados['comprimento'][$i]) && 
                        !empty($dados['fornecedor'][$i])) {
                        $status_adutora = 2;   
                    } else {
                        $status_adutora = 1;   
                    }            
                }    
            }    
        }

        EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_adutora' => $status_adutora]);

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

        //////////////////////////////////////////////////////////////////////////////
        // Check if there is record each table related with the technical delivery
            // Motor Started (chave partida)
            $exist_motor_started = EntregaTecnicaTesteEletricoCp::where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            if ($exist_motor_started == 0) {

                // Create the first motor stared test this technical delivery
                $motor_started = EntregaTecnicaChavePartida::select('*')
                    ->where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->orderby('id_bomba')
                    ->orderby('id_motor')
                    ->orderby('id_chave_partida')
                    ->get();
                
                for ($i = 0; $i < count($motor_started); $i++) {
                    $test_motor_started['id_entrega_tecnica'] = $id_entrega_tecnica;
                    $test_motor_started['id_bomba'] = $motor_started[$i]['id_bomba'];
                    $test_motor_started['id_motor'] = $motor_started[$i]['id_motor'];
                    $test_motor_started['id_chave_partida'] = $motor_started[$i]['id_chave_partida'];

                    EntregaTecnicaTesteEletricoCp::create($test_motor_started);
                }
            }
            
            // Central Tower (torre central)
            $exist_central_tower = EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            if ($exist_central_tower == 0) {

                // create the first central tower test this technical delivery
                EntregaTecnicaTesteEletricoTc::create([
                    'id_entrega_tecnica' => $id_entrega_tecnica,
                    'id_testee_tc' => 1
                ]);
            }

            // Last Tower Speed (velocidade da última torre)
            $exist_last_tower_speed = EntregaTecnicaTesteHidraulicoVelocidade::where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            if ($exist_last_tower_speed == 0) {

                // Create the first last tower speed test this technical delivery
                EntregaTecnicaTesteHidraulicoVelocidade::create([
                    'id_entrega_tecnica' => $id_entrega_tecnica,
                    'id_testeh_vut' => 1,
                    'valor_tempo' => 0
                ]);
            }

            // Motor pump (motor bomba)
            $exist_motor_pump = EntregaTecnicaTesteHidraulicoMotoBomba::where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            if ($exist_motor_pump == 0) {
                // Create the first motor pump test this technical delivery
                $dados_bombas = EntregaTecnicaBomba::select('id_bomba')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();

                for ($i = 0; $i < count($dados_bombas); $i++) {
                    EntregaTecnicaTesteHidraulicoMotoBomba::create([
                         'id_entrega_tecnica' => $id_entrega_tecnica,
                         'id_testeh_mb' => $dados_bombas[$i]['id_bomba']
                    ]);
                }
            }
        //////////////////////////////////////////////////////////////////////////////

        
        // MOTOBOMBA E CHAVE DE PARTIDA
            $bombas = EntregaTecnicaBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();

            $teste_bomba = EntregaTecnicaTesteHidraulicoMotoBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            
            $total_chave_partida = EntregaTecnicaTesteEletricoCp::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
        ///////////////////////////////


        // TORRE CENTRAL
            $dados_tc = EntregaTecnicaTesteEletricoTc::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
        ////////////////
        
        // CALCULOS DA VELOCIDADE        
            $velocidade = EntregaTecnicaTesteHidraulicoVelocidade::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
        /////////////////////////

        $status_testes = EntregaTecnica::select('status_testes')->where('id', $id_entrega_tecnica)->first();
        if ($status_testes['status_testes'] == 0) {
            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_testes' => 1]);
        }

        return view('entregaTecnica.cadastro.createTests', compact('fazenda', 'id_entrega_tecnica', 'bombas', 'velocidade', 
                    'dados_tc', 'teste_bomba', 'total_chave_partida'));
    }

    public function saveTestsTechnicalDelivery(Request $request) 
    {
        $dados = $request->all();

        dd($dados);
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        ///////////////////////////////////////////
        // TESTES TORRE CENTRAL VALORES INPUT
            $id_testee_tc = (INT)$dados['id_testee_tc'];
            $teste_eletrico_tc_existente = EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_testee_tc', $id_testee_tc)->count();
            if ($teste_eletrico_tc_existente > 0) {
                EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_testee_tc', $id_testee_tc )
                    ->update(['tensao_rs_semcarga' => $dados['tensao_rs_semcarga_tc'], 'tensao_st_semcarga' => $dados['tensao_st_semcarga_tc'],
                            'tensao_rt_semcarga' => $dados['tensao_rt_semcarga_tc'], 'tensao_rs_comcarga' => $dados['tensao_rs_comcarga_tc'],
                            'tensao_st_comcarga' => $dados['tensao_st_comcarga_tc'], 'tensao_rt_comcarga' => $dados['tensao_rt_comcarga_tc'] ]);
            }

            $namefile_tc = array ('tensao_rs_semcarga_img', 'tensao_st_semcarga_img', 'tensao_rt_semcarga_img', 
                                'tensao_rs_comcarga_img', 'tensao_st_comcarga_img', 'tensao_rt_comcarga_img');
            $imagens = array ($dados['tensao_rs_semcarga_img_tc'], $dados['tensao_st_semcarga_img_tc'], $dados['tensao_rt_semcarga_img_tc'],
                            $dados['tensao_rs_comcarga_img_tc'], $dados['tensao_st_comcarga_img_tc'], $dados['tensao_rt_comcarga_img_tc']);
            $i = 0;
            foreach ($imagens as $img) {
                if ($img != null) {
                    // Recupera a extensão do arquivo
                    $extension = $img->extension();
                    // Define finalmente o nome
                    $nameFile = $namefile_tc[$i].'_tc.'.$extension;
                    // faz o upload do arquivo no projeto
                    $file = $img->storeAs('projetos/entrega_tecnica/teste_torre_central_' . $id_entrega_tecnica, $nameFile);
                    // $file_base64 = base64_encode($img);
                    // $file_base642 = base64_encode($file);
                    EntregaTecnicaTesteEletricoTc::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_testee_tc', $id_testee_tc)
                        ->update(['' . $namefile_tc[$i] . '' => $file ]);
                }

                $i += 1;
            }
        ///////////////////////////////////////////


        // TESTES MOTOBOMBA VALORES INPUT
            $img_pressao_gravada = 0;
            $count_bombas = EntregaTecnicaBomba::select('id_bomba')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
            for ($i = 1; $i <= $count_bombas; $i++) {
                $id_testeh_mb = $dados['id_bomba_'.$i];

                // DADOS DOS CAMPOS DE TESTES DA BOMBA
                $bomba['pressao_reg_fechado'] = $dados['pressao_reg_fechado_'.$id_testeh_mb];
                $bomba['pressao_reg_aberto'] = $dados['pressao_reg_aberto_'.$id_testeh_mb];
                $bomba['pressao_centro'] = $dados['pressao_centro'];
                $bomba['pressao_ult_torre'] = $dados['pressao_ult_torre'];
                
                EntregaTecnicaTesteHidraulicoMotoBomba::where('id_entrega_tecnica', $id_entrega_tecnica)
                    ->where('id_testeh_mb', $id_testeh_mb)
                    ->update($bomba);

               // IMAGENS DO TESTE DA MOTOBOMBA
                $namefile_mb_banco_dados = array ('pressao_reg_fechado_img', 'pressao_reg_aberto_img',
                                                  'pressao_centro_img', 'pressao_ult_torre_img');
    
                $indice = $id_entrega_tecnica.'_'.$id_testeh_mb;
    
                $namefile_mb = array ('pressao_reg_fechado_img_'.$indice, 'pressao_reg_aberto_img_'.$indice,
                                      'pressao_centro_img_'.$id_entrega_tecnica, 'pressao_ult_torre_img_'.$id_entrega_tecnica);      
                $imagens_mb = array($dados['pressao_reg_fechado_img_'.$id_testeh_mb], $dados['pressao_reg_aberto_img_'.$id_testeh_mb],
                                    $dados['pressao_centro_img'], $dados['pressao_ult_torre_img']);

                /////////
                    /*$namefile_pressoes_mb = array();  
                    $img_pressoes_mb = array();
        
                    $a = 0;
                    foreach($img_pressoes_mb as $img_pressoes) {
                        if ($img_pressoes != null) {
                            // Recupera a extensão do arquivo
                            $extension = $img_pressoes->extension();
                            // Define finalmente o nome
                            $namefile_pressoes_mb = $namefile_pressoes_mb[$a].'_mb.'.$extension;
        
                            // faz o upload do arquivo no projeto
                            $file = $img_pressoes->storeAs('projetos/entrega_tecnica/teste_motobomba_' . $id_entrega_tecnica, $namefile_pressoes_mb);

                            EntregaTecnicaTesteHidraulicoMotoBomba::where('id_entrega_tecnica', $id_entrega_tecnica)
                            ->where('id_testeh_mb', $id_testeh_mb)
                            ->update([
                                '' . $namefile_mb_banco_dados[$a] . '' => $file
                            ]);
                        }
        
                        $a += 1;
                    }*/
                /////////////
                $j = 0;   
                foreach ($imagens_mb as $img) {
                    if ($img != null) {
                        // Recupera a extensão do arquivo
                        $extension = $img->extension();

                        // Define finalmente o nome
                        $nameFile = $namefile_mb[$j].'_mb.'.$extension;
    
                        // faz o upload do arquivo no projeto
                        if (($j<2) || ($j>1 && $img_pressao_gravada < 2)) {
                            $file = $img->storeAs('projetos/entrega_tecnica/teste_motobomba_' . $id_entrega_tecnica, $nameFile);

                            $img_pressao_gravada += ($j > 1) ? 1 : 0;
                        }

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
                        // DADOS DOS TESTES DA CHAVE DE PARTIDA //
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
                        
                        // SALVAR IMAGENS DOS CAMPOS DE TESTE DA CHAVE DE PARTIDA
                        $namefile_cp_banco_dados = array ('tensao_rs_semcarga_img', 'tensao_st_semcarga_img', 'tensao_rt_semcarga_img', 
                            'tensao_rs_comcarga_img', 'tensao_st_comcarga_img', 'tensao_rt_comcarga_img', 'corrente_rs_comcarga_img', 
                            'corrente_st_comcarga_img', 'corrente_rt_comcarga_img');

                        $indice = $id_entrega_tecnica.'_'.$x;

                        $namefile_cp = array (
                            'tensao_rs_semcarga_cp_img_'.$indice, 
                            'tensao_st_semcarga_cp_img_'.$indice,
                            'tensao_rt_semcarga_cp_img_'.$indice, 
                            'tensao_rs_comcarga_cp_img_'.$indice,
                            'tensao_st_comcarga_cp_img_'.$indice, 
                            'tensao_rt_comcarga_cp_img_'.$indice,
                            'corrente_rs_comcarga_cp_img_'.$indice, 
                            'corrente_st_comcarga_cp_img_'.$indice,
                            'corrente_rt_comcarga_cp_img_'.$indice
                        );                       

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

            // Busca ID velocidade
            $velocidade = EntregaTecnicaTesteHidraulicoVelocidade::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->first();
            $id_testeh_vut = $velocidade['id_testeh_vut'];

            // Salvando imagem 
            // Recupera a extensão do arquivo
            if ($dados['leitura_horímetro_img'] != null) {
                $extension = $dados['leitura_horímetro_img']->extension();
                // Define finalmente o nome
                $nameFile = 'leitura_horimetro.'.$extension;
                
                // faz o upload do arquivo no projeto
                $file = $dados['leitura_horímetro_img']->storeAs('projetos/entrega_tecnica/leitura_horimetro_' . $id_entrega_tecnica, $nameFile);

                EntregaTecnicaTesteHidraulicoVelocidade::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_testeh_vut', $id_testeh_vut)
                    ->update(['leitura_horímetro_img' => $file]);
            }

            // Calculando...
            $giro = EntregaTecnica::select('giro')->where('id', $id_entrega_tecnica)->first();            
            $calculo_giro = (360 / $giro['giro']);
            $velocidade_ult_torre = number_format($dados['velocidade_ult_torre'], 2);
            $soma_lances = DB::table("entrega_tecnica_lances")->where('id_entrega_tecnica', $id_entrega_tecnica)->whereNull('deleted_at')->get()->sum("comprimento_lance");
            $calculo_velocidade = (( 2 * $soma_lances * pi()) / $velocidade_ult_torre) * $calculo_giro;
            
            if ($calculo_velocidade > $dados['leitura_horímetro']) {            
                Notificacao::gerarAlert('', 'entregaTecnica.erro_calculo', 'warning');
                return redirect()->back();
            } else {

                EntregaTecnicaTesteHidraulicoVelocidade::where('id_entrega_tecnica', $id_entrega_tecnica)->where('id_testeh_vut', $id_testeh_vut)
                    ->update(['velocidade_ult_torre' => $velocidade_ult_torre,
                              'leitura_horímetro' => $dados['leitura_horímetro'],
                              'valor_tempo' => $calculo_velocidade]);
            }
        /////////////////////////////////////////////////////////////////////////////////
      

        ///////////////////////////////////////////////////////
        // Check if all fields of the test is full or empty
        
            $status_testes = 0;

            $full_count = 0;
            $fields_vut = array ('velocidade_ult_torre','leitura_horímetro','leitura_horímetro_img');
            $list_vut = EntregaTecnicaTesteHidraulicoVelocidade::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
            for ($i=0; $i < count($list_vut); $i++) { 
                for ($j=0; $j < count($fields_vut); $j++) { 
                    $full_count += (!empty($list_vut[$i][$fields_vut[$j]])) ? 1 : 0;
                }
            }
            if ((count($list_vut)*count($fields_vut)) == $full_count) {
                $status_testes = 2;
            } else if ($full_count > 0) {
                $status_testes = 1;
            }

            if ($status_testes <> 1) {
                $full_count = 0;
                $fields_tc = array ('tensao_rs_semcarga','tensao_rs_semcarga_img','tensao_st_semcarga','tensao_st_semcarga_img',
                                    'tensao_rt_semcarga','tensao_rt_semcarga_img','tensao_rs_comcarga','tensao_rs_comcarga_img',
                                    'tensao_st_comcarga','tensao_st_comcarga_img','tensao_rt_comcarga','tensao_rt_comcarga_img');
                $list_tc = EntregaTecnicaTesteEletricoTc::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
                for ($i=0; $i < count($list_tc); $i++) { 
                    for ($j=0; $j < count($fields_tc); $j++) { 
                        $full_count += (!empty($list_tc[$i][$fields_tc[$j]])) ? 1 : 0;
                    }
                }
                if ((count($list_tc)*count($fields_tc)) == $full_count) {
                    $status_testes = 2;
                } else if ($full_count > 0) {
                    $status_testes = 1;
                }

                if ($status_testes <> 1) {
                    $full_count = 0;
                    $fields_mb = array ('pressao_reg_fechado','pressao_reg_fechado_img','pressao_reg_aberto','pressao_reg_aberto_img',
                                        'pressao_centro','pressao_centro_img','pressao_ult_torre','pressao_ult_torre_img');
                    $list_mb = EntregaTecnicaTesteHidraulicoMotoBomba::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
                    for ($i=0; $i < count($list_mb); $i++) { 
                        for ($j=0; $j < count($fields_mb); $j++) { 
                            $full_count += (!empty($list_mb[$i][$fields_mb[$j]])) ? 1 : 0;
                        }
                    }
                    if ((count($list_mb)*count($fields_mb)) == $full_count) {
                        $status_testes = 2;
                    } else if ($full_count > 0) {
                        $status_testes = 1;
                    }
        
                    if ($status_testes <> 1) {
                        $full_count = 0;
                        $fields_cp = array ('tensao_rs_semcarga','tensao_rs_semcarga_img','tensao_st_semcarga','tensao_st_semcarga_img',
                                            'tensao_rt_semcarga','tensao_rt_semcarga_img','tensao_rs_comcarga','tensao_rs_comcarga_img',
                                            'tensao_st_comcarga','tensao_st_comcarga_img','tensao_rt_comcarga','tensao_rt_comcarga_img',
                                            'corrente_rs_comcarga','corrente_rs_comcarga_img','corrente_st_comcarga','corrente_st_comcarga_img',
                                            'corrente_rt_comcarga','corrente_rt_comcarga_img');
                        $list_cp = EntregaTecnicaTesteEletricoCp::select('*')->where('id_entrega_tecnica', $id_entrega_tecnica)->get();
                        for ($i=0; $i < count($list_cp); $i++) { 
                            for ($j=0; $j < count($fields_cp); $j++) { 
                                $full_count += (!empty($list_cp[$i][$fields_cp[$j]])) ? 1 : 0;
                            }
                        }
                        if ((count($list_cp)*count($fields_cp)) == $full_count) {
                            $status_testes = 2;
                        } else if ($full_count > 0) {
                            $status_testes = 1;
                        }
                    }    
                }
            }

            EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status_testes' => $status_testes]);
        ///////////////////////////////////////////////////////


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
                
        $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'P.email as email_cliente', 'P.documento as cpf_cliente', 'P.telefone as telefone_cliente',
        'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
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
        if (session()->has('fazenda')) {
            $fazenda = session()->get('fazenda');            
            $id_fazenda = Session::get('fazenda')['id'];
            
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();
                
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'P.email as email_cliente', 
            'P.documento as cpf_cliente', 'P.telefone as telefone_cliente', 'P.id as id_cliente',
            'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
            ->join('users as U', 'US.id_usuario', '=', 'U.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->where('entrega_tecnica.id_fazenda', $id_fazenda)
            ->where('entrega_tecnica.id', $id_entrega_tecnica)
            ->first();
        }
        
        $valida_cpf = Validates::validateCPF($entrega_tecnica['cpf_cliente']);

        /* 
            faz a verificação do CPF, se ele for invalido ira cair no ELSE, se nao for entrar no if,
            onde verificara se os dados foram preenchido corretamente para o envio da entrega tecnica 
        */

        if($valida_cpf) {
            if (!empty($dados['observacoes_envio'])) {
                $envio['data_envio_entrega_tecnica'] = $dados['data_envio_entrega_tecnica'];
                $envio['observacoes_envio'] = $dados['observacoes_envio'];
                $envio['status'] = 3;
    
                $email = 'lucas.borges@valmont.com';
                $telefone = '34992021394';
                $cpf = '12294797671';
                $nome = 'Lucas Steinbach';
    
                // Criando API, variaveis para dados do cliente
                // $nome = $entrega_tecnica['nome_proprietario'];
                // $telefone = $entrega_tecnica['email_cliente'];
                // $cpf = $entrega_tecnica['cpf_cliente'];
                // $email = $entrega_tecnica['telefone_cliente'];
    
                if ($dados['assinatura_digital'] == 'clicksign') {
                    $dados_signatario = json_decode($this->criarsignatario($nome, $telefone, $cpf, $email));
    
                    // Criando Template
                    $dados_template = json_decode($this->criarTemplate($dados_signatario->signer->name, 
                                                                $dados_signatario->signer->email, 
                                                                $dados_signatario->signer->documentation));
        
                    // Adicionando signatário ao template
                    $finalizar_documento = json_decode($this->addSignatarioTemplate($dados_template->document->key, $dados_signatario->signer->key));
        
                    // Enviando por e-mail
                    $request_key = json_decode($this->sendEmail($finalizar_documento->list->request_signature_key, $finalizar_documento->list->url));
                   
                } 

                if ($dados['assinatura_digital'] == 'd4sign') {
                    // Criando Template
                    $dados_template = json_decode($this->criarTemplateD4sign($nome, $email, $cpf));
                    // aqui retorna o uuid = id do template que sera usado para criar o signatario e enviar o documento por email
                    
                    // Criando Signatário
                    $dados_signatario = json_decode($this->criarsignatarioD4sign($dados_template->uuid, $email));

                    // Enviando por e-mail
                    $request_key = json_decode($this->sendEmailD4sign($dados_template->uuid));

                    // Enviando por e-mail
                    $request_key = json_decode($this->resendEmailD4sign($dados_template->uuid, $email, $dados_signatario->message[0]->key_signer));                   
                }

                Notificacao::gerarAlert('', 'entregaTecnica.entrega_tecnica_enviada', 'success');
                // EntregaTecnica::where('id', $id_entrega_tecnica)->update($envio);

                return $dados;

                // $extension = $dados['declaracao_img']->extension();
                // Define finalmente o nome
                // $nameFile = 'declaracao.'.$extension;
            
                // faz o upload do arquivo no projeto
                // $file = $dados['declaracao_img']->storeAs('projetos/entrega_tecnica/declaracao_' . $id_entrega_tecnica, $nameFile);
                // $envio['img_declaracao'] = $file;
                
    
                // ENVIO DO EMAIL PARA O CONSULTOR //
                    // $fromSend = 'noreply@valleycheckpivot.com';
                    // $subjectTitle = 'Confirmação Envio de Entrega Técnica';
                    // $msg = 'A Entrega Técnica do Nº Pedido ' . $entrega_tecnica['numero_pedido'] . ', foi enviada para análise';                
                    // $toUser = $entrega_tecnica['email_tecnico'];
                    // Mail::send(new \App\Mail\SendMailUser($toUser, $fromSend, $msg, $subjectTitle));
                /////////////////////////////////////            

            } else {           
                // se estiver faltando dados retornara para tela informando a mensagem de erro com dados incompletos
                Notificacao::gerarAlert('', 'entregaTecnica.dados_incompletos', 'warning');
                return $dados;
            }
        } else {

            // verifica se o cpf invalido foi preenchido por um novo cpf e atualiza no cadastro de proprietario
            if (isset($dados['cpf'])) {
                $cpf['documento'] = $dados['cpf'];
                Proprietario::where('id', $entrega_tecnica['id_cliente'])->update($cpf);
                
                Notificacao::gerarAlert('', 'entregaTecnica.cpf_atualizado', 'success');
                return redirect()->route('send_technical_delivery', $id_entrega_tecnica);
            } else {
                Notificacao::gerarAlert('', 'entregaTecnica.dados_incompletos', 'warning');
                return $dados;
            }
            return false;
        }
    }
    
    // ANÁLISE ENTREGA TÉCNICA
    public function manageAnalysisTechnicalDelivery() 
    {   
        
        session()->put('current_module', 'entrega_tecnica_analise');

        $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'U.nome as nome_usuario', 'fazendas.nome as nome_fazenda')
        ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
        ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
        ->join('users as U', 'US.id_usuario', '=', 'U.id')
        ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
        ->orderby('data_entrega_tecnica', 'desc')
        ->get();
        
        foreach ($entrega_tecnica as $id) {
            $id_entrega_tecnica = $id['id'];
        }

        $teste = EntregaTecnicaAnaliseDivergencia::all();

        return view('entregaTecnica.analise.gerenciarAnaliseEntregaTecnica', compact('entrega_tecnica', 'id_entrega_tecnica', 'teste'));
    }

    public function analysisTechnicalDelivery($id_entrega_tecnica) 
    {
        $entrega_tecnica_status = EntregaTecnica::select('status')->where('id', $id_entrega_tecnica)->first();

                
        $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario',
        'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
        ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
        ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
        ->join('users as U', 'US.id_usuario', '=', 'U.id')
        ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
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

    public function sendAnalisyTechnicalDelivery(Request $req)
    {
        $dados = $req->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        $versao_analise = EntregaTecnicaAnalise::select('versao')->where('id_entrega_tecnica', $id_entrega_tecnica)->count();
        $nova_versao = $versao_analise + 1;
        $analise['id_entrega_tecnica'] = $id_entrega_tecnica;
        $analise['versao'] = $nova_versao;
        $analise['status'] = $dados['situacao'];
        $analise['observacoes'] = $dados['observacoes'];
        EntregaTecnicaAnalise::create($analise);
    
        if ($dados['status_analise'] == 0) {
            if (!empty($dados['divergence'])) {
                $divergencia['id_entrega_tecnica'] = $id_entrega_tecnica;
                $divergencia['versao'] = $nova_versao;
                $divergencia['divergencia'] = $dados['divergence'];
                $divergencia['observacoes'] = $dados['observacoes'];
                EntregaTecnicaAnaliseDivergencia::create($divergencia);
            } 
        }

        $value_status = ($dados['status_analise'] == 1) ? 4 : 5;
        // EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status' => $value_status]);
            
        // ENVIO DO EMAIL PARA O CONSULTOR //
            if (session()->has('fazenda')) {
                $fazenda = session()->get('fazenda');            
                $id_fazenda = Session::get('fazenda')['id'];
                
                $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                    ->where('fazendas.id', $id_fazenda)
                    ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                    ->join('users as U', 'U.id', 'fazendas.id_consultor')
                    ->first();
                    
                $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'P.email as email_cliente', 'P.documento as cpf_cliente', 'P.telefone as telefone_cliente',
                'fazendas.*', 'US.id_usuario', 'U.nome as nome_usuario', 'U.email as email_tecnico', 'U.telefone as telefone_tecnico')
                ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
                ->join('users as U', 'US.id_usuario', '=', 'U.id')
                ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                ->where('entrega_tecnica.id', $id_entrega_tecnica)
                ->first();
            }

            // if ($entrega_tecnica['status'] === 4) {
            //     $msgTec = 'A situação da Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi aprovada!';
            //     $msgClient = 'A Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi realizada com sucesso!';
            // } else if ($entrega_tecnica['status'] === 5) {
            //     $msgTec = 'A situação da Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi reprovada!';
            //     $msgClient = 'A Entrega Técnica Nº ' . $entrega_tecnica['numero_pedido'] . ', foi realizada com sucesso!';
            // }

            // $fromSend = 'noreply@valleycheckpivot.com';
            // $subjectTitle = 'Confirmação Envio de Análise da Entrega Técnica';        
                    
            // $email_tecnico = $entrega_tecnica['email_tecnico'];
            // $email_cliente = $entrega_tecnica['email_cliente'];

            // $toTec = $email_tecnico;
            // $toClient = $email_cliente;
                    
            // Mail::send(new \App\Mail\SendMailUser($toTec, $fromSend, $msgTec, $subjectTitle));
            // Mail::send(new \App\Mail\SendMailUser($toClient, $fromSend, $msgClient, $subjectTitle));
        /////////////////////////////////////

        return redirect()->route('manage_analysis_technical_delivery');
    }

    // EXCLUIR ENTREGA TECNICA
    public function delete($id)
    {
        $delete = EntregaTecnica::find($id);
        $delete->delete();
        return redirect()->route('historic_technical_delivery')->with('Sucesso', 'Foi deletado');
    }

    public function updateStatus($id_entrega_tecnica) {
        /**
         * Status Values
         *  0 = Not started
         *  1 = Incomplete
         *  2 = Complete
         *  3 = Under Analysis
         *  4 = Approved
         *  5 = To fix
         * 
         * Note: Telemetry status is not valid because telemetry completion is not required yet.
         *       when the telemetry status is considered, insert the status_telemetry field 
         *       in the sum of the query that generates the status_value_sum field.
         *        
         */


         $status_list = EntregaTecnica::select('status',
                                              DB::raw('(status_parte_aerea + status_lances + status_aspersores + status_adutora + status_ligacao + 
                                                        status_motobomba + status_succao + status_testes + status_autotrafo) as status_value_sum'))
                                        ->where('id', $id_entrega_tecnica)
                                        ->first();
        if ($status_list['status'] < 3) {
            $status_lookfor = 0;

            // if all module statuses are zero the status will be not started
            if ($status_list['status_value_sum'] == 0) {
                    
                $status_lookfor = 0;
            }
            else if ($status_list['status_value_sum'] == 18) {
                $status_lookfor = 2;
            }
            else {
                $status_lookfor = 1;
            }

            if ($status_list['status'] != $status_lookfor) {
                $status = EntregaTecnica::where('id', $id_entrega_tecnica)->update(['status' => $status_lookfor]);
            }
        }
    }

    // API CLICKSIGN
    public function criarsignatario($nome, $telefone, $cpf, $email)
    {
        /*
            O template será o segundo passo da API, onde será enviado os dados do cliente para geração do documento
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            https://sandbox.clicksign.com/api/v1/templates/:key/documents?access_token={{acess_token}}, sendo :key a chave do template na Clicksign e o acess_token é o token gerado da API
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            os campos dentro do array de data deverão estar entre chaves dentro do documento colocado na plataforma da clicksign, 
            sendo assim {{exemplo_variavel}} dentro do ponto aonde deverá ser colocado os dados do cliente 
        */

        // url do endpoint de criação do signatário
        $url  = 'https://sandbox.clicksign.com/api/v1/signers?access_token=3e888197-29e0-46d2-8969-a501ecf3000a';

        // Array de dados para criação do signatário
        $signers = array(
            "signer" => [
                "email" => $email,
                "phone_number" => $telefone,
                "auths" => [
                    "email"
                ],
                "name" => $nome,
                "documentation" => $cpf,
                // "birthday" => "1993-11-21",
                "has_documentation" => true,
                "delivery" => "email",
                "selfie_enabled" => false,
                "handwritten_enabled" => false,
                "official_document_enabled" => false,
                "liveness_enabled" => false,
                "facial_biometrics_enabled" => false
            ]
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($signers);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);

        // Close the CURL
        curl_close($CURL);

        return $resultado;
    }

    public function criarTemplate($name, $email, $documentation) 
    {
        /*
            O template será o segundo passo da API, onde será enviado os dados do cliente para geração do documento
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            https://sandbox.clicksign.com/api/v1/templates/:key/documents?access_token={{acess_token}}, sendo :key a chave do template na Clicksign e o acess_token é o token gerado da API
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            os campos dentro do array de data deverão estar entre chaves dentro do documento colocado na plataforma da clicksign, 
            sendo assim {{exemplo_variavel}} dentro do ponto aonde deverá ser colocado os dados do cliente 
        */

        // url do endpoint de criação do signatário
        $url  = 'https://sandbox.clicksign.com/api/v1/templates/2bcb23e6-45b3-42c2-b8fb-cebd234bfba1/documents?access_token=3e888197-29e0-46d2-8969-a501ecf3000a';

        // Array de dados para criação do signatário
        $document = array(
            "document" => [
                "path" => "/Modelos/teste.docx",
                "template" => [
                    "data" => [
                        "nome" => $name,
                        "endereco" => $email,
                        "cpf" => $documentation
                    ]
                ]
            ]
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($document);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);

        // Close the CURL
        curl_close($CURL);

        return $resultado;

    }

    public function addSignatarioTemplate($template_doc_key, $signatario_sign_key) 
    {
        $url  = 'https://sandbox.clicksign.com/api/v1/lists?access_token=3e888197-29e0-46d2-8969-a501ecf3000a';

        //$dados_signatario = json_decode(criarsignatario());
        //$dados_template = json_decode(criarTemplate());
        $mensagem = 'Esta mensagem e um texto de ok';

        // Array de dados para criação do signatário
        $add_signers = array(
            "list" => [
                "document_key" => $template_doc_key,
                "signer_key" => $signatario_sign_key,
                "sign_as" => "sign",
                "refusable" => true,
                "group" => 0,
                "message" => $mensagem
            ]
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($add_signers);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);
        // $resultado = json_decode($resultado);

        // Close the CURL
        curl_close($CURL);

        return $resultado;
    }
        
    public function sendEmail($request_signature_key, $list_url) 
    {
        $url  = 'https://sandbox.clicksign.com/api/v1/notifications?access_token=3e888197-29e0-46d2-8969-a501ecf3000a';

        //$finalizar_documento = json_decode(addSignatarioTemplate());
        $mensagem = 'Assina o documento ai';

        // Array de dados para criação do signatário
        $add_signers = array(
            "request_signature_key" => $request_signature_key,  
            "message" => $mensagem,
            "url" => $list_url
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($add_signers);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);
        // $resultado = json_decode($resultado);

        // Close the CURL
        curl_close($CURL);

        return $resultado;
    }

    // API D4SIGN
    function criarTemplateD4sign($nome, $email, $cpf) 
    {
        /*
            O template será o segundo passo da API, onde será enviado os dados do cliente para geração do documento
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            ROTA PARA ENVIO DOS DADOS DO FORMULÁRIO
            https://secure.d4sign.com.br/api/v1/documents/{{ KEY DO USUARIO GERADO PELA PLATAFORMA ou seja {UUID-SAFE} }}/makedocumentbytemplate?tokenAPI={{API_TOKEN}}&cryptKey={{CRPTY_API_TOKEN}}

            PARA RECUPERAR A KEY DO USUARIO OU SEJA {UUID-SAFE} BASTA ACESSAR A ROTA ABAIXO COLOCANDO OS DADOS DA {{API_TOKEN}} E DA {{CRPTY_API_TOKEN}}
            https://secure.d4sign.com.br/api/v1/safes?{{API_TOKEN}}&cryptKey={{CRPTY_API_TOKEN}}

            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            OS CAMPOS DE DADOS NO TEMPLETE SERÃO OS MESMOS QUE CRIADO NO MODELO DE TEMPLATE DENTRO DO SITE DELES
        */

        // url do endpoint de criação do documento
        $url  = 'https://secure.d4sign.com.br/api/v1/documents/f79668d8-2ef9-46d7-9c01-5b136e153910/makedocumentbytemplate?tokenAPI=live_ee4e4126fb3aa3835339a3bc61d391e1e0efd3c6b9659d5d7e60b184c72a2877&cryptKey=live_crypt_J3b0YAKEsQKIRcDQQ9tbEFy8E0mhYsvE';

        // Array de dados para criação do documento
        $document = array(
            "templates" => [
                "NDM5NDc=" => [
                    "nome" => $nome,
                    "email" => $email,
                    "cpf" => $cpf
                ]
            ]
        );
        
        // Transforma o array de dados do documento em json
        $dados = json_encode($document);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);

        // Close the CURL
        curl_close($CURL);

        return $resultado;

    }

    function criarsignatarioD4sign($uuid, $email)
    {
        /*
            O signátario será o segundo passo da API, onde será enviado os dados do documento para geração do signátario
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            {{UUID-DOCUMENT}} = TOKEN GERADO PELO DOCUMENTO
            {{API_TOKEN}} = TOKEN DA API
            {{CRPTY_API_TOKEN}} = CRIPTY TOKEN DA API
            https://secure.d4sign.com.br/api/v1/documents/{UUID-DOCUMENT}/createlist?tokenAPI=tokenAPI={{API_TOKEN}}&cryptKey={{CRPTY_API_TOKEN}}
            -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            os campos dentro do array de data deverão estar entre chaves dentro do documento colocado na plataforma da clicksign, 
            sendo assim {{exemplo_variavel}} dentro do ponto aonde deverá ser colocado os dados do cliente 
        */

        // url do endpoint de criação do signatário
        $url  = "https://secure.d4sign.com.br/api/v1/documents/".$uuid."/createlist?tokenAPI=live_ee4e4126fb3aa3835339a3bc61d391e1e0efd3c6b9659d5d7e60b184c72a2877&cryptKey=live_crypt_J3b0YAKEsQKIRcDQQ9tbEFy8E0mhYsvE";

        // Array de dados para criação do signatário
        $signatario = array(
            "signers"  => array([
                "email" => $email,
                "act" => "1",
                "foreign" => "1",
                "certificadoicpbr" => "0",
                "assinatura_presencial" => "0",
                "docauth" => "0",
                "docauthandselfie" => "0",
                "embed_methodauth" => "email",
                "embed_smsnumber" => "",
                "upload_allow" => "0",
                "upload_obs" => "Entrega Técnica",
                "d4sign_score_similarity" => "90"
            ])
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($signatario);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);

        // Close the CURL
        curl_close($CURL);

        return $resultado;
    }
    
    function sendEmailD4sign($uuid) 
    {
        $url  = "https://secure.d4sign.com.br/api/v1/documents/". $uuid ."/sendtosigner?tokenAPI=live_ee4e4126fb3aa3835339a3bc61d391e1e0efd3c6b9659d5d7e60b184c72a2877&cryptKey=live_crypt_J3b0YAKEsQKIRcDQQ9tbEFy8E0mhYsvE";

        //$finalizar_documento = json_decode(addSignatarioTemplate());
        $mensagem = 'Assinar Entrega Técnica';

        // Array de dados para criação do signatário
        $add_signers = array(
            "message" => $mensagem,
            "skip_email" => "1",
            "workflow" => "0",
            "tokenAPI" => "live_ee4e4126fb3aa3835339a3bc61d391e1e0efd3c6b9659d5d7e60b184c72a2877"            
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($add_signers);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);
        // $resultado = json_decode($resultado);

        // Close the CURL
        curl_close($CURL);

        return $resultado;
    }
    
    function resendEmailD4sign($uuid, $email, $key_signer) 
    {
        $url  = "https://secure.d4sign.com.br/api/v1/documents/". $uuid ."/resend?tokenAPI=live_ee4e4126fb3aa3835339a3bc61d391e1e0efd3c6b9659d5d7e60b184c72a2877&cryptKey=live_crypt_J3b0YAKEsQKIRcDQQ9tbEFy8E0mhYsvE";

        // Array de dados para criação do signatário
        $resend_email = array(
            "email" => $email,
            "key_signer" => $key_signer          
        );
        
        // Transforma o array de dados do signatário em json
        $dados = json_encode($resend_email);

        // Header attribute
        $header = array("cache-control: no-cache", 
            'Content-Type: application/json; charset=utf-8',
        );

        // Start the CURL
        $CURL = curl_init();

        // Configure the CURL
        curl_setopt($CURL, CURLOPT_URL, $url);
        curl_setopt($CURL, CURLOPT_POSTFIELDS, $dados);
        curl_setopt($CURL, CURLOPT_HTTPHEADER, $header);
        curl_setopt($CURL, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($CURL, CURLOPT_ENCODING, "");
        curl_setopt($CURL, CURLOPT_MAXREDIRS, 10);
        curl_setopt($CURL, CURLOPT_TIMEOUT, 30);
        curl_setopt($CURL, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, 'POST');

        $status = curl_getinfo($CURL, CURLINFO_HTTP_CODE);
        $err = curl_error($CURL);
        
        $resultado = curl_exec($CURL);
        // $resultado = json_decode($resultado);

        // Close the CURL
        curl_close($CURL);

        return $resultado;
    }
}
