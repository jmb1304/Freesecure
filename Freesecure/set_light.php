<?php
$light = $_GET["light"];
$state = $_GET["state"];
header("Location: lighting.php"); /* Redirect browser */
if($state == "1"){
    $output = exec('python3 Backend/main.py -setlighton ' . $light);
}
if($state == "0"){
    $output = exec('python3 Backend/main.py -setlightoff ' . $light);
}
exit();
?>