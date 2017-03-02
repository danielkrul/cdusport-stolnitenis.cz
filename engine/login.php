<?php
	session_start();
	require 'connect.php';

	function loginOK($_IDTextStripped, $_passwordTextStrippedSHA){
		$_SESSION['ID'] = $_IDTextStripped;
		$_SESSION['password'] = $_passwordTextStrippedSHA;

		header("Location: admin");
	}

	$IDTextStripped = $conn->real_escape_string($IDText);
	$passwordTextStrippped = $conn->real_escape_string($passwordText);
	$passwordTextStripppedSHA = hash('sha256', $passwordTextStrippped);

	$sqlTotalID = "SELECT id FROM medicare_devices WHERE device_ID='$IDTextStripped'";
	$sqlPasswordSetted = "SELECT password FROM medicare_devices WHERE device_ID='$IDTextStripped'";
	$sqlPasswordCorrect = "SELECT id FROM medicare_devices WHERE password='$passwordTextStripppedSHA'";

	if ($resultTotalID = mysqli_query($conn, $sqlTotalID)){
		if(mysqli_num_rows($resultTotalID) == 0){
			displayError('ID tohoto zařízení neexistuje!');
		} else {
			$resultPasswordSetted = mysqli_query($conn, $sqlPasswordSetted);
			$rowPasswordSetted = mysqli_fetch_assoc($resultPasswordSetted);

			if($rowPasswordSetted['password'] == NULL){
				displayError('ID zařízení není zaregistrováno!');
			} else {
				$resultPasswordCorrect = mysqli_query($conn, $sqlPasswordCorrect);
				if(mysqli_num_rows($resultPasswordCorrect) == 0){
					displayError('Heslo není správné!');
				} else {
					loginOK($IDTextStripped, $passwordTextStripppedSHA);
				}
			}
		}

		mysqli_free_result($resultTotalID);
	}

	mysqli_close($conn);
?>