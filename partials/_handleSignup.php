<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require "_dbconnect.php";

    $user_email = $_POST['signupEmail'];
    $user_pass = $_POST['signupPwd'];
    $user_cpass = $_POST['signupCnfPwd'];

    $existSql = " SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "email already in use";
    } 
    else {
        if ($user_pass == $user_cpass) {
            $hash = password_hash($user_pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `user_email`, `user_pass`) VALUES ('$user_email', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: /forum/index.php?signupSucess=true");
            }

        } else {
            $showError = "passwords do not match";
            header("location: /forum/index.php?signupSucess=false");
        }
    }
}
?>