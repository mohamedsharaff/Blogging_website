<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/Readmore.css">

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
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

use function PHPSTORM_META\map;

ob_start(); 
 include '../Admin/DBconnection.php'  ?>



    


    <header class="fixed-top">

        <?php include 'navigation.php'  ?>

    </header>

    <div class="row">

        <div class="col-2 ">

            <?PHP include 'user_sidebar.php' ?>

        </div>
    

   

        <div class="col-8">


            <br><br>

            <!-- Post -->

            
<?php



    if (isset($_GET['post_id'])) {

        $post_id = $_GET['post_id'];
        
            $post_query    =   "SELECT * FROM post WHERE post_id = $post_id";
            $result        =   mysqli_query($conn, $post_query);
            

            while ($row = mysqli_fetch_assoc($result)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_tag = $row['post_tag'];
                $post_comment = $row['post_comment_count'];         
                
                

            ?>

            <div class="post">

                <div class="postdata">

                <!-- post title  -->

                    <h3 class="post-title"> <?php echo $post_title  ?> </h3>
                    <p class="date"> <?php echo $post_date  ?> </p>


                <!-- post image  -->

                    <div class="img-post">
                        <img src="Image/<?php echo $post_image  ?>"  srcset="" class="image-post">    
                    </div>

                <!-- author -->

                    <br>

                    <?php 
                            
                        $poster_prof_query = "SELECT * FROM users WHERE user_username = '$post_author'";
                        $poster_prof_result = mysqli_query($conn , $poster_prof_query);

                        $poster_profile = mysqli_fetch_assoc($poster_prof_result)['user_profile'];
                                    
                                    
                            ?>

                    <div class="author">
                        <h6> <img src="Profiles/<?php echo $poster_profile; ?>"  class="profile"> <?php echo $post_author  ?>
                            <label class="badge bg-primary ms-auto">USER</label>
                        </h6>


                    </div>

                    <hr >


                    <div class="postfooter">

                        
                            <label class="content"><?php echo $post_content  ?> </label> <br>
                        

                        <label># <?php echo $post_tag  ?> </label> <br>
                        <label class="btn btn-outline-success">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>

                            <?php echo $post_comment  ?> </label><br>

                            
                            <!-- comment  -->

                            




            <?php }} ?>

            <?php

                            $session_username = $_SESSION['session_username'];
                            $session_email = $_SESSION['session_user_email'];

                            
                            if (isset($_GET['post_id'])) {

                            $cmt_post_id = $_GET['post_id'];

                            }

                            include 'filter.php';

                            
                            if (isset($_POST['btn_comment'])) {

                                $input_comment = $_POST['input_comment'];

                                if (!empty($input_comment)) {
                                    if (isSpam($input_comment)) {
                                        
                                        echo "Spam detected. Your message was blocked.";

                                    } else {

                                        $comment_query = "INSERT INTO `comment` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES (NULL, '$cmt_post_id', '$session_username', '$session_email', '$input_comment', 'approved', now());";

                                        $comment_result = mysqli_query($conn , $comment_query);

                                        header("location:Feeds.php?page=readmore&post_id={$cmt_post_id}");

                                    }
                                }                            

                            }


                            
                            

                            ?>

                            <!-- comment option  -->

                            <form action="" method="POST">
                                <input type="text" class="form-control" name="input_comment"><br>
                                <button type="submit" class="btn btn-primary" name="btn_comment"><i class="bi bi-send"></i>Comment</button>
                            </form>


                            <!-- read comment  -->

                            <?php
                            
                            $read_comment_query = "SELECT * FROM comment WHERE comment_post_id = $cmt_post_id";
                            $read_comment_result = mysqli_query($conn , $read_comment_query);

                            while ($row = mysqli_fetch_assoc($read_comment_result)) {

                                $cmt_status = $row['comment_status'];

                                // if comment status = apporoval checking 
                                if ($cmt_status == 'approved') {

                                $cmt_username = $row['comment_author'];
                                $cmt_content = $row['comment_content'];
                                $cmt_date = $row['comment_date'];
                                $cmt_mail = $row['comment_email'];

                            ?>

                            <br>

                            <!-- comments  -->


                            <?php 
                            
                                    $comment_prof_query = "SELECT * FROM users WHERE user_username = '$cmt_username' ";
                                    $comment_prof_result = mysqli_query($conn , $comment_prof_query);

                                    $commenter_profile = mysqli_fetch_assoc($comment_prof_result)['user_profile'];

                                    
                                    
                            ?>

                            <div class="comment_box">

                            <div class="cmt-cont"><img src="Profiles/<?php echo $commenter_profile; ?>" class="cmt-img"></div>

                                <div class="cmt-cont">
                                    <ul>
                                        <li style="color: black;"><?php echo $cmt_username ?></li>
                                        <li style="color: gray;" class="cmt-date"><?php echo $cmt_date ?></li>
                                        <li style="color: black;" class="cmt-mail"><a href="mailto:<?php echo $cmt_mail ?>" target="_blank"><?php echo $cmt_mail ?></a></li>
                                        <li class="cmt-contant"><?php echo $cmt_content ?></li>

                                    </ul>
                                </div>
                            </div>                            

                            <?php   }}   ?>

                    </div>

                </div>


            </div>


        </div>


        <!-- <div class="col-2">

            News

        </div> -->

        
        

    </div>



</body>

</html>