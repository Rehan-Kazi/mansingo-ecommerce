<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $name = isset($_POST['YourName']) ? $_POST['YourName'] : '';
    $email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $phone = isset($_POST['Phone']) ? $_POST['Phone'] : '';
    $message = isset($_POST['Message']) ? $_POST['Message'] : '';

    // Example: Database connection and insertion
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Mansing";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert data into database (sanitize inputs to prevent SQL injection)
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO Customer (Name, Email, Phone, Message) 
            VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "Your request has been submited successfully";
        echo "\nThankyou";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>

    </center>
</body>

</html>
