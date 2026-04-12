<?php
session_start();
include("db.php"); // Ensure $con is defined in this file

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // --- REGISTRATION LOGIC ---
    if (isset($_POST['register_user'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email    = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        $gender   = mysqli_real_escape_string($con, $_POST['gender']);
        $plan     = mysqli_real_escape_string($con, $_POST['plan']);
        $payment  = mysqli_real_escape_string($con, $_POST['payment']);
        $date     = mysqli_real_escape_string($con, $_POST['date']);
        $address  = mysqli_real_escape_string($con, $_POST['address']);

        if (!empty($email) && !empty($password)) {
            $query = "INSERT INTO form (name, email, password, gender, plan, payment, date, address) 
                      VALUES ('$username', '$email', '$password', '$gender', '$plan', '$payment', '$date', '$address')";
            
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Registration Successful! Welcome $username');</script>";
            }
        }
    }

    // --- LOGIN LOGIC ---
    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);

        if (!empty($email) && !empty($password)) {
            $query = "SELECT * FROM form WHERE email = '$email' AND password = '$password' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $_SESSION['user_email'] = $email;
                echo "<script>alert('Login Successful!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Invalid Email or Password!');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerFit Gym</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="script.js" defer></script>
    <style>

    </style>
</head>

<body>

    <header>
        <div class="logo">PowerFit</div>

        <input type="checkbox" id="menu-bar">

        <label for="menu-bar" class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </label>

        <nav>
            <a href="#">Home</a>
            <a href="#about">About</a>
            <a href="#programs">Programs</a>
            <a href="#trainers">Trainers</a>
            <a href="#membership">Membership</a>
            <a href="#gallery">Gallery</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>



    <section class="hero">

        <div>
            <h1>Transform Your Body</span><br>Transform Your Life</h1>
            <p>Train with professional coaches and world class equipment</p>
            <a href="#contact" class="btn">Join Now</a>
        </div>

    </section>

    <!-- about section -->

    <h2 class="title about-mm"><span>About</span> Our Gym</h2>

    <section class="about-section" id="about">

        <div class="container">
            <div class="about-image">
                <img src="img/about.jpg" alt="Modern Gym Interior">
            </div>

            <div class="about-content">
                <!-- <span class="section-title">About Our Gym</span> -->
                <h2 class="sub-heading">Crush Your Limits & <span>Redefine</span> Your Strength.</h2>

                <p class="description">
                    Welcome to the ultimate fitness sanctuary. We don't just provide equipment; we provide a high-octane
                    environment designed to push you beyond your perceived boundaries. Our state-of-the-art facility
                    combines elite coaching with cutting-edge technology to help you transform your physique and your
                    mindset.
                </p>

                <div class="btn-group">
                    <a href="#" class="btn btn-primary">Start Training</a>
                    <a href="#" class="btn btn-secondary">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="my-about">
        <div class="about-container">

            <div>
                <h1 class="counter">500+</h1>
                <p>Members</p>
            </div>

            <div>
                <h1 class="counter">15+</h1>
                <p>Professional Trainers</p>
            </div>

            <div>
                <h1 class="counter">10+</h1>
                <p>Years Experience</p>
            </div>

        </div>
    </section>


    <section id="programs">
        <h2 class="title">Our Programs</h2>

        <div class="programs">

            <a href="pop.html">
                <div class="tilt-card" data-tilt>
                    <i class="fas fa-dumbbell"></i>
                    <h3>WEIGHT TRAINING</h3>
                    <p>Advanced hypertrophy and strength cycles.</p>
                </div>
            </a>

            <div class="tilt-card" data-tilt>
                <i class="fas fa-bolt"></i>
                <h3>CROSSFIT</h3>
                <p>High-octane functional movements.</p>
            </div>

            <div class="tilt-card" data-tilt>
                <i class="fas fa-yin-yang"></i>
                <h3>YOGA</h3>
                <p>Flexibility meets mental clarity.</p>
            </div>

            <div class="tilt-card" data-tilt>
                <i class="fas fa-yin-yang"></i>
                <h3>YOGA</h3>
                <p>Flexibility meets mental clarity.</p>
            </div>

            <div class="tilt-card" data-tilt>
                <i class="fas fa-yin-yang"></i>
                <h3>YOGA</h3>
                <p>Flexibility meets mental clarity.</p>
            </div>

            <div class="tilt-card" data-tilt>
                <i class="fas fa-dumbbell"></i>
                <h3>WEIGHT TRAINING</h3>
                <p>Advanced hypertrophy and strength cycles.</p>
            </div>
            <div class="tilt-card" data-tilt>
                <i class="fas fa-dumbbell"></i>
                <h3>WEIGHT TRAINING</h3>
                <p>Advanced hypertrophy and strength cycles.</p>
            </div>

            <div class="tilt-card" data-tilt>
                <i class="fas fa-bolt"></i>
                <h3>CROSSFIT</h3>
                <p>High-octane functional movements.</p>
            </div>

        </div>

    </section>

    <!-- about finished -->


    <!-- snipts add trainers section -->

    <section id="trainers">

        <h2 class="title">Our Trainers</h2>

        <div class="trainers">

            <div class="trainer">
                <img src="img/1jpg.avif">
                <h3>John Carter</h3>
                <p>Strength Coach</p>
                <div class="social">
                    <a
                        href="https://www.instagram.com/p/DDkJc92zK9T/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                </div>
            </div>

            <div class="trainer">
                <img src="img/2.avif">
                <h3>Emily Rose</h3>
                <p>Yoga Trainer</p>
                <div class="social">
                    <a
                        href="https://www.instagram.com/p/DDkJc92zK9T/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                </div>
            </div>

        </div>

    </section>

    <!-- trainer section -->
    <div class="section-header">
        <h2>Expert Trainers</h2>
    </div>

    <div class="slider-wrapper">
        <button class="nav-btn prev" onclick="scrollSlider(-1)"><i class="fas fa-chevron-left"></i></button>

        <div class="trainer-slider" id="trainerSlider">
            <div class="trainer-card">
                <div class="image-box">
                    <img src="img/img1.jpg" alt="Trainer">
                </div>
                <div class="info-box">
                    <h3 class="trainer-name">Marcus Chen</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                        <span>(5.0)</span>
                    </div>
                    <p class="trainer-bio">Specializing in high-intensity strength training and professional
                        bodybuilding prep.</p>
                    <a href="#" class="btn-view">View Profile</a>
                </div>
            </div>

            <div class="trainer-card">
                <div class="image-box">
                    <img src="img/img2.jpg" alt="Trainer">
                </div>
                <div class="info-box">
                    <h3 class="trainer-name">Elena Rodriguez</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="far fa-star"></i>
                        <span>(4.8)</span>
                    </div>
                    <p class="trainer-bio">Expert in functional mobility and yoga-infused strength conditioning for all
                        levels.</p>
                    <a href="#" class="btn-view">View Profile</a>
                </div>
            </div>

            <div class="trainer-card">
                <div class="image-box">
                    <img src="img/2.avif" alt="Trainer">
                </div>
                <div class="info-box">
                    <h3 class="trainer-name">David Vane</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        <span>(4.9)</span>
                    </div>
                    <p class="trainer-bio">Certified nutrition specialist focused on weight management and lean muscle
                        gain.</p>
                    <a href="#" class="btn-view">View Profile</a>
                </div>
            </div>

            <div class="trainer-card">
                <div class="image-box">
                    <img src="img/4.avif" alt="Trainer">
                </div>
                <div class="info-box">
                    <h3 class="trainer-name">Sarah Jenkins</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                        <span>(5.0)</span>
                    </div>
                    <p class="trainer-bio">Powerlifting champion with a focus on core stability and explosive power
                        techniques.</p>
                    <a href="#" class="btn-view">View Profile</a>
                </div>
            </div>


            <div class="trainer-card">
                <div class="image-box">
                    <img src="img/img1.jpg" alt="Trainer">
                </div>
                <div class="info-box">
                    <h3 class="trainer-name">Marcus Chen</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                        <span>(5.0)</span>
                    </div>
                    <p class="trainer-bio">Specializing in high-intensity strength training and professional
                        bodybuilding prep.</p>
                    <a href="#" class="btn-view">View Profile</a>
                </div>
            </div>


        </div>
        <button class="nav-btn next" onclick="scrollSlider(1)"><i class="fas fa-chevron-right"></i></button>
    </div>
    <!-- trainer section finished -->






    <section id="membership">

        <h2 class="title">Membership Plans</h2>

        <div class="plans">

            <div class="plan">
                <h3>Basic</h3>
                <h1>$29</h1>
                <p>Gym Access</p>
                <p>Basic Equipment</p>
                <a href="#contact" class="btn">Join</a>
            </div>

            <div class="plan">
                <h3>Premium</h3>
                <h1>$59</h1>
                <p>All Equipment</p>
                <p>Group Classes</p>
                <a href="#contact" class="btn">Join</a>
            </div>

            <div class="plan">
                <h3>Elite</h3>
                <h1>$99</h1>
                <p>Personal Trainer</p>
                <p>Diet Plan</p>
                <a href="#contact" class="btn">Join</a>
            </div>

        </div>

    </section>



    <section hidden id="gallery">

        <h2 class="title">Gallery</h2>

        <div class="gallery">

            <img src="img/hero.jpg" alt="Gym Interior">
            <img src="img/4.avif" alt="Gym Equipment">
            <img src="img/img2.jpg" alt="Fitness Class">
            <img src="img/1jpg.avif" alt="Personal Training">

        </div>
        <div class="more-img" style="text-align: center;">
            <button class="btn" style="margin-top: 20px;">More images</button>
        </div>

    </section>


    <section id="gallery" class="gallery-section">
        <h2>Gallery</h2>

        <div class="gallery-container" id="gallery-wrapper">
            <div class="gallery-item"><img src="img/hero.jpg" alt="Gym 1"></div>
            <div class="gallery-item"><img src="img/4.avif" alt="Gym 2"></div>
            <div class="gallery-item"><img src="img/img2.jpg" alt="Gym 3"></div>
            <div class="gallery-item"><img src="img/1jpg.avif" alt="Gym 4"></div>

            <div class="gallery-item hidden"><img src="img/img1.jpg" alt="Gym 5"></div>
            <div class="gallery-item hidden"><img src="img/about.jpg" alt="Gym 6"></div>
            <div class="gallery-item hidden"><img src="img/1jpg.avif" alt="Gym 7"></div>
            <div class="gallery-item hidden"><img src="img/4.avif" alt="Gym 8"></div>

            <div class="gallery-item hidden"><img src="img/img2.jpg" alt="Gym 9"></div>
            <div class="gallery-item hidden"><img src="img/hero.jpg" alt="Gym 10"></div>
            <div class="gallery-item hidden"><img src="img/1jpg.avif" alt="Gym 11"></div>
            <div class="gallery-item hidden"><img src="img/4.avif" alt="Gym 12"></div>


            <div class="gallery-item hidden"><img src="img/img2.jpg" alt="Gym 9"></div>
            <div class="gallery-item hidden"><img src="img/hero.jpg" alt="Gym 10"></div>
            <div class="gallery-item hidden"><img src="img/1jpg.avif" alt="Gym 11"></div>
            <div class="gallery-item hidden"><img src="img/4.avif" alt="Gym 12"></div>

            <div class="gallery-item hidden"><img src="img/img2.jpg" alt="Gym 9"></div>
            <div class="gallery-item hidden"><img src="img/hero.jpg" alt="Gym 10"></div>
            <div class="gallery-item hidden"><img src="img/1jpg.avif" alt="Gym 11"></div>
            <div class="gallery-item hidden"><img src="img/4.avif" alt="Gym 12"></div>
        </div>

        <button id="load-more-btn" class="btn">MORE IMAGES</button>
    </section>




    <!-- form  -->

    <section class="form-container" id="contact">

        <h2 class="title">Contact Us</h2>

        <div class="form-wrapper">
            <div class="form-tabs">
                <div class="tab active" onclick="switchTab('login')">Login</div>
                <div class="tab" onclick="switchTab('register')">Register</div>
            </div>

            <!-- <form id="loginForm" class="form-content active" onsubmit="handleLogin(event)"> -->
                <form id="loginForm" class="form-content active" method="POST" action="" >

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="prem@example.com" name="email" required>
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" placeholder="enter your password" name="pass" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember" required name="checkbox">
                    <label for="remember">I agree to the terms and conditions</label>
                </div>
                <button type="submit" class="submit-btn"  name="login_user">Login to Account</button>
              
            </form>

            <!-- <form method="POST" id="registerForm" class="form-content" onsubmit="handleRegister(event)"> -->
            <form id="registerForm" class="form-content" method="POST" action="" >
                <div class="grid-row">
                    <div class="input-group">
                        <label>Name</label>
                        <input type="text" placeholder="Full Name" name="username" required>
                    </div>
                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="input-group">
                    <label>Passwore</label>
                    <input type="password" placeholder="Password" name="pass" required>
                </div>

                <div class="input-group">
                    <label>Gender</label>
                    <select required class="ls" name="gender">
                        <option value="">Select Method</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>



                <div class="grid-row">
                    <div class="input-group">
                        <label>Membership Plan</label>
                        <select required class="ls" name="plan">
                            <option value="">Select Plan</option>
                            <option value="monthly">Monthly Plan</option>
                            <option value="yearly">Yearly Plan</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Payment Method</label>
                        <select required class="ls" name="payment">
                            <option value="">Select Method</option>
                            <option value="card">Credit Card</option>
                            <option value="upi">UPI / Digital Wallet</option>
                            <option value="cash">Bank Transfer</option>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <label>Preferred Payment Date</label>
                    <input type="date" required name="date">
                </div>

                <div class="input-group">
                        <label>Address</label>
                        <input type="text" placeholder="your address" name="address" required>
                    </div>

                <!-- <div hidden class="input-group">
                    <label>Medical Conditions (if any)</label>
                    <textarea rows="2" placeholder="Describe briefly..."></textarea>
                </div> -->
                <button type="submit" name="register_user" class="submit-btn">Complete Registration</button>   
             </form>
        </div>

    </section>

    <!-- form finished -->





    <footer>
        <p>© 2026 PowerFit Gym | All Rights Reserved</p>
    </footer>

</body>

</html>