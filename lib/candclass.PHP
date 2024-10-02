<?php
namespace Candidates;


class Candidate
{

    public $query;
    public $progress;
    public $xp;
    public $last_score;
    public $higest_score;
    public $overall_score;
    public $rating;


    public function getDb()
    {

        /**
         * 
         * you can also include your configuration file here
         */

        $server = "localhost";
        $user = "root";
        $password = "dashnov4";
        $database = "nmscompe_candidates";
        $suscess = '<h1>' . 'connection sucessfull' . '<h1>';
        $notestablished = '<h1>' . 'connection UNsucessfull' . '<h1>';
        ##establishing connection

        $conn = mysqli_connect(hostname: $server, username: $user, password: $password, database: $database);
        if (!$conn) {
            echo $notestablished;
            die();
        } else {
            return $conn;
        }

    }

    /*

    GET THE SEESSIONUSER'S EMAIL ADDRESSS 
    CALL usuing $this->getEmail()
    */
    public function getEmail()
    {
        //session_start(); // Start the session if not already started
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            return $email;
        } else {
            return null; // Return null or 
            //handle the absence of email in the session as needed
        }
    }



    public function create($data)
    {
        //check and ensure candidate dosent already exist
        $email = $data['email'];
        $candidate =  $this->getsub('registered_candidates', $email);
    
        $fullname = $data['fullname'];
        $password = $data['password'];
        $mobile = $data['mobile'];
        $query = "INSERT INTO `registerd_candidates`(`email`, `fullname`, `password`, `mobile`) VALUES ('$email','$fullname','$password','$mobile')";
        $result = mysqli_query($this->getDb(), $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    

    /**
     * -----------------------
     *  Updating users personal information only
     * fields and values to update them with must be of type array
     * email
     * fullname
     * password
     * mobile number
     * etc......
     *  -------use this method in editing profile----------
     */

    public function update(array $fields, array $values)
    {
        $i = 0;
        while ($i < count($fields)) {
            mysqli_query($this->getDb(), "UPDATE `registerd_candidates` SET `$fields[$i]` = '{$values[$i]}'  WHERE `email` = '{$this->getEmail()}'");
            $i++;
        }

    }










    /*

    *********GETTING info**************

    THE METHOD BELLOW 👇👇👇👇 HANDLES THE FETCHING OF USER INFO FROM DB.

    CALL::::: PASS THE USER EMAIL AS AN ARGUMENT WHEN CALLING.

    *********eg $this->getsub('$email')********
    First getting all candi

    */

    public function getall($table)
    {
        $query = "SELECT * FROM  `$table`";
        $result = mysqli_query($this->getDb(), $query);

        return mysqli_num_rows($result);
    }



    public function getsub($table, $email)
    {
        #$table = str_replace("'", "", $table);
        $query = "SELECT * FROM  `$table` WHERE  `email` = '$email' LIMIT 1";
        return mysqli_query($this->getDb(), $query);

    }


    /*

    *********DISPLAY INFO**************

    THE METHOD BELLOW 👇👇👇👇 HANDLES THE DISPLAYING OF USER INFORMATION.

    CALL::::: PASS THE COLUMN NAME AS AN ARGUMENT WHEN CALLING.

    COLUMN NAME REPRESNT'S SPECIFIC RECORDS.

    *********eg $this->dispaly('table_name','fullname')********displays user's fullname
    */




    function display($table, $column)
    {

        $row = mysqli_fetch_assoc($this->getsub($table, $this->getEmail()));

        return $row[$column];


    }


    /*

    *********GETTING STATS**************

    THE METHOD BELLOW 👇👇👇👇 HANDLES THE FETCHING OF A SPECIFIC USER STATS FROM DB.

    CALL::::: PASS THE USER EMAIL AS AN ARGUMENT WHEN CALLING.

    *********eg $this->getstat('$email')********
    */



    public function getstat($email)
    {


        $query = "SELECT * FROM  `stats`  WHERE `email` = '$email' ";
        $result = mysqli_query($this->getDb(), $query);
        return $result;

    }

    /*

    *********DISPLAY STATS**************
    THE METHOD BELLOW 👇👇👇👇 HANDLES THE DISPLAYING OF STATS
    STATS ARE UNIQUE TO EACH USER
    */

    function displaystat($column)
    {
        $row = mysqli_fetch_assoc($this->getstat($this->getEmail()));

        $output = $row[$column];
        return $output;

    }
    /*
    *********************HEADING*********************
                {HANDLING NEW USERS}
   THE BELLOW METHOD 👇👇👇 WILL HANDLE USERS WHO ARE JUST ACCESSING 
   THE DAHSBOARD FOR THE FIRST TIME ⌚
    ALGORITHM :: -> first we try to get the user's data for stats table
                 ->if such data dosen't exist we create initial values for the user;
                 ->if it does, we take no Action ( as we are handling new users)


    */
    public function ini_entry($email)
    {
        $check = $this->getstat($email);
        if (mysqli_num_rows($check) <= 0) {

            $fullname = $this->display('registerd_candidates', 'fullname');
            $query = " INSERT INTO `stats` (`email`,`user`,`xp`,`rating`,`progress`,`last_score`,`higest_score`,`overall_score`) VALUES ('$email','$fullname',0,0,0,0,0,0)";
            mysqli_query($this->getDb(), $query);
            ?>

            <script>

                alert('WELCOME First time Login. This compendium will help you in gaining more insights  on NMS examination  system .PLEASE NOTE: SOME QUESTIONS YEAR MIGHT  NOT BE AVAILABLE WE ARE CURRENTLY UPDATING THEM  AND THEY WILL BE AVAILABLE AS SOON AS POSSIBLE.  feel free to click and send feedbacks if you have any enquiry or issues. GOODLUCK!! ')

            </script>
            <?php
        } else {

        ?>
        <?php
        }
    }







    public function sort()
    {
        $query = " SELECT * FROM `stats` ORDER BY `xp` DESC  ";
        $result = mysqli_query($this->getDb(), $query);
        return $result;
    }

    /*
     *********************HEADING*********************
                 {RANKING USERS}
    THE BELLOW METHOD 👇👇👇 WILL HANDLE RANKING OF THE users USERS
    ⌚
     ALGORITHM :: -> first we try to get all; users data for stats table SORTING IN ASCSENDING ORDER
                  -> THEN WE CREATE AN EMPTY data ARRAY and store ALL the data we fecthed one by one
                  ->THEN WE LOOP THROGH OUR ARRAY SEARCHING FOR THE THE DATA THAT MATCHES WHO WE ARE LOOKING FOR;
                  ->IF WE FIND A MATCH THEN WE ADD ONE TO THE INDEX OF THAT MATCH 
                  -> FINALLY WE RETURN THE INDEX WICH IS THE USER'S POSITION SORTED BY XP


     */
    public function ranking($who_to_rank)
    {
        $result = $this->sort();
        if ($result->num_rows > 0) {
            $data = array();
            $ranking = -1;

            while ($row = mysqli_fetch_assoc($result)) {

                $data[] = $row;

            }
            foreach ($data as $index => $user) {
                if ($user['email'] == $who_to_rank) {

                    $ranking = $index + 1;
                }
            }
            return $ranking;
        }

    }



    /*
     *********************HEADING*********************
                 {RATING USERS}
    THE BELLOW METHOD 👇👇👇 WILL HANDLE RATING  OF THE  USERS

     ALGORITHM :: -> first we try to get the user's RATING FIELD from the  stats table
                  ->THEN WE MINUS 1 FROM THE USER'S RATING TO ENSURE RATING IS NOT MORE
                   THAN FIVE AS WE CAN ONLY DISPLAY MAX OF STARS;
                  ->THEN we loop through the amount of rating the person has 
                  ->FINALY WE CREATE A STAR FOR EACH LOOP

     */




    public function rating($who_to_rate)
    {
        $query = " SELECT `rating` FROM `stats` WHERE `email` = '{$who_to_rate}'  ";
        $result = mysqli_query($this->getDb(), $query);
        $row = mysqli_fetch_assoc($result);
        $rate = (int) $row['rating'] - 1;

        if ($rate <= 5) {
            $star = 0;
            while ($star <= $rate) {
                echo " <i class='fa text-success fa-star' aria-hidden='true'></i> ";
                ?>


                <?php

                $star++;
            }

        } else {
            echo "<i class='fa text-success fa-star' aria-hidden='true'></i>  <i class='fa text-success  fa-star' aria-hidden='true'></i> <i class='fa text-danger fa-graduation-cap' aria-hidden='true'></i>  <i class='fa text-success fa-star' aria-hidden='true'></i>  <i class='fa text-success fa-star' aria-hidden='true'></i> ";
        }

    }






    public function setstat($stat, $value)
    {

        if ($stat == 'xp') {
            $former = $this->displaystat('xp');

            $newxp = $value * 1.5;
            $update = $former + $newxp;
            mysqli_query($this->getDb(), "UPDATE `stats` SET `xp` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
        }




        if ($stat == 'progress') {
            (int) $value;
            $div = $this->displaystat('xp');
            $int = (int) $div / 100;
            $update = $int + $value;
            mysqli_query($this->getDb(), "UPDATE `stats` SET `progress` = '{$update}'  WHERE `email` = '{$this->getEmail()}'");
        }

        if ($stat == 'rating') {
            $update = $this->displaystat('xp') / 1000;
            mysqli_query($this->getDb(), "UPDATE `stats` SET `{$stat}` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
        }
        if ($stat == 'last_score') {
            $update = $value;
            mysqli_query($this->getDb(), "UPDATE `stats` SET `{$stat}` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
        }


        if ($stat == 'higest_score') {
            $former = (int) $this->displaystat('higest_score');
            if ($value > $former) {
                $update = $value;
                mysqli_query($this->getDb(), "UPDATE `stats` SET `higest_score` = '{$update}' WHERE `email` = '{$this->getEmail()}'");
            } else {

                return;
            }

        }
        if ($stat == 'overall_score') {
            $former = $this->displaystat('overall_score');
            $int = (int) $former;
            $update = $int + (int) $value;
            $update = $former += $value;
            mysqli_query($this->getDb(), "UPDATE `stats` SET `overall_score` = '{$update}' WHERE `email` = '{$this->getEmail()}'");

        }

    }

    /*

    ------------------GETTING USER'S POSITION WITH A PARTICULAR STATS FIELD-------------

    this method will display the users position on a ranked table which is ranked by the specified field you've provided

    */



    public function position($pos, $field)
    {
        $result = $this->sort();
        if ($result->num_rows > 0) {
            $data = array();
            $pos = $pos - 1;

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;

            }
            foreach ($data as $index => $user) {
                if ($index == $pos) {

                    return $user[$field];
                }
            }


        }




    }

}


/*





*/

