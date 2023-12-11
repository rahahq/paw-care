<?php
include "dbConnect.php";

session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== "admin") {
    // For AJAX, instead of redirect, return an error message
    echo "Unauthorized access";
    exit;
}

if (isset($_GET['approve_type']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['approve_type'] == 'appointment') {
        // Update the appointments table
        $stmt = $conn->prepare("UPDATE appointments SET approved = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);
    } elseif ($_GET['approve_type'] == 'adoption_request') {
        // Update the adoption_request table
        $stmt = $conn->prepare("UPDATE adoption_request SET admin_approve = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);
    } elseif ($_GET['approve_type'] == 'rescue') {
        // Update the rescue table
        $stmt = $conn->prepare("UPDATE rescue SET admin_ver = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);
    }

    if ($stmt->execute()) {
        // For AJAX, return a success message
        echo "Approval successful";
    } else {
        // Handle error
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}
