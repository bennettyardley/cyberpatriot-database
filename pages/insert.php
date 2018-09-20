<?php
$db_host = 'XXXXXXX'; // Server Name
$db_user = 'XXXXXXX'; // Username
$db_pass = 'XXXXXXX'; // Password
$db_name = 'XXXXXXX'; // Database Name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
	die ('Failed to connect to MySQL: ' . $conn->connect_error);
}

$db_category = $_POST['db_category'];
$db_round = $_POST['db_round']
$db_year = $_POST['db_year']
$db_point = $_POST['db_point']
$db_vuln = $_POST['db_vuln']

$sql = "INSERT INTO points VALUES ('$db_category','$db_round','$db_year','$db_point','$db_vuln')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error adding record: " . $conn->error;
}

$conn->close();
?>
