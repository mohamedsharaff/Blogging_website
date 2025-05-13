    <?php

    include '../DBconnection.php';

    if (isset($_POST['post'])) {


    $Title  =  $_POST['title'];
    $Description = $_POST['description'];
    $Location = $_POST['location'];
    $Website    =   $_POST['websites'];
    $Contact = $_POST['contact'];
   
    

  $quary  = "INSERT INTO `others` (`ID`, `Title`, `Date`, `Description`, `Location`, `Website`, `Contact No`) VALUES (NULL, '$Title', current_timestamp(), '$Description', '$Location', '$Website', '$Contact')";

  $result = mysqli_query($conn,$quary);

}


    ?>


    
    
    <!-- INSERT INTO `news` (`ID`, `Title`, `Image`, `Description`, `Location`, `Website`, `Contact No`, `Username`, `Password`) VALUES (NULL, '', '', '', '', '', '', '', ''); -->
    
    <!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="PostOther.CSS">
    
    <title>Create News</title>
</head>
<body>

    <br><h1>OTHER</h1><br><br>

    <form action="PostOther.php" method="post" >

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
    

    <!-- <svg class="newicon" xmlns="http://www.w3.org/2000/svg"viewBox="0 -960 960 960"><path d="M160-120q-33 0-56.5-23.5T80-200v-560q0-33 23.5-56.5T160-840h640q33 0 56.5 23.5T880-760v560q0 33-23.5 56.5T800-120H160Zm0-80h640v-560H160v560Zm80-80h480v-80H240v80Zm0-160h160v-240H240v240Zm240 0h240v-80H480v80Zm0-160h240v-80H480v80ZM160-200v-560 560Z"/></svg> -->


</body>
</html>