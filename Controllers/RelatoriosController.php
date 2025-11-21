<?php
class RelatoriosController extends Controller
{

    private $data;
    private $relatorios;
    private $categorias;

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

        $this->relatorios = new Relatorios();
    
    }

    public function index()
    {
        $this->data['nivel-1'] = 'Relatorios';
        $this->data['products'] = $this->graficoProdutosVendidos();
        $this->data['countCtg'] = $this->graficoCategorias();
        $this->data['countVendas'] = $this->graficoVendas();
        $this->data['countEstoque'] = $this->graficoEstoque();
        $this->data['sumTotalVendas'] = $this->relatorios->sumTotal();

        // echo "<pre>";
        // print_r($this->data['countEstoque']);
        // exit;

        $this->loadTemplateAdmin("Admin/Relatorios/index", $this->data);
    }

    public function graficoProdutosVendidos()
    {
        return $this->relatorios->nomeProdutos();
    }

    public function graficoCategorias(){
        return $this->relatorios->countCtg();
    }

    public function graficoVendas(){
        return $this->relatorios->countVendas();
    }

    public function graficoEstoque(){
        return $this->relatorios->countEstoque();
    }


}