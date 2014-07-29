<?php

 function authentication($Url,$login_id,$api_key)
 {
	
 $ckfile = tempnam ($sessPath, "CURLCOOKIE");       
 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$Url);
 
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'login_id='.$login_id.'&api_key='.$api_key);
 curl_setopt($ch, CURLOPT_REFERER, $siteUrl.$resultUrl);
 curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
 curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $output = curl_exec($ch);
 curl_close($ch);
return  $output;
 }
 
function  do_beneficiaries($burl){

  $ccy='EUR' ;	
  $destination_country_code='DE';	
  $payment_type='local';
  $nickname='Aryan';
  $acct_ccy='EUR';
  $beneficiary_name='Aryan Rathod';
  $bank_name='AAREAL BANK AG';
  $bank_address='KURFURSTENDAMM 33, 10719 BERLIN';
  $iban='DE89370400440532013000';
 
  $bic_swift='AARBDE5W100';
  $is_beneficiary='true';
  $is_source='false';
  $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$burl);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'ccy='.$ccy.'&destination_country_code='.$destination_country_code.'&payment_type='.$payment_type.'&nickname='.$nickname.'&beneficiary_name='.$beneficiary_name.'&acct_ccy='.$acct_ccy.'&bank_name='.$bank_name.'&bank_address='.$bank_address.'&iban='.$iban.'&bic_swift='.$bic_swift.'&is_beneficiary='.$is_beneficiary.'&is_source='.$is_source);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
 echo $output = curl_exec($ch);
 
  $bid=explode(":",$output);
  
 // echo $bid[19];
  $bid=explode(",",$bid[19]);
   //echo $bid[0];
   $bid= trim($bid[0],"\"");
 // print_r($str);
 // echo $output;
  echo "<br>";

 return $bid;
	
}
function get_beneficiaries($gburl){
	
	
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$gburl);
 //curl_setopt($ch, CURLOPT_POST, 1);
 //curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id.'&currency='.$currency.'&amount='.$amount.'&beneficiary_id='.$beneficiary_id);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
 echo  $output = curl_exec($ch);  
 echo"<br>";
 echo"<br>";
}

function trade($token)
{  
  $beneficiary_id="beccf0a1-77da-0131-4c88-002219414986";
  $sell_currency='EUR';
  $buy_currency='USD';
  $amount=3500;
  $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/trade/execute";
  $beneficiary_id='56808571-78b1-0131-4d2e-002219414986';
  $side=1;
  $term_agreement='true';	
  $reason='Invoice Settlement';

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,'buy_currency='.$buy_currency.'&sell_currency='.$sell_currency.'&amount='.$amount.'&side='.$side.'&term_agreement='.   $term_agreement.'&reason='.$reason.'&beneficiary_id='.$beneficiary_id);
  curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo  $output = curl_exec($ch);
   $trade_id=explode(":",$output);
   $trade_id=explode("}",$trade_id[3]);
  $trade_id= trim($trade_id[0],"\"");
   
   return $trade_id;
  
}

function get_trade($turl){
	
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$turl);
 //curl_setopt($ch, CURLOPT_POST, 1);
 //curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id.'&currency='.$currency.'&amount='.$amount.'&beneficiary_id='.$beneficiary_id);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
   $output = curl_exec($ch);
   $data= explode(",",$output);
    echo $data[4];
	echo "<br>";
	echo $data[5];
	echo "<br>";
	echo $data[6];
	echo "<br>";
	echo $data[7];
	echo "<br>";
	echo "<br>";
	
 $sell_amount=  explode(":",$data[7]);	
 $sell_amount=  trim( $sell_amount[1], "\"" );
 return $sell_amount;

}

function set_payment($payurl,$beneficiary_id,$trade_id,$sell_amount)
{
 
  
 // $trade_id='20140131-PKFXPX';	
  $currency='USD';	
  $amount='5278.40';
//  $beneficiary_id='844031e1-694d-0131-27a9-002219414986';	
  $reason='Test Payment';
  $payment_reference='Test-123';
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL, $payurl);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id.'&currency='.$currency.'&amount='.$amount.'&beneficiary_id='.$beneficiary_id.'&reason='.$reason.'&payment_reference='.$payment_reference);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $output = curl_exec($ch);
  echo $output;
}
function Paymet_deposite($token)
{
  
 echo  $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/trade/20110208-XVBFCV/deposit_account";	
 exit;
  $trade_id=$trade_id ;	
  $currency='EUR';	
  $amount='5000.00';
  $beneficiary_id='1b746631-0e5e-0131-99c5-002219414986';	
  $reason='Test Payment';
  $payment_reference='Test-123';
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL, $payurl);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id.'&currency='.$currency.'&amount='.$amount.'&beneficiary_id='.$beneficiary_id.'&reason='.$reason.'&payment_reference='.$payment_reference);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $output = curl_exec($ch);
  echo $output;
}
function validate_beneficiaries($token){

 echo $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/beneficiaries";
 exit;
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$url);
 //curl_setopt($ch, CURLOPT_POST, 1);
 //curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id.'&currency='.$currency.'&amount='.$amount.'&beneficiary_id='.$beneficiary_id);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
 echo  $output = curl_exec($ch);  
 echo"<br>";
 echo"<br>";






}
function settlementApi($token,$trade_id){
  $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/settlement/create";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id);
		curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$output = curl_exec($ch);  
    	$settlement_id= explode(":",$output);
		
        $settlement_id = substr("$settlement_id[3]", 0, -2); 
        $settlement_id = trim($settlement_id, "\"" );
		 echo "Settlment Id: ".$settlement_id;
         echo "<br>";
		return $settlement_id;
		
		
}
function addTrad_settlement($token,$trade_id,$settlement_id){
 echo $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/settlement/".$settlement_id."/add_trade";
echo "<br>";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,'trade_id='.$trade_id);
		curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		echo $output = curl_exec($ch);  
    	
		
}
function fund_release($token,$trade_id,$settlement_id){
 echo $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/settlement/".$settlement_id."/release";
echo "<br>";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,'');
		curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		echo $output = curl_exec($ch);  
    	
		
}
function  do_beneficiaries_usd($token){

$url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/beneficiary/new";	
$nickname='USD SUNemuk';
$acct_ccy='USD';
$beneficiary_name='SUNemuk Dhakad';
$bank_name='BANK OF AMERICA';
$bank_address='CHARLOTTE,NC';
$acct_number=0212456251;
$bic_swift='AARBDE5W100';

$destination_country_code='US';	
$payment_type='local';
//$bic_swift='AARBDE5W100';
$is_beneficiary='true';
$is_source='true';


  $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'nickname='.$nickname.'&acct_ccy='.$acct_ccy.'&beneficiary_name='.$beneficiary_name.'&bank_name='.$bank_name.'&bank_address='.$bank_address.'&acct_number='.$acct_number.'&bic_swift='.$bic_swift.'&destination_country_code='.$destination_country_code.'&is_beneficiary='.$is_beneficiary.'&is_source='.$is_source);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
 echo $output = curl_exec($ch);
 
  $bid=explode(":",$output);
  
 // echo $bid[19];
  $bid=explode(",",$bid[19]);
   //echo $bid[0];
echo   $bid= trim($bid[0],"\"");
 // print_r($str);
 // echo $output;
  echo "<br>";

 return $bid;
	
}
/*
$html = authentication('https://devapi.thecurrencycloud.com/api/en/v1.0/authentication/token/new','mukesh.nandeda@gmail.com','dd63eb25ccb402db9eee8c7310b0ddb6a58782e4253edd22a81e9a38b2b827b2');
$ste= explode(":",$html);
 $token = substr("$ste[2]", 0, -1);  

echo $token=  trim($token, "\"" );

*/

$token="cc125d2ae62a70a984d146d855e19d26";
//do_beneficiaries_usd($token);

/*$burl="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/beneficiary/new";
echo "<br>";
 echo $bid=do_beneficiaries($burl);
 echo "<br>";
exit;*/ 


//$gburl="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/beneficiary/".$bid."";
//get_beneficiaries($gburl);




echo $trade_id=trade($token);
die;
/*$token="9ba1e72d0d64a98f69a535ee63f0dd39";*/
$trade_id="20140215-CCDZJW";
//settlementApi($token,$trade_id);

$settlement_id="20140215-PZHSLS";
//addTrad_settlement($token,$trade_id,$settlement_id);
// $payurl="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/payment/add";
// $bid="e9c76931-0d8a-0131-98d8-002219414986";
// set_payment($payurl,$bid,$trade_id,$sell_amount);
fund_release($token,$trade_id,$settlement_id);
/*
 //Paymet_deposite($token);
 //$turl="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/trade/".$trade_id."";
 //$sell_amount= get_trade($turl); */
/* $payurl="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/payment/add";
 $bid="b4227f11-70c5-0131-36be-002219414986";
 $trade_id="20140205-SKPSJH";
 $sell_amount=1000;
 set_payment($payurl,$bid,$trade_id,$sell_amount);
//   validate_beneficiaries($token);
 */ 
?>
