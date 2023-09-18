<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DiscussNation</title>
</head>

<body>
    <?php
    require "partials/_dbconnect.php";
    require 'partials/_header.php';
    ?>

    

    <div class="container">
        <h1 class="mt-3">Search results for <em>"<?php echo $_GET['search'] ?>"</em></h1>

        <div class="">
        <?php
        $nores = true;
        $sql = "SELECT * from threads where match (thread_title, thread_desc) against ('".$_GET['search']."')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        $nores = false;
        $threadId = $row['thread_id'];
        $threadTitle = $row["thread_title"];
        $threadDesc = $row["thread_desc"];
        $threadTime = $row["createdAt"];
        $threadBy = $row["thread_user_id"];

        $sql2 = "SELECT `user_email` FROM `users` WHERE `sno` = $threadBy";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        
        if($result){
            echo '<h3><a href="thread.php?threadCatId=' . $threadId . '" class="text-dark">'.$threadTitle.'</a></h3>
            <p>'.$threadDesc.'</p>';  
        }
    }
        if($nores){
           echo '<h3>No result found</h3>';
        }
    ?>
           
        </div>

    </div>

    <?php require 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>