<?php 

class LixeiraController extends Controller{


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

        $this->data['nivel-1'] = 'Lixeira';
        $this->data['produtos_lixeira'] = $produtos->situacaoProduto();
        
        $this->loadTemplateAdmin('Lixeira/index', $this->data);

        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            $produtos->atualizarSituacaoProduto($id);
        }

        header('Location: BASE_URL . "Lixeira"');
        exit;

    }
}