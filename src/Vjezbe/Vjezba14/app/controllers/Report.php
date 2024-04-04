<?php
use \Models\Index;
class Report extends \App\Controller {

	public function __construct() {
		parent::__construct();
	}
	/**
	 * http://localhost:8000/?url=report
	 */
	
	public function index() {
		$this->view->render('layout/custom', array('content' => 'home/report'),(new Index)->get());
		//$this->view->render('layout/global', array('content' => 'home/index'));
	}
	// public function report() {
	// 	$this->view->render('layout/custom', array('content' => 'home/report'));
	// 	//$this->view->render('layout/global', array('content' => 'home/index'));
	// }
	


}