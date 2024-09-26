<?php
$serverName = "localhost";
$username = "yemsef";
$password = "Yemirano123$";
$dbname = "Yemsef_Luxury";
$conn =  mysqli_connect($serverName,$username,$password,$dbname);

if (!$conn){
    die ("connection failed:" . mysqli_connect_error());
};