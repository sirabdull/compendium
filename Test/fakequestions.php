<?php

// Include Faker
require '../config/config.php';
require_once '../vendor/autoload.php';  
use Faker\Factory as Faker;

// Create Faker instance
$faker = Faker::create('en_us');

// Set number of rows to insert
$numRows = 300;

// Generate dummy data
for($i = 0; $i < $numRows; $i++) {

  // Generate data
  $text = $faker->sentence; 
  $subject = $faker->randomElement(['english','calculation','general']);
  $year = $faker->numberBetween(2015, 2022);
  $option1 = $faker->sentence; 
  $option2 = $faker->sentence;
  $option3 = $faker->sentence;
  $option4 = $faker->sentence;
  $explanation = $faker->sentence;
  $correctOption = $faker->numberBetween(1,4);

  // Insert statement
  $sql = "INSERT INTO questions 
          (question_text, subject, year, 
           option_1, option_2, option_3, option_4,
           correct_option, explanation)  
          VALUES 
          ('$text', '$subject', $year,
           '$option1', '$option2', '$option3', '$option4',
           '$correctOption', '$explanation')";
  
  // Execute query
  $result = mysqli_query($conn, $sql);

}

// Check for errors
if(!$result) {
  echo mysqli_error($conn);
} else {
  echo "$numRows rows inserted";
}


// ?>