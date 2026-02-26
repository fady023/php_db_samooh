<?php

include "conn.php";

if (isset($_SESSION['admin_name'])) {

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
    <br lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Student</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <br>

    <body>
        <?php include "header.php"; ?>
        <a href="index.php">Back to Students List</a></br></br>
        <div class="container">

            <?php

            if ($update):
                ?>
                <img src="<?php echo $data['image']; ?>" width="100">

            <?php endif; ?>



            <form action="" method="post" enctype="multipart/form-data">

                <input type="text" name="username" placeholder="name" value="<?php if ($update)
                    echo $data['name']; ?>">
                <input type="email" name="mail" placeholder="email" value="<?php if ($update)
                    echo $data['email']; ?>">

                <input type="file" name="filetoupload" accept="image/*">

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
            </form> </br>
            <?php include "footer.php"; ?>
        </div>
    </body>

    </html>
    <?php

    if (isset($_POST['sub'])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);


        if ($update) {
            if (!empty($_FILES["filetoupload"]["name"])) {
                move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file);
            } else {
                $target_file = $data['image'];
            }
        } else {
            if (!empty($_FILES["filetoupload"]["name"])) {
                if (!move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
                    array_push($errors, "file not uploaded");

                }
            }else{
                $target_file= 0;
            }


        }




        $name = $_POST['username'];

        if (empty($name)) {
            array_push($errors, "name is required");
        }

        $email = $_POST['mail'];
        if (empty($email)) {
            array_push($errors, "email is required");
        }

        $id = $update ? $_GET["std_id"] : null;

        $course_id = $_POST['courses'];

        $check_mail = "select * from students where email='$email'";

        if ($update) {
            $check_mail .= "and id !='$id'";
        }

        $run_check = mysqli_query($con, $check_mail);

        if (mysqli_num_rows($run_check) > 0) {
            array_push($errors, "email is already exist");
        }

        if (empty($errors)) {

            if ($update) {

                $sql = "update students set name='$name' , email='$email' , course_id='$course_id',image='$target_file' where id='$id' ";

            } else {
                $sql = "insert into students(name,email,course_id,image) values('$name','$email','$course_id',IF('$target_file' =0 , image ,'$target_file'))";

            }

            $run = mysqli_query($con, $sql);

            if ($run) {
                echo "<br> values inserted into students";
                header("refresh:3,url=index.php");
            }
        } else {
            foreach ($errors as $err) {
                echo " <br> $err ";
            }
        }

    }


} else {
    header("location:register.php");
}
