<?php

//Authentication middleware

if(!isset($_SESSION['login'] ) or  !isset($_SESSION['email']))
 { 
      header('Location: /auth/login');
 }
