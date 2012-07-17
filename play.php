	   <p><img src="images/pb.gif"></p>
	   <? 
		if (!set_exists()) exit;
		else $numbercards = card_number();
		
		//The number in play is used if not all cards are distributed
		//If no number is registered, or if the number exceeds the maximum,
		//it is reverted to the maximum, meaning all cards generated for that set are
		//in play.
		$numberinplay=$numbercards; 
		
		if (isset($_POST["numberinplay"]) && $_POST["numberinplay"]<=$numbercards) $numberinplay = $_POST["numberinplay"];
		
		//debug
		//echo $numbercards."<br>";
		//echo $numberinplay."<br>";
		
	   ?>
	   <form name="random" method="post" action="index.php?action=play&numberinplay=<?echo $numberinplay;?>" onSubmit="return validate_number(<? echo $maxColumnNumber; ?>)">
	   
	   <table width="75%" border="0"><tr><td width="180">
	   	
	   	<table border=1 width="60%" cellpadding="4"><tr><td width="90%" align="center" <? echo ($drawmode=="automatic")?'background="images/drawball.gif"':''; ?>>
	   	<? 
	   		echo '<input type="hidden" name="letters" value="'.$bingoletters[0].$bingoletters[1].$bingoletters[2].$bingoletters[3].$bingoletters[4].'">';	
	   		if (isset($_POST["gimme"]) && $drawmode=="automatic") echo '<br><font size=6 color="#000000"><b>'.random_number($numberinplay).'</b></font><br>';
	   		else if ($drawmode=="automatic") echo '<br><font size=6 color="#000000"><b>???</b></font><br>';
	   		if (isset($_POST["gimme"]) && $drawmode=="manual") submit_number($_POST["enterednumber"],$numberinplay);
	   		
	   		if (isset($_GET["restart"])) restart();
	   		$draws=load_draws();
	   		
	   		if ($drawmode=="manual" && (count($draws)<$maxNumber)) {
	   			echo '<body onLoad="document.random.enterednumber.focus()">Enter a number:<br><br><input tabindex="0" type="text" name="enterednumber" size="5" maxlength="3">&nbsp;&nbsp;&nbsp;&nbsp;(eg. '.$bingoletters[0].'4)<br></body>';
	   		} else {
	   			echo '<input type=hidden name=enterednumber value="'.$bingoletters[0].'1">'; //in automatic mode, use a hidden field with same name to avoid error msgs
	   		}
	   		 ?>
	   	<br>
	   		
	   	<? 
	   	if (count($draws)<$maxNumber)  //all numbers have been drawn, clicking the button would
	   	//make the program go into an infinite loop.
	   		if ($drawmode=="automatic") {
	   			echo '<input name="gimme" type="submit" value="Give Me a Number!">';
	   		} else {
	   			echo '<input name="gimme" type="submit" value="Enter!">';
	   		}
	   	else echo '<input name="emty" type="submit" value="All numbers drawn!">';
	   	?>
	   	</td></tr></table>
	   	
	   	<br>
	   	<input name="restart" type="button" value="Restart Game" onClick="RestartConfirmation(<? echo $numberinplay;?>)">
	   	
	   	
	   	</td><td rowspan=2 width="70%" valign=top>
	   	<b>Number of cards in play:</b> <input name="numberinplay" type="text" size="4" value="<? echo $numberinplay; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:explain('Cards in play')">help?</a>
	   	<br><br><font size="-1">(This set has a maximum of <? echo $numbercards; ?> cards)</font><br>
	   	<? echo '<font color="#FF5555"><b>Numbers drawn so far ('.count($draws).' of 75):</b></font><br><br>';
	   		draws_table();
	   	?>
	   	</td></tr>
	   	<tr><td width="50%" valign="top">
	   	<? echo '<br><font color="#FF5555"><b>Winning Card Numbers:</b><br> (New Numbers in Red)</font><br><br>';
	   		winners_table(); ?>
	   	</td></tr></table></form>
	   	
	    
	   
	   
