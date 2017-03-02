<?php
	require '../engine/checkLogin.php';
	$title = 'MediCare | Administrace';
	$selectedPage = 'index';

	include 'inc/header.php';
?>

<body>
	<div id="page">
		<div id="inner">
			<?php 
				include 'inc/menu.php';
			?>

			<div id="content">
				<div class="boxes">
					<div class="box">
						<div class="icon">
							<img src="../design/icons/heart_rate.png" alt="Tepová frekvence">
						</div>
						<div class="title">
							<h2 id="hr"><i class="fa fa-cog fa-spin fa-fw"></i></h2>
						</div>
						<div class="content">
							Tepová frekvence
						</div>
					</div>

					<div class="box">
						<div class="icon">
							<img src="../design/icons/temperature.png" alt="Pravděpodobnost infarktu">
						</div>
						<div class="title">
							<h2 id="temp"><i class="fa fa-cog fa-spin fa-fw"></i></h2>
						</div>
						<div class="content">
							Tělesná teplota
						</div>
					</div>

					<div class="box">
						<div class="icon">
							<img src="../design/icons/battery.png" alt="Úroveň nabití baterie">
						</div>
						<div class="title">
							<h2 id="battery"><i class="fa fa-cog fa-spin fa-fw"></i></h2>
						</div>
						<div class="content">
							Baterie
						</div>
					</div>

					<div class="box">
						<div class="icon">
							<img src="../design/icons/oximeter.png" alt="Kyslíková saturace">
						</div>
						<div class="title">
							<h2 id="saturation"><i class="fa fa-cog fa-spin fa-fw"></i></h2>
						</div>
						<div class="content">
							Kyslíková saturace
						</div>
					</div>

					<div class="box">
						<div class="icon">
							<img src="../design/icons/humidity.png" alt="Vlhkost pokožky">
						</div>
						<div class="title">
							<h2 id="humidity"><i class="fa fa-cog fa-spin fa-fw"></i></h2>
						</div>
						<div class="content">
							Vlhkost pokožky
						</div>
					</div>

					<div class="box">
						<div class="icon">
							<img src="../design/icons/gps.png" alt="Aktuální GPS poloha">
						</div>
						<div class="title">
							<h2 id="latitude"><span>Zem. délka: </span><i class="fa fa-cog fa-spin fa-fw"></i></h2>
							<h2 id="longitude"><span>Zem. šířka: </span><i class="fa fa-cog fa-spin fa-fw"></i></h2>
						</div>
						<div class="content">
							Aktuální GPS poloha
						</div>
					</div>
				</div>
				<div class="position">
					<div class="title"><h1>GPS poloha na mapě</h1></div>
					<div id="googleMap" style="width:100%; height:500px;"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>