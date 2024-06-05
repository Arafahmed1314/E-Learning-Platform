<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="edit_profile.css">
</head>

<body id="body">
    <div class="registration-form">
        <form action>
            <h1>Update Your Profile</h1>
            <div class="name">
                <div class="input">
                    <input type="text" placeholder="First Name" required>
                    <i class='bx bxs-user-circle'></i>
                </div>
                <div class="input">
                    <input type="text" placeholder="Last Name" required>
                    <i class='bx bxs-user-circle'></i>
                </div>
            </div>
            <div class="input">
                <input type="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="name">
                <div class="input">
                    <input type="number" placeholder="Phone Number" required>
                    <i class='bx bxs-phone-call'></i>
                </div>
                <div class="input">
                    <input type="date" placeholder="Last Name" required>
                </div>
            </div>

            <div class=" area">
                <textarea name id placeholder="Permanent Address"></textarea>

            </div>
            <div class=" area">
                <textarea name id placeholder="Present Address"></textarea>

            </div>

            <div class="gender-box">
                <h2>Gender : </h1>
                    <div class="gender-option">
                        <div class="gender">
                            <button> <input type="radio" id="male" name="gender" checked>
                                <label for="male">Male</label></button>
                        </div>
                        <div class="gender">
                            <button>
                                <input type="radio" id="female" name="gender">
                                <label for="female">Female</label>
                            </button>
                        </div>
                        <div class="gender">
                            <button>
                                <input type="radio" id="Others" name="gender">
                                <label for="Others">Others</label>
                            </button>

                        </div>
                    </div>
            </div>
            <div class="nationality-religion">

                <div class="religion">
                    <h2>Religion :</h2>
                    <select name id>

                        <option value>Islam</option>
                        <option value>Hindu</option>
                        <option value>Christian</option>
                        <option value>Others</option>
                    </select>
                </div>
            </div>

            <div class="buttons">
                <button type="reset" class="btn">Clear Details</button>
                <button type="submit" class="btn">Update</button>
            </div>


        </form>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.waves.min.js"></script>

    </script>
    <script>
    VANTA.WAVES({
        el: "#body",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        color: 0xcccccc,
        zoom: 1.00
    })
    </script>
    </script> -->
</body>

</html>