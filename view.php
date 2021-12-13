<?php
session_start();
include "connection.php";

$id = $_GET['page'];
$comp = " select * from complaints where serial=$id ";
$viewquery = mysqli_query($conn, $comp);
$result = mysqli_fetch_array($viewquery);

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="compdetails">
            <p>Serial Number: <?php echo $result['serial']; ?></p>
            <p>Name: <?php echo $result['name']; ?></p>
            <p>Registration Number: <?php echo $result['registration']; ?></p>
            <p>E-mail: <?php echo $result['email']; ?></p>
            <p>Time: <?php echo $result['datetime']; ?></p>
        </div>
        <br>
        <p>Complaint: <?php echo $result['complaint']; ?></p>
    </div>
    <nav>
    <a href="dashboard.php">Back</a>
    </nav>
</body>
</html>

<?php
}
else {
    header("Location: index.php");
    exit();
}
?>