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
			<h1 align="center"><strong>Saldo</strong></h1>
				<table class="form">
					<tr>
						<td>Username</td>
						<td>:</td>
						<td>
							<input name="username" type="hidden" value="<?=$username?>">
							<input name="username" type="text" value="<?=$username?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Saldo Lama</td>
						<td>:</td>
						<td>
							<input name="saldolama" type="hidden" value="<?=$saldolama?>">
							<input name="saldolama" type="text" value="<?=$saldolama?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Saldo Tambahan</td>
						<td>:</td>
						<td>
							<input name="saldotambahan" type="hidden" value="<?=$saldotambahan?>">
							<input name="saldotambahan" type="text" value="<?=$saldotambahan?>" disabled>
						</td>
					</tr>
					<tr>
						<td>Saldo Terbaru</td>
						<td>:</td>
						<td>
							<input name="saldoterbaru" type="hidden" value="<?=$saldoterbaru?>">
							<input name="saldoterbaru" type="text" value="<?=$saldoterbaru?>" disabled>
						</td>
					</tr>
					<tr>
						<td colspan=3 style="text-align:center"><br>Pengisian saldo berhasil!</td>
						
					</tr>
				</table>
				<br><br>
				<input class="submit" type="submit" value="CETAK STRUK">
			<br><br><br><br>
		</div>
	</body>
</html>