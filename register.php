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
    <br>

    <h2>Register</h2>
    
    <br>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="mail" placeholder="email">
        <input type="text" name="pass" placeholder="password">
        <button type="submit" name="reg_btn">Register</button>
    </form>

    <a href="login.php"> Already Have an account</a>
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
    }else{
        $hashed_pass = password_hash($pass,  PASSWORD_BCRYPT);
    }

    $check_mail = "select * from admin where email='$email'";

    $run_check = mysqli_query($con, $check_mail);

    if (mysqli_num_rows($run_check) > 0) {
        array_push($errors, "email is already exist");
    }
    if(empty($errors)){
        $sql = "insert into admin(name,email,pass) values('$name','$email','$hashed_pass')";
        $run = mysqli_query($con,$sql);
        if($run){
            $_SESSION['admin_name'] = $name;
            echo "<br> admin registered successfully";
            header("refresh:5,url=index.php");
        }else{
            echo "<br> Error ".mysqli_error($con);
        }

    }else{
        foreach($errors as $err) :
            echo "<br> <h3> $err </h3>";
        endforeach;
    }
}


?>