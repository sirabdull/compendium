<?php 
/*
this file ensures all seesion variables are set
*/
session_start();
  
$_SESSION['login'] = true;
$_SESSION['email'] = $_GET['email'];

if(!isset($_SESSION['email']) ){

    header('location:./login');

}
else{
    header('location:/dashboard');

}
  
 
