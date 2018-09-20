<?php
session_start();

if (!isset($_SESSION['user'])){
	header("Location: login.php");
	exit;
}

if (isset($_POST['submitted'])){
    include('connect.php');

    $db_category = $_POST['db_category'];
    $db_round = $_POST['db_round'];
    $db_yearscored = $_POST['db_year'];
    $db_point = $_POST['db_point'];
    $db_vuln = $_POST['db_vuln'];
    
    $sqlinsert = "INSERT INTO points VALUES ('$db_category','$db_round','$db_yearscored','$db_point','$db_vuln')";

    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('Error');
    }
}
?>
<html>
<head>
    <title>Edit Database</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel='stylesheet' type="text/css" href='../css/style.css'>
</head>
<body>
<h1>Cyber Patriot Checklist</h1>

<ul class="menu">
    <li class="menu"><a href="../index.html">Home</a></li>
    <li class="menu"><a href="../pages/windows.html">Windows</a></li>
    <li class="menu"><a href="../pages/linux.html">Linux</a></li>
    <li class="menu"><a href="../pages/database.php">Database</a></li>
</ul>
<div class="form">  
<form action="edit.php" method="post">
<input type="hidden" name="submitted" value="true"/>
  <select name="db_category">
    <option value="Account Policies" selected>Account Policies</option>
    <option value="Application Security Settings">Application Security Settings</option>
    <option value="Application Updates">Application Updates</option>
    <option value="Defensive Counter-Measures">Defensive Counter-Measures</option>
    <option value="Forensics Questions">Forensics Questions</option>
    <option value="Local Policies">Local Policies</option>
    <option value="Operating System Settings">Operating System Settings</option>
    <option value="Operating System Updates">Operating System Updates</option>
    <option value="Policy Violation: Malware">Policy Violation: Malware</option>
    <option value="Policy Violation: Prohibited Files">Policy Violation: Prohibited Files</option>
    <option value="Policy Violation: Unwanted Software">Policy Violation: Unwanted Software</option>
    <option value="Service Auditing">Service Auditing</option>
    <option value="User Auditing">User Auditing</option>
  </select>
  <br>
  <p>Round:</p><input type="text" name="db_round"><br>
  <p>Year:</p><input type="text" name="db_year"><br>
  <p>Points:</p><input type="text" name="db_point"><br>
  <p>Vulnerability:</p><input type="text" name="db_vuln"><br>
  <input type="submit">
</form>
</div>
</body>
</html>

