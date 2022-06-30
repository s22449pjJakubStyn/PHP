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
    <title>History of your calculation!</title>
</head>
<body>
<h1><a href="menu.php">
        <img src="Back_Arrow.svg.png" alt="HTML tutorial"
             style="width:80px;height:80px; position: absolute;top: 20px;left: 10px">
    </a></h1>
<br/>
<br/>
<br/>
<br/>
<p>Which one of units do you wanna see? Choose one:</p>
<form action="" method="post">
    <p>Unit
        <select name="unit" id="unit">
            <option value="Temperature" selected>Temperature</option>
            <option value="Mass" selected>Mass</option>
            <option value="Pressure" selected>Pressure</option>
            <option value="Time" selected>Time</option>
            <option value="Length" selected>Length</option>
            <option value="Energy" selected>Energy</option>
            <option value="Volume" selected>Volume</option>
            <option value="Area" selected>Area</option>
            <option value="Speed" selected>Speed</option>
            <option value="Force" selected>Force</option>
        </select>
    </p>
    <br>
    <button type="submit" value="submit" name="submit">Show history</button>
    <br/>
    <br/>
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
    $unit = $_POST['unit'];
    switch ($unit) {
    case "Temperature":

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='temperature' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";
        //$sql1 = "SELECT from_unit, user_number, to_unit, calculated_unit FROM units WHERE unit='temperature' AND user_Id= " . $logged_Id;

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Mass":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='mass' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Pressure":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='pressure' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Time":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='time' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Length":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='length' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Energy":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='energy' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Volume":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='volume' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
    case "Area":
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='area' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

        $sth = $connect->prepare($sql1);
        $sth->execute();
        $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $ids = array();
        ?>
        <table class="table table-striped table-condensed" id="tblData">
            <thead>
            <tr>
                <th>From</th>
                <th>Your Number</th>
                <th>To</th>
                <th>Calculated</th>
            </tr>
            </thead>

            <tbody>
            <?php

            foreach ($result_data as $data) {
                echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        break;
        case "Speed":
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='speed' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

            $sth = $connect->prepare($sql1);
            $sth->execute();
            $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $ids = array();
            ?>
            <table class="table table-striped table-condensed" id="tblData">
                <thead>
                <tr>
                    <th>From</th>
                    <th>Your Number</th>
                    <th>To</th>
                    <th>Calculated</th>
                </tr>
                </thead>

                <tbody>
                <?php

                foreach ($result_data as $data) {
                    echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
                }
                ?>
                </tbody>
            </table>
            <?php
            break;
        case "Force":
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1= "SELECT from_unit, user_number, to_unit, calculated_unit FROM (SELECT * FROM units WHERE unit='force' AND user_Id= $logged_Id ORDER BY Id DESC LIMIT 30 ) Var1 ORDER BY Id ASC";

            $sth = $connect->prepare($sql1);
            $sth->execute();
            $result_data = $sth->fetchAll(PDO::FETCH_ASSOC);
            $ids = array();
            ?>
            <table class="table table-striped table-condensed" id="tblData">
                <thead>
                <tr>
                    <th>From</th>
                    <th>Your Number</th>
                    <th>To</th>
                    <th>Calculated</th>
                </tr>
                </thead>

                <tbody>
                <?php

                foreach ($result_data as $data) {
                    echo "<tr><td>" . $data['from_unit'] . "</td>
                          <td>" . $data['user_number'] . "</td>
                          <td>" . $data['to_unit'] . "</td>
                          <td>" . $data['calculated_unit'] . "</td>
                       </tr>";
                }
                ?>
                </tbody>
            </table>
            <?php
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


</form>
</body>
</html>
