<?
/* Constants: 
* you can change these values at will
*/
$date_lastmod = "10 December 03";
$version= " v 1.5";
$bingoletters = array("B", "I", "N", "G", "O");
$patternkeywords = array("Normal","Four Corners","Cross-Shaped","T-Shaped","X-Shaped","+ Shaped","Z-Shaped", "N-Shaped", "Box Shaped", "Square Shaped","Full Card");

/* This constant allows one to run a modified bingo up to 50 or 100. 
* Note, the value must be a multiple of 5 (because there are 5 columns)
* Each column will allow a subset of this number; i.e. with a standard bingo of 75, 
* numbers 1-15 will only ever be found within column 1.
* Note: if you generate a set of card with a given maxNumber, and then attempt to 
* open the set of cards with a new maxNumber, unexpected results will occur
* Ensure you set this value to the set's original value.
*/
$maxNumber = 75; 

//internal constant - do not modify
$maxColumnNumber = $maxNumber/5;

/* This is the maximum number of Bingo cards generated.  There is no theorical limit,
* but you should be aware that each card is approx 1.5k in size when the set
* is written to the Hard Disk.  Therefore, the execution time will slow down rapidly
* with very large numbers.  The set is rewritten each time a number is drawn.
* Ensure you adjust your script maximum execution time and memory usage in php.ini
* if required.
*/
$MAX_LIMIT = 5000;

/* with a lot of cards, the script often exceed the 
* maximum execution time set in the php.ini file.
*/
set_time_limit(0); 


?>