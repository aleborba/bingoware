<?
include_once ("include/constants.php");

/* -------------- User configuration ------------- */


/* the variable setid allows the user to create different sets of cards
* The setid will appear in front of the card number: for example, if choosing
* setid to be 'A', the cards will be numbered from A0001 to ...
* The setid is also used with the filenames so that the user can transfer sets from
* one server to the next.  It also prevents the specific sets from being overwritten.
* The files will be named set.A.dat, winners.A.dat, and draws.A.dat.  If no file is found
* with the current setid, the user will be invited to generate a new set.
* Therefore if the user wants to keep the current set untouched, a simple change to the
* variabe below will behave as if there was no set generated.  Changing the setid back
* to the original will force the program to reopen the previous card set.
*/
$setid='A';

/* Pagetitle
* The pagetitle displayed on the top of the browser window can be changed as well.
* As of version 1.5, the page title cannot be changed by a crafted URL.
*/
$pagetitleconfig='Welcome to Bingoware';

//if pagetitleconfig empty, set to version number
$pagetitle =($pagetitleconfig =='')?$version:$pagetitleconfig;

/* This parameter allows the user to choose the winning criterias, according to the
* following codes:
*
* 0: regular Bingo rules (any row, any column or any diagonal)
* 1: full card
* 2: square (perimeter)
* 3: cross (squares I-0, N-All, G-0)
* 4: T shape (squares All-0, N-All)
* 5: Z shape (squares All-0, All-4, G-1, N-2, I-3)
* 6: N shape (squares B-All, O-All, I-3, N-2, G-1)
* 7: + shape (squares N-All, All-2)
* 8: X shape (two diagonals)
* 9: Box shaped (all but perimeter)
* 10: User-defined winning pattern
*
* NOTE: Changing the winning pattern in the middle of a game will produce undesired results
*/
$winningpattern0='on';
$winningpattern1='on';
$winningpattern2='';
$winningpattern3='';
$winningpattern4='';
$winningpattern5='';
$winningpattern6='';
$winningpattern7='';
$winningpattern8='';
$winningpattern9='';
$winningpattern10='';

$winningpatternarray = array ($winningpattern0,$winningpattern1, $winningpattern2, $winningpattern3, $winningpattern4,
$winningpattern5, $winningpattern6, $winningpattern7, $winningpattern8, $winningpattern9, $winningpattern10);

/* Name File
* The game can read a list of names from a text file and display the names on each of the cards.
* This feature is ideal for people that would like to customize the cards by printing each
* person's name on the cards.  The file name must be a text file without blank lines name
* names.A.dat where A is the applicable setID.  If the number of names is smaller than
* the number of generated cards, the remaining cards will not have a name.  If the number
* of names is greater than the number of cards, the remaining names will not be considered.
*/
$namefile='';

/* Print Rules
* Bingoware will insert a rules page between each card when viewing for printing is this option
* is selected.  The rules file must be called rules.txt and is best used when your printer
* is set to print double-sided
*/
$printrules='';


/* Draw Mode
* The game play mode can be "automatic" or "manual", and indicates how the random bingo numbers
* are generated.  For Bingoware to draw the numbers for you, use "automatic".  If you are
* using a different physical device to draw the numbers for you, the "manual" setting will
* let you enter the drawn numbers into Bingoware so that you can still discover which are
* the winning cards.
* Changing of this setting should be done from the configure menu item.
*/
$drawmode='automatic';

/* Four Per Page
* When printing the cards, you have the otion of printing only one card per page or printing
* four cards per page.  The rest of the program is unaffected.  The only difference is seen
* when printing the cards, i.e., show all.
*/
$fourperpage='';

/* View header
* This variable may contain HTML and will be printed at the top of each
* page viewed (when viewing one card)
* You should ensure to close your HTML tags so you do not disrupt the display
* of the cards.
*/
$viewheader='<center><b><font size="+4">B I N G O</font></b></center>';

/* View footer
* This variable may contain HTML and will be printed at the bottom of each
* page viewed (when viewing one card)
* You should ensure to close your HTML tags so you do not disrupt the display
* of the cards.
*/
$viewfooter='<center><b>Created with Bingoware 1.5</b><br><br><a href="javascript:window.close();">close window</a></center>';


/* Print header
* This variable may contain HTML and will be printed at the top of each
* page (when viewing all cards)
* You should ensure to close your HTML tags so you do not disrupt the display
* of the cards.
*/
$printheader='<center><b><font size="+6">Bingo Card</font></b></center>';


/* Print footer
* This variable may contain HTML and will be printed at the bottom of each
* page (when viewing all cards)
* You should ensure to close your HTML tags so you do not disrupt the display
* of the cards.
*/
$printfooter='<center><b><font size="-1">Created with Bingoware 1.5</font></b></center>';


/* color settings
* Several users have expressed their difficulty in changing font colours and background colors for display
* and printing of the cards. Fear no more!  You can change the colours right from the configuration page now.
*
*/

$headerfontcolor='#CC00CC';
$headerbgcolor='#3333FF';
$mainfontcolor='#0000CC';
$mainbgcolor='#9999FF';
$selectedfontcolor='#FF0000';
$selectedbgcolor='#FFFF66';
$bordercolor='#000000';

?>
