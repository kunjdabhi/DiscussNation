<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Threads | DiscussNation</title>
</head>

<body>
    <?php
    require "partials/_dbconnect.php";
    require 'partials/_header.php';
    ?>
    <?php
    $id = $_GET['catid'];
    $sql = 'SELECT * FROM `categories` WHERE `category_id` =' . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat = $row["category_name"];
        $catDesc = $row["category_description"];
    }
    


    ?>
    <?php
            $showAlert = false;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $proTitle = $_POST['problemTitle'];
                $proTitle = str_replace("<","&lt;",$proTitle);
                $proTitle = str_replace(">","&gt;",$proTitle);
                $proDesc = $_POST['problemDesc'];
                $proDesc = str_replace("<","&lt;",$proDesc);
                $proDesc = str_replace(">","&gt;",$proDesc);
                $email = $_SESSION['usermail'];
                $userId = $_SESSION['id'];
                
                // $sql3 = 'SELECT * FROM `users`';
                // $result = mysqli_query($conn,$sql3);
                // $row = mysqli_fetch_assoc($resul)


                $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('".$proTitle."', '".$proDesc."', '".$id."', '".$userId."')";

                $result = mysqli_query($conn,$sql);
                $showAlert = true;

            }
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!! </strong>Your thread has been added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
            }
            ?>
    <div class="container">
        <div class="container-fluid py-4">
            <h1 class="display-5 fw-bold">Welcom to
                <?php echo $cat; ?> forums
            </h1>
            <p class="col-md-8 fs-4">
                <?php echo $catDesc; ?>
            </p>
        </div>
        <?php
        
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            echo '<h1>Start a discussion</h1>
            <form class="form mb-3" action="'.$_SERVER["REQUEST_URI"].'" method="post">
                <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" >Problem title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="problemTitle">
                </div>
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="problemDesc"></textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>';
        } else {
            echo '<div class="container mb-5">
            <h1>Start a discussion</h1>
            <p class="fw-light fs-3">You are not logged in. To start a discussion please log in</p>
            </div>';
        }
        ?>
        
        <h1 class="mb-3 container">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = 'SELECT * FROM `threads` WHERE `thread_cat_id` =' . $id;
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $threadId = $row['thread_id'];
            $threadTitle = $row["thread_title"];
            $threadDesc = $row["thread_desc"];
            $threadTime = $row["createdAt"];
            $threadBy = $row["thread_user_id"];

            $sql2 = "SELECT `user_email` FROM `users` WHERE `sno` = $threadBy";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            echo '<div class="d-flex mt-1 mb-3 container">
                    <div class="flex-shrink-0 mt-1">
                        <img src="imgs/UserImg.png" style="width: 45px;" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                    <p class="fw-bold my-0">'.$row2['user_email'].'<span class="fw-normal" > at ' . $threadTime . '</span></p>
                        <h6 class="my-0"><a href="thread.php?threadCatId=' . $threadId . '" class="text-dark">' . $threadTitle . '</a></h6>
                        <p>' . $threadDesc . '</p>
                    </div>
                </div>';
        }



        ?>

    </div>
    <?php require 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>