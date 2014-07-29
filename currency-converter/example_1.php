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

// *** If form submitted
if (isset($_POST['submit']) && $_POST['submit'] == 'Convert') {
	
	$amount = $_POST['amount'];
	$from = $_POST['convertFrom'];	
	$to = $_POST['convertTo'];

	$convertObj = new CurrencyConvert();
	$result = $convertObj -> currencyConvert($amount, $from, $to);
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
			
			.block-basic {
				margin:			0 auto 20px auto;
				width:			620px;
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
				width:			670px;
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
				padding:		0 0 15px 0;
			}
			
			form input.submit {
				margin:			0 0 0 130px;
			
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
				<strong>Exchange Rate Converter</strong> is an easy to use tool for converting money from currency to currency.
			</p>
			
			<p>The below demo uses only a small subset of available currencies for demo purposes. In total, 88 different currencies are supported!</p>
				
		</div>	
		
		<div class="block-basic demo-block">
			<h2>Demo</h2>
			<p>
				
			</p>	
			
			<div class="left">
			
				<form name="test" action="" method="POST">

					<label>Amount:</label>
					<input type="text" name="amount" value="100" />
					<br/>

					<label>From:</label>
					<select name="convertFrom">
						<option value="USD">United States Dollar (USD)</option>
						<option value="gbp">Great British pounds (GBP)</option>
						<option value="eur">Euro (EUR)</option>
						<option value="aud">Australian Dollar (AUD)</option>
						<option value="nzd">New Zealand Dollar (NZD)</option>
						<option value="cny">China Renminbi (CNY)</option>
					</select>
					<br/>

					<label>To:</label>
					<select name="convertTo">
						<option value="usd">United States Dollar (USD)</option>
						<option value="gbp">Great British pounds (GBP)</option>
						<option value="eur">Euro (EUR)</option>
						<option value="aud">Australian Dollar (AUD)</option>
						<option value="nzd" selected="yes">New Zealand Dollar (NZD)</option>
						<option value="cny">China Yuan (CNY)</option>
					</select>
					<br/>

					<input class="submit" type="submit" value="Convert" name="submit" />
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
$result = $convertObj -> currencyConvert(<?php echo $amount . ', ' . $from . ', ' . $to ?>);
echo $result;
</pre>			
			</div>	
		
		<?php } ?>
		
	</body>
</html>
