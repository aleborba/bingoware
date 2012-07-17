

/** entsub()
/* function used to inform the user that pressing the enter key in the field
* does not submit the form.
* This problem is present with IE only in forms that have one field. Pressing enter
* in the field does not submit the form, the user has to press the submit button 
* with the mouse.  Opera 6 does not behave the same way.
*/
function entsub(objref) {
  if (window.event && window.event.keyCode == 13) {
    
    alert("Your browser requires that you press the Generate! button");

   }
  else
    return true;
}

/** RestartConfirmation()
* This function presents a confirmation dialog before 
* restarting the game
*/
function RestartConfirmation( numberinplay) {
//without the parameters, the page title and number of cards in play are lost when restarting the game

if (confirm("Are you sure you want to go restart the game?"))  {
	location.href='index.php?action=play&numberinplay='+numberinplay+'&restart=1';
	} 
}

/** ConfigConfirmation()
* This function presents a confirmation dialog before 
* accepting the changes in the configuration form
*/
function ConfigConfirmation() {
	//validation of the setid: only alphanumerical characters or hyphens
	//the setID variable is used in the file naming convention, change with care
	var bag="0123456789ABCDEFGHIJKLMNOPQRSTVWXYZabcdefghijklmnopqrstuvwxyz-";
	var setID = stripCharsNotInBag (document.configForm.setidform.value, bag);
	
	//if setID is left blank, change to the default "A"
	if (setID=="") setID="A"
	
	document.configForm.setidform.value = setID;
		
	if (confirm("Changing the configuration will restart the game.  Proceed?"))  {
		return true;
	} else return false;
}

/**  function stripCharsNotInBag()
* Removes all characters which do NOT appear in string bag
* from string s.
*
* funtion borrowed from http://developer.netscape.com/docs/examples/javascript/formval/FormChek.js
*/
function stripCharsNotInBag (s, bag)

{   var i;
    var returnString = "";

    // Search through string's characters one by one.
    // If character is in bag, append to returnString.

    for (i = 0; i < s.length; i++)
    {  
        // Check that current character is in the bag.
        var c = s.charAt(i);
        if (bag.indexOf(c) != -1) returnString += c;
    }

    return returnString;
}

/** validate_number()
* This function validates the user entry in manual mode and verify lengths, 
* letters, digits and range
*/
function validate_number(maxColumnNum){
	var digits="0123456789";
	var letters=document.random.letters.value;
	var temp, number, minlim, maxlim;


	//verifying that the length is not 0 or more than 3
	if (document.random.enterednumber.value=="" || document.random.enterednumber.value.length>3) {
		alert("Please enter the drawn number in the form N45\nYou can choose one of the following letters: "+letters);
		return false;
	}

	//verifying that everything after the first character is a digit
	for (var i=1;i<document.random.enterednumber.value.length;i++){
		temp=document.random.enterednumber.value.substring(i,i+1);
		if (digits.indexOf(temp)==-1){
		alert("Please enter the drawn number in the form N45\nYou can choose one of the following letters: "+letters);
			return false;
	    }
	 }
	
	//verifying that the letter is really an acceptable letter
	if ((letters.indexOf(document.random.enterednumber.value.substring(0,1).toUpperCase()))==-1) {
		alert("Please enter the drawn number in the form N45\nYou can choose one of the following letters: "+letters);
		return false;
	}
	
	//verifying the number (one or last two digit) is within the range for the letter submitted
	number = document.random.enterednumber.value.substring(1,document.random.enterednumber.value.length);
	minlim = letters.indexOf(document.random.enterednumber.value.substring(0,1).toUpperCase())*maxColumnNum+1;
	maxlim = (letters.indexOf(document.random.enterednumber.value.substring(0,1).toUpperCase())+1)*maxColumnNum;
		
	if ((number < minlim) || (number > maxlim)) {
		alert("The range allowed for the letter "+document.random.enterednumber.value.substring(0,1).toUpperCase()+" is between "+minlim+" and "+maxlim);
		return false;
	}
	
	// well if it made it here, then it's good!		
	return true
}


/** clickcell()
* This function modify the winningpattern string and inverts the colour
* of the cell that was clicked
*/
function clickcell(colorstring, squareid) {
		
		var secret = document.mainform.hiddenfield.value;
				
		//different browsers handle colours differently: IE returns a string (silver), Opera
		//returns an hexadecimal code.  Netscape untested
		if (colorstring=='#c0c0c0' || colorstring=='silver') {
			
			//code to modify winning pattern string
			secret += (squareid+";");  //the order doesn't matter, the string is not parsed sequentially
			document.mainform.hiddenfield.value = secret;
			
			return '#eeee00';
		}
		
		else { 
			
			//code to modify winning pattern string
			
			document.mainform.hiddenfield.value = replaceSubstring(secret,squareid+";","");
			return 'silver';
		
		}
}


/** replaceSubstring()
* function borrowed from http://www.breakingpar.com
* This function allows the replacement of a substring within a string
*/
function replaceSubstring(inputString, fromString, toString) {
   // Goes through the inputString and replaces every occurrence of fromString with toString
   var temp = inputString;
   if (fromString == "") {
      return inputString;
   }
   if (toString.indexOf(fromString) == -1) { // If the string being replaced is not a part of the replacement string (normal situation)
      while (temp.indexOf(fromString) != -1) {
         var toTheLeft = temp.substring(0, temp.indexOf(fromString));
         var toTheRight = temp.substring(temp.indexOf(fromString)+fromString.length, temp.length);
         temp = toTheLeft + toString + toTheRight;
      }
   } else { // String being replaced is part of replacement string (like "+" being replaced with "++") - prevent an infinite loop
      var midStrings = new Array("~", "`", "_", "^", "#");
      var midStringLen = 1;
      var midString = "";
      // Find a string that doesn't exist in the inputString to be used
      // as an "inbetween" string
      while (midString == "") {
         for (var i=0; i < midStrings.length; i++) {
            var tempMidString = "";
            for (var j=0; j < midStringLen; j++) { tempMidString += midStrings[i]; }
            if (fromString.indexOf(tempMidString) == -1) {
               midString = tempMidString;
               i = midStrings.length + 1;
            }
         }
      } // Keep on going until we build an "inbetween" string that doesn't exist
      // Now go through and do two replaces - first, replace the "fromString" with the "inbetween" string
      while (temp.indexOf(fromString) != -1) {
         var toTheLeft = temp.substring(0, temp.indexOf(fromString));
         var toTheRight = temp.substring(temp.indexOf(fromString)+fromString.length, temp.length);
         temp = toTheLeft + midString + toTheRight;
      }
      // Next, replace the "inbetween" string with the "toString"
      while (temp.indexOf(midString) != -1) {
         var toTheLeft = temp.substring(0, temp.indexOf(midString));
         var toTheRight = temp.substring(temp.indexOf(midString)+midString.length, temp.length);
         temp = toTheLeft + toString + toTheRight;
      }
   } // Ends the check to see if the string being replaced is part of the replacement string or not
   return temp; // Send the updated string back to the user
} // Ends the "replaceSubstring" function


/** explain()
* Context-sensitive help
* This function is used to present a popup window that provides the user
* further explanation about the item requested.
*/
function explain(item) {
	
	var height = 280;  //default height
	var width = 350;  //default width
	
	if (item=="Set ID") { 
		msg = "The set ID is a unique identifier given to your set of cards. " +
		" The set ID will always prefix the card numbers when displayed on screen or printed out.<br><br>"+
		" You can have several sets of cards saved on the computer, which will remain untouched, simply" +
		" by changing the set ID (in config mode) to a different letter or word.  For example, if you generate  "+
		" a set 'A' of 10 cards, the cards will be numbered A0001-A0010.  Once set 'A' is generated, you can change "+
		" the set ID to 'Freddy-' and generate a new set of 20 cards (numbered Freddy-0001 to Freddy-0020).  The "+
		" original set remains untouched.<br><br> This feature is very useful if you want to personalize several sets " +
		" of cards.  It also allows you to reload a previously generated set of cards.<br><br>"+
		" Only alphanumerical characters, or hyphens, will be retained for your set ID. Leaving the field blank will return to " +
		" the default letter A.";
		height=540;
	} else if (item=="Winning Pattern") { 
		msg = "The winning pattern tells Bingoware what you want the winning cards to look like.<br><br> " +
		" Bingoware lets you choose from 11 different styles of winning patterns, and lets you customize "+
		" 10 of them.  Of course, we have given you the normal winning pattern which most people will use.<br><br> " +
		" In the normal winning pattern, any row, column or diagonal wins! " +
		" The names given to the other winning patterns don't actually mean much, since you can customize " +
		" any of them the way you like.<br><br>"+
		" To customize a winning pattern, simply click on the customize link beside the winning pattern you " +
		" want to change, a window will pop up and let you color which squares you want the winning card to have. <br><br>" + 
		" Have fun! Make your Bingo special!";
		height=530;
	} else if (item=="Draw Mode") { 
		msg = "Most users will use the automatic draw mode, which means that Bingoware will " +
		" draw the numbers for you.<br><br>"+
		" However, some users may already have a random number generating mechanism they would like" +
		" to keep using, such as a barrel with numbered balls.  Bingoware will let you enter the"+
		" numbers that were drawn and still perform the card validation for you. <br><br>"+
		" The manual mode will ask you the numbers instead of giving you the numbers.  Note that"+
		" Bingoware thoroughly checks the number you enter so that no mistakes are made!";
		height=430;
	} else if (item=="Cards in play") { 
		msg = "In game mode, the software will open the current set of cards (as indicated" +
		" by the setid variable in the config mode).  If you do not distribute all the cards you generated," +
		" because for instance you did not get the crowd you expected or are charging to much for you cards," +
		" then you can tell Bingoware not to consider all the cards.  <br><br>The trick is to issue out your cards in"+ 
		" sequential order, and enter the number of the last card given away in the box.  You can"+
		" always change the number throughout the game if you gain or lose some people.  Bingoware will simply" +
		" not announce winning cards numbers that are still in your hands.";
		height=450;	
	} else if (item=="Hint") { 
		msg = "You can easily add a link to close the window in the header or footer, by inserting this line here: <br>" +
		" <pre>&lt;br&gt;&lt;p align=&quot;center&quot;&gt;&lt;a href=&quot;javascript:window.close();&quot;&gt;close window&lt;/a&gt;&lt;/p&gt;</pre>";
		height=250;
		width=600;
	} else if (item=="Free Squares") { 
		msg = "Bingoware gives you some flexibility when generating your set of cards." +
		" You can choose to have a free square in the center of every card (will not help for winning" +
		" patterns such as the perimeter of the Bingo card), no Free squares at all (slightly longer games)" +
		" or a randomly placed free square on all cards (all cards are different).";
		height=300;	
	} else if (item=="Name File") { 
		msg = "Bingoware allows you to customize each card by writing the name of" +
		" a person on each card.  Simply place a list of names in the file called" +
		" '<b>names.txt</b>' in the '<b>config</b>' folder, without any blank lines at the end," +
		" using Notepad, and check this box, Bingoware will print a different name" +
		" at the bottom each card.";

	} else if (item=="Print Rules") { 
		msg = "If your printer can print double-sided, this option will allow you to print" +
		" the rules of the game at the back of each card!  You can of course customize the rules" +
		" file (file called '<b>rules.html</b>' in the <b>'config'</b> folder) to suit your needs";

	} else if (item=="Four per page") { 
		msg = "When printing the cards, you have the otion of printing only one card per page or printing" +
		" four cards per page.  The rest of the program is unaffected.  The only difference is seen" +
		" when printing the cards, that is when choosing  <b>show all</b>.";

	} else if (item=="Colours") { 
		msg = "You now have the option of changing the colours of the cards from this configuration"+
		" screen.  The header colours are the colours used to show the B.I.N.G.O. letters on the top" +
		" top of the cards.  The selected and non-selected colours are the colours used to display the" +
		" numbers that have already been drawn and the free squares, or the numbers that have not been"+
		" drawn, respectively.  Use the colour chooser to find a colour that you like.";
		height=320;	
	} else if (item=="Border colour") { 
		msg = "The table border colour, is not supported by the Opera browser, up to and including Opera 7.21."+
		" The table border will always be black when viewed with Opera";
		height=230;
	}		
	newwin = window.open('','','top=30,left=70,width='+width+',height='+height);
	if (!newwin.opener) newwin.opener = self;
	with (newwin.document){
		open();
		write('<html>');
		write('<head><title>Help on '+item+'</title></head>');
		write('<body><h1>' + item + ':</h1><br>'+ msg + '<br>');
		write('<br><p align="center"><a href="javascript:close()">close</a>');
		write('</body></html>');
		close();
	}
}
