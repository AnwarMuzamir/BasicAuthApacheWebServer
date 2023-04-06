<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Details</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #F5F5DC;
      }
      h1 {
        color: #444;
        font-size: 36px;
        text-align: center;
        margin-top: 50px;
      }
      form {
      margin: 50px auto;
      max-width: 600px;
      }
      input[type="text"],
      input[type="email"],
      input[type="tel"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 2px solid #ccc;
      box-sizing: border-box;
      margin-bottom: 20px;
      }
      input[type="submit"] {
        background-color: #0077cc;
        color: #fff;
        border: none;
        margin: 0 auto;
        display: block;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
      }
      input[type="submit"]:hover {
        background-color: #005daa;
      }
      a {
        color: #0077cc;
        text-decoration: none;
        font-size: 18px;
        display: block;
        margin: 20px auto;
        max-width: 200px;
        text-align: center;
        border: 2px solid #0077cc;
        padding: 10px;
        border-radius: 5px;
      }
      a:hover {
        background-color: #0077cc;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <h1>Welcome to Student Details Form</h1>
    <h2>Enter your details below.</h2>
    <form method=post action= "submit.php" autocomplete=off>

		<label for="name">Name:</label>
		<input type="text" id="name" pattern="^(?=.*[a-z])(?=.*[A-Z]).{3,}" title="Please enter at least 3 characters. 1 uppercase and 1 lowercase." name="name" required>

		<label for="name">Matric Number:</label>
		<input type="text" id="matricNo" pattern="[0-9]{7}" title="Please enter 7 digits." name="matricNo" required>

		<label for="currAdd">Current Address:</label>
		<textarea cols="30" rows="5" id="currAdd" name="currAdd" required></textarea>

		<label for="homeAdd">Home Address:</label>
		<textarea cols="30" rows="5" id="homeAdd" name="homeAdd" required></textarea>

		<label for="email">Email:</label>
		<input type="email"  id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" required>

		<label for="mobilePhone">Mobile Phone:</label>
		<input type="tel" id="mobilePhone" name="mobilePhone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" title="Please include hyphen(-) in between." required>

		<label for="homePhone">Home Phone:</label>
		<input type="tel" id="homePhone" name="homePhone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" title="Please include hyphen(-) in between." required>

		<button type="submit">Submit</button>
	</form>
    <a href="logout.php">Logout</a>
  </body>
</html>