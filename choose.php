	   
	   <p><img src="images/vc.gif"></p>
	   <? 
		if (!set_exists()) exit;
		else $numbercards = card_number();
	   ?>
	   <table width =300 cellspacing=5>
	   <tr><td colspan=15 align=left><a href="print.php" target=_blank>Show All Cards</a> (for printing)<br><br></td></tr>
	   <tr>
	   <?
		
	   
	   for ($i =0; $i <$numbercards; $i++) {
	   	//we pretend it is really cardnumber+1 for user friendliness
	   	echo '<td width=20><a href="view.php?cardnumber='.($i+1).'" target=_blank>'.($i+1).'</a></td>'."\n";
	   	if (($i+1)%15 == 0) echo "</tr><tr>";  //every 15 but not 0
	   	
	   }
	 	 ?>
	 	 </tr></table>
