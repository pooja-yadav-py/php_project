<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Discuss</title>
    <style>
    .carousel-item img {
        width: 100%;
        height: 450px;
    }
    #footer {
        position: relative;
        bottom: 0;
        width: 100%;
        height: 25px;
        
    }
    
    /* .title-name{
      color:#dc3545;
    }
    .title-name:hover{
      color:#0a58ca;
    } */
    </style>
</head>

<body>
    <?php require 'partials/_header.php';?>
    <?php require 'partials/_dbconnect.php';?>

    <!-- Slider Start here -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/slider1.jpeg" class="d-block " alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider2.jpg" class="d-block " alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/slider3.png" class="d-block " alt="...">
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

    <!-- Category container starts here -->
    <div class="container my-3">
        <h3 class="text-center">iDiscuss - Browse Categories</h3>
        <div class="row">
            <!-- fetch all the categories -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn,$sql);
            

  //Fetch all the categories and use a loop to iterate through categories

   while($row = mysqli_fetch_assoc($result)){
     $cat_id = $row['categories_id'];
     $cat_name = $row['categories_name'];
     $cat_description =$row['categories_description'];
     echo '<div class="col md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/random/400x200?'. $cat_name .'=code" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadslist.php?catid=' . $cat_id . '" class="title-name text-danger">'. $cat_name .'</a></h5>
                        <p class="card-text">'.   substr($cat_description,0,110) .'....</p>
                        <a href="threadslist.php?catid=' . $cat_id . '" class="btn btn-danger ">View Threads</a>
                    </div>
                </div>
            </div>';
    }  
?>
        </div>
    </div>
    <?php require 'partials/_footer.php';?>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>