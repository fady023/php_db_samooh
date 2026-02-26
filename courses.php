<?php
include "conn.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>courses</title>
</head>

<body>
    <table border=1 width="50%">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Description</th>
                <th>images</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $courses = mysqli_query($con, "select * from courses ");
            foreach ($courses as $course): 

                
                ?>
                <tr>
                    <td><?=  $course['id'] ?></td>
                    <td><?=  $course['c_name'] ?></td>
                    <td><?=  $course['description'] ?></td>
                    <td>
                        <?php $sql = mysqli_query($con,"select * from courses_images where course_id=$course[id]");
                        foreach($sql as $row):
                        ?>
                        <img src="<?= $row['image'] ?>" width="70px">
                        <?php endforeach; ?>
                </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php include "footer.php"; ?>
</body>

</html>