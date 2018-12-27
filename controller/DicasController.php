<?php
class DicasController extends Controller{
    public function index(){
        $data = array();
        if(!empty($_SESSION['fwsp'])):

        else:
            header('Location: ' . HOME); 
        endif; 
        $this->renderTemplate('dicas', $data);
    }
}