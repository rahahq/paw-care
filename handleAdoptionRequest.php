<?php
session_start();
include 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['sno']) && isset($_POST['rescueId'])) {
    $userSno = $_SESSION['sno'];
    $rescuedId = $_POST['rescueId'];

    $insertQuery = "INSERT INTO `adoption_request` (`userSno`, `rescuedId`) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ii", $userSno, $rescuedId);

    if ($stmt->execute()) {
        echo "Your adoption request has been sent successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}
$conn->close();
