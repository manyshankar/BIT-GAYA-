<?php
include "config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$course = $_POST['course'];
$branch = $_POST['branch'];
$address = $_POST['address'];
$city = $_POST['city'];
$pin = $_POST['pin'];

// Agar id AUTO_INCREMENT hai to usko mat likhiye
$sql = "INSERT INTO `address`(`fname`, `lname`, `email`, `phone`, `course`, `branch`, `address`, `city`, `pin`) 
VALUES ('$fname', '$lname', '$email', '$phone', '$course', '$branch', '$address', '$city', '$pin')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Submitted successfully'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
