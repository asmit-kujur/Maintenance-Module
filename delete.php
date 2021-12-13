<?php
    session_start();
    include "connection.php";
    $id = $_GET['page'];
    $deletequery = "delete from complaints where serial=$id";
    $query = mysqli_query($conn, $deletequery);

    header('location:dashboard.php');
?>