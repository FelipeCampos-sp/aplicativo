<?php
class AuthController extends Controller{
    
    public function index(){
        $data = [];
        $user = new User;
        $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(isset($_POST['logon'])):
            if (isset($_POST['userMail']) && !empty($_POST['userMail'])):
                $userMail = strip_tags(trim($_POST['userMail']));
                $userPassword = strip_tags(trim($_POST['userPassword']));
                if ($user->getUserToAuth($userMail, $userPassword)):
                    header('Location: '. HOME . '/home'); 
                else:
                    // header('Location: '. HOME );
                    $data['error'] = "<div class=\"warning\">Verifique e-mail e senha !</div>";
                endif;
            endif;
        endif; 

          
            if (isset($POST['btn-cad'])):
                unset($POST['btn-cad']);
                $pass2 = $POST['userPassword2'] ;
                unset($POST['userPassword2']); 
                $POST['userPassword'] = md5($POST['userPassword']);
                $POST['userName'] = ucwords($POST['userName']);
                $POST['userImage'] = $_FILES['userImage'];
              
                if($POST['userImage']['name'] != ''):
                    $userAdd = $user->addUser($POST);
                    if ($userAdd == 1):
                        $data['error'] = "<div class=\"accept\">Dados cadastrado com sucesso !</div>"; 
                        // $data['error'] = "Cadastro realizado com sucesso !"; 
                    elseif($userAdd == 2):
                        $data['error'] = "<div class=\"warning\">E-mail já está cadastrado!</div>";
                        // $data['error'] = "Este e-mail já está cadastrado !";
                    endif;
                else:
                    $data['error'] = "<div class=\"warning\">Selecione uma imagem para enviar!</div>";
                endif;
                
            endif;
        $this->renderView('auth', $data);
    }   

    public function logout() {
        $user = new User;
        $user->logout();
        header("Location: ".HOME);
    }
}