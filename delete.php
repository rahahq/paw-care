<?php
include "dbConnect.php";

session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== "admin") {
    echo "Unauthorized access";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE appointments SET approved = 2 WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Deletion successful";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}
