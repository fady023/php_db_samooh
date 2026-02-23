<?php

$server_nm="localhost";
$username = "root";
$pass="";
$db_nm="samooh";

$con= mysqli_connect($server_nm,$username,$pass,$db_nm);

if(!$con){
    die("connection failed".mysqli_connect_error());
}else{
    // echo "connection successful";
}

$errors = array();

session_start();
