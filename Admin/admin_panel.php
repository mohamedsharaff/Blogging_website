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

    <link rel="stylesheet" href="css/admin_panel.css">
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


    <?php  ob_start();  include 'DBconnection.php';     ?>



    <div class="row">

        <div class="col-2">
            <?php include 'Sidebar.php' ?>
        </div>

        <div class="col-10">


            <div class="counts_grid">

                <div class="counts">

                    <h6>USERS</h6>

                    <?php
                
                $users_query = "SELECT COUNT(*) FROM users;";
                $users_result = mysqli_query($conn , $users_query);
                
                while ($row = mysqli_fetch_assoc($users_result) ) {

                    $user_count = $row['COUNT(*)'];
                }           
                
                ?>

                    <h5 class="text-primary"><b><?php  echo $user_count ?></b></h5>

                </div>

                <div class="counts">

                    <h6>POSTS</h6>

                    <?php
                
                $post_query = "SELECT COUNT(*) FROM post;";
                $post_result = mysqli_query($conn , $post_query);
                
                while ($row = mysqli_fetch_assoc($post_result) ) {

                    $post_count = $row['COUNT(*)'];
                }           
                
                ?>

                    <h5 class="text-primary"><b><?php  echo $post_count ?></b></h5>


                </div>

                <div class="counts">

                    <h6>COMMENTS</h6>

                    <?php
                
                $comment_query = "SELECT COUNT(*) FROM comment;";
                $comment_result = mysqli_query($conn , $comment_query);
                
                while ($row = mysqli_fetch_assoc($comment_result) ) {

                    $user_comment = $row['COUNT(*)'];
                }           
                
                ?>

                    <h5 class="text-primary"><b><?php  echo $user_comment ?></b></h5>


                </div>

                <div class="counts">

                    <h6>CATEGORIES</h6>

                    <?php
                    
                    $category_query = "SELECT COUNT(*) FROM category;";
                    $category_result = mysqli_query($conn , $category_query);
                    
                    while ($row = mysqli_fetch_assoc($category_result) ) {

                        $category_count = $row['COUNT(*)'];
                    }           
                    
                    ?>

                    <h5 class="text-primary"><b><?php  echo $category_count ?></b></h5>


                </div>

            </div>

            <div class="charts">

                    <br>

                <html>

                <head>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Statics', 'Users', 'Posts', 'Comments','Category'],
                            ['Counts', <?php echo $user_count ?>, <?php echo $post_count ?>,<?php echo $user_comment ?>,<?php echo $category_count ?>]
                            
                        ]);

                        var options = {
                            chart: {
                                title: 'Performance',
                                subtitle: 'Blog Statics',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                    </script>
                </head>

                <body>
                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </body>

                </html>

            </div>

        </div>
    </div>


    





</body>

</html>