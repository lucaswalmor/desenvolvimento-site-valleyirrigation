<?php

namespace App\Classes\Comum;

class Validates
{
    public static function validateCNPJ($cnpj){
        if(empty($cnpj)) {
            return false;
        }

        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        if (strlen($cnpj) != 14) {
            return false;
        } else if (
            $cnpj == '00000000000000' || $cnpj == '11111111111111' || 
            $cnpj == '22222222222222' || $cnpj == '33333333333333' || 
            $cnpj == '44444444444444' || $cnpj == '55555555555555' || 
            $cnpj == '66666666666666' || $cnpj == '77777777777777' || 
            $cnpj == '88888888888888' || $cnpj == '99999999999999') {
            return false;


            $flagDoc = 'CNPJ';
            return $flagDoc == 'CNPJ';
        } 

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;
        dump($cnpj);
        dump($resto);

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    public static function validateCPF($cpf) {
        if(empty($cpf)) {
            return false;
        }

        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11) {
            return false;
        } else if (
            $cpf == '00000000000' || $cpf == '11111111111' || 
		    $cpf == '22222222222' || $cpf == '33333333333' || 
		    $cpf == '44444444444' || $cpf == '55555555555' || 
		    $cpf == '66666666666' || $cpf == '77777777777' || 
		    $cpf == '88888888888' || $cpf == '99999999999') {
		    return false;
        }

        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }

        $resto = $soma % 11;

        if ($cpf[9] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--) {
            $soma += $cpf[$i] * $j;
        }

        $resto = $soma % 11;

        return $cpf[10] == ($resto < 2 ? 0 : 11 - $resto);
    }
}

?>