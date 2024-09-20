<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';

//Only super admin is allowed to access this page
if ($_SESSION['admin_type'] !== 'super') {
    // show permission denied message
    echo 'Permission Denied';
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

        	$username = $_POST['user_name'];
            $password =$_POST['password'];
            $admin_type =$_POST['admin_type'];

            $sql = "INSERT INTO `admin_accounts`(`user_name`, `password`, `admin_type`) VALUES ('$username','$password','$admin_type')";
            $last_id = mysqli_query($conn, $sql);
    if($last_id)
    {

    	$_SESSION['success'] = "Admin user added successfully!";
    	header('location: admin_users.php');
    	exit();
    }  
    
}

$edit = false;


require_once 'includes/header.php';
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Add User</h2>
		</div>
	</div>
	 <?php 
    include_once('includes/flash_messages.php');
    ?>
	<form class="well form-horizontal" action=" " method="post"  id="contact_form" enctype="multipart/form-data">
		<?php include_once './forms/admin_users_form.php'; ?>
	</form>
</div>




<?php include_once 'includes/footer.php'; ?>