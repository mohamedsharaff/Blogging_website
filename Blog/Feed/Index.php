<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Borel&family=Playwrite+IN&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Smooch+Sans:wght@100..900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <?php ob_start(); include '../Admin/DBconnection.php'  ?>


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

                header("location:Readmore.php?post_id=$post_id");

            }else{

                    
            $post_query    =   "SELECT * FROM post WHERE post_status = 'Published' order by post_date desc ;";
            $result        =   mysqli_query($conn, $post_query);         


            while ($row = mysqli_fetch_assoc($result)) {



                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = substr($row['post_content'],0,100);
                $post_image = $row['post_image'];
                $post_tag = $row['post_tag'];
                $post_comment = $row['post_comment_count'];

                //comment

                $comment_query = "SELECT * FROM comment WHERE comment_post_id = $post_id AND comment_status = 'approved'";
                $comment_result = mysqli_query($conn , $comment_query);
                    
                //count comment row
                $comment_count = mysqli_num_rows($comment_result);

            ?>



            <div class="post">


                <?php
                
                    $profile_query = "SELECT * FROM users WHERE user_username = '$post_author'";
                    $profile_result = mysqli_query($conn , $profile_query);

                    while ($row = mysqli_fetch_assoc($profile_result)) {

                        $profile_img = $row['user_profile'];
                    }

                
                ?>


                <!-- author  -->

                <div class="postdata">

                    <div class="author">
                        <div class="author-name"> <img src="Profiles/<?php echo $profile_img ?>"  class="profile">
                            <?php echo $post_author  ?> </div>

                        <!-- <label class="badge bg-primary ms-auto">USER</label> -->

                    </div>

                    <h5 class="post-title"> <?php echo $post_title  ?> </h5>

                    <img src="Image/<?php echo $post_image  ?>" srcset="" class="image-post">
                    <br>
                    
                    <br><label class="date"> <?php echo 'Posted On  : ' . $post_date  ?> </label><br>


                    <br>

                    <div class="postfooter">

                        <!-- <abbr title="<?php //echo $post_content ?>">Read More</abbr> </a> -->

                        <!-- content  -->
                        <label class="content">  <?php echo $post_content   ?> </label> <br>



                        <a href='?page=readmore&post_id=<?php echo $post_id ?>' class="btn btn-primary"
                            name='readmore'>Readmore</a>

                        <!-- comment  -->

                        <a class="btn-cmt btn btn-outline-success"> 

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>

                            <?php echo $comment_count  ?> </a>


                    </div>

                </div>


            </div>


            <?php }} ?>




        </div>


        <div class="col-2">


            <a href="../Admin/View_posts.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            </a>

        </div>

    </div>

   





</body>

</html>