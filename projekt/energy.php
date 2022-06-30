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

    #energy2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #energy1 {
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
            <select name="energy1" id="energy1">
                <option value="Joule">Joule</option>
                <option value="Kilojoule">Kilojoule</option>
                <option value="Calorie">Calorie</option>
                <option value="Kilocalorie">Kilocalorie</option>
                <option value="Wh">Watt hour</option>
                <option value="Kh">Kilowatt hour</option>
                <option value="BTU">British Thermal Unit</option>
                <option value="FPF">Foot-pound Force</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="energy2" id="energy2">
                <option value="Joule">Joule</option>
                <option value="Kilojoule">Kilojoule</option>
                <option value="Calorie">Calorie</option>
                <option value="Kilocalorie">Kilocalorie</option>
                <option value="Wh">Watt hour</option>
                <option value="Kh">Kilowatt hour</option>
                <option value="BTU">British Thermal Unit</option>
                <option value="FPF">Foot-pound Force</option>
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
                        $energy1 = $_POST['energy1'];
                        $energy2 = $_POST['energy2'];
                        switch ($energy1) {
                            case "Joule":
                                switch ($energy2) {
                                    case "Kilojoule":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Kilojoule', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 0.2390057361;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Calorie', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 0.000238;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Kilocalorie', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 0.000277;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Watt hour', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.0000002777777;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Kilowatt hour', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 0.000947;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'British thermal unit', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 0.737562;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Foot-pound force', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Joule":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Joule' , $number , 'Joule', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Kilojoule":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Joule', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 239.00573614;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Calorie', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 0.0000002388458;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Kilocalorie', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 0.0000002777777;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Watt hour', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.0000000002777777;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Kilowatt hour', $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 0.0000009478171;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 0.000737;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilojoule' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Calorie":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 4.184;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Joule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number * 0.004184;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Kilocalorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 0.0011622222;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Watt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.0000011622;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Killowatt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 0.0039683217;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 3.0859600327;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Calorie' , $number , 'Calorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Kilocalorie":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 4186.8;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Joule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number * 4186800;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Calorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 1.163;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Watt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.001163;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Kilowatt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 3.968320;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 3088.025206;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilocalorie' , $number , 'Kilocalorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Wh":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 3600;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'Joule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number * 3600000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 860.4206501;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'Calorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 0.859845;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'KiloCalorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.001;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'Kilowatt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 3.412141;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 2655.223737;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Watt hour' , $number , 'Watt Hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Kh":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 3600000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Joule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number * 3600000000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 860420.6501;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Calorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 859.845227;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Kilocalorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 1000;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Watt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 3412.141633;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 2655223.737398;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilowatt hour' , $number , 'Kilowatt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "BTU":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 1055.055852;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Joule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number * 1055055.85262;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 251.99569789;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Calorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 0.251995;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Kilocalorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 0.293071;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Watt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.000293;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Kilowatt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number * 778.169262;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'British thermal unit' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "FPF":
                                switch ($energy2) {
                                    case "Joule":
                                        $result = $number * 1.355817;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Joule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "J";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilojoule":
                                        $result = $number * 1355.817948;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Kilojoule' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kJ";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Calorie":
                                        $result = $number * 0.3240482668;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Calorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "cal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kilocalorie":
                                        $result = $number * 0.000323;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Kilocalorie' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kcal";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Wh":
                                        $result = $number * 0.000376;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Watt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "Wh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Kh":
                                        $result = $number * 0.000000376616;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Kilowatt hour' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kWh";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "BTU":
                                        $result = $number * 0.001285;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'British thermal unit' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "BTU";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FPF":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot-pound force' , $number , 'Foot-pound force' , $result , 'energy')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "ft lbf";

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