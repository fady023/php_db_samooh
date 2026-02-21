<?php
include "./conn.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <br><br>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="mail" placeholder="email">
        <input type="text" name="pass" placeholder="password">
        <button type="submit" name="reg_btn">Register</button>
    </form>

</body>

</html>

<?php


if (isset(($_POST['reg_btn']))) {

    $name = $_POST['username'];
    if (empty($name)) {
        array_push($errors, "name is required");
    }

    $email = $_POST['mail'];
    if (empty($email)) {
        array_push($errors, "email is required");
    }

    $pass=$_POST['pass'];
    if(empty($pass)){
        array_push($errors,"password is required");
    }

}


?>