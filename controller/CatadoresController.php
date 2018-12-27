<?php
class CatadoresController extends Controller{
    public function index(){
        $data = [];
        $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($_SESSION['fwsp'])):
            $catador = new Catador;
                if (isset($POST['btn-catador'])):
                    unset($POST['btn-catador']);
                    $POST['catadorNome'] = strip_tags(trim($POST['catadorNome']));
                    $POST['catadorApelido'] = strip_tags(trim($POST['catadorApelido']));
                    $POST['catadorNome'] = ucwords($POST['catadorNome']);
                    $POST['catadorApelido'] = ucwords($POST['catadorApelido']);
                    
                    $POST['catadorCEP'] = strip_tags(trim($POST['catadorCEP']));
                    $POST['catadorEndereco'] = strip_tags(trim($POST['catadorEndereco']));
                    $POST['catadorNum'] = strip_tags(trim($POST['catadorNum']));
                    $POST['catadorBairro'] = strip_tags(trim($POST['catadorBairro']));
                    $POST['catadorCidade'] = strip_tags(trim($POST['catadorCidade']));
                    $POST['catadorUF'] = strip_tags(trim($POST['catadorUF']));

                    $POST['catadorImagem'] = $_FILES['catadorImagem'];
                    if($POST['catadorImagem']['name'] != ''):
                        $cat = $catador->addCatador($POST);
                        if ($cat == 1):
                            $data['error'] = "<div class=\"accept\">Catador cadastrado com sucesso !</div>"; 
                        elseif($cat == 2):
                            $data['error'] = "<div class=\"warning\">Catador já está cadastrado!</div>";
                        endif;
                    else:
                        $data['error'] = "<div class=\"warning\">Selecione uma imagem para enviar!</div>";
                    endif;
                endif;
        else:
            header('Location: ' . HOME); 
        endif;       
        $this->renderTemplate('catadores', $data);
    }
}