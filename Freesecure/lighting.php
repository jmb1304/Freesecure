<html>
<head>
    <!-- Bootstrap CSS and Javascript -->
    <link rel="stylesheet" href="Static/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="Static/css/bootstrap-theme.min.css"/>
    <script src="Static/js/jquery-3.2.1.min.js"></script>
    <script src="Static/js/bootstrap.min.js"></script>

    <!-- Project CSS -->
    <link rel="stylesheet" href="Static/css/WebUI.css"/>
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">FreeSecure Web Interface</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active"><a href="#about">Lighting</a></li>
                <li><a href="#contact">Security</a></li>
                <li><a href="#contact">Settings</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<?php
$output = exec('python3 Backend/main.py -check');
if ($output == "ok"){
    $output = exec('python3 Backend/test.py');
    if ($output == "ok"){
        $output = exec('python3 Backend/main.py -getlights');
        $newoutput = rtrim($output,',');
        $LightArray = str_getcsv($newoutput);
        $num = 1;
        foreach ($LightArray as &$light) {
            echo "<div class=\"row\">";
            echo "<div class=\"col-sm-4\"><h2>" . $light . "</h1></div>";
            echo "<div class=\"col-sm-4\"><form action=\"set_light.php\" method=\"get\"><input type=\"hidden\" name=\"light\" value=\"" . $num . "\">
<input type=\"hidden\" name=\"state\" value=\"1\"><input type=\"submit\" value=\"Light On\" class=\"btn btn-primary\"></form></div>";
            echo "<div class=\"col-sm-4\"><form action=\"set_light.php\" method=\"get\"><input type=\"hidden\" name=\"light\" value=\"" . $num . "\">
<input type=\"hidden\" name=\"state\" value=\"0\"><input type=\"submit\" value=\"Light Off\" class=\"btn btn-primary\"></form></div>";
            echo "</div>";
            $num = $num + 1;
        }

        unset($light);
    } else {
        echo "\<div class=\"alert alert-danger\" role=\"alert\">
  <strong>Aww Man!</strong> The web app cannot connect to the Lighting Controller. Verify that it is available and try again.
</div>";
    }
} else {
    echo "<div class=\"alert alert-danger\" role=\"alert\">
  <strong>Aww Man!</strong> The web app cannot connect to the daemon. Verify that it is running and try again.
</div>";
}


?>

</body>
</html>