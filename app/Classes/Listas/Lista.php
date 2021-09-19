<?php

namespace App\Classes\Listas;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public static function getModeloPivo() {
        $modelos = [
            ['modelo' => '8000']
        ];
        return $modelos; 
    }

    public static function getTipoEquipamento(){
        $tipoEquipamento = [
            ['tipo_equipamento' => 'pivo_central'],
            ['tipo_equipamento' => 'rebocavel'],
            ['tipo_equipamento' => 'linear']
        ];
        
        return $tipoEquipamento;
    }

    public static function getTipoEquipamentoOp1(){
        $tipoEquipamento = [
            ['tipo_equipamento' => 'pivo_central', 'tipo_op1' => 'convencional'],
            ['tipo_equipamento' => 'pivo_central', 'tipo_op1' => 'convencional_corner'],
            ['tipo_equipamento' => 'pivo_central', 'tipo_op1' => 'convencional_bender'],
            ['tipo_equipamento' => 'pivo_central', 'tipo_op1' => 'vfd'],
            ['tipo_equipamento' => 'pivo_central', 'tipo_op1' => 'x_tec'],
            ['tipo_equipamento' => 'pivo_central', 'tipo_op1' => 'spinner'],
            ['tipo_equipamento' => 'rebocavel', 'tipo_op1' => '2rodas'],
            ['tipo_equipamento' => 'rebocavel', 'tipo_op1' => '4rodas'],
            ['tipo_equipamento' => 'linear', 'tipo_op1' => '2rodas'],
            ['tipo_equipamento' => 'linear', 'tipo_op1' => '4rodas'],
            ['tipo_equipamento' => 'linear', 'tipo_op1' => 'universal']
        ];
        return $tipoEquipamento;
    }

    public static function getListaLancesDiametro() {
        $diametroLances = [
            ['diametro' => '10'],
            ['diametro' => '8.5/8'],
            ['diametro' => '6.5/8'],
            ['diametro' => '5']
        ];

        return $diametroLances;
    }

    public static function getListaDiametroTipo() {
        $diametroTipo = [
            ['diametro' => '10', 'tipo' => 'pivo_central'],     
            ['diametro' => '8.5/8', 'tipo' => 'pivo_central'],
            ['diametro' => '8.5/8', 'tipo' => 'rebocavel'],
            ['diametro' => '8.5/8', 'tipo' => 'linear'],
            ['diametro' => '6.5/8', 'tipo' => 'pivo_central'],
            ['diametro' => '6.5/8', 'tipo' => 'rebocavel'],
            ['diametro' => '6.5/8', 'tipo' => 'linear'],
            ['diametro' => '5', 'tipo' => 'pivo_central']
        ];

        return $diametroTipo;
    }

    public static function getListaLances() {
        $tipoLances = [
            ['diametro' => '10', 'qtd_tubo' => '6', 'modelo' => 'padrao', 'tamanho' => '41,21m'],
            ['diametro' => '10', 'qtd_tubo' => '7', 'modelo' => 'medio', 'tamanho' => '48m'],
            ['diametro' => '8.5/8', 'qtd_tubo' => '6', 'modelo' => 'padrao', 'tamanho' => '41,21m'],
            ['diametro' => '8.5/8', 'qtd_tubo' => '7', 'modelo' => 'medio', 'tamanho' => '48m'],
            ['diametro' => '8.5/8', 'qtd_tubo' => '8', 'modelo' => 'longo', 'tamanho' => '54,86m'],
            ['diametro' => '6.5/8', 'qtd_tubo' => '6', 'modelo' => 'padrao', 'tamanho' => '41,21m'],
            ['diametro' => '6.5/8', 'qtd_tubo' => '7', 'modelo' => 'medio', 'tamanho' => '48m'],
            ['diametro' => '6.5/8', 'qtd_tubo' => '8', 'modelo' => 'longo', 'tamanho' => '54,86m'],
            ['diametro' => '6.5/8', 'qtd_tubo' => '9', 'modelo' => 'extra_longo', 'tamanho' => '61,72m'],
            ['diametro' => '5', 'qtd_tubo' => '6', 'modelo' => 'padrao', 'tamanho' => '41,21m'],
            ['diametro' => '5', 'qtd_tubo' => '7', 'modelo' => 'medio', 'tamanho' => '48m'],
            ['diametro' => '5', 'qtd_tubo' => '8', 'modelo' => 'longo', 'tamanho' => '54,86m']            
        ];
        
        return $tipoLances;
    }
    
    public static function getTamanhoLance($diametro, $modelo) {
        $lista = self::getListaLances();
        $tamanho_lance = 0;
        for ($i = 0; $i < count($lista); $i++) {
            if($lista[$i]['diametro'] == $diametro && $lista[$i]['modelo'] == $modelo) {
                $tamanho_lance = (Double)(str_replace(',', '.', $lista[$i]['tamanho']));
                break;
            }
        }
        
        return $tamanho_lance;
    }
    
    public static function getListaAlturaTipo() {
        $alturaTipo = [
            ['altura' => 'standard', 'altura_equipamento' => '2,74m', 'tipo' => 'linear'], 
            ['altura' => 'standard', 'altura_equipamento' => '2,74m', 'tipo' => 'rebocavel'], 
            ['altura' => 'standard', 'altura_equipamento' => '2,74m', 'tipo' => 'pivo_central'], 
            ['altura' => 'alto', 'altura_equipamento' => '3,75m', 'tipo' => 'linear'],
            ['altura' => 'alto', 'altura_equipamento' => '3,75m', 'tipo' => 'rebocavel'],
            ['altura' => 'alto', 'altura_equipamento' => '3,75m', 'tipo' => 'pivo_central'],
            ['altura' => 'extra_alto', 'altura_equipamento' => '4,60m', 'tipo' => 'pivo_central'],
            ['altura' => 'super_alto', 'altura_equipamento' => '5,50m', 'tipo' => 'pivo_central']
        ];
        return $alturaTipo;
    }

    public static function getListaAlturaEquipamento(){
        $tipoEquipamento = [
            ['altura_equipamento' => 'standard', 'altura' => '2,74m'], 
            ['altura_equipamento' => 'alto', 'altura' => '3,75m'],
            ['altura_equipamento' => 'extra_alto', 'altura' => '4,60m'],
            ['altura_equipamento' => 'super_alto', 'altura' => '5,50m']
        ];
        return $tipoEquipamento;
    }

    public static function getAlturaValor($altura_equipamento)
    {
        $lista = self::getListaAlturaEquipamento();
        $altura_valor = 0;
        for ($i = 0; $i < count($lista); $i++) {
            if($lista[$i]['altura_equipamento'] == $altura_equipamento) {
                $altura_valor = (Double)(str_replace(',', '.', $lista[$i]['altura']));
                break;
            }
        }
        
        return $altura_valor;
    }

    public static function getBalanco() {
        $balanco = [
            ['balanco' => '4,88m'],
            ['balanco' => '11,73m'],
            ['balanco' => '16,31m'],
            ['balanco' => '20,88m'],
            ['balanco' => '25,45m']
        ];
        return $balanco;
    }

    public static function getPainel() {
        $painel = [
            ['painel' => 'ICON10'],
            ['painel' => 'ICON5'],
            ['painel' => 'ICONX'],
            ['painel' => 'ICON1'],
            ['painel' => 'STANDARD/CLASSIC PLUS'],
            ['painel' => 'PRO2'],
            ['painel' => 'AUTOPILOT']
        ];
        return $painel;
    }

    public static function getCorrente() {
        $corrente = [
            ['corrente_fusivel_nh500v' => '10A'],
            ['corrente_fusivel_nh500v' => '16A'],
            ['corrente_fusivel_nh500v' => '20A'],
            ['corrente_fusivel_nh500v' => '25A'],
            ['corrente_fusivel_nh500v' => '35A'],
            ['corrente_fusivel_nh500v' => '40A'],
            ['corrente_fusivel_nh500v' => '50A']
        ];
        return $corrente;
    }

    public static function getMotoredutor() {
        $motoredutor = [
            ['motoredutor_potencia' => '0.6HP'],
            ['motoredutor_potencia' => '1.2HP'],
            ['motoredutor_potencia' => '1.0HP'],
            ['motoredutor_potencia' => '1.5HP'],
            ['motoredutor_potencia' => '2.5HP']
        ];
        return $motoredutor;
    }

    public static function getPneus() {
        $pneus = [
            ['pneus' => '12.4 X 24'],
            ['pneus' => '12.4 X 28'],
            ['pneus' => '12.4 X 38'],
            ['pneus' => '14.9 X 24'],
            ['pneus' => '14.9 X 28']
        ];
        return $pneus;
    }

    public static function getBombaMarca() {
        $bomba_marca = [
            ['bomba_marca' => 'IMBIL'],
            ['bomba_marca' => 'KSB'],
            ['bomba_marca' => 'HIGRA'],
            ['bomba_marca' => 'GRUNDFUS'],
            ['bomba_marca' => 'EBARA']
        ];
        return $bomba_marca;
    }

    public static function getBombaMarcaSerie() {
        $bomba_marca = [
            ['bomba_marca' => 'IMBIL', 'modelo' => 'ITA'],
            ['bomba_marca' => 'IMBIL', 'modelo' => 'BEW'],
            ['bomba_marca' => 'IMBIL', 'modelo' => 'INI'],
            ['bomba_marca' => 'IMBIL', 'modelo' => 'INIBLOC'],
            ['bomba_marca' => 'KSB', 'modelo' => 'WKL*'],
            ['bomba_marca' => 'KSB', 'modelo' => 'MEGANORM'],
            ['bomba_marca' => 'KSB', 'modelo' => 'MEGABLOC'],
            ['bomba_marca' => 'KSB', 'modelo' => 'ETA'],
            ['bomba_marca' => 'KSB', 'modelo' => 'BLOC'],
            ['bomba_marca' => 'HIGRA', 'modelo' => 'M1'],
            ['bomba_marca' => 'HIGRA', 'modelo' => 'R1'],
            ['bomba_marca' => 'HIGRA', 'modelo' => 'R2'],
            ['bomba_marca' => 'HIGRA', 'modelo' => 'R3'],
            ['bomba_marca' => 'HIGRA', 'modelo' => 'R4'],
            ['bomba_marca' => 'HIGRA', 'modelo' => 'R5'],
            ['bomba_marca' => 'GRUNDFUS', 'modelo' => 'NKG'],
            ['bomba_marca' => 'GRUNDFUS', 'modelo' => 'NBG'],
            ['bomba_marca' => 'EBARA', 'modelo' => 'NORM'],
        ];
        return $bomba_marca;
    }

    public static function getMarcaMotorredutor() {
        $marcaMotorredutor = [
            ['marca' => 'WEG'],
            ['marca' => 'BALDOR'],
            ['marca' => 'VALLEY']
        ];

        return $marcaMotorredutor;
    }

    public static function getTelemetria() {
        $telemetria = [
            ['modelo' => 'Aqua Trac Pro'],
            ['modelo' => 'Aqua Trac Lite'],
            ['modelo' => 'Commander VP'],
            ['modelo' => 'Icon Link'],
            ['modelo' => 'Crop Link'],
            ['modelo' => 'BaseStation3'],
            ['modelo' => 'Estação Metereológica Valley'],
            ['modelo' => 'Field Commander']
        ];

        return $telemetria;
    }

    public static function getInjeferdPotencia() {
        $injeferdPotencia = [
            ['potencia' => '3cv'],
            ['potencia' => '5cv']
        ];

        return $injeferdPotencia;
    }

    public static function getCanhaoFinalValvula() {
        $canhaoFinal = [
            ['tipo' => 'desligamento'],
            ['tipo' => 'reguladora']
        ];

        return $canhaoFinal;
    }

    public static function getBombaLigacao() {
        $bombaLigacao = [
            ['tipo' => 'serie'],
            ['tipo' => 'paralelo']
        ];

        return $bombaLigacao;
    }

    public static function getTipoMotor() {
        $tipoMotor = [
            ['tipo' => 'eletrico'],
            ['tipo' => 'diesel']
        ];

        return $tipoMotor;
    }

    public static function getMotorMarca() {
        $motorMarca = [
            ['tipo' => 'diesel', 'marca' => 'CUMMINS'],
            ['tipo' => 'diesel', 'marca' => 'MWM'],
            ['tipo' => 'diesel', 'marca' => 'SCANIA'],
        ];

        return $motorMarca;
    }

    public static function getChavePartida() {
        $chavePartida = [
            ['tipo' => 'WEB'],
            ['tipo' => 'YASKAWA'],
            ['tipo' => 'SEMEL']
        ];

        return $chavePartida;
    }

    public static function getChavePartidaAcionamento() {
        $chavePartidaAcionamento = [
            ['tipo' => 'WEB', 'modelo' => 'compensadora'],
            ['tipo' => 'WEB', 'modelo' => 'soft_starter'],
            ['tipo' => 'WEB', 'modelo' => 'inversora'],
            ['tipo' => 'YASKAWA', 'modelo' => 'inversora'],
            ['tipo' => 'SEMEL', 'modelo' => 'conversor_mono_tri'],
        ];

        return $chavePartidaAcionamento;
    }

    public static function getListaFornecedores() {
        $fornecedores = [
            ['fornecedor' => 'valmont'],
            ['fornecedor' => 'revenda'],
            ['fornecedor' => 'cliente']
        ];

        return $fornecedores;
    }

    public static function getChaveSeccionadora() {
        $chaveSeccionadora = [
            ['tipo' => 'nenhuma'],
            ['tipo' => 'disjuntos'],
            ['tipo' => 'outros'],
        ];
        
        return $chaveSeccionadora;
    }

    public static function getGerador() {
        $gerador = [
            ['tipo' => 'grupo_gerador'],
            ['tipo' => 'montagem'],
            ['tipo' => 'solar'],
        ];

        return $gerador;
    }
}

?>