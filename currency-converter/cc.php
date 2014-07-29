<?php

/*
 * 	Author:		Jarrod Oberto
 * 	Date:		Jun 2011
 *  Version:	1.0
 *  
 *     ===================================================================
 *			     This is a demo file to help you get started
 *					It shows the code for the online demo
 *     ===================================================================
 *
 */

// *** Enable these when in development
//ini_set('display_errors',1);
//error_reporting(E_ALL | E_STRICT);


include("currency_convert_class.php");

$result = '';
//print_r($_REQUEST);
// *** If form submitted
if (isset($_REQUEST['amt']) && $_REQUEST['currency'] != '') {
	
	$amount = $_REQUEST['amt'];
	$from = $_REQUEST['currency'];	
	$to= "USD";
	//$to = $_REQUEST['currency'];

	$convertObj = new CurrencyConvert();
	$result = $convertObj -> currencyConvert($amount, $from, $to);
	echo $result;
}

?>