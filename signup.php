<?php session_start(); 
$_SESSION['otp'] = rand(10000000, 99999999);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Security</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<script>
$(document).ready(function(){
	$('form').submit(function(event){
		event.preventDefault();

		var	fullName = $('#fullName').val();
		var	email = $('#email').val();
		var	pinNumber = $('#pinNumber').val();

        var userDetails = [fullName, email, pinNumber];
        localStorage.setItem("user_details", JSON.stringify(userDetails));

        let x = document.getElementsByClassName("success");
    
        if(x[0].style.visibility === "hidden"){
        x[0].style.visibility = "visible" 		
        }
		$.ajax({
            type: "POST",
			url: "process.php",
			data: { fullName:fullName, email:email, pinNumber:pinNumber },
			success: function(result){
                console.log("action performed successfully");
			}
		});
  
        setTimeout(() => {
            x[0].style.visibility = "hidden";
            document.getElementById("signupForm").style.display = "none";
            document.getElementById("verifyotp").style.display = "block";
            console.log(<?php echo $_SESSION['oldOtp'] = $_SESSION['otp'];?>);
        }, "4000")
	});
});
</script>
<script>
    function verifyotp(){
        //let otpSent;
        // console.log(otpSent);
        console.log(<?php echo $_SESSION['otp'];?>);
        localStorage.setItem('otp',document.getElementById('otp').value);
        let otpEntered = document.getElementById('otp').value;
        if(localStorage.getItem('otp') == <?php 
        if(isset($_SESSION['otp']))
        echo $_SESSION['otp'];   
        ?>){
            window.location.replace('login.php')
        }
} 
</script>

    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="https://i.postimg.cc/7Zk98txx/internet-g6e8a0ea1d-1920.jpg" alt="" class="img-fluid" />
            </div>
            <div class="col-md-6">
                <form method="post" action="#" id="signupForm" style="display:block;">
                    <h2 class="signin-text mb-3">Sign Up</h2>
             
              <p class="success" style="visibility: hidden;"> Please verify OTP sent to your Email</p>
                    <div class="form-group mt-3">
                        <label for="fullName">FULL NAME</label>
                        <input formControlName="fullName" type="text" name="fullName" id="fullName" class="form-control mt-2" autocomplete="off" required minlength="3"/>
                        
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">EMAIL</label>
                        <input formControlName="email" type="email" name="email" id="email" class="form-control mt-2" email autocomplete="off" email required/>
                        
                    </div>
                    <div class="form-group mt-3">
                        <label for="pinNumber">SELECT PIN</label>
                        <input formControlName="pinNumber" type="password" name="pinNumber"  id="pinNumber" class="form-control mt-2" autocomplete="off" minlength="10" required/>
                    </div>
                    <div class="text-danger my-3 text-center text-light bg-dark py-2">Full Name Minimum length = 3, Email should be valid in xyz@abc.com format, PIN minimum Length = 10</div>
                    <div class="d-flex justify-content-center">
                        <input type="submit" id="submit" class="btn btn-class btn-primary mt-3 text-center" />
                    </div>
                </form>
                <div class="justify-content-center" style="display:none;" id="verifyotp">
                        <h3>Please verify the OTP sent to your email. We just want to make sure it is really you!</h3>
                        <div class="d-flex justify-content-center my-5">
                        <input name="otp" id="otp" class="mt-3 text-center border border-primary rounded" style="margin-right: 30px;" autocomplete="off" minlength="6"/>
                        <button class="btn btn-class btn-primary mt-3 text-center mr-3" onclick="verifyotp()">Verify OTP</button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <label class="mt-4">
                            Already Have an Account? &nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <a href="login.php"><button type="button" class="btn btn-class mt-3 float-right btn-dark text-white">
                                Log In
                            </button></a>
                    </div>

            </div>
        </div>
    </div>
</body>

</html>