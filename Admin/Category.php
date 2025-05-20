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

    <link rel="stylesheet" href="css/category.css">
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



            <!-- header  -->

<header class="fixed-top">

<?php   ob_start(); include 'Header.php'  ?>

</header> <br><br><br><br><br>


    <?php  ob_start();  

    include 'DBconnection.php';     

        // category adding function

        if  (isset ($_POST['btn_add_category'])) {     

                //$post_id = $_POST['id'];
            $category = $_POST['input_category'];    

            $add_category  =   "INSERT INTO `category` (`category_id`, `category`) VALUES (NULL, '$category')";
            $result = mysqli_query($conn ,$add_category );  

                header('Location: index_admin.php?page=Category');          
            
        }
        

?>





    <div class="row">

        <div class="col-2">
            <?php include 'Sidebar.php' ?>
        </div>

        <!-- Add Categories Form -->

        <div class="col-4">

            <form action="index_admin.php?page=Category" method="post">
                <div class="mb-3 ">

                    <div class="inp">

                        <h4 for="" class="form-label"> <B>ADD CATEGORY</B> </h4>
                        <hr>
                        <input type="text" class="form-control" name="input_category">
                        <br>
                        <button name='btn_add_category' type="submit" class="btn btn-primary"> ADD CATEGORY </button>

                    </div>


                </div>

            </form>
        </div>

        <!-- Categories table -->

        <div class="col-4 ">

            <DIV class="table-bg">




                <h4><b>CATEGORIES</b></h4>
                <hr>

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>

                            <?php

                            // delete 
                            
        
                                    //category reading function

                                $query_view_category = "SELECT * FROM category";
                                $view_result = mysqli_query($conn,$query_view_category);

                                


                                while ($row = mysqli_fetch_assoc($view_result)) {

                                    
                                    $category_id = $row['category_id'];
                                    $category_title = $row['category'];                                                           

                            ?>

                            <th scope="row"> <?php  echo $category_id    ?> </th>
                            <td> <?php  echo $category_title   ?></td>
                            <td><a href="index_admin.php?page=category_edit&post_id=<?php echo $category_id ?>"
                                    class="btn btn-outline-success" name='btn_edit'> Edit</a></td>
                            <td><a href="?page=Category&post_id=<?php echo $category_id ?>" class="btn btn-outline-danger" name='btn_del'> Delete</a></td>
                        </tr>

                        <?php   } ?>


                        <?php

                        if  (isset ($_GET['post_id'])) { 

                            $cat_id = $_GET['post_id'];
                            echo $cat_id;

                            $del_category  =   "DELETE FROM category WHERE `category`.`category_id` =  $cat_id";
                            $result = mysqli_query($conn ,$del_category );

                            header('location:index_admin.php?page=Category');
                         }
                        
                        ?>


                    </tbody>
                </table>

            </DIV>


        </div>

    </div>





</body>

</html>