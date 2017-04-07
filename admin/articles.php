<?php
	include '../engine/checkLogin.php';
	$title = 'Jaffa';
	$selectedPage = 'aktuality';
	include 'inc/header.php';

	$articlesArray = array();
	$sql = "SELECT id, title, category, date FROM article ORDER BY id DESC";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($articlesArray, array(
				'id' => $row['id'],
        		'title' => $row['title'],
        		'category' => $row['category'],
        		'date' => $row['date']
    		));
		}
	} else {
		echo "0 results";
	}

	if(isset($_GET['delArticle'])){
		$id = $_GET['delArticle'];
		$sql = "DELETE FROM article WHERE id='$id'";

		if ($conn->query($sql)) {
    		echo '<script>alert("Článek byl vymazán!");</script>';
    		header("Refresh: 0; url=articles.php");
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
					<div class="title"><h1>Správa článků</h1></div>
					<div class="articleSettings">
						<table cellspacing="15">
							<tr>
								<th>Id</th>
								<th>Nadpis</th> 
								<th>Kategorie</th>
								<th>Datum</th>
								<th>Akce</th>
							</tr>
							<?php
								for ($i = 0; $i < count($articlesArray); $i++) { 
									echo '<tr>';
									echo '<td>'. $articlesArray[$i]['id'] .'</td>';
									echo '<td>'. $articlesArray[$i]['title'] .'</td>';
									switch ($articlesArray[$i]['category']) {
										case 'aktuality':
											$category = 'Aktuality';
											break;
									}
									echo '<td>'. $category .'</td>';
									echo '<td>'. date("d. m. Y H:i", $articlesArray[$i]['date']) .'</td>';
									echo '<td><a title="Vymazat článek" href="?delArticle='. $articlesArray[$i]['id'] .'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>';
									echo '<td><a target="_blank" title="Upravit článek" href="updateArticle.php?id='. $articlesArray[$i]['id'] .'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';
									echo '</tr>';
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>