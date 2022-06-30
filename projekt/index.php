<?php
session_start();

if ((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
{
    header('Location: menu.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" content="width=devic-width,
    initial-scale=1.0">
    <title>Logowanie</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');
        body{
            background: #fff;
            font-family: 'PT Sans', sans-serif;
        }
        h2{
            padding-top: 1.5rem;
        }
        a{
            color: #333;
        }
        a:hover{
            color: #da5767;
            text-decoration: none;
        }
        .card{
            border: 0.40rem solid #f8f9fa;
            top: 10%;
        }
        .form-control{
            background-color: #f8f9fa;
            padding: 25px 15px;
            margin-bottom: 1.3rem;
        }

        .form-control:focus {

            color: #000000;
            background-color: #ffffff;
            border: 3px solid #da5767;
            outline: 0;
            box-shadow: none;

        }

        .btn{
            padding: 0.6rem 1.2rem;
            background: #da5767;
            border: 2px solid #da5767;
        }
        .btn-primary:hover {


            background-color: #df8c96;
            border-color: #df8c96;
            transition: .3s;

        }
    </style>
</head>
<body>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <h2 class="card-title text-center">Login to Unit Calculator</h2>
            <div class="card-body py-md-4">
                <form _lpchecked="1" action="login.php" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Login(email)" name="login">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="log_password">
                    </div>
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <a href="rejestracja.php">Create Account</a>
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
                <?php
                if(isset($_SESSION['error'])) echo $_SESSION['error'];
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<!--Login to use this Unit Calculator <br/> <br/>-->
<!--<a href="rejestracja.php">Register and create new acount!</a>-->
<!--<br /><br />-->
<!--<form action="login.php" method="post">-->
<!--    Login(email): <br/> <input type="email" name="login"/><br/>-->
<!--    Password: <br/> <input type="password" name="log_password"/><br/><br/>-->
<!--    <input type="submit" value="Login"/>-->
<!--</form>-->
<?php
// if(isset($_SESSION['error'])) echo $_SESSION['error'];
//?>
</body>
</html>
