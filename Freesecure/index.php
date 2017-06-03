<html>
    <head>
        <!-- Bootstrap CSS and Javascript -->
        <link rel="stylesheet" href="Static/css/bootstrap.min.css" />
        <link rel="stylesheet" href="Static/css/bootstrap-theme.min.css" />
        <script src="Static/js/jquery-3.2.1.min.js"></script>
        <script src="Static/js/bootstrap.min.js"></script>

        <!-- Project CSS -->
        <link rel="stylesheet" href="Static/css/WebUI.css" />
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
                        <li class="active"><a href="#">Dashboard</a></li>
                        <li><a href="lighting.php">Lighting</a></li>
                        <li><a href="#contact">Security</a></li>
                        <li><a href="#contact">Settings</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div id="status">
            <h1>System Status <span class="label label-success">Online</span></h1>
            <h2>Security <span class="label label-info">Disabled</span></h2>
            <h2>Lighting <?php
                $output = exec('python3 Backend/test.py');
                if ($output == "ok"){
                    echo "<span class=\"label label-success\">Online</span>";
                } else {
                    echo "<span class=\"label label-danger\">Offline</span>";
                }
                ?></h2>
            <h2>Web Interface <span class="label label-success">Online</span></h2>
            <h2>Daemon <?php
                $output = exec('python3 Backend/main.py -check');
                if ($output == "ok"){
                    echo "<span class=\"label label-success\">Online</span>";
                } else {
                    echo "<span class=\"label label-danger\">Offline</span>";
                }
                ?></h2>
            <script>
                window.setInterval(function(){
                    $("#status").load(location.href + " #status");
                }, 10000);

            </script>
        </div>
    </body>
</html>