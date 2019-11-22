<?php
session_start();
require("connection.php");
$username = $_SESSION['username'];




if(isset($_POST['submit'])) {
    $score1 = $_POST['predict1'];
    $score2 = $_POST['predict2'];
    $score3 = $_POST['predict3'];
    $score4 = $_POST['predict4'];
    $score5 = $_POST['predict5'];
    $score6 = $_POST['predict6'];
    
    $scorearray = array();
    array_push($scorearray, $score1);
    array_push($scorearray, $score2);
    array_push($scorearray, $score3);
    array_push($scorearray, $score4);
    array_push($scorearray, $score5);
    array_push($scorearray, $score6);
    
  
        $get_userid_query = "SELECT * FROM user_t where username = '$username'";
                    
        $result = mysqli_query($connection, $get_userid_query);
        $userid = mysqli_fetch_assoc($result);
        $userid = $userid['user_id'];

        $query = " INSERT INTO predictions(`score1`,`score2`,`user_id`) VALUES('$score1','$score2','$userid')"; 
        $result = mysqli_query($connection, $query);
        $query = " INSERT INTO predictions(`score1`,`score2`,`user_id`) VALUES('$score3','$score4','$userid')";
        $result = mysqli_query($connection, $query);
        $query = " INSERT INTO predictions(`score1`,`score2`,`user_id`) VALUES('$score5','$score6','$userid')";
        $result = mysqli_query($connection, $query);
        
   


    
    
  }
    

?>
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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    
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
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php" style="text-align: center">
                            <p>Your Team</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="league-table.php" style="text-align: center">
                            <p>League Table</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="player-facts.php" style="text-align: center">
                            <p>Player Facts</p>
                        </a>
                    </li>
                    <li class="nav-item active">
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
        <div class="main-panel" style="background-color: #f2f2f2; padding-top: 100px">
                <form method="post">
                    <div>
                        <div class="predictions">
                            <img  class="predict_img" src="Images/lol.png">
                            <input type="number" name="predict1" style="margin-left: 15px;" min="1" max="15">
  

                        <label style="padding: 10px;">vs</label>

                            <input  type="number" name="predict2" style="margin-right: 15px;"  min="1" max="15">
                            <img class="predict_img" src="Images/high.png">
                        </div>    
                    
                    </div>
                    <div class="predictions">
                        <img class="predict_img" src="Images/nfc.png">
                        <input type="number" name="predict3" style="margin-left: 15px;"  min="1" max="15">
                        <label style="padding: 10px">vs</label>
                        <input style="margin-right:15px;" name="predict4" type="number"  min="1" max="15">
                        <img class="predict_img" src="Images/kasanoma.png">
                    </div>

                    
                    <div class="predictions">
                        <img class="predict_img" src="Images/elite.png">
                        <input type="number" name="predict5" style="margin-left: 15px;"  min="1" max="15">
                        <label style="padding: 10px;">vs</label>
                        <input style="margin-right:15px;" name="predict6" type="number"  min="1" max="15">
                        <img class="predict_img" src="Images/red.png">
                    </div>
                    
                    <input name="submit" type="submit" class="btn def-spacing" style="margin-left: 900px" value="submit">
                </form>   
            </div>  
    </div>

</body>
</html>
