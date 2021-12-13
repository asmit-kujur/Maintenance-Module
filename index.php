<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $registration = $_POST['registration'];
    $email = $_POST['email'];
    $complaint = $_POST['complaint'];
    $sql = "INSERT INTO `maintenance`.`complaints` (`name`, `registration`, `email`, `complaint`, `datetime`) VALUES ('$name', '$registration', '$email', '$complaint', current_timestamp());";

    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">Complaint Form</div>
        <form action="index.php" method="POST">
            <div class="details">
                <div class="input-box">
                    <input type="text" name="name" id="name" placeholder="Name" required>
                </div>
                <div class="input-box">
                    <input type="text" name="registration" id="registration" placeholder="Registration Number" required>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="E-mail" required>
                </div>
                <div class="input-box">
                    <textarea name="complaint" id="complaint" cols="50" rows="10" placeholder="Complaint" required></textarea>
                </div>
                <div class="button">
                    <input type="submit" value="Submit">
                </div>
                <?php
                if($insert == true){
                    ?>
                    <script>
                        alert("Complaint submitted successfully.");
                    </script>
                <?php
                }
                ?>
            </div>
        </form>
    </div>
    <nav>
        <a href="login.php">Admin</a>
    </nav>
</body>
</html>
