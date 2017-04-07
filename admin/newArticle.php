<?php
	include '../engine/checkLogin.php';
	$title = 'Jaffa';
	$selectedPage = 'aktuality';
	include 'inc/header.php';

	if (isset($_POST['add'])) {
		$title = $_POST['title'];
		$category = $_POST['category'];
		$text = $_POST['text'];

		if (trim($title) == '' || trim($text) == '') {
			echo '<script>alert("Nezadány všechny údaje!");</script>';
		} else {
			$text = htmlentities($text);
			$time = time();
			$sql = "INSERT INTO article (title, category, text, date) VALUES ('$title', '$category', '$text', '$time')";

			if ($conn->query($sql)) {
				/*$image = imagecreatefromjpeg("../design/images/fotky_full/". $url);  
    			unlink("../design/images/fotky_full/". $url);
   				imagejpeg($image, "../design/images/fotky_full/". $url, 75);*/

   				echo '<script>alert("Článek úspěšně přidán!");</script>';
				header("Refresh: 0");
			}
		}
	}
?>
<body>
<script src="../js/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: '.text',
    plugins : 'advlist autolink link image lists charmap print preview table textcolor colorpicker',
    toolbar: 'bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, styleselect, fontsizeselect, bullist, numlist, outdent, indent, forecolor',
  	fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
    language: 'cs'
  });
</script>
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
					<div class="title"><h1>Přidat článek</h1></div>
					<div class="addArticle">
						<form method="POST">
						<table cellspacing="15">
							<tr>
								<td>Nadpis článku: </td>
								<td><input type="text" name="title"></td>
							</tr>
							<tr>
								<td>Kategorie: </td>
								<td>
									<select name="category">
										<option value="aktuality">Aktuality</option>
										<option value="onas">O nás</option>
										<option value="extraliga">Soutěže - Extraliga</option>
										<option value="1liga">Soutěže - 1. liga - naše hráčky</option>
										<option value="mladez">Soutěže - Mládež</option>
										<option value="napsalionas">Napsali o nás</option>
										<option value="treninky">Tréninky</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Text: </td>
								<td>
									<textarea class="text" name="text"></textarea>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" value="Přidat článek" name="add">
								</td>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>