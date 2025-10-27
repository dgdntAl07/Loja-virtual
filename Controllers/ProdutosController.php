<?php
class ProdutosController extends Controller
{

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

	/**
	 * Summary of index - list products
	 * @return void
	 */
	public function index()
	{

		$produtos = new Produtos();

		$this->data['nivel-1'] = 'Produtos';
		$this->data['produtos_list'] = $produtos->getAll();


		$this->loadTemplateAdmin("Admin/Produtos/index", $this->data);
	}

	/**
	 * Summary of create - add product
	 * @return void
	 */
	public function create()
	{
		/** 
		 * 01º VERIFICA OS CAMPOS NO IF
		 * 02º RECEBE EM VARIAVEIS
		 * 03º SALVA NO BANCO DE DADOS
		 */

		$produtos = new Produtos();

		// Adicionando produtos
		if (
			isset($_POST['nome_produto']) && !empty($_POST['nome_produto'])
			&& isset($_POST['quantidade']) && !empty($_POST['quantidade'])
			&& isset($_POST['descricao']) && !empty($_POST['descricao'])
			&& isset($_POST['preco']) && !empty($_POST['preco'])
			&& isset($_POST['situacao']) && !empty($_POST['situacao'])
		) {
			$nome_produto = addslashes(trim($_POST['nome_produto']));
			$quantidade = intval($_POST['quantidade']);
			$descricao = addslashes(trim($_POST['descricao']));
			$preco = floatval($_POST['preco']);
			$categoria = $_POST['categoria'];
			$situacao = $_POST['situacao'];

			$produtos->adicionarProdutos($nome_produto, $descricao, $quantidade, $preco, $categoria, $situacao);

		}

		redirect('Produtos');
		exit;
	}

	public function editProduto()
	{
		$produtos = new Produtos();

		/**
		 * 
		 * 01º receber os campos no controller
		 * 02º alterar no banco de dados
		 * 03º retornar para a view
		 * 
		 * pega o id como parametro principal
		 * cria o array
		 * Fazer um if pra cada e colocar em um array
		 * passa o array e o id 
		 * o array pega o que foi enviado para alterar
		 */


		
		// Editar produtos
		// if (
		// 	isset($_POST['id_produto_edit']) && !empty($_POST['id_produto_edit'])
		// 	&& isset($_POST['nome_produto_edit']) && !empty($_POST['nome_produto_edit'])
		// 	&& isset($_POST['descricao_edit']) && !empty($_POST['descricao_edit'])
		// 	&& isset($_POST['quantidade_edit']) && !empty($_POST['quantidade_edit'])
		// 	&& isset($_POST['categoria_edit']) && !empty($_POST['categoria_edit'])
		// 	&& isset($_POST['preco_edit']) && !empty($_POST['preco_edit'])
		// 	&& isset($_POST['situacao_edit']) && !empty($_POST['situacao_edit'])
		// ) {
		// 	$id = addslashes($_POST['id_produto_edit']);
		// 	$nome_produto_edit = addslashes($_POST['nome_produto_edit']);
		// 	$descricao_edit = addslashes(trim($_POST['descricao_edit']));
		// 	$quantidade_edit = intval($_POST['quantidade_edit']);
		// 	$categoria_edit = $_POST['categoria_edit'];
		// 	$preco_edit = floatval($_POST['preco_edit']);
		// 	$situacao_edit = $_POST['situacao_edit'];

		// 	if (empty(trim($nome_produto_edit))) {
		// 		echo 'Não é possivel inserir espaços em brancos';
		// 	} else {
		// 		$produtos->atualizarProdutos(
		// 			$nome_produto_edit,
		// 			$descricao_edit,
		// 			$quantidade_edit,
		// 			$categoria_edit,
		// 			$preco_edit,
		// 			$situacao_edit,
		// 			$id
		// 		);

		// 	}

		// 	exit;
		// } else {
		// 	echo "Algo de errado";
		// }

		if (isset($_POST['id_produto_edit']) && !empty($_POST['id_produto_edit'])) {

			$id = intval($_POST['id_produto_edit']);

			// Monta um array só com os campos que foram enviados
			$dados = [];

			if (!empty(trim($_POST['nome_produto_edit'] ?? ''))) {
				$dados['nome'] = addslashes(trim($_POST['nome_produto_edit']));
			}

			if (!empty(trim($_POST['descricao_edit'] ?? ''))) {
				$dados['descricao'] = addslashes(trim($_POST['descricao_edit']));
			}

			if (!empty($_POST['quantidade_edit'] ?? '')) {
				$dados['quantidade'] = intval($_POST['quantidade_edit']);
			}

			if (!empty($_POST['categoria_edit'] ?? '')) {
				$dados['categoria'] = $_POST['categoria_edit'];
			}

			if (!empty($_POST['preco_edit'] ?? '')) {
				$dados['preco'] = floatval($_POST['preco_edit']);
			}

			if (!empty($_POST['situacao_edit'] ?? '')) {
				$dados['situacao'] = $_POST['situacao_edit'];
			}

			if (empty($dados)) {
				echo "Nenhum campo foi alterado.";
				exit;
			}

			$produtos->atualizarProdutos($id, $dados);
			redirect('Produtos');
			exit;

		} else {
			echo "ID do produto não informado.";
		}

	}

	// public function situacaoProdutos()
	// {
	// 	$produto = new Produtos();

	// 	if (!empty($_GET['id'])) {
	// 		$id = intval($_GET['id']);

	// 		if (isset($_GET['situacao']) && !empty($_GET['situacao'])) {
	// 			$situacao = addslashes($_GET['situacao']);

	// 			if ($situacao == 'Disponivel') {
	// 				$situacao = 1;
	// 			} else {
	// 				$situacao = 0;
	// 			}

	// 			$produto->situacaoProduto($situacao, $id);
	// 		}
	// 	}
	// }


}

