<?php
include '../../lib/candclass.PHP';
require_once "../../config/config.php";
$exam = new candidates\candidate;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $subject = $_POST['subject'];
  ##echo $subject;
  $year = $_POST['year'];

  $result = mysqli_query($exam->getDB(), " SELECT * FROM questions WHERE  `subject` = '{$subject}' AND `year` = '{$year}'");
  if (mysqli_num_rows($result) <= 0) {

    die('could not fetch questions now try agian later!');
  }
  $data = array();
  ?>
  <!DOCTYPE html>

  <html lang="en">

  <head>
    <link rel="icon" href="/nms-logo.webp" type="image/webp">
    <title>practice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/nms-logo.webp" type="image/webp">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"
      type="text/javascript"></script>
    <style>
      .cover {
        margin-top: 20px;
        max-width: 1000px;

        max-height: 100000px;
        border: 2px ridge white;
        border-radius: 10px;
        text-align: left;
        font-family: sans-serif lucida;
        cursor: pointer;
        position: relative;
      }

      .cover:hover {
        background: white;
        color: black;

      }

      input {
        color: red;
        font-size: 40px;
        padding: 5px;
        margin-left: 10px;
        margin-right: 10px;
        border: 1px ridge black;
        margin-top: 5px;
        width: 20px;
        height: 20px;

        cursor: pointer;
      }

      label {
        margin-left: 40px;
      }


      body {
        font-family: Verdana, sans-serif;
        margin: 0
      }

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
      .bt {
        width: 20px;
        height: 20;


        margin-left: 20px
      }

      .dot {
        margin-left: 10px;
        margin-top: 10px;

      }

      .active,
      .dot:hover {
        color: green;
      }

      /* Fading animation */
      .fade {
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @keyframes fade {
        from {
          opacity: .4
        }

        to {
          opacity: 1
        }
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 500px) {
        * {
          font-size: 15px
        }

      }

      .questions {
        padding-left: 20px;
        position: relative;
        margin-bottom: 100px;
      }

      .questions {}

      .container-fluid {
        height: 100vh;
      }

      .column:hover {
        background-color: white;
        color: black;
      }

      .sub {
        position: relative;
        bottom: 55px;
        float: left;
      }

      .menu {
        position: relative;
        top: 5vh;
        right: 20px;
        float: end;
      }

      .answerd {
        background-color: yellow;
      }

      img {
        padding: 20px;
      }

      * {
        font-family: sans sans-serif;
      }

      .slides {
        display: inline-block;
      }
    </style>
  </head>

  <body class="bg-dark">

    <?php

    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;

    }
    $totalq = count($data);
    //shuffle($data);
    shuffle($data);
    ?>


    <div class="container-fluid pt-5 bg-dark">
      <div class=" p-3">
        <?php
        /*
        loop to display all quiuestion nav buttons
        */
        for ($i = 1; $i <= count($data); $i++) {
          echo "
    <div class='slides'>
   <button class='btn btn-danger dot ' onclick='currentSlide({$i})' >
  $i
 </button> 
</div> 
    
    
    ";
        }
        ?>
      </div>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <div class="row">
        <div class="info text-light">
          <h5>Subject: <i class="fa fa-book" aria-hidden="true"></i> <kbd><?php echo $subject ?></kbd><br>
            Year: <i class="fa fa-calendar" aria-hidden="true"></i> <kbd><?php echo $year ?></kbd><br>
            Questions : <i class="fa fa-question-circle" aria-hidden="true"></i><kbd><?php echo count($data) ?></kbd><br>
            Time : <i class="fa fa-clock-o" aria-hidden="true"></i> <span id="timer"></span>

            <div class="timer float-end"></div>
          </h5>
        </div>

      </div>
      <form onsubmit="return sub()" action="../submit/proccess.php?questions=<?php echo $totalq ?>" method="post">


        <?php
        /*
        the loop to display all question text and options from the data array
        */
        foreach ($data as $index => $question) {
          ?>
          <div class="questions  mySlides  text-light conatiner  pt-5 bg-dark l ">
            <?php $image = $question['question_image'];
            if (strlen($image) > 1) {
              echo "<img src='$image' width='200px'>";
            } ?>
            <h5 class="text-light  float-left "> <?php echo $index + 1 . ') ' . $question['question_text'] ?></h5>
            <?php for ($i = 1; $i <= 4; $i++) {
              $optionid = $question['question_id'] . '_' . $question["option_$i"];
              ?>
              <div class="cover column bg-dark text-light">

                <h5> <input onclick="handlestate('<?php echo $index + 1 ?>')" type="radio" class="bg-dark text-white"
                    name=" <?php echo $question['question_id'] ?>" id="<?php echo $optionid ?>" value="<?php echo $i ?>">
                  <label for="<?php echo $optionid ?>"> <?php
                     switch ($i) {
                       case 1:
                         echo "[A] " . " ";
                         break;
                       case 2:
                         echo "[B] " . " ";
                         break;
                       case 3:
                         echo "[C] " . " ";
                         break;
                       case 4:
                         echo "[D] " . " ";
                         break;
                       default:
                         echo "";
                     }

                     echo $question["option_$i"] ?> </label>
                </h5>
              </div>
              <?php
            } ?>
          </div>
          <?php
        }
        ?>
        <h2>
          <!--  Next and previous and submit button -->
          <a class="btn col-2 mt-2   btn-lg float-start btn-warning" onclick="plusSlides(-1)">Prev</a>
          <button id="form" name="submit" class=" btn  col-2 mt-2 m-5    btn-lg btn-danger" type="submit">Submit</button>
          <a class="btn col-2 mt-2  m-5 btn-lg  btn-success" onclick="plusSlides(1)">Next</a>
      </form>
    </div>

    </h2>



    <script>
      var x = 0;
      function handlestate(q) {
        let btn = document.getElementsByClassName("dot");
        btn[q - 1].style.background = "green";
        btn[q - 1].style.color = "";
        for (i = 0; i < btn.length; i++) {
          let checked = btn[i].style.background;
          switch (checked) {
            case "green": x++
              break;
            default: return;
          }
        }
        document.getElementById('ans').innerHTML = x;
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
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
      }

      class Timer {
        constructor(form) {
          this.timeLeft = 3600; // seconds
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
          const minutes = Math.floor(this.timeLeft / 60);
          const seconds = this.timeLeft % 60;

          const display = `${minutes}:${seconds}`;
          document.getElementById('timer').textContent = display;
        }
      }

      const timer = new Timer(form);
      timer.start();
      function sub() {
        const ask = window.confirm('You are about to submit this test, please note that you cannot go back to make any changes. DO YOU WANT TO PROCEED?')
        if (!ask && timer.timeLeft !== 0) {
          return false;
        }
      }
    </script>


  </body>

  </html>
<?php
 }
?>