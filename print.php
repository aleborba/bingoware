<? include_once("include/functions.php"); ?>
<html>
<head>
<title>View all cards</title>
</head>
<body>
<p>
<?	   
	   $numcards = card_number();
	   
	   for ($i=0; $i<$numcards; $i++) {
	   	echo $printheader."<br>";
						//transforms the $fourperpage string into a boolean
	   	display_card($i,($fourperpage=='on'),$namefile,$printrules);
	   	echo "<br>".$printfooter;
	   	if ($fourperpage=='on') $i+=3; //step through
   				
		//if not last card (when $i+3 = $numcards-1) then print page break instructions.
		if ($i < ($numcards-1)) echo '</p><p style="page-break-before: always">'; else echo "</p>";
		} ?>
   
 
 </body>
 </html>
