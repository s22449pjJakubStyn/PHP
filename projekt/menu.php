<?php
session_start();
if (!isset($_SESSION['logged']))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport" content="width=devic-width,
    initial-scale=1.0">
    <title>UnitCalculator</title>
</head>
<style>
    body{
        background-color: gray;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        background-color: white;
        float: left;
        margin-right: 10px;
        display: block;
    }
    h1{
        position: center;
        text-align: center;
        background-color: aqua;
    }
    .unit {
        display: block;
        text-align: left;
        margin: 0;
        float:left;
        font-size:18px;
        width: 80px;
    }
    h2{
        font-size: 18px;
    }
    img{
        display: block;
        float:left;
    }
    /*    .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit{
            text-align: center;
            margin-right: 50%;
        }
        .unit0{
            text-align: center;
            margin-right: 50%;
        }*/
    a {
        color: black;
        display: block;
        float: left;
        height: 120px;
        width: 19%;
        background-color: white;
        margin: 2px;
    }
    /*.rectangle {
        height: 60px;
        width: 19.475%;
        background-color: white;
        float: left;
        margin-right: 10px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
        margin-top: 20px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
        margin-top: 20px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
        margin-top: 20px;
    }
    .rectangle {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
        margin-top: 20px;
    }
    .rectangle0 {
        height: 60px;
        width: 19.475%;
        float: left;
        background-color: white;
        margin-right: 10px;
        margin-top: 20px;
    }*/
    .clear-div
    {
        clear: both;
    }
    #container
    {
        display: inline;
    }
    #logout{
        color: black;
        display: block;
        background-color: white;
        height: 40px;
        width: 100px;
    }
</style>
<body>
<a href="logout.php" id="logout">Wyloguj się!</a>
<br>
<h1 class="main_tittle"> <?php
    echo "<p>Welcome ".$_SESSION['email'].'!';
        ?>  Calculate your Unit </h1>
<div id="container">
    <a href="temperature.php">
        <div class="rectangle">
            <img src="thermometer.png" alt="HTML tutorial" style="width:50px;height:55px; ">
        </div>
        <div class="unit">
            <h2 >Temperature</h2>
        </div>
        <div class="clear"></div>
    </a>
    <a href="mass.php">
        <div class="rectangle">
            <img src="balance.png" alt="HTML tutorial" style="width:50px;height:55px; float: left; ">
        </div>
        <div class="unit">
            <h2 >Mass</h2>
        </div>
    </a>
    <a href="pressure.php">
        <div class="rectangle">
            <img src="pressure-gauge.png" alt="HTML tutorial" style="width:50px;height:55px; float: left; ">
        </div>
        <div class="unit">
            <h2 >Pressure</h2>
        </div>
    </a>
    <a href="time.php">
        <div class="rectangle">
            <img src="clock.png" alt="HTML tutorial" style="width:50px;height:55px; float: left; margin-top: 2px">
        </div>
        <div class="unit">
            <h2 >Time</h2>
        </div>
    </a>
    <a href="length.php">
        <div class="rectangle">
            <img src="length.png" alt="HTML tutorial" style="width:50px;height:55px; float: left; ">
        </div>
        <div class="unit">
            <h2 >Length</h2>
        </div>
    </a>
    <a href="energy.php"  class="clear-div">
        <div class="rectangle">
            <img src="lighting.png" alt="HTML tutorial" style="width:50px;height:55px; float: left; margin-top: 2px">
        </div>
        <div class="unit">
            <h2 >Energy</h2>
        </div>
    </a>
    <a href="volume.php">
        <div class="rectangle">
            <img src="measuring-jug.png" alt="HTML tutorial" style="width:50px;height:55px; float: left;">
        </div>
        <div class="unit">
            <h2 >Volume</h2>
        </div>
    </a>
    <a href="area.php">
        <div class="rectangle">
            <img src="area.png" alt="HTML tutorial" style="width:50px;height:55px; float: left; margin-top: 4px">
        </div>
        <div class="unit">
            <h2 >Area</h2>
        </div>
    </a>
    <a href="speed.php">
        <div class="rectangle">
            <img src="download-speed.png" alt="HTML tutorial" style="width:55px;height:55px; float: left;">

        </div>
        <div class="unit">
            <h2>Speed</h2>
        </div>
    </a>
    <a href="force.php">
        <div class="rectangle0">
            <img src="formula.png" alt="HTML tutorial" style="width:55px;height:55px; float: left;">
        </div>
        <div class="unit">
            <h2>Force</h2>
        </div>
    </a>
</div>
<br/>
<br/>
<br/>
<br/>
<a href="history.php"> Check your calculation history</a>
</body>
</html>