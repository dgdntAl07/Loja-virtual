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

		$lista = $vendas->pegarVendas();

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
			
			$lista[$i]['items'] = $vendas->pegarItens($venda['id']);
		}

		$this->data['vendas'] = $lista;
        $this->loadTemplateAdmin('Admin/Vendas/index', $this->data);
    }

	public function excluirVenda(){

		$vendas = new Vendas();

		 if (isset($_POST['id_produto_venda']) && !empty($_POST['id_produto_venda'])) {
            $id = intval($_POST['id_produto_venda']);
            $vendas->deletarVenda($id);
        }
        redirect('Vendas');
	}
}