<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="lab3.css">
	<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<title>dkolodz1 | ITMD 462 | Lab 3</title>
</head>
<body>
	<h1>dkolodz1 | ITMD 462 | Lab 3</h1>
	<?php
	try
	{
		//open the database
    	$db = new PDO('sqlite:dkolodz1_lab3data.sqlite');

    	//create the table
    	$db->exec("CREATE TABLE IF NOT EXISTS Customer (ID INTEGER PRIMARY KEY, Name TEXT, Phone INTEGER, Age INTEGER, Region TEXT)");

    	//insert some data...
    	$db->exec("INSERT INTO Customer (Name, Phone, Age, Region) VALUES ('Daniel', 1234567, 20, 'US');".
               "INSERT INTO Customer (Name, Phone, Age, Region) VALUES ('Paul', 2222222, 21, 'US'); " .
			   "INSERT INTO Customer (Name, Phone, Age, Region) VALUES ('Greg', 3333333, 29, 'US'); " .
			   "INSERT INTO Customer (Name, Phone, Age, Region) VALUES ('Chris', 4444444, 17, 'US'); " .
               "INSERT INTO Customer (Name, Phone, Age, Region) VALUES ('Michael', 5555555, 13, 'US');");

    	//now output the data to a simple html table...
	    print "<table border=1>";
	    print "<tr><td>ID</td><td>Name</td><td>Phone</td><td>Age</td><td>Region</td></tr>";
	    $result = $db->query('SELECT * FROM Customer');
	    foreach($result as $row)
	    {
	      print "<tr><td>".$row['ID']."</td>";
	      print "<td>".$row['Name']."</td>";
	      print "<td>".$row['Phone']."</td>";
		   print "<td>".$row['Age']."</td>";
	      print "<td>".$row['Region']."</td></tr>";
	    }
	    print "</table>";

	    // close the database connection
    	$db = NULL;

	}
	catch(PDOException $e)
	{
		print 'Exception : '.$e->getMessage();
	}
	?>
	
</body>
</html>