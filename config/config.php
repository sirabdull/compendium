<?php

/*

config file to configure connection and other variables
include first in every page;

*/

/**
 * pRODUCTION RELEASE 1.0
 */
error_reporting(E_ALL);
// ERROR LOGGING 

error_reporting(E_ALL);
ini_set('error_log', '../Test/error/php-errors.log'); 
ini_set('log_errors', 1);


// Rest of PHP script








define('BASE_PATH', dirname(dirname(__FILE__)));
define('APP_FOLDER', 'nmscomp');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

$server = "www.nmscompendium.com.ng";
$user = "nmscompe_abdull";
$password = "Dashnov@4";
$database = "nmscompe_candidates";
$suscess= '<h1>'.'connection sucessfull'.'<h1>';
$notestablished= '<h1>'.'connection unsucessfull'.'<h1>';

require 'dbconnect.php';

?>