<?php

class Index extends \App\Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		//$this->view->render('layout/custom', array('content' => 'home/report'));
		$this->view->render('layout/global', array('content' => 'home/index'));
	}

	


}