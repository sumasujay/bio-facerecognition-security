<?php
session_start();

include("config.php");

if (isset($_POST['but_upload'])) {

    $name = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
            // Convert to base64 
            //$image_base64 = base64_encode(file_get_contents('uploads/'.$name) );
            //$image = 'data:image/'.$imageFileType.',base64:'.$image_base64;
            // Insert record
            //echo $image;
            // echo $fname = '<script>var userDetails = JSON.parse(localStorage.getItem("user_details")); document.writeln(userDetails[0])</script>';
            //$fname = $_SESSION["fname"];
            //echo $userDetails = '<script>var userDetails = JSON.parse(localStorage.getItem("user_details"));</script>';
            $user = $_GET['name'];
            $query = "INSERT INTO images(name, user) VALUES ('$name','$user')";
            mysqli_query($con, $query);
            echo "<meta http-equiv='refresh' content='0'>";
            unset($name);unset($target_file);unset($target_dir);unset($imageFileType);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Security</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <script>
        $(document).ready(function() {
            var userDetails = JSON.parse(localStorage.getItem("user_details")); //get them back
        });
    </script>

    <nav class="navbar navbar-info bg-primary p-3">
        <a class="navbar-brand text-white" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-fingerprint" viewBox="0 0 16 16">
                <path d="M8.06 6.5a.5.5 0 0 1 .5.5v.776a11.5 11.5 0 0 1-.552 3.519l-1.331 4.14a.5.5 0 0 1-.952-.305l1.33-4.141a10.5 10.5 0 0 0 .504-3.213V7a.5.5 0 0 1 .5-.5Z" />
                <path d="M6.06 7a2 2 0 1 1 4 0 .5.5 0 1 1-1 0 1 1 0 1 0-2 0v.332c0 .409-.022.816-.066 1.221A.5.5 0 0 1 6 8.447c.04-.37.06-.742.06-1.115V7Zm3.509 1a.5.5 0 0 1 .487.513 11.5 11.5 0 0 1-.587 3.339l-1.266 3.8a.5.5 0 0 1-.949-.317l1.267-3.8a10.5 10.5 0 0 0 .535-3.048A.5.5 0 0 1 9.569 8Zm-3.356 2.115a.5.5 0 0 1 .33.626L5.24 14.939a.5.5 0 1 1-.955-.296l1.303-4.199a.5.5 0 0 1 .625-.329Z" />
                <path d="M4.759 5.833A3.501 3.501 0 0 1 11.559 7a.5.5 0 0 1-1 0 2.5 2.5 0 0 0-4.857-.833.5.5 0 1 1-.943-.334Zm.3 1.67a.5.5 0 0 1 .449.546 10.72 10.72 0 0 1-.4 2.031l-1.222 4.072a.5.5 0 1 1-.958-.287L4.15 9.793a9.72 9.72 0 0 0 .363-1.842.5.5 0 0 1 .546-.449Zm6 .647a.5.5 0 0 1 .5.5c0 1.28-.213 2.552-.632 3.762l-1.09 3.145a.5.5 0 0 1-.944-.327l1.089-3.145c.382-1.105.578-2.266.578-3.435a.5.5 0 0 1 .5-.5Z" />
                <path d="M3.902 4.222a4.996 4.996 0 0 1 5.202-2.113.5.5 0 0 1-.208.979 3.996 3.996 0 0 0-4.163 1.69.5.5 0 0 1-.831-.556Zm6.72-.955a.5.5 0 0 1 .705-.052A4.99 4.99 0 0 1 13.059 7v1.5a.5.5 0 1 1-1 0V7a3.99 3.99 0 0 0-1.386-3.028.5.5 0 0 1-.051-.705ZM3.68 5.842a.5.5 0 0 1 .422.568c-.029.192-.044.39-.044.59 0 .71-.1 1.417-.298 2.1l-1.14 3.923a.5.5 0 1 1-.96-.279L2.8 8.821A6.531 6.531 0 0 0 3.058 7c0-.25.019-.496.054-.736a.5.5 0 0 1 .568-.422Zm8.882 3.66a.5.5 0 0 1 .456.54c-.084 1-.298 1.986-.64 2.934l-.744 2.068a.5.5 0 0 1-.941-.338l.745-2.07a10.51 10.51 0 0 0 .584-2.678.5.5 0 0 1 .54-.456Z" />
                <path d="M4.81 1.37A6.5 6.5 0 0 1 14.56 7a.5.5 0 1 1-1 0 5.5 5.5 0 0 0-8.25-4.765.5.5 0 0 1-.5-.865Zm-.89 1.257a.5.5 0 0 1 .04.706A5.478 5.478 0 0 0 2.56 7a.5.5 0 0 1-1 0c0-1.664.626-3.184 1.655-4.333a.5.5 0 0 1 .706-.04ZM1.915 8.02a.5.5 0 0 1 .346.616l-.779 2.767a.5.5 0 1 1-.962-.27l.778-2.767a.5.5 0 0 1 .617-.346Zm12.15.481a.5.5 0 0 1 .49.51c-.03 1.499-.161 3.025-.727 4.533l-.07.187a.5.5 0 0 1-.936-.351l.07-.187c.506-1.35.634-2.74.663-4.202a.5.5 0 0 1 .51-.49Z" />
            </svg>
            BIOMETRICS SECURITY</a>
        <a class="navbar-brand text-primary bg-light bordered rounded p-r-20 p-l-20" href="index.php">&nbsp;&nbsp;&nbsp;Logout&nbsp;&nbsp;&nbsp;</a>
    </nav>

    <div class="container">
        <h1 class="text-center mt-5" style="text-transform:capitalize;">Welcome <?php echo '<script>var userDetails = JSON.parse(localStorage.getItem("user_details")); document.writeln(userDetails[0])</script>' ?></h1>
        <h4 class="text-center mt-3">This is just to showcase a sample data, user can store files on the server which only belongs to him/her.</h4>
        <!-- <h5 class="text-center mt-3">If the hacker tries to hack the system using brute force, after 3rd failed attempt, the files will be deleted from the system.</h5> -->
        <?php
        //echo $userDetails = '<script>var userDetails = JSON.parse(localStorage.getItem("user_details"));</script>';
        $user = $_GET['name'];
        $SelectSql = "SELECT * FROM images WHERE user ='$user'";
        $result = $con->query($SelectSql);
        $con->close();

        ?>
        <div class="row">
        <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <div class="col-sm-4 mt-3 col-md-4">
                <img src="uploads/<?php echo $rows['name']?>" class="img-fluid" alt="image">
            </div>
            <?php
                }
            ?>
        </div>
        <form method="post" action="#" enctype='multipart/form-data' class="my-5 text-center">
            <h5 class="text-center my-4">Please Upload more files from here.</h5>
            <input type='file' name='file' class="bg-light border round" />
            <input type='submit' value='Upload' name='but_upload'>
        </form>
    </div>

</body>

</html>