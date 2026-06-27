<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "seafx_db");

if (!$conn) {
    echo "<script>
            alert('Database Connection Failed!');
            window.location.href='career.html';
          </script>";
    exit;
}

if(isset($_POST['submit'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $cv_link = $_POST['cv_link'];
    $experience = $_POST['experience'];
    $about = $_POST['about'];

    $sql = "INSERT INTO career_form 
    (first_name, last_name, email, position, department, cv_link, experience, message)
    VALUES 
    ('$first_name','$last_name','$email','$position','$department','$cv_link','$experience','$about')";

    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('✅ Successfully Submitted!');
                window.location.href='career.html';
              </script>";
    } else {
        echo "<script>
                alert('❌ Error: " . mysqli_error($conn) . "');
                window.location.href='career.html';
              </script>";
    }
}
print_r($_POST);
exit;
?>