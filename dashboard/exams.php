<?php 
session_start();

// this should be included on all pages which requires AUTH
require '../auth/auth.php';

require_once 'includes/header.php';

?>
    <title>Exams</title>
    <link rel="shortcut icon" href="nms-logo.webp" type="image/x-icon">
    <!-- custom css-->
    <link rel="stylesheet" href="style.css">

 
<div class="container dash-content">
<div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    <h2>  practice <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2><hr>
    <div class="col-10  bg-primary p-2 rounded ml-2">
        <h1><i class="fa fa-pencil-square" aria-hidden="true"></i></h1> 
        <h5>
            Full Mock practice
        </h5>
     <h6>   <ul>
            <li>

        Simulate real-time examination
            </li>
            <li>
                Test your knowledge on NMS common enttrance full examination
            </li>
            <li>
                Math,quantitative reasoning,english,Verbal and general knowledge.
            </li>
            <li>
          Earn XP as you practice
            </li>
        </ul>
        <button type='button' data-bs-toggle='modal' data-bs-target="#full" class='btn btn-success'>START</button>
    
</h6>

</div>
    
<?php require 'includes/modals.php';?>
    
    <div class="col-10 ml-2 mt-4 top bg-success rounded ">
    <h1> <i class="fa fa-bullseye" aria-hidden="true"></i></h1> 
        <h5>
             Customized Practice
        </h5>
     <h6>   
        <ul>
            <li>
            Customize your experience
            </li>
            <li>
                Test your knowledge on specific subjects
            </li>
            <li>
                Choose your prefferd practice year
            </li>
            <li>
                Customize difficulty levels
            </li>
            <li>
              Earn XP as you practice
            </li>
        </ul>
        <button class='btn btn-primary rounded' type='button' data-bs-toggle='modal' data-bs-target="#custom">START</button>
    </div>
 
</div>
<div id='study' class="row  p-5 ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
    <h1>Study <i class="fa fa-laptop" aria-hidden="true"></i></h1> <hr>
    <div class="col rounded  bg-warning">
        <div class="P-3">
           <h1>
            <i class="fa fa-book" aria-hidden="true"></i>
          </h1>
        <h6>
        </h6>
          <h5>
            <ul>
                <li>   Study past questions,  get answers and solutions  for them.</li>
                <li>Study sessions does not earn you XP </li>
                <li>Study sessions dosen't increase or affect your progress</li>
                <li>Exams are not submited</li>
               
            </ul>
     
          </h5>
        <button class='btn btn-primary rounded' type='button' data-bs-toggle='modal' data-bs-target="#study">STUDY</button>
        </div>
    </div>
</div>

</div>

    </body>
    