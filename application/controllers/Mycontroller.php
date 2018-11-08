<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mycontroller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mymodel');
		$this->load->library('mylib');
	}
	public function index(){
		redirect('futsal/home');
	}
}
