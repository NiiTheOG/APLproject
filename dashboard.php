
<!--
=========================================================
 Light Bootstrap Dashboard - v2.0.1
=========================================================

 Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/light-bootstrap-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.  -->

<?php

require("connection.php");
require("classes/dbclass.php");
require("classes/userClass.php");
session_start();
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$teamname = $_SESSION['teamname'];
$teamid = $_SESSION['teamid'];

// redirect if user hasn't signed in
if(!$username){
    header('location: sign-in.php');
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link rel="stylesheet" href="css/custom.css">
    
    
    
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="red">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text">
                        AFA Fantasy League
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php" style="text-align: center">
                            <p>Your Team</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="league-table.php" style="text-align: center">
                            <p>League Table</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="player-facts.php" style="text-align: center">
                            <p>Player Facts</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="make-your-prediction.php" style="text-align: center">
                            <p>Make Your Prediction</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="sign-out.php" style="text-align: center">
                            <p>Sign Out</p>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            
            <div class="container" style="margin-top: 30px">
                
                <div class="btn" style="margin-bottom: 20px"><?php echo $teamname ?></div>
                <div class="row" style="margin: auto">
                    <?php
                          $newUser1 = new user($username, $teamname, $teamid);
                          $newUser1->printTeamToDashboard();
                    ?>
                </div>
                
                <div class="btn" style="margin-bottom: 20px"> 
                    GameWeek Points: 
                    <?php
                    
                            echo $newUser1->returnMatchdayPoints(); 
                    
                    ?>
                </div>
                
                <div class="btn" style="margin-bottom: 20px"> 
                    Total Points this season: 
                    <?php
                    
                            echo $newUser1->returnPointsForSeason();
                            
                            
                    
                    ?>
                </div>
                
                </div>
        </div>
            
    </div>
    

</body>
</html>
