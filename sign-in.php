<?php
session_start();
require('connection.php');
$errors = array();
if (isset($_POST['login'])){
    
    
    
    //get input
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (empty($username)){
        array_push($errors, "Username is required");
    }
    
    if (empty($password)){
        array_push($errors, "Password");
    }
    
    if (count($errors) == 0){
        $password = md5($password);
        
        $query = "SELECT * FROM USER_T WHERE username='$username' AND u_password='$password'";
        
        $results = mysqli_query($connection, $query);
        $credentials = mysqli_fetch_assoc($results);
        
        
        if (mysqli_num_rows($results) == 1){
            
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            
            // gets user id
            $get_userid_query = "SELECT * FROM USER_T where username = '$username'";      
            $result = mysqli_query($connection, $get_userid_query);
            $userid = mysqli_fetch_assoc($result);
            $userid = $userid['user_id'];
            $_SESSION['userid'] = $userid;
            
            // gets team name
            $get_teaminfo_query = "SELECT * FROM FANTASY_TEAM where user_id = '$userid'";
            $result = mysqli_query($connection, $get_teaminfo_query);
            $teaminfo = mysqli_fetch_assoc($result);
            $teamname = $teaminfo['team_name'];
            $_SESSION['teamname'] = $teamname;
            
            // gets team id
            $teamid = $teaminfo['team_id'];
            $_SESSION['teamid'] = $teamid;
           
            // logs the user in
            header('location: dashboard.php');
        }else{
            array_push($errors, "Wrong username/password combination");
        }
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

    <title>Sign In</title>
      <style rel="stylesheet">
          
          :root {
  --input-padding-x: 1.5rem;
  --input-padding-y: 0.75rem;
}

.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url('Images/EIZM890WwAAgoKi.jpeg');
  background-size: cover;
  background-position: center;
}

.login-heading {
  font-weight: 300;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
  border-radius: 2rem;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
  height: auto;
  border-radius: 2rem;
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
  cursor: text;
  /* Match the input under the label */
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
  </head>
  <body>
      <!-- NAVBAR -->
      <div>
           <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
               <div class="container">
                  <a class="navbar-brand" href="#"><img src="Images/AFA.png" class="logos"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                      </li>
                        <li class="nav-item active">
                        <a class="nav-link" href="sign-up.php">Fantasy League</a>
                    </ul>
                  </div>
                </div>
            </nav>
      </div>
      
         <div class="container-fluid">
          <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
              <div class="login d-flex align-items-center py-5">
                <div class="container">
                  <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                      <h3 class="login-heading mb-4">Welcome back!</h3>
                      <form method="post">
                        <div class="form-label-group">
                          <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Email address" required autofocus>
                          <label for="inputUsername">Username</label>
                        </div>

                        <div class="form-label-group">
                          <input type="password" id="inputPassword" class="form-control" name="password"placeholder="Password" required>
                          <label for="inputPassword">Password</label>
                        </div>

                        
                        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" style="background-color: maroon !important" name="login">Sign in</button>
                      </form>
                        <p>Don't have an account? <a href="sign-up.php">Sign up here</a></p>
                        <?php
                        echo"<p>";
                        foreach ($errors as $error){
                            echo $error;
                        }
                        echo"</p>";
                        ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>