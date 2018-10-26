<?php
$isfvalid = false;
$islvalid = false;
$isevalid = false;
$fNameError = '';
$lNameError = '';
$emailError = '';
if (isset($_POST['firstName']) && trim($_POST['firstName']) != '' ) {
	$fnamevalue = 'First name: ' . htmlspecialchars($_POST['firstName']);
	$lnamevalue = 'Last name: ' . htmlspecialchars($_POST['lastName']);
	$enamevalue = 'Email: ' . htmlspecialchars($_POST['email']);
	$isfvalid = true;
} else {
	$fNameError = 'first name is Required';
}
if (isset($_POST['lastName']) && trim($_POST['lastName']) != '' ) {
	$namevalue = 'Last name: ' . htmlspecialchars($_POST['lastName']);
	$islvalid = true;
} else {
	$lNameError = 'last name is Required';
}
if (isset($_POST['email']) && trim($_POST['email'])!= '' ) {
	$namevalue = 'Email: ' . htmlspecialchars($_POST['email']);
	$isevalid = true;
} else {
	$emailError = 'email is Required';
}
?>
<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>Form</title>
</head

<body>
		<h1>Form</h1>
		<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($isfvalid && $islvalid && $isevalid) {
				echo $fnamevalue; ?> <br> <?php
				echo $lnamevalue; ?> <br> <?php
				echo $enamevalue; ?> <br> <?php
				if (isset($_POST['gender_field']) && $_POST['gender_field'] != '' )
				{
					echo "Gender: " . $_POST['gender_field']; ?> <br> <?php
				}
				else 
				{
					echo "";
				}
				if (isset($_POST['comments_field']) && trim($_POST['comments_field']) != '' )
				{
					echo "Comment: " . htmlspecialchars($_POST['comments_field']); ?> <br> <?php
				}
				else 
				{
					echo "";
				}
				date_default_timezone_set('America/Chicago');
				echo "Submitted: " . date('d M Y \- g:i:s a');
			} else {
				?>
				<form action="#" method="post">
					<input type="text" maxlength="15" name="firstName" value="<?php echo $_POST['firstName'] ?>" ><?php echo $fNameError; ?><br/>
					<input type="text" maxlength="15" name="lastName" value="<?php echo $_POST['lastName'] ?>" ><?php echo $lNameError; ?><br/>
					<input type="text" maxlength="25" name="email" value="<?php echo $_POST['email'] ?>" ><?php echo $emailError; ?><br/>
					<label>Male<input type="radio" name ="gender_field" value="M"<?php if ($_POST['gender_field'] == 'M') echo 'checked'; ?> ></label>
					<label>Female<input type="radio" name ="gender_field" value="F"<?php if ($_POST['gender_field'] == 'F') echo 'checked'; ?> ></label>
			<textarea cols="40" rows="6" name="comments_field"><?php if(isset($_POST['comments_field'])) {  echo htmlentities ($_POST['comments_field']); }?></textarea>
					<input type="submit">
				</form>
				<?php
			}
		} else {
			?>
			<form action="#" method="post">
				<input type="text" maxlength="15" name="firstName" placeholder="First Name">
				<input type="text" maxlength="15" name="lastName" placeholder="Last Name" >
				<input type="text" maxlength="25" name="email" placeholder="Email" >
				<label>Male<input type="radio" name ="gender_field" value="M"></label>
				<label>Female<input type="radio" name ="gender_field" value="F"></label>
				<textarea cols="40" rows="6" name="comments_field" placeholder="Type comments here"></textarea>
				<input type="submit">
			</form>
			<?php
		}
	?>
		<a href="index.php" id="log">Back</a>
</body>

</html>