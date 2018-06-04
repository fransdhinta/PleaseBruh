<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login Pages</title>
</head>

<body style="background-color:#2d2d2d">
<div class="container">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <div class="jumbotron" style="margin-top:150px">
            <h3>Form Login</h3><br>
                <?php if (isset($_SESSION['success'])) {?>
                    <div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
                <?php } ?>
                <?php echo validation_errors('<div class="alert alert-danger">','</div>');?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Username:</label> <br>
                    <input type="text" class="form-control" name="username">  
                </div>
                
                <div class="form-group">
                    <label for="">Password:</label> <br>
                    <input type="password" class="form-control" name="password"> <br>                   
                </div>


                <button type="submit" id="submit" class="btn-primary form-control" name="submit" value="submit">Login</button> You're not registered? register <a href="<?php echo site_url('guest/register')?>">here</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>