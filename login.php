<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">Login</div>
        <form action="validation.php" method="POST">
            <div class="details">
                <?php if (isset($_GET['error'])){ ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>

                <?php } ?>
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-box"><input type="password" name="password" id="password" placeholder="Password" required>
                </div>                
                <div class="button">
                    <input type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>
    <nav>
    <a href="index.php">Back</a>
    </nav>
</body>
</html>