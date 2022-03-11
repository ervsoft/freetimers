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
print_r($_POST);
error_reporting(E_ALL);
if ($_POST) {
    //echo '<pre>';
    //echo htmlspecialchars(print_r($_POST, true));
    //echo '</pre>';

    $length = $_POST['length'];
    $width = $_POST['width'];
    $depth = $_POST['depth'];


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
    <input type='text' name='width' value="<?php echo $width; ?>">
    <input type='text' name='length' value="<?php echo $length; ?>">
    <input type='text' name='depth' value='<?php echo $depth; ?>'>
    <input type='text' name='priceTotal' value="<?php echo $priceTotal; ?>">
    <input type='text' name='quantity' value="<?php echo $bagTotal; ?>">


    <input type='submit' value='Add To Cart'>
</form>

