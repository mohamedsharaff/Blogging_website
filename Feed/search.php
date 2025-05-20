<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    
</head>
  <body>

  <header class="fixed-top">

        <?php  ob_start(); include 'navigation.php'  ?>

    </header>


    <div class="row">

        <div class="col-2 ">

            <?PHP include 'user_sidebar.php' ?>

        </div>


        <div class="col-8">

  <?php


  include '../Admin/Dbconnection.php';



            //print_r($_POST['search']);

            
            

            $search = $_POST['search'];

            $search_query    =   "SELECT * FROM post WHERE post_title LIKE '%$search%' order by post_date desc ;";
            $search_result        =   mysqli_query($conn, $search_query);    
            
            $num = mysqli_num_rows($search_result);


            if ($num > 0) {                
                echo "<?php <br><br><br><br><br><h4 class='text-success'>Search results are {$num} ...</h4>";
            }else{
                echo "<br><br><br><br><h1 class='text-danger'>No Results Found </h1>";
                
                
            }


            while ($row = mysqli_fetch_assoc($search_result)) {



                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = substr($row['post_content'],0,100);
                $post_image = $row['post_image'];
                $post_tag = $row['post_tag'];
                $post_comment = $row['post_comment_count'];

            ?>



            <div class="post">


                <!-- author  -->

                <div class="postdata">

                    <div class="author">
                        <div class="author-name"> <img src="Image/profile.jpg" alt="Profile" class="profile">
                            <?php echo $post_author  ?> </div>

                        <!-- <label class="badge bg-primary ms-auto">USER</label> -->

                    </div>

                    <h5 class="post-title"> <?php echo $post_title  ?> </h5>

                    <label class="date"> <?php echo $post_date  ?> </label>






                    <img src="Image/<?php echo $post_image  ?>" alt="Posted Image" srcset="" class="image-post">



                    <br>



                    <br>

                    <div class="postfooter">

                        <!-- <abbr title="<?php //echo $post_content ?>">Read More</abbr> </a> -->

                        <!-- content  -->
                        <label class="content">  <?php echo $post_content   ?> </label> <br>

                        <a href='Readmore.php?page=readmore&post_id=<?php echo $post_id ?>' class="btn btn-primary"
                            name='readmore'>Readmore</a>

                        <!-- comment  -->

                        <a class="btn-cmt btn btn-outline-success"> 

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                            </svg>

                            <?php echo $post_comment  ?> </a>


                    </div>

                </div>


            </div>


            <?php } ?>

            </div>
        </div>
      
    </body>
</html>