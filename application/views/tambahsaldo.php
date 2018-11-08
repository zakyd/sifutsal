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
			<a class="active" href="<?=base_url('futsal/tambahsaldo')?>">TAMBAH SALDO</a>
			<?php if(isset($_SESSION['username'])){?>
			<a class="nav" href="<?=base_url('futsal/logout')?>" style="float:right">LOGOUT</a>
			<?php }else{?>
			<a class="nav" href="<?=base_url('futsal/login')?>" style="float:right">LOGIN</a>
			<?php } ?>
		</div>
		<div class="data" align="center">
			<br><br>
			<h1 align="center"><strong>Tambah Saldo</strong></h1>
			<form role="form" action="<?=base_url('futsal/updatesaldo')?>" method="post">
				<table class="form">
					<tr>
						<td>Username Member</td>
						<td>:</td>
						<td>
							<input name="username" type="text">
						</td>
					</tr>
					<tr>
						<td>Tambah Saldo</td>
						<td>:</td>
						<td>
							<input class="harga" name="saldo" type="number" step=10000 value=0 min=0>
						</td>
					</tr>
				</table>
				<br><br>
				<input class="submit" type="submit" value="TAMBAH">
			</form>
			<br><br><br><br>
		</div>
	</body>
</html>