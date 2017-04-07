<?php
	session_start();
	include '../engine/connect.php';
	$title = "Přihlášení";
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

	if (isset($_POST['logButton'])) {
		$name = $_POST['name'];
		$password = $_POST['password'];

		if (trim($name) == '') {
			$errorMessage = 'Vyplňte přihlašovací jméno!';
			displayError($errorMessage);
		}
		if (trim($password) == '') {
			$errorMessage = 'Vyplňte heslo!';
			displayError($errorMessage);
		}

		if(!$error){
			// Ok
			$nameStripped = $conn->real_escape_string($name);
			$_password = $conn->real_escape_string($password);
			$_passwordSHA = hash('sha256', $password);
			
			$sqlPasswordCorrect = "SELECT id FROM login WHERE password='$_passwordSHA' AND name='$nameStripped'";
			$resultPasswordCorrect = mysqli_query($conn, $sqlPasswordCorrect);
			
			if(mysqli_num_rows($resultPasswordCorrect) == 0){
				displayError('Jméno nebo heslo není správné!');
			} else {
				$_SESSION['name'] = $nameStripped;
				$_SESSION['password'] = $_passwordSHA;

				header("Location: login.php");
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

			<div id="content">
				<div class="loginWrapper">
					<div class="login">
						<form method="POST">
						<div class="title"><h2>Přihlášení</h2></div>
						<div class="errorBox">
							<?php
								if($displayErrorMessage){
									print_r($fullErrorMessage);
								}
							?>
						</div>
						<table>
							<tr>
								<td class="leftC">Uživatelské jméno:</td>
								<td>
									<input type="text" name="name">
								</td>
							</tr>
							<tr>
								<td class="leftC">Heslo:</td>
								<td>
									<input type="password" name="password">
								</td>
							</tr>
						</table>
						<input type="submit" name="logButton" value="Přihlásit" class="logButton"> 
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