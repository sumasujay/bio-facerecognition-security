<?php
session_start();
//$_SESSION['username'] = "set";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Network Security</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script defer src="face-api.min.js"></script>
    <script defer src="script.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body>
  <script>
  var userDetails;
  if ( userDetails == null)
  var userDetails = ["test","test@test.com","1231231231"];
  var userDetails = JSON.parse(localStorage.getItem("user_details")); //get them back
  console.log(userDetails);
  var attempts = 0;
  localStorage.setItem("attempts", "0");
  $(document).ready(function(){
  
	$('form').submit(function(event){

    event.preventDefault();
	  var	email = $('#email').val();
	  var	pinNumber = $('#pinNumber').val();
    let x = document.getElementsByClassName("success");
    let y = document.getElementsByClassName("fail");

    console.log(email, userDetails[1]);
    if(userDetails[1] === email && userDetails[2] === pinNumber){
    
      if(x[0].style.visibility === "hidden"){
      x[0].style.visibility = "visible" 	
      setTimeout(() => {
        window.location.href = "dashboard.php?name="+userDetails[0];
      }, "1500")
      }
    } 
  
    else{
      if(y[0].style.visibility === "hidden"){
      y[0].style.visibility = "visible";	
      }
    }
        setTimeout(() => {
            x[0].style.visibility = "hidden";
            y[0].style.visibility = "hidden";
            document.forms[0].reset();
        }, "1200")
      
      attempts = 0;
      var attempts = parseInt(localStorage.getItem("attempts"))
      localStorage.setItem("attempts", ++attempts);
      if(localStorage.getItem("attempts") > 2){
        window.location.href = "dataclear.php";
      }
	    });
  });
  </script>

    <?php include'header.php';?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">TWO-FACTOR AUTHENTICATION</h3>
        <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
        
      </div>
      <div class="modal-body">
      <p>We will be demonstrating the working of Two-Factor authentication and how it is helpful to stop the hackers from entering the system even if they have access to the user's biometrics data. </p><br>
      <p>We can change our passwords, not our faces, iris, or fingerprints.</p><br>
      <p>Users will be able to protect their data using a password which is stored locally.</p><br>
      <p>Even if the hackers steals our biometric data, they will still need the password to gain access the user's data</p><br>
      <p>If hacker tries to enter the system using Brute Force attack, the system will be wiped after 3 wrong tries.</p><br>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



    <div class="container mt-5">
      <div class="row content">
        <div class="col-md-6 mb-3">
          <img
            src="https://i.postimg.cc/2SMQwHVd/pexels-tima-miroshnichenko-5380642.jpg"
            alt=""
            class="img-fluid"
          />
        </div>
        <div class="col-md-6">
          <h2 class="signin-text mb-3">Sign In</h2>
          <form action="#" id="loginForm" name="loginForm">
          <p class="success" style="visibility: hidden;"> Sign In Successful</p>
          <p class="fail" style = "visibility: hidden; background: #f8684bc4;color: #8a0000;padding: 10px;width: 95%;border-radius: 5px;text-align: center; margin-top: -60px;" > Login Failed. Wrong Email or Password </p>
            <div class="form-group mt-3">
              <label for="email">EMAIL</label>
              <input       
                type="email"
                name="email"
                id="email"
                class="form-control mt-2"
                email required
              />
              
            </div>
            <div class="form-group mt-3">
              <label for="pinNumber">PIN NUMBER</label>
              <input
                type="password"
                name="pinNumber"
                id="pinNumber"
                class="form-control mt-2" required autocomplete="false"
              />

            </div>
            <div class="d-flex justify-content-center">
              <input
                type="submit"
                class="btn btn-class mt-3 text-center btn-primary" autocomplete="false"
              />
            </div>
          </form>
          <div class="d-flex justify-content-center mt-3">
            <label class="mt-4">
              Don't have an account yet? &nbsp;&nbsp;&nbsp;&nbsp;</label
            >
            <a href="signup.php"
              ><button
                class="btn btn-class mt-3 float-right btn-dark text-white"
              >
                Sign Up
              </button></a
            >
          </div>
        </div>
        <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#myModal">
        *Please click here to read about the Problem statement and our take to fix the problem.
        </button>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
