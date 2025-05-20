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

        <?php ob_start(); include 'navigation.php'  ?>

    </header>

    <div class="row">

        <div class="col-2">
            <?php include 'user_sidebar.php' ?>
        </div>

        <div class="col-9">

            <br><br><br><br><br>

            <?php

            include '../Admin/DBconnection.php';

            
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


            <?php
                     

                if (isset($_POST['selectAll'])) {
                    echo 'all selected';

                }
                                              

                    if (isset($_POST['selectBox'])) {
                        
                        $selects = $_POST['selectBox'];
                        // $approve = $_POST['approve'];

                        foreach ($selects as $select) {

                            switch ($_POST['sel_box']) {

                                case 'Publish':
                                    
                                    $publish_result = "UPDATE post SET post_status = 'Published' WHERE post_id = $select";
                                    $publish_result = mysqli_query($conn , $publish_result);

                                    break;
    
                                case 'Unpublish':
                                    
                                    $unpublish_result = "UPDATE post SET post_status = 'Unpublished' WHERE post_id = $select";
                                    $unpublish_result = mysqli_query($conn , $unpublish_result);

                                    break;
    
                                case 'Delete':
                                   
                                    $delete_result = "DELETE FROM post WHERE post_id = '$select'";
                                    $delete_result = mysqli_query($conn , $delete_result);
                                    
                                    break;
                                
                                default:
                                    
                                    break;
                            }                          

                           
                            
                        }                      


                    }

                    ?>

            <a href="post_create.php" class="btn btn-outline-success">Create New Post</a> <br><br>


            <!-- check box option  -->

            <form action="posts.php" method="post">

                <select name="sel_box" id="" class="" style="color:black;">
                    <option value="Publish" style="color:green;">Publish</option>
                    <option value="Unpublish" style="color:blue;">Unpublish</option>
                    <option value="Delete" style="color:red;">Delete</option>
                </select>

                <input type="submit" value="Submit " class="btn"> <br><br>


                <table class="table">
                    <thead class="thead-dark">
                        <tr>



                            <th scope="col"><label for="select">All</label><input type="checkbox" name="selectAll"
                                    id="selectAll"></th>
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
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                    //  View post -------------------

                    $session_username = $_SESSION['session_username'];


                    $post_query    =   "SELECT * FROM post WHERE post_author = '$session_username' order by post_date desc";
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

                       

                    


                        ?>

                        <tr>

                            <td><input type="checkbox" name="selectBox[]" id="select" class="select"
                                    value="<?php  echo $post_id ?>"></td>

                            <td><?php  echo $post_id ?></td>
                            <td><?php  echo $post_author ?></td>
                            <td><?php  echo $post_title ?></td>




                            <?php 
                        
                         //category

                         $category_query = "SELECT * FROM category WHERE category_id = $post_category ";
                         $category_result = mysqli_query($conn , $category_query);

                        while ($cat_row = mysqli_fetch_assoc($category_result)) { ?>

                            <td><?php  echo $cat_row['category'] ?></td>

                            <?php }  ?>

                            <td><?php  echo $post_content ?></td>
                            <td><?php  echo $post_status ?></td>
                            <td><img width='100px' height='60px' src='../Feed/Image/<?php echo $post_image ?>'
                                    class='image' alt=''></td>
                            <td><?php  echo $post_tag ?></td>
                            <td><?php  echo $post_comment ?></td>
                            <td><?php  echo $post_date ?></td>
                            <td><a class='btn btn-outline-primary'
                                    href=post_edit.php?page=edit_post&post_id=<?php echo $post_id; ?>>Edit</a></td>
                            <td><a class='btn btn-outline-danger'
                                    href=posts.php?page=delete_post&delete_id=<?php echo $post_id; ?>
                                    name='del'>Delete</a>
                            </td>

                        </tr>

                        <?php                        

                    ?>

                        <?php } 
                    

                    //del

                    if (isset($_GET['delete_id'])) {

                        $del_post_id = $_GET['delete_id'];
                        

                        $del_query = "DELETE FROM post WHERE `post`.`post_id` =  $del_post_id";
                        $del_result = mysqli_query($conn , $del_query);

                        header('location:posts.php');
                    }

                    ?>



                    </tbody>
                </table>

            </form>


        </div>

    </div>


    <script>
    $('#selectAll').click(function() {

        if (this.checked) {

            $('.select').each(function() {

                this.checked = true;
            })

        } else {

            $('.select').each(function() {

                this.checked = false;
            })

        }

    })
    </script>


</body>

</html>