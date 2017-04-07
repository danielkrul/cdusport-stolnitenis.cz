<?php
	include '../engine/checkLogin.php';
	$title = "Administrace";
	$selectedPage = "aktuality";
	include 'inc/header.php';

	$articlesArray = array();
	$sql = "SELECT title, category, date, text, img FROM article WHERE category='aktuality'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($articlesArray, array(
        		'title' => $row['title'],
        		'category' => $row['category'],
        		'date' => $row['date'],
        		'text' => $row['text'],
        		'img' => $row['img']
    		));
		}
	} else {
		echo "0 results";
	}

	function Perex($text, $length = 60, $ending = "..."){
     if (strlen($text) <= $length)
       {
         $text = $text; 
       } 
   
     else
      {
         $text  = substr($text, 0, $length);
         $pos   = strrpos($text, " ");
         $text  = substr($text, 0, $pos);
         $text .= $ending;
      }
     
     return $text;
   
 }
?>

<body>
	<div id="page">
		<div id="inner">
			<header id="head">
				<div class="logo">
					<a href="/"><img src="../design/images/logo.png" alt="Logo"></a>
				</div>

				<div class="center">
					<h2>Administrace</h2>
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
					<div class="title"><h1>Aktuality</h1></div>
					<?php
						for ($i = 0; $i < count($articlesArray); $i++) { 
							echo '<div class="message">';
							echo '<h2>'. $articlesArray[$i]['title'] .'</h2>';
							echo '<div class="text">';
							echo '<img onerror="this.src=\'../design/icons/fallback.png\'" src="../design/images/fotky_articles/'. $articlesArray[$i]['img'] .'" width="128" style="float: left;">';
							echo '<div class="textInner">';
							$perex = Perex(html_entity_decode($articlesArray[$i]['text']), 300);

							echo $perex;
							echo '<div style="text-align: right; margin-top: 5px;">'. date("d. m. Y H:i", $articlesArray[$i]['date']) . ' |  <a href="" class="next">Celá aktualita</a></div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
						}
					?>

				</div>
			</div>
		</div>

		<?php 
			include 'inc/foot.php';
		?>
	</div>
</body>
</html>