<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login </title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Log in</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <!--Stylesheet-->
    

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>



            <?php 

            ob_start();
            session_start();

              include '../Admin/DBconnection.php';

              $user_name = null;
                  $user_email = null;
                  $user_name = null;
                  $user_password = null;

              if (isset($_POST['btn_login'])) {

              $input_username = mysqli_real_escape_string($conn , $_POST['input_username']);                
              $input_password = mysqli_real_escape_string($conn , crypt($_POST['input_password'] , '$2a$07$aAsdDjasjdDjabhfAjbkjVdbfShjadDsfknjb$'));
              
              $user_query = "SELECT * FROM users WHERE user_username = '$input_username' or user_email = '$input_username'";
              $user_result = mysqli_query($conn,$user_query);

                while ($row = mysqli_fetch_assoc($user_result)) {

                  

                  if ($row > 0) {

                  $user_id = $row['user_id'];
                  $user_name = $row['user_username'];
                  $user_password = $row['user_password'];
                  $user_email = $row['user_email'];
                  $user_role = $row['user_role'];
                  
                  }

                  

                  
                }

                if ($input_username == $user_name  && $input_password == $user_password || $input_username == $user_email && $input_password == $user_password ) {

                  header('location:../Admin/index_admin.php');


                  $_SESSION['session_username'] = $user_name;
                  $_SESSION['session_userid'] = $user_id;
                  $_SESSION['session_user_role'] = $user_role;                 
                  $_SESSION['session_user_email'] = $user_email;                 
                  

                }if ($input_username !== $user_name && $input_password !== $user_password || $input_username !== $user_email && $input_password !== $user_password ) {                  
                  
                  echo 'invalid username and password';

                } else {

                  echo 'invalid password';

                }

              }

              
            
            
            ?>

    <form   action="login.php" method="post" >

        <h3>Login Here</h3>

        <label  for="username">Username</label>
        <input type="text" placeholder="Email or username" id="username" name="input_username" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="input_password" required >

        <button name="btn_login">Log In</button> <br><br>

       <a href="register.php">   Create New Account    >  </a> 
       
        </div>
    </form>
</body>
</html>

<!-- partial -->
  
</body>
</html>