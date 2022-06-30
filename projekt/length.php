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

    #length2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #length1 {
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
            <select name="length1" id="length1">
                <option value="Micrometre">Micrometre</option>
                <option value="Millimetre">Millimetre</option>
                <option value="Centimetre">Centimetre</option>
                <option value="Metre">Metre</option>
                <option value="Kilometre">Kilometre</option>
                <option value="Mile">Mile</option>
                <option value="Yard">Yard</option>
                <option value="Foot">Foot</option>
                <option value="Inch">Inch</option>
                <option value="NM">Nautical Mile</option>
                <option value="LY">Light Year</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="length2" id="length2">
                <option value="Micrometre">Micrometre</option>
                <option value="Millimetre">Millimetre</option>
                <option value="Centimetre">Centimetre</option>
                <option value="Metre">Metre</option>
                <option value="Kilometre">Kilometre</option>
                <option value="Mile">Mile</option>
                <option value="Yard">Yard</option>
                <option value="Foot">Foot</option>
                <option value="Inch">Inch</option>
                <option value="NM">Nautical Mile</option>
                <option value="LY">Light Year</option>
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
                        $length1 = $_POST['length1'];
                        $length2 = $_POST['length2'];
                        switch ($length1) {
                            case "Micrometre":
                                switch ($length2) {
                                    case "Millimetre":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 0.0001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.000000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.0000000006213711;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 0.000001093613;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 0.000003280839;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 0.00003937007;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.0000000005399568;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.0000000000000000000001057004;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Micrometre":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Micrometre' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Millimetre":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 0.1;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.000001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.0000006213711;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 0.001093;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 0.003280;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 0.039370;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.0000005399568;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.0000000000000000001057004;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Millimetre' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Centimetre":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 10000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 10;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 0.01;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.00001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.000006213711;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 0.010936;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 0.032808;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 0.393700;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.000005399568;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.000000000000000001057004;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Centimetre' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Metre":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 100;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.000621;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 1.093613;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 3.280839;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 39.370078;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.000539;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.0000000000000001057004;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Metre' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Kilometre":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 1000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 1000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 100000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.621371;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 1093.613298;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 3280.839895;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 39370.078740;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.539956;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.0000000000001057004;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometre' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Mile":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 1609344000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 1609344;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 160934.4;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 1609.344;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 1.609344;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 1760;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 5280;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 63360;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.868976;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.0000000000001701083;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Mile' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Yard":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 914400;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 914.4;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 91.44;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 0.9144;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.000914;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.000568;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 3;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 36;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.000493;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.00000000000000009665246;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Yard' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Foot":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 304800;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 304.8;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 30.48;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 0.3048;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.000304;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.000189;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 0.333333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 12;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.000164;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.00000000000000003221748;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Inch":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 25400;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 25.4;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 2.54;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 0.0254;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 0.0000254;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 0.00001578282;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 0.027777;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 0.083333;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Foot', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 0.0000137149;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Nautical Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.00000000000000000268479;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Light Year', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Inch' , $number , 'Inch', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "NM":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 1852000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Micrometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 1852000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Millimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 185200;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Centimetre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 1852;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Metre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 1.852;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Kilometre', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 1.150779;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Mile', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 2025.371828;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Yard', $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 6076.115485;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Foot' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 72913.385826;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Inch' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number * 0.0000000000001957571;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Light Year' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Nautical Mile' , $number , 'Nautical Mile' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "LY":
                                switch ($length2) {
                                    case "Micrometre":
                                        $result = $number * 9460700000000000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Micrometre' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "µm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Millimetre":
                                        $result = $number * 9460700000000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Millimetre' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Centimetre":
                                        $result = $number * 946070000000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Centimetre' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cm";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Metre":
                                        $result = $number * 9460700000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Metre' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilometre":
                                        $result = $number * 9460700000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Kilometre' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Mile":
                                        $result = $number * 5878606438399.7;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Mile' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Yard":
                                        $result = $number * 10346340000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Yard' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "yd";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Foot":
                                        $result = $number * 31039040000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Foot' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Inch":
                                        $result = $number * 372468500000000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Inch' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "in";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "NM":
                                        $result = $number * 5108369330453.6;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Nautical Mile' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "nmi";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "LY":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Light Year' , $number , 'Light Year' , $result , 'length')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ly";

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
            } catch (PDOException $exception) {
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