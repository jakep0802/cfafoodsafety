<?php
/* Test if user is logged in:
    If true, continue running code.
    If false, redirect to the login page. */
session_start();

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /login.php");
    exit;
}

/* Get the database */
require_once "config.php";

/* Set the current user id and all responses (and their errors) to be empty. */
$user_id = $_SESSION["id"];
$first_name = $last_name = $q1_response = $q2_response = $q3_response = $q4_response = $q5_response = $q6_response = $q7_response = $q8_response = $q9_response = $q10_response = $q11_response = $q12_response = $q13_response = $q14_response = $q15_response = $q16_response = "";
$first_name_err = $last_name_err = $q1_response_err = $q2_response_err = $q3_response_err = $q4_response_err = $q5_response_err = $q6_response_err = $q7_response_err = $q8_response_err = $q9_response_err = $q10_response_err = $q11_response_err = $q12_response_err = $q13_response_err = $q14_response_err = $q15_response_err = $q16_response_err = "";
$response_err = "Response required.";
$response_err_bool = false;

/* Test if user is sending data to be created:
    If true, continue running code.
    If false, do nothing. */
if($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Test if first name input field is empty:
        If true, tell user to require first name.
        If false, search database for the next open row. */
    if(empty(trim($_POST["first_name"]))) {
        $first_name_err = "First name required.";
    } else {
        $sql = "SELECT id FROM w1_responses_boh WHERE first_name = ?";

        if($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_first_name);
    
            $param_first_name = trim($_POST["first_name"]);
    
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                $first_name = trim($_POST["first_name"]);
            } else {
                echo "Oops! Something went wrong. Please try again later. (Could not store result)";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Oops! Something went wrong. Please try again later. (Could not prepare link)";
        }
    }
    
    if(isset($_SESSION["loggedin"])) {
        if(empty(trim($_POST["last_name"]))) {
            $last_name_err = "Last name required.";
            $response_err_bool = true;
        } else {
            $last_name = trim($_POST["last_name"]);
        }
        
        if(empty(trim($_POST["q1_response"]))) {
            $q1_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q1_response = trim($_POST["q1_response"]);
        }
        
        if(empty(trim($_POST["q2_response"]))) {
            $q2_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q2_response = trim($_POST["q2_response"]);
        }
        
        if(empty(trim($_POST["q3_response"]))) {
            $q3_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q3_response = trim($_POST["q3_response"]);
        }
    
        if(empty(trim($_POST["q4_response"]))) {
            $q4_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q4_response = trim($_POST["q4_response"]);
        }
    
        if(empty(trim($_POST["q5_response"]))) {
            $q5_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q5_response = trim($_POST["q5_response"]);
        }
    
        if(empty(trim($_POST["q6_response"]))) {
            $q6_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q6_response = trim($_POST["q6_response"]);
        }
    
        if(empty(trim($_POST["q7_response"]))) {
            $q7_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q7_response = trim($_POST["q7_response"]);
        }
    
        if(empty(trim($_POST["q8_response"]))) {
            $q8_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q8_response = trim($_POST["q8_response"]);
        }
    
        if(empty(trim($_POST["q9_response"]))) {
            $q9_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q9_response = trim($_POST["q9_response"]);
        }
    
        if(empty(trim($_POST["q10_response"]))) {
            $q10_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q10_response = trim($_POST["q10_response"]);
        }
    
        if(empty(trim($_POST["q11_response"]))) {
            $q11_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q11_response = trim($_POST["q11_response"]);
        }
    
        if(empty(trim($_POST["q12_response"]))) {
            $q12_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q12_response = trim($_POST["q12_response"]);
        }
    
        if(empty(trim($_POST["q13_response"]))) {
            $q13_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q13_response = trim($_POST["q13_response"]);
        }
    
        if(empty(trim($_POST["q14_response"]))) {
            $q14_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q14_response = trim($_POST["q14_response"]);
        }
    
        if(empty(trim($_POST["q15_response"]))) {
            $q15_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q15_response = trim($_POST["q15_response"]);
        }
    
        if(empty(trim($_POST["q16_response"]))) {
            $q16_response_err = $response_err;
            $response_err_bool = true;
        } else {
            $q16_response = trim($_POST["q16_response"]);
        }
    }

    //ssssssssssss
    if(empty($first_name_err) && empty($last_name_err) && !$response_err_bool) {
        $sql = "INSERT INTO w1_responses_boh (user_id, first_name, last_name, q1_response, q2_response, q3_response, q4_response, q5_response, q6_response, q7_response, q8_response, q9_response, q10_response, q11_response, q12_response, q13_response, q14_response, q15_response, q16_response) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "issssssssssssssssss", $param_user_id, $param_first_name, $param_last_name, $param_q1_response, $param_q2_response, $param_q3_response, $param_q4_response, $param_q5_response, $param_q6_response, $param_q7_response, $param_q8_response, $param_q9_response, $param_q10_response, $param_q11_response, $param_q12_response, $param_q13_response, $param_q14_response, $param_q15_response, $param_q16_response);
            
            $param_user_id = $user_id;
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_q1_response = $q1_response;
            $param_q2_response = $q2_response;
            $param_q3_response = $q3_response;
            $param_q4_response = $q4_response;
            $param_q5_response = $q5_response;
            $param_q6_response = $q6_response;
            $param_q7_response = $q7_response;
            $param_q8_response = $q8_response;
            $param_q9_response = $q9_response;
            $param_q10_response = $q10_response;
            $param_q11_response = $q11_response;
            $param_q12_response = $q12_response;
            $param_q13_response = $q13_response;
            $param_q14_response = $q14_response;
            $param_q15_response = $q15_response;
            $param_q16_response = $q16_response;

           if(mysqli_stmt_execute($stmt)) {
               header("location: /boh/back-of-house.php");
           }
           mysqli_stmt_close($stmt);
       }
   }
   mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Week 1 Assessment (BOH)</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body { font: 14px sans-serif; background-color: lightyellow; }
            .card-padding { padding-left: 25% !important; padding-right: 25% !important; padding-top: 30px !important; }
            .card { margin-top: 30px !important; }
            .card-body {margin-left: 10px !important; margin-right: 10px !important; }
            .row-margin { margin: 15px !important; }
            .navbar-btn { display: flex; justify-content: right; }
            .form-control { display: initial !important; }
            .submit-button { margin: 1em !important; }
            .row-response { display: block; }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
            <div>
                <a class="navbar-brand" href="/home.php">
                    <img src="/logo.svg" height="35" alt="" class="d-inline-block"/>
                </a>
                <a class="navbar-brand" href="/home.php">Week 1 Assessment (BOH)</a>
            </div>
            <div class="navbar-btn">
                <a class="btn btn-primary navbar-btn" href="/boh/assessments/week1responses.php" role="button" style="margin-right: 5px; ">View Responses</a>
                <a class="btn btn-primary navbar-btn" href="/boh/back-of-house.php" role="button" style="margin-left: 5px; ">Go Back</a>
            </div>
        </nav>
        <div class="wrapper card-padding">
            <div class="card">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="card-header">
                        <b>Team Member Information</b>
                    </div>
                        <div class="row row-margin">
                            <div class="col">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>" placeholder="Jessie" aria-label="Jessie">
                                <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
                            </div>
                            <div class="col">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>" placeholder="Doe" aria-label="Doe">
                                <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #1</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>What is 90-second temping?</label>
                                <textarea name="q1_response" rows="5" cols="50" class="form-control <?php echo (!empty($q1_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q1_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q1_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #2</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>What is a "good scan"?</label>
                                <textarea name="q2_response" rows="5" cols="50" class="form-control <?php echo (!empty($q2_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q2_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q2_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #3</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>How does the AHA system work?</label>
                                <textarea name="q3_response" rows="5" cols="50" class="form-control <?php echo (!empty($q3_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q3_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q3_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #4</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Who should be wearing clear gloves (and/or apron) and a hairnet? What is the exception to this rule?</label>
                                <textarea name="q4_response" rows="5" cols="50" class="form-control <?php echo (!empty($q4_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q4_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q4_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #5</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Where do you store employee drinks?</label>
                                <textarea name="q5_response" rows="5" cols="50" class="form-control <?php echo (!empty($q5_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q5_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q5_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #6</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Can you put a can of monster on the drink shelf? Why?</label>
                                <textarea name="q6_response" rows="5" cols="50" class="form-control <?php echo (!empty($q6_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q6_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q6_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #7</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Can you put a bottle of water on the drink shelf? Why?</label>
                                <textarea name="q7_response" rows="5" cols="50" class="form-control <?php echo (!empty($q7_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q7_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q7_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #8</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>What drinks are allowed on the drink shelf?</label>
                                <textarea name="q8_response" rows="5" cols="50" class="form-control <?php echo (!empty($q8_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q8_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q8_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #9</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Are items allowed to be stored on the floor?</label>
                                <textarea name="q9_response" rows="5" cols="50" class="form-control <?php echo (!empty($q9_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q9_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q9_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #10</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>What should you do after using a single-use towel?</label>
                                <textarea name="q10_response" rows="5" cols="50" class="form-control <?php echo (!empty($q10_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q10_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q10_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #11</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>On the dish rack, what shelves can you use to store regular dishes?</label>
                                <textarea name="q11_response" rows="5" cols="50" class="form-control <?php echo (!empty($q11_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q11_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q11_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #12</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>On the dish rack, what shelf can you use to store raw dishes?</label>
                                <textarea name="q12_response" rows="5" cols="50" class="form-control <?php echo (!empty($q12_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q12_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q12_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #13</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>What does the color yellow signify?</label>
                                <textarea name="q13_response" rows="5" cols="50" class="form-control <?php echo (!empty($q13_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q13_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q13_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #14</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Who should be wearing yellow?</label>
                                <textarea name="q14_response" rows="5" cols="50" class="form-control <?php echo (!empty($q14_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q14_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q14_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #15</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>What color scrub brush, squeegee, and mop are for back of house?</label>
                                <textarea name="q15_response" rows="5" cols="50" class="form-control <?php echo (!empty($q15_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q15_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q15_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <b>Question #16</b>
                        </div>
                        <div class="card-body row-custom justify-content-center">
                            <div class="form-group">
                                <label>Do you have any questions about the food safety information you have learned so far? If so, what are they?</label>
                                <textarea name="q16_response" rows="5" cols="50" class="form-control <?php echo (!empty($q16_response_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $q16_response; ?>"></textarea>
                                <span class="invalid-feedback"><?php echo $q16_response_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center submit-button">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form> 
            </div>
        </div>
    </body>
</html>