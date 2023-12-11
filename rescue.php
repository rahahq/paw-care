<?php
include "dbConnect.php";

session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== "admin") {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM `rescue` WHERE `admin_ver` = 0";
$result = mysqli_query($conn, $query);

if ($result) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pawcare</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script>
            function approveRescue(id) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "approve.php?approve_type=rescue&id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Rescue Request Approved");
                        location.reload(); // Reload the current page to see the changes
                    }
                };
                xhr.send();
            }

            function deleteRescue(id) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "delete_rescue.php?id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Rescue Request Deleted");
                        location.reload(); // Reload the current page to see the changes
                    }
                };
                xhr.send();
            }
        </script>
    </head>

    <body>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container container-fluid">
                <a class="navbar-brand fw-bold" href="#"><img src="assets/images/logo.png" alt="Pawcare Logo"> (ADMIN)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adoption.php">Adoption</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rescue.php">Rescue</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-orange" href="logout.php"><i class="fa fa-sign-in"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <h2 class="mt-5 mb-4 text-center">Rescue Requests for Approval</h2>
            <table class="table table-striped custom-table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Rescuer Name</th>
                        <th>Animal Type</th>
                        <th>Found Area</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['rescuer_name'] . "</td>";
                        echo "<td>" . $row['animal_type'] . "</td>";
                        echo "<td>" . $row['found_area'] . "</td>";
                        echo "<td>
                        <button onclick='approveRescue(" . $row['id'] . ")' class='btn btn-primary btn-sm'>Approve</button>
                        <button onclick='deleteRescue(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                    </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Other HTML content -->

    </body>

    </html>

<?php
} else {
    echo "Error fetching rescue requests: " . mysqli_error($conn);
}
