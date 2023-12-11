<?php
include "dbConnect.php";

session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== "admin") {
    echo "Unauthorized access";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Assuming 'admin_approve' is set to a specific value (e.g., 2) to denote deletion
    $stmt = $conn->prepare("UPDATE adoption_request SET admin_approve = 2 WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Adoption Request Deleted";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}
