<?php
if(isset($_POST['submit'])){
    $regno = $_POST['regno'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dept = $_POST['department'];
    $skills = $_POST['skills'];

    $conn = new mysqli("localhost","root","1011","food");
    if($conn->connect_error){
        die("Connection error:". $conn->connect_error);
    }
    $stmt = $conn->prepare("INSERT INTO student (RegNo, Name, Email, Gender, Department, Skills) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("isssss",$regno, $username, $email, $gender, $dept, $skills);

    if($stmt->execute()){
        echo "Student Details added successfully";
    }else{
        echo "Error:".$stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>