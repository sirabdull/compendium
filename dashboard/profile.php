<?php 
session_start();
require '../auth/auth.php';
require 'includes/header.php';
require '../lib/candclass.PHP';
$profile = new  Candidates\Candidate();

if(isset($_POST['passchange'])){
    $field = array('password');
    $value = array($_POST['password']);
$profile->update($field,$value);
$_SESSION['updated'] = "password changed successfully";


}
 if(isset($_POST['profilechange'])){
    $field = array('fullname', 'mobile');
    $value = array($_POST['fullname'], $_POST['mobile']);
$profile->update($field,$value);
$_SESSION['updated'] = "profile updated successfully";

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
  <link rel="shortcut icon" href="/nms-logo.webp" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="style.css">
    <style>
input{
    margin-top:20px;
    padding:10px;
position: relative;
height:50px;
width:300px;
border-radius:20px;
border:2px solid black;
}
      label{
        margin-left:-40px;
      }
      .shift{
        margin-left: 300px;
      }
      @media screen and (max-width:500px) {
        .shift{
            margin-left:0px;
        }
        .container{
            margin-left:0px;
        }
        input{
            display:none;
          
        }
      }
       @media screen and (min-width:1500px) {
        .shift{
            margin-left:500px;
        }
       }
    </style>
</head>
<body>
    
<div class="container shift ">

    <div class="row">
        <div
            class="col-4 pro  rounded bg-success"
        >
            <div class="p-2">
<h1>
    <i class="fa fa-user-circle biggerwg" aria-hidden="true"></i>
   
</h1> 
<div class="pt-5"></div>
<button type="button"   data-bs-toggle="modal"
    data-bs-target="#modalId" class="btn  btn-warning btn-lg"> Update profile <i class="fa fa-pencil" aria-hidden="true"></i></button>
    <div class="pt-5"></div>
<button type="button"   data-bs-toggle="modal"
    data-bs-target="#modalpass" class="btn  btn-danger btn-lg">change password <i class="fa fa-lock" aria-hidden="true"></i></button>
    


    <?php if(isset($_SESSION['updated'])) {?>
        <div class="pt-4">
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>
        
            <strong>Success </strong> <?php echo $_SESSION['updated']?>
        </div>
        </div>
        <?php
        } ?>
<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="modalId"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                Edit profile
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <form action="" method="post">

            <div class="modal-body">
            <div class="mb-2">
                  <h4>  <label for="fullname" class="form-label">Fullname <i class="fa fa-user" aria-hidden="true"></i></label> </h4>
                    <input
                    pattern="^(?=.*[A-Za-z])+\s+(?=.*[A-Za-z])$"
title="must be a full name with space in between"
                        type="text"
                        class="form-control"
                        name="fullname"
                        id="fullname"
                        aria-describedby="helpId"
                        placeholder="enter fullname"
                        value="<?php echo $profile->display('registerd_candidates','fullname')?>"
                    />
                    <small id="helpId" class="form-text text-success">please enter the new full name e.g musa Haruna lawal.</small>
                </div>
                

                <div class="mb-2">
                   <h4> <label for="" class="form-label">Mobile <i class="fa fa-mobile" aria-hidden="true"></i></label></h4>
                    <input
                        type="tel"
                        class="form-control"
                        name=" mobile"
                        id="mobile"
                        pattern="[0-9]{11,}"
                        title="must look like 08145931080"
                        aria-describedby="helpId"
                        placeholder=" enter mobile number"
                        value="<?php echo $profile->display('registerd_candidates','mobile')?>"
                    />
                    <small id="helpId"  class="form-text text-success">input new mobile number</small>
                </div>
                

            </div>



            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" name = "profilechange" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>






<!-- Modal trigger button -->


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="modalpass"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                   change password <i class="fa fa-lock" aria-hidden="true"></i>
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input
        type="Password"
        class="form-control"
        name="password"
        id="password"
        pattern="{6,}"
title="must be more than 6 characters "
        aria-describedby="helpId"
        placeholder=" new password"
     value="<?php echo $profile->display('registerd_candidates','password') ?>"
    />
    <button  type="button"  class="btn btn-info btn-sm" onclick="show(this)"> <i class="fa fa-eye-slash" aria-hidden="true"></i></button>
    <small id="helpId"  class="form-text text-muted">new password</small>
  </div>

           </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit"  name="passchange" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
    // script to hide and show password
    var cont;
    function show(e){
    const pass = document.getElementById('password');
    if(cont === undefined){
    pass.setAttribute("type","text")
   cont = 'opened';
   e.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
    }
    else  {
        pass.setAttribute("type","password");
        e.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        cont = undefined;
    }
    }
</script>














<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>



<h5>
 
    </h5>

            </div>
        </div>









        <div
            class="col-6 bg-primary rounded ml-5 pl-2"
        >
          <div class="p-2">
<h3 class=""><kbd>personal info</kbd></h3><br>
<h6>
Email: <kbd><?php echo  $profile->display('registerd_candidates','email');?> </kbd><br><br>
fullname: <kbd><?php echo  $profile->display('registerd_candidates','fullname');?></kbd><br><br>
mobile: <kbd><?php echo $profile->display('registerd_candidates','mobile');?></kbd>
</h6>
          </div>
        </div>
        
    </div>
    <div class="row">
        <div
            class="col-4 pro   rounded bg-success"
        >
            <div class="p-2">`
<h1>
    
</h1>

            </div>`
        </div>
        <div
            class="col-6 bg-primary mt-5 rounded ml-5 pl-2"
        >
          <div class="p-2">
<h3 class=""><kbd>subscription info</kbd></h3><br>

<h6>
    Your current plan: <kbd><?php echo  $profile->display('subscribed_candidates','subscription_type');?> </kbd><br><br>
subscription_date: <kbd><?php echo  $profile->display('subscribed_candidates','subscription_date');?></kbd><br><br>
expires On: <kbd><?php echo $profile->display('subscribed_candidates','expiry_date');?></kbd>
</h6>


          </div>
        </div>
        
    </div>
</div>

</body>
</html>
<?php
unset($_SESSION['updated'])
?>