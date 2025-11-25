<?php
class DashboardsController extends Controller
{

    private $data = array();
    private $dashboards;
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

        $this->dashboards = new Dashboards();
    
    }

    public function index()
    {
        $this->data['nivel-1'] = 'Dashboards';
        $this->data['products'] = $this->graficoProdutosVendidos();
        $this->data['countCtg'] = $this->graficoCategorias();
        $this->data['countVendas'] = $this->graficoVendas();
        $this->data['countEstoque'] = $this->graficoEstoque();
        $this->data['sumTotalVendas'] = $this->dashboards->sumTotal();

        // echo "<pre>";
        // print_r($this->data['countEstoque']);
        // exit;

        $this->loadTemplateAdmin("Admin/Dashboards/index", $this->data);
    }

    public function graficoProdutosVendidos()
    {
        return $this->dashboards->nomeProdutos();
    }

    public function graficoCategorias(){
        return $this->dashboards->countCtg();
    }

    public function graficoVendas(){
        return $this->dashboards->countVendas();
    }

    public function graficoEstoque(){
        return $this->dashboards->countEstoque();
    }


}