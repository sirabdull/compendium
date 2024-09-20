<?php
session_start();
require_once './config/config.php';
require_once 'includes/auth_validate.php';


// Sanitize if you want
$question_id = filter_input(INPUT_GET, 'question_id');
$operation = filter_input(INPUT_GET, 'operation'); 
($operation == 'edit') ? $edit = true : $edit = false;
 $db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Get customer id form query string parameter.
    $question_id = filter_input(INPUT_GET, 'question_id');

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    
   
    $db = getDbInstance();
    $db->where('question_id',$question_id);
    $stat = $db->update('questions', $data_to_update);

    if($stat)
    {
        $_SESSION['success'] = "Question updated successfully!";
        //Redirect to the listing page,
        header('location: questions.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }
}


//If edit variable is set, we are performing the update operation.
if($edit)
{
    $db->where('question_id', $question_id);
    //Get data to pre-populate the form.
    $question = $db->getOne("questions");
}
?>


<?php
    include_once 'includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Questions</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/questions_form.php'); 
        ?>
    </form>
</div




<?php include_once 'includes/footer.php'; ?>