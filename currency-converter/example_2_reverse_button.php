<?php

/*
 * 	Author:		Jarrod Oberto
 * 	Date:		Jul 2011
 *  Version:	1.0
 *  
 *     ===================================================================
 *			     This is a demo file to help you get started
 *					It shows the code for the online demo
 *
 *			Due to a request, the online demo file now has a "reverse" 
 *   		     button to switch the "to" and "from" values.
 *     ===================================================================
 *
 */

include("currency_convert_class.php");

// *** Initialise
$result = '';

// *** Set some defaults for the dropdowns
$amount = 100;
$fromKey = 'USD';
$toKey = 'NZD';

	
// *** Get data
$codesArray = file('supported_codes_and_countries.txt');
$selectArray = array();

// *** Pre data
foreach ($codesArray as $line) {
	$LinePieces = explode(' ', $line, 2);
	$selectArray[$LinePieces[0]] = $LinePieces[1] . ' (' . $LinePieces[0] . ')';		
}

// *** Sort list
asort($selectArray);


if (isset($_POST['submit'])) {

	$amount = $_POST['amount'];
	
	// *** Normal convert
	if ($_POST['submit'] == 'Convert') {

		$from = $_POST['convertFrom'];	
		$to = $_POST['convertTo'];

		// *** This is for the dropdown
		if (isset($_POST['convertFrom'])) {
			$fromKey = $_POST['convertFrom']; }

		// *** This is for the dropdown
		if (isset($_POST['convertTo'])) {
			$toKey = $_POST['convertTo']; }


	// *** If the reverse button is being used...
	} else if ($_POST['submit'] == 'Reverse') {

		// *** Reverse these
		$to = $_POST['convertFrom'];	
		$from = $_POST['convertTo'];

		// *** This is for the dropdown
		if (isset($_POST['convertFrom'])) {
			$toKey = $_POST['convertFrom']; }

		// *** This is for the dropdown
		if (isset($_POST['convertTo'])) {
			$fromKey = $_POST['convertTo']; }
	}

	$convertObj = new CurrencyConvert();
	$result = $convertObj -> currencyConvert($amount, $from, $to);

}

// *** Make dropdowns
$fromSelect = dropdown($selectArray, $fromKey);
$toSelect = dropdown($selectArray, $toKey);

function dropdown($assocArray, $selectedId=0, $addBlank=false)
	#
	#	Author:		Jarrod Oberto
	#	Date:		19 Mar 2011
	#	Purpose:	Generate HTML dropdown code
	#	Params in:	(array) $assocArray: An associate array of value (id)/text.
	#				(mixed) $selectedId: The value to select. Usually an id.
	#				(bool)	$addBlank: First entry empty or not.
	#	Params out:	The select HTML code
	#	Notes:
	#
	#	Usage:
	#			PHP:	$resultSet = $dbObj -> selectTable('branch', array('id','name'));
	#					$branchArray = $dbObj -> recordsToArray($resultSet, false, true);
	#					$branchHTMLOptions = FormHelper::dropdown($branchArray, $id);
	#
	#			HTML:	<select id="branch" name="branch" class="text">
	#						<?php echo $branchHTMLOptions ? >
	#					</select>
	#
	{

		$HTMLOptions = '';
		if ($assocArray) {

			if ($addBlank) {
				$HTMLOptions = '<option></option>';
			}

			foreach ($assocArray as $id => $name) {
				$selected = '';
				if (($selectedId == $id) && ($selectedId != '')){
					$selected = 'selected="selected"';
				}
				$HTMLOptions .= '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
			}
		} else {
			$HTMLOptions = '<option></option>';
		}

		return $HTMLOptions;

	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Exchange Rate Converter</title>
		
		<style>
			
			body {
				font-family: Verdana, Verdana, Geneva, sans-serif;
			}
			
			h1 {
				font-family: Verdana, Verdana, Geneva, sans-serif;
				margin: 0 0 20px 0;
				padding: 0;
			}			
			
			h2 {
				font-family: Verdana, Verdana, Geneva, sans-serif;
				margin: 0;
				padding: 0;
			}
			
			select, input.text {
				width: 180px;
			}
			
			select, input.text {
				margin:		0 0 15px 0;			
			}
			
			
			.block-basic {
				margin:			0 auto 20px auto;
				width:			650px;
				color:			#111111;
				padding:		20px;
				overflow:		auto;				
			}
			
			.demo-block {
				border:			3px solid #718DC7;
				background:		#D2D8E8;
			}
			
			.code-block {
				border:			3px solid #FFD324;
				background:		#FFF6BF;	

			}
			
				.code-block pre {
					font-family:    monospace;
				}
			
			.block2 {
				border:			3px solid #C6D880;
				background:		#E6EFC2;			
			}
			
			.text-block {
				width:			700px;
				padding:		0px;	
				font-size:		14px;	
			}	
				
				.text-block p {
					color:			#565656;
				}
			
			.left {
				float:			left;
				display:		inline;
				position:		relative;
				padding-top:	10px;
			}
			
			.right {
				float:			left;
				display:		inline;
				position:		relative;
				width:			300px;
				padding:		10px 10px 10px 30px;
				
			}			
			
			form label {
				display:		inline-block;
				width:			80px;
				text-align:		right;
				margin:		0 0 15px 0;
			}
			
			form input.submit {
				margin:			0 0 0 95px;
			
			}
			
			div.hr {
				border-bottom:	1px solid #111;
			}
			
			.right div.hr {
				border-bottom:	1px solid #718DC7;
				padding:		5px 0 10px 0;
			}
			
			.formatted {
				font-size: 12px;
				overflow:		hidden;
				margin-top: 10px;
			}

		</style>
		
	</head>
	<body>
		
		<!--
  
			Author:	 Jarrod Oberto
			Date:	 21/Jun/11
			Version: 1
   
			Copyright 2011
  
		-->
		
		<div class="block-basic text-block">
			<h1>Exchange Rate Converter</h1>
			<p>
				<strong>Exchange Rate Converter</strong> is an easy to use tool for converting money from currency to currency. Featuring support for 88 different currencies.
			</p>
			
			
		</div>	
		
		<div class="block-basic demo-block">
			<h2>Demo</h2>
			<p>
				
			</p>	
			
			<div class="left">
			
				<form name="test" action="example_2_reverse_button.php" method="POST">

					<label>Amount:</label>
					<input type="text" name="amount" value="<?php echo $amount ?>" class="text"/>
					<br/>

					<label>From:</label>
					<select name="convertFrom">
						<?php echo $fromSelect; ?>
					</select>
					<br/>

					<label>To:</label>
					<select name="convertTo">
						<?php echo $toSelect; ?>
					</select>
					<br/>
					<input class="submit" type="submit" value="Reverse" name="submit" />
					<input class="" type="submit" value="Convert" name="submit" />
				</form>
				
			</div> 
			
			<div class="right">
				
				<?php
					if ($result != '') {
						
						$formatted1 = $convertObj -> getFullResult(2);
						$formatted2 = $convertObj -> getFullResult(null, true);						
						$formatted3 = $convertObj -> getResult();						
						echo <<<HTML

						<span><strong>Result:</strong></span> $result
						<div class="hr"></div>
						<div class="formatted">						
							<h4>Formatted results:</h4>
							$formatted1 <br />
							$formatted2 <br />
							$formatted3
						</div>
HTML;
					}
					
				?>
				
			</div>			
				
		</div>	
		<!-- end block -->
		
		
		<?php if ($result != '') { ?>
		
			<div class="block-basic code-block">
				<h2>Code</h2>	
<pre>
$convertObj = new CurrencyConvert();
$result = $convertObj -> currencyConvert(<?php echo '"' . $amount . '", "' . $from . '", "' . $to . '"'?>);
echo $result;
</pre>			
			</div>	
		
		<?php } ?>
		
	</body>
</html>
