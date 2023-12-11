<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container container-fluid">
            <a class="navbar-brand fw-bold" href="index.php"><img src="assets/images/logo.png" alt="Pawcare Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#aboutus">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#services">Our Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#doctors">Our Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['loggedin'])) {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link btn btn-orange" href="logout.php"><i class="fa fa-sign-in"></i> Logout</a>
                            </li>
                        ';
                    } else {
                        echo '
                            <li class="nav-item me-2">
                                <a class="nav-link btn btn-orange" href="login.php"><i class="fa fa-sign-in"></i> Login</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link btn btn-orange" href="reg.php"><i class="fa fa-plus-square"></i> Sign Up</a>
                            </li>
                        ';
                    } ?>
                </ul>
            </div>
        </div>
    </nav>
</body>