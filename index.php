<?php
include 'config.php';
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email    = $conn->real_escape_string($_POST['email']);
    $phone    = $conn->real_escape_string($_POST['phone']);

    $sql = "INSERT INTO users (fullname, email, phone) VALUES ('$fullname', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        $success = "Registration successful!";
    } else {
        $success = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <?php if($success != ""): ?>
            <p class="success-message"><?= $success ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label>Full Name:</label>
            <input type="text" name="fullname" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Phone:</label>
            <input type="text" name="phone">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
