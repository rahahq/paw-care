<?php
include "dbConnect.php";


session_start();
if (!isset($_SESSION['type']) || $_SESSION['type'] !== "admin") {
    header("Location: login.php");
    exit;
}

$username = $password = '';
$username_err = $password_err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your login validation code here
}

$query = "SELECT * FROM `adoption_request` WHERE `admin_approve` = 0";
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
            function approveAdoption(id) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "approve.php?approve_type=adoption_request&id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Adoption Request Approved");
                        location.reload(); // Reload the current page to see the changes
                    }
                };
                xhr.send();
            }

            function deleteAdoption(id) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "delete_adoption.php?id=" + id, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert("Adoption Request Deleted");
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
            <h2 class="mt-5 mb-4 text-center">Adoption Requests for Approval</h2>
            <table class="table table-striped custom-table">
                <thead class="table-dark">
                    <tr>
                        <th>Rescue ID</th>
                        <th>Requested Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['rescuedId'] . "</td>";
                        echo "<td>" . $row['requested_at'] . "</td>";
                        echo "<td>
                        <button onclick='approveAdoption(" . $row['id'] . ")' class='btn btn-primary btn-sm'>Approve</button>
                        <button onclick='deleteAdoption(" . $row['id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
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
    echo "Error fetching appointments: " . mysqli_error($conn);
}
?>