<?php
/*
THIS PAGE HANDLE SCORING EXAMINATION AND UPDATING OF USER STATISTICS.
author @sirabdull
last modified: 24th  feb, 2024.
modification reason "A user reported a bug saying 'i got all my answers right but u still faailed me '  so i had to check what was going on and after testing myself,
i discorverd that the previous scoring ALGO used wasn't really working and was giving wrong scores to users .after  1hour of debbuging i was able to come up with a new one ..😁"
 i'm saying sorry to all users who got wrong scores 😭
*/


namespace candidates;
session_start();
include '../../lib/candclass.PHP';

$user = new candidate;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
//we need to unset POST['submit'] which was used to submit the test. leaving only the selected options.
 unset($_POST['submit']);
    
$db =$user->getDb();
$email = $user->getEmail(); 
$score = 0;
 
 /*
 
 Scoring Algorithm 👌.
 
 */
 
 foreach($_POST as $quest => $ans){
     $ans = (int)$ans;
   $result = mysqli_query( $db, "SELECT correct_option FROM questions WHERE question_id = $ans ");
   
    $row = mysqli_fetch_assoc($result);
    
    if($row['correct_option'] == $ans ){
    $score++;

}

 }




/*
update naccessary user Stats in the DB

*/
$user->setstat('xp',$score);
$user->setstat('higest_score',$score);
$user->setstat('last_score',$score);
$user->setstat('rating',$score);
$user->setstat('progress',$score);
$user->setstat('overall_score',$score);
$user->displaystat('xp');

/*
now counting neccessary examination data

*/

  $questions = $_GET['questions'];
  $wrong = $questions - $score;
  $answerd = count($_POST);
 
  
  // redirect to submition page 
  
 header("location:submit.php?questions=$questions&wrong=$wrong&correct=$score&answerd=$answerd");


}
else{
    echo 'this page is taking a rest try study mode';
}

?> 