<?php

//<------------------------------------//DB Config//------------------------------------->//
defined('DB_SERVER') ? null : define('DB_SERVER', 'FILL_ME');
defined('DB_USER') ? null : define('DB_USER', 'FILL_ME');
defined('DB_PASS') ? null : define('DB_PASS', 'FILL_ME');

//<---------------------------------//Error messages//---------------------------------->//
defined('ERROR_GENERIC') ? null : define('ERROR_GENERIC', 'Server error.');

//<-----------------------------------//Exceptions//------------------------------------>//
defined('EXCEPTION_POST_PARAM_NOT_FOUND') ? null : define('EXCEPTION_POST_PARAM_NOT_FOUND', 'Error, expected post parameters not found.');
