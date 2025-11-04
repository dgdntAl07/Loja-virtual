<?php 

class SiteController extends Controller{

    private $data = array();

	public function __construct(){
		
	}

    public function index(){
        
        $produtos = new Produtos();
    
        $this->data['produtos_list'] = $produtos->getAll();

        $this->data['CSS'] = customCSS('style');

        $this->loadTemplateSite('Home/index', $this->data);
    }
}