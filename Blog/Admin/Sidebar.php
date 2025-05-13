<!doctype html>
<html lang="en">
  <head>
    <title>sidebar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="css/admin_sidebar.css">

    



</head>

      <?php  ob_start(); session_start();  


          if (isset($_SESSION['session_user_role'])) {

              if ($_SESSION['session_user_role'] !== 'admin') {

                  header('location: ../Feed/index.php');
              }
              
          }else{  
                  header('location:../Login/login.php');
          }


      ?>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  


    <div class="sidebar">
        
        <div class="options">
        
            <h6>ADMIN PANEL</h6><br>

            <a href="admin_panel.php" class="a_links"><i class="bi bi-bar-chart-line-fill"></i>STATIC</a>
            <a href="../Feed/Index.php" class="a_links"><i class="bi bi-house-fill"></i>HOME</a>
            <a href="index_admin.php?all_posts" class="a_links"><i class="bi bi-file-post"></i>POSTS</a>
            <a href="index_admin.php?page=Category" class="a_links"><i class="bi bi-bookmarks-fill"></i>CATEGORY</a>
            <a href="Comments.php" class="a_links"><i class="bi bi-chat-left-dots-fill"></i>COMMENTS</a>
            <a href="Users.php" class="a_links"><i class="bi bi-people-fill"></i>USERS</a>
            <a href="manage.php" class="a_links"><i class="bi bi-person-circle"></i>PROFILE</a>
            
        

    

        <div class="options_footer">

            <a href="manage.php"><?php  echo $_SESSION['session_username']  ?></a><br>
            <a href="../Login/logout.php" class="b_links"><i class="bi bi-box-arrow-left"></i>LOGOUT</a><br>
    
    
        </div>

    </div>

    </div>





    </body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sidebar Example</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
    }

    /* Sidebar styling */
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #2c3e50;
      color: white;
      position: fixed;
      left: 0;
      top: 0;
      padding-top: 20px;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      padding: 15px 20px;
      color: white;
      text-decoration: none;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    /* Content area */
    .content {
      margin-left: 250px;
      padding: 20px;
      flex-grow: 1;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>My Sidebar</h2>

    <a href="#">Dashboard</a>
    <a href="#">Profile</a>
    <a href="#">Messages</a>
    <a href="#">Settings</a>
    <a href="#">Logout</a>
    
  </div>

  <div class="content">
    <h1>Welcome to the Page</h1>
    <p>This is the main content area next to the sidebar.</p>
  </div>

</body>
</html> -->
