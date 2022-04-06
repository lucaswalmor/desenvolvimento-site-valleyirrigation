<?php

namespace App\Http\Controllers\Projetos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Classes\EntregaTecnica\EntregaTecnica;
use App\Classes\Projetos\Afericao\PivoCentral\AfericaoPivoCentral;
use App\Classes\Sistema\Fazenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user()->nome;    
        $pendente = array();
        $pendente = AfericaoPivoCentral::verificarExistenciaAfericoesPendentes(Auth::user()->id);

        
        if (session()->has('fazenda')) {
            session()->put('current_module', 'dashboard');
            $fazenda = session()->get('fazenda');            
            $id_fazenda = Session::get('fazenda')['id'];
            
            $fazenda = Fazenda::select('fazendas.*', 'P.nome as nome_proprietario', 'U.nome as nome_consultor')
                ->where('fazendas.id', $id_fazenda)
                ->join('proprietarios as P', 'P.id', 'fazendas.id_proprietario')
                ->join('users as U', 'U.id', 'fazendas.id_consultor')
                ->first();

            // List of technical delivery for managered
            $entrega_tecnica = EntregaTecnica::select('entrega_tecnica.*', 'users.nome as nome_tecnico', 'P.nome as nome_proprietario')
            ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
            ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
            ->join('users', 'entrega_tecnica.id_tecnico', '=', 'users.id')
            ->where('entrega_tecnica.id_fazenda', $id_fazenda)
            ->get();

            // Counts the amount of technical delivery that exists for the selected farm
            
            // GRAPH DATA //
                
                $total_et = EntregaTecnica::select('*')->where('id_fazenda', $id_fazenda)->whereNull('deleted_at')->orderBy('created_at', 'desc')->count();
                $entrega_tecnica = EntregaTecnica::select('*')->where('id_fazenda', $id_fazenda)->whereNull('deleted_at')->get();
                $total_et_year_month = EntregaTecnica::selectRaw("year(data_entrega_tecnica) year, month(data_entrega_tecnica) month, count(*) total")
                ->where('id_fazenda', $id_fazenda)
                ->groupBy("year")
                ->groupBy("month")                
                ->get();
                
                $data = [];
                $mes = array('', __('comum.mesAbr_jan'), __('comum.mesAbr_fev'), __('comum.mesAbr_mar'), __('comum.mesAbr_abr'),__('comum.mesAbr_mai'), __('comum.mesAbr_jun'),
                __('comum.mesAbr_jul'),__('comum.mesAbr_ago'), __('comum.mesAbr_set'), __('comum.mesAbr_out'),__('comum.mesAbr_nov'), __('comum.mesAbr_dez') );
                
                // $mes = ['', "@lang('dashboard.jan')","@lang('dashboard.fev')", "@lang('dashboard.mar')"];

                foreach ($total_et_year_month as $total) {
                    $data['ano'][] = $total['year'];
                    $data['mes'][] = $total['month'];
                    $data['total'][] = $total['total'];
                }

                foreach($data['mes'] as $key => $teste) {
                    $data['mes'][$key] = $mes[$teste];
                }
                
            // END GRAPH DATA //

            // TABLE DATA //
                session()->put('current_module', 'entrega_tecnica_analise');

                $table_data = EntregaTecnica::select('entrega_tecnica.*', 'P.nome as nome_proprietario', 'U.nome as nome_usuario', 'fazendas.nome as nome_fazenda')
                ->join('fazendas', 'entrega_tecnica.id_fazenda', '=', 'fazendas.id')
                ->join('usuario_superiores as US', 'fazendas.id_consultor', '=', 'US.id_usuario')
                ->join('users as U', 'US.id_usuario', '=', 'U.id')
                ->join('proprietarios as P', 'fazendas.id_proprietario', '=', 'P.id')
                ->where('entrega_tecnica.id_fazenda', $id_fazenda)
                ->orderby('data_entrega_tecnica', 'desc')
                ->paginate(5);
            //////////
        }

        return view('sistema.dashboard', compact('user', 'pendente', 'data', 'total_et_year_month', 'table_data', 'total_et', 'entrega_tecnica'));
    }

    public function irParaAfericao(Request $req){
        $dados = $req->all();
        $fazenda_sessao = [];
        $fazenda_sessao['nome'] = $dados['nome_fazenda'];
        $fazenda_sessao['id'] = $dados['id_fazenda'];
        session(['fazenda' => $fazenda_sessao]);
        return redirect()->route('gauging_status', $dados['id_afericao']);
    }
}
