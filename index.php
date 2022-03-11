<!DOCTYPE html>
<html>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Length: <input type="text" name="length"> Meter <br>
        Width: <input type="text" name="width"> Meter <br>
        Depth: <input type="text" name="depth"> Cm <br>


        <input type="submit">
    </form>

    <?php

    
// Database Connections Started
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

/// Database Connections  & Test Finished

    if ($_POST) {


        $length = $_POST['length'];
        $width = $_POST['width'];
        $depth = $_POST['depth'];

    
/**
        if(array_key_exists('addToCart', $_POST)) {
             $length = $_POST['length'];
            $width = $_POST['width'];
             $depth = $_POST['depth'];
             $priceTotal_c = $_POST['priceTotal'];
             $bagTotal_c = $_POST['quantity'];
            addCart(12,12,12,18,12);
        }


       
         function addCart($a,$b, $c, $d, $e)
        {
            $sql = "INSERT INTO Orders (length, width, depth, quantity, priceTotal) 
            VALUES ($a , $b ,$c ,$d , $e)";

            if (mysqli_query($conn, $sql)) {
                return  $t= "Your Order Has Been Created";
            } else {
                return  $t= "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);
        }


*/
        function multiple(int $a, int $b, $c)
        {
            $t = $a * $b * $c;
            return $t;
        }

        function convert($a)
        {
            $t = $a * 0.01;
            return $t;
        }

        function calculatePrice($a)
        {
            $priceBag = 72;
            $t = $a * $priceBag;
            return $t;
        }

        function bagCalculate($a, $b, $c)
        {
            $coefficientBag = 1.4;
            $c = convert($c);
            $t = multiple($a, $b, $c);
            $final = ceil($t * $coefficientBag);
        //echo "cadaa:".($t * $coefficientBag);
            return $final;
        }

       
    }
    ?>



    <?php echo " Bag Calculate<hr><br>";
    echo $bagTotal = bagCalculate($length, $width, $depth);
    echo " bags needed<hr><br>"; ?>
    <?php echo " Amaount Total £" . $priceTotal = calculatePrice(bagCalculate($length, $width, $depth));
    echo " (VAT inc.)<hr>"; ?>

    <form method='post' action='action.php'>
        <input type='hidden' name='width' value="<?php echo $width; ?>">
        <input type='hidden' name='length' value="<?php echo $length; ?>">
        <input type='hidden' name='depth' value='<?php echo $depth; ?>'>
        <input type='hidden' name='priceTotal' value="<?php echo $priceTotal; ?>">
        <input type='hidden' name='quantity' value="<?php echo $bagTotal; ?>">


        <input type='submit' name="addToCart" value='Add To Cart'>
    </form>

