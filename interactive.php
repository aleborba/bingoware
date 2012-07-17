<? 
include_once("include/functions.php");

?>
<html>
<head>
<title>Interactive Bingo Card</title>

<script language="JavaScript" src="include/scripts.js">
</script>
</head>
<body bgcolor="#FFFFFF">
<? if (isset($_POST["submit"])) {
		
		//the hiddenstring variable is passed automatically to this script
		//when the user submits the form.
		//the call to this function will update the first card of the 
		//previewpatterns set and resave the set.
		//the script closes the window also.
		
		update_winning_patterns($_POST["hiddenfield"], $_GET["cardnumber"]-1);
		?>
		<script language="JavaScript">
		window.close();
		</script>
	<? } else { 
		
		
		
		?>
		<center><b><font size=+2><p>Customized the winning pattern by clicking on the appropriate squares:</p></font></b></center>
		<br><center>
		
		<? 
		//the display_interactive_card() function also returns a string composed of all the
		// checked cell in the first card (0) of the previewpatterns set.
		//this string is entered in the hidden field
		$hiddenfield = display_interactive_card($_GET["cardnumber"]-1); ?>
		<br>
		<form name="mainform" action="interactive.php?cardnumber=<? echo $_GET["cardnumber"]; ?>" method="post">
		<p align="center">
		<input type="hidden" name="hiddenfield" value="<? echo $hiddenfield; ?>">
		<input type="submit" name="submit" value="Accept">
		<input type="button" onClick="javascript:window.close()" value="Cancel">
		</form>
	<? } ?>
</html>