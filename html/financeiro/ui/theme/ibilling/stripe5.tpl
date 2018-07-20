<?php
 
require __DIR__.'/../../vendor/autoload.php'; // caminho relacionado a SDK
 
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;
 
$clientId = 'Client_Id_42c982015c003ebf17195d593e7111b7ccb37b26'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_bc4ae39f55ffea8e982bac135cd6f90e0450c61c'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
 
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];
 
// $charge_id refere-se ao ID da transação gerada anteriormente
$params = [
  'id' => $charge_id
];
 
$customer = [
  'name' => 'Gorbadoc Oldbuck', // nome do cliente
  'cpf' => '94271564656' , // cpf válido do cliente
  'phone_number' => '5144916523' // telefone do cliente
];
 
$bankingBillet = [
  'expire_at' => '2018-12-12', // data de vencimento do boleto (formato: YYYY-MM-DD)
  'customer' => $customer
];
 
$payment = [
  'banking_billet' => $bankingBillet // forma de pagamento (banking_billet = boleto)
];
 
$body = [
  'payment' => $payment
];
 
try {
    $api = new Gerencianet($options);
    $charge = $api->payCharge($params, $body);
 
    print_r($charge);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}