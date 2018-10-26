<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dkolodz1 | ITMD 462 | Lab 2</title>
</head>
<body>
	<h1>dkolodz1 | ITMD 462 | Lab 2</h1>
	<?php
		if(isset($_POST['read']))
			{
				if(file_exists("MOCK_DATA.csv")) 
				{
					$textFile = "dkolodz1_data_out.txt";
					if (file_exists($textFile) != FALSE)
					{
						$handle = file_get_contents($textFile, "r");
					}
					else
					{
						die("ERROR: didn't open");
					}
					$unserial = unserialize($handle);
				}
				echo "<table><tr>";
				foreach ($unserial as $data) 
				{
					echo "<tr>";
					foreach ($data as $Data) 
					{
						echo "<td>$Data</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}

	?>
	<form action="#" method="post">
		<input type="submit" name="read" value="Read Serialized Data">
	</form>
	
</body>
</html>