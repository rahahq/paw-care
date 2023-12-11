<?php
include 'Navbar.php';
include 'dbConnect.php';

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

$userSno = $_SESSION['userSno']; // Assuming the logged-in user's S/N is stored in the session

// Fetch Adoption Requests
$requestedItems = [];
$adoptionQuery = "SELECT ar.*, r.animal_type, r.found_area, r.additional_info, r.imagePath FROM adoption_request ar
                  LEFT JOIN rescue r ON ar.rescuedId = r.id
                  WHERE ar.userSno = ?";

$stmt = $conn->prepare($adoptionQuery);
$stmt->bind_param("i", $userSno);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    switch ($row['admin_approve']) {
        case 0:
            $row['requestStatus'] = 'Request Pending';
            break;
        case 1:
            $row['requestStatus'] = 'Your request has been approved';
            break;
        case 2:
            $row['requestStatus'] = 'Your request has been refused';
            break;
    }
    $requestedItems[] = $row;
}
$stmt->close();

// Fetch Appointments
$appointments = [];
$appointmentQuery = "SELECT * FROM appointments WHERE sno = ?";

$stmt = $conn->prepare($appointmentQuery);
$stmt->bind_param("i", $userSno);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    switch ($row['approved']) {
        case 0:
            $row['appointmentStatus'] = 'Request Pending';
            break;
        case 1:
            $row['appointmentStatus'] = 'Your request has been approved';
            break;
        case 2:
            $row['appointmentStatus'] = 'Your request has been refused';
            break;
    }
    $appointments[] = $row;
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css"> <!-- Your custom CSS file -->
</head>

<body>
    <div class="container my-4">
        <h1 class="text-center mb-4">User Profile</h1>
        <!-- Adoption Requests Section -->
        <div class="user-requests mb-4">
            <h2>Your Adoption Requests</h2>
            <div class="row">
                <?php foreach ($requestedItems as $item) : ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($item['animal_type'] ?? 'Unknown Animal'); ?></h5>
                                <?php if (isset($item['imagePath'])) : ?>
                                    <img src="<?php echo htmlspecialchars($item['imagePath']); ?>" alt="Animal Image" style="max-width: 100%; height: auto;">
                                <?php endif; ?>
                                <p class="card-text">
                                    <?php
                                    echo '<strong>Found in:</strong> ' . htmlspecialchars($item['found_area'] ?? 'Unknown Area');
                                    echo '<br>';
                                    echo '<strong>Info:</strong> ' . htmlspecialchars($item['additional_info'] ?? 'No additional information');
                                    echo '<br>';
                                    echo '<strong>Status:</strong> ' . $item['requestStatus'];
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Appointments Section -->
        <div class="user-appointments">
            <h2>Your Appointment Bookings</h2>
            <div class="list-group">
                <?php foreach ($appointments as $appointment) : ?>
                    <div class="list-group-item">
                        <p><strong>Pet Name:</strong> <?php echo htmlspecialchars($appointment['pet_name'] ?? 'Unknown'); ?></p>
                        <p><strong>Owner Name:</strong> <?php echo htmlspecialchars($appointment['pet_owner_name'] ?? 'Unknown'); ?></p>
                        <p><strong>Appointment Type:</strong> <?php echo htmlspecialchars($appointment['appointment_type'] ?? 'Unknown'); ?></p>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($appointment['preferred_date'] ?? 'Unknown'); ?></p>
                        <p><strong>Status:</strong> <?php echo $appointment['appointmentStatus']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>