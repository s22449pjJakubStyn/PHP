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

    #time2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #time1 {
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
            <select name="time1" id="time1">
                <option value="Second">Second</option>
                <option value="Minute">Minute</option>
                <option value="Hour">Hour</option>
                <option value="Day">Day</option>
                <option value="Week">Week</option>
                <option value="Month">Month</option>
                <option value="Year">Year</option>
                <option value="Decade">Decade</option>
                <option value="Century">Century</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="time2" id="time2">
                <option value="Second">Second</option>
                <option value="Minute">Minute</option>
                <option value="Hour">Hour</option>
                <option value="Day">Day</option>
                <option value="Week">Week</option>
                <option value="Month">Month</option>
                <option value="Year">Year</option>
                <option value="Decade">Decade</option>
                <option value="Century">Century</option>
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
                    $time1 = $_POST['time1'];
                    $time2 = $_POST['time2'];
                    switch ($time1) {
                        case "Second":
                            switch ($time2) {
                                case "Minute":
                                    $result = $number * 0.016666;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 0.000277;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 0.00001157407;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 0.000001653439;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 0.0000003805175;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 0.00000003170979;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.000000003170979;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.0000000003170979;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Second":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Second' , $number , 'Seecond', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Minute":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 60;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Seecond', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 0.016666;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 0.000694;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 0.00009920634;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 0.00002283105;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 0.000001902587;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.0000001902587;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.00000001902587;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Minute' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Hour":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 3600;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Second', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 60;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 0.041666;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 0.005952;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 0.001369;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 0.000114;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.00001141552;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.000001141552;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Hour' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Day":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 86400;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Seconds', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 1440;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 24;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 0.142857;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 0.032876;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 0.002739;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.000273;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.00002739726;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Day' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Week":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 604800;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Seconds', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 10080;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 168;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 7;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 0.230136;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 0.019178;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.001917;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.000191;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Week' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Month":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 2628000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Second', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 43800;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 730;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 30.416666;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 4.345238;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 0.083333;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.008333;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.000833;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Month' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Year":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 31536000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Second', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 525600;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 8760;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 365.2425;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 52.142857;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 12;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number * 0.1;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.001;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Year' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Decade":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 315360000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Second', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 5256000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 87600;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 3650;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 521.428571;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 120;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result = $number * 10;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result = $number * 0.1;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result = $number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Decade' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                            }
                            break;
                        case "Century":
                            switch ($time2) {
                                case "Second":
                                    $result = $number * 3153600000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Second', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "s";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Minute":
                                    $result = $number * 52560000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Minute', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "min";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Hour":
                                    $result = $number * 876000;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Hour', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "h";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Day":
                                    $result = $number * 36500;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Day', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "d";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Week":
                                    $result = $number * 5214.285714;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Week', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "wk";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Month":
                                    $result = $number * 1200;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Month', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "mo";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Year":
                                    $result =$number * 100;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Year', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "yr";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Decade":
                                    $result =$number * 10;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Decade', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "dec";

                                    } else {
                                        $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                        throw $current_error_mode;
                                    }
                                    break;
                                case "Century":
                                    $result =$number;
                                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Century' , $number , 'Century', $result , 'time')";
//
                                    if ($connect->exec($sql1)) {
                                        echo $result . "c";

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