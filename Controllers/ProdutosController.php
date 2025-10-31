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
		$produtos = new Produtos();

		if (
<<<<<<< HEAD
			isset($_POST['nome_produto']) && !empty($_POST['nome_produto']) &&
			isset($_POST['quantidade']) && !empty($_POST['quantidade']) &&
			isset($_POST['descricao']) && !empty($_POST['descricao']) &&
			isset($_POST['preco']) && !empty($_POST['preco'])
		) {
			$nome_produto = addslashes(trim($_POST['nome_produto']));
			$quantidade   = intval($_POST['quantidade']);
			$descricao    = addslashes(trim($_POST['descricao']));
			$preco        = $_POST['preco'];
			$categoria    = $_POST['categoria'];

			// Pega o último ID (para criar pasta enumerada)
			$ultimo = $produtos->getId();
			$id = isset($ultimo['id']) ? $ultimo['id'] + 1 : 1;

			// Pasta de destino
			$folder = 'Assets/Uploads/Produtos/' . $id . '/';
			$upload = '';

			// Se foi enviada imagem
			if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
				$file = $_FILES['imagem'];
				$upload = uploaded_file($file, $folder);
			}

			// echo "<pre>";
			// var_dump($upload);
			// exit;

			$produtos->adicionarProdutos(
				$nome_produto,
				$descricao,
				$quantidade,
				$preco,
				$categoria,
				$upload
			);

			redirect('Produtos');
			exit;
=======
			isset($_POST['nome_produto']) && !empty($_POST['nome_produto'])
			&& isset($_POST['quantidade']) && !empty($_POST['quantidade'])
			&& isset($_POST['descricao']) && !empty($_POST['descricao'])
			&& isset($_POST['preco']) && !empty($_POST['preco'])
			&& isset($_GET['id']) && !empty($_GET['id'])
		) {
			$nome_produto = addslashes(trim($_POST['nome_produto']));
			$quantidade = intval($_POST['quantidade']);
			$descricao = addslashes(trim($_POST['descricao']));
			$preco = $_POST['preco'];
			$categoria = $_POST['categoria'];
			$id = intval($_GET['id']);

			if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])){
				$folder = 'Assets/uploads/imagem/'. $id . "/";
				$file = $_FILES['imagem'];

				$upload = uploaded_file($file, $folder);

				if($upload !== false){
					$produtos->adicionarProdutos($nome_produto, $descricao, $quantidade, $preco, $categoria, $upload);
				} else {
					$upload = '';
				}
			}
			
>>>>>>> 41b1db8a17efab09f9ac30aefa7c24913b349779
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
		 * criar o array
		 * Fazer um if pra cada e colocar em um array
		 * passa o array e o id 
		 * o array pega o que foi enviado para alterar
		 */

		// Pega o id como parametro principal
		if (isset($_POST['id_produto_edit']) && !empty($_POST['id_produto_edit'])) {

			$id = intval($_POST['id_produto_edit']);

			// Monta um array só com os campos que foram enviados
			$dados = [];

			if (!empty(trim($_POST['nome_produto_edit'] ?? ''))) {
				$dados['nome_produto'] = addslashes(trim($_POST['nome_produto_edit']));
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

			if (empty($dados)) {
				echo "Nenhum campo foi alterado.";
				exit;
			}

			$produtos->atualizarProdutos($id, $dados);
			redirect('Produtos');
			exit;
		} else {
			echo "ID do produtos$produtos não informado.";
		}
	}
}
