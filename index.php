<?php
include 'dbConnect.php';
include "navbar.php";
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
</head>

<body>


    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col col-sm-12 bannerContent">
                    <img src="assets/images/banner.jpg" alt="test" class="img-fluid">
                    <div class="heroContent">
                        <h1>We provide the best services for our customers that puts your pet’s health first.</h1>
                        <a href="#contact" class="btn btn-orange">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about" id="aboutus">
        <div class="container hero-container" id="hero-sec">
            <h1 class="text-center my-5 clr">About Us</h1>
            <div class="container-fluid ">
                <div class="row d-flex">
                    <div class="col-sm-12 col-md-6 align-middle">
                        <div class="px-2 py-2 text-end">
                            <img src="assets/images/about.jpg">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="px-5 pb-5 pt-4">
                            <div class="px-2 py-2 align-middle">
                                <h4>Welcome to PAW CARE</h4>
                                <p>Where passion meets compassion in providing exceptional care for your beloved pets. At PAW CARE, we understand that your pets are not just animals; they are cherished members of your family. That's why we are dedicated to delivering top-notch pet care services that go beyond the ordinary.</p>
                            </div>
                            <div class="px-2 py-2 align-middle">
                                <h4>Our Mission</h4>
                                <p>At PAW CARE, our mission is to provide unparalleled care for pets, fostering a sense of trust and security between pets and their owners</p>
                            </div>
                            <div class="px-2 py-2 align-middle">
                                <h4>Why Choose PAW CARE?</h4>
                                <ul>
                                    <li><strong>Passionate Professionals:</strong> Our team consists of passionate pet lovers who are committed to providing the best care for your furry friends.</li>
                                    <li><strong>Safety First:</strong> We prioritize the safety and well-being of your pets.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services" id="services">
        <div class="container">
            <h1 class="text-center my-5 clr">Our Services</h1>
            <div class="row">
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="assets/images/OIP.jpeg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Pet Grooming</h2>
                            <p class="card-text">Pet Grooming is not only relates to the physical wellbeing of the pet, but also its appearance.
                                For grooming your loving pet, we use a variety of modern
                                equipment and techniques. We ensure
                                the absolute comfort and convenience of your pet while grooming.</p>
                            <a class="btn btn-orange" href="appointments.php?type=Grooming">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="assets/images/bath.jpg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Pet Showering</h2>
                            <p class="card-text"> Bathing is essential to your pet’s health as it
                                helps prevent skin problems such as matting.
                                We’ll suds away dirt, oil and debris to help skin & coats of
                                all kinds look and feel great.</p>
                            <a class="btn btn-orange" href="appointments.php?type=Showering">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="assets/images/nuture.jpeg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Surgeries Neutering Spaying</h2>
                            <p class="card-text"> We have skilled, qualified and accomplished
                                veterinary surgeons who offer both spaying and neutering surgeries. And we are
                                providing the services at the most-effective cost, ensuring your pet’s proper treatment.</p>
                            <a class="btn btn-orange" href="appointments.php?type=Neuter/Spay">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="assets/images/nail.jpeg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Nail Clipping</h2>
                            <p class="card-text"> It is very important to trim your pet’s nails.
                                Because nails can grow too long and they can cause of pain for your pet.
                                Contact us and let’s trim your pet’s nails in its perfect form.</p>
                            <a class="btn btn-orange" href="appointments.php?type=Nail Clipping">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="assets/images/vac.jpeg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Vaccination</h2>
                            <p class="card-text">We have trained, professional and experienced veterinary surgeons who offer both spaying and neutering surgeries.
                                And we provide the facilities at the most effective cost,
                                ensuring adequate care for your pet.</p>
                            <a class="btn btn-orange" href="appointments.php?type=Vaccination">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="assets/images/vet.jpeg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Vet’s Consultation</h2>
                            <p class="card-text">We are always proactive to console your furry
                                friends both home and away in order to keep your pet safe, fit and strong.
                                Connect us and ensure your pet’s sound healthy.</p>
                            <a class="btn btn-orange" href="appointments.php?type=Vet Consultation">Book Appointment</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="image/rescue.jpg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Rescue Service</h2>
                            <p class="card-text">Found a stray animal? Help them find a home by filling out the rescue form. Your small effort can make a big difference.</p>
                            <a class="btn btn-orange" href="rescueFormHandler.php">Found something?</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="card shadow h-100">
                        <img src="image/adopt.jpg" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title">Adoption Service</h2>
                            <p class="card-text">Looking to adopt a pet? Check out our list of adorable animals waiting for a loving home.</p>
                            <a class="btn btn-orange" href="adoptionList.php">Available Adoptions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="doctors bg-clr p-5 mt-4" id="doctors">
        <div class="container">
            <h1 class="text-center mb-5 ">Our Doctors</h1>
            <div class="row">
                <?php
                include "dbConnect.php";

                $query = "SELECT * FROM `doctors`";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="col-xs-12 mb-4 col-sm-12 col-md-4 col-lg-4 ">
                        <div class="card shadow h-100">
                            <div class="face text-center my-2">
                                <img src="assets/images/' . $row['photo'] . '" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h2 class="card-title">' . $row['name'] . '</h2>
                                <p class="card-text">' . $row['description'] . '</p>
                                <p><b>' . $row['field'] . '</b></p>
                                <p><b>Qualifications: </b>' . $row['credentials'] . '</p>
                                <p><b>Contact: </b>' . $row['contact'] . '</p>
                            </div>
                        </div>
                    </div>                  
                    ';
                }

                ?>
            </div>
        </div>
    </div>

    <div class="blogs">
        <div class="container">
            <h1 class="text-center my-5 clr">Our Blogs</h1>
            <div class="row">
                <div class="col-sm-12 col-md-6 p-2 text-center">
                    <figure class="figure">
                        <iframe src="https://www.youtube.com/embed/PrXoR_VbDhM?si=TPyckFcrVFkgz-_3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <figcaption class="h3">Mother Cat and Kittens Reunited</figcaption>
                    </figure>
                </div>
                <div class="col-sm-12 col-md-6 p-2 text-center">
                    <figure class="figure">
                        <iframe src="https://www.youtube.com/embed/5530I_pYjbo?si=z2jJ6lHthPqFR7c_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <figcaption class="h3">How to train cat</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="contact bg-dark text-white p-4" id="contact">
        <div class="container">
            <h1 class="text-center pb-2 clr">Contact Us</h1>
            <div class="row text-center p-2">
                <div class="col-sm-12 col-md-3">
                    <p><i class="fa fa-question-circle"></i> Have questions? Reach out to us!</p>
                </div>
                <div class="col-sm-12 col-md-3">
                    <p><i class="fa fa-envelope"></i> Email: <a class="text-white" href="nafisa.lubaba.prithula@g.bracu.ac.bd">pawcare@gmail.com</a></p>
                </div>
                <div class="col-sm-12 col-md-2">
                    <p><i class="fa fa-phone-square"></i> Phone: (123) 456-7890</p>
                </div>
                <div class="col-sm-12 col-md-2">
                    <p><i class="fa fa-map-marker"></i> Location: 512/A, Dhaka</p>
                </div>
                <div class="col-sm-12 col-md-2">
                    <button class="me-4 btn btn-orange" onclick="Android.onFacebookClick()"><i class="fa fa-facebook-official text-white"></i></button>
                    <button class="btn btn-orange" onclick="Android.onWhatsappClick()"><i class="fa fa-whatsapp text-white"></i></button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
<?php
$conn->close();
?>