<?php
require 'config.php';
if(isset($_POST["name"]) && isset($_POST["matricNo"]) && isset($_POST["currAdd"]) && isset($_POST["homeAdd"]) && isset($_POST["email"]) && isset($_POST["mobilePhone"]) && isset($_POST["homePhone"])){
    $name = $_POST["name"];
    $matricNo = $_POST["matricNo"];
    $currentAddress = $_POST["currAdd"];
    $homeAddress = $_POST["homeAdd"];
    $email = $_POST["email"];
    $mobilePhone = $_POST["mobilePhone"];
    $homePhone = $_POST["homePhone"];

  $result = mysqli_query($conn, "INSERT INTO studentdetails (STUDNAME, MATRIC_NO, CURRENT_ADDRESS, HOME_ADDRESS, EMAIL, MOBILE_PHONE, HOME_PHONE)");

  // Sanitize user input
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $matricNo = filter_var($_POST['matricNo'], FILTER_SANITIZE_NUMBER_INT);
  $currentAddress = filter_var($_POST['currAdd'], FILTER_SANITIZE_STRING);
  $homeAddress = filter_var($_POST['homeAdd'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $mobilePhone = filter_var($_POST['mobilePhone'], FILTER_SANITIZE_NUMBER_INT);
  $homePhone = filter_var($_POST['homePhone'], FILTER_SANITIZE_NUMBER_INT);

  // Validate the user's input (Late validation)
  if (!preg_match('/^[A-Za-z ]+$/', $name)) {
    die("Invalid name");
  }
  
  if (!preg_match('/^[0-9]+$/',  $matricNo)) {
    die("Invalid matric number");
  }
  
  if (!preg_match('/^[a-zA-Z0-9\s,\'-]*$/', $currentAddress)) {
    die("Invalid current address");
  }
  
  if (!preg_match('/^[a-zA-Z0-9\s,\'-]*$/', $homeAddress)) {
    die("Invalid home address");
  }
  
  if (!preg_match('/^[a-z0-9._%+-]+@gmail\.com$/', $email)) {
    die("Invalid email address");
  }
  
  if (!preg_match('/^[0-9]+$/', $mobilePhone)) {
    die("Invalid mobile phone number");
  }
  
  if (!preg_match('/^[0-9]+$/', $homePhone)) {
    die("Invalid home phone number");
  }

  if($result){
    header("Location: studentdetails.php");
  }
  else{
    echo "Invalid" . mysqli_error($conn);
  }
}
else{
  header("Location: studentdetails.php");
}
?>
