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
			<a class="active" href="<?=base_url('futsal/login')?>" style="float:right">LOGIN</a>
		</div>
		<div class="data" align="center">
			<br><br>
			<h1 align="center"><strong>Login</strong></h1>
			<form role="form" action="<?= base_url('futsal/cekLogin')?>" method="post">
				<table class="form">
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input name="username" type="text"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input name="password" type="password"></td>
					</tr>
					<tr>
						<td>Role</td>
						<td>:</td>
						<td align="left">
							<select name="role">
								<option value="member">Member</option>
								<option value="pegawai">Pegawai</option>
							</select>
						</td>
					</tr>
				</table>
				<br><br>
				<input class="submit" type="submit" value="LOGIN">
			</form>
			<br><br><br><br>
		</div>
	</body>
</html>