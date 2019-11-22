// selecting all text elements

var username = document.forms['sign_up_form']['sign_up_uname'];
var password = document.forms['sign_up_form']['sign_up_password'];
var password_confirm = document.forms['sign_up_form']['sign_up_Con_password'];
var team_name = document.forms['sign_up_form']['team_name'];

// selecting all error display elements

var name_error = document.getElementById('name_error');
var password_error = document.getElementById('password_error');
var con_password_error = document.getElementById('Con_password_error');
var team_name_error = document.getElementById('team_name_error');

// setting all event listeners
username.addEventListener('blur', nameVerify, true);
password.addEventListener('blur', passwordVerify, true);
team_name.addEventListener('blur', team_nameVerify, true);

//validation function

function Validate(){
    //validate username
    if (username.value == ""){
        name_error.textContent="Username is required";
        username.focus();
        return false;
    }
    
    //validate password
    if (password.value == ""){
        password_error.textContent="Password is required";
        password.focus();
        return false;
    }
    
    if (password.value.length < 8){
        password_error.textContent="Password must be at least 8 characters long";
        password.focus();
        return false;
    } else if (password.value.search(/[0-9]/) == -1){
        password_error.textContent="At least 1 numeric value must be entered";
        password.focus();
        return false;
    }else if (password.value.search(/[a-z]/) == -1){
        password_error.textContent="At least 1 small letter must be entered";
        password.focus();
        return false;
    }else if (password.value.search(/[A-Z]/) == -1){
        password_error.textContent="At least 1 uppercase letter must be entered";
        password.focus();
        return false;
    }
    // check if passwords match
    if (password.value != password_confirm.value){
        con_password_error.innerHTML = "The two passwords do not match";
        return false;
    }
    
    //check if team name isn't empty
    if (team_name.value == ""){
        team_name_error.textContent="Team name is required";
        team_name.focus();
        return false;
    }
    
}