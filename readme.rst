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

* 1. Download this repo or clone
* 2. Extract or move files into your server directory exp: C:/xampp/htdocs/[project_name] or /var/www/[project_name]
* 3. Open .htaccess to change RewriteBase (Find line: RewriteBase /S7DesignTest/) and change it to your [project_name]
* 4. Create new database on your MySQL server and import from /database/s7designtest.sql
* 5. Go to /application/config.php and change following line to match your server conf: $config['base_url'] = 'http://localhost/S7DesignTest/' -> where /S7DesignTest is [project_name]
* 6. Go to /application/database.php and change following line to match your db server conf: 
.. 'hostname' => 'localhost',  -> your server
.. 'username' => 'root', -> username to your mysql server
.. 'password' => '', -> password to your mysql server
.. 'database' => 's7designtest', ->database name

* 7. Try to login with username: admin and password: admin1234, should everything work.

