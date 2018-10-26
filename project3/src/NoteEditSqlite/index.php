<?php

require_once 'SqliteNoteRepository.php';
require_once 'Note.php';

$noteRepo = new NoteEditSqlite\SqliteNoteRepository();
$space = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
$noteList = $noteRepo->getAllNotes();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="proj3.css">
	<link href='http://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<title>NoteListSqlite - dkolodz1 ITM462 Project 3</title>
</head>
<body>
	<h1>All Notes</h1>
	<table>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Subject</th>
		<th>Message</th>
		<th>File Last Edited</th>
    </tr>
    <?php
    foreach($noteList as $note) {
        print '<tr>';
        print '<td>' . $note->getId() . $space . '</td>';
		print '<td>' . $note->getAuthor() . $space . '</td>';
		print '<td><a href="show.php?id=' . $note->getId() . '">'. $note->getSubject() .'</a></td>';
        print '<td>' . $note->getMessage() . $space . '</td>';
		$filename = 'Data\data.txt';
		if (file_exists($filename)) 
		{
			print '<td>' . date ("l F, Y \- g:i:s a", filemtime($filename)) . '</td>';
		} 
        print '</tr>';
    }
    ?>
</table>
<p><a href="create.php">Add New Note</a></p>
</body>
</html>