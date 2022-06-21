<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "escolauniversomagico@hotmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Você recebeu um email do Site.\n\n"."Aqui os Detalhes:\n\nNome: $name\n\n\nE-mail: $email\n\nAssunto: $m_subject\n\nMensagem: $message";
$header = "De: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
