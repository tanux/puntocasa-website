<?php
$nome      =  trim($_GET['nome']);
$telefono  =  trim($_GET['telefono']);
$email     =  trim($_GET['email']);
$messaggio =  trim(htmlspecialchars($_GET['messaggio']));

$oggetto = "Messaggio inviato da www.puntocasasperanza.it";
$headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: '.$email;

$message =  "<html>
                <head>
                    <title> $oggetto </title>
                </head>
            <body>
                Un utente ha inviato un messaggio usando la pagina Contatti del sito.
                <p>----------------------------------------</p>
                <u><b>Dati Utente</b></u><br />
                <b>Nome e Cognome:</b> $nome <br />
                <b>Recapito Telefonico:</b> $telefono<br />
                <b>Email:</b> $email<br />
                <p>----------------------------------------</p>
                <b>Testo del messaggio:</b><br />$messaggio
            </body>
            </html>";
$message = str_replace("\\", "",$message);
$destinatario = "espositogaetano87@gmail.com";

$arrayToJs = array();
if (mail($destinatario,$oggetto,$message,$headers))
  $arrayToJs[0] = true;
else
  $arrayToJs[0] = false;

echo json_encode($arrayToJs);

?>
