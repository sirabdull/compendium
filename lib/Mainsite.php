<?php

namespace Lib;

require_once 'candclass.php';
require_once 'View.php';
use Candidates\Candidate;
use Pages\View;
class Mainsite
{

  public $token;


  public $candidateInstance;

  public View $view;


  public function __construct($var = null)
  {
    $this->var = $var;

    $this->candidateInstance = new Candidate();

    $this->view = new View();
  }




  public function handle($token)
  {
    $ch = curl_init("https://nms1954.sch.ng/verify/compendium?token=$token");
    $options = [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_MAXREDIRS => 5
    ];
    curl_setopt_array($ch, $options);
    $response = curl_exec($ch);
    curl_close($ch);
    $decodedResponse = json_decode($response);
    return match ($decodedResponse->Response) {
      "Found" => $this->proceed($decodedResponse->Details),
      default => $this->view->render('record-notfound.php'),
    };
  }


  public function proceed($details)
  {
    $email = $details->Email;
    $record = mysqli_fetch_assoc($this->candidateInstance->getsub('registerd_candidates', $email));
    if (empty($record)) {
      $this->storeDetails($details);
    }
    switch ($record['subscribed']) {
      case 0:
        header("location:/subscription/sub.php?email=$email");
        break;
      default:
        header("location:/auth/authenticate.php?email=$email");
        break;
    }
  }


  public function storeDetails($details)
  {

    $store = mysqli_query($this->candidateInstance->getDb(), "INSERT INTO registerd_candidates (fullname, appnumber, email, mobile, subscribed, verification, password,verification_code) VALUES ('$details->Name', '$details->AppNumber', '$details->Email', '$details->Phone', 0, 1, '$details->AppNumber', '$details->AppNumber' )");

  }

}