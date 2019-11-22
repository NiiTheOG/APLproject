<?php

    $searchterm = $_GET['sterm'];

    ajaxsearch($searchterm);

    function ajaxsearch($shterm){
        
        require('connection.php');
        
        $sql = "SELECT PLAYERS.player_name, SUM(MATCHDAY_STATS.GOALS) AS Goals, SUM(MATCHDAY_STATS.ASSISTS) as Assists FROM PLAYERS INNER JOIN MATCHDAY_STATS ON PLAYERS.player_id = MATCHDAY_STATS.Player_id WHERE PLAYERS.player_name like '$shterm'";
        
        $result = mysqli_query($connection, $sql);
        
        if (mysqli_num_rows($result)>0){
            
            while($row = mysqli_fetch_assoc($result)){
                
                echo "<b>Name: </b>". $row['player_name']. " | <b>Goals: </b>". $row['Goals']. " | <b>Assists: </b>". $row['Assists']. "<br>";
            }
        }else{
            echo "0 results";
        }
        mysqli_close($connection);
        
    }

?>