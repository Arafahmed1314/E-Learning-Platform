<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["id"];

$conn = new mysqli("localhost", "root", "", "inifinity");

$sql = "SELECT * FROM users WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $user_id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<!-- background-color: #006666; -->

<body class="dark-mode">
    <div class="container">
        <div class="header">
            <h1>User Profile</h1>
            <button class="theme-toggle">Toggle Theme</button>
        </div>
        <div class="main-content">
            <div class="profile-card">
                <div class="text-center">
                    <img class="profile-picture" src="https://via.placeholder.com/100" alt="Profile Picture">
                    <h2><?php echo "$username" ?></h2>
                    <p class="username"><?php echo "$username _" ?><?php echo (rand(1000, 10)); ?></p>
                    <p class="rank">Rank <?php echo "$user_id" ?></p>
                    <p class="role">STUDENT</p>
                    <button class="edit-profile">Edit Profile</button>
                </div>
                <div class="profile-details">
                    <p class="detail-item"><img class="icon"
                            src="https://img.icons8.com/material-outlined/24/ffffff/marker.png" alt>Bangladesh</p>
                    <p class="detail-item"><img class="icon"
                            src="https://img.icons8.com/material-outlined/24/ffffff/university.png" alt>GREEN UNIVERSITY
                        OF BANGLADESH</p>
                    <p class="detail-item"><img class="icon"
                            src="https://img.icons8.com/material-outlined/24/ffffff/email.png"
                            alt><?php echo "$email" ?></p>
                    <p class="detail-item"><img class="icon"
                            src="https://img.icons8.com/material-outlined/24/ffffff/password.png"
                            alt><?php echo "$password" ?></p>
                    <div class="badges">
                        <span class="badge">c</span>
                        <span class="badge">java</span>
                        <span class="badge">javascript</span>
                        <span class="badge">c++</span>
                        <span class="badge">reactjs</span>
                    </div>
                </div>
                <div class="community-stats">
                    <h3>Community Stats</h3>
                    <div class="stats-details">
                        <p>Views: <?php echo (rand(15, 0)); ?>K <span class="stats-update">(Last week:
                                +<?php echo (rand(100, 10)); ?>)</span></p>
                        <p>Solutions: <?php echo (rand(50, 0)); ?> <span class="stats-update">(Last
                                week: <?php echo (rand(10, 0)); ?>)</span></p>
                        <p>Discuss: <?php echo (rand(10, 0)); ?> <span class="stats-update">(Last week:
                                <?php echo (rand(5, 0)); ?>)</span></p>
                        <p>Reputation: <?php echo (rand(100, 10)); ?> <span class="stats-update">(Last
                                week: +<?php echo (rand(10, 0)); ?>)</span></p>
                    </div>
                </div>
            </div>
            <div class="content-section">
                <div class="content-card">
                    <h2>Student Rating</h2>
                    <div class="contest-rating">
                        <p class="rating-score"><?php echo (rand(10000, 10)); ?></p>
                        <p class="global-ranking">Global Ranking:
                            <?php echo (rand(1000000, 10)); ?>
                        </p>
                        <p class="attended">Attended: 3</p>
                    </div>
                </div>
                <div class="solved-problems-section">
                    <div class="content-card solved-problems">
                        <h2>Solved Problems</h2>
                        <div class="text-center">
                            <p class="solved-total"><?php echo (rand(1000, 0)); ?></p>
                            <p class="total-problems">of 3156</p>
                            <div class="problems-difficulty">
                                <div class="difficulty-item">
                                    <p class="difficulty-title">Easy</p>
                                    <p class="difficulty-count"><?php echo (rand(400, 0)); ?>/795</p>
                                </div>
                                <div class="difficulty-item">
                                    <p class="difficulty-title">Medium</p>
                                    <p class="difficulty-count"><?php echo (rand(1500, 50)); ?>/1657</p>
                                </div>
                                <div class="difficulty-item">
                                    <p class="difficulty-title">Hard</p>
                                    <p class="difficulty-count"><?php echo (rand(400, 10)); ?>/704</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Badges -->
                    <div class="content-card badges-section">
                        <h2>Badges</h2>
                        <div class="badges-display">
                            <img class="badge" src="https://via.placeholder.com/50" alt="Badge 1">
                            <img class="badge" src="https://via.placeholder.com/50" alt="Badge 2">
                        </div>
                        <p class="recent-badge-label">Most Recent Badge</p>
                        <p class="recent-badge">50 Days Badge 2024</p>
                    </div>
                </div>
                <!-- Recent Submissions -->
                <div class="content-card recent-submissions">
                    <h2>Recent Submissions</h2>
                    <ul class="submission-list">
                        <li class="submission-item">Excel Sheet Column
                            Number <span class="submission-time">an hour
                                ago</span></li>
                        <li class="submission-item">Excel Sheet Column Title
                            <span class="submission-time"><?php echo (rand(24, 0)); ?> hours
                                ago</span>
                        </li>
                        <li class="submission-item">Find the Maximum Sum of
                            Node Values <span class="submission-time"><?php echo (rand(24, 0)); ?>
                                hours ago</span></li>
                        <li class="submission-item">Minimum Number Game
                            <span class="submission-time">a day
                                ago</span>
                        </li>
                        <li class="submission-item">Apply Operations to an
                            Array <span class="submission-time">a day
                                ago</span></li>
                        <li class="submission-item">Move Zeroes <span class="submission-time">a day
                                ago</span></li>
                        <li class="submission-item">Remove Element <span class="submission-time">a day
                                ago</span></li>
                        <li class="submission-item">Remove Duplicates from
                            Sorted Array <span class="submission-time">a day
                                ago</span></li>
                        <li class="submission-item">Distribute Coins in
                            Binary Tree <span class="submission-time">2 days
                                ago</span></li>
                        <li class="submission-item">Delete Leaves With a
                            Given Value <span class="submission-time">2 days
                                ago</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>