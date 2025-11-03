<?php

class CarrinhoController extends Controller {

    private $data = array();

    public function __construct(){
    }
    
    public function index()
	{
        $this->loadTemplateSite('Home/Carrinho/index', $this->data);
	}
}