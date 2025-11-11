<?php

class CarrinhoController extends Controller
{
    public function index(){
        $data = array();
        $this->loadView("Cadastro/index", $data);
    }
}
