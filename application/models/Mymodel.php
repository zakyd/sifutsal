<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model{
	public function get($table,$where){
		if($where!=''){
			$this->db->where($where);
		}
		return $this->db->get($table);
	}
	public function select($select,$table,$where){
		if($select!=''){
			$this->db->select($select);
		}
		if($where!=''){
			$this->db->where($where);
		}
		return $this->db->get($table);
	}
	public function query($query){
		return $this->db->query($query);
	}
	public function update($tabel,$data,$where){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}
	public function insert($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	public function cekUser($u,$role){
		if($role=="pegawai"){
			$data = $this->db->query("SELECT username,password,nama,namajabatan FROM pegawai, jabatan WHERE pegawai.kodejabatan=jabatan.kodejabatan AND username='$u'");
			return $data->first_row();
		}else{
			$data = $this->db->query("SELECT * FROM member WHERE username='$u'");
			return $data->first_row();
		}
	}
	public function makeKodeBooking(){
		$now=$this->db->query('SELECT DATE_FORMAT(now(), "%Y%m%d%H%i%s") as now')->first_row()->now;
		$num=$this->db->query("SELECT * FROM jadwalfutsal WHERE (CONVERT((kodebooking/10),int))=".$now)->num_rows();
		$num++;
		$k=$now.$num;
		return $k;
	}
	public function delete($tabel,$where){
		$this->db->where($where);
		$this->db->delete($tabel);
	}
}
?>