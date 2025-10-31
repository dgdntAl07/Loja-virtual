<?php

class LixeiraController extends Controller
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


    public function index()
    {

        $produtos = new Produtos();

        $this->data['nivel-1'] = 'Lixeira';
        $this->data['produtos_lixeira'] = $produtos->situacaoProduto();

        $this->loadTemplateAdmin('Lixeira/index', $this->data);

        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $produtos->atualizarSituacaoProduto($id);
        }

        exit;

    }

    public function restaurarProduto()
    {
        $produtos = new Produtos();

        if (isset($_POST['id_produto_restaurar']) && !empty($_POST['id_produto_restaurar'])) {
            $id = intval($_POST['id_produto_restaurar']);

            // Atualiza a situação para 1
            $dados = ['situacao' => 1];
            $produtos->atualizarSituacaoLixeira($id, $dados);

            redirect('Lixeira');
            exit;
        } else {
            echo "ID do produto não informado.";
        }
    }

    public function enviarLixeira()
    {
        $produtos = new Produtos();

        if (isset($_POST['id_produto_excluir']) && !empty($_POST['id_produto_excluir'])) {
            $id = intval($_POST['id_produto_excluir']);

            // Atualiza a situação para 0
            $dados = ['situacao' => 0];
            $produtos->atualizarProdutos($id, $dados);

            redirect('Produtos');
            exit;
        } else {
            echo "ID do produto não informado.";
        }
    }

    public function delProduto()
    {
        if (isset($_POST['id_produto_excluir']) && !empty($_POST['id_produto_excluir'])) {
            $id = intval($_POST['id_produto_excluir']);
            $produtos = new Produtos();
            $produtos->deletarProduto($id);
        }

        redirect('Lixeira');
    }
}