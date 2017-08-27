<?php
require_once('phpmailer/PHPMailerAutoload.php');
require_once('funcoes_uteis.php');

if (isset($_POST['usuario'])) {
    $email = $_POST['usuario'];

    conexao();

    $sql = "SELECT senha, nome, usuario FROM gede_usuarios WHERE e_mail='$email'";

    $result = mysql_query($sql);
    if ($result) {
        if (mysql_num_rows($result) > 0) {
            $res = mysql_fetch_row($result);

            $senha = $res[0];

            $nome = $res[1];

            $username = $res[2];

            //Cria uma nova instancia do phpmailer
            $mail = new PHPMailer;

            //usando SMTP
            $mail->isSMTP();

            //Seta o hostname do servidor de email
            $mail->Host = 'smtp.gmail.com';

            //Seta a porta do SMTP - 587 para TLS autenticado, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;

            //Seta o sistema de encriptação - ssl (deprecated) ou tls
            $mail->SMTPSecure = 'tls';

            //Usa SMTP authentication
            $mail->SMTPAuth = true;

            //Username para autenticação SMTP
            $mail->Username = "gedeproject@gmail.com";

            //Senha para autenticação SMTP
            $mail->Password = "procuradoria";

            //Seta o remetente
            $mail->setFrom('gedeproject@gmail.com', 'Sistema GEDE');

            //Seta o destinatario
            $mail->addAddress($email, $nome);

            //Seta o assunto
            $mail->Subject = 'Sistema GEDE: Recuperação de Senha';

            //Replace the plain text body with one created manually
            $mail->Body = "Nome do usuario: $username\n Senha: $senha";

            //send the message, check for errors
            if (!$mail->send()) {
                echo "Erro ao mandar o email: " . $mail->ErrorInfo;
            } else {
                echo "Sua senha foi enviada para o email informado.";
            }

            //echo "$email";
        } else {
            echo "O email informado não está cadastrado ou foi preenchido incorretamente.";
        }
    } else echo "Erro ao acessar o banco de dados. Tente mais tarde.";
}

 ?>
