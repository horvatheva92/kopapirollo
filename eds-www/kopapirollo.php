<?php
ini_set('display_errors','0');
ini_set('display_startup_errors','0');

$servername = "localhost";
$username = "horvatheva";
$password = "a";

$csatlakozas=mysql_connect('localhost','horvatheva','a');
mysql_select_db("kopapirollo", $csatlakozas);
//$adatbazis='elozmenyek';
mysql_query("SET NAMES 'utf8'");

session_start();
$_SESSION['username'] = "Vendég";
?>
<html>
	<head>
	   <title> KŐ-PAPÍR-OLLÓ</title>
	   <meta charset= "utf-8">
	   <link rel="stylesheet" href="kopapirollo.css">
	   <script src="jquery-3.1.1.min.js"></script>
	   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
		<body>
			<div id="fejlec"> 
				<ul id="menu">
					<li><a href="#" id="jatek">Új játék</a></li>
					<li><a href="#" id="hatter">Háttér</a></li>
					<li><a href="eredmenyek.php">Eredmények</a></li>
					<li><a href="#" id="sugo">Súgó</a></li>
					<li><center><a href="#">KŐ-PAPÍR-OLLÓ JÁTÉK</a></center></li>
					<span id="clock">
						<script type="text/javascript">
								function Ido()
								{
								var time = new Date();
								var hour = time.getHours();
								var min = time.getMinutes();
								var sec = time.getSeconds();
								if (hour <= 9) hour = "0" + hour;
								if (min <= 9) min = "0" + min;
								if (sec <= 9) sec = "0" + sec;
								var string = hour + ":" + min + ":" +sec;
								document.getElementById('clock').innerHTML = string;
								setTimeout('Ido()', 1000);
								}
								Ido();
						</script>
					</span>
					<span id="user">
						<?php echo $_SESSION['username']?>
						<?php
							if($_SESSION['username'] == "Vendég")
								echo '<input id="bejelentkezve" style="display:none" value="0"/>';
							else 
								echo'<input id="bejelentkezve" style="display:none" value="1"/>';
						?>
					</span>
				</ul>
			</div>
			<div class="jatek">
				<a href='#' class="targy" data-ertek="1"><img src="ko.png"></a><br/> <!--<img src=kopapirollo.png>-->
				<a href='#' class="targy" data-ertek="2"><img src="papir.png"></a><br/>
				<a href='#' class="targy" data-ertek="3"><img src="ollo.png"></a><br/>
			
			</div>
			<div class="tabla">
				<div>
					<table>
						<tr>
							<td> Játékos </td>
							<td> Számítógép </td>
							<td> Eredmény </td>
						</tr>
					</table>
				</div>
			</div>
			<div class="bejelentkezes">
				<form action="bejelentkezes.php" method="post">
					<label>
						Felhasználónév
						<input name="username" type="text"/>
					</label>
					<label>
						Jelszó
						<input name="password" type="password"/>
					</label>
					<button type="submit" id="bejelentkezes">Bejelentkezés</button>
				</form>
				<button type="button" id="vendegkent">Folytatás vendégként</button>
			</div>
	<div class="sugo">
		<div style="width:1355px; height:620px; overflow:scroll;">
			<h1>Játék szabály</h1>
				<p class="justify">
					A kő-papír-olló játékot két ember játszhatja a kezével. Néha a pénzfeldobáshoz, a kockadobáshoz vagy a pálcatöréshez hasonlóan 
					egy személy kiválasztásban is használják. A véletlen választásoktól eltérően azonban itt lehet fejleszteni a játéktechnikát 
					ha több kört játszanak, mert a tapasztalt játékos kiismerheti ellenfele nem-véletlenszerű taktikáját. 
					A játék a legtöbb országban kő, papír, olló-ként ismert, csak Japánban nevezik dzsankennek.</p>

				<p class="justify">
					Egyes sportokban ezzel a játékkal (és nem pénzfeldobással) határozzák meg, melyik csapat kezdi a meccset. 
					Eső esetén néha így döntik el, megtartsák-e a játszmát. Élő szerepjátékokban is használják véletlenek létrehozására,
					mivel semmiféle felszerelés nem szükséges hozzá. Néha fogadást is kötnek rá, a szerencsejátékokhoz hasonlóan.</p>
					
			<h2>A játék menete</h2>
				<p class="justify">
					A mindegyik alak (balról jobbra: kő, papír, olló) legyőzi a másik kettő egyikét
					A játékosok hangosan háromig számolnak vagy a játék nevét, a "kő – papír – olló"-t mondják, minden számolásnál meglendítve a felemelt
					és ökölbe szorított kezüket. A harmadik számolás után vagy az utána következő ütemben a játékosok kezükkel felveszik a három alakzat 
					egyikét és megmutatják az ellenfelüknek. Újabban használt az amorf (alaktalan) anyag is, ami egyfajta joker, ami mindent visz és 
					bármikor felhasználható, de csak több menetes küzdelemben. Két amorf anyag kiüti egymást. A másik változat a csoportkör, 
					amit 3-6 játékos játszhat, ennek során mindenki megszámolja, hány más játékoson aratott győzelmet az adott körben (mindenki egyszerre mutat).
					Győzelmeit egy-egy pontként jegyezzük, aki előbb szerez minimum 20 pontot (változó, de ennyi az ajánlott), az a nyertes. 
					Ezt akár kombinálhatjuk az amorf anyaggal, így még izgalmasabb a játék.</p>
					
					<div><center><img src=kopapirollo.png></center></div>

					<p><center>	 
							 kő: a zárt ököl<br>
							 olló: a kinyújtott, szétnyitott mutató és középső ujj<br>
							 papír: a nyitott tenyér<br>
							 amorf anyag: ujjaival vibráló kéz, de szinte bármi lehet
					</center></p><br>
					
			<h3>A játék nyertese</h3>
				<p class="justify">
					Az a cél, hogy olyat mutassunk, ami legyőzi a másikat:</p>
						<p><center> 
							 a kő kicsorbítja az ollót: a kő győz<br>
							 az olló elvágja a papírt: az olló győz<br>
							 a papír becsomagolja a követ: a papír győz
						</center></p>
				<p>Ha mindketten ugyanazt mutatják, a játék döntetlen, és újat játszanak.</p><br>
		</div>
	</div>
		<div class="kepek">
			 <h4>Háttérképek</h4>
				<p>Autók</p>
			 <a class="background-image"><img src=volkswagengtiroadster.jpg data-position="center"  data-size="100% auto"></a>
			 <a class="background-image"><img src=volkswagen-passat-b7.jpg data-position="center"  data-size="100% auto"></a>
			 <a class="background-image"><img src=volkswagengolfr400.jpg data-position="center"  data-size="100% auto"></a>
			 <a class="background-image"><img src=volkswagenpassatccgold.jpg data-position="center"  data-size="100% auto"></a>
			 <a class="background-image"><img src=vwgolfgti.jpg data-position="center"  data-size="100% auto"></a>
			 <a class="background-image"><img src=Volkswagen-Polo_R_WRC.jpg data-position="center"  data-size="100% auto"></a>
			 <a class="background-image"><img src=audi-versenyauto.jpg data-position="center"  data-size="100% auto"></a>
				<p>Tájképek</p>
			 <a class="background-image"><img src=háttérkép.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=tenger.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=naplemente.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=vizeses.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=vizeses2.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=vizeses3.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=hullam.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=sidney.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=teli-hegyek.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=teli-varos.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=telitaj.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=fold.jpg data-position="top" data-size="100% auto"></a>
			 <a class="background-image"><img src=hold.jpg data-position="top" data-size="100% auto"></a>
		</div>
	
	
	</body>
</html>
<script>
	function changeBackground(image, position, size) {
		$("body").css({
			"background-image":"url("+image+")",
			"background-position":position,
			"background-size":size
		});
	}
		
	$(document).ready(function(){
		$("#vendegkent").click(function(){
			$(".bejelentkezes").css({
				display: "none",
				visibility: "hidden"
			});
			$(".jatek").css({
				display: "inline-block",
				visibility: "visible"
			});
			$(".tabla").css({
				display:"inline-block",
				visibility: "visible"
			});
		});
		$(".targy").click(function(){
			var ertek = $(this).data('ertek'); //  data-ertek értéke, this --> 'a' tag amire klikkeltünk
			$.ajax({
				url: 'jatek.php',
				data: {targy: ertek},
				type: 'post',
				success: function(output) {
                    $('.tabla table').append(output);
                }
			});
		});
		if(localStorage.getItem('background-image')){
			changeBackground(localStorage.getItem('background-image'),localStorage.getItem('background-position'),localStorage.getItem('background-size'));
		} else {
			var defaultImage = $('.kepek a:first img');
			changeBackground(defaultImage.attr('src'),defaultImage.data('position'), defaultImage.data('size'));
		}		
		
		$("#hatter").click(function(){
			$(".kepek").css({
				display: "block",
				visibility: "visible"
			});
			$(".sugo").css({
				display: "none",
				visibility: "hidden"
			});
			$(".jatek").css({
				display: "inline-block",
				visibility: "hidden"
			});
			$(".bejelentkezes").css({
				display: "none",
				visibility: "hidden"
			});
			$(".tabla").css({
				display:"inline-block",
				visibility: "hidden"
			});
		});
		$("#sugo").click(function(){
			$(".jatek").css({
				display: "inline-block",
				visibility: "hidden"
			});
			$(".kepek").css({
				display: "none",
				visibility: "hidden"
			});
			$(".sugo").css({
				display: "block",
				visibility: "visible"
			});
			$(".bejelentkezes").css({
				display: "none",
				visibility: "hidden"
			});
			$(".tabla").css({
				display:"inline-block",
				visibility: "hidden"
			});
		});
		
		$("#jatek").click(function(){
			$(".sugo").css({
				display: "none",
				visibility: "hidden"
			});
			$(".kepek").css({
				display: "none",
				visibility: "hidden"
			});
			if($('#bejelentkezve').val() == "1") {
				$(".jatek").css({
					display: "inline-block",
					visibility: "visible"
				});
				$(".tabla").css({
					display:"inline-block",
					visibility: "visible"
				});
			} else {
				$(".bejelentkezes").css({
					display: "block",
					visibility: "visible"
				});
			}
		});
		$(".background-image").click(function(){
			var img = $(this).find("img").attr("src");
			var position = $(this).find("img").data("position");
			var size = $(this).find("img").data("size");
			changeBackground(img, position, size);
			$(".kepek").css({
				display: "none",
				visibility: "hidden"
			});
			
			localStorage.setItem('background-image',img);
			localStorage.setItem('background-position',position);
			localStorage.setItem('background-size',size);
		});
	});
</script>
</head>