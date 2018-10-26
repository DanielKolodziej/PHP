<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dkolodz1 | ITMD 462 | Lab 2</title>
</head>
<body>
	<h1>dkolodz1 | ITMD 462 | Lab 2</h1>
	
	<?php
		if(isset($_POST['write']))
		{
			if(file_exists("MOCK_DATA.csv")) 
			{	
				$mockFile = file_get_contents("MOCK_DATA.csv");
				$content = explode("\n", $mockFile);
				foreach ($content as $line) 
				{
					$arrayMock[] = str_getcsv($line);
				}
			}	

			$serial = serialize($arrayMock);

			$textFile = 'dkolodz1_data_out.txt';
			$handle = fopen($textFile, "w") or die("ERROR: Didn't open");
			if (file_exists($textFile) != FALSE)
			{
				fwrite($handle,$serial);
			}
			else
			{
				die("ERROR: didn't write");
			}
			fclose($handle);
			echo "The data has written to the file successfully!";

		}	

?>
	<form action="#" method="post">
		<input type="submit" name="write" value="Process CSV">
	</form>
	
</body>
</html>