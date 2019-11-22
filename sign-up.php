<?php

//register the user
    
            require('connection.php');

            session_start();
    
            $errors = array();
    
            if (isset($_POST['sign_up'])){
                //take all input from the form
                
                $username = $_POST['sign_up_uname'];
                
                $password1 = $_POST['sign_up_password'];
                
                $password2 = $_POST['sign_up_Con_password'];
                
                $team_name = $_POST['team_name'];
                
                // form validation: ensure that the form is correctly filled ...
                
                // by adding (array_push()) corresponding error unto $errors array
                
                if (empty($username)){ array_push($errors); }
                
                if (empty($password1)) { array_push($errors, "Password is required"); }
                
                if ($password1 != $password2) { array_push($errors, "Passwords do not match"); }
                
                //check to see if username and team name already exists
    
                $user_check_query = "SELECT * FROM USER_T WHERE username='$username'";
    
                $result = mysqli_query($connection, $user_check_query);
                
                $user = mysqli_fetch_assoc($result);
    
                if($user['username'] == $username){
                    
                    array_push($errors, "Username already exits");
                }
                
                
                $team_name_check_query = "SELECT * FROM FANTASY_TEAM WHERE team_name = '$team_name'";
                
                $result = mysqli_query($connection, $team_name_check_query);
                
                $team = mysqli_fetch_assoc($result);
                
                if($team['team_name'] == $team_name){ array_push($errors, "Team name already exits");}
                
                // if there are no errors in the form
                
                if (count($errors) == 0){
                    
                    $password = md5($password1); // encrypts password before entering into the database
                    
                    $query = " INSERT INTO USER_T(username, u_password) VALUES('$username','$password')";
                    
                    mysqli_query($connection, $query);
                    
                    $get_userid_query = "SELECT * FROM USER_T where username = '$username'";
                    
                    $result = mysqli_query($connection, $get_userid_query);
                    $userid = mysqli_fetch_assoc($result);
                    $userid = $userid['user_id'];
                    
                    $query = " INSERT INTO FANTASY_TEAM(team_name, user_id) VALUES('$team_name','$userid')";
                    
                    mysqli_query($connection, $query);
                    
                    $_SESSION['username'] = $username;

                    $_SESSION['teamname'] = $team_name;
                    
                    $_SESSION['success'] = "You are now logged in";
                    
                    header('location: create_your_team.php');
                    
                    
                }
                
                
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
      
    <style rel="stylesheet" type="text/css">
      
        :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background-image: url(Images/Group%2083.png)
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-body {
  padding: 2rem;
}

.form-signin {
  width: 100%;
}

.form-signin .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}

.btn-google {
  color: white;
  background-color: #ea4335;
}

.btn-facebook {
  color: white;
  background-color: #3b5998;
}

/* Fallback for Edge
-------------------------------------------------- */

@supports (-ms-ime-align: auto) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */

@media all and (-ms-high-contrast: none),
(-ms-high-contrast: active) {
  .form-label-group>label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
    
    </style>
    
    <title>Sign Up</title>
    
  </head>
  <body>
      
     <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign Up</h5>
            <form method="POST"  onsubmit="return Validate()" name="sign_up_form">

                      <div class="form-group">

                        <label>Username</label>

                        <input type="text" class="form-control" name="sign_up_uname" placeholder="Enter your username">

                        <small id="name_error"></small>

                      </div>

                      <div class="form-group">

                        <label for="exampleInputPassword1" >Password</label>

                        <input type="password" class="form-control" name="sign_up_password" placeholder="Password"><small id="emailHelp" class="form-text text-muted">

                          Password must atleast 8 characters<br>

                          Password must have at least 1 small character<br>

                          Password must have at least 1 uppercase letter<br>

                          Password must have at least 1 number</small>

                          <small id="password_error"></small>

                      </div>

                      <div class="form-group">

                        <label for="exampleInputPassword1" >Confirm Password</label>

                        <input type="password" class="form-control" name="sign_up_Con_password" placeholder="Password">

                        <small id="Con_password_error"></small>

                      </div>

                      <div class="form-group">

                        <label>Your team</label>

                        <input type="text" class="form-control" placeholder="Enter your team's name" name="team_name">

                        <small id="team_name_error"></small>

                      </div>
                        <?php
                            if($errors){
                                foreach($errors as $error){
                                    echo $error."<br>";
                                }
                            }
                
                        ?>

                      <button type="submit" class="btn btn-primary" name="sign_up">Sign Up</button>

                  </form>
                <p>Already have an account? <a href="sign-in.php">Sign In here</a></p>
                  
          </div>
        </div>
      </div>
    </div>
  </div>
      <script src="js/custom.js"></script>
  </body>
    
</html>