<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(is_numeric($_POST["input"])){
        if($_POST["input"] > 0){
            $clr = "green";
            $msg = "je teplo!";
        }else if($_POST["input"] < 0){
            $clr = "blue";
            $msg = "mrzne!";
        }else{
            $clr = "yellow";
            $msg = "je chladno, ale ještě nemrzne!";
        }
        $fullmsg = $msg . " Je právě " . $_POST["input"] . "°C";
    }else{
        $clr = "red";
        $fullmsg = "Špatně zadané údaje!";
    }

    $out = "<span style='color:" . $clr . "'>" . $fullmsg . "</span>"; 
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Vyhodnocení teploty</title>
</head>

<body>
    <div style="background-color: grey; width: 400px; height: 400px;">
    <h2>Vyhodnocení teploty</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>Zadejte aktuální teplotu: <input type="number" name="input"></p>
        <input type="submit" value="Vyhodnotit">
    </form>
    <?php echo $out; ?>
</div>
</body>

</html>