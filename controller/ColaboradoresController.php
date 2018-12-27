<?php
class ColaboradoresController extends Controller{
    public function index(){
        $data = array();
        if(!empty($_SESSION['fwsp'])):

        else:
            header('Location: ' . HOME); 
        endif;  
        $this->renderTemplate('colaboradores', $data);
    }
}