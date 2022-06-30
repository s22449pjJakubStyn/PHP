<?php
    session_start();

    if(isset($_POST['reg_email'])){
        //Udana walidacja
        $is_OK=true;

        $email=$_POST['reg_email'];

        if(strlen($email)<5 || (strlen($email)>45)){
            $is_OK=false;
            $_SESSION['e_email']="Email has to have between 5 and 45 chars!";
        }

        $password=$_POST['reg_password'];
        $repeat_password=$_POST['reg_repeat'];

        if((strlen($password)<8) || (strlen($password)>45)) {
            $is_OK = false;
            $_SESSION['e_password'] = "Password has to have between 8 and 45 chars!";
        }

        if($password!=$repeat_password){
            $is_OK = false;
            $_SESSION['e_password'] = "Passwords have to be the same!";
        }

//      $password_hash=password_hash($password, PASSWORD_DEFAULT);

        if(!isset($_POST['regulamin'])){
            $is_OK = false;
            $_SESSION['e_regulamin'] = "Accept the regulamin, please!";
        }
        $secret ="6Ld7MnIgAAAAAFBPxzZpe9_5RhwZLfuxRif-7rYU";

        $check=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

        $answer=json_decode($check);

//        if($answer->success == false){
//           $is_OK = false;
//          $_SESSION['e_bot'] = "You have to verify that you aren't bot!";
//       }

        $name=$_POST['reg_name'];
        $surname=$_POST['reg_surname'];

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connect = new PDO('mysql:host=localhost; dbname=calculator', "root", "");
            if (!$connect) {
                die("Fatal Error: Connection Failed!");
            }
            else{
                $sql1="SELECT Id FROM users WHERE email='$email'";
                $result=$connect-> query($sql1);
                if(!$result) throw new Exception($connect->error);

                $how_many=$result->rowCount();
                if($how_many>0){
                    $is_OK = false;
                    $_SESSION['e_email'] = "An account with this email already exists!";
                }
                if($is_OK==true){
                    //dodaj do bazy
                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql2="INSERT INTO users VALUES ('', '$email', '$password','$name', '$surname')";

                    if($connect->exec($sql2)){
                        $_SESSION['register_ended']=true;
                        header('Location: menu.php');
                    }
                    else{
                        throw new Exception($connect->error);
                    }
                }
            }
        }
        catch (PDOException $exception){
            echo $exception->getMessage();
            echo '<span style="color:red;">Server error. Sorry for that try later!</span>';
            echo '<br/> Developer information: '.$exception;
        }
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
    <title>Registration</title>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6Ld7MnIgAAAAAFBPxzZpe9_5RhwZLfuxRif-7rYU"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');
        .error{
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }


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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h2 class="card-title text-center">Register to Unit Calculator</h2>
                <div class="card-body py-md-4">
                    <form _lpchecked="1" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="reg_name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="surname" placeholder="Surname" name="reg_surname">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="reg_email">
                        </div>
                        <?php
                        if(isset($_SESSION['e_email'])){
                            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                            unset($_SESSION['e_email']);
                        }
                        ?>

                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="reg_password">
                        </div>
                        <?php
                        if(isset($_SESSION['e_password'])){
                            echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                            unset($_SESSION['e_password']);
                        }
                        ?>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm-password" placeholder="confirm-password" name="reg_repeat">
                        </div>
                        <div class="form-group">
                        <label>
                            <input type="checkbox" class="form-control" name="regulamin"/>I'm accept regulamin of this website
                        </label>
                        </div>
                        <?php
                        if(isset($_SESSION['e_regulamin'])){
                            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                            unset($_SESSION['e_regulamin']);
                        }
                        ?>
                        <div class="g-recaptcha" data-sitekey="6Lf6HHMgAAAAAI9aAVpzmAhheHhPxHt3EgPAZhbI"></div>
                        <?php
                        if(isset($_SESSION['e_bot'])){
                            echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                            unset($_SESSION['e_bot']);
                        }
                        ?>
                        <br/>
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <a href="index.php">Login</a>
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<form method="post">-->
<!--    E-mail: <br/><input type="email" name="reg_email"/><br/>-->
<!--    --><?php
//        if(isset($_SESSION['e_email'])){
//            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
//            unset($_SESSION['e_email']);
//        }
//    ?>
<!--    Password: <br/><input type="password" name="reg_password"/><br/>-->
<!--    --><?php
//    if(isset($_SESSION['e_password'])){
//        echo '<div class="error">'.$_SESSION['e_password'].'</div>';
//        unset($_SESSION['e_password']);
//    }
//    ?>
<!--    Repeat password: <br/><input type="password" name="reg_repeat"/><br/>-->
<!--    Name: <br/><input type="text" name="reg_name"/><br/>-->
<!--    Surname: <br/><input type="text" name="reg_surname"/><br/>-->
<!--    <label>-->
<!--        <input type="checkbox" name="regulamin"/>I'm accept regulamin of this website-->
<!--    </label>-->
<!--    --><?php
//    if(isset($_SESSION['e_regulamin'])){
//        echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
//        unset($_SESSION['e_regulamin']);
//    }
//    ?>
<!--    <div class="g-recaptcha" data-sitekey="6Lf6HHMgAAAAAI9aAVpzmAhheHhPxHt3EgPAZhbI"></div>-->
<!--    --><?php
//    if(isset($_SESSION['e_bot'])){
//        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
//        unset($_SESSION['e_bot']);
//    }
//    ?>
<!--    <br/>-->
<!--    <input type="submit" value="Register!">-->
<!--</form>-->
</body>
</html>

