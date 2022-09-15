<?php
session_start();

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Week 2 Assessment Responses (FOH)</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            body { font: 14px sans-serif; background-color: aliceblue; }
            table tr td:last-child { width: 120px; }
            .table { margin-bottom: unset !important; }
            .card-padding { padding-left: 25% !important; padding-right: 25% !important; padding-top: 30px !important; }
            .center-align-function { display: flex; justify-content: center; align-items: center; border: 0px !important; }
            .card { margin-top: 30px !important; }
            .card-body {margin-left: 10px !important; margin-right: 10px !important; }
            .row-margin { margin: 15px !important; }
            .row-custom { display: flex; flex-wrap: wrap; }
            .navbar-btn { display: flex; justify-content: right; }
            .form-control { display: initial !important; }
            .col-spacing-custom { position: relative !important; width: 100% !important; height: 300px !important; padding: 20px !important; overflow: auto !important; }
        </style>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div>  
                <a class="navbar-brand" href="/home.php">
                    <img src="/logo.svg" height="35" alt="" class="d-inline-block"/>
                </a>
                <a class="navbar-brand" href="#">Week 2 Assessment Responses (FOH)</a>
            </div>
            
            <div class="navbar-btn">
                <a class="btn btn-primary navbar-btn" href="/foh/assessments/week2.php" role="button" style="margin-left: 5px; ">Go Back</a>
            </div>
        </nav>
        <div class="wrapper card-padding">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="card">
                    <div class="card-header">
                        <b>Question #1 Responses - Why must drinks be stored on the drink shelf with a straw and a lid?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            require_once "config.php";

                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q1_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #2 Responses - Why are items not allowed to be stored on the ground?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q2_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #3 Responses - Where must chemicals be stored at?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q3_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #4 Responses - Why do we use red to signify bathrooms and blue to signify front of house/dining room?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q4_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #5 Responses - Why are you not allowed to wear anything on your wrists?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q5_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #6 Responses - List 5 items that need date label stickers.</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q6_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #7 Responses - What should you check for when bringing a tray of food to the front?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q7_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #8 Responses - How should you pull lemonade and tea from the walk-in cooler?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q8_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <b>Question #9 Responses - What shelves are you supposed to store dirty dishes on in the back of house?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q9_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 30px;">
                    <div class="card-header">
                        <b>Question #10 Responses - Do you have any questions about the food safety information you have learned so far? If so, what are they?</b>
                    </div>
                    <div class="row-custom">
                        <div class="col-spacing-custom">
                            <?php
                            $sql = "SELECT * FROM w2_responses_foh";

                            if($result = mysqli_query($link, $sql)) {
                                if(mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-bordered table-striped">';
                                        echo "<thead>";
                                            echo "<tr>";
                                                echo "<th>Name</th>";
                                                echo "<th>Completed By</th>";
                                                echo "<th>Response</th>";
                                                echo "<th>Time Submitted</th>";
                                                echo "<th>Function</th>";
                                            echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        
                                        while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                                                $user_sql = "SELECT * FROM users WHERE id = ?";
                                                if($user_stmt = mysqli_prepare($link, $user_sql)) {
                                                    mysqli_stmt_bind_param($user_stmt, "i", $param_id);

                                                    $param_id = $row["user_id"];

                                                    if(mysqli_stmt_execute($user_stmt)) {
                                                        $user_result = mysqli_stmt_get_result($user_stmt);
                                                        
                                                        if(mysqli_num_rows($user_result) == 1) {
                                                            $user_row = mysqli_fetch_array($user_result, MYSQLI_ASSOC);

                                                            echo "<td>" . $user_row["first_name"] . " " . $user_row["last_name"] . "</td>";
                                                        }
                                                    }
                                                }
                                                echo "<td>" . $row["q10_response"] . "</td>";
                                                echo "<td>" . $row["time_submitted"] . "</td>";
                                                echo '<td class="center-align-function">';
                                                    echo '<a href=week2delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                                echo "</td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</tbody>";
                                    echo "</table>";

                                    mysqli_free_result($result);
                                } else {
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
    </body>
</html>