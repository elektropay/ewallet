#!/usr/bin/php 
<?
###############################################################################
# PROGRAM     : EPAY ENTERPRISE                                               #
# VERSION     : 4.13                                                          #
# AUTHOR      : DMITRY PEREUDA                                                #

# COMPANY     : ALSTRASOFT	                                              #
# COPYRIGHTS  : (C)2009 ALSTRASOFT. ALL RIGHTS RESERVED                       #
#         COPYRIGHTS BY (C)2009 ALSTRASOFT. ALL RIGHTS RESERVDED  	      #
# LICENSE KEY : C3FA-76A1-83A4-C2B4-AE1F-1D5A-14ED-1DCA                       #
###############################################################################
#    THIS FILE IS PART OF EPAY SCRIPT - THE NEW UNIVERSAL PAYMENT GATEWAY     #
#               	     DEVELOPED BY ALSTRASOFT                          #
###############################################################################
#    ALL SOURCE CODE, IMAGES, PROGRAMS, FILES INCLUDED IN THIS DISTRIBUTION   #
#         COPYRIGHTS BY (C)2009 ALSTRASOFT. ALL RIGHTS RESERVDED  	      #
###############################################################################
#       ANY REDISTRIBUTION WITHOUT PERMISSION OF ALSTRASOFT AND IS            #
#                            STRICTLY FORBIDDEN                               #
###############################################################################
#         COPYRIGHTS BY (C)2009 ALSTRASOFT. ALL RIGHTS RESERVDED  	      #
###############################################################################


#         COPYRIGHTS BY (C)2009 ALSTRASOFT. ALL RIGHTS RESERVDED  	      #





###############################################################################
@set_time_limit(0);
include('../config.htm');
###############################################################################
function out($str=''){
	print "$str\r\n";
	flush();
}
###############################################################################
function SendEmailNotification($UserId, $ProductId, $SubscriptActive){
	global $sitename, $data;
	$name="";
	$email="";
	$productname="";
	$sql="SELECT email, fname, lname FROM {$data['DbPrefix']}members WHERE id=$UserId";
  $res=mysql_query($sql);
  if ($res) if (mysql_num_rows($res) > 0) {
    $row=mysql_fetch_array($res);
    $email=$row['email'];
    $name=$row['fname'] . " " . $row['lname'];
  }
  $sql="SELECT name FROM {$data['DbPrefix']}products WHERE id=$ProductId";
  $res=mysql_query($sql);
  if ($res) if (mysql_num_rows($res) > 0) {
    $row=mysql_fetch_array($res);
    $productname=$row['name'];
  }
  if ($SubscriptActive) {
    $key="SUBSCRIPTION-RESUMED";
  }
  else {
    $key="SUBSCRIPTION-STOPPED";
  }
  if (!empty($email)) {
    $post['username']=$name;
    $post['product']=$productname;
    $post['email']=$email;
    send_email($key, $post);
  }
  else out("Can not send e-mail notification to user $name, email field is empty.");
}
###############################################################################
function Main(){
	global $data;
	$sql="SELECT 
      subs.*, subs.id as subscriptionid, (TO_DAYS(NOW()) - TO_DAYS(subs.sdate)) as daystopay, subs.member as payerid,
      prod.type, prod.type, prod.price, prod.period, prod.trial, prod.tax, prod.shipping, prod.name as productname, prod.owner as payeeid,
      memb.fname as userfname, memb.lname as userlname
    FROM 
      {$data['DbPrefix']}subscriptions subs LEFT JOIN {$data['DbPrefix']}products prod ON subs.product=prod.id,
      {$data['DbPrefix']}subscriptions subs2 LEFT JOIN {$data['DbPrefix']}members memb ON subs.owner=memb.id
    WHERE subs2.id=subs.id AND subs.sdate < NOW()";
	$res=mysql_query($sql);
	if ($res) if (mysql_num_rows($res) > 0){
		out("Subscriptions to process: " . mysql_num_rows($res));
		out("Working...");
		while ($row=mysql_fetch_array($res)){
			$amount=$row['shipping'] + $row['tax'] + $row['price'];
      $payrounds=floor ($row['daystopay'] / $row['period']);
      $unpaiddays=$row['daystopay'] - (floor($row['daystopay'] / $row['period']) * $row['period']);
      $amount=$amount * $payrounds;
      if ($payrounds > 0){
        if (select_balance($row['payerid']) >= $amount){
          $sql="UPDATE {$data['DbPrefix']}subscriptions SET ";
          if ($row['holded'] == 1){
            $paydate=date("Y-m-d", mktime (0,0,0, date("m"), date("d") - $unpaiddays, date("Y")));
            $sql .= " sdate='$paydate',holded=0";
            SendEmailNotification($row['payerid'], $row['product'], true);
          }else{
            $paydate=date("Y-m-d", mktime (0,0,0, date("m"), date("d") - $unpaiddays, date("Y")));
            $sql .= " sdate='$paydate'";
          }
          $sql .= " WHERE id={$row['subscriptionid']}";
          $rslt=mysql_query($sql);
          if ($rslt) {
            $fees=($amount * $data['PaymentPercent']/100) + $data['PaymentFees'];
            transaction($row['payerid'], $row['payeeid'], $amount, $fees, 0, 1, 'Payment for subscription ' . $row['productname'] . ' for ' . $row['userfname'] . " " . $row['userlname'] . ", " . ($payrounds*$row['period']) . ' days', '');
          }
        } else {
          $sql="UPDATE {$data['DbPrefix']}subscriptions SET holded=1 WHERE id={$row['subscriptionid']}";
          mysql_query($sql);
          SendEmailNotification($row['payerid'], $row['product'], false);
        }
      }
		}
	}
	out("Done.");
}
###############################################################################
Main();
###############################################################################
?>