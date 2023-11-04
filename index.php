<?php
$insert = false;
if (isset($_POST['name'])) {
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "contact";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $db_name);

    // Check for connection success
    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    // Create the SQL query
    $sql = "INSERT INTO `data` (`name`, `email`, `subject`, `msg`) VALUES ('$name', '$email', '$subject', '$msg')";

    // Execute the query
    if (mysqli_query($con, $sql)) {
        echo "Successfully inserted";
        // Flag for successful insertion
        $insert = true;
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
