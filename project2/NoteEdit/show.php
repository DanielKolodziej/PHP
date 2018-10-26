<?php

require_once 'FileNoteRepository.php';
require_once 'Note.php';

$noteRepo = new NoteEdit\FileNoteRepository();

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
<p>
    <form action="edit.php" method="POST">
        <input type="hidden" name="id" value="<?php print $note->getId();?>">
        <input type="submit" value="Edit Note">
    </form>
</p>
<p>
    <form action="delete.php" method="POST">
        <input type="hidden" name="id" value="<?php print $note->getId();?>">
        <input type="submit" value="Delete Note">
    </form>
</p>
</body>
</html>
<?php else: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>No Note To Show</title>
</head>
<body>
<h1>No Note Found</h1>
  <a href="index.php">Back to Note List</a>
</body>
</html>
<?php endif; ?>
