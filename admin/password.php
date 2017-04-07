<?php
	include '../engine/checkLogin.php';
	$title = "Administrace";
	$selectedPage = "aktuality";
	include 'inc/header.php';

	$displayErrorMessage = false;
	$fullErrorMessage = '';
	$error = false;

	function displayError($_errorMessage){
		global $displayErrorMessage;
		global $fullErrorMessage;
		global $error;
		$displayErrorMessage = true;
		$error = true;
		$fullErrorMessage .= '<p>' . $_errorMessage . '</p>';
	}

	if (isset($_POST['change'])) {
		$password = $_POST['password'];
		$passwordNext = $_POST['passwordNext'];

		if (trim($password) == '') {
			$errorMessage = 'Vyplňte nové heslo!';
			displayError($errorMessage);
		}
		if (trim($passwordNext) == '') {
			$errorMessage = 'Vyplňte zopakování hesla!';
			displayError($errorMessage);
		}
		if ($password != $passwordNext) {
			$errorMessage = 'Hesla nejsou stejná!';
			displayError($errorMessage);
		}

		if(!$error){
			$_password = $conn->real_escape_string($password);
			$_passwordNext = $conn->real_escape_string($passwordNext);
			$_passwordSHA = hash('sha256', $_password);
			$_passwordNextSHA = hash('sha256', $_passwordNext);

			$nameSession = $_SESSION['name'];
			$passwordSession = $_SESSION['password'];

			$sql = "UPDATE login SET password='$_passwordSHA' WHERE name='$nameSession' AND password='$passwordSession' ";

			if ($conn->query($sql)) {
    			header('Location: index.php');
			} else {
    			echo "Error updating record: " . $conn->error;
			}
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

			<?php
				include 'inc/adminPanel.php';
			?>

			<div id="content">
				<?php
					include 'inc/menu.php';
				?>

				<div class="article">
					<div class="title"><h1>Změna hesla</h1></div>
					<div class="settings">
						<table>
						<form method="POST">
							<tr>
								<td>
								<div class="errorBox">
							<?php
								if($displayErrorMessage){
									print_r($fullErrorMessage);
								}
							?>
						</div></td>
							</tr>
							<tr>
								<td>Nové heslo: </td>
								<td><input type="password" name="password"></td>
							</tr>

							<tr>
								<td>Opakujte nové heslo:</td>
								<td><input type="password" name="passwordNext"></td>
							</tr>

							<tr>
								<td>
									<input type="submit" name="change" value="Změnit heslo">
								</td>
							</tr>
						</form>
						</table>
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