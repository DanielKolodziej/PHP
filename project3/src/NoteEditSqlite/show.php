<?php

require_once 'SqliteNoteRepository.php';
require_once 'Note.php';

$noteRepo = new NoteEditSqlite\SqliteNoteRepository();

//Shortend Get variable names if set
$noteId = isset($_GET['id']) ? $_GET['id'] : '';

$note = $noteRepo->getNoteById($noteId);

?>

<?php if ($note): ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Song <?php print $note->getSubject(); ?></title>
</head>
<body>
<p>Author: <?php print $note->getAuthor();?></p>
<p>Subject: <?php print $note->getSubject();?></p>
<p>Message: <?php print $note->getMessage();?></p>

    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php print $note->getId();?>">
        <input type="submit" value="Edit Note">
    </form>


    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php print $note->getId();?>">
        <input type="submit" value="Delete Note">
    </form>

<a href="index.php">Back to Note List</a>
</body>
</html>
<?php else: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="proj3.css">
<title>No Note To Show</title>
</head>
<body>
<h1>No Note Found</h1>
  <a href="index.php">Back to Note List</a>
</body>
</html>
<?php endif; ?>
