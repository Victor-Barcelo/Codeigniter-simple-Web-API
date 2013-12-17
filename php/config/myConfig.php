<?php

//<------------------------------------//DB Config//------------------------------------->//
defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
defined('DB_USER') ? null : define('DB_USER', 'user');
defined('DB_PASS') ? null : define('DB_PASS', '1234');

//<---------------------------------//Error messages//---------------------------------->//
defined('ERROR_GENERIC') ? null : define('ERROR_GENERIC', 'Server error.');

//<-----------------------------------//Exceptions//------------------------------------>//
defined('EXCEPTION_POST_PARAM_NOT_FOUND') ? null : define('EXCEPTION_POST_PARAM_NOT_FOUND', 'Error, expected post parameters not found.');
