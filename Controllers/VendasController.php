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

		// $vendas = [
		// 	[
		// 		'id' => 1,
		// 		'data' => date('d/m/Y H:i'),
		// 		'value' => 100.00
		// 	]
		// ];

		$lista = $vendas->pegarVendas();

		//$vendas = 'SELECT * FROM vendas';

		foreach ($lista as $i => $venda) {
			// $vendas[$i]['items'] = [
			// 	[
			// 	'id' => 1,
			// 	'id_venda' => 1,
			// 	'id_produto' => 1,
			// 	'value' => 10,
			// 	'qtd' => 1
			// 	],	
			// 	[
			// 	'id' => 2,
			// 	'id_venda' => 1,
			// 	'id_produto' => 2,
			// 	'value' => 15,
			// 	'qtd' => 6
			// 	]
			// ];
			
			$lista[$i]['itens'] = ;
			//$vendas[$i]['items'] = "SELECT * FROM vendas_itens WHERE id_venda = $venda['id_venda']";
		}

		echo '<pre>';
		var_dump($vendas);
		exit;

		$this->data['produtos_vendidos'] = $vendas->pegarVendas();

        $this->loadTemplateAdmin('Admin/Vendas/index', $this->data);
    }
}