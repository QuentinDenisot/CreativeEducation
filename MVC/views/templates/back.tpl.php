<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo DIRNAME; ?>/public/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Creative Education</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo DIRNAME; ?>/public/css/dashboard.css" rel="stylesheet" />
    <link href="<?php echo DIRNAME; ?>/public/css/grid.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo DIRNAME; ?>/public/css/alert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo DIRNAME; ?>/public/js/alert.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="rose" data-background-color="black">
            <div class="logo">
                <!-- <a href="http://www.theosenoussaoui.fr" class="simple-text logo-mini">
                    CE
                </a> -->
                <img src="<?php echo DIRNAME.'public/images/logo.svg'; ?>" alt="logo">
                <a href="http://www.theosenoussaoui.fr" class="simple-text logo-normal">
                    Creative Education
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php echo DIRNAME.$_SESSION['user']['profilePicPath']; ?>">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?php echo helpers::cleanFirstname($_SESSION['user']['firstname']).' '.helpers::cleanLastname($_SESSION['user']['lastname']); ?>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="<?php echo ($a == 'dashboardAction')?'active':''; ?>">
                        <a href="<?php echo DIRNAME.'index/dashboard'; ?>">
                            <i class="material-icons">dashboard</i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                    <li class="<?php echo ($c == 'UserController' || $c == 'RoleController' || $c == 'CourseController')?'active':''; ?>">
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">content_paste</i>
                            <p> Gestion<strong class="caret"></strong> </p>
                        </a>
                        <div class="collapse" id="pagesExamples">
                            <ul class="nav">
                                <!--<li>
                                    <a href="#">
                                        <span class="sidebar-mini"> P </span>
                                        <span class="sidebar-normal">Pages</span>
                                    </a>
                                </li>-->
                                <li>
                                    <a href="<?php echo DIRNAME.'role'; ?>">
                                        <span class="sidebar-mini"> R </span>
                                        <span class="sidebar-normal">Rôles</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo DIRNAME.'user'; ?>">
                                        <span class="sidebar-mini"> U </span>
                                        <span class="sidebar-normal">Utilisateurs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo DIRNAME.'course'; ?>">
                                        <span class="sidebar-mini"> C </span>
                                        <span class="sidebar-normal">Cours</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#componentsExamples">
                            <i class="material-icons">apps</i>
                            <p> Créer page
                               
                            </p>
                        </a>

                    </li>
                    <li>
                        <a href="./charts.html">
                            <i class="material-icons">timeline</i>
                            <p> Statistiques </p>
                        </a>
                    </li>
                    <li>
                        <a href="./charts.html">
                            <i class="material-icons">book</i>
                            <p> Documentation </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
            include 'views/'.$this->v;
        ?>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.theosenoussaoui.fr"> Senoussaoui Théo </a> déteste Charts.js
                </p>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo DIRNAME; ?>/public/js/creative.js" type="text/javascript"></script>
<script src="<?php echo DIRNAME; ?>/public/js/Chart.js" type="text/javascript"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            datasets: [{
                label: 'Nombres de pages crées',
                data: [2, 29, 5, 5, 2, 3, 10],
                backgroundColor: "rgba(233,30,99,0.75)"
            }]
        }
    });

</script>

<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
            datasets: [{
                label: 'Nombres d\'utilisateurs',
                data: [12, 19, 3, 17, 6, 3, 7],
                backgroundColor: "rgba(233,30,99,0.75)"
            }]
        }
    });

</script>

</html>
