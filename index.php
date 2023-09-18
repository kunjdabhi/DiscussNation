<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Welcome to DiscussNation</title>
</head>

<body>
    <?php
    require "partials/_dbconnect.php";
    require 'partials/_header.php';
    ?>


    <!-- carousel starts -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2800x800/?coding,java" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2800x800/?coding,javascript" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2800x800/?ai,tech" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel ends -->

    <!-- category containers -->
    <div class="container">
        <h2 class="my-3">Categories</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){
                $cat = $row["category_name"];
                $catId = $row["category_id"];
                $catDesc = $row["category_description"];
                echo '  <div class="col-md-3 my-2">
                            <div class="card my-2" style="width: 18rem; ">
                                <img src="https://source.unsplash.com/500x400/?coding,'.$cat.'" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="threads.php?catid='.$catId.'">'.$cat.'</a></h5>
                                    <p class="card-text">'.substr($catDesc,0,45).'...</p>
                                    <a href="threads.php?catid='.$catId.'" class="btn btn-primary">View Threads</a>
                                </div>
                            </div>
                        </div>';
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