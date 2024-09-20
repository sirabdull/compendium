<?php
$conn = mysqli_connect($server,$user,$password,$database);
if(!$conn){
    echo die('server temporarily down');
}