<?php
class VendasController extends Controller {

    private $data = array();
    public function __construct()
	{
		$user = new Users();
		if (!$user->isLogged()) {
			header('Location: ' . BASE_URL . 'Login');
			exit;
		} else {
			$user->setLoggedUser();
			$this->data["name"] = $user->getName();
		}
	}

    public function index(){

        $vendas = new Vendas();

        $this->data['nivel-1'] = 'Vendas';
        $this->loadTemplateAdmin('Admin/Vendas/index', $this->data);
    }
}