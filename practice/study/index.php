<?php 

include '../../lib/candclass.PHP';
require_once "../../config/config.php";
$exam = new candidates\candidate;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
$subject =$_POST['subject'];

$year =$_POST['year'];

$result = mysqli_query($exam->getDB()," SELECT * FROM questions WHERE  `subject` = '{$subject}' AND `year` = '{$year}'" );
if(mysqli_num_rows($result)<=0){

  die('could not fetch questions now try agian later');
}
$data = array();
?>

<!DOCTYPE html>

<html lang="en">

<head>
<link rel="icon" href="/nms-logo.webp" type="image/webp">
    <title>Study</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" type="text/javascript"></script>
    <link rel="icon" href="/nms-log0.webp" type="image/webp">
    <style>
        .cover{
            margin-top:20px;
            max-width: 1000px;
         
            max-height:100000px;
            border:2px ridge white;
            border-radius:10px;
            text-align:left;
            font-family:sans-serif lucida ;
            cursor: pointer;
            position:relative;
        }
        .cover:hover{
            background:white;
            color:black;
        
        }

            input{
                color:red;
                font-size:40px;
                padding:5px;
                margin-left:10px;
                margin-right:10px;
                border:1px ridge black;
                margin-top:5px;
                width: 20px;
                height:20px;
              
                cursor: pointer;
            }
label{
    margin-left: 40px;
}

            
body {font-family: Verdana, sans-serif; margin:0}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.bt{
    width:20px;
    height:20;
 
 
   margin-left:20px
}
.dot{
  margin-left:20px;
  margin-top:50px;
  
}

.active, .dot:hover {
  background-color: green;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 500px) {
  *{font-size: 15px}

}
.questions{
padding-left:  20px;
position:relative;
margin-bottom:100px;
}
.questions{

    
}
.container-fluid{
height:100vh;
}
.column:hover{
    background-color:white;
    color:black;
}
.sub{
    position:relative;
    bottom:55px;
    float:left;
}
.menu{
    position:relative;
    top:5vh;
    right: 20px;
    float:end;
}
.answerd{
    background-color:yellow;
}
.slide{
  display:inline-block;
  
}
.mySlides{

    border:1px solid white ;
    border-radius:10px;
    font-family:sans-serif lucida ;
    padding:40px;
    margin-top:50px
}
.none{
    display:none;
}
*{
    color:white;
}
.right{
    position:fixed;
    right:10px;
    z-index: 1;
}
.content{
    content:"Hide answer";
}
.answerd{
border:2px solid green;
}
a{
  text-decoration:none;
  color:white;
}
    </style>
</head>

<body class="bg-dark">

        <?php
 
while( $row = mysqli_fetch_assoc($result)){
    $data[] =$row;
    
}
$totalq  = count($data);
//shuffle($data);
shuffle($data);
?>

<div class="container-fluid pt-5 bg-dark">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="row">
        <div class="float-end"><button class="btn right btn-primary"> <a href="/dashboard/exams.php"> Quit sudy session</a> </button></div>
        <h1 class="display-4">Study Mode <i class="fa fa-laptop" aria-hidden="true"></i></h1>
        <h5>SUbject:  <?php echo $subject?></h5>
        <h5>Year: <?php echo $year?></h5> 
        <h5>Questions <?php echo $totalq?></h5> 
        <h5> Hint: <kbd> polish through questions and answers. try solving a question then select your option , then click toggle answer  to reveal the correct answer. please note test cannot be submitted you can only study them . After studying, you can test yourself by engaging  in a real practice at <mark>custom practice </mark> </kbd></h5>




        <div class="col-md-12">

</div>
<form action="../submit/proccess.php?questions=<?php echo $totalq?>" method="post">
           <?php 
/*

the loop to display all question text and options from the data array

*/
            foreach($data as $index => $question){
            ?>
    <div class="questions  mySlides  conatiner  pt-5 bg-dark l ">
      <h5 class="text-light  float-left "> <?php echo $index+1 . ')  '. $question['question_text']?></h5>
             <?php  for($i = 1; $i <= 4; $i++)
                       {
                         

              ?>

               <div class="cover column bg-dark text-light">

        <h5>       <input onclick="handlestate('<?php echo $index +1?>')" type="radio" class="bg-dark text-white" name=" <?php echo $question['question_id']?>" id="<?php echo  $index+1?>" value="<?php echo $i?>">
                <label  for="<?php echo $optionid?>"> <?php
                 switch($i){
                     case 1 :
                         echo "[A] "." " ;
                         break;
                     case 2:
                         echo "[B] "." ";
                         break;
                     case 3:
                         echo "[C] "." ";
                         break;
                    case 4:
                         echo "[D] "." ";
                         break;
                     default: echo "";
                 }
                
                
                
                echo $question["option_$i"]?> </label>
        </h5>
               </div>

<?php
}?>
<button id="banswer<?php echo $index+1?>" type="button" onclick="showans('answer<?php echo $index+1?>')" class="btn btn-primary mt-5 content"> Toggle answer <i class="fa fa-eye" aria-hidden="true"></i></button>
<div id="answer<?php echo $index+1?>" name="eplanation" class="explantion bg-dark text-light pt-5 none  ">
    <h3>Answer</h3>
    <h5>correct answer  is  option<?php 
     switch($question['correct_option']){
                     case 1 :
                         echo "[A] "." ," ;
                         break;
                     case 2:
                         echo "[B] "." ,";
                         break;
                     case 3:
                         echo "[C] "." ,";
                         break;
                    case 4:
                         echo "[D] "." ,";
                         break;
                     default: echo "";
                 }
               echo $question['explanation']
    
    
    ?></h5>
  
</div>

</div>

<?php

}


?>
<button disabled id="form" name="submit" class=" btn sub btn-lg btn-danger"type="submit">Submit</button>

</form>
</div>

<script>
 var x = 0;
function handlestate(q){
  
    let btn = document.getElementsByClassName("dot");
    //alert(btn[q])
    
    btn[q-1].style.background = "green";
  
 
    btn[q-1].style.color = "";
    for(i=0;i<btn.length;i++){
      let checked = btn[i].style.background;
      switch (checked){
        case "green": x++
        break;
        default:return ;
      }
    }
  
    document.getElementById('ans').innerHTML = x ;
}

function showans(questionId){

document.getElementById(questionId).classList.toggle("none");

}









</script>


</body>





    
</html>
<?php }
?>