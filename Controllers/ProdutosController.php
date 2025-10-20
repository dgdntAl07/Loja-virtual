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


		if (
			isset($_POST['nome_produto']) && !empty($_POST['nome_produto'] && isset($_POST['quantidade']) && !empty($_POST['quantidade']) && isset($_POST['descricao']) && !empty($_POST['descricao']) && isset($_POST['preco']) && !empty($_POST['preco']) )
		) {
			$nome_produto = addslashes(trim($_POST['nome_produto']));
			$quantidade = intval($_POST['quantidade']);
			$descricao = addslashes(trim($_POST['descricao']));
			$preco = floatval($_POST['preco']);
			$categoria = $_POST['categoria'];

			echo "O nome do produto é: $nome_produto"."<br/>";
			echo "A quantidade é: $quantidade"."<br/>";
			echo "A minha descrição é: $descricao"."<br/>";
			echo "Meu preço é: $preco"."<br/>";
			echo "A minha categoria é: $categoria";

			// Se a quantidade for igual a 0, a situação do protudo vai ser indisponivel
			if ($quantidade == 0){
				
			}
		} else {
			echo 'temos algum impessilho   :/';
		}
	}
}

