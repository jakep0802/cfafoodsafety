<?php
session_start();

require_once "config.php";

if(isset($_SESSION["id"]) && !empty(trim($_SESSION["id"]))) {
    $sql = "SELECT first_login FROM users WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_SESSION["id"]);

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $first_login = $row["first_login"];
            } else {
                echo "Oops! Something went wrong. Please try again later. (Could not fetch row)";
            }
        }
    }
    mysqli_stmt_close($stmt);
}

if($first_login === 1) {
    header("location: reset-password.php");
    exit;
}

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
} else {
    $sql = "SELECT access FROM users WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_SESSION["id"]);

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $user_access = $row["access"];
            } else {
                echo "Oops! Something went wrong. Please try again later. (Could not fetch row)";
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Food Safety Home Page</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body { font: 14px sans-serif; text-align: center; background-color: ghostwhite; }
            tr { line-height: 100px; }
            .foh { background-color: #17a2b8; }
            .boh { background-color: #ffc107; }
            .ecosure { background-color: #28a745; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div>
                <a class="navbar-brand" href="/home.php">
                    <img src="/logo.svg" height="35" alt="" class="d-inline-block"/>
                </a>
                <a class="navbar-brand" href="/home.php">Chick-fil-A Food Safety Team Home Page</a>
            </div>
            <form action="logout.php">
                <?php
                if(isset($_SESSION["id"]) && trim($_SESSION["id"]) == 1) {
                    echo '<a class="btn btn-primary navbar-btn" href="/create-user.php" role="button" style="margin-right: 10px; ">Create User</a>';
                } 
                ?>
                <input type="submit" class="btn btn-primary btn-small" value="Logout"> 
            </form>
        </nav>
        <div class="card-deck mx-5">
            <?php
            if($user_access == "foodsafetyteam") {
            echo '<div class="card mx-5 my-5 border-info">';
                echo '<table class="foh">';
                    echo "<tr>";
                        echo "<td>&nbsp;</td>";
                    echo "</tr>";
                echo "</table>";
                echo '<div class="card-body">';
                    echo '<a class="card-title h5 stretched-link" href="foh/front-of-house.php" style="color: black;">Front of House</a>';
                    echo '<p class="card-text">This folder contains all front of house items: Week 1, 2, and 3 assessments.</p>';
                echo "</div>";
            echo "</div>";
            echo '<div class="card mx-5 my-5 border-warning">';
                echo '<table class="boh">';
                    echo "<tr>";
                        echo "<td>&nbsp;</td>";
                    echo "</tr>";
                echo "</table>";
                echo '<div class="card-body">';
                    echo '<a class="card-title h5 stretched-link" href="boh/back-of-house.php" style="color: black;">Back of House</a>';
                    echo '<p class="card-text">This folder contains all back of house items: Week 1, 2, and 3 assessments.</p>';
                echo "</div>";
            echo "</div>";
            }
            ?>
            <div class="card mx-5 my-5 border-success">
                <table class="ecosure">
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <div class="card-body">
                    <a class="card-title h5 stretched-link" href="ecosure.php" style="color: black;">Ecosure</a>
                    <p class="card-text">This folder contains the daily Ecosure checklist.</p>
                </div>
            </div>
        </div>
    </body>
</html>