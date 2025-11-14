<?php

class SiteController extends Controller
{

    private $data = array();

    public function __construct()
    {

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

        $this->data['CSS'] = customCSS('style');

        $this->loadTemplateSite('/Home/Principal/index', $this->data);

    }
}