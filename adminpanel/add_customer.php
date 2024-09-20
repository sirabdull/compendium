<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
require_once './includes/dbconnect.php';


//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
   $fullname = $_POST['fullname'];
   $password =$_POST['password'];
   $verified = $_POST['verification'];
   $email= $_POST['email'];
   $type = $_POST['subscription_type'];
   $sub = $_POST['subscribed'];
   $mobile = $_POST['mobile'];
   $date = date('y-m-d');

    //Insert timestamp
    $query = "INSERT INTO `registerd_candidates` (`fullname`, `email`, `mobile` , `password` , `verification` , `subscribed`, `subscription_type`, `reg_date`) VALUES ('$fullname' , '$email', '$mobile', '$password', '$verified', '$sub', '$type', '$date')";
    $result = mysqli_query($conn, $query);
    if($result)
    {
    	$_SESSION['success'] = "Customer added successfully!";
    	header('location: customers.php');
    	exit();
    }
    else
    {
        echo 'insert failed: ' ;
        exit();
    }
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;

require_once 'includes/header.php'; 
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Add Candidates</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('./forms/customer_form.php'); ?>
    </form>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $("#customer_form").validate({
       rules: {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },   
        }
    });
});
</script>

<?php include_once 'includes/footer.php'; ?>