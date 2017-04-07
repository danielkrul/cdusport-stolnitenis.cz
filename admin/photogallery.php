<?php
	include '../engine/checkLogin.php';
	$title = 'Jaffa';
	$selectedPage = 'aktuality';
	include 'inc/header.php';

	/*for ($i = 0; $i <= 10; $i++) { 
		$image = imagecreatefromjpeg("design/images/fotky_full/". $i .".jpg");  
    	unlink("design/images/fotky_full/". $i .".jpg");
   		imagejpeg($image,"design/images/fotky_full/". $i .".jpg", );
	}*/
	$photosArray = array();
	$sql = "SELECT id, url, title FROM photogallery";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($photosArray, array(
				'id' => $row['id'],
        		'title' => $row['title'],
        		'url' => $row['url']
    		));
		}
	} else {
		echo "0 results";
	}

	if (isset($_POST['sendFile'])) {
		$target_dir = '../design/images/fotky_full/';
		$target_file = $target_dir . basename($_FILES['uploadFile']['name']);
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

		if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_file)) {
			$url = basename($_FILES['uploadFile']['name']);
			$_title = $_POST['title']; 
        	#echo "The file ". basename($_FILES['uploadFile']['name']). " has been uploaded.";

        	$sql = "INSERT INTO photogallery (url, title) VALUES ('$url', '$_title')";

			if ($conn->query($sql)) {
				$image = imagecreatefromjpeg("../design/images/fotky_full/". $url);  
    			unlink("../design/images/fotky_full/". $url);
   				imagejpeg($image, "../design/images/fotky_full/". $url, 75);

    			header("Refresh: 0");
			}
    	} else {
        	echo "Sorry, there was an error uploading your file.";
    	}
	}

	if (isset($_GET['delImg'])) {
		$img = $_GET['delImg'];
		$sql = "DELETE FROM photogallery WHERE id='$img'";

		if ($conn->query($sql)) {
			header("Refresh: 0; url=photogallery.php");
		} else {
    		echo "Error deleting record: " . $conn->error;
		}
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
					<div class="title"><h1>Správa fotogalerie</h1></div>
					<div class="control">
						<form method="POST" enctype="multipart/form-data">
							<table>
								<tr>
									<td>Soubor: </td>
									<td>
										<input accept="image/*" type="file" name="uploadFile">
									</td>
								</tr>
								<tr>
									<td>
										Popisek:
									</td>
									<td>
										<input type="text" required name="title">
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" value="Přidat soubor" name="sendFile">
									</td>
								</tr>
							</table>
						</form>
						<hr>
					</div>
					<div class="mainGallery">
						<?php
							for ($i = 0; $i < count($photosArray); $i++) {
								echo '<a class="img" data-title="'. $photosArray[$i]['title'] .'" href="../design/images/fotky_full/'. $photosArray[$i]['url'] .'" data-lightbox="roadtrip">';
								echo '<span onclick="document.location.href = \'?delImg='. $photosArray[$i]['id'] .'\'; return false" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></span>';
								echo '<img class="imageView" src="../design/images/fotky_full/'. $photosArray[$i]['url'] .'">';
								echo '</a>';
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