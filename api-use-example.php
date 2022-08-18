<?php
header('Content-Type: application/json');

include('traccarApi.php');
/*
$a = gps::server();
echo $response = $a->response;
echo $responseCode = $a->responseCode;
*/

$a = gps::loginAdmin();

if($a->responseCode=='200') {
    $sessionId = gps :: $cookie;
    $id = "0";

    $usuarios = gps::users($sessionId,$id);
    //$c = gps::userAdd($sessionId,'NISSAN2','rigo2@gmail.com','rigo','{}');
    $response = $usuarios->response;
    $decoded_json = json_decode($response, true);

    foreach ($decoded_json as $value) {
        //
        //print ($cadena);
        
        if ($value['name']=="Lupita Preciado"){

            $cadena = "Cuenta es: '". $value['deviceReadonly'] ."', su Correo: ". $value['email'] ." y su Telefono '". $value['token'] ."'";
            echo $cadena;
            //echo $value['name'];
            //echo $value['email'];
            //echo $value['phone'];

        }else{


        }
     }
    
    //echo $response = $usuarios->responseCode;

}else{
 echo 'Incorrect email address or password';
}

?>