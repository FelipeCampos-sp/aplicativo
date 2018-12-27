<?php
class ParceirosController extends Controller{
    public function index(){
        $data = array();
        if(!empty($_SESSION['fwsp'])):

        else:
            header('Location: ' . HOME); 
        endif; 
        $this->renderTemplate('parceiros', $data);
    }
}   