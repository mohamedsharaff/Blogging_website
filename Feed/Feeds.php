<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

        if (isset($_GET['page'])) {
                            
            $page   =   $_GET['page'];
            
        }else{
            $page = "";
        }

        switch ($page) {
            

                case 'readmore':
                    include 'Readmore.php';  
                    break; 
            
            default:
                include 'index.php';
                break;
        }

        ?>
    
</body>
</html>