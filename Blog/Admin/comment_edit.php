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

        <?php

            $cmt_id = $_GET['edit_id'];    
            
            
            
            


            if (isset($_POST['btn_edit'])) { 

                $input_author = $_POST['input_author'];
            $input_email = $_POST['input_email'];
            $input_comment = $_POST['input_comments'];
            $input_post = $_POST['input_post'];
            $input_status = $_POST['input_status'];

            echo $cmt_id;

            
            $edit_query = "UPDATE `comment` SET `comment_post_id` = '$input_post', `comment_author` = '$input_author', `comment_email` = '$input_email', `comment_content` = '$input_comment', `comment_status` = '$input_status', `comment_date` = now() WHERE `comment`.`comment_id` = $cmt_id";
            $edit_result = mysqli_query($conn, $edit_query);

            header('location:Comments.php');

            }



            // sent data to textbox
        

            $View_query = "SELECT * FROM comment WHERE comment_id = $cmt_id";
            $view_result = mysqli_query($conn , $View_query);

            while ($row = mysqli_fetch_assoc($view_result)) {
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment = $row['comment_content'];
                $comment_post = $row['comment_post_id'];
                $comment_status = $row['comment_status'];     
                
            }

        ?>

        <form action="" class="form" method="post">

                    <input type="text" class="form-control" name="input_author" placeholder="author" value="<?PHP echo $comment_author  ?>"> <br>
                    <input type="text" class="form-control" name="input_email" placeholder="email" value="<?PHP echo $comment_email  ?>"><br>
                    <textarea class="form-control" name="input_comments" id=""><?PHP echo $comment  ?></textarea> <br>
                    <input type="text" class="form-control" name="input_post" placeholder="post" value="<?PHP echo $comment_post ?>"><br>

                    <select class="form-control" name="input_status" id="">
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select><br><br>                    


                    <button type="submit" class="btn btn-outline-success" name="btn_edit"> Update</button></a>
                    <a class="btn btn-outline-primary" href="Comments.php">Back</a>


                </form>


            
        </div>

    </div>



</body>

</html>