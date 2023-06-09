<?php
$servername="localhost";
$username="root";
$password="";
$database_name="event_db";

$conn=mysqli_connect($servername,$username,$password,$database_name);
//now check the connection
if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}

if(isset($_POST['save']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $sql_query = "INSERT INTO normalusers(username, email, phone, address, dob, gender, password)
    VALUES ('$username', '$email', '$phone', '$address', '$dob', '$gender', '$password')";
    if(mysqli_query($conn, $sql_query))
    {
        header('Location: index.php?page=home');
    }
    else{
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>