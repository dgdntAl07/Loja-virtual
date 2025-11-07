<?php
class RelatoriosController extends Controller {
    
    private $data;
    public function __construct(){
        $user = new Users();
		if (!$user->isLogged()) {
			header('Location: ' . BASE_URL . 'Login');
			exit;
		} else {
			$user->setLoggedUser();
			$this->data["name"] = $user->getName();
		}
    }

    public function index()
    {
        $this->data['nivel-1'] = 'Relatorios';
        $this->loadTemplateAdmin("Admin/Relatorios/index", $this->data);

    }

}