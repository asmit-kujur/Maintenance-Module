<?php
session_start();
include "connection.php";
$selectquery = " select * from complaints order by serial desc";
$query = mysqli_query($conn, $selectquery);
$totalcomp = mysqli_num_rows($query);

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="user">Logged in as: <?php echo $_SESSION['name']; ?></h1>
    <h3>Number of complaints: <?php echo $totalcomp; ?></h3>
    <!--<div class="container">
        <div class="center">-->
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Name</th>
                            <th>Registration Number</th>
                            <th>E-mail</th>
                            <th>Time</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                                                                                  
                            while ($res = mysqli_fetch_array($query)) {
                            ?>    
                                <tr>
                                    <td><?php echo $res['serial']  ?></td>
                                    <td><?php echo $res['name']  ?></td>
                                    <td><?php echo $res['registration']  ?></td>
                                    <td><?php echo $res['email']  ?></td>
                                    <td><?php echo $res['datetime']  ?></td>
                                    <td><span class="buttonstyle"><a href="view.php?page=<?php echo $res['serial']; ?>">View</a></span></td>
                                    <td><span class="buttonstyle"><a href="delete.php?page=<?php echo $res['serial'] ?>">Delete</a></span></td>
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        <!--</div>
    </div>-->
    <nav>
    <a href="logout.php">Logout</a>
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