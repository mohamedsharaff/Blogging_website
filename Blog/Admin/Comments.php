<!doctype html>
<html lang="en">

<head>
    <title>Comments</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<?PHP ob_start();  include 'Header.php';    

include 'DBconnection.php';

?>

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


    <div class="row">

        <!-- 1ST COLUMN -->
        <div class="col-2">
            <?php include 'Sidebar.php' ?>
        </div>


        <!-- 2ND COLUMN -->
        <div class="col-9">
            <table class="table">
                <thead class="thead-inverse">
        <progress id="file" value="32" max="100"> 32% </progress> 

                    <tr>
                        <th>ID</th>
                        <th>Author </th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Post</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Approve</th>
                        <th>UnApprove</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>


                <!-- read comments  -->

                <?php
                
                $cmt_query = "SELECT * FROM comment ORDER BY comment_date desc";
                $cmt_result = mysqli_query($conn , $cmt_query);

                while($row = mysqli_fetch_assoc($cmt_result)){
                    
                    $cmt_id = $row['comment_id'];
                    $cmt_post_id = $row['comment_post_id'];
                    $cmt_author = $row['comment_author'];
                    $cmt_email = $row['comment_email'];
                    $cmt_content = $row['comment_content'];
                    $cmt_status = $row['comment_status'];
                    $cmt_date = $row['comment_date'];

                ?>
                    
                    <tr>

                    <td><?php   echo $cmt_id;   ?></td>
                    <td><?php   echo $cmt_author;   ?></td>
                    <td><?php   echo $cmt_email;   ?></td>
                    <td><?php   echo $cmt_content;   ?></td>
                    <td ><a class="btn btn-outline-primary" href="../Feed/Readmore.php?post_id=<?php echo $cmt_post_id; ?>"><?php   echo $cmt_post_id;   ?></a></td>
                    <td><?php   echo $cmt_status;   ?></td>
                    <td><?php   echo $cmt_date;   ?></td>

                    <td><a  class='btn btn-outline-success' href="?page=comments&approve_id=<?php echo $cmt_id ?>" type="submit" name="btn_approve">Approve</a></td>
                    <td><a class='btn btn-outline-danger' href="?page=comments&reject_id=<?php echo $cmt_id ?>" type="submit" name="btn_approve">Reject</a></td>
                    
                    <td><a class="btn btn-primary" href="comment_edit.php?edit_id=<?php echo $cmt_id;   ?>">Edit</a></td>
                    <td><a name="btn_delete" class="btn btn-danger" href="?page=comments&delete_id=<?php echo $cmt_id;   ?>">Delete</a></td>

                    </tr>

                    <?php   } 

                    //  approve comment

                    if (isset($_GET['approve_id'])) {
                        
                        $approve_id = $_GET['approve_id'];

                        $query_approve = "UPDATE comment SET comment_status = 'approved' WHERE comment_id = $approve_id";
                        $result_approve = mysqli_query($conn,$query_approve);

                        header('location:Comments.php');

                    }

                    // reject comment

                    if (isset($_GET['reject_id'])) {
                        
                        $reject_id = $_GET['reject_id'];

                        $query_reject = "UPDATE comment SET comment_status = 'rejected' WHERE comment_id = $reject_id";
                        $result_reject = mysqli_query($conn,$query_reject);

                        header('location:Comments.php');
                    }
                    
                    
                    

                    //delete comments


                    if (isset($_GET['delete_id'])) {

                    $del_id = $_GET['delete_id'];  


                    echo $del_id; 

                    $query_del = "DELETE FROM comment WHERE comment_id = $del_id";
                    $del_result = mysqli_query($conn , $query_del);

                    header('location:index_admin.php?page=comments');

                    }

                    ?>

                   
                </tbody>
            </table>
        </div>

    </div>



</body>

</html>