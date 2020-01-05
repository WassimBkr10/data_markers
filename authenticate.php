<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'data_markers';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {

	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if ( !isset($_POST['username'], $_POST['password']) ) {

	die ('Please fill both the username and password field!');
}

if ($stmt = $con->prepare('SELECT id, password, Role FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
}

$stmt->store_result();

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $Role);
	$stmt->fetch();

	if (password_verify($_POST['password'], $password)) {

		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
		$_SESSION['Role'] = $Role;
		header('Location: index_1.php');
	} else {
		echo 'Incorrect password!';
	}
} else {
	echo 'Incorrect username!';
}
$stmt->close();
?>



