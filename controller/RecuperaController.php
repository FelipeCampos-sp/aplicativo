<?php
class RecuperaController extends Controller{
    public function index(){
        $data = [];
        $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $user = new User;
            if(isset($POST['recuperar'])):
                if(in_array('', $POST)):
                    $data['error'] = "<div class=\"warning\">Preencha o campo senha !</div>";
                else:
                    $dataDB = $user->getIdFromMail($POST['userMail']);
                    foreach($dataDB as $db):
                        $id = $db['id'];
                        $userCode = $db['userCode'];
                    endforeach;
                    $POST['userPassword'] = strip_tags(trim($POST['userPassword']));
                    $upData = ['id' => $id, 'userPassword' => $POST['userPassword'], 'userCode' => ''];
                    if($POST['userCode'] == $userCode):
                        if($user->userUpdatePass($upData)):
                            $data['error'] = "<div class=\"accept\">Senha alterada com sucesso !</div>";
                        else:
                            $data['error'] = "<div class=\"warning\">Não foi possível alterar !</div>";
                        endif;
                    else:
                        $data['error'] = "<div class=\"warning\">Verifique o código enviado para o seu e-mail !</div>";
                    endif;
                endif;
            endif;
        
        $this->renderTemplate('recupera', $data);
    }
}