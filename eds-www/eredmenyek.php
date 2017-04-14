<?php
ini_set('display_errors','0');
ini_set('display_startup_errors','0');

$servername = "localhost";
$username = "horvatheva";
$password = "a";

$csatlakozas=mysql_connect('localhost','horvatheva','a');
mysql_select_db("eredmenyek", $csatlakozas);
//$adatbazis='eredmenyek';
mysql_query("SET NAMES 'utf8'");
?>
<html>
	<head>
		<title> Pasziánsz </title>
		<meta charset= "utf-8">
		<link rel="stylesheet" href="eredmenyek.css"/>
		<script src="jquery-3.1.1.min.js"></script>
	</head>
	<body>
		<div class="tabla">
			<table id="egesz">
				<tr id="cim">
					<td id="">Helyezés</td>
					<td id="">Név</td>
					<td id="">Idő</td>
					<td id="">Érem</td>
				</tr>
					<?php
					$sql='select * from tabla order by idő';
					$i=1;
					$result = mysql_query($sql,$csatlakozas);
						while($t=mysql_fetch_row($result)){
						
					?>
				<tr id="elsosor">
					<td id=""><?php echo $i; ?>.</td>
					<td id=""><?php echo $t[1]; ?></td>
					<td id=""><?php echo $t[2]; ?></td>
					<?php  
					  if ($i==1) {
						  echo '<td id=""><img src="ermek/arany.png" width="50"></td>';
					  } elseif ($i==2) {
						  echo '<td id=""><img src="ermek/ezust.png" width="50"></td>';
					  } elseif ($i==3) {
						  echo '<td id=""><img src="ermek/bronz.png" width="50"></td>';
					  } else echo '<td id=""></td>';
					?>
				</tr>
					<?php 
					$i++;
					}
					?>
			</table>
	</body>
</html>