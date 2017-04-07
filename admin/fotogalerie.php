<?php
	include '../engine/checkLogin.php';
	$title = 'Jaffa';
	$selectedPage = 'fotogalerie';
	include 'inc/header.php';

	/*for ($i = 0; $i <= 10; $i++) { 
		$image = imagecreatefromjpeg("design/images/fotky_full/". $i .".jpg");  
    	unlink("design/images/fotky_full/". $i .".jpg");
   		imagejpeg($image,"design/images/fotky_full/". $i .".jpg", );
	}*/
	$photosArray = array();
	$sql = "SELECT url, title FROM photogallery";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($photosArray, array(
        		'title' => $row['title'],
        		'url' => $row['url']
    		));
		}
	} else {
		echo "0 results";
	}
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
					<div class="title"><h1>Fotogalerie</h1></div>
					<div class="mainGallery">
						<?php 
							for ($i = 0; $i < count($photosArray); $i++) { 
								echo '<a data-title="'. $photosArray[$i]['title'] .'" href="../design/images/fotky_full/'. $photosArray[$i]['url'] .'" data-lightbox="roadtrip"><img class="imageView" src="../design/images/fotky_full/'. $photosArray[$i]['url'] .'"></a>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../js/lightbox.js"></script>
</body>
</html>