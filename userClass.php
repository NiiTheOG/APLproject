<?php

/**
 * @author Las Elites
 * This is the user class; it has properties and methods
 * for each user
 */
class user extends dbh
{


	//properties
	public $username = null;
	public $teamName = null;
	public $team = array();
	public $teamid = null;

	function __construct($uname,$tname,$teamid)
	{
		$this->username = $uname;
		$this->teamName = $tname;
		$this->teamid = $teamid;
	}
    
    private function sortTeam($team)
    {
        $gkarray = array();
        $defarray = array();
        $midarray = array();
        $forarray = array();
        $sortedArray = array();
        
        foreach($team as $player){
            if ($player[0] == 'G'){
                array_push($gkarray,$player);
            }else if ($player[0] == 'D'){
                array_push($defarray, $player);
            }else if ($player[0] == 'M'){
                array_push($midarray, $player);
            }else if ($player[0] == 'F'){
                array_push($forarray, $player);
            }
        }
        $sortedArray = array_merge($gkarray, $defarray, $midarray, $forarray);
        return $sortedArray;
    }

	public function addteamtoDB($teamid, $team)
    {
        $team = $this->sortTeam($team);
		foreach($team as $player)
        {
			$sql = "INSERT INTO `f_team_players`(`ft_id`,`player_id`) VALUES('$teamid','$player')";
            $this->connect()->query($sql);
		}
	}
    
    public function printTeamToDashboard(){
        $currentMatchday = $this->getCurrentMatchDay();
        // this query selects the team and their points in the given matchday
        $query = "SELECT F_TEAM_PLAYERS.ft_id, players.player_name, f_team_players.player_id, (1*(matchday_stats.Played) + 5*matchday_stats.GOALS + 4* matchday_stats.ASSISTS)
        FROM ((f_team_players 
        INNER JOIN matchday_stats ON f_team_players.player_id = matchday_stats.Player_id)
        INNER JOIN players ON f_team_players.player_id = players.player_id) 
        WHERE f_team_players.ft_id = '$this->teamid' AND matchday_stats.Match_day = '$currentMatchday'";
        
        $arrayname = array();
        $arrayid = array();
        $arraypoints = array();
        
        // for storing gk details
        $gkid = array();
        $gkname = array();
        $gkpoints = array();
        
        // for storing defender details
        $defid = array();
        $defname = array();
        $defpoints = array();
        
        // for storing midfielder details
        $midid = array();
        $midname = array();
        $midpoints = array();
        
        // for storing forward details
        $forid = array();
        $forname = array();
        $forpoints = array();
        
        if ($result = $this->connect()->query($query)){
            while ($row = $result->fetch_assoc()){
                array_push($arrayname, $row['player_name']);
                array_push($arrayid,$row['player_id']);
                array_push($arraypoints, $row['(1*(matchday_stats.Played) + 5*matchday_stats.GOALS + 4* matchday_stats.ASSISTS)']);
            }
        }
        
        foreach($arrayid as $id){
                
                if ($id[0] == 'G'){
                    $key = array_search($id, $arrayid);
                    array_push($gkid,$id);
                    array_push($gkname, $arrayname[$key]);
                    array_push($gkpoints, $arraypoints[$key]);
                }
                if ($id[0] == 'D'){
                    $key = array_search($id, $arrayid);
                    array_push($defid,$id);
                    array_push($defname, $arrayname[$key]);
                    array_push($defpoints, $arraypoints[$key]);
                }
                if ($id[0] == 'M'){
                    $key = array_search($id, $arrayid);
                    array_push($midid,$id);
                    array_push($midname, $arrayname[$key]);
                    array_push($midpoints, $arraypoints[$key]);
                }
                if ($id[0] == 'F'){
                    $key = array_search($id, $arrayid);
                    array_push($forid,$id);
                    array_push($forname, $arrayname[$key]);
                    array_push($forpoints, $arraypoints[$key]);
                }
            
            
        } 
        
        // print goalkeeper
        
        echo "<div class='row' style='margin: auto'>";
                
                    echo "<div class='col-lg-4'>";
                
                        echo "<div class='players' >";
                
                            echo $gkname[0]." ".$gkpoints[0];
                
                        echo "</div>";
                
                    echo "</div>";
                    
        echo "</div>";
        
        // print defenders
        if(count($defid) == 4){
            echo "<div class='row' style='margin: auto'>";
                foreach($defid as $id){
                    $key = array_search($id, $defid);
                    echo "<div class='col-lg-3'>";
                
                        echo "<div class='players' >";
                            
                            echo $defname[$key]." ".$defpoints[$key];
                
                        echo "</div>";
                
                    echo "</div>";
                    }
            echo "</div>";
        }
        if(count($defid) == 3){
            echo "<div class='row' style='margin: auto'>";
                foreach($defid as $id){
                    $key = array_search($id, $defid);
                    echo "<div class='col-lg-4'>";
                
                        echo "<div class='players' >";
                            echo $key;
                            echo $defname[$key]." ".$defpoints[$key];
                
                        echo "</div>";
                
                    echo "</div>";
                    }
            echo "</div>";
        }
        
        // print midfielder
        if(count($midid) == 4){
            echo "<div class='row' style='margin: auto'>";
                foreach($midid as $id){
                    $key = array_search($id, $midid);
                    echo "<div class='col-lg-3'>";
                
                        echo "<div class='players' >";
                            
                            echo $midname[$key]." ".$midpoints[$key];
                
                        echo "</div>";
                
                    echo "</div>";
                    }
            echo "</div>";
        }
        if(count($midid) == 3){
            echo "<div class='row' style='margin: auto'>";
                foreach($midid as $id){
                    $key = array_search($id, $midid);
                    echo "<div class='col-lg-4'>";
                
                        echo "<div class='players' >";
                            
                            echo $midname[$key]." ".$midpoints[$key];
                
                        echo "</div>";
                
                    echo "</div>";
                    }
            echo "</div>";
        }
        
        // print forwards
        if(count($forid) == 3){
            echo "<div class='row' style='margin: auto'>";
                foreach($forid as $id){
                    $key = array_search($id, $forid);
                    echo "<div class='col-lg-4'>";
                
                        echo "<div class='players' >";
                            
                            echo $forname[$key]." ".$forpoints[$key];
                
                        echo "</div>";
                
                    echo "</div>";
                    }
            echo "</div>";
        }
        
        
        
        
        
    }
    
    private function getCurrentMatchDay(){
        $get_current_matchday_query = "SELECT MAX(Match_day) AS CurrentMatchday FROM matchday_stats";
        $result = $this->connect()->query($get_current_matchday_query);
        $row = $result->fetch_assoc();
        
        $CurrentMatchday = $row['CurrentMatchday'];
        return $CurrentMatchday;
    }
    
    public function returnMatchdayPoints(){
        
        $currentMatchday = $this->getCurrentMatchDay();
        
        $query = "SELECT F_TEAM_PLAYERS.ft_id, players.player_name, f_team_players.player_id, (1*(matchday_stats.Played) + 5*matchday_stats.GOALS + 4* matchday_stats.ASSISTS)
        FROM ((f_team_players 
        INNER JOIN matchday_stats ON f_team_players.player_id = matchday_stats.Player_id)
        INNER JOIN players ON f_team_players.player_id = players.player_id) 
        WHERE f_team_players.ft_id = '$this->teamid' AND Match_day = '$currentMatchday'";
        
        $matchdayPoints = array();
        
        if ($result = $this->connect()->query($query)){
            while ($row = $result->fetch_assoc()){
                array_push($matchdayPoints, $row['(1*(matchday_stats.Played) + 5*matchday_stats.GOALS + 4* matchday_stats.ASSISTS)']);       
            }
        } 
        $points = 0;
        foreach($matchdayPoints as $i){
            $points = $points + $i;
            
        }
        return $points;
    }
    
    public function insertPointsForSeason(){
        
        $points = $this->returnMatchdayPoints();
        $currentMatchday = $this->getCurrentMatchDay();
        $query = "SELECT * FROM fantasy_matchday_stats WHERE Match_day = '$currentMatchday'";
        $result = $this->connect()->query($query);
        $row = $result->fetch_assoc();
        
        
            $query = "INSERT INTO fantasy_matchday_stats VALUES('$currentMatchday','$this->teamid','$points')";
            $this->connect()->query($query);
        
    }
    
    public function returnPointsForSeason(){
        $query = "SELECT * FROM fantasy_matchday_stats WHERE Team_id = '$this->teamid'";
        $seasonPoints = array();
        if ($result = $this->connect()->query($query)){
            while ($row = $result->fetch_assoc()){
                array_push($seasonPoints, $row['Points']);       
            }
        }
        
        $points = 0;
        foreach($seasonPoints as $i){
            $points = $points + $i;
        }
        
        return $points;
    }
    
    public function insertSeasonpoints(){
        $points = $this->returnPointsForSeason();
        $query = "SELECT Team_id from season_points where Team_id = '$this->teamid'";
        $result = $this->connect()->query($query);
        $row = $result->fetch_assoc();
        if ($row){
            $query = "UPDATE season_points SET Season_points = '$points' WHERE Team_id = '$this->teamid'";
            $this->connect()->query($query);
        }else{
            $query = "INSERT INTO season_points VALUES('$this->teamid', '$points')";
            $this->connect()->query($query);
        }
    }
    
    public function displayLeagueTable(){
        $query = "SELECT user_t.username, fantasy_team.team_name, season_points.Season_points FROM ((user_t INNER JOIN fantasy_team on user_t.user_id = fantasy_team.user_id) INNER JOIN season_points ON season_points.Team_id = fantasy_team.team_id) ORDER BY season_points.Season_points DESC";
        
        
        $namearray = array();
        $teamarray = array();
        $pointsarray = array();
        
        if ($result = $this->connect()->query($query)){
            while ($row = $result->fetch_assoc()){
                array_push($namearray, $row['username']);
                array_push($teamarray, $row['team_name']);
                array_push($pointsarray, $row['Season_points']);
            }
        }
        
       
        
        echo"<table class='table'>";
          echo "<thead>";
            echo "<tr>";
              echo "<th scope='col'>Position</th>";
              echo "<th scope='col'>Manager</th>";
              echo "<th scope='col'>Team</th>";
              echo "<th scope='col'>Points</th>";
            echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
            $pos = 0;
            foreach ($namearray as $name){
              echo "<tr>";
              echo "<th scope='row'>"; $pos = $pos + 1; echo $pos; echo"</th>";
              $key = array_search($name, $namearray);
              echo "<td>"; echo $name ;echo"</td>";
              echo "<td>"; echo $teamarray[$key]; echo"</td>";
              echo "<td>"; echo $pointsarray[$key]; echo"</td>";
            echo "</tr>";
            };
          echo "</tbody>";
        echo "</table>";
        
        
    
    }


}



?>