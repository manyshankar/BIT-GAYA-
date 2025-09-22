<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM `address` WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Record Deleted Successfully');
            window.location.href='viewstudent.php';
          </script>";
} else {
    echo "<script>
            alert('Error deleting record: " . $conn->error . "');
            window.location.href='viewstudent.php';
          </script>";
}

$conn->close();
?>
