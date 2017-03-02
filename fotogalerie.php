<?php 
	$title = 'Jaffa';
	$selectedPage = 'fotogalerie';
	include 'inc/header.php';

	/*for ($i = 0; $i <= 10; $i++) { 
		$image = imagecreatefromjpeg("design/images/fotky_full/". $i .".jpg");  
    	unlink("design/images/fotky_full/". $i .".jpg");
   		imagejpeg($image,"design/images/fotky_full/". $i .".jpg", );
	}*/
?>
<body>
	<div id="page">
		<div id="inner">
			<header id="head">
				<div class="logo">
					<a href="/"><img src="design/images/logo.png" alt="Logo"></a>
				</div>

				<div class="background">
					<img width="20" src="design/images/pingpong.png">
				</div>
			</header>

			<div id="content">
				<?php
					include 'inc/menu.php';
				?>

				<div class="article">
					<div class="title"><h1>Fotogalerie</h1></div>
					<div class="mainGallery">
						<?php 
							for ($i = 0; $i <= 9; $i++) { 
								echo '<a href="design/images/fotky_full/'. $i .'.jpg" data-lightbox="roadtrip"><img class="imageView" src="design/images/fotky_full/'. $i .'.jpg"></a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php 
			include 'inc/foot.php';
		?>
	</div>

	<script src="js/lightbox.js"></script>
</body>
</html>