<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylib {
	public function tgl($tgl,$format){
		$this->load->model('mymodel');
		if($tgl!='now()'){
			$tgl="'".$tgl."'";
		}
		return $this->mymodel->query("SELECT DATE_FORMAT(".$tgl.", '".$format."') as tgl")->first_row()->tgl;
	}
}
?>