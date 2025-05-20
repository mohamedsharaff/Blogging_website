<?php

$servername = "localhost";
$username = "root"; // Removed extra space
$password = "";
$dbname = "blogging";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch news
$query = "SELECT * FROM news ORDER BY `Date` DESC";
$result = $conn->query($query);

if (!$result) {
    die("Query Failed: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Political.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">


    <title>📰 News Feed</title>
</head>
<body>
    

            <?php  
            include 'Header.php';    ?>

    <script>
        const message = localStorage.getItem('username');
        if (message) {
            document.body.insertAdjacentHTML('afterbegin', `Welcome <a href="#">${message}</a>!`);
        }
    </script>   

    <div class="tabs">
        <?php while ($postrow = $result->fetch_assoc()) { ?>
            <div class="post">
                <div class="ptitle">
                    <h1 class="Title"><?= htmlspecialchars($postrow['Title']) ?></h1>
                </div>
                <p class="Description"><?= htmlspecialchars($postrow['Description']) ?></p>
                <div class="SUB">
                    <p>
                        <strong>Location:</strong> <?= htmlspecialchars($postrow['Location']) ?><br>
                        <strong>Website:</strong> <a href="<?= htmlspecialchars($postrow['Website']) ?>"><?= htmlspecialchars($postrow['Website']) ?></a><br>
                        <strong>Contact No:</strong> <?= htmlspecialchars($postrow['Contact No']) ?><br>
                        <strong>Date:</strong> <?= htmlspecialchars($postrow['Date']) ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="SIDEBAR">
       
    </div>
</body>
</html>
