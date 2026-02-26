<?php

include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Course</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="course_name" placeholder="CourseName"><br>
            <textarea name="course_desc" placeholder="Course_Description" cols="35" rows="7"></textarea><br>
            <input type="file" name="imgs[]" accept="image/*" multiple>
            <button type="submit" name="add_btn">Add Course</button>
        </form>

    </div>

    <?php include "footer.php"; ?>

</body>

</html>
<?php

if (isset(($_POST["add_btn"]))) {

    $c_name = $_POST["course_name"];
    if (empty($c_name)) {
        array_push($errors, "course name required");
    }

    $c_desc = $_POST["course_desc"];
    if (empty($c_desc)) {
        array_push($errors, "Description required");
    }

    $insert_course = mysqli_query($con, "insert into courses(c_name,description) values('$c_name','$c_desc')");
    // $last_inserted_id = mysqli_insert_id($con);

    $last_id_sql =mysqli_fetch_assoc(mysqli_query($con,"select LAST_INSERT_ID() as id "));

    $last_inserted_id = $last_id_sql["id"];

    $target_dir = "uploads/courses/";

    foreach ($_FILES["imgs"]["name"] as $key => $val) {


        $file_name = $val;
        $target_file = $target_dir . $file_name;
        move_uploaded_file($_FILES["imgs"]["tmp_name"][$key], $target_file);
      $insert_img = "insert into courses_images(image,course_id) values('$target_file','$last_inserted_id'";

      if(mysqli_query($con,$insert_img)){
          echo "course added successfully";
          header("refresh:3,url=index.php");
    }
}

}




?>