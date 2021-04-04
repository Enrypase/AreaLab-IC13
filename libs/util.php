<?php
if (!isset($_SESSION['username'])){
	$_SESSION['username'] = '';
}
function getArr($A,$index){
	$ret="";
   if( isset( $A[$index] ) ) $ret=$A[$index];
   return $ret;
}
?>
