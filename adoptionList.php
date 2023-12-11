<?php
include 'navbar.php';
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


$animalType = $_GET['animalType'] ?? 'All';
$foundArea = $_GET['foundArea'] ?? 'All';

function fetchAnimals($conn, $animalType, $foundArea)
{
    $sql = "SELECT * FROM `rescue` WHERE admin_ver = 1";
    if ($animalType !== 'All') {
        $sql .= " AND animal_type = ?";
    }
    if ($foundArea !== 'All') {
        $sql .= " AND found_area = ?";
    }

    $stmt = $conn->prepare($sql);
    if ($animalType !== 'All' && $foundArea !== 'All') {
        $stmt->bind_param("ss", $animalType, $foundArea);
    } elseif ($animalType !== 'All') {
        $stmt->bind_param("s", $animalType);
    } elseif ($foundArea !== 'All') {
        $stmt->bind_param("s", $foundArea);
    }

    $stmt->execute();
    return $stmt->get_result();
}

$animals = fetchAnimals($conn, $animalType, $foundArea);

// Handle Adoption Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adopt'])) {
    $userSno = $_SESSION['sno']; // User's session ID
    $rescuedId = $_POST['rescuedId']; // ID of the animal to adopt

    $insertQuery = "INSERT INTO `adoption_request` (`userSno`, `rescuedId`) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ii", $userSno, $rescuedId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<p>Adoption request sent!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adoption List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div style="display: flex; margin: 30px;">
        <div> <!-- Left side for Animal Type -->
            <form method="get" class="mb-4">
                <label for="animalType">Animal Type: </label>
                <select id="animalType" name="animalType" onchange="this.form.submit()" class="form-select">
                    <option value="All" <?php echo ($animalType == 'All' ? 'selected' : ''); ?>>All</option>
                    <option value="Dog" <?php echo ($animalType == 'Dog' ? 'selected' : ''); ?>>Dogs</option>
                    <option value="Cat" <?php echo ($animalType == 'Cat' ? 'selected' : ''); ?>>Cats</option>
                    <option value="Others" <?php echo ($animalType == 'Others' ? 'selected' : ''); ?>>Others</option>
                </select>
            </form>
        </div>

        <div> <!-- Right side for Found Area -->
            <form method="get" class="mb-4">
                <label for="foundArea">Found Area: </label>
                <select id="foundArea" name="foundArea" onchange="this.form.submit()" class="form-select">
                    <option value="All" <?php echo ($foundArea == 'All' ? 'selected' : ''); ?>>All</option>
                    <option value="Barisal" <?php echo ($foundArea == 'Barisal' ? 'selected' : ''); ?>>Barisal</option>
                    <option value="Chattogram" <?php echo ($foundArea == 'Chattogram' ? 'selected' : ''); ?>>Chattogram</option>
                    <option value="Dhaka" <?php echo ($foundArea == 'Dhaka' ? 'selected' : ''); ?>>Dhaka</option>
                    <option value="Khulna" <?php echo ($foundArea == 'Khulna' ? 'selected' : ''); ?>>Khulna</option>
                    <option value="Mymensingh" <?php echo ($foundArea == 'Mymensingh' ? 'selected' : ''); ?>>Mymensingh</option>
                    <option value="Rajshahi" <?php echo ($foundArea == 'Rajshahi' ? 'selected' : ''); ?>>Rajshahi</option>
                    <option value="Rangpur" <?php echo ($foundArea == 'Rangpur' ? 'selected' : ''); ?>>Rangpur</option>
                    <option value="Sylhet" <?php echo ($foundArea == 'Sylhet' ? 'selected' : ''); ?>>Sylhet</option>
                </select>
            </form>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <?php
            if ($animals->num_rows > 0) {
                while ($row = $animals->fetch_assoc()) {
                    $imageUrl = !empty($row['imagePath']) ? $row['imagePath'] : 'image/default.jpg';
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card h-100">';
                    echo '<img src="' . htmlspecialchars($imageUrl) . '" class="card-img-top" alt="Animal Image">';
                    echo '<div class="card-body bg-white">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row['animal_type']) . '</h5>';
                    echo '<p class="card-text">Rescuer: ' . htmlspecialchars($row['rescuer_name']) . '<br>Found in: ' . htmlspecialchars($row['found_area']) . '</p>';
                    echo '<p class="card-text">Details: ' . htmlspecialchars($row['additional_info']) . '</p>';
                    echo '<a href="javascript:void(0);" class="btn btn-primary" onclick="showPrompt(' . htmlspecialchars($row['id']) . ')" data-rescue-id="' . htmlspecialchars($row['id']) . '">Want to Adopt?</a>';
                    echo '</div>'; // Close card-body
                    echo '</div>'; // Close card
                    echo '</div>'; // Close column
                }
            } else {
                echo '<p>No animals found.</p>';
            }
            ?>
        </div>
    </div>

    <script>
        function showPrompt(rescueId) {
            var confirmation = confirm("Your request is in process. Do you want to continue?");
            if (confirmation) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "handleAdoptionRequest.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                        window.location.href = 'profile.php';
                    }
                };
                xhr.send("rescueId=" + rescueId + "&userSno=" + <?php echo $_SESSION['sno']; ?>);
            }
        }
    </script>
</body>

</html>

<?php
$conn->close();
?>