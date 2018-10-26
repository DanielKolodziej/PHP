<?php
if (isset($_GET['name'])) {
	$name = $_GET['name'];
	$txt = 'Hello ' . $name;
} else {
	$txt = 'Hello Guest';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
    <h1> <?php print $txt; ?> </h1>
	<h2> <?php echo  "ITMD-462"; ?> </h2>
	<h2> <?php echo  "Project 1"; ?> </h2>
	<h3> <?php echo  "Daniel Kolodziej: A20331192"; ?> </h3>
	<?php
		date_default_timezone_set('America/Chicago');
		echo "Loaded: " . date('l F, Y \- g:i:s a \| U');
	?>
	<br><a href="form.php" id="log">Form</a>
</body>
</html>