
<?php
session_start();

if (isset($_POST['fullName'])&&isset($_POST['email']) && isset($_POST['pinNumber'])) {
    $_SESSION['fullName'] = $_POST['fullName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pinNumber'] = $_POST['pinNumber'];
}
?>