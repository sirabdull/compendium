<?php 

require_once '../../lib/Mainsite.php';
use Lib\Mainsite;

$token = $_GET['token'] ?? 'Nms-2222'; 

$mainsite = new Mainsite();

echo $mainsite->handle(token: $token);



