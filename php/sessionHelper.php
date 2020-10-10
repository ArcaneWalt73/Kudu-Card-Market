<?php
session_start()
function getUserSession() {
	//session_start();
	$response = array();
	if (isset($_SESSION['login_user'])) {
		$response['name'] = $_SESSION['login_user'];
		$response['code'] = 0;
		return $response;
	} else {
		$response['code'] = 1;
		return $response;
	}
}

/*
 * Function to check if the user logged in is the same as the one
 * on the _SESSIONS variable
 * Output :
 *	1 - no login user is set
 * 	2 - login user is set but not the same as user_check
 * 	0 - variable checks out
 */
function checkUserSession($user_check) {
	if (!isset($_SESSION['login_user'])) {
		// header("location: ../index.php");
		return (1);
	} else {
		if(!($user_check === $_SESSION['login_user'])) {
			// header("location: ../index.php");
			return (2);
		}
	}
	return (0);
}

/*
 * Function to update the user session to user_check
 * Output :
 * 	1 - if the $_SESSION['login_user'] was not set
	2 - if the $_SESSION['login_user'] is set but different
 * 	0 - if the update was successful
 */
function updateSession($user_check) {
	$value = checkUserSession($user_check);
	if ($value === 2) {
		//session_start();
		return (2);
	} else if ($value === 1) {
		//session_start();

		$_SESSION['login_user'] = $user_check;
		return (0);
	}
	return (1);
}
/*
 * Function to close user session
 */
function cancelSession() {
	session_destroy();
}
?>
