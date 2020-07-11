<?php

if (isset($_POST["report"]) && isset($_POST["date"]) && isset($_POST["ip"]) && isset($_POST["country"]))
{
	require_once "include/db.php";

	$report = $_POST["report"];
	$date = $_POST["date"];
	$ip = $_POST["ip"];
	$country = $_POST["country"];

	$stmt = $db->prepare("INSERT INTO `logs` SET `ip` = :ip, `country` = :country, `date` = :date, `report` = :report");
	$stmt->execute(array('ip' => $ip, 'country' => $country, 'date' => $date, 'report' => $report));

	echo "succes";
	
}

?>