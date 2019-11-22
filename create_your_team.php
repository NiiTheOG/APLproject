<?php
session_start();
require("connection.php");
          require("classes/dbclass.php");
          require("classes/userClass.php");
          

        // if submit button is clickec
          if (isset($_POST['submit'])) {
              $gkcount=0;
              $defcount=0;
              $midcount=0;
              $forwdcount=0;
              
              // get the submitted players and categorize them into positions
              if (!empty($_POST['players'])){
                foreach($_POST['players'] as $selected){
                  if($selected[0] == 'G'){
                    $gkcount=$gkcount+1;
                  }
                  else if($selected[0] == 'D'){
                    $defcount=$defcount+1;
                  }else if($selected[0] == 'M'){
                    $midcount = $midcount + 1;
                  }else if($selected[0] == 'F'){
                    $forwdcount = $forwdcount + 1;
                  }

                }
                  // validate to make sure all player requirements are met
                $team = $gkcount+$defcount+$midcount+$forwdcount;
              if($gkcount != 1){
                $message ="Please select a goalkeeper";
                echo "<script type='text/javascript'>alert('$message');</script>";
              } 
              else if( !(($defcount == 4) || ($defcount == 3))){
                $message ="Please select 3 or 4 defenders";
                echo "<script type='text/javascript'>alert('$message');</script>";
              } 
              else if ( !(($midcount == 4) || ($midcount == 3))){
                $message ="Please select at 3 or 4 midfielders";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }
              else if( !(($forwdcount == 2) || ($forwdcount == 3))){
                $message ="Please select 2 or 3 forwards";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }
              else if ($team != 11){
                $message ="Please select 11 players";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }   
              else{
                  //if all requirements are met then store the team into the database and send the user to the sign in page
                echo "<script type='text/javascript'>alert('You have successfully created your team');</script>";
                $team_name = $_SESSION['teamname'];

                $username = $_SESSION['username'];
                
                $get_teamid_query = "SELECT * FROM FANTASY_TEAM where team_name = '$team_name'";
                    
                    $result = mysqli_query($connection, $get_teamid_query);
                    $teamid = mysqli_fetch_assoc($result);
                    $teamid = $teamid['team_id'];
                  
                  $newUser = new user($username,$team_name,$teamid);
                  $newUser->addteamtoDB($teamid, $_POST['players']);
                  
                  header('location: sign-in.php');
                  
                  }
                    
                    
              
              }  
              }
            else{
              echo "<script type='text/javascript'>alert('Please select your team');</script>";
            }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      
    <link rel="stylesheet" href="css/custom.css">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:700|Open+Sans:300&display=swap" rel="stylesheet">

    <title>Create Your Team</title>
  </head>
  <body>
      
      <!-- NAVBAR -->
      
      
      <!-- head -->
      <div class="head-div about-head">
          
          <h2 class="heading" style="color: white; margin: 10px 0px 0px 0px">Welcome!!</h2>
          
          <p class="texts" style="color: white; ">To complete your registration, select your Team. Your team should consist of just 11 players including a goalkeeper. You can have 3 or 4 defenders. Same goes for midfielders but you can have 2 or 3 forwards<br><br>
            
                <strong>Note that you cannot make changes to your team afterwards.</strong>
        </p>
          
          
      
      </div>

      
      <div class="container def-spacing">
          <form method="POST">
          <div class="btn" style="margin-bottom: 20px">GOALKEEPERS</div>
          
          
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="G1"> <img class="player-logos" src="Images/kasanoma.png">Prince
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="G2"> <img class="player-logos" src="Images/red.png">Akwasi Boateng
                  </div>
              </div><div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1"value="G3"> <img class="player-logos" src="Images/lol.png">Kadmiel
                  </div>
              </div><div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="G4"> <img class="player-logos" src="Images/elite.png">Evans
                  </div>
              </div>
          
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="G5"> <img class="player-logos" src="Images/high.png">Blueskirt
                  </div>
              </div>
          </div>
              
          <div class="btn" style="margin-bottom: 20px">DEFENDERS</div>
          
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D1"> <img class="player-logos" src="Images/red.png">Petit
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D2"> <img class="player-logos" src="Images/high.png">Abbey
                  </div>
              </div>
              
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D3"> <img class="player-logos" src="Images/elite.png">Mustapha
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D4"> <img class="player-logos" src="Images/high.png">Nadeem
                  </div>
              </div>
          
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D5"> <img class="player-logos" src="Images/lol.png">Ransford
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D6"> <img class="player-logos" src="Images/kasanoma.png">Seyram
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D7"> <img class="player-logos" src="Images/elite.png">Barnabas
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D8"> <img class="player-logos" src="Images/lol.png">Emma
                  </div>
              </div>
              
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D9"> <img class="player-logos" src="Images/kasanoma.png">Alexis
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" type="checkbox" class="form-check-input" id="exampleCheck1" value="D0"> <img class="player-logos" src="Images/kasanoma.png">Derek
                  </div>
              </div>
          </div>
          <div class="btn" style="margin-bottom: 20px">MIDFIELDERS</div>
          
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M1" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/red.png">Maison
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M2"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/kasanoma.png">Elvis
                  </div>
              </div>
              
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input  name="players[]" value="M3" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/lol.png">Stephen
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M4"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/high.png">Kobby
                  </div>
              </div>
          
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M5"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/nfc.png">Jesse
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M6"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/elite.png">Atule
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M7"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/kasanoma.png">Nico
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M8"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/elite.png">Joel
                  </div>
              </div>
              
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M9"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/red.png">Yaw
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="M0"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/lol.png">Yesu
                  </div>
              </div>
          </div>
          <div class="btn" style="margin-bottom: 20px">FORWARDS</div>
          
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F1"  type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/high.png">Daniel
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F2" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/kasanoma.png">Benjamin
                  </div>
              </div>
              
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F3" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/high.png">Bright
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F4" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/red.png">Philip
                  </div>
              </div>
          
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F5" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/elite.png">Yaw
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F6" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/high.png">John
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F7" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/red.png">Meli
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F8" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/lol.png">Dominic
                  </div>
              </div>
              
          </div>
          <div class="row" style="margin: auto">
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F9" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/nfc.png">Kofi
                  </div>
              </div>
              <div class="col-lg-3">
                  <div class="players form-group form-check">
                  <input name="players[]" value="F0" type="checkbox" class="form-check-input" id="exampleCheck1"> <img class="player-logos" src="Images/kasanoma.png">Hudson
                  </div>
              </div>
          </div>
             
          <input name="submit" type="submit" class="btn def-spacing" style="margin-bottom: 20px" value="submit">
          </form>
      </div>

      
                
<!--footer/contact -->
      
          <div class="contactus">
              
              <p class="footerinfo">Contact Us</p>
              <p class="footerinfo">1 University Avenue, Berekuso</p>
              <p class="footerinfo">laselitas.wordpress.com</p>
      
          </div>
          

      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- change color on scroll -->
    <script>
        $(window).scroll(function(){
            $('nav').toggleClass('scrolled', $(this).scrollTop()>100);
        });
      
      </script>
  </body>
</html>