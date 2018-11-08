<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<title>FutsalQu</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('css/styles.css')?>"/>
	</head>
	<body background="<?= base_url('images/bg1.jpg')?>">
		<div class="topnav">
			<a class="logo"><img src="<?=base_url('images/logoFutsalQu.png')?>" width="130px"></a>
			<a class="nav" href="<?=base_url('futsal/index')?>">HOME</a>
			<a class="nav" href="<?=base_url('futsal/tambahsaldo')?>">TAMBAH SALDO</a>
			<?php if(isset($_SESSION['username'])){?>
			<a class="nav" href="<?=base_url('futsal/logout')?>" style="float:right">LOGOUT</a>
			<?php }else{?>
			<a class="nav" href="<?=base_url('futsal/login')?>" style="float:right">LOGIN</a>
			<?php } ?>
		</div>
		<div class="data" align="center">
			<br><br>
			<h1 align="center"><strong>Struk</strong></h1>
				<table class="form">
					<tr>
						<td>Kode Booking</td>
						<td>:</td>
						<td>
							<input name="kodebooking" type="hidden" value="<?=$kodebooking?>">
							<input name="kodebooking" type="text" value="<?=$kodebooking?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Lapangan</td>
						<td>:</td>
						<td>
							<input name="lapangan" type="hidden" value="<?=$kodelapangan?>" min=1 max=3>
							<input name="lapangan" type="number" value="<?=$kodelapangan?>" min=1 max=3 disabled>
						</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td>
							<input name="tgl" type="hidden" value="<?=date('Y-m-d', strtotime($waktu))?>">
							<input name="tgl" type="date" value="<?=date('Y-m-d', strtotime($waktu))?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Waktu</td>
						<td>:</td>
						<td>
							<input name="waktu" type="hidden" value="<?=date('H:i', strtotime($waktu))?>">
							<input name="waktu" type="time" value="<?=date('H:i', strtotime($waktu))?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Atas nama</td>
						<td>:</td>
						<td>
							<input name="atasnama" type="hidden" value="<?=$atasnama?>">
							<input name="atasnama" type="text" value="<?=$atasnama?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Durasi</td>
						<td>:</td>
						<td>
							<input name="jam" type="hidden" value=<?=(int)$durasi?> min=0><input name="menit" type="hidden" step=30 value=<?=((($durasi)*10)%10)*6?> min=0 max=30>
							<input name="jam" type="number" value=<?=(int)$durasi?> min=0 disabled> : <input name="menit" type="number" step=30 value=<?=((($durasi)*10)%10)*6?> min=0 max=30 disabled>
						</td>
					</tr>
					<tr>
						<td>DP</td>
						<td>:</td>
						<td>
							<input name="dp" type="hidden" value="<?=$dp?>">
							<input name="dp" type="text" value="<?=$dp?>" disabled>
						</td>
					</tr>
				</table>
				<br><br>
				<input class="submit" type="submit" value="CETAK STRUK">
			<br><br><br><br>
		</div>
	</body>
</html>