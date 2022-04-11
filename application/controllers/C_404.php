<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_404 extends MY_Controller {
	public function __construct() 
	 {
		parent::__construct(); 
	 } 

	 public function index() 
	 { 
		$this->output->set_status_header('404'); 
		$this->load->view('errors/error_404');//loading in custom error view
	 } 
}