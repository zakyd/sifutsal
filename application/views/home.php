<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($pesan!='null'){
	echo "<script>alert('".$pesan."')</script>";
}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title>FutsalQu</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('css/styles.css')?>"/>
	</head>
	<body background="<?= base_url('images/bg1.jpg')?>">
		<div class="topnav">
			<a class="logo"><img src="<?=base_url('images/logoFutsalQu.png')?>" width="130px"></a>
			<a class="active" href="<?=base_url('futsal/index')?>">HOME</a>
			<a class="nav" href="<?=base_url('futsal/tambahsaldo')?>">TAMBAH SALDO</a>
			<?php if(isset($_SESSION['username'])){?>
			<a class="nav" href="<?=base_url('futsal/logout')?>" style="float:right">LOGOUT</a>
			<?php }else{?>
			<a class="nav" href="<?=base_url('futsal/login')?>" style="float:right">LOGIN</a>
			<?php } ?>
		</div>
		<div class="data">
			<br><br><br><br>
			<h1 align="center">SISTEM INFORMASI FUTSAL <br><img src="<?=base_url('images/logoFutsalQu.png')?>" width="300px"></h1>
			<form name="form_lap" class="form" action="<?=base_url('futsal/home/null')?>" method="POST">
				<table class="form">
					<tr>
						<td>Pilih Lapangan</td>
						<td>:</td>
						<td>
							<select name="lapangan" onChange="form_lap.submit();" style="align:center">
								<option value=<?=$lapangan?> selected hidden>Lapangan <?=$lapangan?></option>
								<?php 
									foreach($dtlapangan as $dt) : 
								?>
								<option value=<?=$dt['kodelapangan']?>><?=$dt['namalapangan']?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Pilih Tanggal</td>
						<td>:</td>
						<td>
							<input name="date" type="date" value="<?=$tgl?>" onChange="form_lap.submit();">
						</td>
					</tr>
				</table>
			</form>
			<div style="float:right">
				<p>Harga Sewa : Rp <?=number_format($hlap)?> /jam</p>
			</div>
			<br><br>
			
			<div id="jadwal">
				<table>
				<?php
					echo"<tr>";
					echo '<th style="min-width:300px"></th>';
					$buka=strtotime("07:00");
					$tutup=strtotime("23:00");
					for($j=$buka; $j<=$tutup; $j+=1800){
						echo "<th align='left' style='min-width:150px'>".date('H:i', $j)."</th>";
					}
					echo "</tr>";
					for($i=-2; $i<=2; $i++){
						echo"<tr>";
						$tanggal=date('Y-m-d', strtotime($tgl.' '.$i.' day'));
						$t=date('d-m-Y', strtotime($tgl.' '.$i.' day'));
						echo "<td align='center'>".$t."</td>";
						$buka=strtotime("07:00");
						$tutup=strtotime("23:00");
						for($j=$buka; $j<=$tutup; $j+=1800){
							$w=date('H:i', $j);
							$status=0;
							foreach($jadwal as $jdwl){
								$kode=$jdwl['kodebooking'];
								$it=$jdwl['tgl'];
								$itgl=date('d-m-Y', strtotime($it));
								$iw=$jdwl['wkt'];
								$iwkt=date('H:i', strtotime($iw));
								$idurasi=$jdwl['durasi'];
								$ilapangan=$jdwl['kodelapangan'];
								$span=$idurasi*2;
								if($itgl==$t AND $iwkt==$w AND $ilapangan==$lapangan){
									$atasnama=$jdwl['atasnama'];
									if((isset($_SESSION['role']) AND $_SESSION['role']=='kasir') OR (isset($_SESSION['username']) AND $_SESSION['username']==$atasnama)){
										//if login
										echo "<td align='center' colspan='".$span."' style='background-color: rgba(255, 0, 0, 0.9)'>".$atasnama." <a href='".base_url('futsal/delete/'.$kode)."'><img src='".base_url('images/delete.png')."' height='20px' style='float:right'></a> <a href='".base_url('futsal/edit/'.$kode)."'><img src='".base_url('images/edit.png')."' height='20px' style='float:right'></a></td>";
									}else{
										//if not login
										echo "<td align='center' colspan='".$span."' style='background-color: rgba(255, 0, 0, 0.9)'>".$atasnama."</td>";
									}
									$status=1;
									$j+=((1800)*($span-1));
								}
							}
							if($status==0){
								echo "<td>";
				?>
								<form name="form_jadwal" class="form" action="<?=base_url('futsal/insert')?>" method="POST">
				<?php
								echo "<input type='hidden' name='lapangan' value='".$lapangan."'>";
								echo "<input type='hidden' name='tgl' value='".$tanggal."'>";
								echo "<input type='hidden' name='waktu' value='".date('H:i', $j)."'>";
								if((isset($_SESSION['role']) AND $_SESSION['role']=='kasir') OR (isset($_SESSION['username']) AND $_SESSION['username']==$atasnama)){
									//if login
									echo "<div style='text-align: center;'><input class='plus' type='submit' value='+'>";
									echo "</div>";
								}
								
				?>
								</form>
				<?php
								echo "</td>";
							}
						}
						echo "</tr>";
					}
				?>
				</table>
			</div>
			<br><br><br><br>
			<form action="<?=base_url('futsal/coba')?>">
				<input type="submit" name="a" value="go!">
			</form>
		</div>
	</body>
</html>