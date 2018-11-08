<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Futsal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('mymodel');
	}
	public function index(){
		$pesan='null';
		redirect('futsal/home/'.$pesan);
	}
	public function home($pesan){
		if(isset($_POST['lapangan'])){
			$lap=$_POST['lapangan'];
		}else{
			$lap=1;
		}
		if(isset($_POST['date'])){
			$tgl=$_POST['date'];
		}else{
			$tgl=$this->mymodel->query("SELECT DATE_FORMAT(now(), '%Y-%m-%d') as tgl")->first_row()->tgl;
		}
		$dtlapangan=$this->mymodel->get('lapangan','')->result_array();
		$where=array(
			'kodelapangan' => $lap
		);
		$hlap=$this->mymodel->get('lapangan',$where)->first_row()->hargasewa;
		$jadwal=$this->mymodel->query('SELECT *, DATE_FORMAT(waktu, "%Y-%m-%d") as tgl, DATE_FORMAT(waktu, "%H:%i") as wkt FROM jadwalfutsal')->result_array();
		$data=array(
			'lapangan' => $lap,
			'dtlapangan' => $dtlapangan,
			'tgl' => $tgl,
			'jadwal' => $jadwal,
			'pesan' => $pesan,
			'hlap' => $hlap
		);
		$this->load->view('home',$data);
	}
	public function edit($kode){
		$where=array(
			'kodebooking' => $kode
		);
		$jadwal=$this->mymodel->get('jadwalfutsal',$where)->first_row();
		$data=array(
			'jadwal' => $jadwal
		);
		$this->load->view('edit',$data);
	}
	public function editdata(){
		$kodebooking = $_POST['kodebooking'];
		$lapangan = $_POST['lapangan'];
		$tgl = $_POST['tgl'];
		$waktu = $_POST['waktu'];
		$atasnama = $_POST['atasnama'];
		$dp = $_POST['dp'];
		$jam = $_POST['jam'];
		$menit = $_POST['menit'];
		$tanggal = date('Y-m-d H:i:s', strtotime($tgl.' '.$waktu));
		$durasi=$jam+($menit/60);
		$where=array(
			'kodelapangan' => $lapangan
		);
		$biaya=$this->mymodel->get('lapangan',$where)->first_row()->hargasewa;
		$totalbiaya=$biaya*$durasi;
		$where=array(
			'kodebooking' => $kodebooking
		);
		$data = array(
			'atasnama' => $atasnama,
			'kodelapangan' => $lapangan,
			'waktu' => $tanggal,
			'durasi' => $durasi,
			'dp' => $dp,
			'totalbiaya' => $totalbiaya
		);
		$this->mymodel->update('jadwalfutsal',$data,$where);
		$pesan="Edit data berhasil";
		redirect('futsal/home/'.$pesan);
	}
	public function login()
	{
		if(!(isset($_SESSION['username']))){
			$this->load->view('login');
		}else{
			$pesan='null';
			redirect('futsal/home/'.$pesan);
		}
	}
	public function ceklogin(){
		if(isset($_POST['username']) and isset($_POST['password'])){
			$u=$_POST['username'];
			$p=$_POST['password'];
			$r=$_POST['role'];
			$this->load->model('mymodel');
			$user=$this->mymodel->cekUser($u,$r);
			if($user->username==$u and $user->password==$p){
				$_SESSION['username']=$user->username;
				$_SESSION['nama']=$user->nama;
				if($r=="pegawai"){
					$_SESSION['role']=$user->namajabatan;
				}else{
					$_SESSION['role']="member";
				}
				$pesan='Login sukses';
				redirect('futsal/home/'.$pesan);
			}else{
				redirect('futsal/login');
			}
		}else{
			redirect('futsal/login');
		}
	}
	public function insert(){
		$lapangan = $_POST['lapangan'];
		$tgl = $_POST['tgl'];
		$waktu = $_POST['waktu'];
		$data = array(
			'lapangan' => $lapangan,
			'tgl' => $tgl,
			'waktu' => $waktu
		);
		$this->load->view('insert',$data);
	}
	public function insertdata(){
		$lapangan = $_POST['lapangan'];
		$tgl = $_POST['tgl'];
		$waktu = $_POST['waktu'];
		$atasnama = $_POST['atasnama'];
		$dp = $_POST['dp'];
		$jam = $_POST['jam'];
		$menit = $_POST['menit'];
		$tanggal = date('Y-m-d H:i:s', strtotime($tgl.' '.$waktu));
		$kodebooking=$this->mymodel->makeKodeBooking();
		$durasi=$jam+($menit/60);
		$where=array(
			'kodelapangan' => $lapangan
		);
		$biaya=$this->mymodel->get('lapangan',$where)->first_row()->hargasewa;
		$totalbiaya=$biaya*$durasi;
		$data = array(
			'kodebooking' => $kodebooking,
			'atasnama' => $atasnama,
			'kodelapangan' => $lapangan,
			'waktu' => $tanggal,
			'durasi' => $durasi,
			'dp' => $dp,
			'totalbiaya' => $totalbiaya
		);
		$this->mymodel->insert('jadwalfutsal',$data);
		$this->load->view('struk',$data);
	}
	public function logout(){
		session_destroy();
		$pesan='null';
		redirect('futsal/home/'.$pesan);
	}
	public function delete($kode){
		echo '<script>';
		echo 'if(confirm("yakin ingin menghapus?\nkode: '.$kode.'")){';
		echo "location.href='".base_url('futsal/deletedata/'.$kode)."';";
		echo '}else{';
		echo "location.href='".base_url('futsal/home')."';";
		echo '}</script>';
	}
	public function deletedata($kode){
		$where=array(
			'kodebooking' =>$kode
		);
		$this->mymodel->delete('jadwalfutsal',$where);
		$pesan='Berhasil menghapus';
		redirect('futsal/home/'.$pesan);
	}
	public function tambahsaldo(){
		$this->load->view('tambahsaldo');
	}
	public function updatesaldo(){
		$username = $_POST['username'];
		$saldo = $_POST['saldo'];
		$where=array(
			'username' => $username
		);
		$jmldata=$this->mymodel->get('member',$where)->num_rows();
		if($jmldata==0){
			$pesan='username_tidak_ditemukan';
			redirect('futsal/home/'.$pesan);
		}else{
			$saldoawal=$this->mymodel->get('member',$where)->first_row()->saldo;
			$saldo=$saldo+$saldoawal;
			$data = array(
				'saldo' => $saldo
			);
			$this->mymodel->update('member',$data,$where);
			$saldoakhir=$this->mymodel->get('member',$where)->first_row()->saldo;
			$dt=array(
				'username' => $username,
				'saldolama' => $saldoawal,
				'saldotambahan' => ($saldoakhir-$saldoawal),
				'saldoterbaru' => $saldoakhir
			);
			$this->load->view('saldo',$dt);
		}
	}
	public function coba(){
		
	}
}
