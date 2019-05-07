<?php

//Connect to database
require ("db.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or password is empty";
    } else {
        //Save email&password in a variable
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Do query
        $query  = "SELECT email, password ";
        $query .= "FROM users ";
        $query .= "WHERE email = '$email' AND password = '$password' ";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die ("query is wrong");
        }

        //check how many rows are selected
        $numrows = mysqli_num_rows($result);
        if ($numrows ==1) {
            //start to use sessions
            session_start();

            //create session variable
            $_SESSION['login_user'] = $email;
            header('Location: html/login-frontpage.html');

        } else {
            echo "Login failed";
        }

        //free results
        mysqli_free_result($result);

    }

}

//close database connection
mysqli_close($connection);

?>

<?php

if (isset ($error)) {
    echo "<span>" . $error . "</span>";
}

?>
