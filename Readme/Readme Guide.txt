                                           		 AlstraSoft EPay Enterprise v4.20 Documentation

==================================================
Server requirements for AlstraSoft EPay Enterprise 
==================================================
1.) MySQL (version 3.23 or higher)
2.) MYSQL database
3.) PHP (version 4.2.3 or higher)
4.) Crontab
5.) SSL (optional)


====================================
Installation And Setup Instructions: 
====================================
1. Unpack all files to the desired folder (example: /enterprise) and upload them to server thru FTP.

2. Set permission 777 for the following files and directories:
/config.htm
/templates (and all directories and the files in this directory)

3. Create new database and execute database.sql using a MySQL Db manager such as PHPMyAdmin

4. Open config.htm and set the following variables:
$db_hostname - database hostname;
$db_username - database username;
$db_password - database password;
$db_database - database name;
$folder - name of folder (if you install it in main folder for your site please leave it blank)

5. Configure cron sheduler to run /cron/rcharge.php once per day

6. Open /admins/ in your browser and enter "admin" as the login and the default password.

7. For editing of the templates, please refer to templates.txt file

=====================
Running The Software:
=====================
Admin Login: http://www.yoursite.com/enterprise/admins Default username: admin, password: admin
Main Page: http://www.yoursite.com/enterprise


Once you have log into the admin panel, you can click the General link under the Configuration to setup your site by following
the on-screen instructions

You will also be able to edit HTML and email templates through the admin panel   


================
Customer Support
================
If you need help installing or configuring your script, we offer professional installation for our software for a flat-fee of 
$30. If you require us to help you install our software on your server, feel free to email us at support@alstrasoft.com or 
use our online feedback form to send us an installation request.  


===============
Version History
===============
Additional Paid Plugins
- Premium template + mobile addon: $125
- SMS module addon: $135

Version 4.20:
- Admin CMS addon
- Database optimization for large transaction sites
- User frontend fixes

Version 4.13:
- Multi-language addon

Version 4.11:
- Admin and User front-end sql and bug fixes

Version 4.0:
- Updated madmin mass email
- Bug fixes for system settings

Version 3.5:
- Security fix related to XSS exploits
- Multiple member emails: members can now choose the amount of emails the member can use his account with.
- Back after logout disabled (security feature).
- CSV file upload for mass payments: you can use a CSV file for mass payments and upload it. 
- Send money to unregistered members: members can now send money to unregistered members. If the member is not present in the 
system, an email will be sent to him, inviting him to open an account and as soon as the account is confirmed, the money is 
transferred into his account. In account overview, you can see pending payments to unregistered members.
- FAQ module: edit FAQ questions and answers from the admin back-end.

Version 3.0:


================================
License Agreement and Disclaimer
================================
AlstraSoft EPay Enterprise 4.20
Contact: sales@alstrasoft.com 

AlstraSoft.com, Copyright 2003-2013
All rights reserved. 


THIS IS NOT FREE SOFTWARE !!!!
If you have downloaded this software from a website other than 'www.AlstraSoft.com' or if you have otherwise received this 
software from someone who is not a representative of this organization you are involved in an illegal activity. The copying, 
distribution, installation and usage of this software without our consent is illegal. In order to help us continue the 
development and production of good software, we kindly ask for your collaboration. Please contact us at 
'piracy@alstrasoft.com' and tell us where you got the software from.

LICENSE AGREEMENT
Do not run the AlstraSoft software on a site other than which they have been licensed for. Violation of this license 
agreement may void your right to receive support and subject you to legal action. You should carefully read the following 
terms and conditions before using this software. Unless you have a different license agreement signed by AlstraSoft, your 
use of this software indicates your acceptance of this license agreement and disclaimer of warranty. 


As a registered user, you may alter or modify the AlstraSoft as far as the HTML output is concerned. Further modification
of the script code requires written permission of the author (Just drop us a short note ). You cannot give anyone else 
permission to modify the AlstraSoft Software. You are strictly prohibited from distributing copies of this software 
without prior permission. You are specifically prohibited from charging, or requesting donations, for any copies, however 
made, and from distributing the software and/or documentation with other products (commercial or otherwise) without prior 
written permission! 

DISCLAIMER OF WARRANTY
This software, the information, code and/or executables as well as the accompanying files provided are provided "as is" 
without warranty of any kind, either expressed or implied, including but not limited to the implied warranties of 
merchantability and fitness for a particular purpose. In no event shall the author or seller be liable for any damages 
whatsoever including direct, indirect, incidental, consequential, loss of data, loss of business profits or special damages, 
even if the author or seller has been advised of the possibility of such damages. Good data processing procedure dictates 
that any program be thoroughly tested with non-critical data before relying on it. The user must assume the entire risk of 
using the program. 
