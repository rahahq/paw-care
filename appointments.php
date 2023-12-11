<?php
include "navbar.php";
include "dbConnect.php";
if (!isset($_SESSION['sno'])) {
  echo '<script>
            var confirmation = confirm("You must log in first to book an appointment. Do you want to log in now?");
            if (confirmation) {
                window.location.href = "login.php"; // Redirect to the login page
            } else {
                window.location.href = "index.php"; // Redirect to another page
            }
          </script>';
  exit;
}



$appointment_type = $_GET["type"];
$submission_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sno = mysqli_real_escape_string($conn, $_SESSION['sno']); // Get the session user's ID
  $pet_name = mysqli_real_escape_string($conn, $_POST["pet_name"]);
  $pet_owner_name = mysqli_real_escape_string($conn, $_POST["pet_owner_name"]);
  $phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
  $preffered_date = mysqli_real_escape_string($conn, $_POST["preffered_date"]);
  $appointment_type = $_POST["service_type"];

  $sanitized_phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);

  if (empty($pet_name) || empty($pet_owner_name) || empty($sanitized_phone_number) || empty($preffered_date)) {
    $submission_error = true;
  } else {
    $query = "INSERT INTO `appointments` (`sno`, `pet_name`, `pet_owner_name`, `phone_number`, `appointment_type`, `preferred_date`) VALUES ('$sno', '$pet_name', '$pet_owner_name', '$sanitized_phone_number', '$appointment_type', '$preffered_date')";

    $result = mysqli_query($conn, $query);
    if ($result) {
      echo '<div class="alert alert-success my-4" role="alert">
                    Your Form Has been submitted! We will contact you shortly
                  </div>';
      echo '<script>
                    setTimeout(function(){
                        window.location.href = "profile.php";
                    }, 2000); // Redirect after 2 seconds
                 </script>';
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Appointment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/logstyle.css">

</head>

<body>

  <div id="log" class="container">
    <h1 class="my-3 text-center">Appointment</h1>
    <?php
    if ($submission_error) {
      echo '<div class="alert alert-danger" role="alert">
              You must fill all information correctly.
            </div>';
    }
    ?>
    <form class="p-3 rounded" action="appointments.php?type=<?php echo $appointment_type; ?>" method="post">
      <div class="mb-3">
        <label for="serviceType" class="form-label">Service Type</label>
        <select name="service_type" class="form-select" id="serviceType" aria-label="Default select example">
          <option selected><?php echo $appointment_type; ?></option>
          <option value="Grooming">Grooming</option>
          <option value="Showering">Showering</option>
          <option value="Neuter/Spay">Neuter/Spay</option>
          <option value="Nail Clipping">Nail Clipping</option>
          <option value="Vaccination">Vaccination</option>
          <option value="Vet Consultation">Vet Consultation</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="petOwnerName" class="form-label">Your Name</label>
        <input required name="pet_owner_name" type="text" class="form-control" id="petOwnerName" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="petName" class="form-label">Pet Name</label>
        <input required name="pet_name" type="text" class="form-control" id="petName" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="phoneNumber" class="form-label">Phone Number</label>
        <input required name="phone_number" type="tel" class="form-control" id="phoneNumber">
      </div>
      <div class="mb-3">
        <label for="appointmentDate" class="form-label">Appointment Date</label>
        <input required name="preffered_date" type="datetime-local" class="form-control" id="appointmentDate">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    <br><br>
  </div>

  <script src="css/bootstrap.min.css"></script>
  <script src="css/style.css"></script>

</body>

</html>