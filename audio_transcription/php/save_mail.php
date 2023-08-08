<?php
// Inclui o arquivo class.phpmailer.php localizado na mesma pasta do arquivo php 
include "../PHPMailer-master/PHPMailerAutoload.php"; 

// Inicia a classe PHPMailer 
$mail = new PHPMailer(); 

// Método de envio 
$mail->IsSMTP(); 

// Enviar por SMTP 
$mail->Host = "smtp.office365.com"; 

// Você pode alterar este parametro para o endereço de SMTP do seu provedor 
$mail->Port = 587; 


// Usar autenticação SMTP (obrigatório) 
$mail->SMTPAuth = true; 

// Usuário do servidor SMTP (endereço de email) 
// obs: Use a mesma senha da sua conta de email 
$mail->Username = 'paiva.dev@outlook.com'; 
$mail->Password = '*****************'; 

// Configurações de compatibilidade para autenticação em TLS 
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 

// Você pode habilitar esta opção caso tenha problemas. Assim pode identificar mensagens de erro.
 $mail->SMTPDebug = 2; 

// Define o remetente 
// Seu e-mail 
$mail->From = "paiva.dev@outlook.com"; 

// Seu nome 
$mail->FromName = "Rian Paiva"; 

// Define o(s) destinatário(s) 
$mail->AddAddress('rianpaiva0@gmail.com', 'Rian Paiva'); 

// Opcional: mais de um destinatário
// $mail->AddAddress('rianpaiva0@gmail.com'); 

// Opcionais: CC e BCC
// $mail->AddCC('joana@provedor.com', 'Joana'); 
// $mail->AddBCC('roberto@gmail.com', 'Roberto'); 

// Definir se o e-mail é em formato HTML ou texto plano 
// Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
$mail->IsHTML(true); 

// Charset (opcional) 
$mail->CharSet = 'UTF-8'; 

// Assunto da mensagem 
$mail->Subject = "Desafio E-lastic - Analista de
Integração de Dados"; 


 $mensagem = 'Esta mensagem foi enviada usando uma aplicação php! </br>' .$_POST["message"] . '
 </br>Repositório do Github: https://github.com/RianPaiva/voice_recognition'; 
// Corpo do email 
$mail->Body =  $mensagem;

// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
if ($enviado) 
{ 
    


    $con = mysqli_connect("localhost", "root", "", "db_voice");

    // Verifica a conexão com o banco de dados
    if (!$con) {
        die("Falha na conexão: " . mysqli_connect_error());
    } else {
        // Escapa a mensagem para evitar SQL Injection
        $mensagem = mysqli_real_escape_string($con, $mensagem);

        // Cria a consulta SQL para inserir a mensagem no banco de dados
        $sql = "INSERT INTO tb_messages (message) VALUES ('".$mensagem."')";

        // Executa a consulta SQL
        if (mysqli_query($con, $sql)) {
            echo "Mensagem inserida com sucesso!";
        } else {
            echo "Erro ao inserir a mensagem: " . mysqli_error($con);
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($con);
    }



} else { 
   $sql = "INSERT INTO tb_messages(message) VALUES('" . $_POST["message"]  ."')";
   mysqli_query($con, $sql);

} 


?>