<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <link rel="stylesheet" href="category/category_edit.css">
    
</head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <div class="row">
        <div class="col-2 ">

        <?php 
                 ob_start();

         include 'sidebar.php' ; ?>

    </div>



    <?php 
    

    


      include './DBconnection.php';


          $post_id = $_GET['post_id'];


          $query = "SELECT * FROM category WHERE category_id = $post_id";

          $result = mysqli_query($conn ,$query );
          


          while ($row = mysqli_fetch_assoc($result)) {
                                
            $post_id = $row['category_id'];
            $post_categoty = $row['category'];


            if (isset($_POST['edit'])) {

              $input_id = $_POST['input_id'];
              $input_categoty = $_POST['input_category'];

              $queryup = "UPDATE category SET category = '$input_categoty' , category_id = '$input_id'  WHERE category_id = '$post_id'" ;
              $resultup = mysqli_query($conn ,$queryup );              
  
            }

            if (isset($_POST['edit'])) {

              header('location:index_admin.php?page=Category');

            }

    ?>

    <div class="col-8 ">

    <form action="" method="post" class="edit-form">
                <div class="mb-3 ">
                    <div class="  ">

                        <h4 for="" class="form-label"> <B>EDIT CATEGORY</B> </h4>
                        <hr>
                        <input type="text" class="form-control" name="input_id" value="<?php echo  $post_id  ?>" >
                        <br>
                        <input type="text" class="form-control" name="input_category" value="<?php echo  $post_categoty  ?>">
                        <br>
                        <button name='edit' type="submit" class="btn btn-primary"> 🧹 EDIT  </button>
                        
                    </div>
                </div>
            </form>

            <?php } ?>


    <!-- old form  -->
    

    


  </body>
</html>