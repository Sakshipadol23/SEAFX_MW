<?php
$conn = mysqli_connect("localhost", "root", "", "seafx_db");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

// Get form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Important: Escape special characters
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Insert query
$sql = "INSERT INTO contact 
(first_name, last_name, email, phone, subject, message) 
VALUES 
('$first_name','$last_name','$email','$phone','$subject','$message')";

// Execute query
if(mysqli_query($conn, $sql)){
    echo "<script>
        alert('Message Sent Successfully!');
        window.location.href='contact.html';
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>