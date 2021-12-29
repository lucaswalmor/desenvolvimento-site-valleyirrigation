<?php
$ky = '767c616eb4111914324cde11d692a7cc'; //md5("B3v@p0538-V4lm0nt8350")
//$iv = 'f40cad0f4f43886ed4711b41115674f3'; //md5("V4lm0nt8350-B3v@p0538")
$iv  = 'f40cad0f4f43886e';//'d4711b41115674f3';

function generate_token($username, $code, $ky, $iv) {
    $utc = time();
    $text = $username . "," . $code . "," . $utc;
    $etext = encryptRJ256($ky, $iv, $text);

    $strippedetext = str_replace("+", "-", $etext);
    $strippedetext = str_replace("/", "_", $strippedetext);
    $strippedetext = str_replace("=", "%3D", $strippedetext);

    return $strippedetext;
}

function decrypt_token($token, $ky, $iv) {

    $token = str_replace("-", "+", $token);
    $token = str_replace("_", "/", $token);
    $token = str_replace("%3D", "=", $token);

    $dtext = decryptRJ256($ky, $iv, $token);

    return explode(",", $dtext);
}

function decryptRJ256($key, $iv, $string_to_decrypt) {
    $string_to_decrypt = base64_decode($string_to_decrypt);
    $rtn = openssl_decrypt($string_to_decrypt, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
    //$rtn = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_decrypt, MCRYPT_MODE_CBC, $iv);
    $rtn = rtrim($rtn, "\0\4");
    return($rtn);
}

function encryptRJ256($key, $iv, $string_to_encrypt) {
    //$rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_encrypt, MCRYPT_MODE_CBC, $iv);
    $rtn = openssl_encrypt($string_to_encrypt, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
    $rtn = base64_encode($rtn);
    return($rtn);
}

$ID_Equipment = "primesa010052"; 
$User_Name = "BEVAP";

$token_client = $_POST['token_generated'];
$decrypt_token_client = decrypt_token($token_client,$ky,$iv);

if ($decrypt_token_client[0] == $User_Name && $decrypt_token_client[1] == $ID_Equipment) {
    echo "<h2>Sucessfull!! </h2>";
} else {
    echo "<h2>It's Bad!! </h2>";
}

?>