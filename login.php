<?php
$servername="localhost";
$username="root";
$password="";
$database_name="event_db";

$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn){
    die("Connection failed:" . mysqli_connect_error());
}


$user = "";
$pass = "";





if (isset($_POST['login_user'])) {
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $user = stripcslashes($user);
  $pass = stripcslashes($pass);
  $user = mysqli_real_escape_string($conn, $user);
  $pass = mysqli_real_escape_string($conn, $pass);



  $sql = "select * from normalusers where username = '$user' and password = '$pass'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  if($count==1){
      header('Location: index.php?page=home');
    }
  else{
    echo "<h1>LOGIN FAILED</h1>";
  }
}
?>