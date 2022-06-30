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

    #mass2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #mass1 {
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
            <select name="mass1" id="mass1">
                <option value="Microgram">Micogram</option>
                <option value="Milligram">Milligram</option>
                <option value="Gram">Gram</option>
                <option value="Dekagram">Dekagram</option>
                <option value="Kilogram">Kilogram</option>
                <option value="Ton">Ton</option>
                <option value="Imperial Ton">Imperial Ton</option>
                <option value="US Ton">US Ton</option>
                <option value="Stone">Stone</option>
                <option value="Pound">Pound</option>
                <option value="Ounce">Ounce</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="mass2" id="mass2">
                <option value="Microgram">Micogram</option>
                <option value="Milligram">Milligram</option>
                <option value="Gram">Gram</option>
                <option value="Dekagram">Dekagram</option>
                <option value="Kilogram">Kilogram</option>
                <option value="Ton">Ton</option>
                <option value="Imperial Ton">Imperial Ton</option>
                <option value="US Ton">US Ton</option>
                <option value="Stone">Stone</option>
                <option value="Pound">Pound</option>
                <option value="Ounce">Ounce</option>
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
                        $mass1 = $_POST['mass1'];
                        $mass2 = $_POST['mass2'];
                        switch ($mass1) {
                            case "Microgram":

                                switch ($mass2) {
                                    case "Milligram":
                                        $result=$number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 0.0000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 0.000000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.000000000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.0000000000009842065;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lbl";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result= $number * 0.000000000001102311;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lbl";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.000000000157473;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 0.000000002204622;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 0.00000003527396;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Microgram":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Microgram' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Milligram":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 0.0001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.000000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.0000000009842065;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.000000001102311;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.000000157473;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 0.000002204622;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 0.00003527396;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Milligram' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Gram":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 0.1;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.0000009842065;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.000001102311;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.000157;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 0.002204;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 0.035273;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Gram' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Dekagram":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 10000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 10000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 10;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 0.01;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.00001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.000009842065;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.00001102311;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.00157;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 0.02204;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 0.35273;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Dekagram' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Kilogram":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 1000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 100;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.000984;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.001102;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.157473;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 2.204622;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 35.273961;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilogram' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Ton":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 1000000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 1000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 100000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.984206;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 1.102311;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 157.473044;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 2204.622621;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 35273.961949;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ton' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Imperial Ton":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 1016046908800;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Micogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 1016046908.8;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 1016046.9088;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 101604.69088;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 1016.046908;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 1.016046;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 1.12;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 160;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 2240;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 35840;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial Ton' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "US Ton":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 907184740000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 907184740;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 907184.74;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 90718.474;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 907.18474;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.907184;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.892857;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 142.857142;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 2000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 32000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ton' , $number , 'US Tone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Stone":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 6350293180;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 6350293.18;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 6350.29318;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 635.029318;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 6.350293;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.006350;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.00625;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.007;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 14;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 224;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Stone' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Pound":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 453592370;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 453592.37;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 453.59237;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 45.359237;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 0.453592;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.000453;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.000446;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.0005;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.071428;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number * 16;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Pound' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Ounce":
                                switch ($mass2) {
                                    case "Microgram":
                                        $result=$number * 28349523.125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Microgram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milligram":
                                        $result=$number * 28349.523125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Milligram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Gram":
                                        $result=$number * 28.349523;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Gram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "g";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Dekagram":
                                        $result=$number * 2.8349523;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Dekagram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dag";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilogram":
                                        $result=$number * 0.028349;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Kilogram', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kg";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ton":
                                        $result=$number * 0.00002834952;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "t";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Imperial Ton":
                                        $result=$number * 0.00002790178;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Imperial Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "US Ton":
                                        $result=$number * 0.00003125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'US Ton', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Stone":
                                        $result=$number * 0.004464;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Stone', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "st";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Pound":
                                        $result=$number * 0.0625;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Pound', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "lb av";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Ounce":
                                        $result=$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Ounce' , $number , 'Ounce', $result , 'mass')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "oz av";

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