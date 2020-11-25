<?php
include_once("dbconnect.php");
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$calories = $_POST['calories'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO info(name, price, quantity, calories)
    VALUES ('$name', '$price', '$quantity', '$calories')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script>alert('Update Success')</script>";

  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    echo "<script>alert('Update Error')</script>";
    echo "<script> window.location.replace('food.html')</script>;";
  }

  $conn = null;
?>
