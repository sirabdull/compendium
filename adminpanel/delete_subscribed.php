<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: subscribed.php');
        exit;

	}
    $customer_id = $del_id;

    $db = getDbInstance();
    $db->where('id', $customer_id);
    $status = $db->delete('subscribed_candidates');
    
    if ($status) 
    {
        $_SESSION['info'] = "Candidate has been removed from subscribed list!  <b>PLEASE ENSURE TO CHECK IF SUBSCRIBED IS SET TO 0 ON CANDIDATES TABLE </b>";
        header('location: subscribed.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete Candidate";
    	header('location: subscribed.php');
        exit;

    }
    
}