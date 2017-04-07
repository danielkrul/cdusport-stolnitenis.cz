<?php
	include '../engine/checkLogin.php';
	$title = 'Jaffa';
	$selectedPage = 'napsalionas';
	include 'inc/header.php';
?>
<body>
	<div id="page">
		<div id="inner">
			<header id="head">
				<div class="logo">
					<a href="/"><img src="../design/images/logo.png" alt="Logo"></a>
				</div>

				<div class="background">
					<img width="20" src="../design/images/pingpong.png">
				</div>
			</header>

			<?php
				include 'inc/adminPanel.php';
			?>

			<div id="content">
				<?php
					include 'inc/menu.php';
				?>

				<div class="article">

				</div>
			</div>
		</div>
	</div>
</body>
</html>