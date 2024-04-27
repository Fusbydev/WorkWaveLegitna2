document.addEventListener("DOMContentLoaded", function () {
 
 function previewProfilePicture(input) {
        const preview = document.getElementById('previewImage');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }
    function previewImage() {
        var input = document.getElementById('imageInput');
        var preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function savePasswordChanges() {
        // Get password and confirm password values
        const password = document.getElementById('password').value;
        const cpass = document.getElementById('cpass').value;
    
        // Check if the passwords match
        if (password !== cpass) {
            alert("Passwords do not match. Please try again.");
            return;
        }
    
        // Here, you can make an AJAX request or use any method to send the new password to the server
        // Replace 'your-api-endpoint' with the actual endpoint for updating the password
        fetch('your-api-endpoint', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                password: password,
            }),
        })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                // For example, you can show a success message or handle errors
                if (data.success) {
                    alert("Password changed successfully!");
                } else {
                    alert("Error changing password. Please try again.");
                }
    
                // Close the modal
                const passwordModal = new bootstrap.Modal(document.getElementById('password'));
                passwordModal.hide();
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred. Please try again later.");
            });
    }
});