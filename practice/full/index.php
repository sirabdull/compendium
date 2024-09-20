
<?php
require_once "../../config/config.php";
include '../../lib/candclass.PHP';

$exam = new candidates\candidate;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$subject = array(
    'english','calculation','general'
);
 $english = array();
 $calculation = array();
 $general = array();
$result = mysqli_query($exam->getDb(), " SELECT * FROM `questions`");
if(mysqli_num_rows($result)<=0){

  die('could not fetch questions now try agian later');
}

while( $row  = mysqli_fetch_assoc($result) ){
if($row['subject']== 'english'){
    $english[] = $row;
}
if($row['subject']== 'calculation'){
    $calculation[] = $row;
}
if($row['subject']== 'general'){
    $general[] = $row;
}

}
#shuffle all questions in each subjects
shuffle($english);
shuffle($calculation);
shuffle($general);

##reduce the number of questions from each subject to 30
 $english = array_slice($english,0,30,true);
 $general = array_slice($general,0,30,true);
 $calculation = array_slice($calculation,0,30,true);
//calculating total amount of questions
$totalq = count($english)+count($general)+count($calculation);
#Now combine all subjects and questions into one single array
$combine_subject =array(
    $english,
    $calculation,
    $general
);

?>

<!DOCTYPE html>

<html lang="en">

<head>
<link rel="icon" href="nms-logo.webp" type="image/webp">
    <title>practice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js" type="text/javascript"></script>
    <!-- custom css -->
   
    <link rel="icon" href="/nms-logo.webp" type="image/webp">
   <style>
       .but{
        margin-bottom:20px;
       }
       @media screen and (max-width:600px){
           .but{
          
       
          
           }
       }
       
       
       
       
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
  margin-left:10px;
  margin-top:10px;
  
}

.active, .dot:hover {
  color: green;
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

img{
    padding:20px;
}
.q-nav{
color:white;
margin-left:20px;
margin-top:10px;
}

.slides{
display:inline-block;
}
.timer{
    font-size:23px;
}
*{
    font-family: sans sans-serif;
}
   </style>
</head>

<body class="bg-dark main-father">
  <div class="q-nav">
    <h6>English</h6>
<?php

for($i=1; $i<=count($english); $i++){
echo  " <div class='slides'>
<button  id='english$i' onclick='currentSlide($i)' class='btn btn-warning dot'>$i</button>
</div>";}?>

</div>
<div class="q-nav">
  <h6>calculation</h6>
<?php

for($i=1; $i<=count($calculation); $i++){
  $y =$i+count($english);
echo  " <div class='slides'>
<button id='calculation$i' onclick='currentSlide($y)'   class='btn btn-warning dot'>$i</button>
</div>";}?>

</div>
<div class="q-nav">
  <h6>general Knowledge</h6>
<?php
  $count = count($calculation)+count($english);
for($i=1; $i<=count($general); $i++){
$y = $i + $count;
echo  " <div class='slides'>

<button id='general$i'onclick='currentSlide($y)' class='btn btn-warning dot'>$i</button>
</div>";}?>

</div>


<div class="container-fluid  bg-dark">
  
    <div class="row">
        <div class="info  text-light">
        
<div class="timer pr-2  pb-5 float-end mb-5"> <i class="fa fa-clock-o" aria-hidden="true"></i>Time left: <span id="timer"> 1:30:00</span> 
  </div>
            
        </div>

 <h2> 
 


<!--

full test form passsing total number of questions as a parameter

-->
<form onsubmit="return sub()" action="../submit/proccess.php?questions=<?php echo $totalq?>"  method="post">
   
    
   
<?php
foreach ($combine_subject as $key => $subjects) {
  # code...

   foreach($subjects as $index => $question){
 
?>



    <div class="questions  mySlides  conatiner  pt-2 bg-dark  ">
           <?php  $image = $question['question_image'];
                if(strlen($image) > 1){
                    echo "<img src='$image' width='200px'>";
                } ?>
   
    <h5 id="" class="text-light  float-left "> <?php echo '['. $index+1 . ']    '. $question['question_text']?></h5>
           <?php 
         $sub = $question['subject'];
           for($i = 1; $i <= 4; $i++)
                     {
                         $optionid = $question['question_id'].'_'.$question["option_$i"];
?>
            

           <div class="cover column bg-dark text-light">

      <h5>       <input onclick= " handlestate('<?php echo $question['subject']?><?php echo $index+1?>')" type="radio" class="bg-dark text-white" name=" <?php echo $question['question_id']?>" id="<?php echo $optionid?>" value="<?php echo $i?>">
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
              
              
             echo  $question["option_$i"]?> </label>
      </h5>
             </div>
          

<?php

}
  ?>
  </div>

<?php

   }

  }

?>

  <!--  Next and previous and submit button -->
     <a  class="btn col-2 mt-2   btn-lg float-start btn-warning" onclick="plusSlides(-1)">Prev</a>
       <button id="form" name="submit" class=" btn  col-2 mt-2 m-5    btn-lg btn-danger" type="submit">Submit</button>
  <a  class="btn col-2 mt-2  m-5 btn-lg  btn-success" onclick="plusSlides(1)">Next</a>

</form>






<!-- javascript for changing slides, colour when questions are answerd -->



<script>
  const form = document.getElementById('form');
 var x = 0;

       
       function handlestate(q){

 //test       

let dos =  q.split(',')
let english = dos;
//test
document.getElementById(english).style.background ='green';

document.getElementById(english).classList.remove("btn-warning");

//function for counting answerd cquestions "btn-success"

}



let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);

}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
 

}










class Timer {
  constructor(form) {
    this.timeLeft = 3600*1.5; // seconds
    this.interval = null; 
    this.form = form;
  }

  start() {
    this.interval = setInterval(() => {
      this.timeLeft--;
      this.updateDOM();

      if (this.timeLeft === 0) {
        this.stop();
      
      }
    }, 1000); 
  }

  stop() {
    clearInterval(this.interval);
    alert("Time's up!");
    form.click();
  }

  updateDOM() {
    const Hour = Math.floor(this.timeLeft / 3600);
const minutes = Math.floor((this.timeLeft % 3600) / 60);
    const seconds = this.timeLeft % 60;

    const display = `${Hour}h:  ${minutes}m: ${seconds}s`;
    document.getElementById('timer').textContent = display;
  }
}

const timer = new Timer(form);
timer.start();


function sub(){
    const ask = window.confirm('You are about to submit this test, please note that you cannot go back to make any changes. DO YOU WANT TO PROCEED?')
    if(!ask){
        return false;
    }
}




</script>
<script type="text/javascript">
    
    Mathjax.typeset([document.getElementById('formulaDisplay')]);
    
</script>

</body>





    
</html>
<?php
}

?>