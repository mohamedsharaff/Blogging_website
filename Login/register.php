<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <?php

        ob_start();

        include '../Admin/DBconnection.php';

    ?>


    <div class="--grid">

    <div class="left">

    <div class="left_content">

    <br><br><br><br><br>

    

    </div>
    
    

    </div>

    <div class="right">

        <form action="" method="post">

        <?php   


        
        if (isset($_POST['btn_create'])) { 

                    $input_firstname = mysqli_real_escape_string($conn , $_POST['input_firstname']);
                    $input_lastname = mysqli_real_escape_string($conn , $_POST['input_lastname']);
                    $input_username = strtolower(mysqli_real_escape_string($conn , $_POST['input_username'])) ;
                    $input_email = strtolower(mysqli_real_escape_string($conn , $_POST['input_email']));
                    $input_contact = mysqli_real_escape_string($conn , $_POST['input_contact']);        
                    $input_password = mysqli_real_escape_string($conn , $_POST['input_password']);
                    $enc_password = crypt($input_password , '$2a$07$aAsdDjasjdDjabhfAjbkjVdbfShjadDsfknjb$');

                    $read_query = "SELECT * FROM users WHERE user_username = '$input_username' or user_email = '$input_email' or user_contact = '$input_contact'";
                    $read_result = mysqli_query($conn , $read_query);


            while ($row = mysqli_fetch_assoc($read_result)) {
                
                // print_r($row);

                $username = $row['user_username'];
                $email = $row['user_email'];
                $contact = $row['user_contact'];     
                
                if($input_username == $username) {

                    $catch_username = $username;
                    echo "username already in use , "; 

    
                }else{
                    $catch_username = null;
                }
                
                if ($input_email == $email) {
    
                    $catch_email = $email;  
                    echo "email already in use , "; 

    
                }else{
                    $catch_email = null;
                }
                
                if ($input_contact == $contact){

                    $catch_contact = $contact;   
                    echo 'contact no already in use'; 

                }else{

                    $input_contact = 0;
                }
               
            }

            


            
            if ($catch_email !== $input_email && $catch_username !== $input_username && $catch_contact !== $input_contact) {


                $create_query = "INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_username`, `user_profile`, `user_email`, `user_contact`, `user_password`, `user_role`) VALUES (NULL, '$input_firstname', '$input_lastname', '$input_username', '', '$input_email', '$input_contact', '$enc_password', 'subscriber');";
                    
                $create_result = mysqli_query($conn , $create_query);

                header('location:login.php');

            }
            
        }
            

   

        ?>

        <div class="sign">
        <h4 class="lsign-up"><b>Sign Up</b></h4>    
        <label class="lcreate">Welcome back to our website !</label><br>
        </div>
        
        <table>

                <tr></tr>
                <tr><input type="text" name="input_firstname" placeholder="Firstname" required></tr>
                <tr><input type="text" name="input_lastname" placeholder="Lastname" required></tr>
                <tr><input type="text" class="username" name="input_username"  placeholder="Username" required pattern="[^\s]*" title="don't use space"></tr>
                <tr><input type="email" class="email" name="input_email" placeholder="E-Mail" required></tr>
                <tr><input type="number" name="input_contact" placeholder="Phone" required></tr>
                <tr><input type="password" name="input_password" placeholder="Password" required></tr><br>
                <tr>
                    <td><button type="submit" name="btn_create" class="btn-submit"> Create</button></td>
                    <td><a class="btn" href="login.php">Login</a></td>
                </tr>

        </table>

        </form>

    </div>

    </div>

</body>

</html>