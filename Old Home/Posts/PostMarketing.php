<?php

include '../DBconnection.php';

if (isset($_POST['post'])) {


$Title  =  $_POST['title'];
$Description = $_POST['description'];
$Location = $_POST['location'];
$Website    =   $_POST['websites'];
$Contact = $_POST['contact'];



$quary  = "INSERT INTO `marketing` (`ID`, `Title`, `Date`, `Description`, `Location`, `Website`, `Contact No`) VALUES (NULL, '$Title', current_timestamp(), '$Description', '$Location', '$Website', '$Contact')";


$result = mysqli_query($conn,$quary);

}


?>    
    
    <!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="PostMarketing.CSS">
    
    <title>Document</title>
</head>
<body>

    <br><h1>MARKETING</h1><br><br>

    <form action="PostMarketing.php" method="post" >

<input type="text" placeholder="Add Your Title Here" class="TB" name="title" >  <br>
<textarea placeholder="Description" class="Description" name="description"></textarea><br>
<input type="text" placeholder="Location" class="TB" name="location">   <br>
<input type="text" placeholder="Websites" class="TB" name="websites">   <br>
<input type="tel" placeholder="Contact No"  class="TB" name="contact"><br>
<!-- <input type="text" placeholder="Please Enter your username" name="Username" class="TB" required>  <br>
<input type="password" placeholder="Password" name="Password" class="TB" required>  <br> -->



<button type="submit" name="post">Post</button>
    
</form>
    

    <svg class="newicon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M160-720v-80h640v80H160Zm0 560v-240h-40v-80l40-200h640l40 200v80h-40v240h-80v-240H560v240H160Zm80-80h240v-160H240v160Zm-38-240h556-556Zm0 0h556l-24-120H226l-24 120Z"/></svg>
</body>
</html>