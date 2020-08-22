<?php
   session_start();
   //check if a specific logged in successfully
   $user_check = $_SESSION['login_user'];
   /*
   use $_SESSION to store info of the user logging, i.e. name, balance...
   */
  $username = "s1965919";
  $password = "ICTPass1670";
  $database = "d1965919";
   $link = mysqli_connect('127.0.0.1', $username, $password, $database); 

   $session_sql = mysqli_query($link,"select* from STUDENTS where STUDENT_NO = '$user_check' ");
   
   $row = mysqli_fetch_array($session_sql,MYSQLI_ASSOC);
   
   $login_session = $row['STUDENT_NO'];
   
   //if the user was unable to login 
   if(!isset($_SESSION['login_user'])){
      //redirect to login
      header("location: ../index.php");
      die();
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
		session_start();
		return (2);
	} else if ($value === 1) {
		session_start();

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
