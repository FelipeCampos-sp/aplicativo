<?php
class DescarteController extends Controller{
    public function index(){
        $data = array();
        if(!empty($_SESSION['fwsp'])):
            $descarte = new Descarte;
            $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
            if(isset($POST['finalizar'])):
                unset($POST['finalizar']);
                $POST['descarteCEP'] = strip_tags(trim($POST['descarteCEP']));
                $POST['descarteRua'] = strip_tags(trim($POST['descarteRua']));
                $POST['descarteNumero'] = strip_tags(trim($POST['descarteNumero']));
                $POST['descarteBairro'] = strip_tags(trim($POST['descarteBairro']));
                $POST['descarteCidade'] = strip_tags(trim($POST['descarteCidade']));
                $POST['descarteUF'] = strip_tags(trim($POST['descarteUF']));
                $POST['descarteIBGE'] = strip_tags(trim($POST['descarteIBGE']));
                $POST['descarteDataColeta'] = date('Y-m-d H:i:s');
                if($descarte->addCollectionPoints($POST)):
                    $data['error'] = "<div class=\"accept\">Cadastrado com sucesso !</div>"; 
                else:
                    $data['error'] = "<div class=\"warning\">Não foi possível cadastrar!</div>";
                endif;
               
            endif;
        else:
            header('Location: ' . HOME); 
        endif; 
        $this->renderTemplate('descarte', $data);
    }
}