<?php

session_start();
require '../auth/auth.php';
include '../lib/candclass.PHP';
$leader = new Candidates\candidate();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/nms-logo.webp" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leaderboards</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="favicon" src="/nms-logo.webp" type="image/webp">
</head>
<body>
    
<div class="container  pt-5 bg-dark">
    <div class="row  pt-5 {1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
        
<div class="table-responsive">

<div class="container-fluid text-white"><h1 class="display-4">leaderboards <i class="fa fa-trophy" aria-hidden="true"></i></h1>
<a href="../dashboard" class="btn btn-success btn-lg rounded mr-5 mb-5float-end">Dashboard</a>
<p class='pt-5 pb-5'>
Candidates who appear on the table bellow are the Top <kbd>100</kbd> practicing candidates who are ranked based on the experience (XP) they have gained as they practice .
</p>
<p>

</p>
</div>
    <table class="table table-striped
    table-hover	
    table-borderless
    table-dark
    align-middle
    table-rounded 
    rounded">
        <thead class="table-light">
            <caption>leaderboards <i class="fa fa-trophy" aria-hidden="true"></i></caption>
            <tr>
                <th>ranking</th>
                <th>fullname <i class="fa fa-user" aria-hidden="true"></i></th>
                <th>email  <i class="fa fa-envelope" aria-hidden="true"></th>
                <th>XP  <i class="fa fa-trophy" aria-hidden="true"></i></th>
                <th>rating</th>
            </tr>
            </thead>
<?php
/*
for instance fetching the top 100 candidates
*/
$y = 1 ;
while($y <= 100)  {

?>
                 <tbody class="table-group-divider">
                <tr class= <?php echo ($leader->position($y,'email') == $leader->getEmail())? "table-primary" : " " ?> >
                    <td scope="row"><?php  echo $leader->ranking($leader->position($y,'email'))?> </td>
                    <td> <?php echo $leader->position($y,'user')?></td>
                    <td><?php echo $leader->position($y,'email')?> </td>
                    <td><?php echo $leader->position($y,'xp')?></td>
                    <td><?php echo $leader->rating($leader->position($y,'email'))?> </td>
                </tr>
            
            </tbody>
            <?php 
            if($y == $leader->getall('stats')){
                die();
            }
            $y++;
        
        }

            ?>
            <tfoot>
                
            </tfoot>
    </table>
</div>


    </div>
</div>
</body>
</html>