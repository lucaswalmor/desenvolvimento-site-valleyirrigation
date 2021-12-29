<?php
    $ky = '767c616eb4111914324cde11d692a7cc';
    $iv  = 'f40cad0f4f43886e';
    $token_generated = "";

    // Parameter to simulate token expired
    $utc = time();
    if (isset($_POST['tokenexpired']) && ($_POST['tokenexpired'])) {
        $utc = strtotime("-2 hours");
    }

    //$ID_Equipment = "primesa010034"; 
    //$ID_Equipment = "123456"; 
    //$User_Name = "BEVAP";

    if (isset($_POST['iddevice']) && isset($_POST['username'])) {
        $ID_Equipment = $_POST['iddevice'];
        $User_Name = $_POST['username'];
    
        $token_generated = generate_token($User_Name, $ID_Equipment, $ky, $iv, $utc);    
    }


    function generate_token($username, $code, $ky, $iv, $utc) {
        //$utc = time();
        //$utc = strtotime("-2 hours"); // simulate expire

        $text = $username . "," . $code . "," . $utc;
        $etext = encryptRJ256($ky, $iv, $text);
    
        $strippedetext = str_replace("+", "-", $etext);
        $strippedetext = str_replace("/", "_", $strippedetext);
        $strippedetext = str_replace("=", "%3D", $strippedetext);
    
        return $strippedetext;
    }
    
    function encryptRJ256($key, $iv, $string_to_encrypt) {
        //$rtn = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string_to_encrypt, MCRYPT_MODE_CBC, $iv);
        $rtn = openssl_encrypt($string_to_encrypt, "AES-256-CBC", $key, OPENSSL_RAW_DATA, $iv);
        $rtn = base64_encode($rtn);
        return($rtn);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>API Client</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Generate TOKEN</h1>
        <hr>
        <form name="formulario" action="api_client.php" method="post" enctype = "multipart/form-data">
            <label for="tokenexpired">Token Expired?</label>
            <select name="tokenexpired">
                <option value="1">Yes</option><option value="0" selected>No</option>
            </select>
            <br>
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" value="BEVAP" size="50" >
            <br>
            <label for="iddevice">ID Device</label>
            <input type="text" name="iddevice" id="iddevice" value="primesa010034" size="50" >
            <br><br>
            <input type="submit" value="Generate">
        </form>
        <hr>
        <?php if (isset($_POST['iddevice']) && isset($_POST['username'])) { ?>
        <form name="formulario" action="api_server2.php" method="post" enctype = "multipart/form-data">
        <label for="username">User Name</label>
            <input type="hidden" name="username" value="<?=$User_Name?>" >
            <input type="hidden" name="iddevice" value="<?=$ID_Equipment?>" >
            <label for="token_generated">Token Generated</label>
            <input type="text" name="token_generated" id="token_generated" value="<?=$token_generated;?>" size="200" >
            <br><br>
            <input type="submit" value="Send">
        </form>
        <?php } ?>
    </body>
</html>