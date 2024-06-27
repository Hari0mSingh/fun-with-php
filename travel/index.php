<?php
$insert = false;
if (isset($_POST['name'])) {
    // set connection variables
    $server = "specify servername";
    $username = "specify username of the DB";
    $password = "password for DB";
    // create a Database connection
    $conn = mysqli_connect($server, $username, $password);
    //check for connection successs
    if (!$conn) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }
    //collect POST variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    //execute the query
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // echo "Successfully inserted";
        // flag for successful insertion
        $insert = true;
    } else {
        echo "ERROR: $sql <br>" . mysqli_error($conn);
    }
    //close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit your traveling details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <img src="bg.webp" alt="college" class="bg">
    <div class="container">
        <h1>Welcome to DCRUST Travel to US trip form </h1>

        <P>Enter your details and submit this form to confirm your participatition in the trip.</P>
        <?php if ($insert == true) {
            echo "<p id='submitmsg'>Thanks for submitting the form.</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <input type="number" id="age" name="age" placeholder="Enter your age">
            <input type="text" id="gender" name="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other important information here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>

</body>

</html>