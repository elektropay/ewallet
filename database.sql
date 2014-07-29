-- 
-- Table structure for table `dp_banks`
-- 

DROP TABLE IF EXISTS `dp_banks`;
CREATE TABLE `dp_banks` (
  `id` int(11) NOT NULL auto_increment,
  `owner` int(11) NOT NULL default '0',
  `bname` varchar(128) NOT NULL default '',
  `baddress` varchar(128) NOT NULL default '',
  `bcity` varchar(64) NOT NULL default '',
  `bzip` varchar(16) NOT NULL default '',
  `bcountry` char(2) NOT NULL default '',
  `bstate` varchar(32) NOT NULL default '',
  `bphone` varchar(32) NOT NULL default '',
  `bnameacc` varchar(128) NOT NULL default '',
  `baccount` varchar(32) NOT NULL default '',
  `btype` char(2) NOT NULL default '',
  `brtgnum` varchar(9) NOT NULL default '',
  `bswift` varchar(32) NOT NULL default '',
  `status` tinyint(1) NOT NULL default '0',
  `default` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_cards`
-- 

DROP TABLE IF EXISTS `dp_cards`;
CREATE TABLE `dp_cards` (
  `id` int(11) NOT NULL auto_increment,
  `owner` int(11) NOT NULL default '0',
  `ctype` varchar(8) NOT NULL default '',
  `cname` varchar(64) NOT NULL default '',
  `cnumber` varchar(32) NOT NULL default '',
  `ccvv` varchar(16) NOT NULL default '',
  `cmonth` tinyint(2) NOT NULL default '0',
  `cyear` smallint(6) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `default` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_confirms`
-- 

DROP TABLE IF EXISTS `dp_confirms`;
CREATE TABLE `dp_confirms` (
  `id` int(11) NOT NULL auto_increment,
  `newuser` varchar(32) NOT NULL default '',
  `newpass` varchar(32) NOT NULL default '',
  `newquestion` varchar(255) NOT NULL default '',
  `newanswer` varchar(255) NOT NULL default '',
  `newmail` varchar(255) NOT NULL default '',
  `newfname` varchar(32) NOT NULL default '',
  `newlname` varchar(32) NOT NULL default '',
  `newcompany` varchar(128) NOT NULL default '',
  `newregnum` varchar(32) NOT NULL default '',
  `newdrvnum` varchar(32) NOT NULL default '',
  `newaddress` varchar(128) NOT NULL default '',
  `newcity` varchar(64) NOT NULL default '',
  `newcountry` char(2) NOT NULL default '',
  `newstate` varchar(32) NOT NULL default '',
  `newzip` varchar(32) NOT NULL default '',
  `newphone` varchar(64) NOT NULL default '',
  `newfax` varchar(64) NOT NULL default '',
  `sponsor` int(11) NOT NULL default '0',
  `confirm` varchar(255) NOT NULL default '',
  `cdate` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `newuser` (`newuser`),
  KEY `newmail` (`newmail`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_emails`
-- 

DROP TABLE IF EXISTS `dp_emails`;
CREATE TABLE `dp_emails` (
  `id` int(11) NOT NULL auto_increment,
  `key` varchar(64) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `value` longtext,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `keyword` (`key`),
  KEY `name` (`name`)
) TYPE=MyISAM COMMENT='E-Mail Templates' AUTO_INCREMENT=1 ;


INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (1, 'CONFIRM-TO-MEMBER', 'Confirm E-Mail for new member', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information you need to continue the signup process...\r\n\r\nYou recently were at the [sitename] website and signed up, you must continue the signup process and enter your account information.  To do so, you can navigate to the below URL:\r\n\r\nClick to this link to confirm your registration: [confpage]?cid=[confhash]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n\\\\\\"THE NEW PAYMENT SYSTEM\\\\\\"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (2, 'SIGNUP-TO-MEMBER', 'You was registered in the our system', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information you requested...\r\n\r\nYou recently were registered the [sitename] website therefore we sent your account login information to you.\r\n\r\nYou can find such information below:\r\n---\r\nUsername: [username]\r\nPassword: [password]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW ONLINE UNIVERSAL PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (3, 'SIGNUP-TO-ADMINS', 'A new user has signed up', 'A new user has signed up.\r\n\r\nEmail: [emailadr]\r\nUsername: [username]\r\nPassword: [password]');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (4, 'UPDATE-MEMBER-PROFILE', 'Your profile information was changed!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information you need to continue the profile update process...\r\n\r\nYou recently were at the [sitename] website and updated your profile. If it is not so please check of the your account.\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (5, 'UPDATE-BANK-INFORMATION', 'Your bank information was changed!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information you need to continue the profile update process...\r\n\r\nYou recently were at the [sitename] website and updated your bank information. If it is not so please check of the your account.\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (6, 'UPDATE-CARD-INFORMATION', 'Your credit card information was changed!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information you need to continue the profile update process...\r\n\r\nYou recently were at the [sitename] website and updated your credit card information. If it is not so please check of the your account.\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (7, 'SEND-MONEY', 'Money Waiting', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid to your account...\r\n\r\nA [sitename] user has just successfully sent you money! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender''s E-Mail: [emailadr]\r\nAmount Received: [amount]\r\nSender''s Comments: [comments]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW ONLINE UNIVERSAL PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (8, 'REQUEST-MONEY', 'Money Waiting', 'Hello [fullname],\r\n\r\nThis is not SPAM, this is an e-mail from [sitename].\r\n\r\nA member of [sitename] has requested money!\r\n\r\nFrom Email: [emailadr]\r\nAmount: [amount]\r\n\r\nIn order for you to send this user money, you must create an account on [sitename].\r\n\r\nTo complete this transaction, you need to click the link below (or if there is no link, copy the address to your web browser) and sign up for an account. Instructions on approving or denying the transaction can be found on our website.\r\n[singpage]\r\n\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (9, 'SEND-ESCROW', 'Money Waiting', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid by escrow to your account...\r\n\r\nA [sitename] user has just successfully sent you money! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender''s E-Mail: [emailadr]\r\nAmount Received: [amount]\r\nSender''s Comments: [comments]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (10, 'CONFIRM-ESCROW', 'Payment by escrow was confirmed!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail containing a notification that escrow was confirmed...\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (11, 'CANCEL-ESCROW', 'Payment by escrow was cancelled!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification that escrow was cancelled...\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (12, 'REFUND-ESCROW', 'Payment by escrow was refunded!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification that escrow was confirmed...\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (13, 'DOWNLINE-CHANGE', 'You have a new member in your downline!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information about your downline...\r\n\r\nA new member has signed up under your account! \r\n\r\n----------------------------------\r\nMember Username: [username]\r\nEmail Address: [emailadr]\r\n---------------------------------- \r\n\r\nKeep up the good work! \r\n\r\nRemember, you will get 2.5% of all the StormPay fees this new member generates... \r\n\r\n\r\nThank you for promoting [sitename]!\r\n\r\n[sitename] Service Team\r\n"THE PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (14, 'PAYMENT-MONEY', 'Payment Notification', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid from your account...\r\n\r\nYou have just successfully make payment! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender\\\\\\''s E-Mail: [emailadr]\r\nAmount Received: [amount]\r\nSender\\\\\\''s Comments: [comments]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nIf you do not have a [sitename] account,  please create an account\r\nto get the money.  It only takes a few minutes and it is Free!!!\r\n\r\nIf this is the FIRST payment you received at this email address\r\nthrough [sitename], please log into your account, click the \\\\\\"VIEW ALL TRANSACTIONS\\\\\\" menu item, then check all your transactions.\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n\\\\\\"THE NEW ONLINE UNIVERSAL PAYMENT SYSTEM\\\\\\"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (15, 'SUBSCRIPTION-MONEY', 'Subscription Notification', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid from your account...\r\n\r\nYou have just successfully make subscription! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender''s E-Mail: [emailadr]\r\nAmount Received: [amount]\r\nSender''s Comments: [comments]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nIf you do not have a [sitename] account,  please create an account\r\nto get the money.  It only takes a few minutes and it is Free!!!\r\n\r\nIf this is the FIRST payment you received at this email address\r\nthrough [sitename], please log into your account, click the "VIEW ALL TRANSACTIONS" menu item, then check all your transactions.\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW ONLINE UNIVERSAL PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (16, 'PAYMENT-MONEY-TO-OWNER', 'A member has just successfully make payment!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid to your account...\r\n\r\nA [sitename] user has just successfully make payment! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender''s E-Mail: [buyeradr]\r\nAmount Received: [amount]\r\nSender''s Comments: [comments]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nIf you do not have a [sitename] account,  please create an account\r\nto get the money.  It only takes a few minutes and it is Free!!!\r\n\r\nIf this is the FIRST payment you received at this email address\r\nthrough [sitename], please log into your account, click the "VIEW ALL TRANSACTIONS" menu item, then check all your transactions.\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (17, 'SUBSCRIPTION-MONEY-TO-OWNER', 'A member has just successfully make subscription!', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid from your account...\r\n\r\nA [sitename] user has just successfully make subscription! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender''s E-Mail: [buyeradr]\r\nAmount Received: [amount]\r\nSender''s Comments: [comments]\r\n\r\nYou can access your account anytime at:\r\n[lognpage]\r\n\r\nIf you do not have a [sitename] account,  please create an account\r\nto get the money.  It only takes a few minutes and it is Free!!!\r\n\r\nIf this is the FIRST payment you received at this email address\r\nthrough [sitename], please log into your account, click the "VIEW ALL TRANSACTIONS" menu item, then check all your transactions.\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (18, 'RESTORE-PASSWORD', 'Lost Password', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing the information you need to continue the signup process...\r\n\r\nThe lost password for your [sitename] account is: [password]\r\n\r\nPlease log in to [sitename] by following this link: \r\n[lognpage]\r\n\r\nThank you for your time,\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW ONLINE UNIVERSAL PAYMENT SYSTEM"');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (19, 'CONFIRM-NEW-EMAIL', 'New E-mail address added', 'Dear [fullname],\r\nYou have sucessfully added a new email address but you have to confirm it first.\r\n[emailpage]?c=[confcode]&u=[uid]');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (20, 'NEW-EMAIL-ACTIVATED', 'New E-mail address successfully added', 'Dear [fullname],\r\nYour email address has been successfully verified.');
INSERT INTO `dp_emails` (`id`, `key`, `name`, `value`) VALUES (21, 'PAYMENT-TO-UNREGMEMBER', 'Money Waiting', 'Hello,\r\n\r\nThis is not SPAM, this is an e-mail from [sitename] containing a notification of money paid to you.\r\n\r\nA [sitename] user has just successfully sent you money! Please look at the below details for information on this transaction.\r\n\r\nSender: [username]\r\nSender''s E-Mail: [emailadr]\r\nAmount Received: [amount]\r\nSender''s Comments: [comments]\r\n\r\n\r\nTo get the money you have first to register to [sitename] using the same email address this email is sent to.\r\nUse that link to continue registration process: [usersite]\r\nThis email is valid during 10 days. If you don''t signup within this period, money invoice will be cancelled.\r\n\r\nThank you!\r\n\r\n[sitename] Services Team\r\n[hostname]\r\n"THE NEW PAYMENT SYSTEM"');


-- --------------------------------------------------------

-- 
-- Table structure for table `dp_faq_cat_list`
-- 

DROP TABLE IF EXISTS `dp_faq_cat_list`;
CREATE TABLE `dp_faq_cat_list` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `title` char(200) NOT NULL default '',
  `parent` int(3) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_faq_list`
-- 

DROP TABLE IF EXISTS `dp_faq_list`;
CREATE TABLE `dp_faq_list` (
  `id` tinyint(3) unsigned NOT NULL auto_increment,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `cat` int(3) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_member_emails`
-- 

DROP TABLE IF EXISTS `dp_member_emails`;
CREATE TABLE `dp_member_emails` (
  `owner` int(11) NOT NULL default '0',
  `email` varchar(255) NOT NULL default '',
  `active` tinyint(1) NOT NULL default '0',
  `primary` tinyint(1) NOT NULL default '0',
  `verifcode` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`owner`,`email`),
  UNIQUE KEY `email` (`email`)
) TYPE=MyISAM;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_members`
-- 

DROP TABLE IF EXISTS `dp_members`;
CREATE TABLE `dp_members` (
  `id` int(11) NOT NULL auto_increment,
  `sponsor` int(11) NOT NULL default '0',
  `username` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `question` varchar(255) NOT NULL default '',
  `answer` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `active` tinyint(1) NOT NULL default '0',
  `status` tinyint(4) NOT NULL default '0',
  `empty` tinyint(1) NOT NULL default '1',
  `cdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `ldate` datetime NOT NULL default '0000-00-00 00:00:00',
  `adate` datetime NOT NULL default '0000-00-00 00:00:00',
  `last_ip` varchar(255) default NULL,
  `fname` varchar(32) NOT NULL default '',
  `lname` varchar(32) NOT NULL default '',
  `company` varchar(128) NOT NULL default '',
  `regnum` varchar(32) NOT NULL default '',
  `drvnum` varchar(32) NOT NULL default '',
  `address` varchar(128) NOT NULL default '',
  `city` varchar(64) NOT NULL default '',
  `country` char(2) NOT NULL default '',
  `state` varchar(32) NOT NULL default '',
  `zip` varchar(32) NOT NULL default '',
  `phone` varchar(64) NOT NULL default '',
  `fax` varchar(64) NOT NULL default '',
  `ctype` varchar(8) NOT NULL default '',
  `cname` varchar(64) NOT NULL default '',
  `cnumber` varchar(32) NOT NULL default '',
  `ccvv` varchar(16) NOT NULL default '',
  `cmonth` tinyint(2) NOT NULL default '0',
  `cyear` smallint(6) NOT NULL default '0',
  `bname` varchar(128) NOT NULL default '',
  `baddress` varchar(128) NOT NULL default '',
  `bcity` varchar(64) NOT NULL default '',
  `bzip` varchar(16) NOT NULL default '',
  `bcountry` char(2) NOT NULL default '',
  `bstate` varchar(32) NOT NULL default '',
  `bphone` varchar(32) NOT NULL default '',
  `bnameacc` varchar(128) NOT NULL default '',
  `baccount` varchar(32) NOT NULL default '',
  `btype` char(2) NOT NULL default '',
  `brtgnum` varchar(9) NOT NULL default '',
  `bswift` varchar(32) NOT NULL default '',
  `description` longtext,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `email` (`email`),
  KEY `fname` (`fname`),
  KEY `lname` (`lname`)
) TYPE=MyISAM COMMENT='System Members' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_products`
-- 

DROP TABLE IF EXISTS `dp_products`;
CREATE TABLE `dp_products` (
  `id` int(11) NOT NULL auto_increment,
  `type` tinyint(4) NOT NULL default '0',
  `sold` int(11) NOT NULL default '0',
  `owner` int(11) NOT NULL default '0',
  `price` double(10,2) NOT NULL default '0.00',
  `period` int(11) NOT NULL default '0',
  `setup` double(10,2) NOT NULL default '0.00',
  `trial` double(10,2) NOT NULL default '0.00',
  `tax` double(10,2) NOT NULL default '0.00',
  `shipping` double(10,2) NOT NULL default '0.00',
  `button` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `ureturn` mediumtext NOT NULL,
  `unotify` mediumtext NOT NULL,
  `ucancel` mediumtext NOT NULL,
  `comments` longtext NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`),
  KEY `owner` (`owner`),
  KEY `name` (`name`)
) TYPE=MyISAM COMMENT='Products' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_shop_categories`
-- 

DROP TABLE IF EXISTS `dp_shop_categories`;
CREATE TABLE `dp_shop_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text,
  PRIMARY KEY  (`id`),
  KEY `parent_id` (`parentid`,`name`),
  KEY `parentid` (`parentid`),
  KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;


INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (1, 0, 'Antiques & Art', 'Top Antiques & Art');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (2, 0, 'Auction Resources', 'Top Auction Resources');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (3, 0, 'Automotive', 'Top Automotive');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (4, 0, 'Babies & Kids', 'Top Babies & Kids');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (5, 0, 'Beauty', 'Top Beauty');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (6, 0, 'Books, Music, Movies', 'Top Books, Music, Movies');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (7, 0, 'Business Services', 'Top Business Services & Supplies');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (8, 0, 'Clothing', 'Top Clothing');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (9, 0, 'Collectibles', 'Top Collectibles');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (10, 0, 'Communication', 'Top Communication');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (11, 0, 'Computers', 'Top Computers & Internet');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (12, 0, 'Crafts', 'Top Crafts');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (13, 0, 'Cultures & Religions', 'Top Cultures & Religions');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (14, 0, 'Currency & Coins', 'Top Currency & Coins');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (15, 0, 'Dolls & Bears', 'Top Dolls & Bears');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (16, 0, 'Electronics', 'Top Electronics');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (17, 0, 'Fashion', 'Top Fashion');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (18, 0, 'Food & Drink', 'Top Food & Drink');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (19, 0, 'Gifts & Flowers', 'Top Gifts & Flowers');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (20, 0, 'Health & Nutrition', 'Top Health & Nutrition');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (21, 0, 'Hobbies', 'Top Hobbies');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (22, 0, 'Home & Garden', 'Top Home & Garden');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (23, 0, 'Entertainment', 'Top Media & Entertainment');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (24, 0, 'Non-Profit & Political', 'Top Non-Profit & Political');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (25, 0, 'Pets & Animals', 'Top Pets & Animals');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (26, 0, 'Real Estate', 'Top Real Estate');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (27, 0, 'Services', 'Top Services');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (28, 0, 'Sports & Recreation', 'Top Sports & Recreation');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (29, 0, 'Toys & Games', 'Top Toys & Games');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (31, 1, 'Fine Arts', 'Top Fine Arts');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (32, 1, 'Furniture', 'Top Furniture');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (33, 1, 'General', 'Top General');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (34, 1, 'Glass', 'Top Glass');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (35, 1, 'Needlework & Hand Crafts', 'Top Needlework & Hand Crafts');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (36, 1, 'Pottery & Glass', 'Top Pottery & Glass');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (37, 1, 'Prints', 'Top Prints');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (38, 1, 'Reproductions', 'Top Reproductions');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (39, 1, 'Sculptures', 'Top Sculptures');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (40, 1, 'Western Art', 'Top Western Art');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (41, 1, 'Woodworking', 'Top Woodworking');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (42, 32, 'Furniture1', 'Top Furniture1');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (44, 42, 'Furniture2', 'Top Furniture2');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (45, 1, 'Prepaid Call Time', 'QTC Members Only Call');
INSERT INTO `dp_shop_categories` (`id`, `parentid`, `name`, `description`) VALUES (46, 31, 'SKSKS AFRT', 'SLSSlssl');


-- --------------------------------------------------------

-- 
-- Table structure for table `dp_shop_items`
-- 

DROP TABLE IF EXISTS `dp_shop_items`;
CREATE TABLE `dp_shop_items` (
  `id` int(11) NOT NULL auto_increment,
  `categoryid` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `url` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `categoryid` (`categoryid`,`name`),
  KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_subscriptions`
-- 

DROP TABLE IF EXISTS `dp_subscriptions`;
CREATE TABLE `dp_subscriptions` (
  `id` int(11) NOT NULL auto_increment,
  `owner` int(11) NOT NULL default '0',
  `member` int(11) NOT NULL default '0',
  `product` int(11) NOT NULL default '0',
  `sdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `pdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  KEY `owner` (`owner`),
  KEY `member` (`member`),
  KEY `product` (`product`)
) TYPE=MyISAM COMMENT='Subscribers' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_temp_pays`
-- 

DROP TABLE IF EXISTS `dp_temp_pays`;
CREATE TABLE `dp_temp_pays` (
  `id` int(11) NOT NULL auto_increment,
  `tdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `sender` int(11) NOT NULL default '0',
  `receiver` varchar(255) NOT NULL default '',
  `amount` double(10,2) NOT NULL default '0.00',
  `status` tinyint(1) NOT NULL default '0',
  `comments` longtext,
  PRIMARY KEY  (`id`),
  KEY `tdate` (`tdate`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`)
) TYPE=MyISAM COMMENT='Pending payments for unregistered members' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_transactions`
-- 

DROP TABLE IF EXISTS `dp_transactions`;
CREATE TABLE `dp_transactions` (
  `id` int(11) NOT NULL auto_increment,
  `tdate` datetime default NULL,
  `sender` int(11) NOT NULL default '0',
  `receiver` int(11) NOT NULL default '0',
  `related` int(11) NOT NULL default '0',
  `amount` double(10,2) NOT NULL default '0.00',
  `fees` double(10,2) NOT NULL default '0.00',
  `type` tinyint(1) NOT NULL default '0',
  `status` tinyint(1) NOT NULL default '0',
  `comments` longtext,
  `ecomments` longtext,
  PRIMARY KEY  (`id`),
  KEY `tdate` (`tdate`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`)
) TYPE=MyISAM COMMENT='Transactions' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dp_visits`
-- 

DROP TABLE IF EXISTS `dp_visits`;
CREATE TABLE `dp_visits` (
  `id` int(11) NOT NULL auto_increment,
  `member` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `address` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `member` (`member`)
) TYPE=MyISAM COMMENT='History of members IPs' AUTO_INCREMENT=1 ;



