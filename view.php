<? include_once("include/functions.php"); ?>
<html>
<head>
<title><? printf("Bingo Card Number %s%'04s",$setid,$_GET["cardnumber"]); ?>
</title>
</head>
<body>
<?	$names = load_name_file();   
	echo $viewheader."<br>";
	display_card($_GET["cardnumber"]-1,0,((($_GET["cardnumber"]-1<=count($names))&&$namefile)?$names[$_GET["cardnumber"]-1]:""));
	echo "<br>".$viewfooter;
 ?>
 </body>
 </html>
