	   
	   <? if (isset($_POST["submit"]) && isset($_POST["numcard"]) && ($_POST["numcard"]>1) && ($_POST["numcard"]<$MAX_LIMIT)) {
	   		restart(); //clears winners and draws
			@unlink("sets/set.".$setid.".dat");
	   		generate_cards($_POST["numcard"], isset($_POST["freesquare"])?$_POST["freesquare"]:2);	   	
		   	echo '<p><img src="images/gc.gif"><br><br><font size="4"><b>'.$_POST["numcard"]. ' cards generated!</b></font></p>';
	   	} else {
	   ?>
	   <p><img src="images/gc.gif"><br><br>(Set ID: <? echo $setid; ?>)&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:explain('Set ID')">help?</a></p>
	   <form action="index.php?action=generate" method="post">
	   Enter the number of Bingo cards desired (between 1 and <? echo $MAX_LIMIT; ?>): 
	   &nbsp;&nbsp;&nbsp;<input type="text" name="numcard" maxlength="5" size="4" onkeypress="return entsub(this.form)"><br>
	   <br>
	   Free Squares Mode: &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:explain('Free Squares')">help?</a><br>
	   <table border="1"><tr><td>
	   <input type="radio" name="freesquare" value="0">&nbsp;&nbsp;&nbsp;No "Free" Squares
	   <br>
	   <input type="radio" name="freesquare" value="1" checked>&nbsp;&nbsp;&nbsp;"Free" Squares in the center of every card
	   <br>
	   <input type="radio" name="freesquare" value="2">&nbsp;&nbsp;&nbsp;"Free" Squares randomly placed on every card
	   </td></tr></table>
	   
	   &nbsp;&nbsp;&nbsp;<br><input type="submit" value="Generate!" name="submit">
	   
	   </form>
	   
	   <?
	}
	?>
