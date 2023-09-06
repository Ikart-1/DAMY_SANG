<?php
require_once '../vendor/autoload.php';

    use Nexmo\Client;
    use Nexmo\Client\Credentials\Basic;
if (isset($_POST['submit'])) {
    // Récupérer les valeurs du formulaire
    $numero = $_POST['numero'];
    $message = $_POST['message'];

    


    // Inclure l'autoloader de Composer


// Instancier le client Nexmo avec vos informations d'identification
$basic = new Basic('3b95f2df', 'OZkJv211nboxcARK');
$client = new Client($basic);

// Envoyer le SMS
$response = $client->message()->send([
    'to' => $numero,
    'from' => '+212707430485',
    'text' => $message
]);

// Vérifier la réponse
if ($response['messages'][0]['status'] == 0) {
    echo "Le SMS a été envoyé avec succès.\n";
} else {
    echo "Une erreur s'est produite lors de l'envoi du SMS: " . $response['messages'][0]['error-text'] . "\n";
}


    
    // // method send puls
    // // Inclure la bibliothèque SendPulse
    // require_once './sendpulse-rest-api-php-master/src/ApiClient.php';

    // // Configurer les informations d'authentification
    // define('API_USER_ID', '237b4af9c99d0f89bdbd876dcd5a0000');
    // define('API_SECRET', 'a99e7d506d3701c5c04de3db1913eeee');
    // define('TOKEN_STORAGE', 'file');

    // // Créer une instance de SendPulse
    // $SPApiProxy = new \Sendpulse\RestApi\ApiClient(API_USER_ID, API_SECRET, TOKEN_STORAGE);

    // // Envoyer le SMS
    // $result = $SPApiProxy->sendSmsByBook($numero, $message);

    // // Vérifier le résultat de l'envoi
    // if ($result['result'] === true) {
    //     echo "SMS envoyé avec succès !";
    // } else {
    //     echo "Erreur lors de l'envoi du SMS : " . $result['message'];
    // }




  //   // method text local
	// $apiKey = urlencode('NjM3ODRmNjI1OTYyNDY1MzQ1NjczMjZiNzg2ZTM4NDg=');

	// $numbers = array($numero);
	// $sender = urlencode('Jims Autos');
	// $message = rawurlencode($message);
  // $numbers = implode(',', $numbers);
  // $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
  // $ch = curl_init('https://api.txtlocal.com/send/');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $response = curl_exec($ch);
	// curl_close($ch);
	// echo $response;
}
?>
