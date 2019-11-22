<?php

    session_start();

    

    if (isset($_POST['logout'])){
    
    $_SESSION = array();
    session_destroy();
    header('location: admin-login.php'); 
    }

    if (isset($_POST['update'])){
        
        // if clicked update the database by inserting all points for the season
        
        require("connection.php");
        require("classes/dbclass.php");
        require("classes/userClass.php"); 
        
        //$uname,$tname,$teamid
        $query = "SELECT USER_T.username, FANTASY_TEAM.team_name, FANTASY_TEAM.team_id from USER_T inner join FANTASY_TEAM on USER_T.user_id = FANTASY_TEAM.user_id";
        $unames = array();
        $tnames = array();
        $teamids = array();
        
        if($result = mysqli_query($connection, $query)){
            while ($row = mysqli_fetch_assoc($result)){
                array_push($unames, $row['username']);
                array_push($tnames, $row['team_name']);
                array_push($teamids, $row['team_id']);
            }
        }
        
        foreach($unames as $names){
            $key = array_search($names, $unames);
            $user2 = new user($names, $tnames[$key], $teamids[$key]);
            $user2->insertPointsForSeason();
            $user2->insertSeasonpoints();
        }
        
        
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>
	<h1>Admin Page</h1>
	<form method="post">
        <input type="submit" name="update" value="update database">
        <input type="submit" name="logout" value="log out">
    </form>
</body>
</html>