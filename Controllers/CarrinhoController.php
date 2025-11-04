<?php

class CarrinhoController extends Controller
{
    private $produtos;

    public function __construct()
    {
        $this->produtos = new Produtos();
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
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => 1
            ];
        }

        require ('BASE_URL . "/Carrinho"');
        exit;
    }

    public function index()
    {
        $dados['carrinho'] = $_SESSION['carrinho'] ?? [];
        $this->loadView("Carrinho/index", $dados);
    }

    public function finalizarCompra()
    {
        // Tlvz fazer
        // inserir tabela vendas e itens_venda
    }
}