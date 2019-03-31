<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );


$telefono = $_POST["telefono"];
$nombre=$_POST["nombre"];
$html=$_POST["texto"];
$text=$_POST["texto"];
$from=$_POST["email"];



 $url = 'https://api.sendgrid.com/';
 $user = 'azure_69279a85939cf86a462abdafe6807e80@azure.com';
 $pass = 'cr15t1an';

 $params = array(
      'api_user' => $user,
      'api_key' => $pass,
      'to' => 'transporteponscba@gmail.com',
      'subject' => 'Consulta desde www.transportegruaspons.com',
      'html' => ''.$text.'',
      'text' => ''.$nombre.'',
      'from' => ''.$from.'',
   );

 $request = $url.'api/mail.send.json';

 // Generate curl request
 $session = curl_init($request);

 // Tell curl to use HTTP POST
 curl_setopt ($session, CURLOPT_POST, true);

 // Tell curl that this is the body of the POST
 curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

 // Tell curl not to return headers, but do return the respons
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

 // obtain response
 $response = curl_exec($session);
 curl_close($session);

 // print everything out
 print_r($response);



 echo "La consulta ha sido enviada ".$nombre.", te estaremos respondiendo lo mas pronto posible.";
 