<?php
class LocalizacaoController extends Controller{
    public function index(){
        $data = [];

        if(!empty($_SESSION['fwsp'])):

        else:
            header('Location: ' . HOME); 
        endif; 
        $this->renderTemplate('localizacao', $data);
    }
}