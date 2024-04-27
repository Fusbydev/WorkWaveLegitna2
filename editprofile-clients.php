<?php
include_once "connection.php";
$name = $bio = $pfp = $username = "";
if (isset($_GET['id'])) {
    $id = $_GET['id']; // 
    
    $sql = "SELECT * FROM accounts WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['username'];
        $bio = $row['bio'];
        $images = $row['profile_picture'];
        if ($images == null) {
            $pfp = "logo.png";
        } else {
            $pfp = $row['profile_picture'];
        }
    }
    


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['editButton'])) {
            $newUsername = mysqli_real_escape_string($conn, $_POST['newUsername']);
            $newBio = mysqli_real_escape_string($conn, $_POST['newBio']);
            $image_name = $_FILES['image']['name'];
            $image_size = $_FILES['image']['size'];
            $image_temp = $_FILES['image']['tmp_name'];
            $image_ex = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $new_image_name = uniqid("IMG-", true) . '.' . $image_ex;
            move_uploaded_file($image_temp, $new_image_name);
    
            // Use $username here
            $update = "UPDATE accounts SET username = '$newUsername', profile_picture = '$new_image_name',  bio = '$newBio' WHERE id = '$id'";
            $result = mysqli_query($conn, $update);
    
            if ($result) {

                $sql = "SELECT * FROM accounts WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
            
                if ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['username'];
                    $bio = $row['bio'];
                    $images = $row['profile_picture'];
                    if ($images == null) {
                        $pfp = "logo.png";
                    } else {
                        $pfp = $row['profile_picture'];
                    }
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }


}


?>


<!-- The rest of your HTML code remains unchanged -->


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Profile</title>
            <!-- Include Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Include external CSS -->
            <link rel="stylesheet" href="editprofile.css">
        </head>
        <body>

        <!-- Grid Layout -->

        <div class="container text-center">
            <div class="row">
                <div class="col-md-6">
                <div class="profile-section">
                <img src="<?php echo $pfp ?>" alt="Profile Picture" class="img-fluid" width="200">
                <br>
                <h3><?php echo $name; ?></h3>
                <p><?php echo $bio; ?></p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#profile" data-bs-whatever="@profile"> Edit Profile</button><br>
                <a href="main-page.php?id=<?php echo $id ?>"><button type="button" class="btn btn-warning freelancer-mode-btn mt-3" style="margin-left: 0px;">Client Mode</button></a><br>
                <a href="login-page.php"><button type="button" class="btn btn-danger freelancer-mode-btn mt-3" >Sign-out </button></a>

            </div>
            </div>
                <div class="col-md-6">
                <div class="about-us-section">
                <img src="logo.jpg" alt="Logo" class="img-fluid" width="300">
                <br>
                <p><p>Welcome to WorkWave, where talent meets opportunity! At WorkWave, we're on a mission to revolutionize the way individuals and businesses connect and collaborate. Our platform is designed to empower freelancers and businesses alike, providing a dynamic marketplace where skills are matched with projects, and creativity knows no bounds.
            Our Vision
            WorkWave envisions a world where every skill finds its perfect match and where businesses seamlessly connect with the right talent to achieve their goals. We believe in fostering a global community of freelancers and clients who collaborate, innovate, and succeed together.</p></p>
            </div></div>
            </div>
            </div>

        <!-- Profile Modal -->
        <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" id="myform" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Profile Picture:</label>
        <img id="imagePreview" src="#" alt="Profile Preview" class="img-fluid" width="250">
        <input type="file" id="imageInput" accept="image/*" class="files" onchange="displaySelectedImage()" name="image">
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Username:</label>
        <input type="text" class="form-control" id="username" name="newUsername"> <!-- Added name attribute -->
    </div>
    <div class="mb-3">
        <label for="recipient-name" class="col-form-label">Bio:</label>
        <input type="text" class="form-control" id="bio" name="newBio"> <!-- Added name attribute -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="editButton">Save Changes</button>
    </div>
</form>


                                </div>
                
            </div>
        </div>
        </div>

                </div>
                
        </div>

        <!-- Overlay -->
        <div id="overlay" class="overlay" onclick="closeProfileModal()"></div>
        
        <!-- Include Bootstrap JS and Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Include external JavaScript -->
        <script>
        function displaySelectedImage() {
        var input = document.getElementById('imageInput');
        var image = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>

        </body>
        </html>