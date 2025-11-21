<?php

class LixeiraController extends Controller
{
    private $data = array();
    private $lixeira;
    private $produtos;

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
        
        $this->lixeira = new Lixeira();
        $this->produtos = new Produtos();
    }
    
    
    public function index()
    {

        

        $this->data['nivel-1'] = 'Lixeira';
        $this->data['produtos_lixeira'] = $this->lixeira->produtosExcluidos();

        // echo '<pre>';
        // print_r($this->data['produtos_lixeira']);
        // exit;

        $this->loadTemplateAdmin('Lixeira/index', $this->data);

        if (!empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $this->lixeira->atualizarSituacaoProduto($id);
        }

        exit;

    }

    public function restaurarProduto()
    {
        

        if (isset($_POST['id_produto_restaurar']) && !empty($_POST['id_produto_restaurar'])) {
            $id = intval($_POST['id_produto_restaurar']);

            // Atualiza a situação para 1
            $dados = ['situacao' => 1];
            $this->lixeira->atualizarSituacaoLixeira($id, $dados);

            redirect('Lixeira');
            exit;
        } else {
            echo "ID do produto não informado.";
        }
    }

    public function enviarLixeira()
    {

        if (isset($_POST['id_produto_excluir']) && !empty($_POST['id_produto_excluir'])) {
            $id = intval($_POST['id_produto_excluir']);

            // Atualiza a situação para 0
            $dados = ['situacao' => 0];
            $this->produtos->atualizarProdutos($id, $dados);

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
            $this->lixeira->deletarProduto($id);
        }

        redirect('Lixeira');
    }
}