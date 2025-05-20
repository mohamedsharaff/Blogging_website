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

            <?php
            
             if (isset($_POST['del'])) {

                $post_id = $_GET['id']; 

                $delete_query = "DELETE FROM post WHERE `post`.`post_id` =  $post_id";

                $result = mysqli_query($conn, $delete_query);

                echo    "
                            <script>
                            window.location.replace('View_posts.php');
                            </script>
                        ";

            }  ?>

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
                        <th scope="col">Commemts</th>
                        <th scope="col">Date</th>
                        <th scope="col" >Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    //  View post -------------------

                    include 'DBconnection.php';



                    $post_query    =   "SELECT * FROM post order by post_date desc";
                    $result        =   mysqli_query($conn, $post_query);


                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                        $post_image = $row['post_image'];
                        $post_tag = $row['post_tag'];
                        $post_comment = $row['post_comment_count'];
                        $post_id = $row['post_id'];
                        $post_category = $row['post_category_id'];
                        $post_status = $row['post_status'];

                        //category

                        $category_query = "SELECT * FROM category WHERE category_id = $post_category";
                        $category_result = mysqli_query($conn , $category_query);

                    while ($cat_row = mysqli_fetch_assoc($category_result)) {

                        




                        echo "

                        <tr>
                            <td>        {$post_id}          </td>
                            <td>        {$post_author}      </td>
                            <td>        {$post_title}       </td>
                            <td>        {$cat_row['category']}    </td>
                            <td class='contant'>        {$post_content}     </td>
                            <td>        {$post_status}      </td>
                            <td><img src='../Feed/Image/{$post_image}' class='image' alt=''></td>
                            <td>   {$post_tag}      </td>
                            <td>   {$post_comment}  </td>
                            <td>   {$post_date}        </td>
                            <td><a class='btn btn-outline-primary' href=index_admin.php?page=edit_post&post_id={$post_id}>Edit</a></td>
                            <td><a class='btn btn-outline-danger' href=index_admin.php?page=delete_post&delete_id={$post_id} name='del'>Delete</a></td>
                        </tr> "

                    ?>

                    <?php } } 
                    

                    //del

                    if (isset($_GET['delete_id'])) {

                        $del_post_id = $_GET['delete_id'];
                        

                        $del_query = "DELETE FROM post WHERE `post`.`post_id` =  $del_post_id";
                        $del_result = mysqli_query($conn , $del_query);

                        header('location:index_admin.php?page=posts');
                    }

                    ?>

                    

                </tbody>
            </table>
        </div>

    </div>


</body>

</html>