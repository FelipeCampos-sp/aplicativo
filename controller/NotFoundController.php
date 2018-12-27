<?php
class NotFoundController extends Controller{
    public function index(){
        $data = [];
        $this->renderTemplate('404', $data);
    } 
}