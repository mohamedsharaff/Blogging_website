<?php

include 'DBconnection.php';

$Quary= " SELECT * FROM others ORDER BY `Date` DESC ";



$Result = mysqli_query($conn    ,   $Quary);

    if (!$Result) {
        
        die ('Quary Failed').mysqli_error();

    }


    

?>








<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="others.css">

    <title>🚴 Others </title>
</head>
<body>



    <div class="header">

<h3 class="Headtitle"> "MY BLOG ROWS"      </h3>


            <ul>

                <li>
            
                    <!-- Add Post -->

                     <a href="Posts/Post.php" class="tabs"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960"   ><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg> </a>

                </li>
                

                <li>

                    <!-- Post  -->
                
                <a href="Others.php" class="newsicon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" ><path d="M160-120q-33 0-56.5-23.5T80-200v-280h80v280h360v80H160Zm160-160q-33 0-56.5-23.5T240-360v-280h80v280h360v80H320Zm160-160q-33 0-56.5-23.5T400-520v-240q0-33 23.5-56.5T480-840h320q33 0 56.5 23.5T880-760v240q0 33-23.5 56.5T800-440H480Zm0-80h320v-160H480v160Z"/></svg></a>

                </li>

                <li>

                     <!-- MARKETING  -->

                <a href="Marketing.php" class="tabs"><svg class="MARKETING" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M160-720v-80h640v80H160Zm0 560v-240h-40v-80l40-200h640l40 200v80h-40v240h-80v-240H560v240H160Zm80-80h240v-160H240v160Zm-38-240h556-556Zm0 0h556l-24-120H226l-24 120Z"/></svg></a>

                </li>

                <li>

                        <!-- POLITICAL  -->


                <a href="Political.php" ><svg class="POLITICAL" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M200-280v-280h80v280h-80Zm240 0v-280h80v280h-80ZM80-120v-80h800v80H80Zm600-160v-280h80v280h-80ZM80-640v-80l400-200 400 200v80H80Zm178-80h444-444Zm0 0h444L480-830 258-720Z"/></svg></a>

                </li>
                            <li>

                                <!-- news  -->
                            
                            <a href="News.php" ><svg class="news" xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" "><path d="M160-120q-33 0-56.5-23.5T80-200v-640l67 67 66-67 67 67 67-67 66 67 67-67 67 67 66-67 67 67 67-67 66 67 67-67v640q0 33-23.5 56.5T800-120H160Zm0-80h280v-240H160v240Zm360 0h280v-80H520v80Zm0-160h280v-80H520v80ZM160-520h640v-120H160v120Z"/></svg></a>

                            </li>
                <!-- <li>
                    
                    home

                     <a href="#" class="tabs"><svg class="home" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg> </a>

                </li> -->
                

            </ul>

     </div>
            
            <div class="tabs">

            </div>


            <br><br>






            <div class="">

                <!-- Post Heading  -->

                <?php

                while( $postrow = mysqli_fetch_assoc($Result)){

                    ?>

                    <div class="post">

                    <!-- Title  -->
                                  <div class="ptitle">                
                                              <h1 class="Title">   <?php         print_r($postrow['Title']);              ?> </h1>              
                                  </div>

                    <!-- Image  -->

                    <img src="Images/<?php     echo($postrow['Image'])      ?>" alt="" width="590px" height="200px"> </img>

                    <!-- description  -->

                    <p class="Description"> <?php      print_r($postrow['Description']);              ?>                    </p>

<DIV class="SUB">

                    <!-- Location  -->

                    <p> <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg> <I>    <?php      print_r($postrow['Location']);              ?>    </I>

                    <!-- Website  -->

                     <br>  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-7-.5-14.5T799-507q-5 29-27 48t-52 19h-80q-33 0-56.5-23.5T560-520v-40H400v-80q0-33 23.5-56.5T480-720h40q0-23 12.5-40.5T563-789q-20-5-40.5-8t-42.5-3q-134 0-227 93t-93 227h200q66 0 113 47t47 113v40H400v110q20 5 39.5 7.5T480-160Z"/></svg> <I>    <?php      print_r($postrow['Website']);              ?>     </I>


                    <!-- Mobile No  -->

                    <br>  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M760-480q0-117-81.5-198.5T480-760v-80q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480h-80Zm-160 0q0-50-35-85t-85-35v-80q83 0 141.5 58.5T680-480h-80Zm198 360q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg> <I>    <?php      print_r($postrow['Contact No']);              ?>     </I>
            
                    <!-- Date  -->

                    <br> <I> Posted On :   <?php      print_r($postrow['Date']);              ?>     </I>

                    
                    </p>                   


</DIV>
                    </div>
                     
            
                    <?php
            
                }

                ?>


                
            

</body>
</html>