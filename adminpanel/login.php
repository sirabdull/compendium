<?php
session_start();
require '../config/config.php';

/**
 * Get instance of DB object
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['user'];
	$password =$_POST['password'];
	#$remember ='remember';

	
	$auth =  "SELECT * FROM `admin_accounts` WHERE `user_name` = '$username' AND `password` = '$password'";
    $exeauth= mysqli_query($conn,$auth);
    $row = mysqli_fetch_assoc($exeauth);
   
    if(mysqli_num_rows($exeauth)>0){
      
		unset($_SESSION['failed']);

		$_SESSION['user_logged_in'] = "YES"; 
		$_SESSION['admin_type'] = $row['admin_type'];
	
		header("location:index.php");
		
    }

else{header("location:login.php");
	
	$_SESSION['failed'] = "ACCESS DENIED";
	

}
	//Get DB instance.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>








<body>
	

<div
	class="container-md  p-5 pt-5"
>
<h6>
<div class="p-5 m-5">
	<?php
	if(isset($_SESSION['failed'])) {
?>
<div
	class="alert alert-danger alert-dismissible fade show"
	role="alert"
>
	<button
		type="button"
		class="btn-close"
		data-bs-dismiss="alert"
		aria-label="Close"
	></button>
	<strong>ERROR</strong> <?php echo $_SESSION['failed'] ?>
</div>

<script>

	var alertList = document.querySelectorAll(".alert");
	alertList.forEach(function (alert) {
		new bootstrap.Alert(alert);
	});
</script>
<?php
	}
	?>

<form method="post" action="" class="row g-3 was-validated" novalidate>
	<h1 class="display-4">Admin Login</h1>
	
  <div class="">
	<label for="validationCustom01" class="form-label">user</label>
	<input type="text" name="user" class="form-control" id="validationCustom01"  required>
	<div class="valid-feedback">
	  Looks good!
	</div>
	<div class="invalid-feedback">
	 sorry invalid!
	</div>
  </div>
  <div class=""
	<label for="validationCustom02" class="form-label">password</label>
	<input type="text" name="password" class="form-control" id="validationCustom02"  required>
	<div class="valid-feedback">
	  Looks good!
	</div>
	<div class="invalid-feedback">
	  cannot be empty
	</div>
  </div>

  <button class=" btn 
  
 btn-primary" type="submit">LOGIN</button>
  </div>
</form>

</div>
</h6>
</div>
</body>
</html>
<?php

?>