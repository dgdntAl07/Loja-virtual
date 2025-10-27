<?php 

class SiteController extends Controller{

    private $data = array();

	public function __construct(){
		// construct of class
	}

    public function index(){
		$this->data['level-1'] = 'WebSite';

        $this->data['information'] = 'Hye';
        $this->data['about_me'] = 'I am teacher! my name is rafael will and i love my fiancee Taiane Morais S2';

        // $this->data['CSS'] = customCSS('style');

        $this->loadTemplateSite('Home/index', $this->data);
    }
}