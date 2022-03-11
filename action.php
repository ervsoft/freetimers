<?php


$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "test_app";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_POST) {
    $length = $_POST['length'];
    $width = $_POST['width'];
    $depth = $_POST['depth'];
    $quantity = $_POST['quantity'];
    $priceTotal = $_POST['priceTotal'];


    $sql = "INSERT INTO Orders (length, width, depth, quantity, priceTotal) 
VALUES ($length , $width ,$depth ,$quantity , $priceTotal)";

    if (mysqli_query($conn, $sql)) {
        echo "Your Order Has Been Created";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);


}


?>
