<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
##connection variables
$server = "www.nmscompendium.com.ng";
$user = "nmscompe_abdull";
## password is confidential
$password = "Dashnov@4";
$database = "nmscompe_candidates";
$suscess= '<h1>'.'connection sucessfull'.'<h1>';
$notestablished= '<h1>'.'connection UNsucessfull'.'<h1>';
##establishing connection

$conn = mysqli_connect($server,$user,$password,$database);
if(!$conn){
    echo $notestablished;
}