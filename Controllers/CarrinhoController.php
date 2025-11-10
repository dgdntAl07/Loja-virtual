<?php

class CarrinhoController extends Controller
{
    private $carrinho;
    private $produtos;
    private $vendas;

    public function __construct()
    {
        $this->carrinho = new Carrinho();
        $this->produtos = new Produtos();
        $this->vendas = new Vendas();
    }

    public function index()
    {
        $dados['carrinho'] = $_SESSION['carrinho'] ?? [];
        $this->loadTemplateSite("Home/Carrinho/index", $dados);
    }

    public function adicionar()
    {
        $produtoId = $_POST['produto_id'];
        $produto = $this->carrinho->buscarPorId($produtoId);

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // veirificar se tem produto no carrinho
        $encontrado = false;
        foreach ($_SESSION['carrinho'] as $i => $item) {
            if ($item['id'] == $produto['id']) {
                $_SESSION['carrinho'][$i]['quantidade']++;
                $encontrado = true;
                break;
            }
        }

        // adicionar só se nn tiver produto
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

    public function subQuantCarrinho()
    {
        $produtoId = $_POST['id_produto'];

        if ($produtoId && isset($_SESSION['carrinho'])) {

            // Item 0: Caderno - R$10
            foreach ($_SESSION['carrinho'] as $index => $item) {
                if ($item['id'] == $produtoId) {
                    $_SESSION['carrinho'][$index]['quantidade']--;

                    // se a quantidade zerar, remove o item
                    if ($_SESSION['carrinho'][$index]['quantidade'] <= 0) {
                        unset($_SESSION['carrinho'][$index]);
                    }

                    break;
                }
            }

            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }

        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function addQuantCarrinho()
    {
        $produtoId = $_POST['id_produto'];

        if ($produtoId && isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $index => $item) {
                if ($item['id'] == $produtoId) {
                    $_SESSION['carrinho'][$index]['quantidade']++;
                    break;
                }
            }
        }

        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function removercarrinho()
    {
        $produtoId = $_POST['id_rmv_produto'];

        if ($produtoId && isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $index => $item) {
                if ($item['id'] == $produtoId) {
                    unset($_SESSION['carrinho'][$index]);
                    break;
                }
            }

            // interando o array
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }

        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function limparcarrinho()
    {
        unset($_SESSION['carrinho']);
        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }

    public function finalizarCompra()
    {
        if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
            header("Location: " . BASE_URL . "Vendas");
            exit;
        }

        $total = 0;

        // total da compra
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco'] * $item['quantidade'];
        }

        // venda realizada 
        $id_venda = $this->vendas->registrarVenda($total);

        // echo "<pre>";
        // var_dump($_SESSION['carrinho']);
        // exit;

        foreach ($_SESSION['carrinho'] as $item) {
            $this->vendas->registrarItem($id_venda, $item['id'], $item['quantidade'], $item['preco']);

            // atualiza o estoque do produto
            $novoEstoque = $item['quantidade'];
            $this->produtos->atualizarProdutos($item['id'], [
                'quantidade' => $this->carrinho->buscarPorId($item['id'])['quantidade'] - $novoEstoque
            ]);
        }

        unset($_SESSION['carrinho']);

        header("Location: " . BASE_URL . "Carrinho");
        exit;
    }
}
