<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php ob_start(); include 'Header.php' ?>

    <div class="row">

          <div class="col-2">
                <?php include 'Sidebar.php' ?>
          </div>

          <div class="col-9">
          
          <table class="table">
            <thead class="table-info" >
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Profile</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Admin</th>
                    <th>Subscriber</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php

                          include 'DBconnection.php';

                          $user_query = "SELECT * FROM users ORDER BY user_role";
                          $user_result= mysqli_query($conn , $user_query);

                          while($row = mysqli_fetch_assoc($user_result)){

                            $user_id  = $row['user_id'];
                            $user_first_name  = $row['user_first_name'];
                            $user_last_name  = $row['user_last_name'];
                            $user_username  = $row['user_username'];
                            $user_profile  = $row['user_profile'];
                            $user_email  = $row['user_email'];
                            $user_role  = $row['user_role'];

                          ?>


                    <tr>
                        <td><?php echo $user_id ?></td>
                        <td><?php echo $user_username ?></td>
                        <td><?php echo $user_first_name ?></td>
                        <td><?php echo $user_last_name ?></td>
                        <td><img src="../Feed/Profiles/<?php echo $user_profile ?>" alt="img" width="50px" height="50px"></td>
                        <td><?php echo $user_email ?></td>
                        <td><?php echo $user_role ?></td>
                        <td><a class="btn btn-outline-success" name="btn_admin" href="?admin_id=<?php echo $user_id ?>">Admin</a></td>
                        <td><a class="btn btn-outline-primary" name="btn_subscriber" href="?subs_id=<?php echo $user_id ?>">Subscriber</a></td>
                        <td><a class="btn btn-danger" name="btn_delete" href="?del_id=<?php echo $user_id ?>">Delete</a></td>
                        
                    </tr>

                    <?php } ?>
                   
                </tbody>
          </table>
        </div>

        <?php

            // role change to admin
        
            if (isset($_GET['admin_id'])) {

              $admin_id = $_GET['admin_id'];

              $admin_query = "UPDATE users SET user_role = 'admin' WHERE user_id = $admin_id";
              $admin_result = mysqli_query($conn, $admin_query);  
              
              header('location:Users.php');              
              
            }

          // role change to subscriber

            if (isset($_GET['subs_id'])) {

              $subs_id = $_GET['subs_id'];

              $subs_query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $subs_id";
              $subs_result = mysqli_query($conn, $subs_query);  
              
              header('location:Users.php');              
              
            }

            // delete users

            if (isset($_GET['del_id'])) {

              $del_id = $_GET['del_id'];

              $admin_query = "DELETE FROM users WHERE user_id = $del_id";
              $admin_result = mysqli_query($conn, $admin_query);  
              
              header('location:Users.php');              
              
            }

        ?>


  </body>
  
</html>