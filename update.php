<?php
include 'config.php';

// Agar id pass nahi hui toh redirect
if (!isset($_GET['id'])) {
    header("Location: viewstudent.php");
    exit();
}

$id = $_GET['id'];

// Step 1: Record fetch karo
$sql = "SELECT * FROM address WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Record not found!'); window.location='viewstudent.php';</script>";
    exit();
}

$row = $result->fetch_assoc();

// Step 2: Agar form submit ho gaya toh update karo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $course  = $_POST['course'];
    $branch  = $_POST['branch'];
    $address = $_POST['address'];
    $city    = $_POST['city'];
    $pin     = $_POST['pin'];

    $update = "UPDATE address SET 
        fname='$fname', 
        lname='$lname', 
        email='$email', 
        phone='$phone', 
        course='$course', 
        branch='$branch', 
        address='$address', 
        city='$city', 
        pin='$pin' 
        WHERE id='$id'";

    if ($conn->query($update) === TRUE) {
        echo "<script>alert('Record Updated Successfully'); window.location='viewstudent.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <h2 align="center">✏️ Update Student Record</h2>

  <form method="post" style="width:50%; margin:auto;">
    <label>First Name:</label>
    <input type="text" name="fname" value="<?php echo $row['fname']; ?>" required><br><br>

    <label>Last Name:</label>
    <input type="text" name="lname" value="<?php echo $row['lname']; ?>" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>

    <label>Course:</label>
    <select name="course" required>
      <option value="Diploma" <?php if($row['course']=="Diploma") echo "selected"; ?>>Diploma</option>
      <option value="B-Tech" <?php if($row['course']=="B-Tech") echo "selected"; ?>>B-Tech</option>
    </select><br><br>

    <label>Branch:</label>
    <select name="branch" required>
      <option value="Computer Science Engineering" <?php if($row['branch']=="Computer Science Engineering") echo "selected"; ?>>Computer Science Engineering</option>
      <option value="Mechanical Engineering" <?php if($row['branch']=="Mechanical Engineering") echo "selected"; ?>>Mechanical Engineering</option>
      <option value="Civil Engineering" <?php if($row['branch']=="Civil Engineering") echo "selected"; ?>>Civil Engineering</option>
      <option value="Electrical Engineering" <?php if($row['branch']=="Electrical Engineering") echo "selected"; ?>>Electrical Engineering</option>
      <option value="Electronics Engineering" <?php if($row['branch']=="Electronics Engineering") echo "selected"; ?>>Electronics Engineering</option>
    </select><br><br>

    <label>Address:</label>
    <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>

    <label>City:</label>
    <input type="text" name="city" value="<?php echo $row['city']; ?>" required><br><br>

    <label>Pin Code:</label>
    <input type="text" name="pin" value="<?php echo $row['pin']; ?>" required><br><br>

    <input type="submit" value="Update">
  </form>

</body>
</html>
