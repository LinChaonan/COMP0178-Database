<?php

// TODO: Extract $_POST variables, check they're OK, and attempt to create
// an account. Notify user of success/failure and redirect/give navigation 
// options.

require_once "config.php";


$email= $password = $passwordConfirmation = "";
$email_err = $password_err = $passwordConfirmation_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (empty($_POST["email"])) {
        $email_err = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
        }
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
        }
    }

    if(empty(trim($_POST["passwordConfirmation"]))){
        $passwordConfirmation_err = "Please confirm password.";
    } else {
        $passwordConfirmation = trim($_POST["repeat_password"]);
        if (empty($password_err) && ($password != $passwordConfirmation)) {
            $passwordConfirmation_err = "Password did not match.";
        }
    }

    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    $accountType = $_POST['accountType'];

    if(empty($email_err) && empty($password_err) && empty($passwordConfirmation_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password, accountType) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password, $param_accountType);

            // Set parameters
            $param_email = $email;
            $param_password = $password;
            $param_accountType = $accountType;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}

?>