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

    #volume2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #volume1 {
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
            <select name="volume1" id="volume1">
                <option value="Millilitre">Millilitre</option>
                <option value="Litre">Litre</option>
                <option value="CM">Cubic metre</option>
                <option value="CC">Cubic centimetre</option>
                <option value="CD">Cubic decimetre</option>
                <option value="CF">Cubic foot</option>
                <option value="USG">US Gallon</option>
                <option value="UST">US Tablespoon</option>
                <option value="USTe">US Teaspoon</option>
                <option value="USO">US Ounce</option>
                <option value="IQ">Imperial Quart</option>
                <option value="IT">Imperial Tablespoon</option>
                <option value="IP">Imperial Pint</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="volume2" id="volume2">
                <option value="Millilitre">Millilitre</option>
                <option value="Litre">Litre</option>
                <option value="CM">Cubic metre</option>
                <option value="CC">Cubic centimetre</option>
                <option value="CD">Cubic decimetre</option>
                <option value="CF">Cubic foot</option>
                <option value="USG">US Gallon</option>
                <option value="UST">US Tablespoon</option>
                <option value="USTe">US Teaspoon</option>
                <option value="USO">US Ounce</option>
                <option value="IQ">Imperial Quart</option>
                <option value="IT">Imperial Tablespoon</option>
                <option value="IP">Imperial Pint</option>
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
                        $volume1 = $_POST['volume1'];
                        $volume2 = $_POST['volume2'];
                        switch ($volume1) {
                            case "Millilitre":
                                switch ($volume2) {
                                    case "Litre":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Litre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Cubic meter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number * 1;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Cubic centimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Cubic decimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number * 0.00003531466;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Cubic foot', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result = $number * 0.000264;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'US Gallon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result = $number * 0.066666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'US Tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result = $number * 0.2;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'US Teaspoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result = $number * 0.033333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'US Ounce', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result = $number * 0.000879;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Imperial Ounce', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result = $number * 0.056312;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Imperial Tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result = $number * 0.001759;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Imperial Pint', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Milliliter":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millilitre' , $number , 'Millilitre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Litre":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Millilitre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Cubic meter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Cubic centimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number * 1;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Cubic decimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number * 0.035314;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Cubic foot', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result = $number * 0.264172;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'US Gallon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result = $number * 66.666666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'US Tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result = $number * 200;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'US Teaspoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result = $number * 33.333333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'US Ounce', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result = $number * 0.879876;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Imperial quart', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result = $number * 56.312127;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Imperial tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result = $number * 1.759753;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Imperial pint', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Litre' , $number , 'Litre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "CM":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result = $number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Millilitre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Litre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Cubic centimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Cubic decimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number * 35.314666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Cubic foot', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result = $number * 264.172052;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'US Gallon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result = $number * 66666.666666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'US Tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result = $number * 200000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'US Teaspoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result = $number * 33333.333333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'US Ounce', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result = $number * 879.876993;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Imperial quart', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result = $number * 56312.127564;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Imperial tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result = $number * 1759.753986;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Imperial pint', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic meter' , $number , 'Cubic meter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "CC":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result = $number * 1;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Millilitre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Litre', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Cubic meter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Cubic decimeter', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number * 0.00003531466;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Cubic foot', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result = $number * 0.000264;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'US Gallon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result = $number * 0.066666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'US Tablespoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result = $number * 0.2;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'US Teaspoon', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result = $number * 0.033333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'US Ounce', $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result = $number * 0.000879;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result = $number * 0.056312;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result = $number * 0.001759;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic centimeter' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "CD":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result = $number * 1;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number * 0.03531466;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result = $number * 0.264;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result = $number * 66.666666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result = $number * 200;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result = $number * 33.333333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result = $number * 0.879;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result = $number * 56.312;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result = $number * 1.759;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic decimeter' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "CF":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result = $number * 28316.846592;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result = $number * 28.316846;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number * 0.028316;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number * 28316.846592;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number * 28.316846592;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result = $number * 7.480519;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result = $number * 1887.789772;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result = $number * 5663.369318;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result = $number * 943.894886;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result = $number * 24.915341;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result = $number * 1594.581877;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result = $number * 49.830683;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Cubic foot' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "USG":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result = $number * 3785.411784;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result = $number * 3.785411;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result = $number * 0.003785;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result = $number * 3785.411784;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result = $number * 3.785411784;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result = $number * 0.133680;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number * 252.360785;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result =$number * 757.082356;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number * 126.180392;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number * 3.330696;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number * 213.164591;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number * 6.661393;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Gallon' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "UST":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result =$number * 15;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result =$number * 0.015;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result =$number * 0.000015;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result =$number * 15;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result =$number * 0.015;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result =$number * 0.000529;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number * 0.0039625;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result =$number * 3;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number * 0.5;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number * 0.013198;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number * 0.844681;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number * 0.026396;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Tablespoon' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "USTe":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result =$number * 5;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result =$number * 0.005;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result =$number * 0.000005;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result =$number * 5;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result =$number * 0.005 ;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result =$number * 0.000176;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number * 0.001320;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number * 0.333333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number * 0.166666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number * 0.004399;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number * 0.281560;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number * 0.008798;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Teaspoon' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "USO":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result =$number * 30;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result =$number * 0.03;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result =$number * 0.00003;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result =$number * 30;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result =$number * 0.03;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result =$number * 0.001059;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number * 0.007925;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number * 2;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result =$number * 6;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number * 0.026396;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number * 1.689363;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number * 0.052792;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'US Ounce' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "IQ":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result =$number * 1136.5225;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result =$number * 1.136522;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result =$number * 0.001136;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result =$number * 1136.5225;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result =$number * 1.1365225;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result =$number * 0.040135;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Cubic foot; , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number * 0.300237;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number * 75.768166;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result =$number * 227.3045;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number * 37.884083;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number * 64;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number * 2;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial quart' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "IT":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result =$number * 17.758164;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result =$number * 0.017758;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result =$number * 0.00001775816;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result =$number * 17.758164;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result =$number * 0.017758164;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result =$number * 0.000627;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number * 0.004691;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number * 1.183877;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USTe":
                                        $result =$number * 3.551632;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number * 0.591938;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number * 0.015625;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number * 0.03125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial tablespoon' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "IP":
                                switch ($volume2) {
                                    case "Millilitre":
                                        $result =$number * 568.26125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Millilitre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mL";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Litre":
                                        $result =$number * 0.568261;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Litre' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "L";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CM":
                                        $result =$number * 0.000568;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Cubic meter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CC":
                                        $result =$number * 568.26125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Cubic centimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CD":
                                        $result =$number * 0.56826125;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Cubic decimeter' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "dcm3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "CF":
                                        $result =$number * 0.020067;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Cubic foot' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft3";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USG":
                                        $result =$number * 0.150118;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'US Gallon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "gal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "UST":
                                        $result =$number * 37.884083;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'US Tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                       break;
                                    case "USTe":
                                        $result =$number * 113.65225;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'US Teaspoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "USO":
                                        $result =$number * 18.942041;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'US Ounce' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fl oz";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IQ":
                                        $result =$number * 0.5;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Imperial quart' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "qt";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IT":
                                        $result =$number * 32;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Imperial tablespoon' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "tbsp";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "IP":
                                        $result =$number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Imperial pint' , $number , 'Imperial pint' , $result , 'volume')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "pt";

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