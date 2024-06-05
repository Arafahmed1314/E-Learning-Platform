<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inifinity";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $_SESSION['id'] = $row['id'];

        echo '<script>alert("Login successful");</script>';
        header("Location: index.php?pass=1");
        exit();
    } else {
        echo '<script>alert("Invalid email or password");</script>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $existing = "SELECT * FROM users WHERE email='$email'";
    $exit_result = $conn->query($existing);

    if ($exit_result->num_rows > 0) {
        echo '<script>alert("User already exists");</script>';
    } else {
        $insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insert) === TRUE) {
            echo '<script>alert("Registration successful");</script>';
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();


$loggedIn = false;
if ($_GET['pass'] == 1) {
    $loggedIn = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFINITY</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="profile-popup.css">
    <link rel="stylesheet" href="contact.css">

</head>


<body>
    <?php
    if ($loggedIn) {
        echo "<style>.profile-btn { display: block; }</style>";
    } else
        echo "<style>.login-btn { display: block; }</style>";

    ?>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn bx bx-menu"></span>
            <a href="#" class="logo">
                <img src="images/logo.jpg" alt="logo">
                <h2>Infinity</h2>
            </a>
            <div class="nav-search">

                <input type="text" class="nav-input" placeholder="What do you want to Learn">
                <i class="fa-solid fa-magnifying-glass"></i>

            </div>
            <ul class="links">
                <span class="close-btn bx bx-x"></span>
                <div class="dropdown">
                    <li class="dropbtn">
                        Explore Courses
                        <svg aria-hidden="true" fill="none" focusable="false" height="12" viewBox="0 0 16 16" width="12"
                            id="cds-react-aria-1" class="css-0">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M8 11.293L1.354 4.646l-.708.708L8 12.707l7.354-7.353-.707-.708L8 11.293z"
                                fill="currentColor"></path>
                        </svg>
                    </li>
                    <div class="dropdown-content">
                        <a href="https://www.w3schools.com/dsa/dsa_intro.php" target="_blank">Data Structure</a>
                        <a href="https://www.w3schools.com/c/" target="_blank">C program</a>
                        <a href="https://www.geeksforgeeks.org/fundamentals-of-algorithms/"
                            target="_blank">Algorithms</a>
                        <a href="https://www.w3schools.com/whatis/" target="_blank">Web Programming</a>
                        <a href="https://youtu.be/qVY9WG6Zvlg?si=FO8KhXhLgUFRPQjx" target="_blank">Mathematics</a>
                        <a href="https://youtu.be/L9X7XXfHYdU?si=7W5evXgLdtUUWkTb" target="_blank">Computer Arch</a>
                    </div>
                </div>
                <li><a href="#course">Courses</a></li>
                <li><a href="#">Contact us</a></li>
                <li>
                    <a href="#" class="login-btn">LOG IN</a>
                    <a href="profile.php" class="profile-btn">Profile</a>
                    <div class="profile-popup-container">
                        <div class="box">
                            <button>Hackos: 2054</button>
                        </div>
                        <div class="box">Profile</div>
                        <div class="box boxs">
                            <div class="part">Dark Mode</div>
                            <label class="toggle-switch">
                                <input type="checkbox" id="darkModeToggle">
                                <span class="slider"></span>
                            </label>
                        </div>
                        <div class="box">Leaderboard</div>
                        <div class="box">Settings</div>
                        <div class="box">Bookmarks</div>
                        <div class="box">Submissions</div>
                        <div class="box">Logout</div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn bx bx-x"></span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay
                    connected with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="index.php" method="post">
                    <div class="input-field">
                        <input type="connection.php" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <a href="#" class="forgot-pass-link">Forgot
                        password?</a>
                    <button type="submit" name="login">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Create Account</h2>
                <p>To become a part of our community, please sign up using
                    your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="index.php" method="post">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Enter username</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Create password</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy" required>
                        <label for="policy">
                            I agree the
                            <a href="#" class="option">Terms &
                                Conditions</a>
                        </label>
                    </div>
                    <button type="submit" name="signup">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account?
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>

    <main class="main">
        <section class="banner">
            <div class="container">
                <div class="banner-inner">
                    <h1>No application needed, ever―just start learning and show us you’re ready</h1>
                    <p>You need to get a house when you go to campus, you have to pay for food. If you do it online, you
                        can do it from your home. I was able to complete the degree while working full-time as a game
                        designer.</p>
                    <button class="btn">
                        Get Started<i class="bx bx-right-arrow-alt"></i>
                    </button>
                </div>
                <img class="banner-image"
                    src="https://images.pexels.com/photos/4144923/pexels-photo-4144923.jpeg?auto=compress&cs=tinysrgb&w=600"
                    alt="Illustration">
            </div>
        </section>
    </main>

    <section id="overview">
        <div class="overview-container">
            <h1>Invest in your varsity life with Infinity</h1>
            <p class="overview_first_para">Get access to videos in over 90%
                of courses, Specializations,
                and Professional Certificates taught by top instructors from
                leading universities and companies.</p>
            <div class="overview-inner-container">
                <div class="overview-wrapper">
                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/learn.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Learn anything</p>
                            <p>Explore any interest or trending topic, take
                                prerequisites, and advance your skills</p>

                        </div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/money.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Save money</p>
                            <p>Spend less money on your learning if you plan
                                to take multiple courses this year</p>

                        </div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/flexible.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Flexible learning</p>
                            <p>Learn at your own pace, move between multiple
                                courses, or switch to a different course</p>

                        </div>
                    </div>

                    <div class="overview-card">
                        <div class="overview-img">
                            <img src="images/certificates.png" alt>
                        </div>
                        <div class="overview-desc">
                            <p>Unlimited certificates</p>
                            <p>Earn a certificate for every learning program
                                that you complete at no additional cost</p>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div id="courses">
        <h1 class="heading">All Courses We Offer</h1>
        <div class="slide-container swiper ">
            <div class="slide-content mySwiper">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img class="card-img" src="images/cse.avif" alt>
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">CSE</h2>
                            <p class="description">The CSE course provides comprehensive content and hands-on projects
                                that enhance coding skills effectively</p>
                            <button class="button">View More</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img class="card-img" src="images/algorithm.avif" alt>
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">ALGORITHM</h2>
                            <p class="description">"The Algorithm course brilliantly simplifies complex concepts with
                                clear explanations and practical examples."</p>
                            <button class="button">View More</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img class="card-img" src="images/chem.avif" alt>
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">CHEMISTRY</h2>
                            <p class="description">The Chemistry course on this e-learning platform makes complex
                                concepts easy to understand with clear lessons and practical examples.</p>
                            <button class="button">View More</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img class="card-img" src="images/english.avif" alt>
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">ENGLISH</h2>
                            <p class="description">"The English course provides excellent lessons and interactive
                                activities that significantly improve language skills."</p>
                            <button class="button">View More</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img class="card-img" src="images/phy.avif" alt>
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">PHYSICS</h2>
                            <p class="description">"The Physics course delivers complex concepts in a clear and engaging
                                manner, making learning both enjoyable and effective."</p>
                            <button class="button">View More</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
                            <div class="card-image">
                                <img class="card-img" src="images/math.avif" alt>
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name">MATH</h2>
                            <p class="description">"The Math course offers clear explanations and engaging exercises
                                that make learning enjoyable and effective.".</p>
                            <button class="button">View More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="feedback-main-container">


        <div class="feedback-container">
            <h2>Why People Choose Infinity For Their Career</h2>
            <div class="grid">

                <div class="card">
                    <div class="flex-center">
                        <img src="https://i.pinimg.com/564x/37/41/09/37410992b40c6df7ca8ac0590219393e.jpg"
                            alt="Felipe M.">
                        <div>
                            <h3>Abdul Fattah</h3>
                            <p class="meta">Learner since 2021</p>
                        </div>
                    </div>
                    <details>
                        <summary>"TYour e-learning platform has completely transformed my approach to online education.
                            The courses are well-structured, engaging, and incredibly informative. </summary>
                        <p>Thank you for providing such a valuable resource!"

                            "</p>
                    </details>
                </div>

                <div class="card">
                    <div class="flex-center">
                        <img src="https://i.pinimg.com/736x/70/5e/d1/705ed1090f270ed99c90b2d312bd34bd.jpg">
                        <div>
                            <h3>Naimul Islam</h3>
                            <p class="meta">Learner since 2023</p>
                        </div>
                    </div>
                    <details>
                        <summary>"I am thoroughly impressed with the quality of content on your e-learning website. The
                            user-friendly interface and diverse course offerings make learning enjoyable</summary>
                        <p>and effective. Keep up the great work!""</p>
                    </details>
                </div>

                <div class="card">
                    <div class="flex-center">
                        <img src="https://i.pinimg.com/736x/1e/97/9a/1e979ac127d600837d47795dd53ca9df.jpg"
                            alt="Felipe M.">
                        <div>
                            <h3>Sajal Bhuiyan</h3>
                            <p class="meta">Learner since 2024</p>
                        </div>
                    </div>
                    <details>
                        <summary>"Your e-learning website stands out for its exceptional educational content and
                            seamless user experience. The courses are comprehensive </summary>
                        <p>Thank you for making learning accessible and enjoyable!"</p>
                    </details>

                </div>

                <div class="card">
                    <div class="flex-center">
                        <img src="https://i.pinimg.com/564x/36/e5/d6/36e5d6fa800c912adfc980fb57f49934.jpg"
                            alt="Felipe M.">
                        <div>
                            <h3>Shahriar Mustak</h3>
                            <p class="meta">Learner since 2018</p>
                        </div>
                    </div>
                    <details>
                        <summary>"This e-learning site is a game-changer! The interactive lessons and expert
                            instructors have helped me gain new skills and confidence in my field.</summary>
                        <p>I highly recommend this
                            platform to anyone looking to enhance their knowledge."</p>
                    </details>
                </div>

            </div>
        </div>
    </div>
    <!-- Instructor Section -->
    <section class="instructor-section">

        <img src="https://s.udemycdn.com/home/non-student-cta/instructor-1x-v3.jpg" alt="Instructor Image">

        <div class="instructor-text">
            <h2>Become an instructor</h2>
            <p>Instructors from around the world teach millions of learners on Infinity. We provide the tools and skills
                to
                teach what you love.</p>
            <button>Start teaching today</button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section">
            <h3>Infinity EdTech</h3>
            <ul>
                <li><a href="#">Teach on Infinity</a></li>
                <li><a href="#">Get the app</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Careers</h3>
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Help and Support</a></li>
                <li><a href="#">Affiliate</a></li>
                <li><a href="#">Investors</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h3>Terms</h3>
            <ul>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Cookie settings</a></li>
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">Accessibility statement</a></li>
            </ul>
        </div>
        <div class="footer-section footer-right">
            <button>English</button>
            <ul class="contact-link">
                <li><a href="https://github.com/Arafahmed1314" target="_blank"><i class="fa-brands fa-github"></i></a>
                </li>
                <li><a href="https://www.facebook.com/Araf1314/" target="_blank"><i
                            class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/md-naimul-islam-068b9018b/" target="_blank"><i
                            class="fa-brands fa-linkedin"></i></a></li>

            </ul>
            <p>&copy; 2024 Infinity, Inc.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="script.js">
    </script>

</body>

</html>