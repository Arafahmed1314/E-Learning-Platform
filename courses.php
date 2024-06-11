<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Website</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="courses.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img class="nav-img" src="images/logo.jpg" alt="logo">Infinity
        </a>
        <form class="form-inline my-2 my-lg-0 ml-3">
            <input class="form-control mr-sm-2" id="search-bar" type="text" placeholder="Search" aria-label="Search">
        </form>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="night-mode-toggle">Night Mode</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <h5 class="sidebar-heading">My Courses</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showCourse('course1')">Web Development</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showCourse('course2')">Software Engineering</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showCourse('course3')">Operating System</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showCourse('course4')">Data Communication</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showCourse('course5')">EEE 205</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-8 main-content">
                <div id="course1" class="course-content active">
                    <h3 id="course1-heading" class="course-heading active">Web Development</h3>
                    <div class="video-content row"></div>
                </div>

                <div id="course2" class="course-content">
                    <h3 id="course2-heading" class="course-heading">Software Engineering</h3>
                    <div class="video-content row"></div>
                </div>

                <div id="course3" class="course-content">
                    <h3 id="course3-heading" class="course-heading">Operating System</h3>
                    <div class="video-content row"></div>
                </div>
                <div id="course4" class="course-content">
                    <h3 id="course4-heading" class="course-heading">Data Communication</h3>
                    <div class="video-content row"></div>
                </div>
                <div id="course5" class="course-content">
                    <h3 id="course5-heading" class="course-heading">EEE 205</h3>
                    <div class="video-content row"></div>
                </div>
            </div>

            <div class="col-md-2 right-sidebar">
                <h5>Other Courses</h5>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="https://www.w3schools.com/c/c_intro.php"
                            target="_blank">C Programming</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="https://www.geeksforgeeks.org/introduction-to-algorithms/"
                            target="_blank">Algorithm</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://www.geeksforgeeks.org/data-structures/"
                            target="_blank">Data Structure</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="https://www.javatpoint.com/java-oops-concepts"
                            target="_blank">OOP Basic</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="https://youtu.be/O0gtKDu_cJc?si=vDCMGFVU80G7gynm"
                            target="_blank">Digital Logic</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="https://youtu.be/L9X7XXfHYdU?si=pOZlT-uKCbBe6EIk"
                            target="_blank">Architecture </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="https://youtu.be/Uhr1DokOojs?si=ERS05-P7xfYt8RPs"
                            target="_blank">Discrete Mathematics</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="courses.js"></script>
</body>

</html>