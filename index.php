<?php session_start();
unset($_SESSION['username']);
unset($_SESSION['otp']);
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
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    canvas {
    position: absolute;
    left: 50;

    }
  </style>
</head>
<body onload="facerec()">
<script>
  localStorage.clear();
  var userDetails = ['test', 'email@email.com', '1231231231'];
  localStorage.setItem("user_details", JSON.stringify(userDetails));
</script>
<div style="background-image: linear-gradient(to right, #1155b9, #4c367d, #452049, #2a1321, #000000); width: 100%; height: 100%; margin: 0; padding: 0; text-align: center">
    <p style="color: white; font-size: 36px; font-weight:700">PLEASE MAKE A HAPPY FACE TO ENTER</p>
    <p style="color: white; font-size: 24px; font-weight:400">Please wait, loading library might take some time.</p>
    <!-- <div style="position: relative; left:50%; transform: translate(-50%, 6%);"> -->
    <video id="video" width="720" height="560" autoplay muted></video>
    <p style="color: white; font-size: 24px; font-weight:400; margin-top: 50px;">This Face Detection API is based on TensorFlow JS and it simulates the face unlock biometric login feature</p>
<!-- </div> -->
</body>
</html>

