<?php
session_start();
if (!isset($_SESSION['logged']))
{
    header('Location: index.php');
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
    <title>Unit Calculator</title>
</head>
<style>
    * {
        font-family: sans-serif;
    }

    .container {
        display: flex;
        height: 550px;
        width: 100%;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    form input[type="text"] {
        height: 20px;
        border: none;
        display: block;
        border-bottom: 2px solid crimson;
        font-size: 20px;
        outline: none;
    }

    form input[type="text"]:hover {
        border-bottom: 2px solid green;
    }

    #press2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #press1 {
        width: 175px;
        height: 30px;
        font-size: 20px;
    }

    button {
        width: 250px;
        height: 50px;
        font-size: 20px;
        background-color: crimson;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .main_tittle {
        position: center;
        top: 10px;
        left: 35%;
        width: 100%;
        text-align: center;
    }

    .answer {
        color: green;
        font-size: 30px;
        position: center;
        text-decoration: underline black;
    }

    .footer {
        position: relative;
        left: 550px;
    }

    p {
        height: 30px;
        font-size: 20px;
    }
</style>
<body>
<h1 class="main_tittle"> <?php
    echo "<p>Welcome " . $_SESSION['email'] . '!';
    ?> Calculate your Units</h1>
<a href="menu.php">
    <img src="Back_Arrow.svg.png" alt="HTML tutorial"
         style="width:80px;height:80px; position: absolute;top: 20px;left: 10px">
</a>
<div class="container">
    <form action="" method="post">
        <p>From
            <select name="press1" id="press1">
                <option value="Pascal">Pascal</option>
                <option value="Kilopascal">Kilopascal</option>
                <option value="Megapascal">Megapascal</option>
                <option value="Atmosphere">Atmosphere</option>
                <option value="Bar">Bar</option>
                <option value="Torr">Torr</option>
                <option value="PSI">Pound per square inch</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="press2" id="press2">
                <option value="Pascal">Pascal</option>
                <option value="Kilopascal">Kilopascal</option>
                <option value="Megapascal">Megapascal</option>
                <option value="Hectopascal">Hectopascal</option>
                <option value="Atmosphere">Atmosphere</option>
                <option value="Bar">Bar</option>
                <option value="Torr">Torr</option>
                <option value="PSI">Pound per square inch</option>
            </select>
        </p>
        <br>
        <br>
        <div class="answer">
            <?php
            require_once "connect.php";
            mysqli_report(MYSQLI_REPORT_STRICT);
            $logged_Id = $_SESSION['Id'];
            try {
                 $connect = new PDO('mysql:host=localhost; dbname=calculator', "root", "");
                if (!$connect) {
                    die("Fatal Error: Connection Failed!");
                } else {
                if (isset($_POST['submit'])) {
                    $number = $_POST['num1'];
                    $press1 = $_POST['press1'];
                    $press2 = $_POST['press2'];
                    switch ($press1) {
                        case "Pascal":
                            switch ($press2) {
                                case "Kilopascal":
                                    $result = $number * 0.001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.000001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 0.01;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 0.000009869232;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 0.00001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 0.007500;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 0.000145;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Pascal":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pascal' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Kilopascal":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 1000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 10;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 0.009869232;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 0.01;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 7.500;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 0.145;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilopascal' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Megaoascal":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 1000000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number * 1000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 10000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 9.869232;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 10;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 7500;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 145;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Megapascal' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Hectopascal":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 100;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number * 0.1;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.0001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 0.0009869232;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 0.001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 0.7500;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 0.0145;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hectopascal' , $number , 'Hetopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Atmosphere":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 101325;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number * 101.325;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.101325;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 1013.25;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 1.01325;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 759.999819;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 14.695949;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Atmosphere' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Bar":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 100000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number * 100;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.1;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 1000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 0.986923;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Atrmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 750.061505;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 14.503774;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Bar' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Torr":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 133.3224;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number * 0.1333223684;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.0001333224;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 1.3332236842;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 1133.3224;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 0.001315;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number * 0.068045;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Torr' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "PSI":
                            switch ($press2) {
                                case "Pascal":
                                    $result = $number * 6894.757;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Pascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "Pa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Kilopascal":
                                    $result = $number * 6.8947572932;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Kilopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "kPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Megapascal":
                                    $result = $number * 0.0068947573;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Megapascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "MPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hectopascal":
                                    $result = $number * 68.947572932;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Hectopascal', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "hPa";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Bar":
                                    $result = $number * 0.068947;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Bar', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "bar";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Torr":
                                    $result = $number * 51.714918;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Torr', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "torr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Atmosphere":
                                    $result = $number * 0.068045;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Atmosphere', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "atm";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "PSI":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound per square inch' , $number , 'Pound per square inch', $result , 'pressure')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "psi";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                    }
                }
                }
            }catch (PDOException $exception) {
                echo $exception->getMessage();
                echo '<span style="color:red;">Server error. Sorry for that try later!</span>';
                echo '<br/> Developer information: ' . $exception;
            }
            ?>
        </div>
        <br><br><br>
        <button type="submit" value="submit" name="submit">Calculate</button>
    </form>
</div>
<h4 class="footer">Made by Kuba</h4>
</body>
</html>