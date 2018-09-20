<?php
include('connect.php');

$sql = 'SELECT * 
		FROM points';
		
$query = mysqli_query($dbcon, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($dbcon));
}
?>
<html>
<head>
    <title>Database</title>
    <link rel="icon" href="../resources/favicon.png">
    <link rel='stylesheet' type="text/css" href='../css/style.css'>
    <script type="text/javascript" src="../js/sorttable.js"></script>
</head>
<body>

<h1>Cyber Patriot Checklist</h1>

<div style="width: 100%; text-align: center;"><a href="../pages/edit.php" id="editLink"><div id="editButton">Add to Database</div></a></div>

<ul class="menu">
    <li class="menu"><a href="../index.html">Home</a></li>
    <li class="menu"><a href="../pages/windows.html">Windows</a></li>
    <li class="menu"><a href="../pages/linux.html">Linux</a></li>
    <li class="menu"><a class="active" href="../pages/database.php">Database</a></li>
</ul>
    
<div class="noSelect">
<table class="data-table sortable">
		<thead>
			<tr>
				<th>Category</th>
				<th>Round</th>
				<th>Year</th>
				<th>Points</th>
				<th>Vulnerability</th>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['Category'].'</td>
					<td>'.$row['Round'].'</td>
					<td>'.$row['YearScored'].'</td>
					<td>'.$row['Points'].'</td>
					<td>'.$row['Vulnerability'].'</td>
				</tr>';
		}?>
		</tbody>
	</table>
</div>
<br>
<br>
</body>
</html>