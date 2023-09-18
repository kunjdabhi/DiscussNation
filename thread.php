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
    $id = $_GET['threadCatId'];
    $sql = 'SELECT * FROM `threads` WHERE `thread_id` =' . $id;
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $cat = $row["thread_title"];
        $catDesc = $row["thread_desc"];
        $threadBy = $row['thread_user_id'];
        $sql4 = "SELECT `user_email` FROM `users` WHERE `sno` = $threadBy";
        $result4 = mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_assoc($result4);
    }


    ?>
    <?php
    $showAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $comment = $_POST['comment'];
        $comment = str_replace("<","&lt;",$comment);
        $comment = str_replace(">","&gt;",$comment);
        $threadId = $_GET['threadCatId'];
        $userId = $_SESSION['id'];
        $sql = "INSERT INTO `comments` (`comment_content`, `comment_by`, `thread_id`) VALUES ('".$comment."', '".$userId."', '".$threadId."')";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
    }
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!! </strong>Your comment has been added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
    }
    ?>
    <div class="container">
        <div class="container-fluid py-4 bg-blue">
            <h1 class="display-6">
                <?php echo $cat; ?>
            </h1>
            <p class="col-md-8 fs-5">
                <?php echo $catDesc; ?>
            </p>
            <p >posted by: <strong><?php echo $row4['user_email']; ?></strong></p>
        </div>
        <div class="container">
            <div class="">
                <p class="mb-3 fs-2">Post a comment</p>
            </div>
            <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

                echo '<form class="form mb-3" action="'.$_SERVER["REQUEST_URI"].'" method="post">
                    <div class="mb-3">
                    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>';
                
            } else {
                echo '<div class="container">
                        <p>You are not logged in. To comment please log in</p>
                    </div>';
            }
            ?>
            <div class="">
                <p class="mb-3 fs-2">Discussion</p>
                <?php
                $id = $_GET['threadCatId'];
                $sql = 'SELECT * FROM `comments` WHERE `thread_id` =' . $id;
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $commentId = $row['comment_id'];
                    $commentContent = $row["comment_content"];
                    $comment_time = $row["createdAt"];
                    $commentBy = $row['comment_by'];
                    $sql2 = "SELECT `user_email` FROM `users` WHERE `sno` = $commentBy";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '  <div class="container d-flex style="max-width: 100vw; "">
                                <div class="flex-shrink-0 mt-2">
                                    <img src="imgs/UserImg.png" style="width: 35px;" alt="...">
                                </div>
                                <div class="flex-grow-1 ms-2 my-0">
                                    <p class="fw-bold my-0">' . $row2['user_email'] . '<span class="fw-normal" > at ' . $comment_time . '</span></p>
                                    <p class="">' . $commentContent . '</p>
                                </div>
                            </div>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php require 'partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>