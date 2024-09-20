<?php
namespace candidates;
session_start();
include '../../lib/candclass.PHP';

$user = new candidate;

$correct=$_GET['correct'] ;
$ans = $_GET['answerd'];
$questions=$_GET['questions']; 
$wrong=$_GET['wrong'] ;
$average = ($correct*100)/$questions;
$average = round($average);

function status()  {
    global $average;
    global $remark;
    if($average>=50){
        echo '<span class="text-success pt-2 top">PASS</span>';
        $result = 'PASS';
        $remark = 'Excelent work ';
    }
    else{
        echo '<span class="text-danger pt-2">FAIL</span>';
        $result = 'FAIL';
      $remark ='poor performance keep practicing';
    }
    
}

?>
<head>
<link rel="shortcut icon" href="/nms-logo.webp" type="image/x-icon">
<title>Submit</title>
</head>


<div class="alert su alet-sm alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
    <strong>Test submitted!</strong> <br> <h6>your stats have been updated view stats on your dashboard  </h6>

 </div>

<div class="container ">
        <div class=" row justify-content-center align-items-center  ">


<div class="col bg-light rounded shadow-lg">

    <div class="p-5 ">
        <Kbd >Report <br></Kbd>
<div class="av mb-2 p-2"><?php echo status(); ?></div> 

   

    <div class="">
<h3 class="bg-info rounded p-2">XP <i class="fa fa-trophy" aria-hidden="true"></i> +<?php echo $correct *1.5?> </h3>
           <h4> <kbd>
            
           progress:   </kbd><div class="progress">
            <div
                class="progress-bar  progress-bar-animated bg-dark"
                role="progressbar"
                style="width: <?php echo $user->displaystat('progress');?>"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                current progress
            </div>
           </div>
        
           </h4>
            <h4>  </h4>
            <h4> Remark <i class="fa fa-comment text-success" aria-hidden="true"></i> <?php echo $remark ?></h4>
            
            <div class="p-2"></div>
            <a  href="/dashboard/" class="btn btn-danger btn-lg">Dashboard </a>
            <a  href="/dashboard/exams.php#study" class="btn btn-warning btn-lg">Study </a> 
             <a  href="/feedback" class="btn btn-primary btn-lg">report a problem </a>

   </div>
</div>

</div>

<div class="col-4 bg-light shadow-lg">
<div class="p-5 ">
        <Kbd >Average <br></Kbd>
<div class="avg mb-2 p-2"><?php echo $average ?></div> 

   

    <div class="">
           <h4>  <i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i>Attempted : <kbd><?php echo $ans ?></kbd> </h4>
           <h4>  <i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i>Correct Answers: <kbd><?php echo $correct ?></kbd> </h4>
            <h4> <i class="fa fa-dot-circle-o text-danger" aria-hidden="true"></i> wrong Answers: <kbd><?php echo $wrong ?></h4></kbd>
            <h4><i class="fa fa-dot-circle-o text-warning" aria-hidden="true"></i> Total  Questions: <kbd><?php echo $questions ?></kbd></h4>

   </div>
</div>


</div>
        </div>

    </div>

<style>
    .top{
        margin-top:15px;
    }
.avg{
    width: 150px;
    height:150px;
    font-size:60px;
  
    border-radius:50%;

    border:3px solid black;
    text-align:center;

    
}
.av{
font-size:60px;
}
.avg small{
    font-size:20px;
    text-align:center;
}
.col{
    box-shadow:2px,3px,5px black;
}
.su{
    position:absolute;
    top:0px;
    right:0px;
    left: 65%;
    height:15Svh;
    width: 30vw;
}
img{
    z-index:-1;
    opacity:.5;
    position: absolute;
    top:-1px;
}


</style>
<!--<img src="brain.svg" width="100%" alt="braim" srcset="brain.svg">-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    


   