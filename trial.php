<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Feedback = $_POST['Feedback'];


//Database Connection
$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
die('connection failed ; '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration (Name, Email, Feedback)
    values(?,?,?)");
    $stmt->bind_param("sss", $Name, $Email, $Feedback);
    $stmt->execute();
    echo "Thank You for your feedback!";
    $stmt->close();
    $conn->close();
}

?>