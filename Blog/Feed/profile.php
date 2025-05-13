<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../Admin/css/post_edit.css">

    <!-- FONT -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Smooch+Sans:wght@100..900&display=swap"
        rel="stylesheet">


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


    <?php ob_start();   ?>


    <header class="fixed-top">

        <?php include 'navigation.php'  ?>

    </header>



    <div class="row">
        <div class="col-2 ">

            <?PHP   include 'user_sidebar.php' ?>

        </div>
        

        <div class="col-10">



        <?php       

                            include '../Admin/DBconnection.php';

                            $session_username = $_SESSION['session_username'];
                            $session_userid = $_SESSION['session_userid'];

                            if (isset($session_username)) {
                              

                                 $query = "SELECT * FROM users WHERE user_username = '$session_username'";

                                $result = mysqli_query($conn ,$query );

                                while ($row = mysqli_fetch_assoc($result)) {
                                
                                    $firstname = $row['user_first_name'];
                                    $lastname = $row['user_last_name'];
                                    $username = $row['user_username'];
                                    $profile = $row['user_profile'];
                                    $email = $row['user_email'];
                                    $contact = $row['user_contact'];
                                    $user_password = $row['user_password'];
                                    

                                }                                
                            }
                    
                            $password_status = '';

                    if (isset($_POST['btn_change'])) {


                            $input_firstname = $_POST['input_firstname'];
                            $input_lastname = $_POST['input_lastname'];
                            $input_username = $_POST['input_username'];
                            $input_profile = $_FILES['input_profile']['name'];

                            $input_prof_temp = $_FILES['input_profile']['tmp_name'];

                            move_uploaded_file($input_prof_temp, "../Feed/Profiles/$input_profile");

                            $input_email = $_POST['input_email'];
                            $input_contact = $_POST['input_contact'];
                            $input_password = crypt($_POST['input_password'] , '$2a$07$aAsdDjasjdDjabhfAjbkjVdbfShjadDsfknjb$');


                            if ($input_password == $user_password) {
                                # code...

                            // img copying
                                if (empty($input_profile)) {

                                    $select_query = "SELECT * FROM users WHERE user_username = '$session_username'";
                                    $img_result = mysqli_query($conn , $select_query);
    
            
                                    while ($row = mysqli_fetch_assoc($img_result)) {
            
                                        $input_profile = $row['user_profile'];
                                        
                                    }
                                }                          
                                                        
                                    $update_query = "UPDATE users SET  user_first_name = '$input_firstname', user_last_name = '$input_lastname', user_profile = '$input_profile' , user_email = '$input_email', user_contact = '$input_contact' WHERE user_id = '$session_userid'";
    
                                    $result = mysqli_query($conn ,$update_query); 
                                    
                                    header('location:profile.php');
                            }else{
                                
                                $password_status = 'invalid password';
                            }

                        }                               


    ?>


        <br><br>
                        

            <div class="form-outline">


                <h1>MANAGE PROFILE</h1>
                <hr>


                <form action="" class="form" method="post" enctype="multipart/form-data">


                    <img src="../Feed/Profiles/<?php echo $profile  ?>" alt="" srcset="" width="80px" height="80px" style="border-radius: 100%; border:solid lime 4px;"><br><br>
                    <input type="file" name="input_profile" id="" value=""><br>
                    <label for="input-profile">Profile</label><br>

                    <input type="text" name="input_firstname" id="" value="<?php echo $firstname  ?>"><br>
                    <label for="input-firstname">Firstname</label><br>

                    <input type="text" name="input_lastname" id="" value="<?php echo $lastname  ?>"><br>
                    <label for="input-lastname">Lastname</label><br>

                    <input type="text" name="input_username" id="" value="<?php echo $username  ?>"><br>
                    <label for="input-username">Username</label><br>
                    

                    <input type="text" name="input_email" id="" value="<?php echo $email  ?>"><br>
                    <label for="input-email">E-mail</label><br>

                    <input type="text" name="input_contact" id="" value="<?php echo $contact  ?>"><br>
                    <label for="input-contact">Contact</label><br>


                    <label for="input-password" class="text-danger"><?php echo  $password_status   ?></label><br>
                    <input type="password" name="input_password" id=""><br>
                    <label for="input-password">Current Password</label><br>

                    <button type="submit" class="btn btn-primary" name="btn_change">Change</button>



                </form>

            </div>

        </div>
    </div>


    





</body>

</html>