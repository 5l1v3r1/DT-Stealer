<?php
session_start();
if($_SESSION['admin'])
{
	header("Location: index.php");
	exit;
}

if (isset($_POST["login"]) && isset($_POST["password"]))
{
	require_once "include/db.php";

	$login = $_POST['login'];
	$pass = md5($_POST['password']);


	$stmt = $db->query("SELECT * FROM admin");
	$result = $stmt->FETCH(PDO::FETCH_ASSOC);

	if($login == $result['login'] AND $pass == $result['password'])
	{
		$_SESSION['admin'] = true;
		header("Location: index.php");
		exit;
	}
	else
	{
		echo '
		<script>
			alert("Some of the information you entered is incorrect.");
		</script>';
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
		body{
			margin: 0;
			padding: 0;
			text-align: center;
			padding: 10px;
			background-color: #eceeee;
		}
		form{
			background-color: #fff;
			border:1px solid #999;
			border-radius: 5px;
			max-width: 460px;
			margin: 0 auto;
			padding: 1.2rem;
		}
		input , button{
			text-align: center;
		}
		input{
			margin-bottom: 10px;
		}
		button{
			margin: 30px 0 10px;
		}
	</style>
</head>
<body>

	<form action="login.php" method="POST">
		<h1>Admin Panel</h1>
		<input type="text" class="form-control" name="login" placeholder="Login" required>
	    <input type="password" class="form-control" name="password" placeholder="Password" required>
	    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
	    <small>by DeiTy | <a href="https://xss.is/" target="_blank">XSS.IS</a> | <a href="https://t.me/deity_dt_anime" target="_blank">My Telegram</a></small>
	    <br>
	    <small>My jabber: deity.developer@thesecure.biz</small>
	</form>

	
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	
</body>
</html>