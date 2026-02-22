<?php  
include "conn.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="mail" placeholder="email">
        <input type="text" name="pass" placeholder="password">
        <button type="submit" name="log_btn">Login</button>
    </form>
</body>
</html>

<?php 

if(isset($_POST['log_btn'])){


    $email = $_POST['mail'];
    if (empty($email)) {
        array_push($errors, "email is required");
    }

    $pass=$_POST['pass'];
    if(empty($pass)){
        array_push($errors,"password is required");
    }

    $check_mail = "select * from admin where email='$email'";

    $run_check = mysqli_query($con, $check_mail);

    if ( mysqli_num_rows($run_check) !=1 ) {
        array_push($errors, "email is incorrect");
    }

    $admin_data = mysqli_fetch_assoc($run_check);
    if(!password_verify($pass,$admin_data['pass'])){
        array_push($errors,"password is incorrect");
    }
    if(empty($errors)){
        $_SESSION['admin_name'] =$admin_data['name'];
        header("location:index.php");

    }else{
        foreach($errors as $err):
            echo "<br>".$err;
        endforeach;
    }

}



?>