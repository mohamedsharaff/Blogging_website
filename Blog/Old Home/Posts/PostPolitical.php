<?php

include '../DBconnection.php';

if (isset($_POST['post'])) {


$Title  =  $_POST['title'];
// $Image  =   $_POST['image'];
$Description = $_POST['description'];
$Location = $_POST['location'];
$Website    =   $_POST['websites'];
$Contact = $_POST['contact'];



$quary  = "INSERT INTO `political` (`ID`, `Title`, `Date`, `Description`, `Location`, `Website`, `Contact No`) VALUES (NULL, '$Title', current_timestamp(), '$Description', '$Location', '$Website', '$Contact')";

$result = mysqli_query($conn,$quary);

}


?>   
   
   
   <!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="PostPolitical.CSS">
    
    <title>Document</title>
</head>
<body>

    <br><h1>POLITICAL</h1><br><br>

    <form action="PostPolitical.php" method="post" >

        <input type="text" placeholder="Add Your Title Here" class="TB" name="title" >  <br>
        <!-- <input type="file" placeholder="Add Your Post" class="addimg" name="image">    <br> -->
        <!-- <input type="text" placeholder="Discription" class="Discription">  <br> -->
        <textarea placeholder="Description" class="Description" name="description"></textarea><br>
        <input type="text" placeholder="Location" class="TB" name="location">   <br>
        <input type="text" placeholder="Websites" class="TB" name="websites">   <br>
        <input type="tel" placeholder="Contact No"  class="TB" name="contact"><br>
        
        <!-- <input type="text" placeholder="Please Enter your username" name="Username" class="TB" required>  <br>
        <input type="password" placeholder="Password" name="Password" class="TB" required>  <br> -->

        

        <button type="submit" name="post">Post</button>
            
    </form>

    <svg class="newicon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg>

</body>
</html>