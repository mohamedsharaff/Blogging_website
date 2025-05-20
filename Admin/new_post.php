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

    <link rel="stylesheet" href="css/post_edit.css">

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


    <?php ob_start();   include 'Header.php' ?>



    <div class="row">
        <div class="col-2 ">

            <?PHP  include 'sidebar.php' ?>

        </div>





        <?php              


                            include 'DBconnection.php';

                            if (isset($_POST['btn_create'])) {

                                // $post_id = $_POST['id'];
                                $post_title = $_POST['title'];
                                $post_author = $_POST['author'];
                                $post_date = date('DD-MM-YYYY');
                                $post_content = $_POST['content'];

                                $post_image = $_FILES['image']['name'];
                                $post_img_temp = $_FILES['image']['tmp_name'];

                                $post_tag = $_POST['tag'];
                                $post_comment = $_POST['comment'];
                                $post_category = $_POST['category'];
                                //$post_status = $_POST['post_status'];

                                move_uploaded_file($post_img_temp, "../Feed/Image/$post_image");

                            

                            $create_post_query  =   "INSERT INTO `post` (`post_id`, `post_title`, `post_author`, `post_date`, `post_content`, `post_image`, `post_tag`, `post_category_id`, `post_comment_count`, `post_status`) VALUES (NULL, '$post_title', '$post_author', now(), '$post_content', '$post_image', '$post_tag', '$post_category', '$post_comment', 'New Post')";

                            $result = mysqli_query($conn ,$create_post_query );   

                            header('location:index_admin.php?page=posts');                            
                            
                            }
                            
                                

    ?>

        <div class="col-10">

            <div class="form-outline">

                <h1>CREATE POSTS</h1>
                <hr>


                <form action="new_post.php" class="form" method="post" enctype="multipart/form-data">

                    <!-- <input type="text" placeholder="ID" name="id"><br> -->
                    <input type="text" placeholder="Author" name="author"><br>
                    <input type="text" placeholder="Title" name="title"><br></br>
                    <!-- <input type="text" placeholder="Contant" name="content"><br> -->
                    <textarea placeholder="Contant" name="content" name="" id=""></textarea><br>

                    <!-- <input type="text" placeholder="Status" name="status"><br> -->
                    <input type="file" placeholder="Image" name="image"><br>
                    <input type="text" placeholder="Tag" name="tag"><br></br>

                    <!-- category  -->

                    <?php

                            $category_query = "SELECT * FROM category";
                            $category_result = mysqli_query($conn , $category_query);

                    ?>

                    <select name="category" id="" >

                    <?php   while ($row = mysqli_fetch_assoc($category_result)) {   ?>

                        <option value="<?php  echo $row['category_id']; ?>"><?php  echo $row['category']; ?></option>
                    <?php   }   ?>

                    </select >

                    
                    <br>


                    <input type="text" placeholder="Comment Count" name="comment"><br>

                    
                    <button type="submit" class="btn btn-outline-success" name="btn_create">Create</button>
                    <button type="reset" class="btn btn-outline-primary">Reset</button>


                </form>

            </div>

        </div>
    </div>





</body>

</html>