<?php
include "conn.php";

$update = false;

if (isset(($_GET["std_id"]))) {

    $id = $_GET["std_id"];
    $update = true;

    $sql = "select * from students where students.id ='$id'";
    $run = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($run);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>

<body>

    <form action="" method="post">
        <input type="text" name="username" placeholder="name" value="<?php if ($update)
            echo $data['name']; ?>">
        <input type="email" name="mail" placeholder="email" value="<?php if ($update)
            echo $data['email']; ?>">

        <select name="courses">
            <?php

            $sql_course = "select * from courses";


            $run_course = mysqli_query($con, $sql_course);


            foreach ($run_course as $co):
                ?>
                <option value="<?php echo $co['id']; ?>" <?php if ($update && $co['id'] == $data['course_id']) {
                       echo "selected";
                   } ?>><?php echo $co['c_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="sub">
            <?php echo $update ? "UPDATE" : "ADD"; ?>
        </button>
    </form>

</body>

</html>
<?php



if (isset($_POST['sub'])) {

    $name = $_POST['username'];
    $email = $_POST['mail'];

    $id = $update ? $_GET["std_id"] : null;

    $course_id = $_POST['courses'];

    $check_mail = "select * from students where email='$email'";

    if($update){
        $check_mail .= "and id !='$id'";
    }

    $run_check = mysqli_query($con, $check_mail);

    if (mysqli_num_rows($run_check) > 0) {
        echo "<br> sorry this mail already taken";
    } else {

        if ($update) {

            $sql = "update students set name='$name' , email='$email' , course_id='$course_id' where id='$id' ";

        } else {
            $sql = "insert into students(name,email,course_id) values('$name','$email','$course_id')";

        }

        $run = mysqli_query($con, $sql);

        if ($run) {
            echo "<br> values inserted into students";
            header("refresh:3,url=index.php");
        }


    }


}