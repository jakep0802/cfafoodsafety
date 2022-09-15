<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Front of House Assessments</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body { font: 14px sans-serif; text-align: center; background-color: aliceblue; }
            tr { line-height: 100px; }
            .week-1 { background-color: #89c2d9 }
            .week-2 { background-color: #468faf; }
            .week-3 { background-color: #01497c; } 
            .week-1-border { border-color: #89c2d9 }
            .week-2-border { border-color: #468faf; }
            .week-3-border { border-color: #01497c; } 
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div>
                <a class="navbar-brand" href="/home.php">
                    <img src="/logo.svg" height="35" alt="" class="d-inline-block"/>
                </a>
                <a class="navbar-brand" href="/home.php">Front of House Assessments</a>
            </div>
            <form action="/home.php">
                <input type="submit" class="btn btn-primary btn-small" value="Go Back"/> 
            </form>
        </nav>
        <div class="card-deck mx-5">
            <div class="card mx-5 my-5 week-1-border">
                <table class="week-1">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <div class="card-body">
                    <a class="card-title h5 stretched-link" href="assessments/week1.php" style="color: black;">Week 1</a>
                    <p class="card-text">Click (or tap) here to open the week 1 assessment and responses.</p>
                </div>
            </div>
            <div class="card mx-5 my-5 week-2-border">
                <table class="week-2">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <div class="card-body">
                    <a class="card-title h5 stretched-link" href="assessments/week2.php" style="color: black;">Week 2</a>
                    <p class="card-text">Click (or tap) here to open the week 2 assessment and responses.</p>
                </div>
            </div>
            <div class="card mx-5 my-5 week-3-border">
                <table class="week-3">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <div class="card-body">
                    <a class="card-title h5 stretched-link" href="assessments/week3.php" style="color: black;">Week 3</a>
                    <p class="card-text">Click (or tap) here to open the week 3 assessment and responses.</p>
                </div>
            </div>
        </div>
    </body>
</html>
