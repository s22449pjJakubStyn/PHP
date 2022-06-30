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

    #speed2 {
        width: 200px;
        height: 30px;
        font-size: 20px;
    }

    #speed1 {
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
            <select name="speed1" id="speed1">
                <option value="MS">Meter per second</option>
                <option value="KH">Kilometer per hour</option>
                <option value="FS">Foot per second</option>
                <option value="MH">Miles per hour</option>
                <option value="Knot">Knot</option>
            </select>
        </p>
        <br>
        <input type="text" name="num1" placeholder="Enter Your Number">
        <br>
        <br>
        <p>To
            <select name="speed2" id="speed2">
                <option value="MS">Meter per second</option>
                <option value="KH">Kilometer per hour/option>
                <option value="FS">Foot per second</option>
                <option value="MH">Miles per hour</option>
                <option value="Knot">Knot</option>
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
                        $speed1 = $_POST['speed1'];
                        $speed2 = $_POST['speed2'];
                        switch ($speed1) {
                            case "MS":
                                switch ($speed2) {
                                    case "KH":
                                        $result = $number * 3.6;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Meter per second' , $number , 'Kilometer per hour', $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km/h";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FS":
                                        $result = $number * 3.280839;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Meter per second' , $number , 'Foot per second', $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fps";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "MH":
                                        $result = $number * 2.236936;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Meter per second' , $number , 'Miles per hour', $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mph";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Knot":
                                        $result = $number * 1.943844;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Meter per second' , $number , 'Knot' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kn";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "MS":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Meter per second' , $number , 'Meter per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m/s";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "KH":
                                switch ($speed2) {
                                    case "MS":
                                        $result = $number * 0.277777;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometer per hour' , $number , 'Meter per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m/s";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FS":
                                        $result = $number * 0.911344;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometer per hour' , $number , 'Foot per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fps";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "MH":
                                        $result = $number * 0.621371;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometer per hour' , $number , 'Miles per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mph";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Knot":
                                        $result = $number * 0.539956;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometer per hour' , $number , 'Knot' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kn";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "KH":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Kilometer per hour' , $number , 'Kilometer per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km/h";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "FS":
                                switch ($speed2) {
                                    case "MS":
                                        $result = $number * 0.3048;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot per second' , $number , 'Meter per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m/s";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "KH":
                                        $result = $number * 0.911344;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot per second' , $number , 'Kilometer per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km/h";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "MH":
                                        $result = $number * 0.681818;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot per second' , $number , 'Miles per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mph";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Knot":
                                        $result = $number * 0.592483;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot per second' , $number , 'Knot' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kn";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FS":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Foot per second' , $number , 'Foot per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fps";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "MH":
                                switch ($speed2) {
                                    case "MS":
                                        $result = $number * 0.44704;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Miles per hour' , $number , 'Meter per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m/s";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "KH":
                                        $result = $number * 1.609344;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Miles per hour' , $number , 'Kilometer per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km/h";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FS":
                                        $result = $number * 1.466666;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Miles per hour' , $number , 'Foot per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fps";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Knot":
                                        $result = $number * 0.868976;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Miles per hour' , $number , 'Knot' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kn";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "MH":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Miles per hour' , $number , 'Miles per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mph";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                }
                                break;
                            case "Knot":
                                switch ($speed2) {
                                    case "MS":
                                        $result = $number * 0.514444;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Knot' , $number , 'Meter per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "m/s";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "KH":
                                        $result = $number * 1.852;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Knot' , $number , 'Kilometer per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "km/h";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "FS":
                                        $result = $number * 1.687809;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Knot' , $number , 'Foot per second' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "fps";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "MH":
                                        $result = $number * 1.150779;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Knot' , $number , 'Miles per hour' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "mph";

                                        } else {
                                            $current_error_mode = $connect->getAttribute(PDO::ATTR_ERRMODE);
                                            throw $current_error_mode;
                                        }
                                        break;
                                    case "Knot":
                                        $result = $number;
                                        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                        $sql1 = "INSERT INTO units (user_Id , from_unit , user_number , to_unit , calculated_unit , unit) VALUES($logged_Id , 'Knot' , $number , 'Knot' , $result , 'speed')";
//
                                        if ($connect->exec($sql1)) {
                                            echo $result . "kn";

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