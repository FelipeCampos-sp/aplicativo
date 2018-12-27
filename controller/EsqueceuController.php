<?php

use PHPMailer\PHPMailer\PHPMailer;
class EsqueceuController extends Controller{
    public function index(){
        $data = [];
        $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        // require 'libs/PHPMailer/Exception.php';
        // require 'libs/PHPMailer/PHPMailer.php';
        // require 'libs/PHPMailer/SMTP.php';
            $user = new User;
            if(isset($POST['enviar'])):
            if(in_array('', $POST)):
                $data['error'] = "<div class=\"warning\">Preencha o campo e-mail!</div>";
            else:
                $mail = strip_tags(trim($POST['userMail']));
                $mailOk = $user->getUserToMail($mail);
                
                if($mailOk):
                    // $data['error'] = "<div class=\"accept\">Encontramos!</div>";
                    foreach($mailOk as $email):
                        $id = $email['id'];
                        $mail = $email['userMail'];
                    endforeach;
                    $codVerify= substr( md5( rand(1, 999999) ), 0, 7 );
                    $userCod = ['userCode' => $codVerify, 'id' => $id];
                    $user->userUpdateCode($userCod);
                    // enviar email aqui
                    $mrec = base64_encode($mail);
                    $linkRec = HOME . "/recupera&m={$mrec}&c={$codVerify}";
                    $BodyMail = "
                        <p>Olá {$mail}, você está recebendo esse e-mail por ter solicitado recuperação de senha.</p>
                        <p>Caso não tenha solicitado desculpe-nos pelo incômodo !</p>
                        <p>Segue código para liberação :</p>
                        <p>Código: <strong>{$codVerify}</strong></p>
                        <p>Clique no link abaixo, você será redirecionado para a página, onde deve digitar o código de liberação .</p>
                        <p><a title='Recuperar Minha Senha' href='{$linkRec}'>Recupere sua senha , <strong>clicando aqui!</strong></a></p>
                        <p><i>Atenciosamente, Felipe Design Web!</i></p>
                        ";
                        $mailUser = new PHPMailer(true);

                        try{
                            // $mailUser->SMTPDebug = 2;                                 
                            $mailUser->isSMTP(); 
                            $mailUser->Host = MAILERHOST; 
                            $mailUser->SMTPAuth = true;       
                            $mailUser->Username = MAILERUSER; 
                            $mailUser->Password = MAILERPASS;
                            $mailUser->SMTPSecure = 'tls';
                            $mailUser->Port = MAILERPORT; 
                            $mailUser->setFrom(MAILERUSER);
                            $mailUser->addAddress($mail);
                            $mailUser->isHTML(true); 
                            $mailUser->Subject = 'App Felipe';
                            $mailUser->Body    = $BodyMail;
                            $mailUser->send();
                            $data['error'] = "<div class=\"accept\">E-mail enviado com sucesso!, $mailUser->ErrorInfo</div>";
                        }catch (Exception $e){
                        
                            $data['error'] = "<div class=\"warning\">Não foi  possível enviar e-mail!, $mailUser->ErrorInfo</div>";
                        }
                else:
                    $data['error'] = "<div class=\"warning\">Não localizamos seu e-mail!</div>";
                endif;
            endif;
        endif;
    
        $this->renderTemplate('esqueceu', $data);
    }
}
