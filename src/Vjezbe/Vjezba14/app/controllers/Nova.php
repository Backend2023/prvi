<?php

class Nova extends \App\Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->view->render('layout/custom', array('content' => 'home/gem/nova'));
		//$this->view->render('layout/global', array('content' => 'home/index'));
	}
	// public function report() {
	// 	$this->view->render('layout/custom', array('content' => 'home/report'));
	// 	//$this->view->render('layout/global', array('content' => 'home/index'));
	// }
	


}