<?php
require_once 'Note.php';
require_once 'FileNoteRepository.php';

//Shortend Post variable names if set
$noteAuthor = isset($_POST['author']) ? htmlspecialchars(trim($_POST['author'])) : '';
$noteSubject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
$noteMessage = isset($_POST['message']) ? htmlspecialchars(($_POST['message'])) : '';
$noteTimeS = isset($_POST['timeS']) ? $_POST['timeS'] : '';

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Write a new note</title>
</head>
<body>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <?php if ($formIsValid): ?>
            <?php
            $noteRepo = new NoteEdit\FileNoteRepository();
            $note = new NoteEdit\Note();
            $note->setAuthor($noteAuthor);
            $note->setSubject($noteSubject);
			$note->setMessage($noteMessage);
			$note->setTime($noteTimeS);
            $noteRepo->saveNote($note);
            ?>
            <h1>New Note Taken</h1>
            <p>Author: <?php print $noteAuthor; ?></p>
            <p>Subject: <?php print $noteSubject; ?></p>
			<p>Message: <?php print $noteMessage; ?></p>
			<?php $note->setTime(date('l F, Y \- g:i:s a')); 
			$noteTimeS = $note->getTime();?>
			<p>Created: <?php print $noteTimeS; ?></p>
            <p><a href="index.php">Show All Notes</a></p>
        <?php else: ?>
            <h1>Create New Note</h1>
            <form method="post" action="create.php">
				<label>Author: <input type="text" name="author" value="<?php print $noteAuthor; ?>"></label><?php print $authorErr; ?><br>
                <label>Subject: <input type="text" name="subject" value="<?php print $noteSubject; ?>"></label><?php print $subjectErr; ?><br>
                <label>Message: <textarea cols="40" rows="6" name="message" value="<?php print ($_POST['message']); ?>"></textarea></label><br>
                <input type="submit" value="Save Note">
            </form>
        <?php endif; ?>
    <?php else: ?>
    <h1>Create New Note</h1>
        <form method="post" action="create.php">
			<label>Author: <input type="text" name="author"></label><br>
            <label>Subject: <input type="text" name="subject"></label><br>
			<label>Message: <textarea cols="40" rows="6" name="message"></textarea></label><br>
            <input type="submit" value="Save Note">
        </form>
    <?php endif; ?>
</body>
</html>