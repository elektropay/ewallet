<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();

if(!isset($_POST['action_type']))
 { ?>
<div><p>Authentication API</p>
<form  method="post"/>
<table>
 	<tr><td>Login Id</td><td><input type="text" name="login_id" value=""/></td></tr>
    <tr><td>Api Key</td><td><input type="text" name="api_key" value=""/></td></tr>
    <input type="hidden" name="action_type" value="do_authentication"/>
    <tr><td></td><td><input type="submit"/></td></tr>
 </table>
 </div>
 </form> 
<?php }

 if($_POST['action_type']=='do_authentication'){
 
		$login_id=$_POST['login_id'];
		$api_key=$_POST['api_key'];	 
	
		
		$token=  authentication($login_id,$api_key);
		$_SESSION['token']=$token;
		echo "Your token is:".$token;
	 ?>
 
 
   <div><p>Add Benificary/Bank Detail</p>
 <form  method="post"/>
<table>
 	<tr><td>Nick Name</td><td><input type="text" name="nickname" value=""/></td></tr>
    <tr><td>Benificary nmae</td><td><input type="text" name="beneficiary_name" value=""/></td></tr>
    <tr><td>Bank Name</td><td><input type="text" name="bank_name" value=""/></td></tr>
    <tr><td>Bank Address</td><td><input type="text" name="bank_address" value=""/></td></tr>
    <tr><td>Account No.</td><td><input type="text" name="acct_number" value=""/></td></tr>
    <tr><td>Bic Swift</td><td><input type="text" name="bic_swift" value=""/></td></tr>
    <input type="hidden" name="action_type" value="add_benificary"/>
    <tr><td></td><td><input type="submit"/></td></tr>
 </table>
 </form>
 </div>
 <?php } if($_POST['action_type']=='add_benificary'){
	 
	$token=  $_SESSION['token'];
	$beneficiary_id=do_beneficiaries($_POST,$token);	
	$_SESSION['beneficiary_id']=$beneficiary_id;
	echo "Your Benificary Id:".$beneficiary_id."<br>";
	echo "Your token is:".$token;
	 ?>
 
 <div><p>Please enter the deposite amount</p>
 <form  method="post"/>
<table>
 	<tr><td>Amount</td><td><input type="text" name="amount" value=""/></td></tr>
    
     <input type="hidden" name="action_type" value="deposite"/>
    <tr><td></td><td><input type="submit"/></td></tr>
 </table>
 </form>
 </div>
 <?php } if($_POST['action_type']=='deposite'){
	
	$amount=$_POST['amount'];
	$token=  $_SESSION['token'];
	$beneficiary_id= $_SESSION['beneficiary_id'];
	$trade_id=  trade($amount,$token,$beneficiary_id);
echo "Your Token is:".$token."<br>";	
echo "Your Trade id is:".$trade_id."<br>";	
	$settelment_id=settlementApi($token,$trade_id);
echo "Your Settment Id is:".$settelment_id;	
	addTrad_settlement($token,$trade_id,$settelment_id);
	//set_payment($token,$beneficiary_id,$trade_id,$amount);
   fund_release($token,$trade_id,$settelment_id);
 
 } ?>
 
   
   

</div>
</body>
</html>
<?php
function authentication($login_id,$api_key)
 {
	 
 $url='https://devapi.thecurrencycloud.com/api/en/v1.0/authentication/token/new'; 
	 
 $ckfile = tempnam ($sessPath, "CURLCOOKIE");       
 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$url);
 
 curl_setopt($ch, CURLOPT_POST, true);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'login_id='.$login_id.'&api_key='.$api_key);
 curl_setopt($ch, CURLOPT_REFERER, $siteUrl.$resultUrl);
 curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);
 curl_setopt ($ch, CURLOPT_COOKIEJAR, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $output = curl_exec($ch);

 curl_close($ch);
 
  $token= explode(":",$output);
 
 $token = substr("$token[2]", 0, -1);  
 $token=  trim($token, "\"" );
 
return  $token;
 }
 
 function trade($amount,$token,$beneficiary_id)
{  
  $sell_currency='EUR';
  $buy_currency='USD';
 
  $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/trade/execute";
 // $beneficiary_id='844031e1-694d-0131-27a9-002219414986';
  $side=2;
  $term_agreement='true';	
  $reason='Invoice Settlement';
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,'buy_currency='.$buy_currency.'&sell_currency='.$sell_currency.'&amount='.$amount.'&side='.$side.'&term_agreement='.   $term_agreement.'&reason='.$reason.'$beneficiary_id='.$beneficiary_id);
  curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $output = curl_exec($ch);

   $trade_id=explode(":",$output);
   $trade_id=explode("}",$trade_id[3]);
  $trade_id= trim($trade_id[0],"\"");
   
   return $trade_id;
  
}


function  do_beneficiaries($POST,$token){

$url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/beneficiary/new";	
$nickname=$_POST['nickname'];
$acct_ccy='USD';
$beneficiary_name=$_POST['beneficiary_name'];
$bank_name=$_POST['bank_name'];
$bank_address=$_POST['bank_address'];
$acct_number=$_POST['acct_number'];
$bic_swift=$_POST['bic_swift'];

$destination_country_code='US';	
$payment_type='local';
//$bic_swift='AARBDE5W100';
$is_beneficiary='true';
$is_source='false';


  $ch = curl_init();
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS,'nickname='.$nickname.'&acct_ccy='.$acct_ccy.'&beneficiary_name='.$beneficiary_name.'&bank_name='.$bank_name.'&bank_address='.$bank_address.'&acct_number='.$acct_number.'&bic_swift='.$bic_swift.'&destination_country_code='.$destination_country_code.'&is_beneficiary='.$is_beneficiary.'&is_source='.$is_source);
 curl_setopt ($ch, CURLOPT_COOKIEFILE, $ckfile);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
  $output = curl_exec($ch);
 
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
		// "Settlment Id: ".$settlement_id;
         
		return $settlement_id;
		
		
}
function addTrad_settlement($token,$trade_id,$settlement_id){
  $url="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/settlement/".$settlement_id."/add_trade";
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
function set_payment($token,$beneficiary_id,$trade_id,$amount)
{
 $payurl="https://devapi.thecurrencycloud.com/api/en/v1.0/".$token."/payment/add";
  
 // $trade_id='20140131-PKFXPX';	
  $currency='USD';	
  

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

?>