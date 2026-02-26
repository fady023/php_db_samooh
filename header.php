<?php  echo "<h2> welcome ".$_SESSION['admin_name']."</h2>";
 ?>

<div >

<form action="index.php" method="post">
    <input type="text" name="search" placeholder="Search students...">
    <button type="submit" name="btn_search" > Search </button>
</form>

</div>

<a href="index.php">Home</a>