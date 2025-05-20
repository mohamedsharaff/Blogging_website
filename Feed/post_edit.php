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


    <?php ob_start();    ?>

    <header class="fixed-top">

<?php ob_start(); include 'navigation.php'  ?>

</header> 



    <div class="row">
        <div class="col-2 ">

            <?PHP  include 'user_sidebar.php' ?>

        </div>

        

        <div class="col-10"> <br><br>

        <?php              


                include '../Admin/DBconnection.php';

                    if (isset($_GET['page'])) {

                        $post_id = $_GET['post_id'];
                    }

                    //select data

                    $select_post = "SELECT * FROM post WHERE post_id = $post_id";
                    $post_result = mysqli_query($conn ,$select_post );   

                    while ($post_row = mysqli_fetch_assoc($post_result)) {

                        $title = $post_row['post_title'];
                        $content = $post_row['post_content'];
                        $image = $post_row['post_image'];
                        $tag = $post_row['post_tag'];
                        $category_id = $post_row['post_category_id'];
                        $status = $post_row['post_status'];

                    }

                            $session_username = $_SESSION['session_username'];

                            

                            

                            if (isset($_POST['btn_edit'])) {

                                

                                $post_title = mysqli_real_escape_string($conn , $_POST['title']);                                
                                // $post_author = mysqli_real_escape_string($conn , $_POST['author']);
                                $post_content = mysqli_real_escape_string($conn , $_POST['content']);

                                $post_image = mysqli_real_escape_string($conn , $_FILES['image']['name']);
                                $post_img_temp = $_FILES['image']['tmp_name'];

                                $post_tag = mysqli_real_escape_string($conn , $_POST['tag']);
                                $post_category = mysqli_real_escape_string($conn , $_POST['category']);
                                $post_status = mysqli_real_escape_string($conn , $_POST['Status']);

                                move_uploaded_file($post_img_temp, "../Feed/Image/$post_image");

                                if (empty($post_image) ) {

                                    $create_post_query  = "UPDATE post SET post_title ='$post_title', post_content ='$post_content', post_image = '$image', post_category_id = $post_category, post_tag = '$post_tag', post_status = '$post_status' WHERE post_id = $post_id";
                                    $result = mysqli_query($conn ,$create_post_query );
    
                                }else{
                            

                                    $create_post_query  = "UPDATE post SET post_title = '$post_title', post_content = '$post_content', post_image = '$post_image', post_category_id = $post_category ,post_tag = '$post_tag', post_status = '$post_status' WHERE post_id = $post_id";

                                    $result = mysqli_query($conn ,$create_post_query );   
                            
                                }

                            header('location:posts.php');                            
                            
                            }


                           




    ?>

            <div class="form-outline">


                <h1>EDIT POSTS</h1>
                <hr>


                <form action="" class="form" method="post" enctype="multipart/form-data">

                    
                    <input type="text" placeholder="Title" name="title" class="form-control" value="<?php echo $title ?>" ><br>
                    <textarea placeholder="Contant" name="content" name="" id="editor" class="form-control" ><?php echo $content ?></textarea><br>

                    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

                    <script>

                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                        
                    </script>

                    <input type="file" placeholder="Image" name="image" class="form-control"><br>
                    <input type="text" placeholder="Tag" name="tag" class="form-control" value="<?php echo $tag ?>"><br>

                    <!-- category  -->

                    <?php

                            $category_query = "SELECT * FROM category";
                            $category_result = mysqli_query($conn , $category_query);

                            $data_category_query = "SELECT * FROM category WHERE category_id = '$category_id'";
                            $data_category_result = mysqli_query($conn , $data_category_query);

                            while ($dcat = mysqli_fetch_assoc($data_category_result)) {

                                $cat = $dcat['category'];
                                $cat_id = $dcat['category_id'];
                            }


                    ?>

                    <select name="category" id="" class="form-control" >

                        <option value="<?php  echo $category_id; ?>"><?php  echo $cat; ?></option>
                            
                    <?php   while ($row = mysqli_fetch_assoc($category_result)) {   ?>
                        <option value="<?php  echo $row['category_id']; ?>"><?php  echo $row['category']; ?></option>
                    <?php   }   ?>

                    </select ><br>

                    <select name="Status" id="" class="form-control">
                        <option value="Published">Publish</option>
                        <option value="Unpublished">Unpublish</option>
                    </select><br>

                    
                    <button type="submit" class="btn btn-outline-success" name="btn_edit">Create</button>
                    <button type="reset" class="btn btn-outline-primary">Reset</button>


                </form>

            </div>

        </div>
    </div>





</body>

</html>