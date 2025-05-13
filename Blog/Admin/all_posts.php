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

    <link rel="stylesheet" href="./css/View_posts.css">
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

    
<header class="fixed-top">

<?php ob_start(); include 'Header.php'  ?>

</header> <br><br><br><br><br>

    <div class="row">

        <div class="col-2">
            <?php include 'Sidebar.php' ?>
        </div>

        <div class="col-9">

            
           

            <a href="index_admin.php?page=new_post" class="btn btn-outline-success">Create New Post</a> <br><br>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Date</th>
                        <th scope="col" >Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                   <?php    

                   include 'DBconnection.php';
                   
                        $post_query = "SELECT * FROM post ORDER BY post_date desc";
                        $post_result = mysqli_query($conn , $post_query);                        



                        while ($row = mysqli_fetch_assoc($post_result) ) {

                            $post_id    =   $row['post_id'];
                            $post_title    =   $row['post_title'];
                            $post_author    =   $row['post_author'];
                            $post_date    =   $row['post_date'];
                            $post_content    =   $row['post_content'];
                            $post_image    =   $row['post_image'];
                            $post_tag    =   $row['post_tag'];
                            $post_category_id    =   $row['post_category_id'];
                            $post_comment_count    =   $row['post_comment_count'];
                            $post_status    =   $row['post_status'];

                            // category

                            $category_query = "SELECT * FROM category WHERE category_id = $post_category_id";
                            $category_result = mysqli_query($conn , $category_query);

                            while ($category_row = mysqli_fetch_assoc($category_result)) {

                            $category_title = $category_row['category'];

                            //comment

                            $comment_query = "SELECT * FROM comment where comment_post_id = $post_id";
                            $comment_result = mysqli_query($conn , $comment_query);
                                
                            //count comment row
                            $comment_count = mysqli_num_rows($comment_result);
                            


                            ?>

                            <tr>

                            <td><?php   echo $post_id   ?></td>
                            <td><?php   echo $post_author   ?></td>
                            <td><?php   echo $post_title   ?></td>
                            <td><?php   echo $category_title ?></td>
                            <td><?php   echo $post_content   ?></td>
                            <td><?php   echo $post_status    ?></td>
                            <td><img src="../Feed/Image/<?php echo $post_image  ?>" alt="" srcset=""></td>
                            <td><?php   echo $post_tag   ?></td>
                            <td><?php   echo $comment_count  ?></td>
                            <td><?php   echo $post_date  ?></td>
                            <td><a class="btn btn-primary" href="index_admin.php?page=edit_post&post_id=<?php echo $post_id ?>">Edit</a></td>
                            <td><a class="btn btn-danger" href="?page=delete_post&delete_id=<?php echo $post_id  ?>">Delete</a></td>

                            </tr>

                            <?php   }}  ?>

                            <?php
                            
                            //Delete Function

                            if (isset($_GET['delete_id'])) {

                                $delete_id = $_GET['delete_id'];

                                $del_query = "DELETE FROM post where post_id = $delete_id";
                                $del_result = mysqli_query($conn , $del_query);

                                header('location:all_posts.php');
                                
                                
                            }


                            ?>

                    

                </tbody>
            </table>
        </div>

    </div>


</body>

</html>