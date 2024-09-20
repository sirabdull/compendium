

 <?php
session_start();

require '../config/config.php';

#import candidate class
include  '../lib/candclass.PHP';
//namespace Candidate;

// this should be included on all pages which requires AUTH
require '../auth/auth.php';
require_once 'includes/header.php';


$user = new Candidates\Candidate();
#get db connection
$user->getDb();
#user email variable
$userEmail = $user->getEmail();
#fectch candidates indo
$getsubcand = $user->getsub('subscribed_candidates',$userEmail);
#handle new candidates
$user->ini_entry($userEmail);


#fetch candidates stats;
$getstat = $user->getstat($userEmail);
#$getstat = $user->getstat();
 #$email= $_SESSION['email'] ;
?>

     <!-- custom css -->
    <link rel="stylesheet" href="style.css">
    <style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

.dash-content{
    position:absolute;
    top:22vh;
    left:19vw;
}
@media screen and (max-width:766px){
    .dash-content{
    position:absolute;
    top:31vh;
    left:2vw;
}
*{
font-size:15px;
.info{
display:none;
}


.fa-user-circle{
    font-size:80px;
    padding-left:5px;
    margin-left:12px;
}
.stats{
    padding-top:10px;
    padding-left:5px;
    font-family:lucida sans-serif serif;
    font-size:15px;
    
}
.fa-support{
    font-size:60px
}
.fa-user-secret{
    font-size:60px;
}
.up{
    margin-bottom:10px;
}
.halloffame{
    margin-left:50px;
}
.big{font-size:110px;}
a{
text-decoration:none;
color:white;
}
Kbd{

background-color:green;
}
.info{
display:;
}
*{
    font-family :sans serif  sansserif ;
}
    </style>
</div>
 <div class="container dash-content">
    <div class="row ">
        <div class=" bg-light rounded  float-end col-6">
            <h1> Stats<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></h1>
            <div>
                <h6><b> Ranking</b > <i class="fa fa-line-chart " aria-hidden="true"></i>:<kbd>no <?php echo $user->ranking($userEmail);?> </kbd> </h6>
                <h6><b>  Rating </b>    <?php $user->rating($userEmail); ?> </h6>
                <h6>
                   <b> Last Score </b>  <kbd>     <?php echo $user->displaystat('last_score') ;?> </kbd>
                </h6>
                <h6>
                   <b> Highest Score </b>    <kbd>    <?php echo $user->displaystat('higest_score') ;?> </kbd>
                </h6>  
                <h6>
                  <b> Overall Score </b>  <kbd>    <?php echo $user->displaystat('overall_score') ;?> </kbd>
                </h6>
            </div>
            
        </div>
        
        
        <div class="col  bg-light">
            <b> <i class="fa text-success fa-user-circle" aria-hidden="true"></i></b>
           <b> <span class=''> <span><?php echo $user->displaystat('xp')?></span> XP <i class="fa fa-trophy" aria-hidden="true"></i></span></b>
            <br>
          <b>  <?php echo $user->display('registerd_candidates','fullname')?></b>
             <span class='stats' >
            <b>    Badges  <i class="fa fa-bandcamp" aria-hidden="true"></i> </b>:
    </span> <br>
    <span class="stats">
               <b> Ranking <i class="fa fa-bar-chart" aria-hidden="true"></i> : <?php echo $user->ranking($userEmail);?></b>
                
    </span > <br>
    
       <span class="stats">
               <b> Plan <i class="fa fa-bar-chart" aria-hidden="true"></i> : <?php echo $user->display('subscribed_candidates', 'subscription_type');?></b>
                
    </span >
    
        </div>
       
        
    </div>
    <div class="row pt-5 ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <h2 class="display-2"> Hall of Fame <i class="fa fa-trophy" aria-hidden="true"></i></h2>
        <h6>Top learning candidates </h6>
                <div class="col-10  mr-5 bg-warning rounded">
         <div class="content p-2">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <span><?php echo  $user->position(1,'xp');?> XP <i class="fa fa-trophy" aria-hidden="true"></i></span>
            <kbd class="up mb-2">current champion</kbd> <br>
            <div class='halloffame'>
            <h6>
          fullname : <kbd><?php echo  $user->position(1,'user');?></kbd>
            </h6> 
            <h6>
          Ranking : <kbd><?php echo  $user->ranking($user->position(1,'email'));?></kbd>
            </h6> 
          
          
          <h6> Rating : <kbd><?php echo $user->rating($user->position(1,'email'))?></kbd> </h6> 
          </div>
    </div>   
          </div>
        <div class="col-10 mr-5  rounded bg-success ">
       <div class="content p-2">
            <i class="fa fa-user-secret  " aria-hidden="true"></i>
            <span><?php echo  $user->position(2,'xp');?> XP <i class="fa fa-trophy" aria-hidden="true"></i></span>
            <kbd class="up mb-2">second place</kbd></b> 
            <div class='halloffame'>
            <h6>
         fullname : <kbd><?php echo $user->position(2,'user')?> </kbd></b>
            </h6> 
            <h6>
          Ranking : <kbd><?php echo  $user->ranking($user->position(2,'email'));?></kbd></b>
            </h6> 
          
          
          <h6 > Rating : <kbd><?php echo  $user->rating($user->position(2,'email'));?>  </kbd> </h6> 
          
          </div> 
            
    </div>
    
        

    </div>
    <div class="row ${1| pt-5 ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        <div class="col  ">
            <h4 class="display-4 ">Your progress </h4> <hr>
      <div style='height:50px;' class="mr-2 bg-secondary progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo $user->displaystat('progress');?>;"
              aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $user->displaystat('progress');?></div>
      </div>
        </div>
    </div>
 </div>  

<?php

if($userEmail == $user->position(1,'email')){

#$mail= new PHPMailer;
}
?>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65a847e10ff6374032c184c6/1hkclhk3c';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
