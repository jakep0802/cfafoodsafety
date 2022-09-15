<?php
session_start();

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /login.php");
    exit;
}

if(isset($_POST["id"]) && !empty($_POST["id"])) {
    require_once "config.php";

    $sql = "DELETE FROM w3_responses_foh WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_POST["id"]);

        if(mysqli_stmt_execute($stmt)) {
            header("location: week3responses.php");
            exit;
        } else {
            echo "Oops! Something went wrong. Please try again later. (Could not execute statement)";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    if(empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Week 3 Assessment Delete Response (FOH)</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body { font: 14px sans-serif; background-color: aliceblue; }
            .card-padding { padding-left: 25% !important; padding-right: 25% !important; padding-top: 30px !important; }
            .card { margin-top: 30px !important; }
            .card-body {margin-left: 10px !important; margin-right: 10px !important; }
            .row-margin { margin: 15px !important; }
            .navbar-btn { display: flex; justify-content: right; }
            .form-control { display: initial !important; }
            .submit-button { margin: 1em !important; }
            .form-group { display: flex; justify-content: center; margin-bottom: unset;}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div>
                <a class="navbar-brand" href="/home.php">
                    <img src="/logo.svg" height="35" alt="" class="d-inline-block"/>
                </a>
                <a class="navbar-brand" href="/foh/front-of-house.php">Week 3 Assessment Delete Response (FOH)</a>
            </div>
            
            <div class="navbar-btn">
                <a class="btn btn-primary navbar-btn" href="/foh/assessments/week3responses.php" role="button" style="margin-left: 5px; ">Go Back</a>
            </div>
        </nav>
        <div class="wrapper card-padding">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="card">
                    <div class="card-header">
                        <b>Delete Response?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <div class="alert" style="margin-bottom: unset;">
                                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                                <p style="text-align: center;">Are you sure you want to delete all responses this team member has submitted?</p>
                                <div class="form-group">
                                    <input type="submit" value="Yes" class="btn btn-danger" style="margin-right: 5px;"/>
                                    <a href="/foh/assessments/week3responses.php" class="btn btn-secondary" style="margin-left: 5px;">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>