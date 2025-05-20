<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Rows</title>
</head>
<body>

        <?php 


                if (isset($_GET['page'])) {
                    
                    $page   =   $_GET['page'];
                    
                }else{
                    $page = "";
                }

                switch ($page) {
                    case 'edit_post':
                        include 'Edit_post.php';
                        break;

                    // case 'delete_post':
                    //     include 'Delete_post.php';
                    //     break;

                        case 'readmore':
                            include 'Readmore.php';  
                            break;                            

                    case 'new_post':
                        include 'new_post.php';
                        break;                                   

                        case 'readmore':
                            include '../Feed/Readmore.php';  
                            break; 
                        
                        case 'index':
                            include '../Feed/Index.php';
                            break;

                        case 'all_posts':
                            include 'all_posts.php';
                            break;

                            // Category

                        case 'Category':
                            include 'Category.php';
                            break;

                        case 'category_edit':
                            include 'category/category_edit.php';
                            break;

                            //comments
                        case 'comments':
                        include 'Comments.php';
                            break;

                    
                    default:
                        include 'all_posts.php';
                        break;
                }




        ?>

            


           


        </tr>
    </table>
    
</body>
</html>