<?php

// setting, definition
// DSN(Data Source Name)
define('DB_DSN',  'mysql:dbname=bbs;host=127.0.0.1;charset=utf8');
define('DB_USER', 'test'); 			 // username
define('DB_PASS', 'test');		 // password
define('SESSION_NAME', 'S_snowboard');   // session cookie
define('DISP_MAX', 10);					 // maximum # of post 
define('LIMIT_SEC', 5);					 // Ban continuing post
define('TOKEN_MAX', 10);				 // maximum one time token
date_default_timezone_set('Asia/Tokyo'); // timezone
mb_internal_encoding('UTF-8'); 			 // internal encoding

