<?php
// Assuming you have a database connection established
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'the_packers';

// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Assuming you have the logged-in user's user ID available in localStorage
if (isset($_GET['user_id'])) {
  $userId = $_GET['user_id'];

  // Fetch the user data from the database based on the user ID
  $sql = "SELECT * FROM user WHERE user_id='$userId'";
  $result = $conn->query($sql);

  if ($result !== false && $result->num_rows > 0) {
    $userData = $result->fetch_assoc();
  } else {
    // User not found
    echo 'User not found.';
    exit;
  }
} else {
  // User ID not available
  echo 'User ID not provided.';
  exit;
}

// Check if the form is submitted
if (isset($_POST['save_profile'])) {
    $userId = $_GET['user_id'];
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];

  // Update the user data in the database based on the user ID
  $sql = "UPDATE user SET first_name='$firstName', last_name='$lastName', email='$email', phone_number='$phoneNumber' WHERE user_id='$userId'";

  if ($conn->query($sql) === true) {
    echo 'Profile updated successfully.';
    echo "<script>";
    echo "localStorage.setItem('first_name', '$firstName');";
    echo "</script>";
    // Update the userData array with the new values
    $userData['first_name'] = $firstName;
    $userData['last_name'] = $lastName;
    $userData['email'] = $email;
    $userData['phone_number'] = $phoneNumber;
  } else {
    echo 'Error updating profile: ' . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="background-image: url('signup.jpg'); height: 300px;"></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
<h2 class="fw-bold mb-5">User Profile</h2>
<form action="profile.php?user_id=<?php echo $userData['user_id']; ?>" method="POST">
<!-- First Name -->
<div class="row">
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="first_name" class="form-control" name="first_name" value="<?php echo $userData['first_name']; ?>">
<label class="form-label" for="first_name">First name</label>
</div>
</div>
<!-- Last Name -->
<div class="col-md-6 mb-4">
<div class="form-outline">
<input type="text" id="last_name" class="form-control" name="last_name" value="<?php echo $userData['last_name']; ?>">
<label class="form-label" for="last_name">Last name</label>
</div>
</div>
</div>
<!-- Email -->
<div class="form-outline mb-4">
<input type="email" id="email" class="form-control" name="email" value="<?php echo $userData['email']; ?>">
<label class="form-label" for="email">Email address</label>
</div>
          <!-- Additional Profile Fields -->
          <div class="form-outline mb-4">
            <!-- Add additional profile fields here (e.g., phone number, address, etc.) -->
            <input type="text" id="phone" class="form-control" name="phone_number" value="<?php echo $userData['phone_number']; ?>">
            <label class="form-label" for="phone">Phone number</label>
          </div>

          <!-- Edit Profile Button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" name="save_profile">Save Profile</button>
        </form>
        <a href="index.html" class="btn">Go to Homepage</a>
      </div>
    </div>
  </div>
</div>
</section>
</body>
</html>