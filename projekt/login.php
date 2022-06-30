<?php

session_start();

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try {
    $connect = new PDO('mysql:host=localhost; dbname=calculator', "root", "");
    if (!$connect) {
        die("Fatal Error: Connection Failed!");
    } else {
        $login = $_POST['login'];
        $password = $_POST['log_password'];

        $sql1 = $sql = "SELECT * FROM users WHERE email=? ";
        $result = $connect->prepare($sql1);
        if (isset($login)) {
            $row = $result->execute(array($login));
            $how_many_users = $result->rowCount();
            $fetch = $result->fetch();
            if ($how_many_users > 0) {
//                if(password_verify($password, $fetch['password'])){

                   if($password == $fetch['password']){
                    $_SESSION['logged'] = true;
                    $_SESSION['Id'] = $fetch['Id'];
                    $_SESSION['email'] = $fetch['email'];
                    unset($_SESSION['error']);
                    $result->closeCursor();
                    header('Location: menu.php');
                }
                else{
                    $_SESSION['error'] = '<span style="color:red">Your login or password is incorrect</span>';
                    header('Location: index.php');
                }
            } else {
                $_SESSION['error'] = '<span style="color:red">Your login or password is incorrect</span>';
                header('Location: index.php');
            }
        }
    }

}
catch (PDOException $exception){
    echo $exception->getMessage();
    echo '<span style="color:red;">Server error. Sorry for that try later!</span>';
    echo '<br/> Developer information: '.$exception;
}
?>