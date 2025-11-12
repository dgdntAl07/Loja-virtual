<?php
class RelatoriosController extends Controller {
    
    private $data;
    private $relatorios;

    public function __construct(){
        $user = new Users();
		if (!$user->isLogged()) {
			header('Location: ' . BASE_URL . 'Login');
			exit;
		} else {
			$user->setLoggedUser();
			$this->data["name"] = $user->getName();
		}

        $this->relatorios = new Relatorios();
    }

    public function index()
    {
        $this->data['nivel-1'] = 'Relatorios';
        $this->loadTemplateAdmin("Admin/Relatorios/index", $this->data);
    }

    public function graficoProdutos(){

        $listaProdutos = $this->relatorios->pegarItens();
        
        foreach ($listaProdutos as $i => $produto){
            $listaProdutos[$i]['produtos'] = $produto->relatorios->
        }
    }
}