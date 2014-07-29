<?php

$post_url = 'https://zoanga.com/commerce/api';

$poststring = '<?xml version="1.0" encoding="UTF-8"?>
<request>
	<authentication>
		<api_id>Q2LRJ8T72260E6PKXNA5</api_id>
		<secret_key>7NPXQ4O1YTPA41O487YYRU6Y5PGU7HE1907ASTVL</secret_key>
	</authentication>
	<type>GetCustomers</type>
	<limit>50</limit>
</request>';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$post_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $poststring); 

echo  $response = curl_exec($ch); 

if(curl_errno($ch))
{
    echo curl_error($ch);
    curl_close($ch);
    die();
} else {
    curl_close($ch);

    /**
    * deal with the $response
    * because this was a charge, we'll look for "response_code" == 1
    * to indicate success
    */
}