<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BIT</title>
  <link rel="icon" type="image/png" href="picture/logo.jpg">
  <!-- External CSS connect -->
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    h2 {
      text-align: center;
      color:rgb(221, 154, 10);
    }

    #customers {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 10px;
    }

    #customers tr{
      background-color:white;
    }
    

    #customers tr:hover {
      background-color:rgb(107, 192, 33);
    }

    #customers th {
      background-color: #04AA6D;
      color: white;
      text-align: left;
    }

    a {
      text-decoration: none;
      color: blue;
      font-weight: bold;
      margin-right: 10px;
    }

    a:hover {
      color: red;
    }
    .footer {
  background-color:black;
  color: white;
  padding: 20px;
  text-align: center;
  position: fixed;
  bottom: 0;
  width: 100%;
}

  </style>
</head>

<body>
  <!-- Main Header -->
  <div class="navbar">
    <!-- Logo + Text -->
    <div class="logo-section">
      <a href="#"><img src="picture/BIT LOGO.png" alt="Logo"></a>
      <a href="#" class="logo">Buddha Institute Of Technology</a>
    </div>

    <!-- Menu items -->
    <div class="menu">
      <a href="index.html" class="link">Home</a>
      <a href="About.html" class="link">About</a>
      <a href="Gallery.html" class="link">Service</a>
      <a href="Contact.html" class="link btn">Contact</a>
    </div>
  </div>

  <!-- Sub Header (Education wala) -->
  <div class="sub-navbar">

    <a href="facility.html">Facility</a>
   
    <div class="dropdown">
      <a href="admission.html" class="dropbtn">Admission ▾</a>
      <div class="dropdown-content">
        <a href="admission.html">Admission</a>
        <a href="free.html">Fees Structure</a>
        <a href="admissionEligi.html">Admission Eligibility</a>
      </div>
    </div>

    <div class="dropdown">
      <a href="comscieng.html" class="dropbtn">Diploma ▾</a>
      <div class="dropdown-content">
        <a href="comscieng.html">Computer Science Engg</a>
        <a href="#">Mechanical Engg</a>
        <a href="#">Civil Engg</a>
        <a href="#">Electrical Engg</a>
      </div>
    </div>

    <div class="dropdown">
      <a href="#" class="dropbtn">B-TECH ▾</a>
      <div class="dropdown-content">
        <a href="#">Computer Science Engg</a>
        <a href="#">Civil Engg</a>
        <a href="#">Electrical Engg</a>
      </div>
    </div>

    <div class="dropdown">
      <a href="engineering.html" class="dropbtn">Academics ▾</a>
      <div class="dropdown-content">
        <a href="engineering.html">Engineering</a>
        <a href="service.html">Gallery</a>
      </div>
    </div> <!-- properly closed -->

    <div class="dropdown">
      <a href="studentform.html" class="dropbtn">Apply Form ▾</a>
      <div class="dropdown-content">
        <a href="studentform.html">Apply here</a>
        <a href="viewstudent.php">View student</a>
      </div>
    </div>
    
    <a href="rules.html">Rules</a>
  </div>


  <h1 class="about" align= "center">! Student Record !</h1>

  <table id="customers">
    <tr>
      <th>S.No.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Id</th>
      <th>Phone</th>
      <th>Course</th>
      <th>Branch</th>
      <th>Address</th>
      <th>City</th>
      <th>Pin</th>
      <th>Action</th>
    </tr>

    <?php
    include 'config.php';

    if (!$conn) {
      die("Database connection failed.");
    }

    $sql = "SELECT * FROM address";
    $result = $conn->query($sql);
    $serial = 1;

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $serial++ . "</td>";
        echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['course']) . "</td>";
        echo "<td>" . htmlspecialchars($row['branch']) . "</td>";
        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['city']) . "</td>";
        echo "<td>" . htmlspecialchars($row['pin']) . "</td>";
        echo "<td>
                <a href='delete.php?id=" . $row['id'] . "'>🗑️ Delete</a>
                <a href='update.php?id=" . $row['id'] . "'>✏️ Edit</a>
              </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='10' style='text-align:center;'>No records found</td></tr>";
    }

    $conn->close();
    ?>
  </table>

  
 
  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h3>Best Education</h3>
        <p>Visit The Buddha Institute Of Technology
        :- Plot No : B-3 (P), Industrial Area, Gaya NH:22, Gaya-Dobhi Road, Near Tekuna Farm, Gaya Bihar - 823004!</p>
      </div>
 
      <div class="footer-links">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="About.html">About Us</a></li>
          <li><a href="Gallery.html">Service</a></li>
          <li><a href="Contact.html">Contact</a></li>
        </ul>
      </div>
 
      <div class="footer-contact">
        <h4>Contact Us</h4>
        <p>📍 Gaya, Bihar - 823004</p>
        <p>📞 +91-9006246620</p>
        <p>📧 manushankar1318@gmail.com</p>
      </div>
    </div>
 
    <div class="footer-bottom">
      <p>&copy; 2025 Buddha Institute of Technology Gaya | Designed by Manushankar Kumar</p>
    </div>
  </footer>
 
</body>
</html>
