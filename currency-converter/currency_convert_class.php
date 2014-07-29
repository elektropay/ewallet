<?php

/*
 *	EXCHANGE RATE CONVERTER
 * 
 * 	Author:		Jarrod Oberto
 * 	Date:		Jun 2011
 * 	Version:	1.1	
 * 
 *  History
 * ==========
 *	27-06-11	JCO		Bug fix	
 *						Added support for million, billion, & trillion numbers
 *
 */

class CurrencyConvert
{

	private $amount;
	private $fromCountryCode;
	private $toCountryCode;
	private $fromAmountCountry;
	private $toAmountCountry;
	private $fromCountry;
	private $toCountry;
	private $resultRaw;
	private $denomination;
	private $denominationShort;
	
	private $isError;
	private $googleError;


	## --------------------------------------------------------
	
	public function __construct() { }

	## --------------------------------------------------------
	
	public function currencyConvert($amount, $from, $to)
	#
	#	Author:		Jarrod Oberto
	#	Date:		Jun 2011
	#	Purpose:	Convert money amount from one currency to another
	#	Params in:	(float) $amount: The amount to convert
	#				(str) $from: The 3 letter currency code of the currency you
	#					want to convert.
	#				(str) $to: The 3 letter currency code of the currency you
	#					want to convert to.
	#	Params out: (float) The converted currency amount. Or 0 if an error.
	#	Notes:	
	#
	{		

		$this->isError = false;
		
		// *** Prep data
		$amount = str_replace(' ', '', $amount);
		$amount = str_replace(',', '', $amount);
		
		// *** Make the API call
		$amount = urlencode($amount);
		$from_Currency = urlencode($from);
		$to_Currency = urlencode($to);
		//echo "https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
		
		$get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency",0,null,null);
		
		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);  
		$converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
		return $converted_amount;
		
		if ($error == '') {
		
			// *** Pull out just the float value. Google doesn't do this for you.
			$result = $this -> getValuePart($currencyArray['rhs']);

			// *** Save all the infomation
			$this->setDenomination($currencyArray['rhs']);
			$this -> amount = $amount;
			$this -> fromCountryCode = $from;
			$this -> toCountryCode = $to;
			$this -> fromAmountCountry = $currencyArray['lhs'];
			$this -> toAmountCountry = $currencyArray['rhs'];
			$this -> fromCountry = $this -> getCountryPart($currencyArray['lhs']);
			$this -> toCountry = $this -> getCountryPart($currencyArray['rhs']);
			$this -> resultRaw = $result;				

			return $this -> roundValue($result, 2) . ' ' . $this->addDenomination();
		} else {
			$this->setError($error);
			return 0;
		}
	}

	public function _currencyConvert($amount, $from, $to)
	#
	#	Author:		Jarrod Oberto
	#	Date:		Jun 2011
	#	Purpose:	Convert money amount from one currency to another
	#	Params in:	(float) $amount: The amount to convert
	#				(str) $from: The 3 letter currency code of the currency you
	#					want to convert.
	#				(str) $to: The 3 letter currency code of the currency you
	#					want to convert to.
	#	Params out: (float) The converted currency amount. Or 0 if an error.
	#	Notes:	
	#
	{		

		$this->isError = false;
		
		// *** Prep data
		$amount = str_replace(' ', '', $amount);
		$amount = str_replace(',', '', $amount);
		
		// *** Make the API call
		$currencyJSON = file_get_contents('http://www.google.com/ig/calculator?hl=en&q=' . $amount . $from . '=?' . $to ,0,null,null);
			   
		// *** Use this special "json_decode" method as the built in one is
		//   * strict... and the google JSON is not formatted for strict'ness
		$currencyArray = $this->json_decode_nice($currencyJSON, true);
		
		// *** Store the error value (there might not be one).
		$error = $currencyArray['error'];
		
		if ($error == '') {
		
			// *** Pull out just the float value. Google doesn't do this for you.
			$result = $this -> getValuePart($currencyArray['rhs']);

			// *** Save all the infomation
			$this->setDenomination($currencyArray['rhs']);
			$this -> amount = $amount;
			$this -> fromCountryCode = $from;
			$this -> toCountryCode = $to;
			$this -> fromAmountCountry = $currencyArray['lhs'];
			$this -> toAmountCountry = $currencyArray['rhs'];
			$this -> fromCountry = $this -> getCountryPart($currencyArray['lhs']);
			$this -> toCountry = $this -> getCountryPart($currencyArray['rhs']);
			$this -> resultRaw = $result;				

			return $this -> roundValue($result, 2) . ' ' . $this->addDenomination();
		} else {
			$this->setError($error);
			return 0;
		}
	}

	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
	 *	PRIVATE METHODS
	 *
	 */	
 
	private function getValuePart($googleValue)
	# Helper method
	{
		$pieces = explode(' ', trim($googleValue));
		return $pieces[0];
	}

	## --------------------------------------------------------
	
	private function getCountryPart($googleValue)
	# Helper method
	{
		if (stripos($googleValue, 'million') || stripos($googleValue, 'billion') || stripos($googleValue, 'trillion')){
			$pieces = explode(' ', trim($googleValue), 3);
			return $pieces[2];				
		} else {
			$pieces = explode(' ', trim($googleValue), 2);
			return $pieces[1];	
		}
	}
	
	## --------------------------------------------------------
	
	private function setDenomination($googleValue)
	# Helper method
	{
		
		$this->denomination = '';
		$this->denominationShort = '';
		
		if(strstr(strtolower($googleValue), 'million')) {
			$this->denomination = 'million';
			$this->denominationShort = 'm';
		}
		
		if(strstr(strtolower($googleValue), 'billion')) {
			$this->denomination = 'billion';
			$this->denominationShort = 'b';
		}
		
		if(strstr(strtolower($googleValue), 'trillion ')) {
			$this->denomination = 'trillion';
			$this->denominationShort = 't';
		}	
		
	}

	## --------------------------------------------------------
	
	private function roundValue($result, $dp=2, $decPointChar='.', $thousandsSeperater=',')
	# Round the value to the desired number of decimal places
	{
		return number_format($result, $dp, $decPointChar, $thousandsSeperater);
	}
	
	## --------------------------------------------------------
	
	private function addDenomination($short=false)
	{
		if ($this->denomination != '') {
			
			if ($short) {
				return ' ' . $this->denominationShort;
			} else {
				return ' ' . $this->denomination;
			}
		} else {
			return '';
		}
	}
	

	## --------------------------------------------------------
	
	private function json_decode_nice($json, $assoc = FALSE)
	# Helper method
	{
		$json = mb_convert_encoding($json,"HTML-ENTITIES","UTF-8");
		$json = str_replace(array("\n","\r"),"",$json);
		$json = preg_replace('/([{,])(\s*)([^"]+?)\s*:/','$1"$3":',$json);
		
		return json_decode($json, $assoc);
	}
	
	## --------------------------------------------------------
	
	private function setError($error) 
	# Set the error, if any.
	{
		$this->isError = true;
		switch ($error) {
			case 0:
				$this->googleError = 'It\'s the same currency, silly!';
				break;			
			case 1:

				break;
			case 2:

				break;
			case 3:

				break;
			case 4:
				$this->googleError = 'Currency code is not found or is incorrect.';
				break;			
			default:
				break;
		}		
	}


	/*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-* 
	 *	PUBLIC METHODS
	 *
	 */

	public function getResult($dp = null, $showComma=true, $abbrDenomination=false)
	# Return the result
	{
		if ($dp == null) {
			$value = $this->resultRaw;
		} else {
			$value = $this->roundValue($this->resultRaw, $dp);
		}
			
		return $value . ' ' . $this->addDenomination();	
	}
	
	## --------------------------------------------------------
	
	public function getFullResult($dp = null, $abbr = false, $showComma=true, $abbrDenomination = false)
	# Return the result with country name/currency code	
	{

		$amount = $this->amount;
		$result = $this->getResult($dp, $showComma, $abbrDenomination);
	
		if ($abbr) {
			$from = strtoupper($this->fromCountryCode);
			$to   = strtoupper($this->toCountryCode);
		} else {
			$from = $this->fromCountry;
			$to   = $this->toCountry;
		}
		
		if ($dp != null) {
			$amount = number_format($amount);
		}
				
		return $amount . ' ' . $from . ' = ' . $result . ' ' . $to;	
	}	
	
	## --------------------------------------------------------
	
	public function isError()
	{
		return $this->isError;
	}
	
	## --------------------------------------------------------
	
	public function getError() 
	{
		return $this->googleError;
	}
	
	## --------------------------------------------------------
}
?>