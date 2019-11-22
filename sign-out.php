<?php
    // destroy all sessions and log the user out
    SESSION_START();
    $_SESSION = array();
    session_destroy();
    
    header('location: sign-in.php');

?>