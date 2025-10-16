<?php 
class ProdutosController extends Controller{
    
    private $data = array();

	public function __construct(){
		$user = new Users();
		if (!$user->isLogged()) {
			header('Location: '.BASE_URL.'Login');
			exit;
		}else{
			$user->setLoggedUser();
			$this->data["name"] = $user->getName();
		}
	}


    public function index(){

        $produtos = new Produtos();

		$this->data['nivel-1'] = 'Produtos';

        
        $this->data['produtos_list'] = $produtos->getAll();
        
        $this->loadTemplateAdmin('Admin/Produtos/index', $this->data);
    }
}