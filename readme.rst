###################
What is this app?
###################

This app is written in PHP and implements CodeIgniter framework.
This is just some sample app for events.... 

*******************
Configuration
*******************
=============
Easy setup:
=============

*  Download this repo or clone
*  Extract or move files into your server directory exp: C:/xampp/htdocs/[project_name] or /var/www/[project_name]
*  Open .htaccess to change RewriteBase (Find line: RewriteBase /S7DesignTest/) and change it to your [project_name]
*  Create new database on your MySQL server and import from /database/s7designtest.sql
*  Go to /application/config.php and change following line to match your server conf: 
| --
$config['base_url'] = 'http://localhost/S7DesignTest/'``` // where /S7DesignTest/ is [project_name] and localhost is your server name
|
*  Go to /application/database.php and change following line to match your db server conf: 
| --
'hostname' => 'localhost',  // your server
'username' => 'root', // username to your mysql server
'password' => '', // password to your mysql server
'database' => 's7designtest', // database name
|

*  Try to login with username: admin and password: admin1234, should everything work.

===============
SYSTEM REQUIREMENTS
===============
* PHP 5.4 or newer
* MySQL server (tested on 4.3.11)
