<?php
// legge da un array Associativo senza errori, al limite stringa vuota 
function getArr($A,$index){
	$ret="";
   if( isset( $A[$index] ) ) $ret=$A[$index];
   return $ret;
}
?>
