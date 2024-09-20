<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
require_once './includes/dbconnect.php';


//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $dir = '../assets/qimages/';
    if(!empty($_FILES['question_image'])){
    $filename = $_FILES['question_image']['name'];
    $tempname = $_FILES['question_image']['tmp_name'];
     $type = $_FILES['question_image']['type'];
      $size = $_FILES['question_image']['size'];
      
      $path = $dir. uniqid() . '_' . $filename;
      
      if(move_uploaded_file($tempname, $path)){
             $image  = ltrim($path, '.');
      }
      else{
          $image = '';
      }
    }
    $text = $_POST['question_text'];
      $explanation = $_POST['explanation']; 
      
 
    $subject  = $_POST['subject'];
    $year  = $_POST['year'];
    $option_1  = $_POST['option_1'];
    $option_2  = $_POST['option_2'];
    $option_3 = $_POST['option_3'];
    $option_4  = $_POST['option_4'];
    $correct_option = $_POST['correct_option'];
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = $_POST;
$query = "INSERT INTO `questions` (`question_text`, `question_image`, `subject` , `year` ,`explanation`, `option_1` , `option_2`, `option_3`, `option_4`, `correct_option`) VALUES ('$text' , '$image', '$subject', '$year','$explanation', '$option_1', '$option_2', '$option_3', '$option_4' , '$correct_option')";
$result = mysqli_query($conn,$query);
if($result)
    {
    	$_SESSION['success'] = "Question added successfully!";
    	header('location: questions.php');
    	exit();
    }
    else
    {
        echo 'insert failed: ' . $db->getLastError();
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
            <h2 class="page-header">Add Questions</h2>
            
        </div> 
        
</div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('./forms/questions_form.php'); ?>
       
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