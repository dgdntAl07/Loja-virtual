<?php

class SiteController extends Controller
{

    private $data = array();
    private $categorias;

    public function __construct()
    {
        $this->categorias = new Categorias();
    }

    public function index()
    {

        $produtos = new Produtos();
        $cat_id = $_GET['id_ctg'] ?? null;

        if($cat_id != null) {
            $this->data['produtos_list'] = $produtos->getByCatId($cat_id);
        } else {
            $this->data['produtos_list'] = $produtos->getAll();
        };

        // echo "<pre>";
        // print_r($this->data['produtos_list']);
        // exit;

        $this->data['categ'] = $this->categorias->pegarNomeCat();

        // var_dump($this->data['categ']);
        // exit;

        $this->data['CSS'] = customCSS('style');

        // echo "<pre>";
        // print_r($this->data['categ']);
        // exit;

        $this->data['countItems'] = $this->countItems();
        $this->loadTemplateSite('/Home/Principal/index', $this->data);

    }

    public function countItems() {
        if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
            $total_unidades = array_sum(array_column($_SESSION['carrinho'], 'quantidade'));

            return $total_unidades; 
        }
        return 0;
    }
}