<?php

class CarrinhoController extends Controller
{
    private $data = array();
    private $produtos;

    public function __construct()
    {
        $this->produtos = new Produtos();
    }

    public function index()
    {
        $dados['carrinho'] = $_SESSION['carrinho'] ?? [];
        $this->loadTemplateSite("Home/Carrinho/index", $dados);
    }

    public function adicionar()
    {
        $produtoId = $_POST['produto_id'];
        $produto = $this->produtos->buscarPorId($produtoId);

        if (!isset($_SESSION['carrinho']))
            $_SESSION['carrinho'] = [];

        $encontrado = false;
        foreach ($_SESSION['carrinho'] as &$item) {
            if ($item['id'] == $produto['id']) {
                $item['quantidade']++;
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            $_SESSION['carrinho'][] = [
                'id' => $produto['id'],
                'nome' => $produto['nome_produto'],
                'preco' => $produto['preco'],
                'quantidade' => 1
            ];
        }

        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function removercarrinho()
    {
        $produtoId = $_POST['id_rmv_produto'];

        if ($produtoId && isset($_SESSION['carrinho'])) {
            foreach($_SESSION['carrinho'] as $index => $item) {
                unset($_SESSION['carrinho'][$index]);
                break;
            }

            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            
        }
        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function subQuantCarrinho()
    {
        $produtoId = $_POST['produto_id'];

        if ($produtoId && isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $index => $item) {
                if ($item['id'] == $produtoId) {
                    if ($item['quantidade'] > 1) {
                        $item['quantidade']--;
                    } 
                    break;
                }
            }

            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }

        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function limparcarrinho()
    {
        $produtoId = $_POST['id_rmv_produto'];

        if ($produtoId && isset($_SESSION['carrinho'])) {
            foreach($_SESSION['carrinho'] as $index => $item) {
                unset($_SESSION['carrinho'][$index]);
            }

            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
            
        }
        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function finalizarCompra()
    {

    }
}
