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


    <?php ob_start();  include 'Header.php' ?>



    <div class="row">
        <div class="col-2 ">

            <?PHP   include 'sidebar.php' ?>

        </div>





        <?php              


                            include 'DBconnection.php';

                            if (isset($_GET['post_id'])) {
                              
                                 $edit_post_id = $_GET['post_id'];

                                 $query = "SELECT * FROM post WHERE post_id = $edit_post_id";

                                $result = mysqli_query($conn ,$query );

                                while ($row = mysqli_fetch_assoc($result)) {
                                
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_date = $row['post_date'];
                                    $post_content = $row['post_content'];

                                    $post_image = $row['post_image'];
                                    // //$post_img_temp = $row['image']['tmp_name'];

                                    $post_tag = $row['post_tag'];
                                    $post_comment = $row['post_comment_count'];
                                    $post_category = $row['post_category_id'];
                                    $post_status = $row['post_status'];

                                    //move_uploaded_file($post_img_temp, "../Feed/Image/$post_image");
                                }                                
                    }

                    
                    

                    if (isset($_POST['update'])) {


                            $post_id = $_POST['id'];
                            $post_title = $_POST['title'];
                            $post_author = $_POST['author'];
                            // $post_date = $_POST['date'];
                            $post_content = $_POST['content'];

                            $post_image = $_FILES['image']['name'];
                            $post_img_temp = $_FILES['image']['tmp_name'];
                            move_uploaded_file($post_img_temp, "../Feed/Image/$post_image");

                            $post_tag = $_POST['tag'];
                            $post_comment = $_POST['comment'];
                            $post_category = $_POST['category'];
                            $post_status = $_POST['status'];

                            // img copying
                            if (empty($post_image)) {

                                $edit_post_id = $_GET['post_id'];


                                $select_query = "SELECT * FROM post WHERE post_id = $post_id";
                                $img_result = mysqli_query($conn , $select_query);
        
                                while ($row = mysqli_fetch_assoc($img_result)) {
        
                                    $post_image = $row['post_image'];
                                    
                                }
                            }                          
                                                    
                                $update_query = "UPDATE `post` SET `post_title` = '$post_title', `post_author` = '$post_author', `post_date` = Now(), `post_content` = '$post_content', `post_image` = '$post_image', `post_tag` = '$post_tag', `post_category_id` = '$post_category', `post_comment_count` = '$post_comment', `post_status` = '$post_status' WHERE `post`.`post_id` = $post_id";

                                $result = mysqli_query($conn ,$update_query);

                                header('location:index_admin.php?all_posts');
                            

                        }
                                


    ?>

        <div class="col-10">

            <div class="form-outline">

                <h1>EDIT POSTS</h1>
                <hr>


                <form action="index_admin.php?page=edit_post" class="form" method="post" enctype="multipart/form-data">

                    <input type="hidden" placeholder="ID" name="id" class="Pid" readonly
                        value="<?PHP echo $post_id  ?>"><br>
                    <input type="text" placeholder="Author" name="author" value="<?PHP echo $post_author  ?>"> <br>
                    <input type="text" placeholder="Title" name="title" value="<?PHP echo $post_title  ?>"><br><br>
                    <textarea placeholder="Contant" name="content" name="" id=""><?PHP echo $post_content  ?></textarea><br><br>

                    <select name="status" id="">
                        <option value="Published">Publish</option>
                        <option value="Unpublished">UnPublish</option>
                    </select><br>

                    <!-- <input type="text" placeholder="Status" name="status" value="<?PHP //echo $post_status  ?>"><br> -->

                    <img src=../Feed/Image/<?PHP echo $post_image ?> alt="IMG" ><br>
                    <input type="file" placeholder="Image" name="image" value="<?PHP echo $post_image  ?>"><br>
                    <span id="val"></span>

                    <select name="category" id="">
                        <option value="<?PHP echo $post_category  ?>">
                            <?PHP echo $post_category  ?>
                        </option>
                    </select><br>

                    <input type="text" placeholder="Tag" name="tag" value="<?PHP echo $post_tag  ?>"> <br>
                    <input type="text" placeholder="Comment" name="comment" value="<?PHP echo $post_comment  ?>"> <br>
                    <!-- <input type="date" placeholder="Date" name="date" value="<?PHP echo $post_date  ?>"> <br> -->


                    <button type="submit" class="btn btn-outline-success" name="update"> Update</button></a>
                    <button type="reset" class="btn btn-outline-primary">Reset</button>


                </form>

            </div>

        </div>
    </div>





</body>

</html>