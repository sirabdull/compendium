
<?php
//require '../../config/config.php';

$currentpage =basename($_SERVER['PHP_SELF']);
function isActive($pagename){
  global $currentpage;
  if($currentpage === $pagename){
    echo 'active';
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="/nms-logo.webp" type="image/x-icon">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4964099203895467"
     crossorigin="anonymous"></script>
</head>
<body>
    
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title> Dashboard NMS compendium nmscompendium.com.ng</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/dashboard/">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    body {
      font-size: .875rem;
    }

    .feather {
      width: 16px;
      height: 16px;
      vertical-align: text-bottom;
    }

    /* Sidebar*/

    .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      /* Behind the navbar */
      padding: 48px 0 0;
      /* Height of navbar */
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
      .sidebar {
        top: 5rem;
      }
    }

    .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: .5rem;
      overflow-x: hidden;
      overflow-y: auto;
      /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
      font-weight: 500;
      color: #333;
    }

    .sidebar .nav-link .feather {
      margin-right: 4px;
      color: #727272;
    }

    .sidebar .nav-link.active {
      color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
      color: inherit;
    }

    .sidebar-heading {
      font-size: .75rem;
      text-transform: uppercase;
    }

    /*Navbar*/
    .navbar-brand {
      padding-top: .75rem;
      padding-bottom: .75rem;
      font-size: 1rem;
      background-color: rgba(0, 0, 0, .25);
      box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
      top: .25rem;
      right: 1rem;
    }

    .navbar .form-control {
      padding: .75rem 1rem;
      border-width: 0;
      border-radius: 0;
    }

    .form-control-dark {
      color: #fff;
      background-color: rgba(255, 255, 255, .1);
      border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
      border-color: transparent;
      box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }
  </style>
</head>
<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/"><i class="fa pr-2 text-success fa-dot-circle-o" aria-hidden="true"></i>NMS</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
        data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" type="submit" name="signout" href="includes/signout.php">Sign out</a>
        </li>
      </ul>
    </nav>
  
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark text-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php isActive('index.php')?>"   aria-current="page" href="../dashboard/">
                  <span data-feather="home "></span>
                   <h6 class="ml-2">Dashboard <i class="fa fa-dashboard ml-2" aria-hidden="true"></i></h6>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php isActive('profile.php')?>" href="./profile.php">
                  <span data-feather="file"></span>
                  <h6 class="ml-2">profile  <i class="fa fa-user ml-2" aria-hidden="true"></i></h6>
                </a>
              </li>
              <li class="nav-item">
               
                <a class="nav-link <?php isActive('exams.php')?> " href="../dashboard/exams.php">
                  <span data-feather="shopping-cart"></span>
               <h6 class="ml-2"> Practice exams <i class="fa fa-pencil-square ml-2" aria-hidden="true"></i></h6>  
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="leaderboards.php">
                  <span data-feather="users"></span>
                 <h6 class="ml-2"> leaderboards <i class="fa ml-2 fa-trophy" aria-hidden="true"></i></h6>
                </a>
              </li>
              <li class="nav-item">
                <a  onclick="alert(' sorry reports are currently unavailable') " class="nav-link <?php isActive('reports.php')?>" href="#">
                  <span data-feather="bar-chart-2"></span>
               <h6 class="ml-2"> Reports  <i class="fa fa-bar-chart ml-2" aria-hidden="true"></i></h6>  
                </a>
              </li>
            
            </ul>
  
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-secondary">
              <span>Admission Guide</span>
              <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="/guide">
                  <span data-feather="file-text"></span>
                  Admission Guides and Tips
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link <?php isActive('feedback.php')?> " name="last" href="/feedback">
                  
                  <span data-feather="file-text"></span>
                  FeedBack
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php isActive('faqs.php')?>" name="last"  target="_blank"href="https://nms1954.sch.ng/faqs">
                  
                  <span data-feather="file-text"></span>
              FaQs
                </a>
              </li>
  
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-secondary">
              <span>compediumn Guide</span>
              <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link <?php isActive('/feedback')?>" href="howto.php">
                  <span data-feather="file-text"></span>
                  How to use online compedium
                </a>
              </li>
             
             
          </div>
        </nav>
  
        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2" id="a">Dashboard <i class="fa fa-dashboard" aria-hidden="true"></i>  <img src="/nms-logo.webp" width='50px'alt="logo"></h1><h3 class="text-secondary">nms online compedium</h3>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
              
            </div>
          </di
 
         
        </main>
      </div>
    </div>
    <script>
  // Get all the navigation links
  const navLinks = document.querySelectorAll('.nav-link');
  
  
  // Loop through each link and add a click event listener
  navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      // Prevent the default behavior of the link
      event.preventDefault();
  
      // Remove the 'active' class from all links
      navLinks.forEach(link => {
        link.classList.remove('active');
      });
  
      // Add the 'active' class to the clicked link
      this.classList.add('active');
  
      window.location.href= this.getAttribute('href');
  
    });
   
  });
  
  
  
    </script>
  
    
  
</body>

</html>





