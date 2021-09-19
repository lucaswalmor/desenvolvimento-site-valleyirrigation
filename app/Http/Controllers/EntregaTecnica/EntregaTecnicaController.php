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
use App\Classes\EntregaTecnica\EntregaTecnicaLances;
use App\Classes\EntregaTecnica\EntregaTecnicaBomba;
use App\Classes\EntregaTecnica\EntregaTecnicaBombaMotor;
use App\Classes\EntregaTecnica\EntregaTecnicaChavePartida;
use App\Classes\EntregaTecnica\EntregaTecnicaBombaAutotrafo;
use App\Classes\Listas\Lista;
use App\User;
use PhpParser\Node\Expr\Cast\Double;
use Session;

class EntregaTecnicaController extends Controller
{
    public function manageTechnicalDelivery() 
    {
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
            return view('entregaTecnica.gerenciarEntregaTecnica', compact('entrega_tecnica', 'fazenda'));
        } else {
            redirect()->back()->with('error', __('afericao.selecione_fazenda'), 'warning');
            return redirect()->route('dashboard');
        }
    }

    public function createVerificationTechnicalDelivery() 
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

        $fornecedores = Lista::getListaFornecedores();

        return view('entregaTecnica.createVerificacaoEntregaTecnica', compact('fazenda', 'proprietarios', 'revendas', 'consultores', 'fornecedores'));
    }

    public function saveVerificationTechnicalDelivery(Request $request) {
        $dados = $request->all();
        if($dados['botao'] == "sair"){

            $trecho['id_tecnico'] = $dados['id_tecnico'];
            $trecho['id_fazenda'] = $dados['id_fazenda'];
            $trecho['numero_pedido'] = $dados['numero_pedido'];
            $trecho['data_entrega_tecnica'] = $dados['data_entrega_tecnica'];
            $trecho['numero_serie'] = $dados['numero_serie'];
            $trecho['fornecedor_motor'] = $dados['fornecedor_motor'];
            $trecho['fornecedor_bomba'] = $dados['fornecedor_bomba'];
            $trecho['fornecedor_chave_partida'] = $dados['fornecedor_chave_partida'];
            $trecho['fornecedor_conjunto_succao'] = $dados['fornecedor_conjunto_succao'];
            $trecho['fornecedor_ligacao_pressao'] = $dados['fornecedor_ligacao_pressao'];
            $trecho['fornecedor_adutora'] = $dados['fornecedor_adutora'];
            $trecho['fornecedor_kit_aspersores'] = $dados['fornecedor_kit_aspersores'];
            $trecho['fornecedor_pivo_central'] = $dados['fornecedor_pivo_central'];
            $trecho['item_manual_montagem'] = $dados['item_manual_montagem'];
            $trecho['item_listagem_aspersores'] = $dados['item_listagem_aspersores'];
            $trecho['item_manual_bomba'] = $dados['item_manual_bomba'];
            $trecho['item_manual_motor_diesel'] = $dados['item_manual_motor_diesel'];
            $trecho['item_manual_chave_partida_ss'] = $dados['item_manual_chave_partida_ss'];
        
            $entrega_tecnica = EntregaTecnica::create($trecho);
            $id_entrega_tecnica = $entrega_tecnica['id'];
                        
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('manage_technical_delivery');

        } else if ($dados['botao'] == "proximo") {

            $trecho['id_tecnico'] = $dados['id_tecnico'];
            $trecho['id_fazenda'] = $dados['id_fazenda'];
            $trecho['numero_pedido'] = $dados['numero_pedido'];
            $trecho['data_entrega_tecnica'] = $dados['data_entrega_tecnica'];
            $trecho['numero_serie'] = $dados['numero_serie'];
            $trecho['fornecedor_motor'] = $dados['fornecedor_motor'];
            $trecho['fornecedor_bomba'] = $dados['fornecedor_bomba'];
            $trecho['fornecedor_chave_partida'] = $dados['fornecedor_chave_partida'];
            $trecho['fornecedor_conjunto_succao'] = $dados['fornecedor_conjunto_succao'];
            $trecho['fornecedor_ligacao_pressao'] = $dados['fornecedor_ligacao_pressao'];
            $trecho['fornecedor_adutora'] = $dados['fornecedor_adutora'];
            $trecho['fornecedor_kit_aspersores'] = $dados['fornecedor_kit_aspersores'];
            $trecho['fornecedor_pivo_central'] = $dados['fornecedor_pivo_central'];
            $trecho['item_manual_montagem'] = ($dados['item_manual_montagem'] == "on") ? 1 : 0;
            $trecho['item_listagem_aspersores'] = ($dados['item_listagem_aspersores'] == "on") ? 1 : 0;
            $trecho['item_manual_bomba'] = ($dados['item_manual_bomba'] == "on") ? 1 : 0;
            $trecho['item_manual_motor_diesel'] = ($dados['item_manual_motor_diesel'] == "on") ? 1 : 0;
            $trecho['item_manual_chave_partida_ss'] = ($dados['item_manual_chave_partida_ss'] == "on") ? 1 : 0;

            $entrega_tecnica = EntregaTecnica::create($trecho);
            $id_entrega_tecnica = $entrega_tecnica['id'];

            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('create_technical_delivery', compact('id_entrega_tecnica'));
        }

    }

    public function createTechnicalDelivery($id_entrega_tecnica) 
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
        $motorredutores = Lista::getMotoredutor();
        $getPneus = Lista::getPneus(); 
        $tipoLances = Lista::getListaLances();
        $diametroLances = Lista::getListaLancesDiametro();
        $getListaDiametroTipo = Lista::getListaDiametroTipo();
        $marcaMotorredutor = Lista::getMarcaMotorredutor();
        $telemetria = Lista::getTelemetria();
        $injeferdPotencia = Lista::getInjeferdPotencia();
        $canhaoFinal = Lista::getCanhaoFinalValvula();
        $bombaLigacao = Lista::getBombaLigacao();

        return view('entregaTecnica.createEntregaTecnica', compact('proprietarios', 'consultores', 'revendas', 'modelos', 
        'equipamento', 'lista_equipamento', 'altura_equipamento', 'getBalanco', 'paineis', 'correntes', 'motorredutores', 'getPneus',
        'getBombaMarca', 'getBombaMarcaSerie', 'tipoLances', 'diametroLances', 'fazenda', 'getListaDiametroTipo', 'getListaAlturaTipo',
        'marcaMotorredutor', 'telemetria', 'injeferdPotencia', 'canhaoFinal', 'bombaLigacao', 'id_entrega_tecnica'));
    }

    public function saveTechnicalDelivery(Request $req) 
    {
        $dados = $req->all();
        $altura_valor = Lista::getAlturaValor($dados['altura_equipamento']); 

        if($dados['botao'] == "sair"){
            $trecho['modelo_equipamento'] = $dados['modelo'];
            $trecho['tipo_equipamento'] = $dados['tipo_equipamento'];
            $trecho['tipo_equipamento_op1'] = $dados['tipo_equipamento_op1'];
            $trecho['altura_equipamento_nome'] = $dados['altura_equipamento'];
            $trecho['altura_equipamento_valor'] = $altura_valor;                    
            $trecho['balanco_comprimento'] = $dados['balanco'];
            $trecho['painel'] = $dados['painel'];
            $trecho['corrente_fusivel_nh500v'] = $dados['corrente'];
            $trecho['pneus'] = $dados['pneus'];
            $trecho['motorredutores'] = $dados['motorredutores'];  
            $trecho['motorreduror_marca'] = $dados['motorreduror_marca'];  
            $trecho['parada_automatica'] = $dados['parada_automatica'];  
            $trecho['barreira_seguranca'] = $dados['barreira_seguranca'];  
            $trecho['telemetria'] = $dados['telemetria'];  
            $trecho['acessorios'] = $dados['acessorios'];  
            $trecho['injeferd'] = $dados['injeferd'];  
            $trecho['canhao_final_valvula'] = $dados['canhao_final_valvula'];  

            $entrega_tecnica = EntregaTecnica::where('id', $dados['id_entrega_tecnica'])->update($trecho);

            for ($i = 0; $i < count($dados['diametro']); $i++) {
                $modelo = explode('_', $dados['qtd_tubos'][$i] );
                $qtd_tubos = (int)$modelo[0];
                $comprimento_lances = Lista::getTamanhoLance($dados['diametro'][$i], $modelo[1]);
                EntregaTecnicaLances::create([
                    'diametro_tubo' => $dados['diametro'][$i],
                    'quantidade_lances' => $dados['qtd_lances'][$i],
                    'quantidade_tubo' => $qtd_tubos,
                    'comprimento_lance' => $comprimento_lances,
                    'id_lance' =>  $i + 1,
                    'id_entrega_tecnica' => $dados['id_entrega_tecnica']
                ]);         
            }
                        
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('manage_technical_delivery');

        } else if ($dados['botao'] == "proximo") {

            $trecho['modelo_equipamento'] = $dados['modelo'];
            $trecho['tipo_equipamento'] = $dados['tipo_equipamento'];
            $trecho['tipo_equipamento_op1'] = $dados['tipo_equipamento_op1'];
            $trecho['altura_equipamento_nome'] = $dados['altura_equipamento'];
            $trecho['altura_equipamento_valor'] = $altura_valor;                    
            $trecho['balanco_comprimento'] = $dados['balanco'];
            $trecho['painel'] = $dados['painel'];
            $trecho['corrente_fusivel_nh500v'] = $dados['corrente'];
            $trecho['pneus'] = $dados['pneus'];
            $trecho['motorredutores'] = $dados['motorredutores'];  
            $trecho['motorreduror_marca'] = $dados['motorreduror_marca'];  
            $trecho['parada_automatica'] = $dados['parada_automatica'];  
            $trecho['barreira_seguranca'] = $dados['barreira_seguranca'];  
            $trecho['telemetria'] = $dados['telemetria'];  
            $trecho['acessorios'] = $dados['acessorios'];  
            $trecho['injeferd'] = $dados['injeferd'];  
            $trecho['canhao_final_valvula'] = $dados['canhao_final_valvula'];  

            $entrega_tecnica = EntregaTecnica::where('id', $dados['id_entrega_tecnica'])->update($trecho);
            $id_entrega_tecnica = $dados['id_entrega_tecnica'];

            for ($i = 0; $i < count($dados['diametro']); $i++) {
                $modelo = explode('_', $dados['qtd_tubos'][$i] );
                $qtd_tubos = (int)$modelo[0];
                $comprimento_lances = Lista::getTamanhoLance($dados['diametro'][$i], $modelo[1]);
                EntregaTecnicaLances::create([
                    'diametro_tubo' => $dados['diametro'][$i],
                    'quantidade_lances' => $dados['qtd_lances'][$i],
                    'quantidade_tubo' => $qtd_tubos,
                    'comprimento_lance' => $comprimento_lances,
                    'id_lance' =>  $i + 1,
                    'id_entrega_tecnica' => $dados['id_entrega_tecnica']
                ]);         
            }
            
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('create_technical_delivery_pressurization', compact('id_entrega_tecnica'));
        }
    }

    public function createPressurizationTechnicalDelivery($id_entrega_tecnica) 
    {
        $bombaLigacao = Lista::getBombaLigacao();
        $bomba_marca = Lista::getBombaMarca();
        $bomba_modelo = Lista::getBombaMarcaSerie();
        $tipo_motor = Lista::getTipoMotor();
        $motor_marca = Lista::getMotorMarca();
        $id_bomba = 0;
        return view('entregaTecnica.createPressurizacaoEntregaTecnica', compact('id_entrega_tecnica', 'bombaLigacao', 'bomba_marca',
                    'bomba_modelo', 'tipo_motor', 'motor_marca', 'id_bomba'));
    }

    public function savePressurizationTechnicalDelivery(Request $req) {
        $dados = $req->all();
        $trecho['modelo_equipamento'] = $dados['modelo'];
        $trecho['quantidade'] = $dados['quantidade'];
        $trecho['ligacao'] = $dados['ligacao'];
        $trecho['marca'] = $dados['marca'];
        $trecho['modelo'] = $dados['modelo'];                    
        $trecho['numero_estagio'] = $dados['numero_estagio'];
        $trecho['rotor'] = $dados['rotor'];
        $trecho['opcionais'] = $dados['opcionais'];
        $trecho['id_entrega_tecnica'] = $dados['id_entrega_tecnica'];
        $trecho['id_bomba'] = $dados['id_bomba'] + 1;

        $bomba = EntregaTecnicaBomba::create($trecho);
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];
        $id_bomba = $dados['id_bomba'] + 1;

        $marca = '';
        $modelo = '';

        for ($i = 0; $i < count($dados['tipo_motor']); $i++) {
            if ($dados['tipo_motor'][$i] == 'diesel') {
                $marca = $dados['marca_motor'][$i];
                $modelo = $dados['modelo_motor'][$i];
            } else {
                $marca = $dados['marca_motor_eletrico'][$i];
                $modelo = $dados['modelo_motor_eletrico'][$i];
            }

            EntregaTecnicaBombaMotor::create([
                'tipo' => $dados['tipo_motor'][$i],
                'marca' => $marca,
                'modelo' => $modelo,
                'potencia' => $dados['potencia'][$i],
                'numero_serie' => $dados['numero_serie'][$i],
                'rotacao' => $dados['rotacao'][$i],
                'tensao' => $dados['tensao'][$i],
                'lp_ln' => $dados['lp_ln'][$i],
                'classe_isolamento' => $dados['classe_isolamento'][$i],
                'corrente_nominal' => $dados['corrente_nominal'][$i],
                'fs' => $dados['fs'][$i],
                'ip' => $dados['ip'][$i],
                'rendimento' => $dados['rendimento'][$i],
                'cos' => $dados['cos'][$i],
                'id_bomba' => $id_bomba,
                'id_motor' => $i + 1,
                'id_entrega_tecnica' => $dados['id_entrega_tecnica']
            ]);         
        } 

        if($dados['botao'] == "sair"){
         
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('manage_technical_delivery', $id_bomba['id']);

        } else if ($dados['botao'] == "proximo") {

            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('create_technical_delivery_starter_key', compact('id_entrega_tecnica'));

        } else if ($dados['botao'] == "nova_bomba") {


            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');

            $bombaLigacao = Lista::getBombaLigacao();
            $bomba_marca = Lista::getBombaMarca();
            $bomba_modelo = Lista::getBombaMarcaSerie();
            $tipo_motor = Lista::getTipoMotor();
            $motor_marca = Lista::getMotorMarca();

            return view('entregaTecnica.createPressurizacaoEntregaTecnica', compact('id_entrega_tecnica', 'bombaLigacao', 'bomba_marca',
                        'bomba_modelo', 'tipo_motor', 'motor_marca', 'id_bomba', $id_bomba['id']));

        }
    }

    public function createStarterKeyTechnicalDelivery($id_entrega_tecnica) 
    {
        $chavePartida = Lista::getChavePartida();
        $chavePartidaAcionamento = Lista::getChavePartidaAcionamento();
        $chaveSeccionadora = Lista::getChaveSeccionadora();
        $gerador = Lista::getGerador();

        return view('entregaTecnica.createChavePartidaEntregaTecnica', compact('id_entrega_tecnica', 'chavePartida', 'chavePartidaAcionamento', 'chaveSeccionadora',
                    'gerador'));        
    }

    public function saveStarterKeyTechnicalDelivery(Request $req) {
        $dados = $req->all();
        $id_entrega_tecnica = $dados['id_entrega_tecnica'];

        for ($i = 0; $i < count($dados['marca']); $i++) {
            EntregaTecnicaChavePartida::create([
                'marca' => $dados['marca'][$i],
                'acionamento' => $dados['acionamento'][$i],
                'regulagem_reles' => $dados['regulagem_reles'][$i],
                'numero_serie' => $dados['numero_serie'][$i],
                'id_chave_partida' => $i + 1,
                'id_entrega_tecnica' => $id_entrega_tecnica
            ]);         
        } 

        for ($i = 0; $i < count($dados['potencia']); $i++) {
            EntregaTecnicaBombaAutotrafo::create([
                'potencia' => $dados['potencia'][$i],
                'tap_entrada' => $dados['tap_entrada'][$i],
                'tap_saida' => $dados['tap_saida'][$i],
                'chave_seccionadora' => $dados['chave_seccionadora'][$i],
                'gerador' => $dados['gerador'][$i],
                'gerador_marca' => $dados['gerador_marca'][$i],
                'gerador_modelo' => $dados['gerador_modelo'][$i],
                'gerador_potencia' => $dados['gerador_potencia'][$i],
                'gerador_frequencia' => $dados['gerador_frequencia'][$i],
                'gerador_tensao' => $dados['gerador_tensao'][$i],
                'id_autotrafo' => $i + 1,
                'id_entrega_tecnica' => $id_entrega_tecnica
            ]);         
        } 

        if($dados['botao'] == "sair"){
         
            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('manage_technical_delivery');

        } else if ($dados['botao'] == "proximo") {

            Notificacao::gerarAlert('', 'entregaTecnica.cadastro_entrega_tecnica_sucesso', 'success');
            return redirect()->route('create_technical_delivery_starter_key', compact('id_entrega_tecnica'));

        }
    }

    public function historicTechnicalDelivery()
    {
        $historico_entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'fazendas.nome', 'P.nome as nome_proprietario')
        ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
        ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
        ->get();

        return view('entregaTecnica.historicoEntregaTecnica', compact('historico_entrega_tecnica'));
    }

    public function searchHistoric(Request $request) 
    {
        $historico_entrega_tecnica = [];
        
        if(empty($request['filter'])) {
            $historico_entrega_tecnica = DB::table('entrega_tecnica')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->select('entrega_tecnica.*', 'fazendas.id', 'fazendas.nome', 'P.nome as nome_proprietario')
            ->where(function ($query) use ($request){
                if (!empty($request['filter'])) {
                    $query->orWhere('numero_pedido', 'like', '%'.$request['filter'].'%')
                        ->orWhere('nome', 'like', '%'.$request['filter'].'%')
                        ->orWhere('nome_proprietario', 'like', '%'.$request['filter'].'%')
                        ->orWhere('numero_serie', 'like', '%'.$request['filter'].'%');
                }
            })->paginate(10);
        } else {
            $historico_entrega_tecnica = DB::table('entrega_tecnica')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->select('entrega_tecnica.*', 'fazendas.id', 'fazendas.nome', 'P.nome as nome_proprietario')
            ->where(function ($query) use ($request){
                if (!empty($request['filter'])) {
                    $query->orWhere('numero_pedido', 'like', '%'.$request['filter'].'%')
                    ->orWhere('numero_serie', 'like', '%'.$request['filter'].'%');
                }
            })->paginate(10);
        }
        return view('entregaTecnica.historicoEntregaTecnica', compact('historico_entrega_tecnica'));
    }

    public function viewTechnicalDelivery($id)
    {
        $visualizar_entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'ETL.*',
            'fazendas.nome as nome_fazenda', 'fazendas.cidade as cidade_fazenda', 'fazendas.estado as estado_fazenda', 'US.id_usuario', 'U.nome as nome_usuario')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
            ->join('users as U', 'US.id_usuario', '=', 'U.id')
            ->join('entrega_tecnica_lances as ETL', 'entrega_tecnica.id', '=', 'ETL.id_entrega_tecnica')
            ->where('entrega_tecnica.id', $id)
            ->get();
        
        return view('entregaTecnica.verEntregaTecnica', compact('visualizar_entrega_tecnica'));
    }

    public function delete($id)
    {
        $delete = EntregaTecnica::find($id);
        $delete->delete();
        return redirect()->route('historic_technical_delivery')->with('Sucesso', 'Foi deletado');
    }

    public function findFarms(Request $request)
    {
        $fazendas = Fazenda::select('id', 'nome')->where('id_proprietario', $request->get('id') )->get();

        $lista_fazenda = [];
        foreach( $fazendas as $fazenda )
        {
            $lista_fazenda[$fazenda->id] = $fazenda->nome;
        }
        return $lista_fazenda;
    }

    public function findCityFarm(Request $request)
    {
        $fazendas = Fazenda::select('id', 'cidade', 'estado')->where('id', $request->get('id') )->get();
        $lista_cidade = array('cidade' => $fazendas[0]['cidade'], 'estado' => $fazendas[0]['estado']);
        return $lista_cidade;
    }
}
