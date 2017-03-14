<?php
	require '../engine/connect.php';
	$title = "Přihlášení";
	include 'inc/header.php';

	if (isset($_POST['name']) && isset($_POST['password'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];

		if (trim($name) == '') {
			echo '<script>alert("Zadejte uživatelské jméno!");</script>';
		}
		if (trim($password) == '') {
			echo '<script>alert("Zadejte heslo!");</script>';
		}

		if(trim($name) == 'cdusport' && trim($password) == "12345678cfg33"){
			header('Location: login.php');
		} else {
			echo '<script>alert("Špatné jméno nebo heslo!");</script>';
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

				<div class="center">
					<h2>Administrace</h2>
				</div>

				<div class="background">
					<img width="20" src="../design/images/pingpong.png">
				</div>
			</header>

			<div id="content">
				<div class="loginWrapper">
					<div class="login">
						<form method="POST">
						<h2>Přihlášení</h2>
						<table>
							<tr>
								<td>Uživatelské jméno:</td>
								<td>
									<input type="text" name="name">
								</td>
							</tr>
							<tr>
								<td>Heslo:</td>
								<td>
									<input type="password" name="password">
								</td>
							</tr>
						</table>
						<button class="logButton">Jaffa</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php 
			include 'inc/foot.php';
		?>
	</div>
</body>
</html>