<?php

require_once 'Note.php';
require_once 'SqliteNoteRepository.php';

$noteRepo = new NoteEditSqlite\SqliteNoteRepository();

?>


<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])): ?>

    <?php
    // Came from show page based on id parameter
    $note = $noteRepo->getNoteById($_POST['id']);
     ?>
     <h1>Edit Note</h1>
        <form method="post" action="edit.php">
            <input type="hidden" name="noteId" value="<?php print $_POST['id']; ?>">
            <label>Author: <input type="text" name="author" value="<?php print $note->getAuthor(); ?>"></label><br>
            <label>Subject: <input type="text" name="subject" value="<?php print $note->getSubject(); ?>"></label><br>
            <label>Message: <textarea cols="40" rows="6" name="message" value="<?php print $note->getMessage(); ?>"></textarea></label><br> 
            <input type="submit" value="Save Note">
        </form>

<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['noteId'])): ?>

    <?php
    // Process edit form
    //Shortend Post variable names if set
    $noteAuthor = isset($_POST['author']) ? htmlspecialchars(trim($_POST['author'])) : '';
	$noteSubject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
	$noteMessage = isset($_POST['message']) ? $_POST['message'] : '';

	//Validate form fields
	$formIsValid = true;
	$authorErr = '';
	$subjectErr = '';
	if (empty($noteAuthor)){
		$formIsValid = false;
		$authorErr = '<span style="color: #f00;">Author is required!</span>';
	}
	if (empty($noteSubject)){
		$formIsValid = false;
		$subjectErr = '<span style="color: #f00;">Subject is required!</span>';
	}
    ?>
    <?php if ($formIsValid): ?>
        <?php
        //Process valid data and save note update
        $aNote = $noteRepo->getNoteById($_POST['noteId']);
        $aNote->setAuthor($noteAuthor);
		$aNote->setSubject($noteSubject);
        $aNote->setMessage($noteMessage);
        $noteRepo->saveNote($aNote);
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="proj3.css">
            <title>Update Note</title>
        </head>
        <body>
        <h1>Note Updated</h1>
        <p><a href="index.php">Back to Note List</a></p>
        </body>
        </html>
    <?php else: ?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
			<link rel="stylesheet" type="text/css" href="proj3.css">
            <title>Update Note</title>
        </head>
        <body>
        <h1>Edit Note</h1>
        <form method="post" action="edit.php">
            <input type="hidden" name="noteId" value="<?php print $_POST['noteId']; ?>">
            <label>Author: <input type="text" name="author" value="<?php print $noteAuthor; ?>"></label><?php print $authorErr; ?><br>
                <label>Subject: <input type="text" name="subject" value="<?php print $noteSubject; ?>"></label><?php print $subjectErr; ?><br>
                <label>Message: <textarea cols="40" rows="6" name="message" value="<?php print ($_POST['message']); ?>"></textarea></label><br>
            <input type="submit" value="Save Note">
        </form>
        </body>
        </html>
    <?php endif; ?>

<?php else: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="proj3.css">
    <title>Document</title>
    </head>
    <body>
      <h1>No Note Selected for Editing</h1>
      <p><a href="index.php">Back to Note List</a></p>
    </body>
    </html>
<?php endif;?>