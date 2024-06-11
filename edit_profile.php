<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inifinity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_personal_form = isset($_POST['personal']);
    $is_advanced_form = isset($_POST['advanced']);

    $profile_photo = '';
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $profile_photo = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert or update personal information
    if ($is_personal_form) {
        $name = sanitize_input($_POST['name']);
        $username = sanitize_input($_POST['username']);
        $country = sanitize_input($_POST['country']);
        $university = sanitize_input($_POST['university']);
        $semester = sanitize_input($_POST['semester']);
        $batch = sanitize_input($_POST['batch']);

        // Check if a record with this username already exists
        $check_sql = "SELECT * FROM user_profiles WHERE username='$username'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Update the existing record
            $update_sql = "UPDATE user_profiles SET name='$name', country='$country', university='$university', semester='$semester', batch='$batch'";
            if ($profile_photo) {
                $update_sql .= ", profile_photo='$profile_photo'";
            }
            $update_sql .= " WHERE username='$username'";

            if ($conn->query($update_sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            // Insert a new record
            $insert_sql = "INSERT INTO user_profiles (name, username, country, university, semester, batch, profile_photo)
                            VALUES ('$name', '$username', '$country', '$university', '$semester', '$batch', '$profile_photo')";

            if ($conn->query($insert_sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    }

    // Insert or update advanced information
    if ($is_advanced_form) {
        $username = sanitize_input($_POST['username']);
        $permanent_address = sanitize_input($_POST['permanent-address']);
        $present_address = sanitize_input($_POST['present-address']);
        $phone = sanitize_input($_POST['phone']);
        $birthdate = sanitize_input($_POST['birthdate']);
        $gender = sanitize_input($_POST['gender']);
        $religion = sanitize_input($_POST['religion']);

        // Check if a record with this username already exists
        $check_sql = "SELECT * FROM user_profiles WHERE username='$username'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Update the existing record
            $update_sql = "UPDATE user_profiles SET permanent_address='$permanent_address', present_address='$present_address', phone='$phone', birthdate='$birthdate', gender='$gender', religion='$religion'";
            if ($profile_photo) {
                $update_sql .= ", profile_photo='$profile_photo'";
            }
            $update_sql .= " WHERE username='$username'";

            if ($conn->query($update_sql) === TRUE) {
                echo "<script>alert('Record updated successfully');</script>";
            } else {
                echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Invalid username');</script>";
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="edit_profile.css">
    <style>

    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>Edit Your Profile</h2>
        </div>
        <div class="content">
            <div class="profile-section">
                <img id="profile-photo" src="images/logo.jpg" alt="Profile Photo">
                <input type="file" id="file-input" name="img" accept="image/*">
                <label for="file-input"><i class="fas fa-camera"></i> CHANGE PHOTO</label>
            </div>
            <div class="form-section">
                <div class="tabs">
                    <button class="active" onclick="openTab(event, 'Personal')">Personal</button>
                    <button onclick="openTab(event, 'Advanced')">Advanced</button>
                    <button onclick="openTab(event, 'Dashboard')">Dashboard</button>

                </div>
                <div id="Personal" class="tab-content active">
                    <form method="post" action="edit_profile.php" enctype="multipart/form-data">
                        <input type="hidden" name="personal" value="1">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="araf">
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="araf_143">
                        </div>
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <input type="text" id="country" name="country" value="Bangladesh">
                        </div>
                        <div class="form-group">
                            <label for="university">University:</label>
                            <input type="text" id="university" name="university" value="GREEN UNIVERSITY OF BANGLADESH">
                        </div>
                        <div class="form-group">
                            <label for="semester">Current Semester:</label>
                            <input type="text" id="semester" name="semester" value="6th">
                        </div>
                        <div class="form-group">
                            <label for="batch">Batch:</label>
                            <input type="text" id="batch" name="batch" value="221">
                        </div>
                        <div class="button-group">
                            <input type="button" value="Cancel">
                            <input type="submit" value="Save">
                        </div>
                    </form>

                </div>
                <div id="Dashboard" class="tab-content">
                    <h3>Dashboard Content</h3>
                    <p>Hello Mam</p>
                </div>
                <div id="Advanced" class="tab-content">
                    <form method="post" action="edit_profile.php" enctype="multipart/form-data">
                        <input type="hidden" name="advanced" value="1">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="araf_143">
                        </div>
                        <div class="form-group">
                            <label for="permanent-address">Permanent Address:</label>
                            <input type="text" id="permanent-address" name="permanent-address"
                                value="Cumilla, Bangladesh">
                        </div>
                        <div class="form-group">
                            <label for="present-address">Present Address:</label>
                            <input type="text" id="present-address" name="present-address" value="Dhaka, Bangladesh">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" value="01234324232">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birthdate:</label>
                            <input type="date" id="birthdate" name="birthdate" value="2002-01-01">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="religion">Religion:</label>
                            <input type="text" id="religion" name="religion" value="Islam">
                        </div>
                        <div class="button-group">
                            <input type="button" value="Cancel">
                            <input type="submit" value="Save">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
            tabcontent[i].classList.remove("active");
        }
        tablinks = document.getElementsByClassName("tabs")[0].getElementsByTagName("button");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        document.getElementById(tabName).classList.add("active");
        evt.currentTarget.className += " active";
    }

    // const fileInput = document.getElementById('file-input');
    // const profilePhoto = document.getElementById('profile-photo');

    // fileInput.addEventListener('change', function () {
    //     const file = fileInput.files[0];
    //     if (file) {
    //         const reader = new FileReader();
    //         reader.onload = function (e) {
    //             profilePhoto.src = e.target.result;
    //         };
    //         reader.readAsDataURL(file);
    //     }
    // });
    </script>
</body>

</html>