<?php

include "conn.php";

if(isset($_SESSION['admin_name'])){

if (isset(($_GET["std_id"]))) {
    $id = $_GET["std_id"];
    $sql = "delete from students where id ='$id'";
    $run = mysqli_query($con, $sql);
    if ($run) {
        echo "<br> student deleted";
    } else {
        echo "<br> student not deleted " . mysqli_error($con);
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    header("location:register.php");

}

///// 1- create table 

/* $check = mysqli_query($con, "show tables like 'students'");

if (mysqli_num_rows(($check)) == 0) {

    $sql = "create table students (

id integer primary key auto_increment,
name varchar(50) not null,
email varchar(50) unique,
course_id integer,
foreign ke(course_id) references courses(id)
)";

    $run = mysqli_query($con, $sql);
    echo "<br> table created";
}else{
    echo "<br> table is already exist";
} */

///////////////////////////////////////////////////////

// 2 - insert into students

/* $sql ="insert into students(name,email) values('fady','fady@gmail.com'),('shed','shed@gmail.com'),('soshi','soshi@gmail.com')";

$run = mysqli_query($con,$sql);

if($run) {echo "<br> values inserted into students";} */

///////////////////////////////////////////////////////

// 3 - select in html (show data) students
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>

<body>
  <?php  include "header.php"; ?>
    <br><br></br>
    <a href="add_student.php">Add Student</a>
    <?php

    $sql = "select *, students.id as st_id , courses.id as c_id from students join courses on students.course_id=courses.id order by st_id DESC";
    $run = mysqli_query($con, $sql);

    foreach ($run as $row) {

        ?>
        <ul>
            <li> Id : <?php echo $row['st_id'] ?></li>
            <li> Student_Name : <?php echo $row['name'] ?></li>
            <li> Student_Email :<?php echo $row['email'] ?></li>
            <li> Course_Name : <?php echo $row['c_name'] ?></li>
            <li><a href="./add_student.php?std_id=<?php echo $row['st_id']; ?>">update</a></li>
            <li><a href="./index.php?std_id=<?php echo $row['st_id']; ?>">delete</a></li>
        </ul>
        <?php
    }
    ?>

    <a href="./index.php?logout=true">Log Out</a>
</body>

</html>

<?php 

}else{
    header("location:register.php");
}

